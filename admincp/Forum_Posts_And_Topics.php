
<?php if($_SESSION['admin_panel'] == 'ok') { ?>
		
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Forum_Top') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Forum_Posts_And_Topics-id-Forum_Top.html" title=""><span style="height:30px;">Forum Top Post/Topic Settings</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['News'] != 'on') { echo '<font color="red"><u><b>News</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
			
		<?php if($_GET['op3'] == 'Forum_Top') { ?> <!-- Forum_Top -->
		<div class="widget fluid" id="onCqwdhsubDBSett">
			<div class="whead"><h6>Forum Post/Topic Include Settings ( <b>Coded For IPB Forum Database</b> ) Note: You can remove INCLUDE from theme to disable this.</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Forum MySQL Server:</label></div>
                        <div class="grid9"><input id="mysql_server" name="mysql_server" type="text" placeholder="Ex: 127.0.0.1" value="<?php echo $mvcore['mysql_server']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Forum MySQL Username:</label></div>
                        <div class="grid9"><input id="mysql_user" name="mysql_user" type="text" placeholder="Ex: root" value="<?php echo $mvcore['mysql_user']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Forum MySQL Password:</label></div>
                        <div class="grid9"><input id="mysql_pass" name="mysql_pass" type="password" placeholder="Ex: mvcore" value="<?php echo $mvcore['mysql_pass']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Forum MySQL Database:</label></div>
                        <div class="grid9"><input id="mysql_db" name="mysql_db" type="text" placeholder="Ex: forum" value="<?php echo $mvcore['mysql_db']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Select Top Posts/Topics:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="post_topic_top" name="post_topic_top" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="5" <?php if( $mvcore['post_topic_top'] == '5') { echo 'selected'; } else { echo ''; }; ?>>Top 5</option> 
								<option value="10" <?php if( $mvcore['post_topic_top'] == '10') { echo 'selected'; } else { echo ''; }; ?>>Top 10</option> 
								<option value="15" <?php if( $mvcore['post_topic_top'] == '15') { echo 'selected'; } else { echo ''; }; ?>>Top 15</option> 
								<option value="20" <?php if( $mvcore['post_topic_top'] == '20') { echo 'selected'; } else { echo ''; }; ?>>Top 20</option> 
							</select>
						</div> 
                    </div>
		</div>
		<?php }; ?>
<script> 
$(document).ready(function() {
	//Forum data setup
	$( "#onCqwdhsubDBSett" ).on('change', function() {
		
			var getAllValues = $("#mysql_server").val()+"-ids-"
				+$("#mysql_user").val()+"-ids-"
				+$("#mysql_pass").val()+"-ids-"
				+$("#mysql_db").val()+"-ids-"
				+$("#post_topic_top").val();
		
			$.post("acps.php", {
				uniforumsety: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>