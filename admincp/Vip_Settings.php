
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

        <ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Vip_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Vip_Settings-id-Vip_Settings.html" title=""><span style="height:30px;">VIP Settings</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['Vip_Buy'] != 'on') { echo '<font color="red"><u><b>Vip Buy</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
		
		<?php if($_GET['op3'] == 'Vip_Settings') { ?>
		<div class="widget fluid" id="onChsubDBmdasdqw5">
			<div class="whead"><h6>VIP System ( Optional )</h6></div>
					<div class="formRow">
						<div class="grid3"><label>VIP System Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="Vip_System" name="Vip_System" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="svip" <?php if($mvcore['Vip_System'] == 'svip') { echo 'selected'; } else { echo ''; }; ?>>Server VIP</option> 
								<option value="Wvip" <?php if($mvcore['Vip_System'] == 'Wvip') { echo 'selected'; } else { echo ''; }; ?>>Website VIP</option>
								<option value="wsvip" <?php if($mvcore['Vip_System'] == 'wsvip') { echo 'selected'; } else { echo ''; }; ?>>Website & Server VIP</option>								
							</select>
						</div>
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Vip Day Count ( <b>Choose Vip Days For WEB & IN-GAME</b> ):</label></div>
                        <div class="grid9">
							<select style="width:100%;" id="vip_day_counts" name="vip_day_counts" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['vip_day_counts'] == '1') { echo 'selected'; } else { echo ''; }; ?>>1 Day</option> 
								<option value="2" <?php if($mvcore['vip_day_counts'] == '2') { echo 'selected'; } else { echo ''; }; ?>>2 Days</option> 
								<option value="3" <?php if($mvcore['vip_day_counts'] == '3') { echo 'selected'; } else { echo ''; }; ?>>3 Days</option> 
								<option value="4" <?php if($mvcore['vip_day_counts'] == '4') { echo 'selected'; } else { echo ''; }; ?>>4 Days</option>
								<option value="5" <?php if($mvcore['vip_day_counts'] == '5') { echo 'selected'; } else { echo ''; }; ?>>5 Days</option>
								<option value="6" <?php if($mvcore['vip_day_counts'] == '6') { echo 'selected'; } else { echo ''; }; ?>>6 Days</option>
								<option value="7" <?php if($mvcore['vip_day_counts'] == '7') { echo 'selected'; } else { echo ''; }; ?>>7 Days</option>
								<option value="8" <?php if($mvcore['vip_day_counts'] == '8') { echo 'selected'; } else { echo ''; }; ?>>8 Days</option>
								<option value="9" <?php if($mvcore['vip_day_counts'] == '9') { echo 'selected'; } else { echo ''; }; ?>>9 Days</option>
								<option value="10" <?php if($mvcore['vip_day_counts'] == '10') { echo 'selected'; } else { echo ''; }; ?>>10 Days</option>
								<option value="11" <?php if($mvcore['vip_day_counts'] == '11') { echo 'selected'; } else { echo ''; }; ?>>11 Days</option>
								<option value="12" <?php if($mvcore['vip_day_counts'] == '12') { echo 'selected'; } else { echo ''; }; ?>>12 Days</option>
								<option value="13" <?php if($mvcore['vip_day_counts'] == '13') { echo 'selected'; } else { echo ''; }; ?>>13 Days</option>
								<option value="14" <?php if($mvcore['vip_day_counts'] == '14') { echo 'selected'; } else { echo ''; }; ?>>14 Days</option>
								<option value="15" <?php if($mvcore['vip_day_counts'] == '15') { echo 'selected'; } else { echo ''; }; ?>>15 Days</option>
								<option value="16" <?php if($mvcore['vip_day_counts'] == '16') { echo 'selected'; } else { echo ''; }; ?>>16 Days</option>
								<option value="17" <?php if($mvcore['vip_day_counts'] == '17') { echo 'selected'; } else { echo ''; }; ?>>17 Days</option>
								<option value="18" <?php if($mvcore['vip_day_counts'] == '18') { echo 'selected'; } else { echo ''; }; ?>>18 Days</option>
								<option value="19" <?php if($mvcore['vip_day_counts'] == '19') { echo 'selected'; } else { echo ''; }; ?>>19 Days</option>
								<option value="20" <?php if($mvcore['vip_day_counts'] == '20') { echo 'selected'; } else { echo ''; }; ?>>20 Days</option>
								<option value="21" <?php if($mvcore['vip_day_counts'] == '21') { echo 'selected'; } else { echo ''; }; ?>>21 Days</option>
								<option value="22" <?php if($mvcore['vip_day_counts'] == '22') { echo 'selected'; } else { echo ''; }; ?>>22 Days</option>
								<option value="23" <?php if($mvcore['vip_day_counts'] == '23') { echo 'selected'; } else { echo ''; }; ?>>23 Days</option>
								<option value="24" <?php if($mvcore['vip_day_counts'] == '24') { echo 'selected'; } else { echo ''; }; ?>>24 Days</option>
								<option value="25" <?php if($mvcore['vip_day_counts'] == '25') { echo 'selected'; } else { echo ''; }; ?>>25 Days</option>
								<option value="26" <?php if($mvcore['vip_day_counts'] == '26') { echo 'selected'; } else { echo ''; }; ?>>26 Days</option>
								<option value="27" <?php if($mvcore['vip_day_counts'] == '27') { echo 'selected'; } else { echo ''; }; ?>>27 Days</option>
								<option value="28" <?php if($mvcore['vip_day_counts'] == '28') { echo 'selected'; } else { echo ''; }; ?>>28 Days</option>
								<option value="29" <?php if($mvcore['vip_day_counts'] == '29') { echo 'selected'; } else { echo ''; }; ?>>29 Days</option>
								<option value="30" <?php if($mvcore['vip_day_counts'] == '30') { echo 'selected'; } else { echo ''; }; ?>>30 Days</option>
							</select>
						</div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>1 Day Vip Cost:</label></div>
                        <div class="grid9"><input id="vip_day_cost" name="vip_day_cost" type="text" value="<?php echo $mvcore['vip_day_cost']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Vip Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="vip_cost_type" name="vip_cost_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="1" <?php if($mvcore['vip_cost_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['vip_cost_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
		</div>
		<div class="widget fluid" id="serversetthide" style="display:none;">
			<div class="whead"><h6>Server VIP Table Settings ( This is experemental setup, for any problems contact me at skype: narvulkan )</h6></div>
					<div class="formRow">
						<div class="grid3"><label>VIP Server GS File Module ( <b>Usersname will be saved / deleted in "connectmember" file.</b> ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="vip_file_insert_onoff" name="vip_file_insert_onoff" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="on" <?php if($mvcore['vip_file_insert_onoff'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['vip_file_insert_onoff'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option>							
							</select>
						</div>
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Vip File Path "C:/server/Connectmember.txt" ( <b>Make sure you have / slash lines in path!</b> ):</label></div>
                        <div class="grid9"><input id="vip_file_path" name="vip_file_path" type="text" value="<?php echo $mvcore['vip_file_path']; ?>"></div>
                    </div>
				<div class="formRow"><div class="grid12"></div></div>
					<div class="formRow" id="reheromwegwh">
						<div class="grid3"><label>Choose MuEmu,IGCN Or Default:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="vip_team_selct" name="vip_team_selct" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="default" <?php if($mvcore['vip_team_selct'] == 'default') { echo 'selected'; } else { echo ''; }; ?>>Default</option> 
								<option value="igcn" <?php if($mvcore['vip_team_selct'] == 'igcn') { echo 'selected'; } else { echo ''; }; ?>>IGCN</option>
								<option value="muemu" <?php if($mvcore['vip_team_selct'] == 'muemu') { echo 'selected'; } else { echo ''; }; ?>>MuEmu</option>								
							</select>
						</div>
					</div>
                    <div class="formRow">
                        <div class="grid3"><label>Vip Table Name<?php if($mvcore['medb_supp'] == 'yes') { echo' ( <b>'.$mvcore['medb_name'].'.dbo.Memb_Info</b> )';} ?>:</label></div>
                        <div class="grid9"><input id="vip_table_name" name="vip_table_name" type="text" value="<?php echo $mvcore['vip_table_name']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>User / Character Column Name ( <b>Ex: memb___id</b> ):</label></div>
                        <div class="grid9"><input id="vip_user_name" name="vip_user_name" type="text" value="<?php echo $mvcore['vip_user_name']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Column 1 Name:</label></div>
                        <div class="grid9"><input id="vip_col1_name" name="vip_col1_name" type="text" value="<?php echo $mvcore['vip_col1_name']; ?>"></div>
                    </div>
					<div class="formRow" id="htieigenabled">
                        <div class="grid3"><label>Column 1 Value ( <b>Vip Active/Level ( 0 : 1 / 1 - 4</b> ):</label></div>
                        <div class="grid9"><input id="vip_col1_val" name="vip_col1_val" type="text" value="<?php echo $mvcore['vip_col1_val']; ?>"></div>
                    </div>
						<div class="formRow" style="display:none;" id="vipcol1valt1">
							<div class="grid3"><label>Column Value 1 Title / Extra Cost For Level 1:</label></div>
							<div class="grid5"><input id="vip_col1_valt1" name="vip_col1_valt1" type="text" placeholder="Level 1 Title" value="<?php echo $mvcore['vip_col1_valt1']; ?>"></div>
							<div class="grid4"><input id="vip_col1_valt1_cost" name="vip_col1_valt1_cost" placeholder="Extra Cost For Level 1" type="text" value="<?php echo $mvcore['vip_col1_valt1_cost']; ?>"></div>
						</div>
						<div class="formRow" style="display:none;" id="vipcol1valt2">
							<div class="grid3"><label>Column Value 2 Title / Extra Cost For Level 2:</label></div>
							<div class="grid5"><input id="vip_col1_valt2" name="vip_col1_valt2" type="text" placeholder="Level 2 Title" value="<?php echo $mvcore['vip_col1_valt2']; ?>"></div>
							<div class="grid4"><input id="vip_col1_valt2_cost" name="vip_col1_valt2_cost" placeholder="Extra Cost For Level 2" type="text" value="<?php echo $mvcore['vip_col1_valt2_cost']; ?>"></div>
						</div>
						<div class="formRow" style="display:none;" id="vipcol1valt3">
							<div class="grid3"><label>Column Value 3 Title / Extra Cost For Level 3:</label></div>
							<div class="grid5"><input id="vip_col1_valt3" name="vip_col1_valt3" type="text" placeholder="Level 3 Title" value="<?php echo $mvcore['vip_col1_valt3']; ?>"></div>
							<div class="grid4"><input id="vip_col1_valt3_cost" name="vip_col1_valt3_cost" placeholder="Extra Cost For Level 3" type="text" value="<?php echo $mvcore['vip_col1_valt3_cost']; ?>"></div>
						</div>
						<div class="formRow" style="display:none;" id="vipcol1valt4">
							<div class="grid3"><label>Column Value 4 Title / Extra Cost For Level 4:</label></div>
							<div class="grid5"><input id="vip_col1_valt4" name="vip_col1_valt4" type="text" placeholder="Level 4 Title" value="<?php echo $mvcore['vip_col1_valt4']; ?>"></div>
							<div class="grid4"><input id="vip_col1_valt4_cost" name="vip_col1_valt4_cost" placeholder="Extra Cost For Level 4" type="text" value="<?php echo $mvcore['vip_col1_valt4_cost']; ?>"></div>
						</div>
					<div class="formRow">
                        <div class="grid3"><label>Column 2 Name:</label></div>
                        <div class="grid9"><input id="vip_col2_name" name="vip_col2_name" type="text" value="<?php echo $mvcore['vip_col2_name']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Column 2 Value ( <b>Date Format</b> ):</label></div>
                        <div class="grid9">
							<select style="width:100%;" id="vip_col2_val" name="vip_col2_val" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['vip_col2_val'] == '1') { echo 'selected'; } else { echo ''; }; ?>>'GETDATE()' For ( Year-Month-Day )</option>
								<option value="3" <?php if($mvcore['vip_col2_val'] == '3') { echo 'selected'; } else { echo ''; }; ?>>'GETDATE()' For ( Year-Day-Month )</option>
								<option value="2" <?php if($mvcore['vip_col2_val'] == '2') { echo 'selected'; } else { echo ''; }; ?>>'time()' For 1460963473</option>
							</select>
						</div>
                    </div>
		</div>
		<div class="widget fluid" id="websetthide" style="display:none;">
			<div class="whead"><h6>Website VIP Settings</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Webshop Discount For VIP:</label></div>
                        <div class="grid9">
							<select style="width:100%;" id="web_shop_disc_vip" name="web_shop_disc_vip" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['web_shop_disc_vip'] == '0') { echo 'selected'; } else { echo ''; }; ?>> 0 Percent ( Turned off )</option>
								<option value="5" <?php if($mvcore['web_shop_disc_vip'] == '5') { echo 'selected'; } else { echo ''; }; ?>>5 Percent Difference</option> 
								<option value="10" <?php if($mvcore['web_shop_disc_vip'] == '10') { echo 'selected'; } else { echo ''; }; ?>>10 Percent Difference</option> 
								<option value="15" <?php if($mvcore['web_shop_disc_vip'] == '15') { echo 'selected'; } else { echo ''; }; ?>>15 Percent Difference</option> 
								<option value="20" <?php if($mvcore['web_shop_disc_vip'] == '20') { echo 'selected'; } else { echo ''; }; ?>>20 Percent Difference</option>
							</select>
						</div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Lottery Discount For VIP:</label></div>
                        <div class="grid9">
							<select style="width:100%;" id="web_lott_disc_vip" name="web_lott_disc_vip" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['web_lott_disc_vip'] == '0') { echo 'selected'; } else { echo ''; }; ?>> 0 Percent ( Turned off )</option>
								<option value="5" <?php if($mvcore['web_lott_disc_vip'] == '5') { echo 'selected'; } else { echo ''; }; ?>>5 Percent Difference</option> 
								<option value="10" <?php if($mvcore['web_lott_disc_vip'] == '10') { echo 'selected'; } else { echo ''; }; ?>>10 Percent Difference</option> 
								<option value="15" <?php if($mvcore['web_lott_disc_vip'] == '15') { echo 'selected'; } else { echo ''; }; ?>>15 Percent Difference</option> 
								<option value="20" <?php if($mvcore['web_lott_disc_vip'] == '20') { echo 'selected'; } else { echo ''; }; ?>>20 Percent Difference</option>
							</select>
						</div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>RR Reset Reward For VIP ( <b>Original Rew: <?php echo $mvcore['reset_reward']; ?> <?php if($mvcore['reset_rew_cred'] == '1') { echo $mvcore['money_name1']; } else { echo $mvcore['money_name2']; }; ?></b> ):</label></div>
                        <div class="grid9"><input id="web_res_reward_vip" name="web_res_reward_vip" placeholder="0 = OFF" type="text" value="<?php echo $mvcore['web_res_reward_vip']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>GR Reward For VIP ( <b>Original Rew: <?php echo $mvcore['greset_reward']; ?> <?php if($mvcore['greset_rew_cred'] == '1') { echo $mvcore['money_name1']; } else { echo $mvcore['money_name2']; }; ?></b> ):</label></div>
                        <div class="grid9"><input id="web_gr_reward_vip" name="web_gr_reward_vip" placeholder="0 = OFF" type="text" value="<?php echo $mvcore['web_gr_reward_vip']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>MGR Reward For VIP ( <b>Original Rew: <?php echo $mvcore['mgreset_reward']; ?> <?php if($mvcore['mgreset_rew_cred'] == '1') { echo $mvcore['money_name1']; } else { echo $mvcore['money_name2']; }; ?></b> ):</label></div>
                        <div class="grid9"><input id="web_master_gr_reward_vip" name="web_master_gr_reward_vip" placeholder="0 = OFF" type="text" value="<?php echo $mvcore['web_master_gr_reward_vip']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>(RR,GR,MGR) Level Req. For VIP ( <b>Original Lvl: <?php echo $mvcore['reset_level']; ?></b> ):</label></div>
                        <div class="grid9"><input id="web_rgm_level_vip" name="web_rgm_level_vip" placeholder="0 = OFF" type="text" value="<?php echo $mvcore['web_rgm_level_vip']; ?>"></div>
                    </div>
		</div>
		<?php } ?>
<script>
$(document).ready(function() {


		$( "#htieigenabled" ).hide();
		
			if($("#vip_team_selct").val() == 'muemu'){
				$( "#vipcol1valt1" ).show();
				$( "#vipcol1valt2" ).show();
				$( "#vipcol1valt3" ).show();
				$( "#vipcol1valt4" ).hide();
			};
			
			if($("#vip_team_selct").val() == 'igcn'){
				$( "#vipcol1valt1" ).show();
				$( "#vipcol1valt2" ).show();
				$( "#vipcol1valt3" ).show();
				$( "#vipcol1valt4" ).show();
			};
			
			if($("#vip_team_selct").val() == 'default'){
				$( "#vipcol1valt1" ).hide();
				$( "#vipcol1valt2" ).hide();
				$( "#vipcol1valt3" ).hide();
				$( "#vipcol1valt4" ).hide();
				$( "#htieigenabled" ).show();
			};
			
	$( "#reheromwegwh" ).on('change', function() {
		$( "#htieigenabled" ).hide();
		
			if($("#vip_team_selct").val() == 'muemu'){
				$( "#vipcol1valt1" ).show();
				$( "#vipcol1valt2" ).show();
				$( "#vipcol1valt3" ).show();
				$( "#vipcol1valt4" ).hide();
			};
			
			if($("#vip_team_selct").val() == 'igcn'){
				$( "#vipcol1valt1" ).show();
				$( "#vipcol1valt2" ).show();
				$( "#vipcol1valt3" ).show();
				$( "#vipcol1valt4" ).show();
			};
			
			if($("#vip_team_selct").val() == 'default'){
				$( "#vipcol1valt1" ).hide();
				$( "#vipcol1valt2" ).hide();
				$( "#vipcol1valt3" ).hide();
				$( "#vipcol1valt4" ).hide();
				$( "#htieigenabled" ).show();
			};

	});
		
	//Server
	$( "#serversetthide" ).on('change', function() {
		var getAllValues = 
		
				$("#vip_table_name").val()+"-ids-"
				+$("#vip_user_name").val()+"-ids-"
				+$("#vip_col1_name").val()+"-ids-"
				+$("#vip_col1_val").val()+"-ids-"
				+$("#vip_col2_name").val()+"-ids-"
				+$("#vip_col2_val option:selected").val()+"-ids-"
				+$("#vip_file_path").val()+"-ids-"
				+$("#vip_file_insert_onoff option:selected").val()+"-ids-"
				
				+$("#vip_team_selct option:selected").val()+"-ids-"
				+$("#vip_col1_valt1").val()+"-ids-"
				+$("#vip_col1_valt1_cost").val()+"-ids-"
				+$("#vip_col1_valt2").val()+"-ids-"
				+$("#vip_col1_valt2_cost").val()+"-ids-"
				+$("#vip_col1_valt3").val()+"-ids-"
				+$("#vip_col1_valt3_cost").val()+"-ids-"
				+$("#vip_col1_valt4").val()+"-ids-"
				+$("#vip_col1_valt4_cost").val()
				
			;
			
			$.post("acps.php", {
				serversetthide: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});

	//Website
	$( "#websetthide" ).on('change', function() {
		var getAllValues = 
		
				$("#web_shop_disc_vip option:selected").val()+"-ids-"
				+$("#web_lott_disc_vip option:selected").val()+"-ids-"
				+0+"-ids-"
				
				+$("#web_res_reward_vip").val()+"-ids-"
				+$("#web_gr_reward_vip").val()+"-ids-"
				+$("#web_master_gr_reward_vip").val()+"-ids-"
				+$("#web_rgm_level_vip").val()
			
			;
			
			$.post("acps.php", {
				websetthide: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});

	$( "#onChsubDBmdasdqw5" ).on('change', function() {
		var getAllValues = 
			$("#Vip_System option:selected").val()+"-ids-"
			+$("#vip_day_cost").val()+"-ids-"
			+$("#vip_cost_type option:selected").val()+"-ids-"
			+$("#vip_day_counts option:selected").val()
		;
			if( $("#Vip_System").val() == 'svip') { $("#serversetthide").show(); $("#websetthide").hide(); } else if( $("#Vip_System").val() == 'Wvip') { $("#serversetthide").hide(); $("#websetthide").show(); } else if( $("#Vip_System").val() == 'wsvip') { $("#serversetthide").show(); $("#websetthide").show(); };
			$.post("acps.php", {
				onChsubDBmdasdqw5: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	var getAllValuess = $("#Vip_System").val();
			if( getAllValuess == 'svip') { $("#serversetthide").show(); $("#websetthide").hide(); } else if( getAllValuess == 'Wvip') { $("#serversetthide").hide(); $("#websetthide").show(); } else if( getAllValuess == 'wsvip') { $("#serversetthide").show(); $("#websetthide").show(); };
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>
