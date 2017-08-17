
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		
		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'annon_add_edit_settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Announcement_manage-id-annon_add_edit_settings.html" title=""><span style="height:30px;">Announce Settings</span></a></li>
            <li <?php if($_GET['op3'] == 'annon_add') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Announcement_manage-id-annon_add.html" title=""><span style="height:30px;">Announce Add</span></a></li>
            <li <?php if($_GET['op3'] == 'annon_delete') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Announcement_manage-id-annon_delete.html" title=""><span style="height:30px;">Announce List</span></a></li>
          </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['anon_sys'] != 'on') { echo '<font color="red"><u><b>Announce sys</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
	
		<?php if($_GET['op3'] == 'annon_add_edit_settings') { ?> <!-- annon_add_edit_settings -->
		<div class="widget fluid" id="anonsettings">
			<div class="whead"><h6>Announce Settings</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Castle Siege Output Announce:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="siege_show_countdown" name="siege_show_countdown" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="yes" <?php if($mvcore['siege_show_countdown'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['siege_show_countdown'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Siege START Hour ( 24h Clock ) ( Ex: 16 ):</label></div>
                        <div class="grid9"><input id="siege_start_time" name="siege_start_time" type="text" value="<?php echo $mvcore['siege_start_time']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Siege END Hour ( 24h Clock ) ( Ex: 18 ):</label></div>
                        <div class="grid9"><input id="siege_end_time" name="siege_end_time" type="text" value="<?php echo $mvcore['siege_end_time']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Announce Shop Discount 5 Minutes Before Start:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="anon_shop_discount" name="anon_shop_discount" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="yes" <?php if($mvcore['anon_shop_discount'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['anon_shop_discount'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Announce Vote Bonus 5 Minutes Before It Starts:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="anon_vote_bonus" name="anon_vote_bonus" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="yes" <?php if($mvcore['anon_vote_bonus'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['anon_vote_bonus'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'annon_add') { ?> <!-- annon_add -->
		<div class="widget" id="annonadds">
			<div class="whead"><h6>Announce Add</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Announce Type</label></div>
						<div class="grid9">
							<select style="width:100%;" id="annon_type" name="annon_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="Information" <?php if($mvcore['annon_type'] == 'Information') { echo 'selected'; } else { echo ''; }; ?>>Information</option> 
								<option value="Announcement" <?php if($mvcore['annon_type'] == 'Announcement') { echo 'selected'; } else { echo ''; }; ?>>Announcement</option>
								<option value="None" <?php if($mvcore['annon_type'] == 'None') { echo 'selected'; } else { echo ''; }; ?>>None</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Announce Expire Time:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="anon_expr_min" name="anon_expr_min" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['anon_expr_min'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Permanent</option>
								<option value="300" <?php if($mvcore['anon_expr_min'] == '300') { echo 'selected'; } else { echo ''; }; ?>>After 5 Minutes</option>
								<option value="360" <?php if($mvcore['anon_expr_min'] == '360') { echo 'selected'; } else { echo ''; }; ?>>After 6 Minutes</option>
								<option value="420" <?php if($mvcore['anon_expr_min'] == '420') { echo 'selected'; } else { echo ''; }; ?>>After 7 Minutes</option>
								<option value="480" <?php if($mvcore['anon_expr_min'] == '480') { echo 'selected'; } else { echo ''; }; ?>>After 8 Minutes</option>
								<option value="540" <?php if($mvcore['anon_expr_min'] == '540') { echo 'selected'; } else { echo ''; }; ?>>After 9 Minutes</option>
								<option value="600" <?php if($mvcore['anon_expr_min'] == '600') { echo 'selected'; } else { echo ''; }; ?>>After 10 Minutes</option>
								<option value="660" <?php if($mvcore['anon_expr_min'] == '660') { echo 'selected'; } else { echo ''; }; ?>>After 11 Minutes</option>
								<option value="720" <?php if($mvcore['anon_expr_min'] == '720') { echo 'selected'; } else { echo ''; }; ?>>After 12 Minutes</option>
								<option value="780" <?php if($mvcore['anon_expr_min'] == '780') { echo 'selected'; } else { echo ''; }; ?>>After 13 Minutes</option>
								<option value="840" <?php if($mvcore['anon_expr_min'] == '840') { echo 'selected'; } else { echo ''; }; ?>>After 14 Minutes</option>
								<option value="900" <?php if($mvcore['anon_expr_min'] == '900') { echo 'selected'; } else { echo ''; }; ?>>After 15 Minutes</option>
								<option value="960" <?php if($mvcore['anon_expr_min'] == '960') { echo 'selected'; } else { echo ''; }; ?>>After 16 Minutes</option>
								<option value="1020" <?php if($mvcore['anon_expr_min'] == '1020') { echo 'selected'; } else { echo ''; }; ?>>After 17 Minutes</option>
								<option value="1080" <?php if($mvcore['anon_expr_min'] == '1080') { echo 'selected'; } else { echo ''; }; ?>>After 18 Minutes</option>
								<option value="1140" <?php if($mvcore['anon_expr_min'] == '1140') { echo 'selected'; } else { echo ''; }; ?>>After 19 Minutes</option>
								<option value="1200" <?php if($mvcore['anon_expr_min'] == '1200') { echo 'selected'; } else { echo ''; }; ?>>After 20 Minutes</option>
								<option value="1260" <?php if($mvcore['anon_expr_min'] == '1260') { echo 'selected'; } else { echo ''; }; ?>>After 21 Minutes</option>
								<option value="1320" <?php if($mvcore['anon_expr_min'] == '1320') { echo 'selected'; } else { echo ''; }; ?>>After 22 Minutes</option>
								<option value="1380" <?php if($mvcore['anon_expr_min'] == '1380') { echo 'selected'; } else { echo ''; }; ?>>After 23 Minutes</option>
								<option value="1440" <?php if($mvcore['anon_expr_min'] == '1440') { echo 'selected'; } else { echo ''; }; ?>>After 24 Minutes</option>
								<option value="1500" <?php if($mvcore['anon_expr_min'] == '1500') { echo 'selected'; } else { echo ''; }; ?>>After 25 Minutes</option>
							</select>
						</div>             
					</div>

		<script type="text/javascript">
			tinymce.init({
				selector: "#annon_text",
				menubar: false,
				theme: "modern",
				plugins: [
					"advlist autolink lists link image preview hr anchor pagebreak",
					"wordcount code",
					"media",
					"emoticons template textcolor colorpicker textpattern imagetools"
				],
				toolbar1: "bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist | link image | emoticons | preview",
				image_advtab: true,
				templates: [
					{title: 'Test template 1', content: 'Test 1'}
				]
			});
		</script>


					<div class="formRow">
                        <div class="grid9"><textarea rows="8" cols="" id="annon_text" name="annon_text"></textarea></div>
                    </div>
		</div>
		<div class="formRow" style="margin-right:30px;">
			<a href="#" onclick="addannon(<?php echo''.time().'';?>)" class="buttonM bGreen" style="height:20px;padding-top:15px;text-align:center;margin-top:20px;margin-bottom:20px;font-size:12px;width:100%;float:left;color:#ffffff;">Click To Announce</a>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'annon_delete') { ?> <!-- annon_delete -->
		<div class="widget">
            <div class="whead"><h6>Announce List</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Announce Type</td>
						<td>Expire Time</td>
						<td>Text</td>
						<td>Options</td>
                    </tr>
                </thead>
                <tbody>
					<?php
					$dir = "system/engine_annou".$db_name_multi_annon."";
					chdir($dir);
					array_multisort(array_map('basename', ($files = glob("*.*"))), SORT_DESC, $files);
							foreach($files as $filename){
									if($filename == '.' || $filename == '..' || $filename == 'index.php') {} else {
										
										$readfiledata = file_get_contents(''.$filename.'');
										$NEWS_DATA = explode("-ids-", $readfiledata);
										$stipName = str_replace(".txt","",$filename);
											
											if($stipName > 2000000000) { $expiretime = 'Permanent'; }
											elseif($stipName < 2000000000) { $expiretime = decode_time(time(),$stipName,'long','...'); };
											
										echo'
													<tr>
														<td>'.$NEWS_DATA[0].'</td>
														<td>'.$expiretime.'</td>
														<td>'.html_entity_decode($NEWS_DATA[1]).'</td>
														<td align="center">
															<a href="#" onclick="delannoDas('.$stipName.'); return false;" class="buttonM bDefault mb10 mt5">Delete Announce</a>
														</td>
													</tr>
										';
									}
						
							}
					?>
                </tbody>
            </table>
        </div>
		<?php }; ?>
<script>
function delannoDas(elmnts) {
	$.post("acps.php", {
		delannoDas: elmnts
	},
	function(data) {
		
		$('#errorDrop').html(data);
		
		//MGS Sys --------------
		var getIsOnMSG = '<?php echo $mvcore['admincp_msg_output'];?>';
			var getPaneName2 = '<?php echo $_GET['op2'];?>';
			var getPaneName3 = '<?php echo $_GET['op3'];?>';
		if(getIsOnMSG != 'on') {
			window.location = "-id-admincp-id-"+getPaneName2+"-id-"+getPaneName3+".html";
		} else {
			setInterval(function(){ history.go(0); location.reload(); }, 4000);
		};
		//----------------------
	
	});			
};

function addannon(elmnts) {
	var getAllValues = 
		$("#annon_type option:selected").val()+"-ids-"
		+$("#anon_expr_min option:selected").val()+"-ids-"
		+tinyMCE.get("annon_text").getContent()+"-ids-"
		+elmnts;
		
			$.post("acps.php", {
				addannnon: getAllValues
			},
			function(data) {
				
				$('#errorDrop').html(data);
				
				$("#annon_type option:selected").val('');
				$("#anon_expr_min option:selected").val('');
				tinyMCE.activeEditor.setContent('');

			});	
};
$(document).ready(function() {
	$( "#anonsettings" ).on('change', function() {
		var getAllValues = 
		
		$("#anon_shop_discount option:selected").val()+"-ids-"
		+$("#anon_vote_bonus option:selected").val()+"-ids-"
		+$("#siege_show_countdown option:selected").val()+"-ids-"
		+$("#siege_start_time").val()+"-ids-"
		+$("#siege_end_time").val();
		
			$.post("acps.php", {
				anonsettings: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>