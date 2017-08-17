
<?php if(!$mvcore['Guild_View'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Guild_View'] == 'on') { ?>
<h2 align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Rankings.html"><?php echo'Back To Rankings'; ?></a></td></tr></table></h2>
<?PHP
$Get_GNamef = clean_variable($_GET['op2']);
$guild_querye = mssql_query("SELECT g_mark,g_name,g_score,g_notice,g_master from guild where g_name='$Get_GNamef'");
$guildf = mssql_fetch_row($guild_querye);

if($guildf[2] == '') { $DropgScore = '0'; } else { $DropgScore = $guildf[2]; };

$sql_cef = mssql_query("SELECT count(*) FROM guildmember WHERE G_Name = '$Get_GNamef'");
$mcountf = mssql_result($sql_cef, 0, 0);
$mwr_index=3;
$mwr_acps=2;
$logo = urlencode(bin2hex($guildf[0]));
?>
			

										<table class="mvcore-table" cellpadding="0" cellspacing="0">
											
											<tr>
												<td colspan="4"><?php echo main_p_guild_view_guinform;?></td>
											</tr>
										
											<tr>
												<td rowspan="9" colspan="2">
													<img src="/system/decode_logo.php?decode=<?echo $logo;?>" style="border: 0;" />
												</td>
											</tr>
														<tr>
															<td><?php echo main_p_guild_view_guild;?>:</td>
															<td><a href='#'><?php echo $guildf[1];?></a></td>
														</tr>
														<tr>
															<td><?php echo main_p_guild_view_master;?>:</td>
															<td><a href='-id-character_view-id-<?php echo $guildf[4];?>.html'><?php echo $guildf[4];?></a></td>
														</tr>
														<tr>
															<td><?php echo main_p_guild_view_score;?>:</td>
															<td><?php echo $DropgScore;?></td>
														</tr>
														<tr>
															<td><?php echo main_p_guild_view_memb_count;?>:</td>
															<td><?php echo $mcountf;?></td>
														</tr>	
										</table>

					<br />
					<table class="mvcore-table" cellpadding="0" cellspacing="0">
						<tr class="mvcore-tabletr">
							<td>#</td>
							<td><?php echo main_p_guild_view_name;?></td>
							<td><?php echo main_p_guild_view_class;?></td>
							<td><?php echo main_p_guild_view_resets;?> <sup style="color: red;"><?php echo main_p_guild_view_gr;?></sup></td>
							<td><?php echo main_p_guild_view_level;?></td>
							<td><?php echo main_p_character_view_status;?></td>
							<td><?php echo main_p_guild_view_position;?></td>
							<td><?php echo echo_web_country;?></td>
						</tr>	
					<?PHP

					$Get_GName = clean_variable($_GET['op2']);

					$guild_query = mssql_query("SELECT top ".$mvcore['top_select']." name,g_status from guildmember where g_name='$Get_GName' order by G_Status desc");
					for($i=0;$i < mssql_num_rows($guild_query);++$i) {
					$row = mssql_fetch_row($guild_query);

					$sql_char = mssql_query("Select clevel,".$mvcore['rr_column_name'].",class,strength,dexterity,vitality,energy,leadership,accountid,MapNumber,".$mvcore['gr_column_name'].",MapPosX,MapPosY,PkLevel from character where name='$row[0]'");
					$show = mssql_fetch_row($sql_char);

					$status_reults3 = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='$show[8]'");
					$status3 = mssql_fetch_row($status_reults3);

					switch ($show[13]) { 
					case 6: $hstatus="Phonoman"; break;
					Case 5: $hstatus="Phonoman lvl 2"; break;
					Case 4: $hstatus="Phonoman lvl 1"; break;
					Case 3: $hstatus="Commoner"; break;
					Case 2: $hstatus="Hero lvl 1"; break;
					Case 1: $hstatus="Hero lvl 2"; break;
					Case 0: $hstatus="Hero"; break;
					};

					switch ($show[2]) { 
					case 0: case 1: case 2: Case 3: $gclassimg="01"; break;
					Case 16: case 17: case 18: Case 19: $gclassimg="02"; break;
					Case 32: Case 33: Case 34: Case 35: $gclassimg="03"; break;
					Case 48: Case 49: Case 50: Case 51: $gclassimg="04"; break;
					Case 64: Case 65: Case 66: Case 67: $gclassimg="05"; break;
					Case 80: Case 81: Case 82: Case 83: $gclassimg="06"; break;
					Case 96: Case 97: Case 98: Case 99: $gclassimg="07"; break;};

					switch ($status3[0]) { 
					case 0: $SStatus2="<font color='red'>".gs_status_offline."</font>"; break;
					case 1: $SStatus2="<font color='green'>".gs_status_online."</font>"; break;
					Default: $SStatus2="<font color='red'>".gs_status_offline."</font>"; break;
					};

					$gclass = getClass($show[2]);
					$map = getMap($show[9]);

					switch ($row[1]) { case 32: $gstatuss="<span style='color: green;font-weight: bold;'>".main_p_guild_view_battlemaster."</span>"; break; Case 128: $gstatuss="<span style='color: red;font-weight: bold;'>".main_p_guild_view_guildmaster."</span>"; break; Case 64: $gstatuss="<span style='color: red;font-weight: bold;'>".main_p_guild_view_assistant."</span>"; break; Case 0: $gstatuss="".main_p_guild_view_memb.""; break;};

					$rank = $i+1;

					$tr_color_2 = "even2"; 
					$tr_color_1 = "even";
					$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;
					
					$OnlineIMG = chOnlineImg($show[1], $mvcore_medb_s, $mvcore['onoff_style']);
					$mvcFlag = outMvcFlag($row[0], $mvcore_medb_i);
					
					echo "

								<tr>
								<td>$rank</td>
								<td><a href='-id-character_view-id-$row[0].html'>$row[0] $OnlineIMG</a></td>
								<td>$gclass</td>
								<td>$show[1] <sup style='color: red;'>$show[10]</sup></td>
								<td>$show[0]</td>
								<td>$SStatus2</td>
								<td>$gstatuss</td>
								<td>$mvcFlag</td>
								</tr>

					";
					} 
	$mwr_index=1;
$mwr_acps=1;
					?>
					</table>
<?php } ?>