<style type="text/css">
	textarea {
		font: normal 15px consolas;
		resize: none;
	}
			
	*:focus {
		outline: none;
	}
</style>
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
			<li <?php if($_GET['op3'] == 'item_manage') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Item_And_Option_manage-id-item_manage.html" title=""><span style="height:30px;">Item Manage</span></a></li>
			<li <?php if($_GET['op3'] == 'itemsetoption_manage') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Item_And_Option_manage-id-itemsetoption_manage.html" title=""><span style="height:30px;">Item Set Option Manage</span></a></li>
			<li <?php if($_GET['op3'] == 'Itemsettype_manage') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Item_And_Option_manage-id-Itemsettype_manage.html" title=""><span style="height:30px;">Item Set Type Manage</span></a></li>
            <li <?php if($_GET['op3'] == 'socket_manage') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Item_And_Option_manage-id-socket_manage.html" title=""><span style="height:30px;">Socket Option Manage</span></a></li>
            <li <?php if($_GET['op3'] == 'Harmony_manage') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Item_And_Option_manage-id-Harmony_manage.html" title=""><span style="height:30px;">Harmony Option Manage</span></a></li>
		</ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['Webshop'] != 'on') { echo '<font color="red"><u><b>Webshop</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>

		<?php if($_GET['op3'] == 'item_manage') { ?> <!-- item_manage -->
		
		<div class="widget fluid" id="onaccsubCharfacas">
			<div class="whead">
					<div class="formRow" style="height:0px;">
						<div class="grid2" style="margin-top:-17px;margin-left:-13px;"><h6>Item Data Modify</h6></div>
						<div class="grid1" style="margin-top:-14px;float:right;"><a href="#" onclick="SAR.find(); return false;" id="find" class="buttonM bGreen" style="float:right;color:#ffffff;">Search</a></div>
						<div class="grid3" style="margin-top:-14px;float:right;"><input id="termSearch" name="termSearch" type="text"></div>
                    </div>
			</div>
						<?php
							if(isset($_POST['LoadSaveContentb1'])){
							$new_db = fopen("system/engine_item_configs".$db_name_multi_item."/Item.txt", "w"); //configs patch
							$echtest_fix = stripslashes($_POST['LoadSaveContent']);
							$data ="".$echtest_fix."";
							fwrite($new_db,$data); fclose($new_db); chmod("system/engine_item_configs".$db_name_multi_item."/Item.txt", 0777);
							
								$handlef = file_get_contents("system/engine_item_configs".$db_name_multi_item."/Item.txt");
								if ($handlef) {
									
									$handle = str_replace('				','	',$handlef);
									$handle = str_replace('			','	',$handle);
									$handle = str_replace('		','	',$handle);
									
									$delete_data = mssql_query("DELETE FROM MVCore_Wshopp");
										
									for( $i = 0 ; $i < 16; $i++ ) {
										$expl_category = explode('EndOfCat', $handle);
									
										$separator = "\r\n";
										$line = strtok($expl_category[$i], $separator);
										while ($line !== false) {
											
											$line = strtok( $separator );
											
											$line_read = explode('	', $line);
											if($line_read[8] == '' || $line == '' || $line == ' ' || $line == '	' || $line == 'EndOfCat' || $line == 'end' || !$line >= '16' || substr($line,0,2) == '//') { //Disables empty and useless lines
											} else {

												if($line_read[1] == '1') { $isluck = '1'; } else { $isluck = '0'; }; //Luck
												if($line_read[2] >= '1') { $iskill = $line_read[2]; } else { $iskill = '0'; }; //Skill
												if($line_read[9] <= '0') { $cost = '1'; } else { $cost = $line_read[9]; }; //Cost
													
												switch ($line_read[18]) {case 0: $class1="-1"; break;case 1: $class1="00"; break;case 2: $class1="01"; break;case 3: $class1="02"; break;default: $class1="-1"; break;};
												switch ($line_read[19]) {case 0: $class2="-1"; break;Case 1: $class2="016"; break;case 2: $class2="017"; break;case 3: $class2="018"; break;default: $class2="-1"; break;};
												switch ($line_read[20]) {case 0: $class3="-1"; break;Case 1: $class3="032"; break;case 2: $class3="033"; break;case 3: $class3="034"; break;default: $class3="-1"; break;};
												switch ($line_read[21]) {case 0: $class4="-1"; break;Case 1: $class4="048"; break;case 3: $class4="050"; break;default: $class4="-1"; break;};
												switch ($line_read[22]) {case 0: $class5="-1"; break;Case 1: $class5="064"; break;case 3: $class5="066"; break;default: $class5="-1"; break;};
												switch ($line_read[23]) {case 0: $class6="-1"; break;Case 1: $class6="080"; break;case 2: $class6="081"; break;case 3: $class6="082"; break;default: $class6="-1"; break;};
												switch ($line_read[24]) {case 0: $class7="-1"; break;case 1: $class7="096"; break;case 2: $class7="097"; break;default: $class7="-1"; break;};
												switch ($line_read[25]) {case 0: $class8="-1"; break;case 1: $class8="0112"; break;case 2: $class8="0113"; break;default: $class8="-1"; break;};
													
												$classes = ''.$class1.','.$class2.','.$class3.','.$class4.','.$class5.','.$class6.','.$class7.','.$class8.''; //Classes

												$item_name = str_replace('"','',$line_read[8]); //Name
												$item_name = str_replace("'",'',$item_name); //Name
												$item_cost = $cost; //Item Cost Calculation
												$item_cost_zen = $cost * 100; //Item Cost Calculation As Zen
												
													$Insert_DB = mssql_query("INSERT INTO MVCore_Wshopp (category, id, x, y, item_name, item_cost, zen_cost, max_level, has_luck, has_skill, is_ancient, is_harmony, is_socket, has_refinery, max_excellent, clases, durability, equip_level, can_buy, can_buy_w_money1, can_buy_w_money2, can_buy_w_zen, bought_count) VALUES (".$i.",".$line_read[0].",".$line_read[3].",".$line_read[4].",'".$item_name."',".$item_cost.",".$item_cost_zen.",".$line_read[6].",".$isluck.",".$iskill.",".$line_read[5].",".$line_read[16].",".$line_read[15].",".$line_read[14].",6,'".$classes."',".$line_read[13].",	".$line_read[17].",	".$line_read[7].",	".$line_read[11].",	".$line_read[12].",	".$line_read[10].",	0)");

											}
										}
									}
									fclose($handle);
								} else {}
							
								echo'<script>$.jGrowl("Item data successfully saved.", { header: "<font color=green>Success</font>" });</script>';
							};
						?>
			<form method="POST" action="">
				<table width="100%" style="text-align:left;">
					<tr><td style="height:15px;text-align:center;"><textarea wrap="off" spellcheck="false" id="spellHides" style="width:100%;text-decoration:none;" rows="25" name="LoadSaveContent"><?php require('system/engine_item_configs'.$db_name_multi_item.'/Item.txt');?></textarea></td></tr>
					<tr>
						<td colspan="2" style="text-align:left;"><button name="LoadSaveContentb1" class="buttonM bGreen" style="width:100%;height:50px;margin-top:0px;float:right;color:#ffffff;" type="submit">Save Item File</button></td>
					</tr>
				</table>
			</form>
		</div>
		<br>
		<?php }; ?>
		
		<?php if($_GET['op3'] == 'itemsetoption_manage') { ?> <!-- itemsetoption_manage -->
		
		<div class="widget fluid" id="onaccsubCharfacas">
			<div class="whead">
					<div class="formRow" style="height:0px;">
						<div class="grid2" style="margin-top:-17px;margin-left:-13px;"><h6>Item Set Option Data Modify</h6></div>
						<div class="grid1" style="margin-top:-14px;float:right;"><a href="#" onclick="SAR.find(); return false;" id="find" class="buttonM bGreen" style="float:right;color:#ffffff;">Search</a></div>
						<div class="grid3" style="margin-top:-14px;float:right;"><input id="termSearch" name="termSearch" type="text"></div>
                    </div>
			</div>
						<?php
							if(isset($_POST['LoadSaveContentb1ef'])){
							$new_db = fopen("system/engine_item_configs".$db_name_multi_item."/ItemSetOption.txt", "w"); //configs patch
							$echtest_fix = stripslashes($_POST['LoadSaveContent']);
							$data ="".$echtest_fix."";
							fwrite($new_db,$data); fclose($new_db); chmod("system/engine_item_configs".$db_name_multi_item."/ItemSetOption.txt", 0777);
							
							$handletwo = file_get_contents("system/engine_item_configs".$db_name_multi_item."/ItemSetOption.txt");
							if ($handletwo) {
									
									$delete_data = mssql_query("DELETE FROM MVCore_Wshopp_Ancient_Opt");
									
									$separator = "\r\n";
									$line = strtok($handletwo, $separator);
									while ($line !== false) {

										$line = strtok( $separator );
										
										$line_read = explode('	', $line);

										$repl_name = str_replace('"','',$line_read[1]);
										$repl_name = str_replace("'",'',$repl_name);
										
										if($line == '' || $line == ' ' || $line == '	' || $line == 'EndOfCat' || $line == 'end' || !$line >= '16' || substr($line,0,2) == '//') { 
											//Disables empty and useless lines
										} else {

										for( $i = 0 ; $i < 39; $i++ ) { //19 Options Posible
											
											$fs = $i + 1;
											if($i >= '2' && $i <= '39') {
												switch ($line_read[$i]) {
												case -1: $dfo[$i] = "" ; break;
												case 0 : $dfo[$i] = "Strength + ".$line_read[$fs]."<br>" ; break;
												case 1 : $dfo[$i] = "Agility + ".$line_read[$fs]."<br>" ; break;
												case 2 : $dfo[$i] = "Energy + ".$line_read[$fs]."<br>" ; break;
												case 3 : $dfo[$i] = "Stamina + ".$line_read[$fs]."<br>" ; break;
												case 5 : $dfo[$i] = "Increase minimum attack Damage + ".$line_read[$fs]."<br>" ; break;
												case 6 : $dfo[$i] = "Increase maximum attack Damage + ".$line_read[$fs]."<br>" ; break;
												case 7 : $dfo[$i] = "Increase Wizardry Damage + ".$line_read[$fs]."<br>" ; break;
												case 8 : $dfo[$i] = "Increase Damage + ".$line_read[$fs]."<br>" ; break;
												case 9 : $dfo[$i] = "Increase attack successfull Rate + ".$line_read[$fs]."<br>" ; break;
												case 10 : $dfo[$i] = "Increase defence + ".$line_read[$fs]."<br>" ; break;
												case 11 : $dfo[$i] = "Increase maximum life + ".$line_read[$fs]."<br>" ; break;
												case 12 : $dfo[$i] = "Increase maximum mana + ".$line_read[$fs]."<br>" ; break;
												case 13 : $dfo[$i] = "Increase maximum AG + ".$line_read[$fs]."<br>" ; break;
												case 14 : $dfo[$i] = "Increase AG + ".$line_read[$fs]."<br>" ; break;
												case 15 : $dfo[$i] = "Increase Critical Damage Rate + ".$line_read[$fs]."<br>" ; break;
												case 16 : $dfo[$i] = "Increase critical Damage + ".$line_read[$fs]."<br>" ; break;
												case 17 : $dfo[$i] = "Increase Excellent Damage Rate + ".$line_read[$fs]."<br>" ; break;
												case 18 : $dfo[$i] = "Increase Excellent Damage + ".$line_read[$fs]."<br>" ; break;
												case 19 : $dfo[$i] = "Increase Skill Damage + ".$line_read[$fs]."<br>" ; break;
												case 20 : $dfo[$i] = "Double Damage Rate + ".$line_read[$fs]."<br>" ; break;
												case 21 : $dfo[$i] = "Ignore Enemy Defense Skill + ".$line_read[$fs]."<br>" ; break;
												case 22 : $dfo[$i] = "Increase defensive skill while using shields + ".$line_read[$fs]."<br>" ; break;
												case 23 : $dfo[$i] = "Increase damage with 2 handed weapons + ".$line_read[$fs]."<br>" ; break;
												};

											};
											
											
										};
										
										$options_list = ''.$dfo[2].''.$dfo[4].''.$dfo[6].''.$dfo[8].''.$dfo[10].''.$dfo[12].''.$dfo[14].''.$dfo[16].''.$dfo[18].''.$dfo[20].''.$dfo[22].''.$dfo[24].''.$dfo[26].''.$dfo[28].''.$dfo[30].''.$dfo[32].''.$dfo[34].''.$dfo[36].''.$dfo[38].'';
										
										$Insert_DB = mssql_query("INSERT INTO MVCore_Wshopp_Ancient_Opt (anc_id,anc_name,options)VALUES (".$line_read[0].",'".$repl_name."','".$options_list."')");

										}
									}
								fclose($handletwo);
							} else {}
	
								echo'<script>$.jGrowl("Item set option data successfully saved.", { header: "<font color=green>Success</font>" });</script>';
							};
						?>
			<form method="POST" action="">
				<table width="100%" style="text-align:left;">
					<tr><td style="height:15px;text-align:center;"><textarea wrap="off" spellcheck="false" id="spellHides" style="width:100%;text-decoration:none;" rows="25" name="LoadSaveContent"><?php require('system/engine_item_configs'.$db_name_multi_item.'/ItemSetOption.txt');?></textarea></td></tr>
					<tr>
						<td colspan="2" style="text-align:left;"><button name="LoadSaveContentb1ef" class="buttonM bGreen" style="width:100%;height:50px;margin-top:0px;float:right;color:#ffffff;" type="submit">Save Set Option File</button></td>
					</tr>
				</table>
			</form>
		</div>
		<br>
		<div style="float:left;">
Paste here txt from your server files<br>
<br>
Rename "end" as "EndOfCat"<br><br><br>
		</div>
		<?php }; ?>
		
		<?php if($_GET['op3'] == 'Itemsettype_manage') { ?> <!-- Itemsettype_manage -->
		
		<div class="widget fluid" id="onaccsubCharfacas">
			<div class="whead">
					<div class="formRow" style="height:0px;">
						<div class="grid2" style="margin-top:-17px;margin-left:-13px;"><h6>Item Set Type Data Modify</h6></div>
						<div class="grid1" style="margin-top:-14px;float:right;"><a href="#" onclick="SAR.find(); return false;" id="find" class="buttonM bGreen" style="float:right;color:#ffffff;">Search</a></div>
						<div class="grid3" style="margin-top:-14px;float:right;"><input id="termSearch" name="termSearch" type="text"></div>
                    </div>
			</div>
						<?php
							if(isset($_POST['LoadSaveContentb1e'])){
							$new_db = fopen("system/engine_item_configs".$db_name_multi_item."/ItemSetType.txt", "w"); //configs patch
							$echtest_fix = stripslashes($_POST['LoadSaveContent']);
							$data ="".$echtest_fix."";
							fwrite($new_db,$data); fclose($new_db); chmod("system/engine_item_configs".$db_name_multi_item."/ItemSetType.txt", 0777);
							
							$handle = file_get_contents("system/engine_item_configs".$db_name_multi_item."/ItemSetType.txt");
							if ($handle) {
								
								$delete_data = mssql_query("DELETE FROM MVCore_Wshopp_Ancient");
									
								$expl_category = explode('EndOfCat', $handle);
								
								for( $i = 0 ; $i < count($expl_category); $i++ ) {
									
									$separator = "\r\n";
									$line = strtok($expl_category[$i], $separator);
									while ($line !== false) {

										$line = strtok( $separator );
										
										$line_read = explode('	', $line);

										if($line == '' || $line == ' ' || !$line >= '16' || substr($line,0,2) == '//') { 
											//Disables empty and useless lines
										} else {
											$Insert_DB = mssql_query("INSERT INTO MVCore_Wshopp_Ancient (anc_name,anc_name2,item_id,item_cat)VALUES (".$line_read[1].",".$line_read[2].",".$line_read[0].",".$i.")");
										}
									}
								}
								fclose($handle);
							} else {}
	
								echo'<script>$.jGrowl("Item set type data successfully saved.", { header: "<font color=green>Success</font>" });</script>';
							};
						?>
			<form method="POST" action="">
				<table width="100%" style="text-align:left;">
					<tr><td style="height:15px;text-align:center;"><textarea wrap="off" spellcheck="false" id="spellHides" style="width:100%;text-decoration:none;" rows="25" name="LoadSaveContent"><?php require('system/engine_item_configs'.$db_name_multi_item.'/ItemSetType.txt');?></textarea></td></tr>
					<tr>
						<td colspan="2" style="text-align:left;"><button name="LoadSaveContentb1e" class="buttonM bGreen" style="width:100%;height:50px;margin-top:0px;float:right;color:#ffffff;" type="submit">Save Set Type File</button></td>
					</tr>
				</table>
			</form>
		</div>
		<br>
		<div style="float:left;">
Paste here txt from your server files<br>
<br>
Rename "end" as "EndOfCat"<br><br><br>
		</div>
		<?php }; ?>
		
		<?php if($_GET['op3'] == 'socket_manage') { ?> <!-- socket_manage -->
		<div class="widget">
            <div class="whead"><h6>Socket Option Add</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Socket ID</td>
						<td>Socket Name</td>
                        <td>Type</td>
						<td>Socket Cost</td>
						<td>Socket Element</td>
						<td>Option</td>
                    </tr>
                </thead>
                <tbody id="echotabled">
					<tr>
						<td width="100px">
							<div class="formRow">
								<div class="grid9"><input id="sk_idsa" name="sk_idsa" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="sk_namea" name="sk_namea" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td width="250px">
							<div class="formRow">
								<div class="grid9">
									
									<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_typea" name="sk_typea" data-placeholder="Choose a option..." class="select" tabindex="2">
										<option value="0"> - </option>
										<option value="1" style="padding-left:5px;">For Weapons</option>
										<option value="2" style="padding-left:5px;">For Set Items</option>
									</select>
								</div>             
							</div>
						</td>
						<td width="150px">
							<div class="formRow">
								<div class="grid9"><input id="sk_costa" name="sk_costa" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td width="250px">
							<div class="formRow">
								<div class="grid9">
									<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_elementa" name="sk_elementa" data-placeholder="Choose a option..." class="select" tabindex="2">
										<option value="1" style="padding-left:5px;">Empty</option>
										<option value="2" style="padding-left:5px;">Ground</option>
										<option value="3" style="padding-left:5px;">Ice</option>
										<option value="4" style="padding-left:5px;">Lightning</option>
										<option value="5" style="padding-left:5px;">Water</option>
										<option value="6" style="padding-left:5px;">Wind</option>
										<option value="7" style="padding-left:5px;">Fire</option>
									</select>
								</div>             
							</div>
						</td>
						<td align="center">
							<a href="#" id="sklinksubmitIDsa" class="buttonM bDefault mb10 mt5">Add Socket</a>
						</td>
					</tr>
				</tbody>
            </table>
        </div>
		<div class="widget rightTabs tableTabs"> 
            <div class="whead"><h6>Socket Option Manage</h6></div>      
            <div class="tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
                <ul role="tablist" class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
                    <li aria-selected="true"  aria-labelledby="ui-id-1" aria-controls="ttab1" tabindex="0"  role="tab" class="ui-state-default ui-corner-top ui-tabs-active ui-state-active"><a id="ui-id-1" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#ttab1">Empty Seed</a></li>
                    <li aria-selected="false" aria-labelledby="ui-id-2" aria-controls="ttab2" tabindex="-1" role="tab" class="ui-state-default ui-corner-top"><a id="ui-id-2" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#ttab2">Ground Seed</a></li>
                    <li aria-selected="false" aria-labelledby="ui-id-3" aria-controls="ttab3" tabindex="-1" role="tab" class="ui-state-default ui-corner-top"><a id="ui-id-3" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#ttab3">Ice Seed</a></li>
                    <li aria-selected="false" aria-labelledby="ui-id-4" aria-controls="ttab4" tabindex="-1" role="tab" class="ui-state-default ui-corner-top"><a id="ui-id-4" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#ttab4">Lightning Seed</a></li>
					<li aria-selected="false" aria-labelledby="ui-id-5" aria-controls="ttab5" tabindex="-1" role="tab" class="ui-state-default ui-corner-top"><a id="ui-id-5" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#ttab5">Water Seed</a></li>
					<li aria-selected="false" aria-labelledby="ui-id-6" aria-controls="ttab6" tabindex="-1" role="tab" class="ui-state-default ui-corner-top"><a id="ui-id-6" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#ttab6">Wind Seed</a></li>
					<li aria-selected="false" aria-labelledby="ui-id-7" aria-controls="ttab7" tabindex="-1" role="tab" class="ui-state-default ui-corner-top"><a id="ui-id-7" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#ttab7">Fire Seed</a></li>
                </ul>
					<!-- ss -->
                <div style="display: none;" aria-hidden="true" aria-expanded="false" role="tabpanel" class="ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-1" id="ttab1">
                    <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
							<tr>
								<td>Socket ID</td>
								<td>Socket Name</td>
								<td>Type</td>
								<td>Socket Cost</td>
								<td>Socket On/Off</td>
								<td>Option</td>
							</tr>
						</thead>
                        <tbody>
                            <?php
							$sys_startsa = mssql_query("select top 500 sok_id,sok_name,type,sok_cost,sok_on_off from MVCore_Wshopp_Socket where sok_element = '1' order by sok_name asc");
							for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsa);
								
									if($drop_info[2] == '0') { $option_s01[$i] = 'selected'; $empt_txt = ' - '; };
									if($drop_info[2] == '1') { $option_s11[$i] = 'selected'; };
									if($drop_info[2] == '2') { $option_s21[$i] = 'selected'; };
									
									if($drop_info[4] == '0') { $option_sonof2[$i] = 'selected'; };
									if($drop_info[4] == '1') { $option_sonof1[$i] = 'selected'; };
									
								echo'<input id="sk_id_ori'.$drop_info[0].'" name="sk_id_ori'.$drop_info[0].'" type="hidden" value="'.$drop_info[0].'">
											<tr>
												<td width="100px">
													<div class="formRow">
														<div class="grid9"><input id="sk_ids'.$drop_info[0].'" name="sk_ids'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[0].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="sk_name'.$drop_info[0].'" name="sk_name'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[1].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_type'.$drop_info[0].'" name="sk_type'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="0" '.$option_s01[$i].'> '.$empt_txt.' </option>
																<option value="1" style="padding-left:5px;" '.$option_s11[$i].'>For Weapons</option>
																<option value="2" style="padding-left:5px;" '.$option_s21[$i].'>For Set Items</option>
															</select>
														</div>             
													</div>
												</td>
												<td width="150px">
													<div class="formRow">
														<div class="grid9"><input id="sk_cost'.$drop_info[0].'" name="sk_cost'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[3].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_onoff'.$drop_info[0].'" name="sk_onoff'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="0" '.$option_sonof2[$i].'> - </option>
																<option value="1" style="padding-left:5px;" '.$option_sonof1[$i].'>Enabled ( will be in use )</option>
																<option value="0" style="padding-left:5px;" '.$option_sonof2[$i].'>Disabled ( wont be in use )</option>
															</select>
														</div>             
													</div>
												</td>
												<td align="center" width="260px">
													<a href="#" onclick="sklinksubmitID('.$drop_info[0].'); return false;" class="buttonM bGreen" style="color:#ffffff;">Save Socket</a>
													<a href="#" onclick="sklinksubmitdellID('.$drop_info[0].'); return false;" class="buttonM bDefault mb10 mt5">Delete Socket</a>
												</td>
											</tr>
								';
							};
							?>
                        </tbody>
                    </table>
                </div>
					<!-- ss -->
                <div aria-hidden="false" aria-expanded="true" style="display: block;" role="tabpanel" class="ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-2" id="ttab2">
                    <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
							<tr>
								<td>Socket ID</td>
								<td>Socket Name</td>
								<td>Type</td>
								<td>Socket Cost</td>
								<td>Socket On/Off</td>
								<td>Option</td>
							</tr>
						</thead>
                        <tbody>
                            <?php
							$sys_startsa = mssql_query("select top 500 sok_id,sok_name,type,sok_cost,sok_on_off from MVCore_Wshopp_Socket where sok_element = '2' order by sok_name asc");
							for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsa);
								
									if($drop_info[2] == '1') { $option_s12[$i] = 'selected'; };
									if($drop_info[2] == '2') { $option_s22[$i] = 'selected'; };
									
									if($drop_info[4] == '0') { $option_sonof12[$i] = 'selected'; };
									if($drop_info[4] == '1') { $option_sonof11[$i] = 'selected'; };
									
								echo'<input id="sk_id_ori'.$drop_info[0].'" name="sk_id_ori'.$drop_info[0].'" type="hidden" value="'.$drop_info[0].'">
											<tr>
												<td width="100px">
													<div class="formRow">
														<div class="grid9"><input id="sk_ids'.$drop_info[0].'" name="sk_ids'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[0].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="sk_name'.$drop_info[0].'" name="sk_name'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[1].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_type'.$drop_info[0].'" name="sk_type'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="1" style="padding-left:5px;" '.$option_s12[$i].'>For Weapons</option>
																<option value="2" style="padding-left:5px;" '.$option_s22[$i].'>For Set Items</option>
															</select>
														</div>             
													</div>
												</td>
												<td width="150px">
													<div class="formRow">
														<div class="grid9"><input id="sk_cost'.$drop_info[0].'" name="sk_cost'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[3].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_onoff'.$drop_info[0].'" name="sk_onoff'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="0" '.$option_sonof12[$i].'> - </option>
																<option value="1" style="padding-left:5px;" '.$option_sonof11[$i].'>Enabled ( will be in use )</option>
																<option value="0" style="padding-left:5px;" '.$option_sonof12[$i].'>Disabled ( wont be in use )</option>
															</select>
														</div>             
													</div>
												</td>
												<td align="center" width="260px">
													<a href="#" onclick="sklinksubmitID('.$drop_info[0].'); return false;" class="buttonM bGreen" style="color:#ffffff;">Save Socket</a>
													<a href="#" onclick="sklinksubmitdellID('.$drop_info[0].'); return false;" class="buttonM bDefault mb10 mt5">Delete Socket</a>
												</td>
											</tr>
								';
							};
							?>
                        </tbody>
                    </table>
                </div>
					<!-- ss -->
				<div aria-hidden="false" aria-expanded="true" style="display: block;" role="tabpanel" class="ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-3" id="ttab3">
                    <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
							<tr>
								<td>Socket ID</td>
								<td>Socket Name</td>
								<td>Type</td>
								<td>Socket Cost</td>
								<td>Socket On/Off</td>
								<td>Option</td>
							</tr>
						</thead>
                        <tbody>
                            <?php
							$sys_startsa = mssql_query("select top 500 sok_id,sok_name,type,sok_cost,sok_on_off from MVCore_Wshopp_Socket where sok_element = '3' order by sok_name asc");
							for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsa);
								
									if($drop_info[2] == '1') { $option_s13[$i] = 'selected'; };
									if($drop_info[2] == '2') { $option_s23[$i] = 'selected'; };
									
									if($drop_info[4] == '0') { $option_sonof22[$i] = 'selected'; };
									if($drop_info[4] == '1') { $option_sonof21[$i] = 'selected'; };
									
								echo'<input id="sk_id_ori'.$drop_info[0].'" name="sk_id_ori'.$drop_info[0].'" type="hidden" value="'.$drop_info[0].'">
											<tr>
												<td width="100px">
													<div class="formRow">
														<div class="grid9"><input id="sk_ids'.$drop_info[0].'" name="sk_ids'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[0].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="sk_name'.$drop_info[0].'" name="sk_name'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[1].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_type'.$drop_info[0].'" name="sk_type'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="1" style="padding-left:5px;" '.$option_s13[$i].'>For Weapons</option>
																<option value="2" style="padding-left:5px;" '.$option_s23[$i].'>For Set Items</option>
															</select>
														</div>             
													</div>
												</td>
												<td width="150px">
													<div class="formRow">
														<div class="grid9"><input id="sk_cost'.$drop_info[0].'" name="sk_cost'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[3].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_onoff'.$drop_info[0].'" name="sk_onoff'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="0" '.$option_sonof22[$i].'> - </option>
																<option value="1" style="padding-left:5px;" '.$option_sonof21[$i].'>Enabled ( will be in use )</option>
																<option value="0" style="padding-left:5px;" '.$option_sonof22[$i].'>Disabled ( wont be in use )</option>
															</select>
														</div>             
													</div>
												</td>
												<td align="center" width="260px">
													<a href="#" onclick="sklinksubmitID('.$drop_info[0].'); return false;" class="buttonM bGreen" style="color:#ffffff;">Save Socket</a>
													<a href="#" onclick="sklinksubmitdellID('.$drop_info[0].'); return false;" class="buttonM bDefault mb10 mt5">Delete Socket</a>
												</td>
											</tr>
								';
							};
							?>
                        </tbody>
                    </table>
                </div>
					<!-- ss -->
				<div aria-hidden="false" aria-expanded="true" style="display: block;" role="tabpanel" class="ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-4" id="ttab4">
                    <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
							<tr>
								<td>Socket ID</td>
								<td>Socket Name</td>
								<td>Type</td>
								<td>Socket Cost</td>
								<td>Socket On/Off</td>
								<td>Option</td>
							</tr>
						</thead>
                        <tbody>
                            <?php
							$sys_startsa = mssql_query("select top 500 sok_id,sok_name,type,sok_cost,sok_on_off from MVCore_Wshopp_Socket where sok_element = '4' order by sok_name asc");
							for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsa);
								
									if($drop_info[2] == '1') { $option_s14[$i] = 'selected'; };
									if($drop_info[2] == '2') { $option_s24[$i] = 'selected'; };
									
									if($drop_info[4] == '0') { $option_sonof32[$i] = 'selected'; };
									if($drop_info[4] == '1') { $option_sonof31[$i] = 'selected'; };
									
								echo'<input id="sk_id_ori'.$drop_info[0].'" name="sk_id_ori'.$drop_info[0].'" type="hidden" value="'.$drop_info[0].'">
											<tr>
												<td width="100px">
													<div class="formRow">
														<div class="grid9"><input id="sk_ids'.$drop_info[0].'" name="sk_ids'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[0].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="sk_name'.$drop_info[0].'" name="sk_name'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[1].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_type'.$drop_info[0].'" name="sk_type'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="1" style="padding-left:5px;" '.$option_s14[$i].'>For Weapons</option>
																<option value="2" style="padding-left:5px;" '.$option_s24[$i].'>For Set Items</option>
															</select>
														</div>             
													</div>
												</td>
												<td width="150px">
													<div class="formRow">
														<div class="grid9"><input id="sk_cost'.$drop_info[0].'" name="sk_cost'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[3].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_onoff'.$drop_info[0].'" name="sk_onoff'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="0" '.$option_sonof32[$i].'> - </option>
																<option value="1" style="padding-left:5px;" '.$option_sonof31[$i].'>Enabled ( will be in use )</option>
																<option value="0" style="padding-left:5px;" '.$option_sonof32[$i].'>Disabled ( wont be in use )</option>
															</select>
														</div>             
													</div>
												</td>
												<td align="center" width="260px">
													<a href="#" onclick="sklinksubmitID('.$drop_info[0].'); return false;" class="buttonM bGreen" style="color:#ffffff;">Save Socket</a>
													<a href="#" onclick="sklinksubmitdellID('.$drop_info[0].'); return false;" class="buttonM bDefault mb10 mt5">Delete Socket</a>
												</td>
											</tr>
								';
							};
							?>
                        </tbody>
                    </table>
                </div>
					<!-- ss -->
				<div aria-hidden="false" aria-expanded="true" style="display: block;" role="tabpanel" class="ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-5" id="ttab5">
                    <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
							<tr>
								<td>Socket ID</td>
								<td>Socket Name</td>
								<td>Type</td>
								<td>Socket Cost</td>
								<td>Socket On/Off</td>
								<td>Option</td>
							</tr>
						</thead>
                        <tbody>
                            <?php
							$sys_startsa = mssql_query("select top 500 sok_id,sok_name,type,sok_cost,sok_on_off from MVCore_Wshopp_Socket where sok_element = '5' order by sok_name asc");
							for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsa);
								
									if($drop_info[2] == '1') { $option_s15[$i] = 'selected'; };
									if($drop_info[2] == '2') { $option_s25[$i] = 'selected'; };
									
									if($drop_info[4] == '0') { $option_sonof42[$i] = 'selected'; };
									if($drop_info[4] == '1') { $option_sonof41[$i] = 'selected'; };
									
								echo'<input id="sk_id_ori'.$drop_info[0].'" name="sk_id_ori'.$drop_info[0].'" type="hidden" value="'.$drop_info[0].'">
											<tr>
												<td width="100px">
													<div class="formRow">
														<div class="grid9"><input id="sk_ids'.$drop_info[0].'" name="sk_ids'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[0].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="sk_name'.$drop_info[0].'" name="sk_name'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[1].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_type'.$drop_info[0].'" name="sk_type'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="1" style="padding-left:5px;" '.$option_s15[$i].'>For Weapons</option>
																<option value="2" style="padding-left:5px;" '.$option_s25[$i].'>For Set Items</option>
															</select>
														</div>             
													</div>
												</td>
												<td width="150px">
													<div class="formRow">
														<div class="grid9"><input id="sk_cost'.$drop_info[0].'" name="sk_cost'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[3].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_onoff'.$drop_info[0].'" name="sk_onoff'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="0" '.$option_sonof42[$i].'> - </option>
																<option value="1" style="padding-left:5px;" '.$option_sonof41[$i].'>Enabled ( will be in use )</option>
																<option value="0" style="padding-left:5px;" '.$option_sonof42[$i].'>Disabled ( wont be in use )</option>
															</select>
														</div>             
													</div>
												</td>
												<td align="center" width="260px">
													<a href="#" onclick="sklinksubmitID('.$drop_info[0].'); return false;" class="buttonM bGreen" style="color:#ffffff;">Save Socket</a>
													<a href="#" onclick="sklinksubmitdellID('.$drop_info[0].'); return false;" class="buttonM bDefault mb10 mt5">Delete Socket</a>
												</td>
											</tr>
								';
							};
							?>
                        </tbody>
                    </table>
                </div>
					<!-- ss -->
				<div aria-hidden="false" aria-expanded="true" style="display: block;" role="tabpanel" class="ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-6" id="ttab6">
                    <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
							<tr>
								<td>Socket ID</td>
								<td>Socket Name</td>
								<td>Type</td>
								<td>Socket Cost</td>
								<td>Socket On/Off</td>
								<td>Option</td>
							</tr>
						</thead>
                        <tbody>
                            <?php
							$sys_startsa = mssql_query("select top 500 sok_id,sok_name,type,sok_cost,sok_on_off from MVCore_Wshopp_Socket where sok_element = '6' order by sok_name asc");
							for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsa);
								
									if($drop_info[2] == '2') { $option_s16[$i] = 'selected'; };
									if($drop_info[2] == '1') { $option_s26[$i] = 'selected'; };
									
									if($drop_info[4] == '0') { $option_sonof52[$i] = 'selected'; };
									if($drop_info[4] == '1') { $option_sonof51[$i] = 'selected'; };
									
								echo'<input id="sk_id_ori'.$drop_info[0].'" name="sk_id_ori'.$drop_info[0].'" type="hidden" value="'.$drop_info[0].'">
											<tr>
												<td width="100px">
													<div class="formRow">
														<div class="grid9"><input id="sk_ids'.$drop_info[0].'" name="sk_ids'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[0].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="sk_name'.$drop_info[0].'" name="sk_name'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[1].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_type'.$drop_info[0].'" name="sk_type'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="1" style="padding-left:5px;" '.$option_s16[$i].'>For Weapons</option>
																<option value="2" style="padding-left:5px;" '.$option_s26[$i].'>For Set Items</option>
															</select>
														</div>             
													</div>
												</td>
												<td width="150px">
													<div class="formRow">
														<div class="grid9"><input id="sk_cost'.$drop_info[0].'" name="sk_cost'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[3].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_onoff'.$drop_info[0].'" name="sk_onoff'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="0" '.$option_sonof52[$i].'> - </option>
																<option value="1" style="padding-left:5px;" '.$option_sonof51[$i].'>Enabled ( will be in use )</option>
																<option value="0" style="padding-left:5px;" '.$option_sonof52[$i].'>Disabled ( wont be in use )</option>
															</select>
														</div>             
													</div>
												</td>
												<td align="center" width="260px">
													<a href="#" onclick="sklinksubmitID('.$drop_info[0].'); return false;" class="buttonM bGreen" style="color:#ffffff;">Save Socket</a>
													<a href="#" onclick="sklinksubmitdellID('.$drop_info[0].'); return false;" class="buttonM bDefault mb10 mt5">Delete Socket</a>
												</td>
											</tr>
								';
							};
							?>
                        </tbody>
                    </table>
                </div>
					<!-- ss -->
				<div aria-hidden="false" aria-expanded="true" style="display: block;" role="tabpanel" class="ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-7" id="ttab7">
                    <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
							<tr>
								<td>Socket ID</td>
								<td>Socket Name</td>
								<td>Type</td>
								<td>Socket Cost</td>
								<td>Socket On/Off</td>
								<td>Option</td>
							</tr>
						</thead>
                        <tbody>
                            <?php
							$sys_startsa = mssql_query("select top 500 sok_id,sok_name,type,sok_cost,sok_on_off from MVCore_Wshopp_Socket where sok_element = '7' order by sok_name asc");
							for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsa);
								
									if($drop_info[2] == '1') { $option_s17[$i] = 'selected'; };
									if($drop_info[2] == '2') { $option_s27[$i] = 'selected'; };
									
									if($drop_info[4] == '0') { $option_sonof62[$i] = 'selected'; };
									if($drop_info[4] == '1') { $option_sonof61[$i] = 'selected'; };
									
								echo'<input id="sk_id_ori'.$drop_info[0].'" name="sk_id_ori'.$drop_info[0].'" type="hidden" value="'.$drop_info[0].'">
											<tr>
												<td width="100px">
													<div class="formRow">
														<div class="grid9"><input id="sk_ids'.$drop_info[0].'" name="sk_ids'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[0].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="sk_name'.$drop_info[0].'" name="sk_name'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[1].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_type'.$drop_info[0].'" name="sk_type'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="1" style="padding-left:5px;" '.$option_s17[$i].'>For Weapons</option>
																<option value="2" style="padding-left:5px;" '.$option_s27[$i].'>For Set Items</option>
															</select>
														</div>             
													</div>
												</td>
												<td width="150px">
													<div class="formRow">
														<div class="grid9"><input id="sk_cost'.$drop_info[0].'" name="sk_cost'.$drop_info[0].'" type="text" placeholder="" value="'.$drop_info[3].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="sk_onoff'.$drop_info[0].'" name="sk_onoff'.$drop_info[0].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="0" '.$option_sonof62[$i].'> - </option>
																<option value="1" style="padding-left:5px;" '.$option_sonof61[$i].'>Enabled ( will be in use )</option>
																<option value="0" style="padding-left:5px;" '.$option_sonof62[$i].'>Disabled ( wont be in use )</option>
															</select>
														</div>             
													</div>
												</td>
												<td align="center" width="260px">
													<a href="#" onclick="sklinksubmitID('.$drop_info[0].'); return false;" class="buttonM bGreen" style="color:#ffffff;">Save Socket</a>
													<a href="#" onclick="sklinksubmitdellID('.$drop_info[0].'); return false;" class="buttonM bDefault mb10 mt5">Delete Socket</a>
												</td>
											</tr>
								';
							};
							?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Harmony_manage') { ?> <!-- Harmony_manage -->
		<div class="widget">
            <div class="whead"><h6>Harmony Option Add</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Harmony ID</td>
						<td>Harmony Value</td>
                        <td>Name</td>
						<td>Type</td>
						<td>Harmony Cost</td>
						<td>Option</td>
                    </tr>
                </thead>
                <tbody id="echotabled">
					<tr>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="har_ida" name="har_ida" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="har_vala" name="har_vala" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="har_namea" name="har_namea" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td width="250px">
							<div class="formRow">
								<div class="grid9">
									<select style="width:100%;padding-left:5px;opacity:0.6;" id="har_typea" name="har_typea" data-placeholder="Choose a option..." class="select" tabindex="2">
										<option value="1" style="padding-left:5px;">For Weapons</option>
										<option value="2" style="padding-left:5px;">For Magic Weapons</option>
										<option value="3" style="padding-left:5px;">For Set Items</option>
									</select>
								</div>             
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="har_costa" name="har_costa" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td align="center">
							<a href="#" onclick="submitharbuttonadd(); return false;" class="buttonM bDefault mb10 mt5">Add New Harmony</a>
						</td>
					</tr>
				</tbody>
            </table>
        </div>
		<div class="widget rightTabs tableTabs"> 
            <div class="whead"><h6>Harmony Option Manage</h6></div>      
            <div class="tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
                <ul role="tablist" class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
                    <li aria-selected="true"  aria-labelledby="ui-id-1" aria-controls="ttab1" tabindex="0"  role="tab" class="ui-state-default ui-corner-top ui-tabs-active ui-state-active"><a id="ui-id-1" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#ttab1">Harmony For Weapons</a></li>
                    <li aria-selected="false" aria-labelledby="ui-id-2" aria-controls="ttab2" tabindex="-1" role="tab" class="ui-state-default ui-corner-top"><a id="ui-id-2" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#ttab2">Harmony For Magic Weapons</a></li>
                    <li aria-selected="false" aria-labelledby="ui-id-3" aria-controls="ttab3" tabindex="-1" role="tab" class="ui-state-default ui-corner-top"><a id="ui-id-3" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#ttab3">Harmony For Set Items</a></li>
                </ul>
					<!-- 1 -->
                <div style="display: none;" aria-hidden="true" aria-expanded="false" role="tabpanel" class="ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-1" id="ttab1">
                    <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
							<tr>
								<td>Harmony ID</td>
								<td>Harmony Value</td>
								<td>Name</td>
								<td>Harmony Cost</td>
								<td>Harmony On/Off</td>
								<td>Option</td>
							</tr>
						</thead>
                        <tbody>
                            <?php
								$anc_first_wawe = mssql_query("select top 500 joh_id,joh_val,joh_name,joh_type,joh_cost,joh_onoff from MVCore_Wshopp_Harmony where joh_type = '1' order by joh_id asc, joh_val asc"); // 5
								for($i=0;$i < mssql_num_rows($anc_first_wawe);++$i) {
								$drop_info = mssql_fetch_row($anc_first_wawe);
						
								if($drop_info[5] == '0') { $iopts1[$i] = 'selected'; } 
								elseif($drop_info[5] == '1') { $iopts2[$i] = 'selected'; };
								
								echo'
								<input id="har_hiden_id'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_hiden_id'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="hidden" value="'.$drop_info[0].'">
								<input id="har_hiden_val'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_hiden_val'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="hidden" value="'.$drop_info[1].'">
								<input id="har_hiden_type'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_hiden_type'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="hidden" value="'.$drop_info[3].'">
											<tr>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="har_id'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_id'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="text" placeholder="" value="'.$drop_info[0].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="har_val'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_val'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="text" placeholder="" value="'.$drop_info[1].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="har_name'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_name'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="text" placeholder="" value="'.$drop_info[2].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="har_cost'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_cost'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="text" placeholder="" value="'.$drop_info[4].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="har_onoff'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_onoff'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="0" '.$iopts1[$i].'> - </option>
																<option value="1" style="padding-left:5px;" '.$iopts2[$i].'>Enabled ( will be in use )</option>
																<option value="0" style="padding-left:5px;" '.$iopts1[$i].'>Disabled ( wont be in use )</option>
															</select>
														</div>             
													</div>
												</td>
												<td align="center">
													<a href="#" onclick="harrlinksubmitID('.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'); return false;" class="buttonM bGreen" style="color:#ffffff;">Save Harmony</a>
													<a href="#" onclick="harrlinksubmitdellID('.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'); return false;" class="buttonM bDefault mb10 mt5">Delete Harmony</a>
												</td>
											</tr>
								';
							};
							?>
                        </tbody>
                    </table>
                </div>
					<!-- 2 -->
                <div aria-hidden="false" aria-expanded="true" style="display: block;" role="tabpanel" class="ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-2" id="ttab2">
                    <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
							<tr>
								<td>Harmony ID</td>
								<td>Harmony Value</td>
								<td>Name</td>
								<td>Harmony Cost</td>
								<td>Option</td>
							</tr>
						</thead>
                        <tbody>
							<?php
								$anc_first_wawe = mssql_query("select top 500 joh_id,joh_val,joh_name,joh_type,joh_cost,joh_onoff from MVCore_Wshopp_Harmony where joh_type = '2' order by joh_id asc, joh_val asc"); // 5
								for($i=0;$i < mssql_num_rows($anc_first_wawe);++$i) {
								$drop_info = mssql_fetch_row($anc_first_wawe);
								
								if($drop_info[5] == '0') { $iopts11[$i] = 'selected'; } 
								elseif($drop_info[5] == '1') { $iopts12[$i] = 'selected'; };
								
								echo'
								<input id="har_hiden_id'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_hiden_id'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="hidden" value="'.$drop_info[0].'">
								<input id="har_hiden_val'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_hiden_val'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="hidden" value="'.$drop_info[1].'">
								<input id="har_hiden_type'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_hiden_type'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="hidden" value="'.$drop_info[3].'">
											<tr>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="har_id'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_id'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="text" placeholder="" value="'.$drop_info[0].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="har_val'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_val'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="text" placeholder="" value="'.$drop_info[1].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="har_name'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_name'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="text" placeholder="" value="'.$drop_info[2].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="har_cost'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_cost'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="text" placeholder="" value="'.$drop_info[4].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="har_onoff'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_onoff'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="0" '.$iopts11[$i].'> - </option>
																<option value="1" style="padding-left:5px;" '.$iopts12[$i].'>Enabled ( will be in use )</option>
																<option value="0" style="padding-left:5px;" '.$iopts11[$i].'>Disabled ( wont be in use )</option>
															</select>
														</div>             
													</div>
												</td>
												<td align="center">
													<a href="#" onclick="harrlinksubmitID('.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'); return false;" class="buttonM bGreen" style="color:#ffffff;">Save Harmony</a>
													<a href="#" onclick="harrlinksubmitdellID('.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'); return false;" class="buttonM bDefault mb10 mt5">Delete Harmony</a>
												</td>
											</tr>
								';
							};
							?>
                        </tbody>
                    </table>
                </div>
					<!-- 3 -->
				<div aria-hidden="false" aria-expanded="true" style="display: block;" role="tabpanel" class="ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-3" id="ttab3">
                    <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
							<tr>
								<td>Harmony ID</td>
								<td>Harmony Value</td>
								<td>Name</td>
								<td>Harmony Cost</td>
								<td>Option</td>
							</tr>
						</thead>
                        <tbody>
                            <?php
								$anc_first_wawe = mssql_query("select top 500 joh_id,joh_val,joh_name,joh_type,joh_cost,joh_onoff from MVCore_Wshopp_Harmony where joh_type = '3' order by joh_id asc, joh_val asc"); // 5
								for($i=0;$i < mssql_num_rows($anc_first_wawe);++$i) {
								$drop_info = mssql_fetch_row($anc_first_wawe);
						
								if($drop_info[5] == '0') { $iopts21[$i] = 'selected'; } 
								elseif($drop_info[5] == '1') { $iopts22[$i] = 'selected'; };
								
								echo'
								<input id="har_hiden_id'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_hiden_id'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="hidden" value="'.$drop_info[0].'">
								<input id="har_hiden_val'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_hiden_val'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="hidden" value="'.$drop_info[1].'">
								<input id="har_hiden_type'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_hiden_type'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="hidden" value="'.$drop_info[3].'">
											<tr>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="har_id'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_id'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="text" placeholder="" value="'.$drop_info[0].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="har_val'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_val'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="text" placeholder="" value="'.$drop_info[1].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="har_name'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_name'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="text" placeholder="" value="'.$drop_info[2].'"></div>
													</div>
												</td>
												<td>
													<div class="formRow">
														<div class="grid9"><input id="har_cost'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_cost'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" type="text" placeholder="" value="'.$drop_info[4].'"></div>
													</div>
												</td>
												<td width="250px">
													<div class="formRow">
														<div class="grid9">
															<select style="width:100%;padding-left:5px;opacity:0.6;" id="har_onoff'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" name="har_onoff'.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'" data-placeholder="Choose a option..." class="select" tabindex="2">
																<option value="0" '.$iopts21[$i].'> - </option>
																<option value="1" style="padding-left:5px;" '.$iopts22[$i].'>Enabled ( will be in use )</option>
																<option value="0" style="padding-left:5px;" '.$iopts21[$i].'>Disabled ( wont be in use )</option>
															</select>
														</div>             
													</div>
												</td>
												<td align="center">
													<a href="#" onclick="harrlinksubmitID('.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'); return false;" class="buttonM bGreen" style="color:#ffffff;">Save Harmony</a>
													<a href="#" onclick="harrlinksubmitdellID('.$drop_info[0].''.$drop_info[1].''.$drop_info[3].'); return false;" class="buttonM bDefault mb10 mt5">Delete Harmony</a>
												</td>
											</tr>
								';
							};
							?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
		<?php }; ?>
						
