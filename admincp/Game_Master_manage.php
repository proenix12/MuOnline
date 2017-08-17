
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		
		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'gm_main_settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Master_manage-id-gm_main_settings.html" title=""><span style="height:30px;">Game Master Settings</span></a></li>
			<li <?php if($_GET['op3'] == 'gm_list') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Master_manage-id-gm_list.html" title=""><span style="height:30px;">Game Master List</span></a></li>
			<li <?php if($_GET['op3'] == 'gm_event_list') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Master_manage-id-gm_event_list.html" title=""><span style="height:30px;">GM Event Reward List</span></a></li>
			<li <?php if($_GET['op3'] == 'event_post_list') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Master_manage-id-event_post_list.html" title=""><span style="height:30px;">Event Post List</span></a></li>
        	<li <?php if($_GET['op3'] == 'gm_rules') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Master_manage-id-gm_rules.html" title=""><span style="height:30px;">Game Master Rules</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
		
		<?php if($_GET['op3'] == 'gm_rules') { ?> <!-- gm_rules -->
			<h6><?php if($mvcore['GM_Buy'] != 'on') { echo '( <font color="red"><u><b>GM Buy</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6>
		<script type="text/javascript">
			tinymce.init({
				selector: "#buyGM_rule_file",
				menubar: false,
				theme: "modern",
				plugins: [
					"advlist autolink lists link image preview hr anchor pagebreak",
					"wordcount code",
					"media",
					"emoticons template textcolor colorpicker textpattern imagetools"
				],
				toolbar1: "bold italic underline | fontselect fontsizeselect | forecolor backcolor | alignleft aligncenter alignright | bullist numlist | link image | emoticons | preview",
				image_advtab: true,
				templates: [
					{title: 'Test template 1', content: 'Test 1'}
				]
			});
		</script>
		<div class="widget" style="opacity:0.8;">
					<textarea rows="20" cols="" id="buyGM_rule_file" name="buyGM_rule_file"><?php echo $mvcore['buyGM_rule_file']; ?></textarea>
		</div>
		<div class="formRow" style="margin-right:30px;">
			<a href="#" onclick="clicksgmrules(); return false;" class="buttonM bGreen" style="height:20px;padding-top:15px;text-align:center;margin-top:20px;margin-bottom:20px;font-size:12px;width:100%;float:left;color:#ffffff;">Save Game Master Rules</a>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'gm_main_settings') { ?> <!-- gm_main_settings -->
		<div class="widget fluid" id="onChsugmsett">
			<div class="whead"><h6>Game Master Buy Settings <?php if($mvcore['GM_Buy'] != 'on') { echo '( <font color="red"><u><b>GM Buy</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>10 Day Status Cost:</label></div>
                        <div class="grid9"><input id="buyGM_cost" name="buyGM_cost" type="text" value="<?php echo $mvcore['buyGM_cost'];?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>GM Cost Type:</label></div>
                        <div class="grid9">
							<select style="width:100%;" id="buyGM_cost_type" name="buyGM_cost_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['buyGM_cost_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['buyGM_cost_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Max Status Days:</label></div>
                        <div class="grid9">
							<select style="width:100%;" id="buyGM_expire_days" name="buyGM_expire_days" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="10" <?php if($mvcore['buyGM_expire_days'] == '10') { echo 'selected'; } else { echo ''; }; ?>>Can Buy Max 10 Days</option>
								<option value="20" <?php if($mvcore['buyGM_expire_days'] == '20') { echo 'selected'; } else { echo ''; }; ?>>Can Buy Max 20 Days</option>
								<option value="30" <?php if($mvcore['buyGM_expire_days'] == '30') { echo 'selected'; } else { echo ''; }; ?>>Can Buy Max 1 Month</option>
								<option value="60" <?php if($mvcore['buyGM_expire_days'] == '60') { echo 'selected'; } else { echo ''; }; ?>>Can Buy Max 2 Months</option>
							</select>
						</div> 
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>GM CtlCode:</label></div>
                        <div class="grid9">
							<select style="width:100%;" id="buyGM_ctlc" name="buyGM_ctlc" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="16" <?php if($mvcore['buyGM_ctlc'] == '16') { echo 'selected'; } else { echo ''; }; ?>>16 ( Game Master )</option> 
								<option value="32" <?php if($mvcore['buyGM_ctlc'] == '32') { echo 'selected'; } else { echo ''; }; ?>>32 ( Administrator )</option> 
							</select>
						</div>
                    </div>
		</div>
		<div class="widget fluid" id="onChsubaccfisreefwae">
			<div class="whead"><h6>Player Reward Settings</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Reward Limit Per Day:</label></div>
                        <div class="grid9"><input id="allowed_rew_c_p_day" name="allowed_rew_c_p_day" type="text" value="<?php echo $mvcore['allowed_rew_c_p_day'];?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Allow Reward To GM:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="rew_gm_for_event" name="rew_gm_for_event" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="yes" <?php if($mvcore['rew_gm_for_event'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['rew_gm_for_event'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>GM Reward (<?php echo $mvcore['money_name1'];?>) For 1 Rewarded User:</label></div>
                        <div class="grid9"><input id="rew_gm_reward" name="rew_gm_reward" type="text" value="<?php echo $mvcore['rew_gm_reward'];?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Max <?php echo $mvcore['money_name1'];?> Reward Limit:</label></div>
                        <div class="grid9"><input id="allow_rew_tc" name="allow_rew_tc" type="text" value="<?php echo $mvcore['allow_rew_tc'];?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Allow <?php echo $mvcore['money_name2'];?> As Reward:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="allow_rew_gc" name="allow_rew_gc" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="yes" <?php if($mvcore['allow_rew_gc'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['allow_rew_gc'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow" id="whts">
                        <div class="grid3"><label>Max <?php echo $mvcore['money_name2'];?> Reward Limit:</label></div>
                        <div class="grid9"><input id="allow_rew_gc_val" name="allow_rew_gc_val" type="text" value="<?php echo $mvcore['allow_rew_gc_val'];?>"></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'gm_list') { ?> <!-- gm_list -->
		<div class="widget">
            <div class="whead"><h6>Status Character List</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Name</td>
						<td>Account</td>
						<td>User Status</td>
						<td>WEB Panel</td>
						<td>Level</td>
                        <td>Resets</td>
						<td>Grand Resets</td>
						<td>Master GResets</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
					<?php
						$sys_starts = mssql_query("select top 50 name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid,MapPosX,MapPosY,m_grand_resets,ctlcode,Experience from character where ctlcode >= '4'");
						for($i=0;$i < mssql_num_rows($sys_starts);++$i) {
							$drop_info = mssql_fetch_row($sys_starts);
							
							$sys_startsa = mssql_query("select bloc_code,admincp,memb__pwd,mail_addr,SecretAnswer,memb___id from ".$mvcore_medb_i." where memb___id = '".$drop_info[15]."'");
							$drop_infoa = mssql_fetch_row($sys_startsa);
	
							$acc_status = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'"); 
							$acc_statusx = mssql_fetch_row($acc_status);
							switch ($acc_statusx[0]) {  case 0: $is_on_off="<font color='#FE2E2E'>".gs_status_offline."</font>"; break; case 1: $is_on_off="<font color='#58FA58'>".gs_status_online."</font>"; break; Default: $is_on_off="<font color='#58FA58'>".gs_status_offline."</font>"; break; };
							switch ($drop_info[19]) { 
							case 8: $gmsStat="Game Master Test (8)"; break;
							case 16: $gmsStat="<b>Game Master (16)</b>"; break;
							case 32: $gmsStat="<font color='red'>Administrator (32)</font>"; break;
							};
							switch ($drop_infoa[1]) {
							case 0: $panels=" - "; break;
							case 2: $panels="Game Master Panel"; break;
							case 1: $panels="<font color='red'>Admin Panel</font>"; break;
							};
							echo'
										<tr>
											<td>'.$drop_info[0].'</td>
											<td>'.$drop_info[15].'</td>
											<td>'.$gmsStat.'</td>
											<td>'.$panels.'</td>
											<td>'.$drop_info[1].'</td>
											<td>'.$drop_info[2].'</td>
											<td>'.$drop_info[3].'</td>
											<td>'.$drop_info[18].'</td>
											<td>'.$is_on_off.'</td>
										</tr>
							';
						};
					?>
                </tbody>
            </table>
        </div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'gm_event_list') { ?> <!-- gm_event_list -->
		<div class="widget">
            <div class="whead"><h6>Event Reward List</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Game Master</td>
						<td>Reason</td>
						<td>Information</td>
						<td>Reward To Account / Character</td>
						<td>Date</td>
                    </tr>
                </thead>
                <tbody>
					<?php
						$sys_starts = mssql_query("select top 100 gm_nick,reason,information,rew_to,date,rew_toch from MVCore_Rew_Data order by date desc");
						for($i=0;$i < mssql_num_rows($sys_starts);++$i) {
							$drop_info = mssql_fetch_row($sys_starts);
							
							$date = date ("Y-m-d H:i", $drop_info[4]);
							
							echo'
										<tr>
											<td align="center"><b>'.$drop_info[0].'</b></td>
											<td>'.$drop_info[1].'</td>
											<td>'.$drop_info[2].'</td>
											<td align="center">'.$drop_info[3].' / '.$drop_info[5].'</td>
											<td>'.$date.'</td>
										</tr>
							';
						};
					?>
                </tbody>
            </table>
        </div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'event_post_list') { ?> <!-- event_post_list -->
		<div class="widget">
            <div class="whead"><h6>Announced Event List</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Title</td>
						<td>Message</td>
						<td>Game Master</td>
						<td>Message expire</td>
						<td>Delete</td>
                    </tr>
                </thead>
                <tbody>
					<?php
						$sys_starts = mssql_query("select top 100 title,message,game_master,expire_date from MVCore_Event_Post order by expire_date desc");
						for($i=0;$i < mssql_num_rows($sys_starts);++$i) {
							$drop_info = mssql_fetch_row($sys_starts);
							
							$date = date ("Y-m-d H:i", $drop_info[3]);
							$decDate = decode_time(time(),$drop_info[3],'short','Expired.');
							
							echo'
										<tr>
											<td align="center"><b>'.$drop_info[0].'</b></td>
											<td>'.$drop_info[1].'</td>
											<td width="150px" align="center">'.$drop_info[2].'</td>
											<td width="200px" align="center">'.$date.' ( '.$decDate.')</td>
											<td align="center" width="200px">
												<a href="#" onclick="clicktodeletepost(\''.$drop_info[3].'\'); return false;" class="buttonM bDefault mb10 mt5">Delete Post</a>
											</td>
										</tr>
							';
						};
					?>
                </tbody>
            </table>
        </div>
		<?php }; ?>
<script>

	function clicksgmrules() {
		var getAllValues = tinyMCE.activeEditor.getContent();
		
			$.post("acps.php", {
				onChsugmsettOnlyNNes: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	}
	
	function clicktodeletepost(elem) {
			$.post("acps.php", {
				deleteeventpost: elem
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
	}
	
$(document).ready(function() {
	
	if($("#allow_rew_gc option:selected").val() == 'no'){ $("#whts").hide(); } else { $("#whts").show(); };
	
	$( "#onChsubaccfisreefwae" ).on('change', function() {
		
		if($("#allow_rew_gc option:selected").val() == 'no'){ $("#whts").hide(); } else { $("#whts").show(); };
		
		var getAllValues = $("#allowed_rew_c_p_day").val()+"-ids-"
		+$("#rew_gm_reward").val()+"-ids-"
		+$("#allow_rew_gc option:selected").val()+"-ids-"
		+$("#allow_rew_tc").val()+"-ids-"
		+$("#allow_rew_gc_val").val()+"-ids-"
		+$("#rew_gm_for_event").val();

			$.post("acps.php", {
				onChsubaccfisreefwae: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	$( "#onChsugmsett" ).on('change', function() {
		
		var getAllValues = $("#buyGM_cost").val()+"-ids-"
		+$("#buyGM_cost_type option:selected").val()+"-ids-"
		+$("#buyGM_expire_days option:selected").val()+"-ids-"
		+$("#buyGM_ctlc option:selected").val();
			$.post("acps.php", {
				onChsugmsett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>