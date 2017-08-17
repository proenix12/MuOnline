
<?php if($_SESSION['admin_panel'] == 'ok') { ?>
        <ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Main_Pages') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Enable_Disable_pages-id-Main_Pages.html" title=""><span style="height:30px;">Main Pages</span></a></li>
			<li <?php if($_GET['op3'] == 'Game_Panel_Pages') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Enable_Disable_pages-id-Game_Panel_Pages.html" title=""><span style="height:30px;">Game Panel Pages</span></a></li>
			<li <?php if($_GET['op3'] == 'GM_Panel_Pages') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Enable_Disable_pages-id-GM_Panel_Pages.html" title=""><span style="height:30px;">GM Panel Pages</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
			
		<?php if($_GET['op3'] == 'Main_Pages') { ?> <!-- Main_Pages -->
		<div class="widget fluid" id="onChsubendipages">
			<div class="whead"><h6>Main Pages</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Login Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Login" <?php if($mvcore['Login'] == 'on') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Account Settings: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Account_Settings" <?php if($mvcore['Account_Settings'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Banned Players: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Banned_Players" <?php if($mvcore['Banned_Players'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Character View: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Character_View" <?php if($mvcore['Character_View'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Announce sys: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="anon_sys" <?php if($mvcore['anon_sys'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Downloads: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Downloads" <?php if($mvcore['Downloads'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Scramble Event: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Scramble" <?php if($mvcore['Scramble'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Exchange System: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Exchange_System" <?php if($mvcore['Exchange_System'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Reg Rules: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="reg_rules" <?php if($mvcore['reg_rules'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Friend System: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Friend_System" <?php if($mvcore['Friend_System'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>My Sponsor ( <?php echo $mvcore['money_name1'];?> Donate ): </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="My_Sponsor" <?php if($mvcore['My_Sponsor'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>GM Buy: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="GM_Buy" <?php if($mvcore['GM_Buy'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Vip Buy: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Vip_Buy" <?php if($mvcore['Vip_Buy'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Gallery: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Gallery" <?php if($mvcore['Gallery'] == 'on') { echo 'checked="checked"'; }; ?> name="Gallery" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Guild View: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Guild_View" <?php if($mvcore['Guild_View'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Hide Item Iformation: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Hide_Information" <?php if($mvcore['Hide_Information'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Lost Password: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Lost_Password" <?php if($mvcore['Lost_Password'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Lottery System: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Lottery_System" <?php if($mvcore['Lottery_System'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Market" <?php if($mvcore['Market'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market Sold Items: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Market_Sold_Items" <?php if($mvcore['Market_Sold_Items'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>News: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="News" <?php if($mvcore['News'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Payment System: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Payment_System" <?php if($mvcore['Payment_System'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Rankings: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Rankings" <?php if($mvcore['Rankings'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Register: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Register" <?php if($mvcore['Register'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Statistics: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Statistics" <?php if($mvcore['Statistics'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Vote: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Vote" <?php if($mvcore['Vote'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Warehouse: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Warehouse" <?php if($mvcore['Warehouse'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Webshop: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Webshop" <?php if($mvcore['Webshop'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Castle Siege Register: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Castle_Siege_Register" <?php if($mvcore['Castle_Siege_Register'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Item Upgrade System: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Item_Upgrade_System" <?php if($mvcore['Item_Upgrade_System'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Forum: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Forum" <?php if($mvcore['Forum'] == 'on') { echo 'checked="checked"'; }; ?> name="Forum" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Game_Panel_Pages') { ?> <!-- Game_Panel_Pages -->
		<div class="widget fluid" id="onChsubendigppages">
			<div class="whead"><h6>Game Panel Pages</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Waiting Room: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Waiting_Room" <?php if($mvcore['Waiting_Room'] == 'on') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Character Market: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Character_Market" <?php if($mvcore['Character_Market'] == 'on') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Reset Character ( Will Also Disable "GR" && "MGR" ):</label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Reset_Character" <?php if($mvcore['Reset_Character'] == 'on') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Grand Reset ( Will Also Disable "MGR" ):</label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Grand_Reset" <?php if($mvcore['Grand_Reset'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Add Stats: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Add_Stats" <?php if($mvcore['Add_Stats'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Buy Level Up Points: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Buy_Level_Up_Points" <?php if($mvcore['Buy_Level_Up_Points'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Buy Level: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Buy_Level" <?php if($mvcore['Buy_Level'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Warp Character: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Warp_Character" <?php if($mvcore['Warp_Character'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Change Class: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Change_Class" <?php if($mvcore['Change_Class'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Clear PK Status: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Clear_PK_Status" <?php if($mvcore['Clear_PK_Status'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Clear Inventory: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Inventory_Clear" <?php if($mvcore['Inventory_Clear'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Rename Character: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Rename_Character" <?php if($mvcore['Rename_Character'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Reset SkillTree: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Reset_SkillTree" <?php if($mvcore['Reset_SkillTree'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Reset Stats: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Reset_Stats" <?php if($mvcore['Reset_Stats'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Sell Free Stats: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Sell_Free_Stats" <?php if($mvcore['Sell_Free_Stats'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Master Grand Reset: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Master_Grand_Reset" <?php if($mvcore['Master_Grand_Reset'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'GM_Panel_Pages') { ?> <!-- GM_Panel_Pages -->
		<div class="widget fluid" id="onChsubendigmpages">
			<div class="whead"><h6>Game Master Pages</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Ban System: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Ban_System" <?php if($mvcore['Ban_System'] == 'on') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Black List manage: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Black_List_manage" <?php if($mvcore['Black_List_manage'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Reward System: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Reward_System" <?php if($mvcore['Reward_System'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Character Information: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Character_Information" <?php if($mvcore['Character_Information'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Event Posting: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="Event_Post" <?php if($mvcore['Event_Post'] == 'on') { echo 'checked="checked"'; }; ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
		</div>
		<?php }; ?>
<script>
$(document).ready(function() {
	$( "#onChsubendipages" ).on('change', function() {
		var getAllValues = $("#Login:checked").length+"-ids-"
		+$("#Account_Settings:checked").length+"-ids-"
		+$("#Banned_Players:checked").length+"-ids-"
		+$("#Character_View:checked").length+"-ids-"
		+$("#Downloads:checked").length+"-ids-"
		+$("#Exchange_System:checked").length+"-ids-"
		+$("#Friend_System:checked").length+"-ids-"
		+$("#Guild_View:checked").length+"-ids-"
		+$("#Hide_Information:checked").length+"-ids-"
		+$("#Lost_Password:checked").length+"-ids-"
		+$("#Lottery_System:checked").length+"-ids-"
		+$("#Market:checked").length+"-ids-"
		+$("#Market_Sold_Items:checked").length+"-ids-"
		+$("#News:checked").length+"-ids-"
		+$("#Payment_System:checked").length+"-ids-"
		+$("#Rankings:checked").length+"-ids-"
		+$("#Register:checked").length+"-ids-"
		+$("#Statistics:checked").length+"-ids-"
		+$("#Vote:checked").length+"-ids-"
		+$("#Warehouse:checked").length+"-ids-"
		+$("#Webshop:checked").length+"-ids-"
		+$("#Castle_Siege_Register:checked").length+"-ids-"
		+$("#Item_Upgrade_System:checked").length+"-ids-"
		+$("#Forum:checked").length+"-ids-"
		+$("#Gallery:checked").length+"-ids-"
		+$("#anon_sys:checked").length+"-ids-"
		+$("#GM_Buy:checked").length+"-ids-"
		+$("#Vip_Buy:checked").length+"-ids-"
		+$("#reg_rules:checked").length+"-ids-"
		+$("#My_Sponsor:checked").length+"-ids-"
		+$("#Scramble:checked").length;
		
			$.post("acps.php", {
				onChsubendipages: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	$( "#onChsubendigppages" ).on('change', function() {
		var getAllValues = $("#Reset_Character:checked").length+"-ids-"
		+$("#Grand_Reset:checked").length+"-ids-"
		+$("#Add_Stats:checked").length+"-ids-"
		+$("#Buy_Level_Up_Points:checked").length+"-ids-"
		+$("#Change_Class:checked").length+"-ids-"
		+$("#Clear_PK_Status:checked").length+"-ids-"
		+$("#Rename_Character:checked").length+"-ids-"
		+$("#Reset_SkillTree:checked").length+"-ids-"
		+$("#Reset_Stats:checked").length+"-ids-"
		+$("#Sell_Free_Stats:checked").length+"-ids-"
		+$("#Master_Grand_Reset:checked").length+"-ids-"
		+$("#Warp_Character:checked").length+"-ids-"
		+$("#Buy_Level:checked").length+"-ids-"
		+$("#Character_Market:checked").length+"-ids-"
		+$("#Waiting_Room:checked").length+"-ids-"
		+$("#Inventory_Clear:checked").length;

			$.post("acps.php", {
				onChsubendigppages: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	$( "#onChsubendigmpages" ).on('change', function() {
		var getAllValues = $("#Ban_System:checked").length+"-ids-"
		+$("#Black_List_manage:checked").length+"-ids-"
		+$("#Reward_System:checked").length+"-ids-"
		+$("#Character_Information:checked").length+"-ids-"
		+$("#Event_Post:checked").length;
		
			$.post("acps.php", {
				onChsubendigmpages: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>