<script>
	
	//page5 Harmony Create
	function submitharbuttonadd() {
		var getAllValues = 
		
				$("#har_ida").val()+"-ids-"
				+$("#har_vala").val()+"-ids-"
				+$("#har_namea").val()+"-ids-"
				+$("#har_typea option:selected").val()+"-ids-"
				+$("#har_costa").val()
			
			;

			$.post("acps.php", {
				submitharbuttonadd: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
				
		//MGS Sys --------------
		var getIsOnMSG = '<?php echo $mvcore['admincp_msg_output'];?>';
			var getPaneName2 = '<?php echo $_GET['op2'];?>';
			var getPaneName3 = '<?php echo $_GET['op3'];?>';
		if(getIsOnMSG != 'on') {
			setInterval(function(){ history.go(0); location.reload(); }, 100);
			//window.location = "-id-admincp-id-"+getPaneName2+"-id-"+getPaneName3+".html";
		} else {
			setInterval(function(){ history.go(0); location.reload(); }, 4000);
		};
		//----------------------
				
			});
	};
	//Harmony
	function harrlinksubmitID(idsa) {
		var getAllValues = 
		
				$("#har_hiden_id" + idsa).val()+"-ids-"
				+$("#har_hiden_val" + idsa).val()+"-ids-"
				+$("#har_hiden_type" + idsa).val()+"-ids-"
				+$("#har_id" + idsa).val()+"-ids-"
				+$("#har_val" + idsa).val()+"-ids-"
				+$("#har_name" + idsa).val()+"-ids-"
				+$("#har_cost" + idsa).val()+"-ids-"
				+$("#har_onoff" + idsa).val()
			
			;
			
			$.post("acps.php", {
				harrlinksubmitID: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
				
			});
	};
	
	function harrlinksubmitdellID(idsa) {
		var getAllValues = 
		
				$("#har_hiden_id" + idsa).val()+"-ids-"
				+$("#har_hiden_val" + idsa).val()
			
			;
			
			$.post("acps.php", {
				harrlinksubmitdellID: getAllValues
			},
			function(data) {
				
				$('#errorDrop').html(data);
				
		//MGS Sys --------------
		var getIsOnMSG = '<?php echo $mvcore['admincp_msg_output'];?>';
			var getPaneName2 = '<?php echo $_GET['op2'];?>';
			var getPaneName3 = '<?php echo $_GET['op3'];?>';
		if(getIsOnMSG != 'on') {
			setInterval(function(){ history.go(0); location.reload(); }, 100);
			//window.location = "-id-admincp-id-"+getPaneName2+"-id-"+getPaneName3+".html";
		} else {
			setInterval(function(){ history.go(0); location.reload(); }, 4000);
		};
		//----------------------

			});
	};
	//Socket
	function sklinksubmitID(idsa) {
		var getAllValues = 
		
				$("#sk_id_ori" + idsa).val()+"-ids-"
				+$("#sk_ids" + idsa).val()+"-ids-"
				+$("#sk_name" + idsa).val()+"-ids-"
				+$("#sk_type" + idsa).val()+"-ids-"
				+$("#sk_cost" + idsa).val()+"-ids-"
				+$("#sk_onoff" + idsa).val()
			
			;
			
			$.post("acps.php", {
				sklinksubmitID: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
				
				//setInterval(function(){ history.go(0); location.reload(); }, 4000);
				
			});
	};
	
	function sklinksubmitdellID(idsa) {
		var getAllValues = 
		
				$("#sk_id_ori" + idsa).val()
			
			;
			
			$.post("acps.php", {
				sklinksubmitdellID: getAllValues
			},
			function(data) {
				
				$('#errorDrop').html(data);
				
		//MGS Sys --------------
		var getIsOnMSG = '<?php echo $mvcore['admincp_msg_output'];?>';
			var getPaneName2 = '<?php echo $_GET['op2'];?>';
			var getPaneName3 = '<?php echo $_GET['op3'];?>';
		if(getIsOnMSG != 'on') {
			setInterval(function(){ history.go(0); location.reload(); }, 100);
			//window.location = "-id-admincp-id-"+getPaneName2+"-id-"+getPaneName3+".html";
		} else {
			setInterval(function(){ history.go(0); location.reload(); }, 4000);
		};
		//----------------------

			});
	};

