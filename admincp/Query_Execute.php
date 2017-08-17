
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Query_scripts') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Query_Execute-id-Query_scripts.html" title=""><span style="height:30px;">Query Execute</span></a></li>
		</ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>

		<?php if($_GET['op3'] == 'Query_scripts') { ?> <!-- Query_scripts -->
		<div class="widget fluid">
			<div class="whead"><h6>Query Execute ( Run Your Own Query )</h6></div>
					<div class="formRow">
						<div class="grid12"><textarea rows="8" cols="" id="valof_qe" name="valof_qe" placeholder="From Here You Can Run Any Query, Result Is Going To Be Posted Below"></textarea>
						<a href="#" id="shcedsa" style="float:right;" class="buttonM bGreen" style="color:#ffffff;">Execute Query</a></div>
                    </div>
		</div>	
		<div id="resultdivsaa"></div>
		<?php }; ?>
<script>
$(document).ready(function() {
	
	//Query
	$("#shcedsa").on('click', function() {
		var getAllValues = $("#valof_qe").val();
			$.post("acps.php", {
				shcedsa: getAllValues
			},
			function(data) {
				$('#resultdivsaa').html(data); //Output Result

				$('#valof_qe').val($("#valof_qe").val());

			});
	});
	
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>