<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="Keywords" content="Massively multiplayer online games, mmo, rpg online games, games, game, free online games, Webzen, new slogan, next generation, MVCore, Mu Online, Mu, Game, Online, Server, Play, For, Free, Season, s2, s3, s4, s5, s6, s7, s8, s9, blade master, grand master, hight elf, dimension master, duel master, lord emperor, fist master, massive portal promotion, Jump Start with fully-Geared High leveled characters, Skip the low, Jump to hight,Top-notch, high level avatars">
		<meta name="description" content="MuOnline Private Server Website" />
		<title><?php echo $mvcore['title'];?></title> <!-- Can edit from AdminCP -->
		<link rel="shortcut icon" href="system/engine_images/favi.png" /> <!-- MVCore ICO -->
		<script src="//code.jquery.com/jquery-1.10.2.js"></script> <!-- JS-->
		<?php include('system/theme_inc/inc.item_viewer.php'); ?> <!-- Item View JS -->
		<?php include('system/engine_css/mvcore_style.php'); ?> <!-- Engine CSS -->

		<style>
			body {
				background-attachment: fixed !important;
				background-color: transparent;
				background: url("/themes/<?php echo $mvcore['theme_dir'];?>/img/top-bg.jpg") no-repeat center top;
				height:100%;
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
				color:#bc4f20;
				font-size:13px;
			}
			
			a {
				color:#ff731f;
				text-decoration: none;
				-webkit-transition-delay: 0.30s linear;
				transition-delay: 0.30s linear;
				transition: all 0.30s linear;
			}
			
			a:hover {
				color:#666666;
				text-decoration: none;
			}
			
			.tmenu ul li a {
				text-decoration: none;
				color:#FFFFFF;
				text-transform: uppercase;
				padding:15px;
				font-weight:bold;
				font-size:12px;
				text-shadow: 0 1px 0 rgba(0, 0, 0, 0.5);
				-webkit-transition-delay: 0.30s linear;
				transition-delay: 0.30s linear;
				transition: all 0.30s linear;
				background: url("/themes/<?php echo $mvcore['theme_dir'];?>/img/menu_seperator.png") no-repeat right top;
			}
			
			.tmenu ul li a:hover {
				color:#000;
				text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
				text-decoration: none;
			}
			
			.tmenu ul li { 
				display: inline;
			}
			
			div a {
				color:#ff731f;
				text-decoration: none;
				-webkit-transition-delay: 0.30s linear;
				transition-delay: 0.30s linear;
				transition: all 0.30s linear;
			}
			
			div a:hover {
				color:#666666;
				text-decoration: none;
			}
			
			.server-time-stl {
				color:#FF0000;
				font-size:16px;
				text-decoration: none;
				text-transform: uppercase;
				-webkit-transition-delay: 0.30s linear;
				transition-delay: 0.30s linear;
				transition: all 0.30s linear;
			}
			
			.server-time-stl:hover {
				color:#000000;
				text-decoration: none;
			}
			
		</style>
	</head>
	<body>
	<table width="100%" valign="top" align="center" border="0" cellpadding="0" cellspacing="0" style="font-size:13px;max-width:1051px;">
		<tr><td style="height:160px;"></td></tr>
		<tr>
			<td>
				<table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="padding-left:50px;">
					<tr align="left">
						<td style="background: url('/themes/<?php echo $mvcore['theme_dir'];?>/img/sv1.png') no-repeat left top; width:158px; height:71px;font-size:11px;">
							<div style="margin-top:-7px;margin-left:75px;"><font color="white">GameServer</font><br><b><?php echo $fn_serverStatus_GS; ?></b></div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="padding-left:100px;">
					<tr align="left">
						<td style="background: url('/themes/<?php echo $mvcore['theme_dir'];?>/img/sv2.png') no-repeat left top; width:158px; height:71px;font-size:11px;">
							<div style="margin-top:-7px;margin-left:75px;"><font color="white">JoinServer</font><br><b><?php echo $fn_serverStatus_JS; ?></b></div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr><td style="height:50px;"></td></tr>
		<tr align="left">
			<td style="background: url('/themes/<?php echo $mvcore['theme_dir'];?>/img/navigation.png') no-repeat center top; background-size: 100%; width:100%; height:66px;" class="tmenu">
				<ul style="float:left;list-style-type: none;" valign="top">
					<?php if($mvcore['News']=='on') { ?><li><a href="-id-News.html"><?php echo''.theme_link_news.''; ?></a></li><?php } ?>
					<?php if($mvcore['Register']=='on' && $_SESSION['user_login'] != 'ok') { ?><li><a href="-id-Register.html"><?php echo''.theme_link_register.''; ?></a></li><?php } ?>
					<?php if($mvcore['Downloads']=='on') { ?><li><a href="-id-Downloads.html"><?php echo''.theme_link_downloads.''; ?></a></li><?php } ?>
					<?php if($mvcore['Rankings']=='on') { ?><li><a href="-id-Rankings.html"><?php echo''.theme_link_rankings.''; ?></a></li><?php } ?>
					<?php if($mvcore['Statistics']=='on') { ?><li><a href="-id-Statistics.html"><?php echo''.theme_link_statistics.''; ?></a></li><?php } ?>
					<?php if($mvcore['Banned_Players']=='on') { ?><li><a href="-id-Banned_Players.html"><?php echo''.theme_link_bannedp.''; ?></a></li><?php } ?>
					<?php if($mvcore['Gallery']=='on') { ?><li><a href="-id-Gallery.html"><?php echo''.theme_link_gallery.''; ?></a></li><?php } ?>
					<?php if($mvcore['Market']=='on') { ?><li><a href="-id-Market.html"><?php echo''.theme_link_market.''; ?></a></li><?php } ?>
					<?php if($mvcore['Webshop']=='on') { ?><li><a href="-id-Webshop.html"><?php echo''.theme_link_webshop.''; ?></a></li><?php } ?>
					<?php if($mvcore['Forum']=='on') { ?><li><a target="blank" href="<?php echo $mvcore['forurl']; ?>"><?php echo''.theme_link_forum.''; ?></a></li><?php } ?>
				</ul>
			</td>
		</tr>
		<tr><td style="height:5px;"></td></tr>
		<tr>
			<td style="width:100%;">
				<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" >
					<tr width="100%">
						<td valign="top" width="750px" align="left">
						
							<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" >
								<tr>
									<td valign="top" style="background-color: #FFF;border-radius: 4px;">
										<div style="background-color: #3a3532;height:30px;margin-left:5px;margin-right:5px;margin-top:15px;line-height:30px;padding:10px;margin-bottom:0px;font-size:14px;color:#f6983c;"><?php include('system/engine_ptext.php'); ?> <!-- Used To Output Page Names --></div>
										<div style="padding:20px;">
											<div align="center"> <?php echo $mvcore['ads_spt_468x60']; ?> <!-- Banner ( 468 x 60 ) --> </div>
											<?php include('system/engine_pages.php'); ?>
										</div>
									</td>
								</tr>
							</table>
								<table><tr><td height="0px"></td></tr></table>
							<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td valign="top" style="background-color: #FFF;border-radius: 4px;width:372px;">
										<div style="background-color: #3a3532;height:30px;margin-left:5px;margin-right:5px;margin-top:15px;line-height:30px;padding:10px;margin-bottom:0px;font-size:14px;color:#f6983c;">TOP CHARACTERS</div>
										<div style="padding:20px;">
											<?php include('system/theme_inc/inc.top_characters.php'); ?> <!-- Top 10 Characters -->
										</div>
									</td>
										<td width="5px"></td>
									<td valign="top" style="background-color: #FFF;border-radius: 4px;width:372px;">
										<div style="background-color: #3a3532;height:30px;margin-left:5px;margin-right:5px;margin-top:15px;line-height:30px;padding:10px;margin-bottom:0px;font-size:14px;color:#f6983c;">TOP GUILDS</div>
										<div style="padding:20px;">
											<?php include('system/theme_inc/inc.top_guilds.php'); ?> <!-- Top 10 Guilds -->
										</div>
									</td>
								</tr>
							</table>
							
						</td>
						<td valign="top" width="5px"></td>
						<td valign="top" align="right" width="256px">
						
							<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" >
								<tr>
									<td valign="top">
										<?php include('system/theme_inc/inc.slider.php'); ?> <!-- Slider Image Output -->
									</td>
								</tr>
									<tr><td valign="top" height="5px" align="center"></td></tr>
								<tr>
									<td valign="top">
										<div style="background: url('/themes/<?php echo $mvcore['theme_dir'];?>/img/module-title.png') repeat-y center top; background-size: 100%;height:42px;margin-top:0px;line-height:42px;font-size:14px;text-align:center;color:#FFF;text-transform: uppercase;">USER <?php if($_SESSION['user_login'] == 'ok') { echo'<u>'.$_SESSION['username'].'</u>'; } else { echo'LOGIN';} ?></div>
										<div style="background-color: #221d1b;">
											<div style="padding:20px;">
												<?php if($_SESSION['user_login'] != 'ok') { ?>
												<form action="" method="POST">
												<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
													<?php
													if($mvcore['multi_dbs_supp'] == 'on' && $mvcore['multi_dbs_app_t_sw'] == 'swsbl') {
															echo '<tr align="center"><td><select name="database_load" class="mvcore-select-main" style="color:#000;width:230px !important;">';
															$cmulti_dbs = explode(',',$mvcore['multi_dbs_names']);
															$cmulti_dbs_titl = explode(',',$mvcore['multi_dbs_titlen']);
															for($i=0;$i < count($cmulti_dbs);++$i) {
																if($_SESSION['database_load']==$cmulti_dbs[$i]){ $opdsvgf[$i] = 'selected'; }else{ $opdsvgf[$i] = ''; };
																echo '<option value="'.$cmulti_dbs[$i].'" '.$opdsvgf[$i].'>'.$cmulti_dbs_titl[$i].'</option>';
															};
															echo '</select></td></tr>';
													}
													?>
													<tr align="center">
														<td><input type="text" name="usern" class="mvcore-input-main" value="" placeholder="Username" style="color:#000;width:230px !important;"></td>
													</tr>
													<tr align="center">
														<td><input type="password" name="passn" class="mvcore-input-main" value="" placeholder="Password" style="color:#000;width:230px !important;"></td>
													</tr>
													<tr align="center">
														<td>
															<button class="mvcore-button-style" name="loginacc" style="margin-top:5px;cursor:pointer" type="submit"><?php echo main_p_user_login_login; ?></button>
															<?php if($mvcore['Register']=='on' && $_SESSION['user_login'] != 'ok') { ?><a class="mvcore-button-style" href="-id-Register.html"><?php echo''.theme_link_register.''; ?></a><?php } ?>
															<br>
															<?php if($mvcore['Lost_Password']=='on'  && $_SESSION['user_login'] != 'ok') { ?><a href="-id-Lost_Password.html"><?php echo''.theme_link_lpassword.''; ?></a><?php } ?>
														</td>
													</tr>
												</table>
												</form>
												<?php } else { ?>
													
													<?php
														if($mvcore['multi_dbs_supp'] == 'on') {
															echo '<div class="latest-twitter-tweett"><img src="/themes/'.$mvcore['theme_dir'].'/img/pc.png" width="15px"> Server: <b>';
															$cmulti_dbs = explode(',',$mvcore['multi_dbs_names']);
															$cmulti_dbs_titl = explode(',',$mvcore['multi_dbs_titlen']);
															for($i=0;$i < count($cmulti_dbs);++$i) {
																if($cmulti_dbs[$i] == $db_name_multi) { echo ''.$cmulti_dbs_titl[$i].''; break; } else {};
															};
															echo '</b></div>';
														};
													?>
													
													<div class="latest-twitter-tweett"><img src="/themes/<?php echo $mvcore['theme_dir'];?>/img/cred.png"> <?php echo $mvcore['money_name1']; ?>: <b><?php echo $mvc_Money_credits; ?></b></div>
													<div class="latest-twitter-tweett"><img src="/themes/<?php echo $mvcore['theme_dir'];?>/img/gold.png"> <?php echo $mvcore['money_name2']; ?>: <b><?php echo $mvc_Money_goldcredits; ?></b></div>
													<div class="latest-twitter-tweett"><img src="/themes/<?php echo $mvcore['theme_dir'];?>/img/wcoins.png"> wCoins: <b><?php echo $mvc_Money_wcoins; ?></b></div>
													<div class="latest-twitter-tweett"><img src="/themes/<?php echo $mvcore['theme_dir'];?>/img/zen.png"> Vault Zen: <b><?php echo $mvc_Money_VaultZen; ?></b></div>
													
													<!-- =-=-= Main Pages For Users ( Contains PHP To Hide Link If Page Disabled In AdminCP ) =-=-= -->
													<?php if($mvcore['Account_Settings']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-Account_Settings.html"><?php echo''.theme_link_accountsett.''; ?></a></div><?php } ?>
													<?php if($mvcore['Payment_System']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-Payment_System.html" style="color:red;"><?php echo''.theme_link_paymentsys.''; ?></a></div><?php } ?>
													<div class="latest-twitter-tweett"><a href="-id-Game_Panel.html"><b>Game Panel</b></a></div>
													<?php if($mvcore['Vote']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-Vote.html"><?php echo''.theme_link_freevote.''; ?></a></div><?php } ?>


													<!-- =-=-= Extra Pages For Users ( Contains PHP To Hide Link If Page Disabled In AdminCP ) =-=-= -->
													<?php if($mvcore['Hide_Information']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-Hide_Information.html"><?php echo''.theme_link_hideiteminfo.''; ?></a></div><?php } ?>
													<?php if($mvcore['Friend_System']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-Friend_System.html"><?php echo''.theme_link_friendsys.''; ?></a></div><?php } ?>
													<?php if($mvcore['Exchange_System']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-Exchange_System.html"><?php echo''.theme_link_exchangesys.''; ?></a></div><?php } ?>
													<?php if($mvcore['GM_Buy']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-GM_Buy.html"><?php echo''.theme_link_gmbuy.''; ?></a></div><?php } ?>
													<?php if($mvcore['Vip_Buy']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-Vip_Buy.html"><?php echo''.theme_link_vipbuy.''; ?></a></div><?php } ?>
													<?php if($mvcore['Lottery_System']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-Lottery_System.html"><?php echo''.theme_link_lotterysys.''; ?></a></div><?php } ?>
													<?php if($mvcore['Warehouse']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-Warehouse.html"><?php echo''.theme_link_warehouse.''; ?></a></div><?php } ?>
													<?php if($mvcore['Castle_Siege_Register']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-Castle_Siege_Register.html"><?php echo''.theme_link_caslesiegereg.''; ?></a></div><?php } ?>
													<?php if($mvcore['Item_Upgrade_System']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-Item_Upgrade_System.html"><?php echo''.theme_link_itemupgradesys.''; ?></a></div><?php } ?>
													<?php if($mvcore['anc_mob_onoff']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-Ancient_Exchange.html"><?php echo''.theme_link_ancexc.''; ?></a></div><?php } ?>
													<?php if($mvcore['My_Sponsor']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-My_Sponsor.html"><?php echo''.theme_link_mysponsors.''; ?></a></div><?php } ?>
													<?php if($mvcore['Scramble']=='on') { ?><div class="latest-twitter-tweett"><a href="-id-Scramble_Event.html"><?php echo''.theme_link_scrambleevent.''; ?></a></div><?php } ?>
													
													<!-- =-=-= Admin/GM Panel Buttons ( Secured With PHP ) =-=-= -->
													<?php if($_SESSION['admin_panel']=='ok') { ?><div class="latest-twitter-tweett"><a target="_blank" href="-id-admincp-id-Dashboard.html">Admin Panel</a></div><?php } ?>
													<?php if($_SESSION['gm_panel']=='ok') { ?><div class="latest-twitter-tweett"><a href="-id-gm_cp-id-GM_Panel.html"><?php echo''.theme_link_gmpanel.''; ?></a></div><?php } ?>
													<div class="latest-twitter-tweett"><a href="-id-exitacc.html"><?php echo''.theme_link_logout.''; ?></a></div> <!-- Logout -->
												<?php } ?>
											</div>
										</div>
									</td>
								</tr>
							</table>
								<table><tr><td height="1px"></td></tr></table>
							<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" >
								<tr>
									<td valign="top">
										<div style="background: url('/themes/<?php echo $mvcore['theme_dir'];?>/img/module-title.png') repeat-y center top; background-size: 100%;height:42px;margin-top:0px;line-height:42px;font-size:14px;text-align:center;color:#FFF;text-transform: uppercase;">SERVER STATISTIC</div>
										<div style="background-color: #221d1b;">
											<div style="padding:20px;">
												<?php include('system/theme_inc/inc.statistic.php'); ?> <!-- Statistics -->
												<div align="center">
													<form action="" method="POST">
														<select name="mvclangc" class="mvcore-select-main" onchange="this.form.submit()" style="width:260px !important;">
															<option value="eng" <?php if($_SESSION['mvcoreLang']=='eng'){echo'selected';}else{};?>>English</option>
														</select>
													</form>
													
													<table><tr><td height="15px"></td></tr></table>
													
													<div align="center" class="server-time-stl">Server Time: <?php include('system/theme_inc/inc.date.php'); ?> <!-- Server Time Output --></div>
								
													<table><tr><td height="15px"></td></tr></table>
								
													<div align="center">
														<a style="padding-left:3px;padding-right:3px;" target="_blank" href="<?php echo $mvcore['yt_s_url']; ?>"><img src="/themes/<?php echo $mvcore['theme_dir'];?>/img/youtube.png" width="40px"></a>
														<a style="padding-left:3px;padding-right:3px;" target="_blank" href="<?php echo $mvcore['fb_s_url']; ?>"><img src="/themes/<?php echo $mvcore['theme_dir'];?>/img/facebook.png" width="40px"></a>
														<a style="padding-left:3px;padding-right:3px;" target="_blank" href="<?php echo $mvcore['tw_s_url']; ?>"><img src="/themes/<?php echo $mvcore['theme_dir'];?>/img/twitter.png" width="40px"></a>
														<a style="padding-left:3px;padding-right:3px;" target="_blank" href="<?php echo $mvcore['gp_s_url']; ?>"><img src="/themes/<?php echo $mvcore['theme_dir'];?>/img/googleplus.png" width="40px"></a>
														<a style="padding-left:3px;padding-right:3px;" target="_blank" href="<?php echo $mvcore['rss_s_url']; ?>"><img src="/themes/<?php echo $mvcore['theme_dir'];?>/img/rss.png" width="40px"></a>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</table>
								<table align="center"><tr><td height="1px"><div align="center"> <?php echo $mvcore['ads_spt_300x250']; ?> <!-- Medium Rectangle ( 300 x 250 ) --> </div></td></tr></table>
							<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" >
								<tr>
									<td valign="top">
										<div style="background: url('/themes/<?php echo $mvcore['theme_dir'];?>/img/module-title.png') repeat-y center top; background-size: 100%;height:42px;margin-top:0px;line-height:42px;font-size:14px;text-align:center;color:#FFF;text-transform: uppercase;">LATEST MARKET ITEMS</div>
										<div style="background-color: #221d1b;">
											<div style="padding:20px;">
												<?php include('system/theme_inc/inc.last_market_items.php'); ?> <!-- Market Latest Items -->
											</div>
										</div>
									</td>
								</tr>
							</table>
								<table align="center"><tr><td height="1px"><div align="center"></div></td></tr></table>
							<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" >
								<tr>
									<td valign="top">
										<div style="background: url('/themes/<?php echo $mvcore['theme_dir'];?>/img/module-title.png') repeat-y center top; background-size: 100%;height:42px;margin-top:0px;line-height:42px;font-size:14px;text-align:center;color:#FFF;text-transform: uppercase;">EVENT TIMER</div>
										<div style="background-color: #221d1b;">
											<div style="padding:20px;">
												<?php include('system/theme_inc/inc.event_timer.php'); ?> <!-- Event Timer -->
											</div>
										</div>
									</td>
								</tr>
							</table>
								<table align="center"><tr><td height="1px"><div align="center"></div></td></tr></table>
							<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" >
								<tr>
									<td valign="top">
										<div style="background: url('/themes/<?php echo $mvcore['theme_dir'];?>/img/module-title.png') repeat-y center top; background-size: 100%;height:42px;margin-top:0px;line-height:42px;font-size:14px;text-align:center;color:#FFF;text-transform: uppercase;">LATEST FORUM POSTS</div>
										<div style="background-color: #221d1b;">
											<div style="padding:20px;">
												<?php include('system/theme_inc/inc.forum_latest_posts.php'); ?> <!-- Latest Forum Posts -->
											</div>
										</div>
									</td>
								</tr>
							</table>
								<table align="center"><tr><td height="1px"><div align="center"></div></td></tr></table>
							<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" >
								<tr>
									<td valign="top">
										<div style="background: url('/themes/<?php echo $mvcore['theme_dir'];?>/img/module-title.png') repeat-y center top; background-size: 100%;height:42px;margin-top:0px;line-height:42px;font-size:14px;text-align:center;color:#FFF;text-transform: uppercase;">LATEST FORUM TOPICS</div>
										<div style="background-color: #221d1b;">
											<div style="padding:20px;">
												<?php include('system/theme_inc/inc.forum_latest_topics.php'); ?> <!-- Latest Forum Topics -->
											</div>
										</div>
									</td>
								</tr>
							</table>
							
							<div align="center"> <?php echo $mvcore['ads_spt_300x600']; ?> <!-- Large Skycraper ( 300 x 600 ) --> </div>
							
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr><td style="height:10px;"></td></tr>
		<tr align="center"><td><?php echo $mvcore['ads_spt_728x90']; ?> <!-- Leaderboard ( 728 x 90 ) --> </td></tr>
		<tr><td style="height:10px;"></td></tr>
		<tr align="right">
			<td style="background: url('/themes/<?php echo $mvcore['theme_dir'];?>/img/footer-bt.png') no-repeat center top; background-size: 100%; width:100%; height:45px;padding-top:1px;font-size:15px;color:#fff;padding-right:25px;">
				Copyright &copy; 2015-<?php echo date("Y"); ?> <a href="http://mvcore.lv">MVCore Website <?php echo $MVCoreVersion;?></a>
			</td>
		</tr>
	</table>
	</body>
</html>