$(document).ready(function() {
	
			$("textarea").keydown(function(e) {
				if(e.keyCode === 9) { // tab was pressed
					// get caret position/selection
					var start = this.selectionStart;
					var end = this.selectionEnd;

					var $this = $(this);
					var value = $this.val();
					
					// set textarea value to: text before caret + tab + text after caret
					$this.val(value.substring(0, start)
								+ "\t"
								+ value.substring(end));

					// put caret at right position again (add one for the tab)
					this.selectionStart = this.selectionEnd = start + 1;

					// prevent the focus lose
					e.preventDefault();
				}
			});

	//page3 SOCKET SAVE
	$( "#sklinksubmitIDsa" ).on('click', function() {
		var getAllValues = 
		
				$("#sk_idsa").val()+"-ids-"
				+$("#sk_namea").val()+"-ids-"
				+$("#sk_typea").val()+"-ids-"
				+$("#sk_costa").val()+"-ids-"
				+$("#sk_elementa").val()
			
			;
			
			$.post("acps.php", {
				sklinksubmitIDsa: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
				
		//MGS Sys --------------
		var getIsOnMSG = '<?php echo $mvcore['admincp_msg_output'];?>';
			var getPaneName2 = '<?php echo $_GET['op2'];?>';
			var getPaneName3 = '<?php echo $_GET['op3'];?>';
		if(getIsOnMSG != 'on') {
			setInterval(function(){ history.go(0); location.reload(); }, 100);
			//window.location = "-id-admincp-id-"+getPaneName2+"-id-"+getPaneName3+".html";
		} else {
			setInterval(function(){ history.go(0); location.reload(); }, 4000);
		};
		//----------------------
				
			});
	});
});
</script>
<script type="text/javascript">
    var SAR = {};

    SAR.find = function(){
        // collect variables
        var txt = $("#spellHides").val();
        var strSearchTerm = $("#termSearch").val();
        var isCaseSensitive = ($("#caseSensitive").attr('checked') == 'checked') ? true : false;

        // make text lowercase if search is supposed to be case insensitive
        if(isCaseSensitive == false){
            txt = txt.toLowerCase();
            strSearchTerm = strSearchTerm.toLowerCase();
        }

        // find next index of searchterm, starting from current cursor position
        var cursorPos = ($("#spellHides").getCursorPosEnd());
        var termPos = txt.indexOf(strSearchTerm, cursorPos);

        // if found, select it
        if(termPos != -1){
            $("#spellHides").selectRange(termPos, termPos+strSearchTerm.length);
        }else{
            // not found from cursor pos, so start from beginning
            termPos = txt.indexOf(strSearchTerm);
            if(termPos != -1){
                $("#spellHides").selectRange(termPos, termPos+strSearchTerm.length);
            }else{
                alert("not found");
            }
        }
    };

    SAR.findAndReplace = function(){
        // collect variables
        var origTxt = $("#spellHides").val(); // needed for text replacement
        var txt = $("#spellHides").val(); // duplicate needed for case insensitive search
        var strSearchTerm = $("#termSearch").val();
        var strReplaceWith = $("#termReplace").val();
        var isCaseSensitive = ($("#caseSensitive").attr('checked') == 'checked') ? true : false;
        var termPos;

        // make text lowercase if search is supposed to be case insensitive
        if(isCaseSensitive == false){
            txt = txt.toLowerCase();
            strSearchTerm = strSearchTerm.toLowerCase();
        }

        // find next index of searchterm, starting from current cursor position
        var cursorPos = ($("#spellHides").getCursorPosEnd());
        var termPos = txt.indexOf(strSearchTerm, cursorPos);
        var newText = '';

        // if found, replace it, then select it
        if(termPos != -1){
            newText = origTxt.substring(0, termPos) + strReplaceWith + origTxt.substring(termPos+strSearchTerm.length, origTxt.length)
            $("#spellHides").val(newText);
            $("#spellHides").selectRange(termPos, termPos+strReplaceWith.length);
        }else{
            // not found from cursor pos, so start from beginning
            termPos = txt.indexOf(strSearchTerm);
            if(termPos != -1){
                newText = origTxt.substring(0, termPos) + strReplaceWith + origTxt.substring(termPos+strSearchTerm.length, origTxt.length)
                $("#spellHides").val(newText);
                $("#spellHides").selectRange(termPos, termPos+strReplaceWith.length);
            }else{
                alert("not found");
            }
        }
    };

    SAR.replaceAll = function(){
        // collect variables
        var origTxt = $("#spellHides").val(); // needed for text replacement
        var txt = $("#spellHides").val(); // duplicate needed for case insensitive search
        var strSearchTerm = $("#termSearch").val();
        var strReplaceWith = $("#termReplace").val();
        var isCaseSensitive = ($("#caseSensitive").attr('checked') == 'checked') ? true : false;

        // make text lowercase if search is supposed to be case insensitive
        if(isCaseSensitive == false){
            txt = txt.toLowerCase();
            strSearchTerm = strSearchTerm.toLowerCase();
        }

        // find all occurances of search string
        var matches = [];
        var pos = txt.indexOf(strSearchTerm);
        while(pos > -1) {
            matches.push(pos);
            pos = txt.indexOf(strSearchTerm, pos+1);
        }

        for (var match in matches){
            SAR.findAndReplace();
        }
    };


    /* TWO UTILITY FUNCTIONS YOU WILL NEED */
    $.fn.selectRange = function(start, end) {
        return this.each(function() {
            if(this.setSelectionRange) {
                this.focus();
                this.setSelectionRange(start, end);
            } else if(this.createTextRange) {
                var range = this.createTextRange();
                range.collapse(true);
                range.moveEnd('character', end);
                range.moveStart('character', start);
                range.select();
            }
        });
    };

    $.fn.getCursorPosEnd = function() {
        var pos = 0;
        var input = this.get(0);
        // IE Support
        if (document.selection) {
            input.focus();
            var sel = document.selection.createRange();
            pos = sel.text.length;
        }
        // Firefox support
        else if (input.selectionStart || input.selectionStart == '0')
            pos = input.selectionEnd;
        return pos;
    };  
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>