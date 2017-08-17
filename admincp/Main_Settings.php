<?php
$dctm_selc = $mvcorex->prepare("select * 
from memb_stat 
where ServerName != 'fakeserv' 
and DisConnectTM < '".date("Y-m-d H:i:s", $time_dctm)."'");
$stmt = $dctm_selc->execute();
$stmt = $dctm_selc->fetchAll();
$atrherweg = count($stmt);?>

<?php if($_SESSION['admin_panel'] == 'ok') { ?>

        <ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Engine') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Main_Settings-id-Engine.html" title=""><span style="height:30px;">Engine Main Settings</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
		
		<?php if($_GET['op3'] == 'Engine') { ?>
		<div class="widget fluid" id="onChsubEngine">
			<div class="whead"><h6>Engine Settings</h6></div>
                    <div class="formRow">
                        <div class="grid3"><label>Website Title:</label></div>
                        <div class="grid9"><input id="title" name="title" type="text" value="<?php echo $mvcore['title']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Website URL ( <b>Important</b> ):</label></div>
                        <div class="grid9"><input id="surl" name="surl" type="text" value="<?php echo $mvcore['surl']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Forum URL ( Can Use /Forum Or Full Link ):</label></div>
                        <div class="grid9"><input id="forurl" name="forurl" type="text" value="<?php echo $mvcore['forurl']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Default Language File Name ( Ex: lv ):</label></div>
                        <div class="grid9"><input id="df_lang" name="df_lang" type="text" value="<?php echo $mvcore['df_lang']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>On Login Go To Page:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="go_to_page" name="go_to_page" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="Game_Panel" <?php if( $mvcore['go_to_page'] == 'Game_Panel') { echo 'selected'; } else { echo ''; }; ?>>Game Panel</option>
								<option value="user_cp-id-Reset_Character" <?php if( $mvcore['go_to_page'] == 'user_cp-id-Reset_Character') { echo 'selected'; } else { echo ''; }; ?>>Character Reset</option>
								<option value="News" <?php if( $mvcore['go_to_page'] == 'News') { echo 'selected'; } else { echo ''; }; ?>>News page</option> 
								<option value="curp" <?php if( $mvcore['go_to_page'] == 'curp') { echo 'selected'; } else { echo ''; }; ?>>Corrent Page</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Select Website Theme Folder:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="theme_dir" name="theme_dir" style="display: none;" data-placeholder="Choose Folder..." class="select" tabindex="2">
								<option value=""></option> 
								<?php
								$dir = "themes/";

								if (is_dir($dir)) {
									if ($dh = opendir($dir)) {
										while (($file = readdir($dh)) !== false) {
											$fileformat = explode('.',$file);
											if(is_file(''.$file.'') == true || $file == '.' || $file == '..' || $fileformat[1] != '') {} else {
													if($mvcore['theme_dir'] == $file) { $is_selected = 'selected'; } else { $is_selected = ''; };
												echo '<option value="'.$file.'" '.$is_selected.'>'.$file.'</option> ';
											}
										}
										closedir($dh);
									}
								}
								?>
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Rank Select Top:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="top_select" name="top_select" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="5" <?php if( $mvcore['top_select'] == '5') { echo 'selected'; } else { echo ''; }; ?>>5 Par Page</option> 
								<option value="10" <?php if( $mvcore['top_select'] == '10') { echo 'selected'; } else { echo ''; }; ?>>10 Par Page</option> 
								<option value="15" <?php if( $mvcore['top_select'] == '15') { echo 'selected'; } else { echo ''; }; ?>>15 Par Page</option> 
								<option value="20" <?php if( $mvcore['top_select'] == '20') { echo 'selected'; } else { echo ''; }; ?>>20 Par Page</option> 
								<option value="25" <?php if( $mvcore['top_select'] == '25') { echo 'selected'; } else { echo ''; }; ?>>25 Par Page</option> 
								<option value="30" <?php if( $mvcore['top_select'] == '30') { echo 'selected'; } else { echo ''; }; ?>>30 Par Page</option>
								<option value="40" <?php if( $mvcore['top_select'] == '40') { echo 'selected'; } else { echo ''; }; ?>>40 Par Page</option>
								<option value="50" <?php if( $mvcore['top_select'] == '50') { echo 'selected'; } else { echo ''; }; ?>>50 Par Page</option>
								<option value="60" <?php if( $mvcore['top_select'] == '60') { echo 'selected'; } else { echo ''; }; ?>>60 Par Page</option>
							</select>
						</div> 
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Ranking Online/Offline Style:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="onoff_style" name="onoff_style" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="gif" <?php if($mvcore['onoff_style'] == 'gif') { echo 'selected'; } else { echo ''; }; ?>>Gif Animation</option>
								<option value="png" <?php if($mvcore['onoff_style'] == 'png') { echo 'selected'; } else { echo ''; }; ?>>Static PNG dot</option>
								<option value="none" <?php if($mvcore['onoff_style'] == 'none') { echo 'selected'; } else { echo ''; }; ?>>None</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Show / Hide Online Player Count:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="onoff_player_count" name="onoff_player_count" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="show" <?php if($mvcore['onoff_player_count'] == 'show') { echo 'selected'; } else { echo ''; }; ?>>Show Player Count</option>
								<option value="hide" <?php if($mvcore['onoff_player_count'] == 'hide') { echo 'selected'; } else { echo ''; }; ?>>Hide</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Server Max Stats:</label></div>
                        <div class="grid9"><input id="server_max_stat" name="server_max_stat" type="text" value="<?php echo $mvcore['server_max_stat']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Server Max Command ( Default: 32767 ):</label></div>
                        <div class="grid9"><input id="server_max_stat_dl" name="server_max_stat_dl" type="text" value="<?php echo $mvcore['server_max_stat_dl']; ?>"></div>
                    </div>
			<div class="formRow"><div class="grid12"></div></div>
			<div class="formRow"><div class="grid12">Fake account system is based on REAL accounts made in database, accounts that has LOGIN time older then 1 month can be used as FAKE ( account is set to be ONLINE and so making it like 100% real )</div></div>
					<div class="formRow">
						<div class="grid3"><label>Fake Account System ( <b>To Reset Turn OFF Then ON</b> ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="fake_acc_onoff" name="fake_acc_onoff" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="on" <?php if($mvcore['fake_acc_onoff'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option>
								<option value="off" <?php if($mvcore['fake_acc_onoff'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Fake Account Create Count ( <b>Available:<u><?php echo $atrherweg; ?></u></b> )
                                :</label></div>
                        <div class="grid9"><input id="fake_acc_count" name="fake_acc_count" type="text" value="<?php echo $mvcore['fake_acc_count']; ?>"></div>
                    </div>
			<div class="formRow"><div class="grid12"></div></div>
					<div class="formRow">
						<div class="grid3"><label>Web Snow Effect:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="w_snow_effect" name="w_snow_effect" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="on" <?php if($mvcore['w_snow_effect'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['w_snow_effect'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
			<div class="formRow"><div class="grid12"></div></div>
					<div class="formRow">
                        <div class="grid3"><label>Website Money Name ( Credits ):</label></div>
                        <div class="grid9"><input id="money_name1" name="money_name1" type="text" value="<?php echo $mvcore['money_name1']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Website Money Name2 ( Gold Credits ):</label></div>
                        <div class="grid9"><input id="money_name2" name="money_name2" type="text" value="<?php echo $mvcore['money_name2']; ?>"></div>
                    </div>
			<div class="formRow"><div class="grid12"></div></div>
					<div class="formRow">
                        <div class="grid3"><label>Status - Game Server Port ( <b>IF Theme Supports</b> ):</label></div>
                        <div class="grid9"><input id="gs_port" name="gs_port" type="text" placeholder="Leave empty to disable this! Useful while servers are offline." value="<?php echo $mvcore['gs_port']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Status - Game Server2 Port ( <b>IF Theme Supports</b> ):</label></div>
                        <div class="grid9"><input id="gs2_port" name="gs2_port" type="text" placeholder="Leave empty to disable this! Useful while servers are offline." value="<?php echo $mvcore['gs2_port']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Status - Join Server Port ( <b>IF Theme Supports</b> ):</label></div>
                        <div class="grid9"><input id="js_port" name="js_port" type="text" placeholder="Leave empty to disable this! Useful while servers are offline." value="<?php echo $mvcore['js_port']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Status - Connect Server Port ( <b>IF Theme Supports</b> ):</label></div>
                        <div class="grid9"><input id="cs_port" name="cs_port" type="text" placeholder="Leave empty to disable this! Useful while servers are offline." value="<?php echo $mvcore['cs_port']; ?>"></div>
                    </div>
			<div class="formRow"><div class="grid12"></div></div>
					<div class="formRow">
						<div class="grid3"><label>Maintenance Massage: </label></div>
						<div class="grid9 yes_no">
							<div class="floatL mr10">
								<div style="width: 59px;" class="ibutton-container chromexsizetwo">
									<input style="opacity: 0;" id="debug_mode" <?php if($mvcore['debug_mode'] == '1') { echo 'checked="checked"'; }; ?> name="debug_mode" type="checkbox">
									<div style="width: 57px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Off</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -38px;"><label>On</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div><label> Website Under Maintenance! MSG ( <font color="red">Website will see only logged in Administrator / <b>Enable While In localhost !!</b></font> )</label>
						</div>
					</div>
		</div>
		<div class="widget fluid">
			<div class="whead"><h6>Database</h6></div>
				<div id="onChsubDBmd5">
					<div class="formRow">
						<div class="grid3"><label>MD5 Password:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="md5_support" name="md5_support" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="yes" <?php if($mvcore['md5_support'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['md5_support'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>MD5 Hash:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="md5_hash_o" name="md5_hash_o" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="pw" <?php if($mvcore['md5_hash_o'] == 'pw') { echo 'selected'; } else { echo ''; }; ?>>Password</option>
								<option value="pw_ur" <?php if($mvcore['md5_hash_o'] == 'pw_ur') { echo 'selected'; } else { echo ''; }; ?>>Password + Username</option>
								<option value="ur_pw" <?php if($mvcore['md5_hash_o'] == 'ur_pw') { echo 'selected'; } else { echo ''; }; ?>>Username + Password</option>
								<option value="pw_sal" <?php if($mvcore['md5_hash_o'] == 'pw_sal') { echo 'selected'; } else { echo ''; }; ?>>Username + Salt</option>
								<option value="pw_ur_sal" <?php if($mvcore['md5_hash_o'] == 'pw_ur_sal') { echo 'selected'; } else { echo ''; }; ?>>Password + Username + Salt</option>
								<option value="ur_pw_sal" <?php if($mvcore['md5_hash_o'] == 'ur_pw_sal') { echo 'selected'; } else { echo ''; }; ?>>Username + Password + Salt</option>
								<option value="dbo_fn_md5" <?php if($mvcore['md5_hash_o'] == 'dbo_fn_md5') { echo 'selected'; } else { echo ''; }; ?>>dbo.fn_md5('Password','Username')</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>MD5 Salt ( <b>Leave Empty If Salt Not Selected</b> ):</label></div>
                        <div class="grid9"><input id="md5_hs_salt" name="md5_hs_salt" placeholder="Leave Empty If Salt Not Selected " type="text" value="<?php echo $mvcore['md5_hs_salt']; ?>"></div>
                    </div>
				</div>
			<div class="formRow"><div class="grid12"></div></div>
				<div id="onChrehrejnerd5">
					<div class="formRow">
						<div class="grid3"><label>Multi Database System:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="multi_dbs_supp" name="multi_dbs_supp" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="on" <?php if($mvcore['multi_dbs_supp'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['multi_dbs_supp'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Appear Place:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="multi_dbs_app_t_sw" name="multi_dbs_app_t_sw" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="swsbl" <?php if($mvcore['multi_dbs_app_t_sw'] == 'swsbl') { echo 'selected'; } else { echo ''; }; ?>>Show DB Switch Above Login</option>
								<option value="switleft" <?php if($mvcore['multi_dbs_app_t_sw'] == 'switleft') { echo 'selected'; } else { echo ''; }; ?>>Show DB Switch Top <b>Left</b> Corner Of Screen</option>
								<option value="switright" <?php if($mvcore['multi_dbs_app_t_sw'] == 'switright') { echo 'selected'; } else { echo ''; }; ?>>Show DB Switch Top <b>Right</b> Corner Of Screen</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Database Names ( <b>Ex: MuOnline1,MuOnline2,....</b> ):</label></div>
                        <div class="grid6"><input id="multi_dbs_names" name="multi_dbs_names" placeholder="Ex: MuOnline1,MuOnline2,MuOnline3,MuOnline4" type="text" value="<?php echo $mvcore['multi_dbs_names']; ?>"></div>
						 <div class="grid3" align="center"><a href="#" onclick="install_config_folders()" class="buttonM bGreen" style="text-align:center;font-size:12px;color:#ffffff;">Install Configs & DB Tables/Columns</a></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Database Titles ( <b>Ex: ServerMax,LahabenX800,....</b> ):</label></div>
                        <div class="grid9"><input id="multi_dbs_titlen" name="multi_dbs_titlen" placeholder="Ex: ServerMax,LahabenX800,Valhalla,LowRate-Unios" type="text" value="<?php echo $mvcore['multi_dbs_titlen']; ?>"></div>
                    </div>
				</div>
			<div class="formRow"><div class="grid12"></div></div>
				<div class="formRow" id="onChsubDBSett">
					<div class="formRow">
                        <div class="grid3"><label>Database Name ( <b>Default Database</b> ):</label></div>
                        <div class="grid9"><input id="db_name" name="db_name" type="text" value="<?php echo $mvcore['db_name']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Me Database:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="medb_supp" name="medb_supp" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="yes" <?php if($mvcore['medb_supp'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['medb_supp'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>ME Database Name:</label></div>
                        <div class="grid9"><input id="medb_name" name="medb_name" placeholder="Leave empty if not in use." type="text" value="<?php echo $mvcore['medb_name']; ?>"></div>
                    </div>
				</div>
					<div class="formRow" id="onChsubDBseason">
						<div class="grid3"><label>Server Season:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="db_season" name="db_season" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="1" <?php if( $mvcore['db_season'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Season 1</option> 
								<option value="2" <?php if( $mvcore['db_season'] == '2') { echo 'selected'; } else { echo ''; }; ?>>Season 2</option> 
								<option value="3" <?php if( $mvcore['db_season'] == '3') { echo 'selected'; } else { echo ''; }; ?>>Season 3</option> 
								<option value="4" <?php if( $mvcore['db_season'] == '4') { echo 'selected'; } else { echo ''; }; ?>>Season 4</option> 
								<option value="5" <?php if( $mvcore['db_season'] == '5') { echo 'selected'; } else { echo ''; }; ?>>Season 5</option> 
								<option value="6" <?php if( $mvcore['db_season'] == '6') { echo 'selected'; } else { echo ''; }; ?>>Season 6</option> 
								<option value="7" <?php if( $mvcore['db_season'] == '7') { echo 'selected'; } else { echo ''; }; ?>>Season 7</option> 
								<option value="8" <?php if( $mvcore['db_season'] == '8') { echo 'selected'; } else { echo ''; }; ?>>Season 8</option>
								<option value="9" <?php if( $mvcore['db_season'] == '9') { echo 'selected'; } else { echo ''; }; ?>>Season 9</option>
								<option value="10" <?php if( $mvcore['db_season'] == '10') { echo 'selected'; } else { echo ''; }; ?>>Season 10 ( On TEST )</option>
							</select>
						</div>             
					</div>
		</div>
		<div class="widget fluid" id="onChsubEngineSociAl">
			<div class="whead"><h6>Social Settings</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>YouTube URL ( <b>IF Theme Supports</b> ):</label></div>
                        <div class="grid9"><input id="yt_s_url" name="yt_s_url" placeholder="Leave empty to disable this!" type="text" value="<?php echo $mvcore['yt_s_url']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>FaceBook URL ( <b>IF Theme Supports</b> ):</label></div>
                        <div class="grid9"><input id="fb_s_url" name="fb_s_url" placeholder="Leave empty to disable this!" type="text" value="<?php echo $mvcore['fb_s_url']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Twitter URL ( <b>IF Theme Supports</b> ):</label></div>
                        <div class="grid9"><input id="tw_s_url" name="tw_s_url" placeholder="Leave empty to disable this!" type="text" value="<?php echo $mvcore['tw_s_url']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Google+ URL ( <b>IF Theme Supports</b> ):</label></div>
                        <div class="grid9"><input id="gp_s_url" name="gp_s_url" placeholder="Leave empty to disable this!" type="text" value="<?php echo $mvcore['gp_s_url']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>RSS URL ( <b>IF Theme Supports</b> ):</label></div>
                        <div class="grid9"><input id="rss_s_url" name="rss_s_url" placeholder="Leave empty to disable this!" type="text" value="<?php echo $mvcore['rss_s_url']; ?>"></div>
                    </div>
		</div>
		<?php } ?>
		<?php if($_GET['op3'] == 'Web_page_logs') { ?>
		<div class="nNote nWarning">
			<p>This page has not yet been made.</p>
		</div>
		<?php } ?>
<script>
function install_config_folders() {
	var getAllValues = $("#multi_dbs_names").val();
	$.post("acps.php", {
		sendinstallconfs: getAllValues
	},
	function(data) {
		$('#errorDrop').html(data);
	});
};
$(document).ready(function() {
	
	$( "#onChsubEngine" ).on('change', function() {
		var getAllValues = $("#debug_mode:checked").length+"-ids-"+$("#title").val()+"-ids-"+$("#surl").val()+"-ids-"+$("#theme_dir option:selected").val()+"-ids-"+$("#top_select").val()+"-ids-"+$("#server_max_stat").val()+"-ids-"+$("#money_name1").val()+"-ids-"+$("#money_name2").val()+"-ids-"
		
		+$("#forurl").val()+"-ids-"
		
		+$("#gs_port").val()+"-ids-"
		+$("#gs2_port").val()+"-ids-"
		+$("#js_port").val()+"-ids-"
		+$("#cs_port").val()+"-ids-"
		+$("#df_lang").val()+"-ids-"
		+$("#w_snow_effect option:selected").val()+"-ids-"
		+$("#server_max_stat_dl").val()+"-ids-"
		+$("#go_to_page option:selected").val()+"-ids-"
		+$("#onoff_style option:selected").val()+"-ids-"
		+$("#onoff_player_count option:selected").val()+"-ids-"
		+$("#fake_acc_onoff option:selected").val()+"-ids-"
		+$("#fake_acc_count").val();
		
			$.post("acps.php", {
				onChsubEngine: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	$( "#onChsubEngineSociAl" ).on('change', function() {
		var getAllValues =
		
		$("#yt_s_url").val()+"-ids-"
		+$("#fb_s_url").val()+"-ids-"
		+$("#tw_s_url").val()+"-ids-"
		+$("#gp_s_url").val()+"-ids-"
		+$("#rss_s_url").val();
		
			$.post("acps.php", {
				onChsubEngineSociAl: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	$( "#onChsubDBSett" ).on('change', function() {
		var getAllValues =
		
		$("#db_name").val()+"-ids-"
		+$("#medb_name").val()+"-ids-"
		+$("#medb_supp option:selected").val();
		
			$.post("acps.php", {
				onChsubDBSett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	$( "#onChsubDBmd5" ).on('change', function() {
		var getAllValues =

		$("#md5_support").val()+"-ids-"
		+$("#md5_hash_o option:selected").val()+"-ids-"
		+$("#md5_hs_salt").val()
		;
		
			$.post("acps.php", {
				onChsubDBmd5: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	$( "#onChrehrejnerd5" ).on('change', function() { // Multi DB Settings
		var getAllValues =

		$("#multi_dbs_supp option:selected").val()+"-ids-"
		+$("#multi_dbs_names").val()+"-ids-"
		+$("#multi_dbs_titlen").val()+"-ids-"
		+$("#multi_dbs_app_t_sw option:selected").val()
		;
		
			$.post("acps.php", {
				onChrehrejnerd5: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	$( "#onChsubDBseason" ).on('change', function() {
		var getAllValues =
		
		$("#db_season").val();
		
			$.post("acps.php", {
				onChsubDBseason: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>
