
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Add_Stats_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Add_Stats_Settings.html" title=""><span style="height:30px;">Add Stats</span></a></li>
			<li <?php if($_GET['op3'] == 'Buy_Level_Up_Points_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Buy_Level_Up_Points_Settings.html" title=""><span style="height:30px;">Buy Level Up Points</span></a></li>
 			<li <?php if($_GET['op3'] == 'Change_Class_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Change_Class_Settings.html" title=""><span style="height:30px;">Change Class</span></a></li>
			<li <?php if($_GET['op3'] == 'Clear_PK_Status_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Clear_PK_Status_Settings.html" title=""><span style="height:30px;">Clear PK</span></a></li>
			<li <?php if($_GET['op3'] == 'Grand_Reset_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Grand_Reset_Settings.html" title=""><span style="height:30px;">Grand Reset</span></a></li>
			<li <?php if($_GET['op3'] == 'Rename_Character_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Rename_Character_Settings.html" title=""><span style="height:30px;">Rename Character</span></a></li>
			<li <?php if($_GET['op3'] == 'Reset_Character_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Reset_Character_Settings.html" title=""><span style="height:30px;">Reset Character</span></a></li>
			<li <?php if($_GET['op3'] == 'Reset_SkillTree_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Reset_SkillTree_Settings.html" title=""><span style="height:30px;">Reset SkillTree</span></a></li>
			<li <?php if($_GET['op3'] == 'Inventory_Clear_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Inventory_Clear_Settings.html" title=""><span style="height:30px;">Clear Inventory</span></a></li>
			<li <?php if($_GET['op3'] == 'Reset_Stats_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Reset_Stats_Settings.html" title=""><span style="height:30px;">Reset Stats</span></a></li>
			<li <?php if($_GET['op3'] == 'Sell_Free_Stats_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Sell_Free_Stats_Settings.html" title=""><span style="height:30px;">Sell Free Stats</span></a></li>
			<li <?php if($_GET['op3'] == 'Master_Grand_Reset_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Master_Grand_Reset_Settings.html" title=""><span style="height:30px;">Master Grand Reset</span></a></li>
			<li <?php if($_GET['op3'] == 'Warp_Character_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Warp_Character_Settings.html" title=""><span style="height:30px;">Warp Character</span></a></li>
			<li <?php if($_GET['op3'] == 'Level_Buy_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Game_Panel_manage-id-Level_Buy_Settings.html" title=""><span style="height:30px;">Buy Level</span></a></li>
      </ul>	
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
			
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Add_Stats_Settings') { ?> <!-- Add_Stats_Settings -->
		<div class="widget fluid" id="addstatsss">
			<div class="whead"><h6>Add Stats Settings <?php if($mvcore['Add_Stats'] != 'on') { echo '( <font color="red"><u><b>Add Stats</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Cost For Stats Add:</label></div>
                        <div class="grid9"><input id="addstat_cost" name="addstat_cost" type="text" value="<?php echo $mvcore['addstat_cost']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Add Stats Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="addstat_cost_type" name="addstat_cost_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['addstat_cost_type'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Zen</option>
								<option value="1" <?php if($mvcore['addstat_cost_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['addstat_cost_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Buy_Level_Up_Points_Settings') { ?> <!-- Buy_Level_Up_Points_Settings -->
		<div class="widget fluid" id="blupcofd">
			<div class="whead"><h6>Buy Level Up Points Settings <?php if($mvcore['Buy_Level_Up_Points'] != 'on') { echo '( <font color="red"><u><b>Buy Level Up Points</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Level Up Points Cost For <?php echo''.$mvcore['server_max_stat'].'';?> Stats:</label></div>
                        <div class="grid9"><input id="blupoints_cost" name="blupoints_cost" type="text" value="<?php echo $mvcore['blupoints_cost']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Buy Level Up Points Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="blupoints_cost_type" name="blupoints_cost_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['blupoints_cost_type'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Zen</option>
								<option value="1" <?php if($mvcore['blupoints_cost_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['blupoints_cost_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Change_Class_Settings') { ?> <!-- Change_Class_Settings -->
		<div class="widget fluid" id="cclasssett">
			<div class="whead"><h6>Change Class Settings <?php if($mvcore['Change_Class'] != 'on') { echo '( <font color="red"><u><b>Change Class</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Change Class Cost:</label></div>
                        <div class="grid9"><input id="changeclass_cost" name="changeclass_cost" type="text" value="<?php echo $mvcore['changeclass_cost']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Change Class Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="changeclass_cost_type" name="changeclass_cost_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['changeclass_cost_type'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Zen</option>
								<option value="1" <?php if($mvcore['changeclass_cost_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['changeclass_cost_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Change Class Req. Resets:</label></div>
                        <div class="grid9"><input id="changeclass_need_ress" name="changeclass_need_ress" type="text" value="<?php echo $mvcore['changeclass_need_ress']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Clear_PK_Status_Settings') { ?> <!-- Clear_PK_Status_Settings -->
		<div class="widget fluid" id="clearpksttt">
			<div class="whead"><h6>Clear PK Settings <?php if($mvcore['Clear_PK_Status'] != 'on') { echo '( <font color="red"><u><b>Clear PK Status</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Clear PK Cost:</label></div>
                        <div class="grid9"><input id="pkstatus_cost" name="pkstatus_cost" type="text" value="<?php echo $mvcore['pkstatus_cost']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Clear PK Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="pkstatus_cost_type" name="pkstatus_cost_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['pkstatus_cost_type'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Zen</option>
								<option value="1" <?php if($mvcore['pkstatus_cost_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['pkstatus_cost_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Inventory_Clear_Settings') { ?> <!-- Inventory_Clear_Settings -->
		<div class="widget fluid" id="cleariventtsttt">
			<div class="whead"><h6>Clear Inventory Settings <?php if($mvcore['Inventory_Clear'] != 'on') { echo '( <font color="red"><u><b>Clear Inventory Status</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Clear Inventory Cost:</label></div>
                        <div class="grid9"><input id="inventor_cost" name="inventor_cost" type="text" value="<?php echo $mvcore['inventor_cost']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Clear Inventory Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="inventor_cost_type" name="inventor_cost_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['inventor_cost_type'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Zen</option>
								<option value="1" <?php if($mvcore['inventor_cost_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['inventor_cost_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Grand_Reset_Settings') { ?> <!-- Grand_Reset_Settings -->
		<div class="widget fluid" id="grresett">
			<div class="whead"><h6>Grand Reset Settings <?php if($mvcore['Grand_Reset'] != 'on') { echo '( <font color="red"><u><b>Grand Reset</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Grand Reset Limit ( GR Count Per Character ):</label></div>
                        <div class="grid9"><input id="greset_limit" name="greset_limit" type="text" value="<?php echo $mvcore['greset_limit']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Grand Reset Reward For Resets:</label></div>
                        <div class="grid9"><input id="greset_reward" name="greset_reward" type="text" value="<?php echo $mvcore['greset_reward']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Grand Reset Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="greset_rew_cred" name="greset_rew_cred" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['greset_rew_cred'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['greset_rew_cred'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>GR Reset Stats:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="greset_stats" name="greset_stats" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['greset_stats'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['greset_stats'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Grand Reset Req. Level:</label></div>
                        <div class="grid9"><input id="greset_level" name="greset_level" type="text" value="<?php echo $mvcore['greset_level']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Grand Reset Req. Resets:</label></div>
                        <div class="grid9"><input id="greset_ress" name="greset_ress" type="text" value="<?php echo $mvcore['greset_ress']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Grand Reset Req. Zen ( 0 = Disabled ):</label></div>
                        <div class="grid9"><input id="greset_zen" name="greset_zen" type="text" value="<?php echo $mvcore['greset_zen']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>GR Level Reset To 1:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="greset_lvl_reset" name="greset_lvl_reset" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['greset_lvl_reset'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['greset_lvl_reset'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>GR Inventory Item Check ( Req. Item Remove ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="greset_item_check" name="greset_item_check" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['greset_item_check'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['greset_item_check'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Rename_Character_Settings') { ?> <!-- Rename_Character_Settings -->
		<div class="widget fluid" id="renamcharsett">
			<div class="whead"><h6>Rename Character Settings <?php if($mvcore['Rename_Character'] != 'on') { echo '( <font color="red"><u><b>Rename Character</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Rename Character Cost:</label></div>
                        <div class="grid9"><input id="renchar_cost" name="renchar_cost" type="text" value="<?php echo $mvcore['renchar_cost']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Rename Character Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="renchar_cost_type" name="renchar_cost_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['renchar_cost_type'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Zen</option>
								<option value="1" <?php if($mvcore['renchar_cost_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['renchar_cost_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Reset_Character_Settings') { ?> <!-- Reset_Character_Settings -->
		<div class="widget fluid" id="rrresetsett">
			<div class="whead"><h6>Reset Settings <?php if($mvcore['Reset_Character'] != 'on') { echo '( <font color="red"><u><b>Reset Character</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Reset Limit ( RR Count Per Character ):</label></div>
                        <div class="grid9"><input id="reset_limit" name="reset_limit" type="text" value="<?php echo $mvcore['reset_limit']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Increase ( Zen / Ask Cred / Rew Cred ) In Each Reset + :</label></div>
						<div class="grid9">
							<select style="width:100%;" id="reset_val_inc_opt" name="reset_val_inc_opt" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['reset_val_inc_opt'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['reset_val_inc_opt'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Reset Reward:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="reset_reward_active" name="reset_reward_active" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['reset_reward_active'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['reset_reward_active'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Reset Reward Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="reset_rew_cred" name="reset_rew_cred" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['reset_rew_cred'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['reset_rew_cred'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Reset Reward For Resets ( <?php echo $mvcore['money_name1'];?> ):</label></div>
                        <div class="grid9"><input id="reset_reward" name="reset_reward" type="text" value="<?php echo $mvcore['reset_reward']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Reset Ask <?php echo $mvcore['money_name1'];?> ( <b>Disabled IF Reset Reward Active</b> ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="reset_ask_money" name="reset_ask_money" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['reset_ask_money'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['reset_ask_money'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Reset Ask <?php echo $mvcore['money_name1'];?> Value:</label></div>
                        <div class="grid9"><input id="reset_ask_value" name="reset_ask_value" type="text" value="<?php echo $mvcore['reset_ask_value']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>RR Reset Stats:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="reset_stats" name="reset_stats" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['reset_stats'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['reset_stats'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Clean LevelUpPoints With Reset Stats?:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="clean_lupw_reset_stats" name="clean_lupw_reset_stats" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['clean_lupw_reset_stats'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['clean_lupw_reset_stats'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Reset Req. Level:</label></div>
                        <div class="grid9"><input id="reset_level" name="reset_level" type="text" value="<?php echo $mvcore['reset_level']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Bonus LevelUpPoints:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="reset_bonus_opt" name="reset_bonus_opt" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="disabled" <?php if($mvcore['reset_bonus_opt'] == 'disabled') { echo 'selected'; } else { echo ''; }; ?>>Disabled</option>
								<option value="pereach" <?php if($mvcore['reset_bonus_opt'] == 'pereach') { echo 'selected'; } else { echo ''; }; ?>>Per Each Reset</option>
								<option value="staticval" <?php if($mvcore['reset_bonus_opt'] == 'staticval') { echo 'selected'; } else { echo ''; }; ?>>Static Value In each Reset</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Bonus LevelUpPoints Value:</label></div>
                        <div class="grid9"><input id="reset_bonus" name="reset_bonus" type="text" value="<?php echo $mvcore['reset_bonus']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Reset Req. Zen ( 0 = Disabled ):</label></div>
                        <div class="grid9"><input id="reset_zen" name="reset_zen" type="text" value="<?php echo $mvcore['reset_zen']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>RR Inventory Item Check ( Req. Item Remove ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="reset_item_check" name="reset_item_check" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['reset_item_check'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['reset_item_check'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
				<div class="formRow"><div class="grid12"></div></div>
					<div class="formRow">
						<div class="grid3"><label>LevelReq. Increase ( On / Off ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="reset_lvl_inc" name="reset_lvl_inc" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['reset_lvl_inc'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['reset_lvl_inc'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>LevelReq. Increase By Resets "1" ( <b>MIN / MAX / LEVEL</b> ):</label></div>
                        <div class="grid3"><input id="reset_lvl_inc1_min_ress" name="reset_lvl_inc1_min_ress" type="text" placeholder="Resets MIN Ex: 0" value="<?php echo $mvcore['reset_lvl_inc1_min_ress']; ?>"></div>
						 <div class="grid3"><input id="reset_lvl_inc1_max_ress" name="reset_lvl_inc1_max_ress" type="text" placeholder="Resets MAX Ex: 5" value="<?php echo $mvcore['reset_lvl_inc1_max_ress']; ?>"></div>
						  <div class="grid3"><input id="reset_lvl_inc1_reset_level" name="reset_lvl_inc1_reset_level" type="text" placeholder="Resets LEVEL Ex: 140" value="<?php echo $mvcore['reset_lvl_inc1_reset_level']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>LevelReq. Increase By Resets "2" ( <b>MIN / MAX / LEVEL</b> ):</label></div>
                        <div class="grid3"><input id="reset_lvl_inc2_min_ress" name="reset_lvl_inc2_min_ress" type="text" placeholder="Resets MIN Ex: 6" value="<?php echo $mvcore['reset_lvl_inc2_min_ress']; ?>"></div>
						 <div class="grid3"><input id="reset_lvl_inc2_max_ress" name="reset_lvl_inc2_max_ress" type="text" placeholder="Resets MAX Ex: 20" value="<?php echo $mvcore['reset_lvl_inc2_max_ress']; ?>"></div>
						  <div class="grid3"><input id="reset_lvl_inc2_reset_level" name="reset_lvl_inc2_reset_level" type="text" placeholder="Resets LEVEL Ex: 280" value="<?php echo $mvcore['reset_lvl_inc2_reset_level']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>LevelReq. Increase By Resets "3" ( <b>MIN / MAX / LEVEL</b> ):</label></div>
                        <div class="grid3"><input id="reset_lvl_inc3_min_ress" name="reset_lvl_inc3_min_ress" type="text" placeholder="Resets MIN Ex: 21" value="<?php echo $mvcore['reset_lvl_inc3_min_ress']; ?>"></div>
						 <div class="grid3"><input id="reset_lvl_inc3_max_ress" name="reset_lvl_inc3_max_ress" type="text" placeholder="Resets MAX Ex: 36" value="<?php echo $mvcore['reset_lvl_inc3_max_ress']; ?>"></div>
						  <div class="grid3"><input id="reset_lvl_inc3_reset_level" name="reset_lvl_inc3_reset_level" type="text" placeholder="Resets LEVEL Ex: 365" value="<?php echo $mvcore['reset_lvl_inc3_reset_level']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>LevelReq. Increase By Resets "4" ( <b>MIN / MAX / LEVEL</b> ):</label></div>
                        <div class="grid3"><input id="reset_lvl_inc4_min_ress" name="reset_lvl_inc4_min_ress" type="text" placeholder="Resets MIN Ex: 37" value="<?php echo $mvcore['reset_lvl_inc4_min_ress']; ?>"></div>
						 <div class="grid3"><input id="reset_lvl_inc4_max_ress" name="reset_lvl_inc4_max_ress" type="text" placeholder="Resets MAX Ex: 9999" value="<?php echo $mvcore['reset_lvl_inc4_max_ress']; ?>"></div>
						  <div class="grid3"><input id="reset_lvl_inc4_reset_level" name="reset_lvl_inc4_reset_level" type="text" placeholder="Resets LEVEL Ex: 400" value="<?php echo $mvcore['reset_lvl_inc4_reset_level']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Reset_SkillTree_Settings') { ?> <!-- Reset_SkillTree_Settings -->
		<div class="widget fluid" id="resskilltrsett">
			<div class="whead"><h6>Reset SkillTree Settings <?php if($mvcore['Reset_SkillTree'] != 'on') { echo '( <font color="red"><u><b>Reset SkillTree</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Reset SkillTree Cost:</label></div>
                        <div class="grid9"><input id="skilltreer_cost" name="skilltreer_cost" type="text" value="<?php echo $mvcore['skilltreer_cost']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Reset SkillTree Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="skilltreer_type" name="skilltreer_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['skilltreer_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Zen</option>
								<option value="2" <?php if($mvcore['skilltreer_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="3" <?php if($mvcore['skilltreer_type'] == '3') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Warp_Character_Settings') { ?> <!-- Warp_Character_Settings -->
		<div class="widget fluid" id="charwarpsett">
			<div class="whead"><h6>Character Warp Settings <?php if($mvcore['Warp_Character'] != 'on') { echo '( <font color="red"><u><b>Warp Character</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Character Warp Cost:</label></div>
                        <div class="grid9"><input id="warpchar_cost" name="warpchar_cost" type="text" value="<?php echo $mvcore['warpchar_cost']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Character Warp Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="warpchar_cost_type" name="warpchar_cost_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['warpchar_cost_type'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Zen</option>
								<option value="1" <?php if($mvcore['warpchar_cost_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['warpchar_cost_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Level_Buy_Settings') { ?> <!-- Warp_Character_Settings -->
		<div class="widget fluid" id="levelbuysett">
			<div class="whead"><h6>Buy Level Settings <?php if($mvcore['Buy_Level'] != 'on') { echo '( <font color="red"><u><b>Buy Level</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Cost For 16k Level:</label></div>
                        <div class="grid9"><input id="buylevel_cost" name="buylevel_cost" type="text" value="<?php echo $mvcore['buylevel_cost']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Level Buy Allow:</label></div>
                        <div class="grid9">
							<select style="width:100%;" id="buylevel_level_value" name="buylevel_level_value" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="16" <?php if($mvcore['buylevel_level_value'] == '16') { echo 'selected'; } else { echo ''; }; ?>>Level 16000 Buy</option>
								<option value="32" <?php if($mvcore['buylevel_level_value'] == '32') { echo 'selected'; } else { echo ''; }; ?>>Level 32000 Buy</option> 
								<option value="both" <?php if($mvcore['buylevel_level_value'] == 'both') { echo 'selected'; } else { echo ''; }; ?>>Level 16000 & 32000 Buy</option> 
							</select>
						</div> 
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Level Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="buylevel_cost_type" name="buylevel_cost_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['buylevel_cost_type'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Zen</option>
								<option value="1" <?php if($mvcore['buylevel_cost_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['buylevel_cost_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Reset_Stats_Settings') { ?> <!-- Reset_Stats_Settings -->
		<div class="widget fluid" id="ressstatSett">
			<div class="whead"><h6>Reset Stats Settings <?php if($mvcore['Reset_Stats'] != 'on') { echo '( <font color="red"><u><b>Reset Stats</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Reset Stats Cost:</label></div>
                        <div class="grid9"><input id="resetstats_cost" name="resetstats_cost" type="text" value="<?php echo $mvcore['resetstats_cost']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Reset Stats Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="resetstats_cost_type" name="resetstats_cost_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['resetstats_cost_type'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Zen</option>
								<option value="1" <?php if($mvcore['resetstats_cost_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['resetstats_cost_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Default Stats Value For ( Str, Agi, Ene, Vit, Cmd ):</label></div>
                        <div class="grid9"><input id="resetstats_pUp_add" name="resetstats_pUp_add" type="text" value="<?php echo $mvcore['resetstats_pUp_add']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Sell_Free_Stats_Settings') { ?> <!-- Sell_Free_Stats_Settings -->
		<div class="widget fluid" id="sellfreestat">
			<div class="whead"><h6>Sell Free Stats Settings <?php if($mvcore['Sell_Free_Stats'] != 'on') { echo '( <font color="red"><u><b>Sell Free Stats</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Sell Free Stats Cost ( For 100 Points ):</label></div>
                        <div class="grid9"><input id="sellfstats_cost" name="sellfstats_cost" type="text" value="<?php echo $mvcore['sellfstats_cost']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Sell Free Stats Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="sellfstats_cost_type" name="sellfstats_cost_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['sellfstats_cost_type'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Zen</option>
								<option value="1" <?php if($mvcore['sellfstats_cost_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['sellfstats_cost_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op2'] == 'Game_Panel_manage' && $_GET['op3'] == '' || $_GET['op3'] == 'Master_Grand_Reset_Settings') { ?> <!-- Master_Grand_Reset_Settings -->
		<div class="widget fluid" id="mgrsett">
			<div class="whead"><h6>Master GReset Reward Settings <?php if($mvcore['Master_Grand_Reset'] != 'on') { echo '( <font color="red"><u><b>Master Grand Reset</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Master GReset Reward For Grand Resets:</label></div>
                        <div class="grid9"><input id="mgreset_reward" name="mgreset_reward" type="text" value="<?php echo $mvcore['mgreset_reward']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Master GReset Reward Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="mgreset_rew_cred" name="mgreset_rew_cred" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['mgreset_rew_cred'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['mgreset_rew_cred'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>MGR Reset Stats:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="mgreset_stats" name="mgreset_stats" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['mgreset_stats'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['mgreset_stats'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Master GReset Req. Level:</label></div>
                        <div class="grid9"><input id="mgreset_level" name="mgreset_level" type="text" value="<?php echo $mvcore['mgreset_level']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Master GReset Req. Resets:</label></div>
                        <div class="grid9"><input id="mgreset_ress" name="mgreset_ress" type="text" value="<?php echo $mvcore['mgreset_ress']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Master GReset Req. Grand Resets:</label></div>
                        <div class="grid9"><input id="mgreset_grandres" name="mgreset_grandres" type="text" value="<?php echo $mvcore['mgreset_grandres']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Master GReset Req. Zen ( 0 = Disabled ):</label></div>
                        <div class="grid9"><input id="mgreset_zen" name="mgreset_zen" type="text" value="<?php echo $mvcore['mgreset_zen']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>MGR Level Reset To 1:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="mgreset_lvl_reset" name="mgreset_lvl_reset" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['mgreset_lvl_reset'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['mgreset_lvl_reset'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>MGR Inventory Item Check ( Req. Item Remove ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="mgreset_item_check" name="mgreset_item_check" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['mgreset_item_check'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['mgreset_item_check'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
<script>
$(document).ready(function() {
	//page1
	$( "#addstatsss" ).on('change', function() {
		var getAllValues = 
		
				$("#addstat_cost").val()+"-ids-"
				+$("#addstat_cost_type option:selected").val()
			
			;
			
			$.post("acps.php", {
				addstatsss: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page2
	$( "#blupcofd" ).on('change', function() {
		var getAllValues = 
		
				$("#blupoints_cost").val()+"-ids-"
				+$("#blupoints_cost_type option:selected").val()
			
			;
			
			$.post("acps.php", {
				blupcofd: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page3
	$( "#cclasssett" ).on('change', function() {
		var getAllValues = 
		
				$("#changeclass_cost").val()+"-ids-"
				+$("#changeclass_cost_type option:selected").val()+"-ids-"
				+$("#changeclass_need_ress").val()
			
			;
			
			$.post("acps.php", {
				cclasssett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page4
	$( "#clearpksttt" ).on('change', function() {
		var getAllValues = 
		
				$("#pkstatus_cost").val()+"-ids-"
				+$("#pkstatus_cost_type option:selected").val()
			
			;
			
			$.post("acps.php", {
				clearpksttt: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page Inventory
	$( "#cleariventtsttt" ).on('change', function() {
		var getAllValues = 
		
				$("#inventor_cost").val()+"-ids-"
				+$("#inventor_cost_type option:selected").val()
			
			;
			
			$.post("acps.php", {
				cleariventtsttt: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page5
	$( "#grresett" ).on('change', function() {
		var getAllValues = 
		
				$("#greset_reward").val()+"-ids-"
				+$("#greset_rew_cred option:selected").val()+"-ids-"
				+$("#greset_stats option:selected").val()+"-ids-"
				+$("#greset_level").val()+"-ids-"
				+$("#greset_ress").val()+"-ids-"
				+$("#greset_zen").val()+"-ids-"
				+$("#greset_lvl_reset option:selected").val()+"-ids-"
				+$("#greset_item_check option:selected").val()+"-ids-"
				+$("#greset_limit").val()
			
			;
			
			$.post("acps.php", {
				grresett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page6
	$( "#renamcharsett" ).on('change', function() {
		var getAllValues = 
		
				$("#renchar_cost").val()+"-ids-"
				+$("#renchar_cost_type option:selected").val()
			
			;
			
			$.post("acps.php", {
				renamcharsett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page7
	$( "#rrresetsett" ).on('change', function() {
		var getAllValues = 
		
				$("#reset_reward").val()+"-ids-"
				+$("#reset_rew_cred option:selected").val()+"-ids-"
				+$("#reset_stats option:selected").val()+"-ids-"
				+$("#reset_level").val()+"-ids-"
				+$("#reset_bonus").val()+"-ids-"
				+$("#reset_zen").val()+"-ids-"
				+$("#reset_item_check option:selected").val()+"-ids-"
				+$("#reset_reward_active option:selected").val()+"-ids-"
				+$("#reset_ask_money option:selected").val()+"-ids-"
				+$("#reset_ask_value").val()+"-ids-"
				+$("#reset_val_inc_opt option:selected").val()+"-ids-"
				+$("#reset_limit").val()+"-ids-"
				+$("#reset_lvl_inc option:selected").val()+"-ids-"
				+$("#reset_lvl_inc1_min_ress").val()+"-ids-"
				+$("#reset_lvl_inc1_max_ress").val()+"-ids-"
				+$("#reset_lvl_inc1_reset_level").val()+"-ids-"
				+$("#reset_lvl_inc2_min_ress").val()+"-ids-"
				+$("#reset_lvl_inc2_max_ress").val()+"-ids-"
				+$("#reset_lvl_inc2_reset_level").val()+"-ids-"
				+$("#reset_lvl_inc3_min_ress").val()+"-ids-"
				+$("#reset_lvl_inc3_max_ress").val()+"-ids-"
				+$("#reset_lvl_inc3_reset_level").val()+"-ids-"
				+$("#reset_lvl_inc4_min_ress").val()+"-ids-"
				+$("#reset_lvl_inc4_max_ress").val()+"-ids-"
				+$("#reset_lvl_inc4_reset_level").val()+"-ids-"
				+$("#clean_lupw_reset_stats option:selected").val()+"-ids-"
				+$("#reset_bonus_opt option:selected").val()
				
			;
			
			$.post("acps.php", {
				rrresetsett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page8
	$( "#resskilltrsett" ).on('change', function() {
		var getAllValues = 
		
				$("#skilltreer_cost").val()+"-ids-"
				+$("#skilltreer_type option:selected").val()
			
			;
			
			$.post("acps.php", {
				resskilltrsett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page8.5
	$( "#charwarpsett" ).on('change', function() {
		var getAllValues = 
		
				$("#warpchar_cost").val()+"-ids-"
				+$("#warpchar_cost_type option:selected").val()
			
			;
			
			$.post("acps.php", {
				charwarpsett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page8.5.5
	$( "#levelbuysett" ).on('change', function() {
		var getAllValues = 
		
				$("#buylevel_cost").val()+"-ids-"
				+$("#buylevel_level_value option:selected").val()+"-ids-"
				+$("#buylevel_cost_type option:selected").val()
			
			;
			
			$.post("acps.php", {
				levelbuysett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page9
	$( "#ressstatSett" ).on('change', function() { 
		var getAllValues = 
		
				$("#resetstats_cost").val()+"-ids-"
				+$("#resetstats_cost_type option:selected").val()+"-ids-"
				+$("#resetstats_pUp_add").val()
			
			;
			
			$.post("acps.php", {
				ressstatSett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page10
	$( "#sellfreestat" ).on('change', function() {
		var getAllValues = 
		
				$("#sellfstats_cost").val()+"-ids-"
				+$("#sellfstats_cost_type option:selected").val()
			
			;
			
			$.post("acps.php", {
				sellfreestat: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page11
	$( "#mgrsett" ).on('change', function() { // option:selected
		var getAllValues = 
		
				$("#mgreset_reward").val()+"-ids-"
				+$("#mgreset_rew_cred option:selected").val()+"-ids-"
				+$("#mgreset_stats option:selected").val()+"-ids-"
				+$("#mgreset_level").val()+"-ids-"
				+$("#mgreset_ress").val()+"-ids-"
				+$("#mgreset_grandres").val()+"-ids-"
				+$("#mgreset_zen").val()+"-ids-"
				+$("#mgreset_lvl_reset option:selected").val()+"-ids-"
				+$("#mgreset_item_check option:selected").val()
			
			;
			
			$.post("acps.php", {
				mgrsett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>