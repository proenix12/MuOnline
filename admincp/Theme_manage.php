
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Table_styling') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Theme_manage-id-Table_styling.html" title=""><span style="height:30px;">Table Styling</span></a></li>
			<li <?php if($_GET['op3'] == 'News_Styling') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Theme_manage-id-News_Styling.html" title=""><span style="height:30px;">News Styling</span></a></li>
			<li <?php if($_GET['op3'] == 'Announce_Styling') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Theme_manage-id-Announce_Styling.html" title=""><span style="height:30px;">Announce Styling</span></a></li>
			<li <?php if($_GET['op3'] == 'Webshop_Styles') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Theme_manage-id-Webshop_Styles.html" title=""><span style="height:30px;">Webshop Styling</span></a></li>
			<li <?php if($_GET['op3'] == 'Game_Panel_Styles') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Theme_manage-id-Game_Panel_Styles.html" title=""><span style="height:30px;">Game Panel Styling</span></a></li>
			<li <?php if($_GET['op3'] == 'InputSelect_Styling') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Theme_manage-id-InputSelect_Styling.html" title=""><span style="height:30px;">Input/Select Styling</span></a></li>
			<li <?php if($_GET['op3'] == 'Button_Styling') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Theme_manage-id-Button_Styling.html" title=""><span style="height:30px;">Button Styling</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
<div id="onAnyClickAnywere">
		<?php if($_GET['op3'] == 'Table_styling') { ?> <!-- Table_manage -->
		<div class="fluid">
			<div class="widget grid6" id="tableStyling">
				<div class="whead"><h6>Table Styling</h6><h6 style="float:right;"><b>For Theme ( <?php echo $mvcore['theme_dir'];?> )</b></h6></div>
					<div class="formRow">
						<div class="grid3"><label>Border Color:</label></div>
						<div class="grid9"><div class="cPicker" id="cPicker"><div id="table_s_borcolor" style="background-color: <?php echo $mvcore['table_s_borcolor'];?>;"></div><span>Choose color...</span></div></div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Cell Padding:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="table_s_padd" name="table_s_padd" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="0px" <?php if( $mvcore['table_s_padd'] == '0px') { echo 'selected'; } else { echo ''; }; ?>>0px</option> 
								<option value="1px" <?php if( $mvcore['table_s_padd'] == '1px') { echo 'selected'; } else { echo ''; }; ?>>1px</option> 
								<option value="2px" <?php if( $mvcore['table_s_padd'] == '2px') { echo 'selected'; } else { echo ''; }; ?>>2px</option> 
								<option value="3px" <?php if( $mvcore['table_s_padd'] == '3px') { echo 'selected'; } else { echo ''; }; ?>>3px</option> 
								<option value="4px" <?php if( $mvcore['table_s_padd'] == '4px') { echo 'selected'; } else { echo ''; }; ?>>4px</option> 
								<option value="5px" <?php if( $mvcore['table_s_padd'] == '5px') { echo 'selected'; } else { echo ''; }; ?>>5px</option> 
								<option value="6px" <?php if( $mvcore['table_s_padd'] == '6px') { echo 'selected'; } else { echo ''; }; ?>>6px</option> 
								<option value="7px" <?php if( $mvcore['table_s_padd'] == '7px') { echo 'selected'; } else { echo ''; }; ?>>7px</option> 
								<option value="8px" <?php if( $mvcore['table_s_padd'] == '8px') { echo 'selected'; } else { echo ''; }; ?>>8px</option>
								<option value="9px" <?php if( $mvcore['table_s_padd'] == '9px') { echo 'selected'; } else { echo ''; }; ?>>9px</option> 
								<option value="10px" <?php if( $mvcore['table_s_padd'] == '10px') { echo 'selected'; } else { echo ''; }; ?>>10px</option> 
								<option value="11px" <?php if( $mvcore['table_s_padd'] == '11px') { echo 'selected'; } else { echo ''; }; ?>>11px</option> 
								<option value="12px" <?php if( $mvcore['table_s_padd'] == '12px') { echo 'selected'; } else { echo ''; }; ?>>12px</option> 
								<option value="13px" <?php if( $mvcore['table_s_padd'] == '13px') { echo 'selected'; } else { echo ''; }; ?>>13px</option> 
								<option value="14px" <?php if( $mvcore['table_s_padd'] == '14px') { echo 'selected'; } else { echo ''; }; ?>>14px</option> 
								<option value="15px" <?php if( $mvcore['table_s_padd'] == '15px') { echo 'selected'; } else { echo ''; }; ?>>15px</option> 
								<option value="16px" <?php if( $mvcore['table_s_padd'] == '16px') { echo 'selected'; } else { echo ''; }; ?>>16px</option> 
								<option value="17px" <?php if( $mvcore['table_s_padd'] == '17px') { echo 'selected'; } else { echo ''; }; ?>>17px</option>
								<option value="18px" <?php if( $mvcore['table_s_padd'] == '18px') { echo 'selected'; } else { echo ''; }; ?>>18px</option> 
								<option value="19px" <?php if( $mvcore['table_s_padd'] == '19px') { echo 'selected'; } else { echo ''; }; ?>>19px</option> 
								<option value="20px" <?php if( $mvcore['table_s_padd'] == '20px') { echo 'selected'; } else { echo ''; }; ?>>20px</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Title Text Align:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="table_s_titletalign" name="table_s_titletalign" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="left" <?php if( $mvcore['table_s_titletalign'] == 'left') { echo 'selected'; } else { echo ''; }; ?>>left</option> 
								<option value="right" <?php if( $mvcore['table_s_titletalign'] == 'right') { echo 'selected'; } else { echo ''; }; ?>>right</option> 
								<option value="center" <?php if( $mvcore['table_s_titletalign'] == 'center') { echo 'selected'; } else { echo ''; }; ?>>center</option>  
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Title Text Size:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="table_s_tittextsize" name="table_s_tittextsize" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="10px" <?php if( $mvcore['table_s_tittextsize'] == '10px') { echo 'selected'; } else { echo ''; }; ?>>10px</option> 
								<option value="11px" <?php if( $mvcore['table_s_tittextsize'] == '11px') { echo 'selected'; } else { echo ''; }; ?>>11px</option> 
								<option value="12px" <?php if( $mvcore['table_s_tittextsize'] == '12px') { echo 'selected'; } else { echo ''; }; ?>>12px</option> 
								<option value="13px" <?php if( $mvcore['table_s_tittextsize'] == '13px') { echo 'selected'; } else { echo ''; }; ?>>13px</option> 
								<option value="14px" <?php if( $mvcore['table_s_tittextsize'] == '14px') { echo 'selected'; } else { echo ''; }; ?>>14px</option> 
								<option value="15px" <?php if( $mvcore['table_s_tittextsize'] == '15px') { echo 'selected'; } else { echo ''; }; ?>>15px</option> 
								<option value="16px" <?php if( $mvcore['table_s_tittextsize'] == '16px') { echo 'selected'; } else { echo ''; }; ?>>16px</option> 
								<option value="17px" <?php if( $mvcore['table_s_tittextsize'] == '17px') { echo 'selected'; } else { echo ''; }; ?>>17px</option>
								<option value="18px" <?php if( $mvcore['table_s_tittextsize'] == '18px') { echo 'selected'; } else { echo ''; }; ?>>18px</option> 
								<option value="19px" <?php if( $mvcore['table_s_tittextsize'] == '19px') { echo 'selected'; } else { echo ''; }; ?>>19px</option> 
								<option value="20px" <?php if( $mvcore['table_s_tittextsize'] == '20px') { echo 'selected'; } else { echo ''; }; ?>>20px</option>
								<option value="21px" <?php if( $mvcore['table_s_tittextsize'] == '21px') { echo 'selected'; } else { echo ''; }; ?>>21px</option>
								<option value="22px" <?php if( $mvcore['table_s_tittextsize'] == '22px') { echo 'selected'; } else { echo ''; }; ?>>22px</option>
								<option value="23px" <?php if( $mvcore['table_s_tittextsize'] == '23px') { echo 'selected'; } else { echo ''; }; ?>>23px</option>
								<option value="24px" <?php if( $mvcore['table_s_tittextsize'] == '24px') { echo 'selected'; } else { echo ''; }; ?>>24px</option>
								<option value="25px" <?php if( $mvcore['table_s_tittextsize'] == '25px') { echo 'selected'; } else { echo ''; }; ?>>25px</option>
								<option value="26px" <?php if( $mvcore['table_s_tittextsize'] == '26px') { echo 'selected'; } else { echo ''; }; ?>>26px</option>
								<option value="27px" <?php if( $mvcore['table_s_tittextsize'] == '27px') { echo 'selected'; } else { echo ''; }; ?>>27px</option>
								<option value="28px" <?php if( $mvcore['table_s_tittextsize'] == '28px') { echo 'selected'; } else { echo ''; }; ?>>28px</option>
								<option value="29px" <?php if( $mvcore['table_s_tittextsize'] == '29px') { echo 'selected'; } else { echo ''; }; ?>>29px</option>
								<option value="30px" <?php if( $mvcore['table_s_tittextsize'] == '30px') { echo 'selected'; } else { echo ''; }; ?>>30px</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Title Background Color:</label></div>
						<div class="grid9">
							<div class="cPicker4" id="cPicker4"><div id="table_s_trowcolgra" style="background-color: <?php echo $mvcore['table_s_trowcolgra'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Title Text Color:</label></div>
						<div class="grid9"><div class="cPicker5" id="cPicker5"><div id="table_s_titletextcolor" style="background-color: <?php echo $mvcore['table_s_titletextcolor'];?>;"></div><span>Choose color...</span></div></div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Align:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="table_s_talign" name="table_s_talign" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="left" <?php if( $mvcore['table_s_talign'] == 'left') { echo 'selected'; } else { echo ''; }; ?>>left</option> 
								<option value="right" <?php if( $mvcore['table_s_talign'] == 'right') { echo 'selected'; } else { echo ''; }; ?>>right</option> 
								<option value="center" <?php if( $mvcore['table_s_talign'] == 'center') { echo 'selected'; } else { echo ''; }; ?>>center</option>  
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Size:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="table_s_textsize" name="table_s_textsize" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="10px" <?php if( $mvcore['table_s_textsize'] == '10px') { echo 'selected'; } else { echo ''; }; ?>>10px</option> 
								<option value="11px" <?php if( $mvcore['table_s_textsize'] == '11px') { echo 'selected'; } else { echo ''; }; ?>>11px</option> 
								<option value="12px" <?php if( $mvcore['table_s_textsize'] == '12px') { echo 'selected'; } else { echo ''; }; ?>>12px</option> 
								<option value="13px" <?php if( $mvcore['table_s_textsize'] == '13px') { echo 'selected'; } else { echo ''; }; ?>>13px</option> 
								<option value="14px" <?php if( $mvcore['table_s_textsize'] == '14px') { echo 'selected'; } else { echo ''; }; ?>>14px</option> 
								<option value="15px" <?php if( $mvcore['table_s_textsize'] == '15px') { echo 'selected'; } else { echo ''; }; ?>>15px</option> 
								<option value="16px" <?php if( $mvcore['table_s_textsize'] == '16px') { echo 'selected'; } else { echo ''; }; ?>>16px</option> 
								<option value="17px" <?php if( $mvcore['table_s_textsize'] == '17px') { echo 'selected'; } else { echo ''; }; ?>>17px</option>
								<option value="18px" <?php if( $mvcore['table_s_textsize'] == '18px') { echo 'selected'; } else { echo ''; }; ?>>18px</option> 
								<option value="19px" <?php if( $mvcore['table_s_textsize'] == '19px') { echo 'selected'; } else { echo ''; }; ?>>19px</option> 
								<option value="20px" <?php if( $mvcore['table_s_textsize'] == '20px') { echo 'selected'; } else { echo ''; }; ?>>20px</option>
								<option value="21px" <?php if( $mvcore['table_s_textsize'] == '21px') { echo 'selected'; } else { echo ''; }; ?>>21px</option>
								<option value="22px" <?php if( $mvcore['table_s_textsize'] == '22px') { echo 'selected'; } else { echo ''; }; ?>>22px</option>
								<option value="23px" <?php if( $mvcore['table_s_textsize'] == '23px') { echo 'selected'; } else { echo ''; }; ?>>23px</option>
								<option value="24px" <?php if( $mvcore['table_s_textsize'] == '24px') { echo 'selected'; } else { echo ''; }; ?>>24px</option>
								<option value="25px" <?php if( $mvcore['table_s_textsize'] == '25px') { echo 'selected'; } else { echo ''; }; ?>>25px</option>
								<option value="26px" <?php if( $mvcore['table_s_textsize'] == '26px') { echo 'selected'; } else { echo ''; }; ?>>26px</option>
								<option value="27px" <?php if( $mvcore['table_s_textsize'] == '27px') { echo 'selected'; } else { echo ''; }; ?>>27px</option>
								<option value="28px" <?php if( $mvcore['table_s_textsize'] == '28px') { echo 'selected'; } else { echo ''; }; ?>>28px</option>
								<option value="29px" <?php if( $mvcore['table_s_textsize'] == '29px') { echo 'selected'; } else { echo ''; }; ?>>29px</option>
								<option value="30px" <?php if( $mvcore['table_s_textsize'] == '30px') { echo 'selected'; } else { echo ''; }; ?>>30px</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Color:</label></div>
						<div class="grid9"><div class="cPicker6" id="cPicker6"><div id="table_s_textcolor" style="background-color: <?php echo $mvcore['table_s_textcolor'];?>;"></div><span>Choose color...</span></div></div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Background Color:</label></div>
						<div class="grid9">
							<div class="cPicker2" id="cPicker2" style="position:absolute;"><div id="table_s_rcolc" style="background-color: <?php echo $mvcore['table_s_rcolc'];?>;"></div><span>Choose color ...</span></div>

							<div class="sliderSpecs" style="position:absolute;margin-left:170px;"><label for="table_bg_trans">Transparency:</label><input id="table_bg_trans" type="text" value="<?php echo $mvcore['table_bg_trans'];?>"></div>
							<div class="grid9" id="table_bg_transasd" style="position:absolute;margin-top:3px;margin-left:280px;width:120px;"><div class="uMaxUnical01 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['table_bg_trans'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Background Hover Color:</label></div>
						<div class="grid9">
							<div class="cPicker3" id="cPicker3" style="position:absolute;"><div id="table_s_hoverrcolc" style="background-color: <?php echo $mvcore['table_s_hoverrcolc'];?>;"></div><span>Choose color ...</span></div>
							
							<div class="sliderSpecs" style="position:absolute;margin-left:170px;"><label for="table_bg_transhov">Transparency:</label><input id="table_bg_transhov" type="text" value="<?php echo $mvcore['table_bg_transhov'];?>"></div>
							<div class="grid9" id="table_bg_transasd2" style="position:absolute;margin-top:3px;margin-left:280px;width:120px;"><div class="uMaxUnical02 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['table_bg_transhov'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						
						</div>
					</div>
			</div>
                
			<div class="grid6">
                    <div class="widget">
                        <div id="preview_bg_uChange" class="whead"><h6>Preview</h6><h6 style="float:right;"><div class="cPicker38" id="cPicker38" style="margin-left:125px;"><div id="preview_bg" style="background-color: <?php echo $mvcore['preview_bg'];?>;"></div></div><label style="margin-right:40px;">Background Color:</label></h6></div>
                        <div class="body" align="center" style="background-color: <?php echo $mvcore['preview_bg'];?>;">
							<table class="mvcore-table" cellpadding="0" cellspacing="0"><tbody><tr><td>#</td><td>Name</td><td>Class</td><td>Level</td><td>Resets<sup style="color: red;">GR</sup></td><td>Location</td></tr>
										<tr>
										<td>1</td>
										<td><a href='#'>eChar</a></td>
										<td>Blade Master</td>
										<td>1</td>
										<td>42<sup style='color: red;'>2</sup></td>
										<td>ValleyOfLoren</td></tr>
							</table>
							<br>
							<br>
							<div style="margin-bottom: 20px;">
								<div>
										<table class="mvcore-table" cellpadding="0" cellspacing="0">
											
											<tr>
												<td colspan="4">Character eChar Info</td>
											</tr>
										
											<tr>
												<td rowspan="9" colspan="2">
													<img src="system/engine_images/Class/dk.png" />
												</td>
											</tr>
											
											<tr>
												<td>Character:</td>
												<td>eChar</td>
											</tr>
											<tr>
												<td>Class:</td>
												<td>Blade Master</td>
											</tr>
											<tr>
												<td>Level:</td>
												<td>1</td>
											</tr>
											<tr>
												<td>Resets:</td>
												<td>42</td>
											</tr>
											<tr>
												<td>GrandResets:</td>
												<td>2</td>
											</tr>
											<tr>
												<td>PK Status:</td>
												<td>Common</td>
											</tr>
											<tr>
												<td>Location:</td>
												<td>ValleyOfLoren</td>
											</tr>
											<tr>
												<td>Status:</td>
												<td>Offline</td>
											</tr>
											
										</table>
									<div style="margin-top:10px;"></div>
										<table class="mvcore-table" cellpadding="0" cellspacing="0">
											
											<tr>
												<td colspan="2">Account Information</td>
											</tr>

											<tr>
												<td>Characters:</td>
												<td>Pidro NeRo Gringo ELWENER ELEMENTAL</td>
											</tr>
											<tr>
												<td>Last Login:</td>
												<td>Never</td>
											</tr>
											<tr>
												<td>Last Logout</td>
												<td>Never</td>
											</tr>
										
										</table>
										<div style="margin-top:10px;"></div>
										<table class="mvcore-table" cellpadding="0" cellspacing="0">
											
												<tr>
													<td>Equipment</td>
												</tr>
											
											<tr>
												<td style="padding:5px;">
													<div style="width: 100%;margin-top:10px;">
														<div style="display: inline-block;position:relative; height:407px;width:400px; background:url(system/engine_images/class/inv_dk.png) no-repeat left top;">
														<div data-info="287FFF0007A9094F00C0000000000000" id="mvcore-wings"><?php echo $wings;?></div>
														<div data-info="6A7F96003F80D07F00707F010E170B1F" id="mvcore-helm"><?php echo $helm;?></div> 
														<div data-info="1A7B70000FEE0F7F09D0000000000000" id="mvcore-pendant"><?php echo $pendant;?></div>
														<div data-info="0EFF9200093F987F00289D0000000000" id="mvcore-sword"><?php echo $sword;?></div>
														<div data-info="65FF71001F18C47F00607F0D0B160A0C" id="mvcore-shield"><?php echo $shield;?></div>
														<div data-info="6A7F96003F808D7F00807F010E170B1F" id="mvcore-armor"><?php echo $armor;?></div>
														<div data-info="6A7F96003F81C07F00907F010E170B1F" id="mvcore-pants"><?php echo $pants;?></div>
														<div data-info="6A7F4B003F821A7F00A07F010E170B1F" id="mvcore-gloves"><?php echo $gloves;?></div>
														<div data-info="6A7F96003F826F7F00B07F010E170B1F" id="mvcore-boots"><?php echo $boots;?></div>
														<div data-info="157B7000132D7A7F00D0000000000000" id="mvcore-ring_left"><?php echo $ring_left;?></div>
														<div data-info="177B75000FEDC17F09D0000000000000" id="mvcore-ring_right"><?php echo $ring_right;?></div>
														</div>
													</div>
												</td>
											</tr>
										</table>
								</div>
							</div>
                        </div>
                    </div>
			</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'News_Styling') { ?> <!-- Input_manage -->
		<div class="fluid" id="NewsStylinsg">
			<div class="widget grid6">
				<div class="whead"><h6>News Styling</h6><h6 style="float:right;"><b>For Theme ( <?php echo $mvcore['theme_dir'];?> )</b></h6></div>
					<div class="formRow" id="NewsStyling1">
						<div class="grid3"><label>Border Radius:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="news_s_bradous">Pixels:</label><input id="news_s_bradous" type="text" value="<?php echo $mvcore['news_s_bradous'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical5 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['news_s_bradous'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow" id="NewsStyling2">
						<div class="grid3"><label>Border Size:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="news_s_bsize">Pixels:</label><input id="news_s_bsize" type="text" value="<?php echo $mvcore['news_s_bsize'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical6 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['news_s_bsize'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Border Color:</label></div>
						<div class="grid9">
							<div class="cPicker20" id="cPicker20"><div id="news_s_bordcolor" style="background-color: <?php echo $mvcore['news_s_bordcolor'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Title Text Align:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="news_s_titlealign" name="news_s_titlealign" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="left" <?php if( $mvcore['news_s_titlealign'] == 'left') { echo 'selected'; } else { echo ''; }; ?>>left</option> 
								<option value="right" <?php if( $mvcore['news_s_titlealign'] == 'right') { echo 'selected'; } else { echo ''; }; ?>>right</option> 
								<option value="center" <?php if( $mvcore['news_s_titlealign'] == 'center') { echo 'selected'; } else { echo ''; }; ?>>center</option>  
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Title Text Size:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="news_s_titlesize" name="news_s_titlesize" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="10px" <?php if( $mvcore['news_s_titlesize'] == '10px') { echo 'selected'; } else { echo ''; }; ?>>10px</option> 
								<option value="11px" <?php if( $mvcore['news_s_titlesize'] == '11px') { echo 'selected'; } else { echo ''; }; ?>>11px</option> 
								<option value="12px" <?php if( $mvcore['news_s_titlesize'] == '12px') { echo 'selected'; } else { echo ''; }; ?>>12px</option> 
								<option value="13px" <?php if( $mvcore['news_s_titlesize'] == '13px') { echo 'selected'; } else { echo ''; }; ?>>13px</option> 
								<option value="14px" <?php if( $mvcore['news_s_titlesize'] == '14px') { echo 'selected'; } else { echo ''; }; ?>>14px</option> 
								<option value="15px" <?php if( $mvcore['news_s_titlesize'] == '15px') { echo 'selected'; } else { echo ''; }; ?>>15px</option> 
								<option value="16px" <?php if( $mvcore['news_s_titlesize'] == '16px') { echo 'selected'; } else { echo ''; }; ?>>16px</option> 
								<option value="17px" <?php if( $mvcore['news_s_titlesize'] == '17px') { echo 'selected'; } else { echo ''; }; ?>>17px</option>
								<option value="18px" <?php if( $mvcore['news_s_titlesize'] == '18px') { echo 'selected'; } else { echo ''; }; ?>>18px</option> 
								<option value="19px" <?php if( $mvcore['news_s_titlesize'] == '19px') { echo 'selected'; } else { echo ''; }; ?>>19px</option> 
								<option value="20px" <?php if( $mvcore['news_s_titlesize'] == '20px') { echo 'selected'; } else { echo ''; }; ?>>20px</option>
								<option value="21px" <?php if( $mvcore['news_s_titlesize'] == '21px') { echo 'selected'; } else { echo ''; }; ?>>21px</option>
								<option value="22px" <?php if( $mvcore['news_s_titlesize'] == '22px') { echo 'selected'; } else { echo ''; }; ?>>22px</option>
								<option value="23px" <?php if( $mvcore['news_s_titlesize'] == '23px') { echo 'selected'; } else { echo ''; }; ?>>23px</option>
								<option value="24px" <?php if( $mvcore['news_s_titlesize'] == '24px') { echo 'selected'; } else { echo ''; }; ?>>24px</option>
								<option value="25px" <?php if( $mvcore['news_s_titlesize'] == '25px') { echo 'selected'; } else { echo ''; }; ?>>25px</option>
								<option value="26px" <?php if( $mvcore['news_s_titlesize'] == '26px') { echo 'selected'; } else { echo ''; }; ?>>26px</option>
								<option value="27px" <?php if( $mvcore['news_s_titlesize'] == '27px') { echo 'selected'; } else { echo ''; }; ?>>27px</option>
								<option value="28px" <?php if( $mvcore['news_s_titlesize'] == '28px') { echo 'selected'; } else { echo ''; }; ?>>28px</option>
								<option value="29px" <?php if( $mvcore['news_s_titlesize'] == '29px') { echo 'selected'; } else { echo ''; }; ?>>29px</option>
								<option value="30px" <?php if( $mvcore['news_s_titlesize'] == '30px') { echo 'selected'; } else { echo ''; }; ?>>30px</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Title Text Color:</label></div>
						<div class="grid9">
							<div class="cPicker19" id="cPicker19"><div id="news_s_titletextcolor" style="background-color: <?php echo $mvcore['news_s_titletextcolor'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					
					<div class="formRow">
						<div class="grid3"><label>Title Background Color:</label></div>
						<div class="grid9">
							<div class="cPicker14" id="cPicker14" style="position:absolute;"><div id="news_s_titlebg" style="background-color: <?php echo $mvcore['news_s_titlebg'];?>;"></div><span>Choose color 1...</span></div>
							<div class="cPicker15" id="cPicker15" style="position:absolute;margin-left:170px;"><div id="news_s_titlebgHover" style="background-color: <?php echo $mvcore['news_s_titlebgHover'];?>;"></div><span>Choose color 2...</span></div>
							
							<div class="sliderSpecs" style="position:absolute;margin-left:310px;"><label for="news_title_bg_trans">Transparency:</label><input id="news_title_bg_trans" type="text" value="<?php echo $mvcore['news_title_bg_trans'];?>"></div>
							<div class="grid9" id="news_bg_transs" style="position:absolute;margin-top:3px;margin-left:420px;width:120px;"><div class="uMaxUnical012 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['news_title_bg_trans'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div></div>
							
					</div>
					
					<div class="formRow">
						<div class="grid3"><label>Default Text Color:</label></div>
						<div class="grid9">
							<div class="cPicker16" id="cPicker16"><div id="news_s_dtextcolor" style="background-color: <?php echo $mvcore['news_s_dtextcolor'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					
					<div class="formRow">
						<div class="grid3"><label>Date Color:</label></div>
						<div class="grid9">
							<div class="cPicker17" id="cPicker17"><div id="news_s_dateColor" style="background-color: <?php echo $mvcore['news_s_dateColor'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					
					<div class="formRow">
						<div class="grid3"><label>Background Color:</label></div>
						<div class="grid9">
							<div class="cPicker18" id="cPicker18" style="position:absolute;"><div id="news_s_bgcolor" style="background-color: <?php echo $mvcore['news_s_bgcolor'];?>;"></div><span>Choose color ...</span></div>
							
							<div class="sliderSpecs" style="position:absolute;margin-left:170px;"><label for="news_bg_trans">Transparency:</label><input id="news_bg_trans" type="text" value="<?php echo $mvcore['news_bg_trans'];?>"></div>
							<div class="grid9" id="news_bg_transs" style="position:absolute;margin-top:3px;margin-left:280px;width:120px;"><div class="uMaxUnical03 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['news_bg_trans'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						
						</div>
					</div>
			</div>
                
			<div class="grid6">
                    <div class="widget">
                        <div id="preview_bg_uChange" class="whead"><h6>Preview</h6><h6 style="float:right;"><div class="cPicker38" id="cPicker38" style="margin-left:125px;"><div id="preview_bg" style="background-color: <?php echo $mvcore['preview_bg'];?>;"></div></div><label style="margin-right:40px;">Background Color:</label></h6></div>
                        <div class="body" align="center" style="background-color: <?php echo $mvcore['preview_bg'];?>;">
							<!-- .. -->
							<div class="mvcore-box-style1" style="margin-bottom:25px;" width="100%">
								<div class="mvcore-titles">News Title</div>
									<div class="mvcore-div-entry" width="100%">
										<div width="100%">
											Welcome In News Styling!<br>
											<br>
											News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News News 
										</div>
									</div>
									<img src="system/engine_images/news_sep.png" width="100%" height="1px">
									<div class="mvcore-meta-bga">
										<div>
											<p>August 17, 2015, 4:34 pm</p>
										</div>
									</div>
							</div>
							<!-- .. -->
                        </div>
                    </div>
			</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Announce_Styling') { ?> <!-- Announce_Styling -->
		<div class="fluid" id="AnnounceStylinsg">
			<div class="widget grid6">
				<div class="whead"><h6>Announce Styling</h6><h6 style="float:right;"><b>For Theme ( <?php echo $mvcore['theme_dir'];?> )</b></h6></div>
					<div class="formRow" id="annonborderrad">
						<div class="grid3"><label>Border Radius:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="annon_s_bradous">Pixels:</label><input id="annon_s_bradous" type="text" value="<?php echo $mvcore['annon_s_bradous'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical09 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['annon_s_bradous'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow" id="annonborderrad2">
						<div class="grid3"><label>Border Size:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="annon_s_bsize">Pixels:</label><input id="annon_s_bsize" type="text" value="<?php echo $mvcore['annon_s_bsize'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical010 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['annon_s_bsize'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Border Color:</label></div>
						<div class="grid9">
							<div class="cPicker34" id="cPicker34"><div id="annon_s_bordcolor" style="background-color: <?php echo $mvcore['annon_s_bordcolor'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Size:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="annon_s_size" name="annon_s_size" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="10px" <?php if( $mvcore['annon_s_size'] == '10px') { echo 'selected'; } else { echo ''; }; ?>>10px</option> 
								<option value="11px" <?php if( $mvcore['annon_s_size'] == '11px') { echo 'selected'; } else { echo ''; }; ?>>11px</option> 
								<option value="12px" <?php if( $mvcore['annon_s_size'] == '12px') { echo 'selected'; } else { echo ''; }; ?>>12px</option> 
								<option value="13px" <?php if( $mvcore['annon_s_size'] == '13px') { echo 'selected'; } else { echo ''; }; ?>>13px</option> 
								<option value="14px" <?php if( $mvcore['annon_s_size'] == '14px') { echo 'selected'; } else { echo ''; }; ?>>14px</option> 
								<option value="15px" <?php if( $mvcore['annon_s_size'] == '15px') { echo 'selected'; } else { echo ''; }; ?>>15px</option> 
								<option value="16px" <?php if( $mvcore['annon_s_size'] == '16px') { echo 'selected'; } else { echo ''; }; ?>>16px</option> 
								<option value="17px" <?php if( $mvcore['annon_s_size'] == '17px') { echo 'selected'; } else { echo ''; }; ?>>17px</option>
								<option value="18px" <?php if( $mvcore['annon_s_size'] == '18px') { echo 'selected'; } else { echo ''; }; ?>>18px</option> 
								<option value="19px" <?php if( $mvcore['annon_s_size'] == '19px') { echo 'selected'; } else { echo ''; }; ?>>19px</option> 
								<option value="20px" <?php if( $mvcore['annon_s_size'] == '20px') { echo 'selected'; } else { echo ''; }; ?>>20px</option>
								<option value="21px" <?php if( $mvcore['annon_s_size'] == '21px') { echo 'selected'; } else { echo ''; }; ?>>21px</option>
								<option value="22px" <?php if( $mvcore['annon_s_size'] == '22px') { echo 'selected'; } else { echo ''; }; ?>>22px</option>
								<option value="23px" <?php if( $mvcore['annon_s_size'] == '23px') { echo 'selected'; } else { echo ''; }; ?>>23px</option>
								<option value="24px" <?php if( $mvcore['annon_s_size'] == '24px') { echo 'selected'; } else { echo ''; }; ?>>24px</option>
								<option value="25px" <?php if( $mvcore['annon_s_size'] == '25px') { echo 'selected'; } else { echo ''; }; ?>>25px</option>
								<option value="26px" <?php if( $mvcore['annon_s_size'] == '26px') { echo 'selected'; } else { echo ''; }; ?>>26px</option>
								<option value="27px" <?php if( $mvcore['annon_s_size'] == '27px') { echo 'selected'; } else { echo ''; }; ?>>27px</option>
								<option value="28px" <?php if( $mvcore['annon_s_size'] == '28px') { echo 'selected'; } else { echo ''; }; ?>>28px</option>
								<option value="29px" <?php if( $mvcore['annon_s_size'] == '29px') { echo 'selected'; } else { echo ''; }; ?>>29px</option>
								<option value="30px" <?php if( $mvcore['annon_s_size'] == '30px') { echo 'selected'; } else { echo ''; }; ?>>30px</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Color:</label></div>
						<div class="grid9">
							<div class="cPicker35" id="cPicker35"><div id="annon_s_textcolor" style="background-color: <?php echo $mvcore['annon_s_textcolor'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					
					<div class="formRow">
						<div class="grid3"><label>Background Color:</label></div>
						<div class="grid9">
							<div class="cPicker36" id="cPicker36" style="position:absolute;"><div id="annon_s_bgcolor" style="background-color: <?php echo $mvcore['annon_s_bgcolor'];?>;"></div><span>Choose color 1...</span></div>
							<div class="cPicker37" id="cPicker37" style="position:absolute;margin-left:170px;"><div id="annon_s_bgcolor2" style="background-color: <?php echo $mvcore['annon_s_bgcolor2'];?>;"></div><span>Choose color 2...</span></div>
							
							<div class="sliderSpecs" style="position:absolute;margin-left:300px;"><label for="annon_bg_trans">Transparency:</label><input id="annon_bg_trans" type="text" value="<?php echo $mvcore['annon_bg_trans'];?>"></div>
							<div class="grid9" id="anoon_bg_transs" style="position:absolute;margin-top:3px;margin-left:420px;width:120px;"><div class="uMaxUnical011 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['annon_bg_trans'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
							
						</div>
					</div>
			</div>
                
			<div class="grid6">
                    <div class="widget">
                        <div id="preview_bg_uChange" class="whead"><h6>Preview</h6><h6 style="float:right;"><div class="cPicker38" id="cPicker38" style="margin-left:125px;"><div id="preview_bg" style="background-color: <?php echo $mvcore['preview_bg'];?>;"></div></div><label style="margin-right:40px;">Background Color:</label></h6></div>
                        <div class="body" align="center" style="background-color: <?php echo $mvcore['preview_bg'];?>;">
							<!-- .. -->
							<div class="mvcore-nNote mvcore-nAnnouncement"><b>Announcement:</b><br>Vote bonus will start in 5 minutes. Vote And Get More!</div>
							<!-- .. -->
                        </div>
                    </div>
			</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Webshop_Styles') { ?> <!-- Webshop_Styles -->
		<div class="fluid" id="webshopStyleDiv">
			<div class="widget grid6">
				<div class="whead"><h6>Webshop Styling</h6><h6 style="float:right;"><b>For Theme ( <?php echo $mvcore['theme_dir'];?> )</b></h6></div>
					<div class="formRow">
						<div class="grid3"><label>Webshop Menu Position:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="webshop_s_menuposi" name="webshop_s_menuposi" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="top" <?php if( $mvcore['webshop_s_menuposi'] == 'top') { echo 'selected'; } else { echo ''; }; ?>>4 Column Top Menu</option>
								<option value="top3" <?php if( $mvcore['webshop_s_menuposi'] == 'top3') { echo 'selected'; } else { echo ''; }; ?>>3 Column Top Menu</option>
							</select>
						</div>             
					</div>
					<div class="formRow" id="webshopstyleradiusbor">
						<div class="grid3"><label>Border Radius:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="webshop_s_borderradi">Pixels:</label><input id="webshop_s_borderradi" type="text" value="<?php echo $mvcore['webshop_s_borderradi'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical9 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['webshop_s_borderradi'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Size:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="webshop_s_textsize" name="webshop_s_textsize" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="10px" <?php if( $mvcore['webshop_s_textsize'] == '10px') { echo 'selected'; } else { echo ''; }; ?>>10px</option> 
								<option value="11px" <?php if( $mvcore['webshop_s_textsize'] == '11px') { echo 'selected'; } else { echo ''; }; ?>>11px</option> 
								<option value="12px" <?php if( $mvcore['webshop_s_textsize'] == '12px') { echo 'selected'; } else { echo ''; }; ?>>12px</option> 
								<option value="13px" <?php if( $mvcore['webshop_s_textsize'] == '13px') { echo 'selected'; } else { echo ''; }; ?>>13px</option> 
								<option value="14px" <?php if( $mvcore['webshop_s_textsize'] == '14px') { echo 'selected'; } else { echo ''; }; ?>>14px</option> 
								<option value="15px" <?php if( $mvcore['webshop_s_textsize'] == '15px') { echo 'selected'; } else { echo ''; }; ?>>15px</option> 
								<option value="16px" <?php if( $mvcore['webshop_s_textsize'] == '16px') { echo 'selected'; } else { echo ''; }; ?>>16px</option> 
								<option value="17px" <?php if( $mvcore['webshop_s_textsize'] == '17px') { echo 'selected'; } else { echo ''; }; ?>>17px</option>
								<option value="18px" <?php if( $mvcore['webshop_s_textsize'] == '18px') { echo 'selected'; } else { echo ''; }; ?>>18px</option> 
								<option value="19px" <?php if( $mvcore['webshop_s_textsize'] == '19px') { echo 'selected'; } else { echo ''; }; ?>>19px</option> 
								<option value="20px" <?php if( $mvcore['webshop_s_textsize'] == '20px') { echo 'selected'; } else { echo ''; }; ?>>20px</option>
								<option value="21px" <?php if( $mvcore['webshop_s_textsize'] == '21px') { echo 'selected'; } else { echo ''; }; ?>>21px</option>
								<option value="22px" <?php if( $mvcore['webshop_s_textsize'] == '22px') { echo 'selected'; } else { echo ''; }; ?>>22px</option>
								<option value="23px" <?php if( $mvcore['webshop_s_textsize'] == '23px') { echo 'selected'; } else { echo ''; }; ?>>23px</option>
								<option value="24px" <?php if( $mvcore['webshop_s_textsize'] == '24px') { echo 'selected'; } else { echo ''; }; ?>>24px</option>
								<option value="25px" <?php if( $mvcore['webshop_s_textsize'] == '25px') { echo 'selected'; } else { echo ''; }; ?>>25px</option>
								<option value="26px" <?php if( $mvcore['webshop_s_textsize'] == '26px') { echo 'selected'; } else { echo ''; }; ?>>26px</option>
								<option value="27px" <?php if( $mvcore['webshop_s_textsize'] == '27px') { echo 'selected'; } else { echo ''; }; ?>>27px</option>
								<option value="28px" <?php if( $mvcore['webshop_s_textsize'] == '28px') { echo 'selected'; } else { echo ''; }; ?>>28px</option>
								<option value="29px" <?php if( $mvcore['webshop_s_textsize'] == '29px') { echo 'selected'; } else { echo ''; }; ?>>29px</option>
								<option value="30px" <?php if( $mvcore['webshop_s_textsize'] == '30px') { echo 'selected'; } else { echo ''; }; ?>>30px</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Font Family:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="webshop_s_textfontfami" name="webshop_s_textfontfami" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="Arial" <?php if( $mvcore['webshop_s_textfontfami'] == 'Arial') { echo 'selected'; } else { echo ''; }; ?>>Arial</option>
								<option value="Courier New" <?php if( $mvcore['webshop_s_textfontfami'] == 'Courier New') { echo 'selected'; } else { echo ''; }; ?>>Courier New</option>
								<option value="Georgia" <?php if( $mvcore['webshop_s_textfontfami'] == 'Georgia') { echo 'selected'; } else { echo ''; }; ?>>Georgia</option>
								<option value="Impact" <?php if( $mvcore['webshop_s_textfontfami'] == 'Impact') { echo 'selected'; } else { echo ''; }; ?>>Impact</option>
								<option value="Times New Roman" <?php if( $mvcore['webshop_s_textfontfami'] == 'Times New Roman') { echo 'selected'; } else { echo ''; }; ?>>Times New Roman</option>
								<option value="Trebuchet MS" <?php if( $mvcore['webshop_s_textfontfami'] == 'Trebuchet MS') { echo 'selected'; } else { echo ''; }; ?>>Trebuchet MS</option>
								<option value="Verdana" <?php if( $mvcore['webshop_s_textfontfami'] == 'Verdana') { echo 'selected'; } else { echo ''; }; ?>>Verdana</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Color:</label></div>
						<div class="grid9">
							<div class="cPicker26" id="cPicker26"><div id="webshop_s_textcolor" style="background-color: <?php echo $mvcore['webshop_s_textcolor'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Background Color:</label></div>
						<div class="grid9">
							<div class="cPicker27" id="cPicker27" style="position:absolute;"><div id="webshop_s_bgcolor" style="background-color: <?php echo $mvcore['webshop_s_bgcolor'];?>;"></div><span>Choose color ...</span></div>
						
							<div class="sliderSpecs" style="position:absolute;margin-left:170px;"><label for="webshop_bg_transMenu">Transparency:</label><input id="webshop_bg_transMenu" type="text" value="<?php echo $mvcore['webshop_bg_transMenu'];?>"></div>
							<div class="grid9" id="webshop_bg_transMenus" style="position:absolute;margin-top:3px;margin-left:280px;width:120px;"><div class="uMaxUnical05 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['webshop_bg_transMenu'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Item Background Color:</label></div>
						<div class="grid9">
							<div class="cPicker28" id="cPicker28" style="position:absolute;"><div id="webshop_s_itembgcolor" style="background-color: <?php echo $mvcore['webshop_s_itembgcolor'];?>;"></div><span>Choose color 1...</span></div>
							<div class="cPicker29" id="cPicker29" style="position:absolute;margin-left:170px;"><div id="webshop_s_itembgcolordivi" style="background-color: <?php echo $mvcore['webshop_s_itembgcolordivi'];?>;"></div><span>Choose color 2...</span></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Item Background:</label></div>
						<div class="grid9">
							<div class="sliderSpecs" style="position:absolute;"><label for="webshop_bg_trans">Transparency:</label><input id="webshop_bg_trans" type="text" value="<?php echo $mvcore['webshop_bg_trans'];?>"></div>
							<div class="grid9" id="webshop_bg_transs" style="position:absolute;margin-top:3px;margin-left:140px;width:120px;"><div class="uMaxUnical04 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['webshop_bg_trans'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>	
			</div>
			<div class="grid6">
                    <div class="widget">
                        <div id="preview_bg_uChange" class="whead"><h6>Preview</h6><h6 style="float:right;"><div class="cPicker38" id="cPicker38" style="margin-left:125px;"><div id="preview_bg" style="background-color: <?php echo $mvcore['preview_bg'];?>;"></div></div><label style="margin-right:40px;">Background Color:</label></h6></div>
                        <div class="body" align="center" style="background-color: <?php echo $mvcore['preview_bg'];?>;">
							<!-- .. -->
							<div id="hiddendivtoptri" style="display:none;">
							<div class="mvcore-ucp-info" align="center" style="width:100%;padding-top: 15px; padding-bottom: 15px;">
							<div align="center" style="width:580px;text-align:center;">
											<?php if($mvcore['wshop_page1'] == '1') { echo"<a href='#'>Swords</a> - ";} ?>
											<?php if($mvcore['wshop_page2'] == '1') { echo"<a href='#'>Axes</a> - ";} ?>
											<?php if($mvcore['wshop_page3'] == '1') { echo"<a href='#'>Maces &amp; Scepters</a> - ";} ?>
											<?php if($mvcore['wshop_page4'] == '1') { echo"<a href='#'>Spears</a> - ";} ?>
											<?php if($mvcore['wshop_page5'] == '1') { echo"<a href='#'>Bows &amp; Crosbows</a> - ";} ?>
											<?php if($mvcore['wshop_page6'] == '1') { echo"<a href='#'>Staffs</a> - ";} ?>
											<?php if($mvcore['wshop_page7'] == '1') { echo"<a href='#'>Shields</a> - ";} ?>
											<?php if($mvcore['wshop_page8'] == '1') { echo"<a href='#'>Helms</a> - ";} ?>
											<?php if($mvcore['wshop_page9'] == '1') { echo"<a href='#'>Armor</a> - ";} ?>
											<?php if($mvcore['wshop_page10'] == '1') { echo"<a href='#'>Pants</a> - ";} ?>
											<?php if($mvcore['wshop_page11'] == '1') { echo"<a href='#'>Gloves</a> - ";} ?>
											<?php if($mvcore['wshop_page12'] == '1') { echo"<a href='#'>Boots</a> - ";} ?>
											<?php if($mvcore['wshop_page13'] == '1') { echo"<a href='#'>Accessories</a> - ";} ?>
											<?php if($mvcore['wshop_page14'] == '1') { echo"<a href='#'>Miscellaneous Items</a> - ";} ?>
											<?php if($mvcore['wshop_page15'] == '1') { echo"<a href='#'>Miscellaneous Items II</a> - ";} ?>
											<?php if($mvcore['wshop_page16'] == '1') { echo"<a href='#'>Scrolls</a>";} ?>
							</div>
							</div>
							<br>
							<br>
										<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
											<tr align="center">
											<td class="mvcore-itemnclass">
												<table align="center" cellpadding="0" cellspacing="0">
													<tr>
														<td class="mvcore-item-top"><div align="center"><a href="#">Lightning Sword</a></div></td>
													</tr>
													<tr>
														<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="system/engine_images/webshop/item_images/0/14.gif" border="0"></center></div></td>
													
													</tr>
												</table>
											</td>
											<td class="mvcore-itemnclass">
												<table align="center" cellpadding="0" cellspacing="0">
													<tr>
														<td class="mvcore-item-top"><div align="center"><a href="#">Knight Blade</a></div></td>
													</tr>
													<tr>
														<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="system/engine_images/webshop/item_images/0/20.gif" border="0"></center></div></td>
													
													</tr>
												</table>
											</td>
											<td class="mvcore-itemnclass">
												<table align="center" cellpadding="0" cellspacing="0">
													<tr>
														<td class="mvcore-item-top"><div align="center"><a href="#">Bone Blade</a></div></td>
													</tr>
													<tr>
														<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="system/engine_images/webshop/item_images/0/22.gif" border="0"></center></div></td>
													
													</tr>
												</table>
											</td>
											</tr><tr><td height="15px"></td></tr>
										</table>
							</div>
							<div id="hiddendivtop" style="display:none;">
							<div class="mvcore-ucp-info" align="center" style="width:100%;padding-top: 15px; padding-bottom: 15px;">
							<div align="center" style="width:580px;text-align:center;">
											<?php if($mvcore['wshop_page1'] == '1') { echo"<a href='#'>Swords</a> - ";} ?>
											<?php if($mvcore['wshop_page2'] == '1') { echo"<a href='#'>Axes</a> - ";} ?>
											<?php if($mvcore['wshop_page3'] == '1') { echo"<a href='#'>Maces &amp; Scepters</a> - ";} ?>
											<?php if($mvcore['wshop_page4'] == '1') { echo"<a href='#'>Spears</a> - ";} ?>
											<?php if($mvcore['wshop_page5'] == '1') { echo"<a href='#'>Bows &amp; Crosbows</a> - ";} ?>
											<?php if($mvcore['wshop_page6'] == '1') { echo"<a href='#'>Staffs</a> - ";} ?>
											<?php if($mvcore['wshop_page7'] == '1') { echo"<a href='#'>Shields</a> - ";} ?>
											<?php if($mvcore['wshop_page8'] == '1') { echo"<a href='#'>Helms</a> - ";} ?>
											<?php if($mvcore['wshop_page9'] == '1') { echo"<a href='#'>Armor</a> - ";} ?>
											<?php if($mvcore['wshop_page10'] == '1') { echo"<a href='#'>Pants</a> - ";} ?>
											<?php if($mvcore['wshop_page11'] == '1') { echo"<a href='#'>Gloves</a> - ";} ?>
											<?php if($mvcore['wshop_page12'] == '1') { echo"<a href='#'>Boots</a> - ";} ?>
											<?php if($mvcore['wshop_page13'] == '1') { echo"<a href='#'>Accessories</a> - ";} ?>
											<?php if($mvcore['wshop_page14'] == '1') { echo"<a href='#'>Miscellaneous Items</a> - ";} ?>
											<?php if($mvcore['wshop_page15'] == '1') { echo"<a href='#'>Miscellaneous Items II</a> - ";} ?>
											<?php if($mvcore['wshop_page16'] == '1') { echo"<a href='#'>Scrolls</a>";} ?>
							</div>
							</div>
							<br>
							<br>
										<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
											<tr align="center">
											<td class="mvcore-itemnclass">
												<table align="center" cellpadding="0" cellspacing="0">
													<tr>
														<td class="mvcore-item-top"><div align="center"><a href="#">Kriss</a></div></td>
													</tr>
													<tr>
														<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="system/engine_images/webshop/item_images/0/0.gif" border="0"></center></div></td>
													
													</tr>
												</table>
											</td>
											<td class="mvcore-itemnclass">
												<table align="center" cellpadding="0" cellspacing="0">
													<tr>
														<td class="mvcore-item-top"><div align="center"><a href="#">Lightning Sword</a></div></td>
													</tr>
													<tr>
														<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="system/engine_images/webshop/item_images/0/14.gif" border="0"></center></div></td>
													
													</tr>
												</table>
											</td>
											<td class="mvcore-itemnclass">
												<table align="center" cellpadding="0" cellspacing="0">
													<tr>
														<td class="mvcore-item-top"><div align="center"><a href="#">Knight Blade</a></div></td>
													</tr>
													<tr>
														<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="system/engine_images/webshop/item_images/0/20.gif" border="0"></center></div></td>
													
													</tr>
												</table>
											</td>
											<td class="mvcore-itemnclass">
												<table align="center" cellpadding="0" cellspacing="0">
													<tr>
														<td class="mvcore-item-top"><div align="center"><a href="#">Bone Blade</a></div></td>
													</tr>
													<tr>
														<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="system/engine_images/webshop/item_images/0/22.gif" border="0"></center></div></td>
													
													</tr>
												</table>
											</td>
											</tr><tr><td height="15px"></td></tr>
										</table>
							</div>
							<div id="hiddendivleft" style="display:none;">
							<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr align="center">
									<td align="center">
										<div class="mvcore-ucp-info" align="left" style="width:145px;height:100%;text-align:left;padding:10px;">
														<?php if($mvcore['wshop_page1'] == '1') { echo"<a href='#'>Swords</a> <br> ";} ?>
														<?php if($mvcore['wshop_page2'] == '1') { echo"<a href='#'>Axes</a> <br> ";} ?>
														<?php if($mvcore['wshop_page3'] == '1') { echo"<a href='#'>Maces &amp; Scepters</a> <br> ";} ?>
														<?php if($mvcore['wshop_page4'] == '1') { echo"<a href='#'>Spears</a> <br> ";} ?>
														<?php if($mvcore['wshop_page5'] == '1') { echo"<a href='#'>Bows &amp; Crosbows</a> <br> ";} ?>
														<?php if($mvcore['wshop_page6'] == '1') { echo"<a href='#'>Staffs</a> <br> ";} ?>
														<?php if($mvcore['wshop_page7'] == '1') { echo"<a href='#'>Shields</a> <br> ";} ?>
														<?php if($mvcore['wshop_page8'] == '1') { echo"<a href='#'>Helms</a> <br> ";} ?>
														<?php if($mvcore['wshop_page9'] == '1') { echo"<a href='#'>Armor</a> <br> ";} ?>
														<?php if($mvcore['wshop_page10'] == '1') { echo"<a href='#'>Pants</a> <br> ";} ?>
														<?php if($mvcore['wshop_page11'] == '1') { echo"<a href='#'>Gloves</a> <br> ";} ?>
														<?php if($mvcore['wshop_page12'] == '1') { echo"<a href='#'>Boots</a> <br> ";} ?>
														<?php if($mvcore['wshop_page13'] == '1') { echo"<a href='#'>Accessories</a> <br> ";} ?>
														<?php if($mvcore['wshop_page14'] == '1') { echo"<a href='#'>Miscellaneous Items</a> <br> ";} ?>
														<?php if($mvcore['wshop_page15'] == '1') { echo"<a href='#'>Miscellaneous Items II</a> <br> ";} ?>
														<?php if($mvcore['wshop_page16'] == '1') { echo"<a href='#'>Scrolls</a>";} ?>
										</div>
									</td>
									<td align="center">
													<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
														<tr align="center">
														<td class="mvcore-itemnclass">
															<table align="center" cellpadding="0" cellspacing="0">
																<tr>
																	<td class="mvcore-item-top"><div align="center"><a href="#">Lightning Sword</a></div></td>
																</tr>
																<tr>
																	<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="system/engine_images/webshop/item_images/0/14.gif" border="0"></center></div></td>
																
																</tr>
															</table>
														</td>
														<td class="mvcore-itemnclass">
															<table align="center" cellpadding="0" cellspacing="0">
																<tr>
																	<td class="mvcore-item-top"><div align="center"><a href="#">Knight Blade</a></div></td>
																</tr>
																<tr>
																	<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="system/engine_images/webshop/item_images/0/20.gif" border="0"></center></div></td>
																
																</tr>
															</table>
														</td>
														<td class="mvcore-itemnclass">
															<table align="center" cellpadding="0" cellspacing="0">
																<tr>
																	<td class="mvcore-item-top"><div align="center"><a href="#">Bone Blade</a></div></td>
																</tr>
																<tr>
																	<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="system/engine_images/webshop/item_images/0/22.gif" border="0"></center></div></td>
																
																</tr>
															</table>
														</td>
														</tr><tr><td height="15px"></td></tr>
													</table>
									</td>
								</tr>
							</table>
							</div>
							<div id="hiddendivright" style="display:none;">
							<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr align="center">
									<td align="center">
													<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
														<tr align="center">
														<td class="mvcore-itemnclass">
															<table align="center" cellpadding="0" cellspacing="0">
																<tr>
																	<td class="mvcore-item-top"><div align="center"><a href="#">Lightning Sword</a></div></td>
																</tr>
																<tr>
																	<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="system/engine_images/webshop/item_images/0/14.gif" border="0"></center></div></td>
																
																</tr>
															</table>
														</td>
														<td class="mvcore-itemnclass">
															<table align="center" cellpadding="0" cellspacing="0">
																<tr>
																	<td class="mvcore-item-top"><div align="center"><a href="#">Knight Blade</a></div></td>
																</tr>
																<tr>
																	<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="system/engine_images/webshop/item_images/0/20.gif" border="0"></center></div></td>
																
																</tr>
															</table>
														</td>
														<td class="mvcore-itemnclass">
															<table align="center" cellpadding="0" cellspacing="0">
																<tr>
																	<td class="mvcore-item-top"><div align="center"><a href="#">Bone Blade</a></div></td>
																</tr>
																<tr>
																	<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="system/engine_images/webshop/item_images/0/22.gif" border="0"></center></div></td>
																
																</tr>
															</table>
														</td>
														</tr><tr><td height="15px"></td></tr>
													</table>
									</td>
									<td align="center">
										<div class="mvcore-ucp-info" align="right" style="width:145px;height:100%;text-align:right;padding:10px;">
														<?php if($mvcore['wshop_page1'] == '1') { echo"<a href='#'>Swords</a> <br> ";} ?>
														<?php if($mvcore['wshop_page2'] == '1') { echo"<a href='#'>Axes</a> <br> ";} ?>
														<?php if($mvcore['wshop_page3'] == '1') { echo"<a href='#'>Maces &amp; Scepters</a> <br> ";} ?>
														<?php if($mvcore['wshop_page4'] == '1') { echo"<a href='#'>Spears</a> <br> ";} ?>
														<?php if($mvcore['wshop_page5'] == '1') { echo"<a href='#'>Bows &amp; Crosbows</a> <br> ";} ?>
														<?php if($mvcore['wshop_page6'] == '1') { echo"<a href='#'>Staffs</a> <br> ";} ?>
														<?php if($mvcore['wshop_page7'] == '1') { echo"<a href='#'>Shields</a> <br> ";} ?>
														<?php if($mvcore['wshop_page8'] == '1') { echo"<a href='#'>Helms</a> <br> ";} ?>
														<?php if($mvcore['wshop_page9'] == '1') { echo"<a href='#'>Armor</a> <br> ";} ?>
														<?php if($mvcore['wshop_page10'] == '1') { echo"<a href='#'>Pants</a> <br> ";} ?>
														<?php if($mvcore['wshop_page11'] == '1') { echo"<a href='#'>Gloves</a> <br> ";} ?>
														<?php if($mvcore['wshop_page12'] == '1') { echo"<a href='#'>Boots</a> <br> ";} ?>
														<?php if($mvcore['wshop_page13'] == '1') { echo"<a href='#'>Accessories</a> <br> ";} ?>
														<?php if($mvcore['wshop_page14'] == '1') { echo"<a href='#'>Miscellaneous Items</a> <br> ";} ?>
														<?php if($mvcore['wshop_page15'] == '1') { echo"<a href='#'>Miscellaneous Items II</a> <br> ";} ?>
														<?php if($mvcore['wshop_page16'] == '1') { echo"<a href='#'>Scrolls</a>";} ?>
										</div>
									</td>
								</tr>
							</table>
							</div>
							<!-- .. -->
                        </div>
                    </div>
			</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Game_Panel_Styles') { ?> <!-- Input_manage -->
		<div class="fluid" id="gamePanelStylingsim">
			<div class="widget grid6">
				<div class="whead"><h6>Game Panel Styling</h6><h6 style="float:right;"><b>For Theme ( <?php echo $mvcore['theme_dir'];?> )</b></h6></div>
				
				
					<div class="formRow" id="gp_s_widths">
						<div class="grid3"><label>Width:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="gp_s_width">Pixels:</label><input id="gp_s_width" type="text" value="<?php echo $mvcore['gp_s_width'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical12 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['gp_s_width'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow" id="gp_s_heights">
						<div class="grid3"><label>Height:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="gp_s_height">Pixels:</label><input id="gp_s_height" type="text" value="<?php echo $mvcore['gp_s_height'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical13 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['gp_s_height'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					
					
					<div class="formRow" id="gamepanelradiroll1">
						<div class="grid3"><label>Border Radius:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="gp_s_borradiu">Pixels:</label><input id="gp_s_borradiu" type="text" value="<?php echo $mvcore['gp_s_borradiu'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical10 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['gp_s_borradiu'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow" id="gamepanelradiroll12">
						<div class="grid3"><label>Border Size:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="gp_s_borsize">Pixels:</label><input id="gp_s_borsize" type="text" value="<?php echo $mvcore['gp_s_borsize'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical11 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['gp_s_borsize'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Border Color:</label></div>
						<div class="grid9">
							<div class="cPicker30" id="cPicker30"><div id="gp_s_borcolor" style="background-color: <?php echo $mvcore['gp_s_borcolor'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Link Text Size:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="gp_s_ltextsize" name="gp_s_ltextsize" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="10px" <?php if( $mvcore['gp_s_ltextsize'] == '10px') { echo 'selected'; } else { echo ''; }; ?>>10px</option> 
								<option value="11px" <?php if( $mvcore['gp_s_ltextsize'] == '11px') { echo 'selected'; } else { echo ''; }; ?>>11px</option> 
								<option value="12px" <?php if( $mvcore['gp_s_ltextsize'] == '12px') { echo 'selected'; } else { echo ''; }; ?>>12px</option> 
								<option value="13px" <?php if( $mvcore['gp_s_ltextsize'] == '13px') { echo 'selected'; } else { echo ''; }; ?>>13px</option> 
								<option value="14px" <?php if( $mvcore['gp_s_ltextsize'] == '14px') { echo 'selected'; } else { echo ''; }; ?>>14px</option> 
								<option value="15px" <?php if( $mvcore['gp_s_ltextsize'] == '15px') { echo 'selected'; } else { echo ''; }; ?>>15px</option> 
								<option value="16px" <?php if( $mvcore['gp_s_ltextsize'] == '16px') { echo 'selected'; } else { echo ''; }; ?>>16px</option> 
								<option value="17px" <?php if( $mvcore['gp_s_ltextsize'] == '17px') { echo 'selected'; } else { echo ''; }; ?>>17px</option>
								<option value="18px" <?php if( $mvcore['gp_s_ltextsize'] == '18px') { echo 'selected'; } else { echo ''; }; ?>>18px</option> 
								<option value="19px" <?php if( $mvcore['gp_s_ltextsize'] == '19px') { echo 'selected'; } else { echo ''; }; ?>>19px</option> 
								<option value="20px" <?php if( $mvcore['gp_s_ltextsize'] == '20px') { echo 'selected'; } else { echo ''; }; ?>>20px</option>
								<option value="21px" <?php if( $mvcore['gp_s_ltextsize'] == '21px') { echo 'selected'; } else { echo ''; }; ?>>21px</option>
								<option value="22px" <?php if( $mvcore['gp_s_ltextsize'] == '22px') { echo 'selected'; } else { echo ''; }; ?>>22px</option>
								<option value="23px" <?php if( $mvcore['gp_s_ltextsize'] == '23px') { echo 'selected'; } else { echo ''; }; ?>>23px</option>
								<option value="24px" <?php if( $mvcore['gp_s_ltextsize'] == '24px') { echo 'selected'; } else { echo ''; }; ?>>24px</option>
								<option value="25px" <?php if( $mvcore['gp_s_ltextsize'] == '25px') { echo 'selected'; } else { echo ''; }; ?>>25px</option>
								<option value="26px" <?php if( $mvcore['gp_s_ltextsize'] == '26px') { echo 'selected'; } else { echo ''; }; ?>>26px</option>
								<option value="27px" <?php if( $mvcore['gp_s_ltextsize'] == '27px') { echo 'selected'; } else { echo ''; }; ?>>27px</option>
								<option value="28px" <?php if( $mvcore['gp_s_ltextsize'] == '28px') { echo 'selected'; } else { echo ''; }; ?>>28px</option>
								<option value="29px" <?php if( $mvcore['gp_s_ltextsize'] == '29px') { echo 'selected'; } else { echo ''; }; ?>>29px</option>
								<option value="30px" <?php if( $mvcore['gp_s_ltextsize'] == '30px') { echo 'selected'; } else { echo ''; }; ?>>30px</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Link Text Color:</label></div>
						<div class="grid9">
							<div class="cPicker31" id="cPicker31"><div id="gp_s_ltextcolor" style="background-color: <?php echo $mvcore['gp_s_ltextcolor'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Background Color:</label></div>
						<div class="grid9">
							<div class="cPicker33" id="cPicker33" style="position:absolute;"><div id="gp_s_bgcolor" style="background-color: <?php echo $mvcore['gp_s_bgcolor'];?>;"></div><span>Choose color ...</span></div>
							
							<div class="sliderSpecs" style="position:absolute;margin-left:170px;"><label for="gameP_bg_trans">Transparency:</label><input id="gameP_bg_trans" type="text" value="<?php echo $mvcore['gameP_bg_trans'];?>"></div>
							<div class="grid9" id="gameP_bg_transs" style="position:absolute;margin-top:3px;margin-left:280px;width:120px;"><div class="uMaxUnical06 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['gameP_bg_trans'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						
						</div>
					</div>
			</div>
                
			<div class="grid6">
                    <div class="widget">
                        <div id="preview_bg_uChange" class="whead"><h6>Preview</h6><h6 style="float:right;"><div class="cPicker38" id="cPicker38" style="margin-left:125px;"><div id="preview_bg" style="background-color: <?php echo $mvcore['preview_bg'];?>;"></div></div><label style="margin-right:40px;">Background Color:</label></h6></div>
                        <div class="body" align="center" style="background-color: <?php echo $mvcore['preview_bg'];?>;">
							<!-- .. -->
								<div align="center" width="100%">
									<table width="100%" align="center" cellpadding="0" cellspacing="0">
										<tr width="100%" align="center">
											<td >
												<div class="mvcore-gp-container" align="center">
													<div class="mvcore-gp-item"><button class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">Reset Character</button></div>
													<div class="mvcore-gp-item"><button class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">Grand Reset</button></div>
													<div class="mvcore-gp-item"><button class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">Add Stats</button></div>
													<div class="mvcore-gp-item"><button class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">Buy Level Up Points</button></div>
													<div class="mvcore-gp-item"><button class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">Change Class</button></div>
												</div>
											</td>
										</tr>
									</table>
								</div>
							<!-- .. -->
                        </div>
                    </div>
			</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'InputSelect_Styling') { ?> <!-- Input_manage -->
		<div class="fluid" id="InputSelectStyling">
			<div class="widget grid6">
				<div class="whead"><h6>Input/Select Styling</h6><h6 style="float:right;"><b>For Theme ( <?php echo $mvcore['theme_dir'];?> )</b></h6></div>
					<div class="formRow" id="InputStyling1">
						<div class="grid3"><label>Vertical Size:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="inpSelec_s_vsize">Pixels:</label><input id="inpSelec_s_vsize" type="text" value="<?php echo $mvcore['inpSelec_s_vsize'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical212 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['inpSelec_s_vsize'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow" id="InputStyling2">
						<div class="grid3"><label>Horizontal Size:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="inpSelec_s_hsize">Pixels:</label><input id="inpSelec_s_hsize" type="text" value="<?php echo $mvcore['inpSelec_s_hsize'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical235 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['inpSelec_s_hsize'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow" id="inpSelectStyling1">
						<div class="grid3"><label>Border Radius:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="inpSelec_s_bradius">Pixels:</label><input id="inpSelec_s_bradius" type="text" value="<?php echo $mvcore['inpSelec_s_bradius'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical7 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['inpSelec_s_bradius'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Border Color:</label></div>
						<div class="grid9">
							<div class="cPicker21" id="cPicker21"><div id="inpSelec_s_borcolor" style="background-color: <?php echo $mvcore['inpSelec_s_borcolor'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					
					<div class="formRow">
						<div class="grid3"><label>Text Font Family:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="inpSelec_s_textfontf" name="inpSelec_s_textfontf" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="Arial" <?php if( $mvcore['inpSelec_s_textfontf'] == 'Arial') { echo 'selected'; } else { echo ''; }; ?>>Arial</option>
								<option value="Courier New" <?php if( $mvcore['inpSelec_s_textfontf'] == 'Courier New') { echo 'selected'; } else { echo ''; }; ?>>Courier New</option>
								<option value="Georgia" <?php if( $mvcore['inpSelec_s_textfontf'] == 'Georgia') { echo 'selected'; } else { echo ''; }; ?>>Georgia</option>
								<option value="Impact" <?php if( $mvcore['inpSelec_s_textfontf'] == 'Impact') { echo 'selected'; } else { echo ''; }; ?>>Impact</option>
								<option value="Times New Roman" <?php if( $mvcore['inpSelec_s_textfontf'] == 'Times New Roman') { echo 'selected'; } else { echo ''; }; ?>>Times New Roman</option>
								<option value="Trebuchet MS" <?php if( $mvcore['inpSelec_s_textfontf'] == 'Trebuchet MS') { echo 'selected'; } else { echo ''; }; ?>>Trebuchet MS</option>
								<option value="Verdana" <?php if( $mvcore['inpSelec_s_textfontf'] == 'Verdana') { echo 'selected'; } else { echo ''; }; ?>>Verdana</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Size:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="inpSelec_s_textsize" name="inpSelec_s_textsize" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="10px" <?php if( $mvcore['inpSelec_s_textsize'] == '10px') { echo 'selected'; } else { echo ''; }; ?>>10px</option> 
								<option value="11px" <?php if( $mvcore['inpSelec_s_textsize'] == '11px') { echo 'selected'; } else { echo ''; }; ?>>11px</option> 
								<option value="12px" <?php if( $mvcore['inpSelec_s_textsize'] == '12px') { echo 'selected'; } else { echo ''; }; ?>>12px</option> 
								<option value="13px" <?php if( $mvcore['inpSelec_s_textsize'] == '13px') { echo 'selected'; } else { echo ''; }; ?>>13px</option> 
								<option value="14px" <?php if( $mvcore['inpSelec_s_textsize'] == '14px') { echo 'selected'; } else { echo ''; }; ?>>14px</option> 
								<option value="15px" <?php if( $mvcore['inpSelec_s_textsize'] == '15px') { echo 'selected'; } else { echo ''; }; ?>>15px</option> 
								<option value="16px" <?php if( $mvcore['inpSelec_s_textsize'] == '16px') { echo 'selected'; } else { echo ''; }; ?>>16px</option> 
								<option value="17px" <?php if( $mvcore['inpSelec_s_textsize'] == '17px') { echo 'selected'; } else { echo ''; }; ?>>17px</option>
								<option value="18px" <?php if( $mvcore['inpSelec_s_textsize'] == '18px') { echo 'selected'; } else { echo ''; }; ?>>18px</option> 
								<option value="19px" <?php if( $mvcore['inpSelec_s_textsize'] == '19px') { echo 'selected'; } else { echo ''; }; ?>>19px</option> 
								<option value="20px" <?php if( $mvcore['inpSelec_s_textsize'] == '20px') { echo 'selected'; } else { echo ''; }; ?>>20px</option>
								<option value="21px" <?php if( $mvcore['inpSelec_s_textsize'] == '21px') { echo 'selected'; } else { echo ''; }; ?>>21px</option>
								<option value="22px" <?php if( $mvcore['inpSelec_s_textsize'] == '22px') { echo 'selected'; } else { echo ''; }; ?>>22px</option>
								<option value="23px" <?php if( $mvcore['inpSelec_s_textsize'] == '23px') { echo 'selected'; } else { echo ''; }; ?>>23px</option>
								<option value="24px" <?php if( $mvcore['inpSelec_s_textsize'] == '24px') { echo 'selected'; } else { echo ''; }; ?>>24px</option>
								<option value="25px" <?php if( $mvcore['inpSelec_s_textsize'] == '25px') { echo 'selected'; } else { echo ''; }; ?>>25px</option>
								<option value="26px" <?php if( $mvcore['inpSelec_s_textsize'] == '26px') { echo 'selected'; } else { echo ''; }; ?>>26px</option>
								<option value="27px" <?php if( $mvcore['inpSelec_s_textsize'] == '27px') { echo 'selected'; } else { echo ''; }; ?>>27px</option>
								<option value="28px" <?php if( $mvcore['inpSelec_s_textsize'] == '28px') { echo 'selected'; } else { echo ''; }; ?>>28px</option>
								<option value="29px" <?php if( $mvcore['inpSelec_s_textsize'] == '29px') { echo 'selected'; } else { echo ''; }; ?>>29px</option>
								<option value="30px" <?php if( $mvcore['inpSelec_s_textsize'] == '30px') { echo 'selected'; } else { echo ''; }; ?>>30px</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Color:</label></div>
						<div class="grid9">
							<div class="cPicker24" id="cPicker24"><div id="inpSelec_s_textcolor" style="background-color: <?php echo $mvcore['inpSelec_s_textcolor'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Active Color:</label></div>
						<div class="grid9">
							<div class="cPicker25" id="cPicker25"><div id="inpSelec_s_textcoloractiv" style="background-color: <?php echo $mvcore['inpSelec_s_textcoloractiv'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Background Color:</label></div>
						<div class="grid9">
							<div class="cPicker22" id="cPicker22" style="position:absolute;"><div id="inpSelec_s_bgcolor" style="background-color: <?php echo $mvcore['inpSelec_s_bgcolor'];?>;"></div><span>Choose color ...</span></div>
							
							<div class="sliderSpecs" style="position:absolute;margin-left:170px;"><label for="inpSelect_bg_trans">Transparency:</label><input id="inpSelect_bg_trans" type="text" value="<?php echo $mvcore['inpSelect_bg_trans'];?>"></div>
							<div class="grid9" id="inpSelect_bg_transs" style="position:absolute;margin-top:3px;margin-left:280px;width:120px;"><div class="uMaxUnical07 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['inpSelect_bg_trans'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						
						</div>
					</div>
					
					<div class="formRow">
						<div class="grid3"><label>Background Active Color:</label></div>
						<div class="grid9">
							<div class="cPicker23" id="cPicker23" style="position:absolute;"><div id="inpSelec_s_bgcoloractiv" style="background-color: <?php echo $mvcore['inpSelec_s_bgcoloractiv'];?>;"></div><span>Choose color ...</span></div>
							
							<div class="sliderSpecs" style="position:absolute;margin-left:170px;"><label for="inpSelect_bg_transHover">Transparency:</label><input id="inpSelect_bg_transHover" type="text" value="<?php echo $mvcore['inpSelect_bg_transHover'];?>"></div>
							<div class="grid9" id="inpSelect_bg_transHovers" style="position:absolute;margin-top:3px;margin-left:280px;width:120px;"><div class="uMaxUnical08 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['inpSelect_bg_transHover'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						
						</div>
					</div>
			</div>
                
			<div class="grid6">
                    <div class="widget">
                        <div id="preview_bg_uChange" class="whead"><h6>Preview</h6><h6 style="float:right;"><div class="cPicker38" id="cPicker38" style="margin-left:125px;"><div id="preview_bg" style="background-color: <?php echo $mvcore['preview_bg'];?>;"></div></div><label style="margin-right:40px;">Background Color:</label></h6></div>
                        <div class="body" align="center" style="background-color: <?php echo $mvcore['preview_bg'];?>;">
							<input class="mvcore-input-main-FTM" type="text" name="old_password" value="Some Text 0" placeholder="Some Text 0" maxlength="10"/><br><br>
							<select class="mvcore-select-main-FTM">
								<option value="st1">Some Text 1</option>
								<option value="st2">Some Text 2</option>
								<option value="st3">Some Text 3</option>
								<option value="st4">Some Text 4</option>
							</select>
                        </div>
                    </div>
			</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Button_Styling') { ?> <!-- Input_manage -->
		<div class="fluid" id="buttonStyling">
			<div class="widget grid6">
				<div class="whead"><h6>Button Styling</h6><h6 style="float:right;"><b>For Theme ( <?php echo $mvcore['theme_dir'];?> )</b></h6></div>
					<div class="formRow" id="buttonStyling1">
						<div class="grid3"><label>Vertical Size:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="button_s_vsize">Pixels:</label><input id="button_s_vsize" type="text" value="<?php echo $mvcore['button_s_vsize'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['button_s_vsize'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow" id="buttonStyling2">
						<div class="grid3"><label>Horizontal Size:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="button_s_hsize">Pixels:</label><input id="button_s_hsize" type="text" value="<?php echo $mvcore['button_s_hsize'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical2 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['button_s_hsize'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow" id="buttonStyling3">
						<div class="grid3"><label>Border Radius:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="button_s_bradius">Pixels:</label><input id="button_s_bradius" type="text" value="<?php echo $mvcore['button_s_bradius'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical3 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['button_s_bradius'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow" id="buttonStyling4">
						<div class="grid3"><label>Border Size:</label></div>
						<div class="grid9">
							<div class="sliderSpecs">
								<label for="button_s_bsizes">Pixels:</label><input id="button_s_bsizes" type="text" value="<?php echo $mvcore['button_s_bsizes'];?>">
							</div>
							<div class="grid9"><div class="uMaxUnical4 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a style="left: <?php echo $mvcore['button_s_bsizes'];?>%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Border Color:</label></div>
						<div class="grid9">
							<div class="cPicker7" id="cPicker7"><div id="button_s_bordecolor" style="background-color: <?php echo $mvcore['button_s_bordecolor'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					
					<div class="formRow">
						<div class="grid3"><label>Background Color:</label></div>
						<div class="grid9">
							<div class="cPicker8" id="cPicker8" style="position:absolute;"><div id="button_s_bgtcolor" style="background-color: <?php echo $mvcore['button_s_bgtcolor'];?>;"></div><span>Choose color 1...</span></div>
							<div class="cPicker9" id="cPicker9" style="position:absolute;margin-left:170px;"><div id="button_s_bgbcolor" style="background-color: <?php echo $mvcore['button_s_bgbcolor'];?>;"></div><span>Choose color 2...</span></div>
						</div>
					</div>
					
					<div class="formRow">
						<div class="grid3"><label>Background Hover Color:</label></div>
						<div class="grid9">
							<div class="cPicker10" id="cPicker10" style="position:absolute;"><div id="button_s_bgtcolorhover" style="background-color: <?php echo $mvcore['button_s_bgtcolorhover'];?>;"></div><span>Choose color 1...</span></div>
							<div class="cPicker11" id="cPicker11" style="position:absolute;margin-left:170px;"><div id="button_s_bgbcolorhover" style="background-color: <?php echo $mvcore['button_s_bgbcolorhover'];?>;"></div><span>Choose color 2...</span></div>
						</div>
					</div>
			</div>
                
			<div class="grid6">
                    <div class="widget">
                        <div id="preview_bg_uChange" class="whead"><h6>Preview</h6><h6 style="float:right;"><div class="cPicker38" id="cPicker38" style="margin-left:125px;"><div id="preview_bg" style="background-color: <?php echo $mvcore['preview_bg'];?>;"></div></div><label style="margin-right:40px;">Background Color:</label></h6></div>
                        <div class="body" align="center" style="background-color: <?php echo $mvcore['preview_bg'];?>;">
							<button class="mvcore-button-style" style="cursor:pointer" type="submit">Submit Button</button>
                        </div>
                    </div>
			</div>
			
			<div class="widget grid6">
				<div class="whead"><h6>Button Text Styling</h6><h6 style="float:right;"><b>For Theme ( <?php echo $mvcore['theme_dir'];?> )</b></h6></div>
					<div class="formRow">
						<div class="grid3"><label>Text Font Family:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="button_s_textfontf" name="button_s_textfontf" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="Arial" <?php if( $mvcore['button_s_textfontf'] == 'Arial') { echo 'selected'; } else { echo ''; }; ?>>Arial</option>
								<option value="Courier New" <?php if( $mvcore['button_s_textfontf'] == 'Courier New') { echo 'selected'; } else { echo ''; }; ?>>Courier New</option>
								<option value="Georgia" <?php if( $mvcore['button_s_textfontf'] == 'Georgia') { echo 'selected'; } else { echo ''; }; ?>>Georgia</option>
								<option value="Impact" <?php if( $mvcore['button_s_textfontf'] == 'Impact') { echo 'selected'; } else { echo ''; }; ?>>Impact</option>
								<option value="Times New Roman" <?php if( $mvcore['button_s_textfontf'] == 'Times New Roman') { echo 'selected'; } else { echo ''; }; ?>>Times New Roman</option>
								<option value="Trebuchet MS" <?php if( $mvcore['button_s_textfontf'] == 'Trebuchet MS') { echo 'selected'; } else { echo ''; }; ?>>Trebuchet MS</option>
								<option value="Verdana" <?php if( $mvcore['button_s_textfontf'] == 'Verdana') { echo 'selected'; } else { echo ''; }; ?>>Verdana</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Transform:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="button_s_textfonttans" name="button_s_textfonttans" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="none" <?php if( $mvcore['button_s_textfonttans'] == 'none') { echo 'selected'; } else { echo ''; }; ?>>None</option>
								<option value="uppercase" <?php if( $mvcore['button_s_textfonttans'] == 'uppercase') { echo 'selected'; } else { echo ''; }; ?>>Uppercase</option>
								<option value="lowercase" <?php if( $mvcore['button_s_textfonttans'] == 'lowercase') { echo 'selected'; } else { echo ''; }; ?>>Lowercase</option>
							</select>
						</div> 
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Bold:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="button_s_textbold" name="button_s_textbold" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="normal" <?php if( $mvcore['button_s_textbold'] == 'normal') { echo 'selected'; } else { echo ''; }; ?>>Normal</option>
								<option value="bold" <?php if( $mvcore['button_s_textbold'] == 'bold') { echo 'selected'; } else { echo ''; }; ?>>Bold</option>
							</select>
						</div> 
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Size:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="button_s_textsize" name="button_s_textsize" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="10px" <?php if( $mvcore['button_s_textsize'] == '10px') { echo 'selected'; } else { echo ''; }; ?>>10px</option> 
								<option value="11px" <?php if( $mvcore['button_s_textsize'] == '11px') { echo 'selected'; } else { echo ''; }; ?>>11px</option> 
								<option value="12px" <?php if( $mvcore['button_s_textsize'] == '12px') { echo 'selected'; } else { echo ''; }; ?>>12px</option> 
								<option value="13px" <?php if( $mvcore['button_s_textsize'] == '13px') { echo 'selected'; } else { echo ''; }; ?>>13px</option> 
								<option value="14px" <?php if( $mvcore['button_s_textsize'] == '14px') { echo 'selected'; } else { echo ''; }; ?>>14px</option> 
								<option value="15px" <?php if( $mvcore['button_s_textsize'] == '15px') { echo 'selected'; } else { echo ''; }; ?>>15px</option> 
								<option value="16px" <?php if( $mvcore['button_s_textsize'] == '16px') { echo 'selected'; } else { echo ''; }; ?>>16px</option> 
								<option value="17px" <?php if( $mvcore['button_s_textsize'] == '17px') { echo 'selected'; } else { echo ''; }; ?>>17px</option>
								<option value="18px" <?php if( $mvcore['button_s_textsize'] == '18px') { echo 'selected'; } else { echo ''; }; ?>>18px</option> 
								<option value="19px" <?php if( $mvcore['button_s_textsize'] == '19px') { echo 'selected'; } else { echo ''; }; ?>>19px</option> 
								<option value="20px" <?php if( $mvcore['button_s_textsize'] == '20px') { echo 'selected'; } else { echo ''; }; ?>>20px</option>
								<option value="21px" <?php if( $mvcore['button_s_textsize'] == '21px') { echo 'selected'; } else { echo ''; }; ?>>21px</option>
								<option value="22px" <?php if( $mvcore['button_s_textsize'] == '22px') { echo 'selected'; } else { echo ''; }; ?>>22px</option>
								<option value="23px" <?php if( $mvcore['button_s_textsize'] == '23px') { echo 'selected'; } else { echo ''; }; ?>>23px</option>
								<option value="24px" <?php if( $mvcore['button_s_textsize'] == '24px') { echo 'selected'; } else { echo ''; }; ?>>24px</option>
								<option value="25px" <?php if( $mvcore['button_s_textsize'] == '25px') { echo 'selected'; } else { echo ''; }; ?>>25px</option>
								<option value="26px" <?php if( $mvcore['button_s_textsize'] == '26px') { echo 'selected'; } else { echo ''; }; ?>>26px</option>
								<option value="27px" <?php if( $mvcore['button_s_textsize'] == '27px') { echo 'selected'; } else { echo ''; }; ?>>27px</option>
								<option value="28px" <?php if( $mvcore['button_s_textsize'] == '28px') { echo 'selected'; } else { echo ''; }; ?>>28px</option>
								<option value="29px" <?php if( $mvcore['button_s_textsize'] == '29px') { echo 'selected'; } else { echo ''; }; ?>>29px</option>
								<option value="30px" <?php if( $mvcore['button_s_textsize'] == '30px') { echo 'selected'; } else { echo ''; }; ?>>30px</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Color:</label></div>
						<div class="grid9">
							<div class="cPicker12" id="cPicker12"><div id="button_s_textcolor" style="background-color: <?php echo $mvcore['button_s_textcolor'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Text Hover Color:</label></div>
						<div class="grid9">
							<div class="cPicker13" id="cPicker13"><div id="button_s_textcolorhover" style="background-color: <?php echo $mvcore['button_s_textcolorhover'];?>;"></div><span>Choose color ...</span></div>
						</div>
					</div>
			</div>
		</div>
		<?php }; ?>
</div>		
<script>
$(document).ready(function() {
	
	var borderColor = $("#table_s_borcolor").css( "background-color" );
		$('.mvcore-table').css( "border" , "1px solid " + borderColor );
		$('.mvcore-table td').css( "border" , "1px solid " + borderColor );
		
	// Preview BG
	$( "#onAnyClickAnywere" ).on('change click', function() {
		
		var ColorBG = $("#preview_bg").css( "background-color" );
			$('.body').css( "background-color" , ColorBG );
			
		var getAllValues = ColorBG;
		
			$.post("acps.php", {
				preview_bg: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	
	//Announce Styling
	$( "#annonborderrad" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var gpradius = $("#annon_s_bradous").val();
		$('.mvcore-nAnnouncement').css( "-webkit-border-radius" , gpradius +"px" );
		$('.mvcore-nAnnouncement').css( "-moz-border-radius" , gpradius +"px" );
		$('.mvcore-nAnnouncement').css( "border-radius" , gpradius +"px" );
	});
	//Announce Styling
	$( "#annonborderrad2" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var borderColor = $("#annon_s_bordcolor").css( "background-color" );
		var borderSize = $("#annon_s_bsize").val();
		$('.mvcore-nAnnouncement').css( "border" , borderSize + "px solid " + borderColor );
	});
	//Announce Styling
	$( "#anoon_bg_transs" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var gpsbgcolor = $("#annon_s_bgcolor").css( "background-color" );
			var tablebgtrans = ', 0.'+ $("#annon_bg_trans").val()+')';
			if($("#annon_bg_trans").val() == '10'){ tablebgtrans =', 1.0)'; };
			var tResult1 = gpsbgcolor.replace(")", tablebgtrans);
			var convertTop = tResult1.replace("rgb", "rgba");
			
		var gpsbgcolor = $("#annon_s_bgcolor2").css( "background-color" );
			var tablebgtrans = ', 0.'+ $("#annon_bg_trans").val()+')';
			if($("#annon_bg_trans").val() == '10'){ tablebgtrans =', 1.0)'; };
			var tResult1 = gpsbgcolor.replace(")", tablebgtrans);
			var convertBottom = tResult1.replace("rgb", "rgba");
			
		$('.mvcore-nAnnouncement').css( "background" , "-webkit-gradient(linear, left top, left bottom, color-stop(0.05, "+convertTop+"), color-stop(1, "+convertBottom+"))" );
		$('.mvcore-nAnnouncement').css( "background" , "-moz-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-nAnnouncement').css( "background" , "-webkit-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-nAnnouncement').css( "background" , "-o-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-nAnnouncement').css( "background" , "-ms-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-nAnnouncement').css( "background" , "linear-gradient(to bottom, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-nAnnouncement').css( "filter" , "progid:DXImageTransform.Microsoft.gradient(startColorstr='"+convertBottom+"', endColorstr='"+convertBottom+"',GradientType=0)" );
		$('.mvcore-nAnnouncement').css( "background-color" , convertTop );
	});
	
	//Announce Styling
	$( "#AnnounceStylinsg" ).on('change keyup paste click mousedown mouseup', function() {
	
		var gpradius = $("#annon_s_bradous").val();
		$('.mvcore-nAnnouncement').css( "-webkit-border-radius" , gpradius +"px" );
		$('.mvcore-nAnnouncement').css( "-moz-border-radius" , gpradius +"px" );
		$('.mvcore-nAnnouncement').css( "border-radius" , gpradius +"px" );
		
		var borderColor = $("#annon_s_bordcolor").css( "background-color" );
		var borderSize = $("#annon_s_bsize").val();
		$('.mvcore-nAnnouncement').css( "border" , borderSize + "px solid " + borderColor );
		
		var titleSize = $("#annon_s_size").val();
		$('.mvcore-nAnnouncement').css( "font-size" , titleSize );
		
		var textDefaultColor = $("#annon_s_textcolor").css( "background-color" );
		$('.mvcore-nAnnouncement').css( "color" , textDefaultColor );
		
		var gpsbgcolor = $("#annon_s_bgcolor").css( "background-color" );
			var tablebgtrans = ', 0.'+ $("#annon_bg_trans").val()+')';
			if($("#annon_bg_trans").val() == '10'){ tablebgtrans =', 1.0)'; };
			var tResult1 = gpsbgcolor.replace(")", tablebgtrans);
			var convertTop = tResult1.replace("rgb", "rgba");
			
		var gpsbgcolor = $("#annon_s_bgcolor2").css( "background-color" );
			var tablebgtrans = ', 0.'+ $("#annon_bg_trans").val()+')';
			if($("#annon_bg_trans").val() == '10'){ tablebgtrans =', 1.0)'; };
			var tResult1 = gpsbgcolor.replace(")", tablebgtrans);
			var convertBottom = tResult1.replace("rgb", "rgba");
			
		$('.mvcore-nAnnouncement').css( "background" , "-webkit-gradient(linear, left top, left bottom, color-stop(0.05, "+convertTop+"), color-stop(1, "+convertBottom+"))" );
		$('.mvcore-nAnnouncement').css( "background" , "-moz-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-nAnnouncement').css( "background" , "-webkit-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-nAnnouncement').css( "background" , "-o-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-nAnnouncement').css( "background" , "-ms-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-nAnnouncement').css( "background" , "linear-gradient(to bottom, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-nAnnouncement').css( "filter" , "progid:DXImageTransform.Microsoft.gradient(startColorstr='"+convertBottom+"', endColorstr='"+convertBottom+"',GradientType=0)" );
		$('.mvcore-nAnnouncement').css( "background-color" , convertTop );
		
		var getAllValues = 
		
		$("#annon_s_bradous").val()+"-ids-"
		+$("#annon_s_bsize").val()+"-ids-"
		+$("#annon_s_bordcolor").css( "background-color" )+"-ids-"
		+$("#annon_s_size").val()+"-ids-"
		+$("#annon_s_textcolor").css( "background-color" )+"-ids-"
		+$("#annon_s_bgcolor").css( "background-color" )+"-ids-"
		+$("#annon_s_bgcolor2").css( "background-color" )+"-ids-"
		+convertTop+"-ids-"
		+convertBottom+"-ids-"
		+$("#annon_bg_trans").val();
		
			$.post("acps.php", {
				AnnounceStylinsg: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
			
	});
	
	
	
	
	

	function rgb2hex(rgb) {
		rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
		function hex(x) {
			return ("0" + parseInt(x).toString(16)).slice(-2);
		}
		return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
	}
	
	// Game Panel Styling border
	$( "#gamepanelradiroll1" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var gpradius = $("#gp_s_borradiu").val();
		$('.mvcore-gp-style').css( "-webkit-border-radius" , gpradius +"px" );
		$('.mvcore-gp-style').css( "-moz-border-radius" , gpradius +"px" );
		$('.mvcore-gp-style').css( "border-radius" , gpradius +"px" );
	});
	
	// Game Panel Styling border
	$( "#gamepanelradiroll12" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var gpborderColor = $("#gp_s_borcolor").css( "background-color" );
		var gpborderSize = $("#gp_s_borsize").val();
		$('.mvcore-gp-style').css( "border" , gpborderSize + "px solid " + gpborderColor );
	});
	
	// Game Panel Styling
	$( "#gameP_bg_transs" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var gpsbgcolor = $("#gp_s_bgcolor").css( "background-color" );
			var tablebgtrans = ', 0.'+ $("#gameP_bg_trans").val()+')';
			if($("#gameP_bg_trans").val() == '10'){ tablebgtrans =', 1.0)'; };
			var tResult1 = gpsbgcolor.replace(")", tablebgtrans);
			var tResult1s = tResult1.replace("rgb", "rgba");
		$('.mvcore-gp-style').css( "background-color" , tResult1s );
	});
	
	// Game Panel Styling
	$( "#gp_s_widths" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var cwidth = $("#gp_s_width").val();
		$('.mvcore-gp-style').css( "width" , cwidth );
	});
	
	// Game Panel Styling
	$( "#gp_s_heights" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var cheight = $("#gp_s_height").val();
		$('.mvcore-gp-style').css( "height" , cheight );
	});
	
	// Game Panel Styling
	$( "#gamePanelStylingsim" ).on('change keyup paste click mousedown mouseup', function() {

	
		var cwidth = $("#gp_s_width").val();
		$('.mvcore-gp-style').css( "width" , cwidth );
		
		var cheight = $("#gp_s_height").val();
		$('.mvcore-gp-style').css( "height" , cheight );
		
		
		var gpradius = $("#gp_s_borradiu").val();
		$('.mvcore-gp-style').css( "-webkit-border-radius" , gpradius +"px" );
		$('.mvcore-gp-style').css( "-moz-border-radius" , gpradius +"px" );
		$('.mvcore-gp-style').css( "border-radius" , gpradius +"px" );
		
		var gpborderColor = $("#gp_s_borcolor").css( "background-color" );
		var gpborderSize = $("#gp_s_borsize").val();
		$('.mvcore-gp-style').css( "border" , gpborderSize + "px solid " + gpborderColor );	
		
		var gpsltextsize = $("#gp_s_ltextsize").val();
		$('.mvcore-gp-style').css( "font-size" , gpsltextsize );

		var gpsinfotsize = $("#gp_s_infotsize").val();
		$('.mvcore-gp-style p').css( "font-size" , gpsinfotsize );
		
		var gpsltextcolor = $("#gp_s_ltextcolor").css( "background-color" );
		$('.mvcore-gp-style').css( "color" , gpsltextcolor );
		
		var gpsinfotcolor = $("#gp_s_infotcolor").css( "background-color" );
		$('.mvcore-gp-style p').css( "color" , gpsinfotcolor );
		

		var gpsbgcolor = $("#gp_s_bgcolor").css( "background-color" );
			var tablebgtrans = ', 0.'+ $("#gameP_bg_trans").val()+')';
			if($("#gameP_bg_trans").val() == '10'){ tablebgtrans =', 1.0)'; };
			var tResult1 = gpsbgcolor.replace(")", tablebgtrans);
			var tResult1s = tResult1.replace("rgb", "rgba");
		$('.mvcore-gp-style').css( "background-color" , tResult1s );
		
		var getAllValues = 
		
		$("#gp_s_borradiu").val()+"-ids-"
		+$("#gp_s_borsize").val()+"-ids-"
		+$("#gp_s_borcolor").css( "background-color" )+"-ids-"
		+$("#gp_s_ltextsize").val()+"-ids-"
		+$("#gp_s_ltextcolor").css( "background-color" )+"-ids-"
		+$("#gp_s_infotsize").val()+"-ids-"
		+$("#gp_s_infotcolor").css( "background-color" )+"-ids-"
		+$("#gp_s_bgcolor").css( "background-color" )+"-ids-"
		+tResult1s+"-ids-"
		+$("#gameP_bg_trans").val()+"-ids-"
		+$("#gp_s_width").val()+"-ids-"
		+$("#gp_s_height").val();
		
			$.post("acps.php", {
				gamePanelStylingsim: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
			
	});
	
	
	var divShowHidewebshopMenu = '<?php echo''.$mvcore['webshop_s_menuposi'].'';?>';
	if(divShowHidewebshopMenu == 'top') { $("#hiddendivtop").show(); $("#hiddendivtoptri").hide(1000); $("#hiddendivleft").hide(); $("#hiddendivright").hide(); };
	if(divShowHidewebshopMenu == 'top3') { $("#hiddendivtoptri").show(); $("#hiddendivtop").hide(1000); $("#hiddendivleft").hide(); $("#hiddendivright").hide(); };
	if(divShowHidewebshopMenu == 'left') { $("#hiddendivtop").hide(); $("#hiddendivtoptri").hide(1000); $("#hiddendivleft").show(); $("#hiddendivright").hide(); };
	if(divShowHidewebshopMenu == 'right') { $("#hiddendivtop").hide(); $("#hiddendivtoptri").hide(1000); $("#hiddendivleft").hide(); $("#hiddendivright").show(); };
	
	
	//Webshop Styling Radius
	$( "#webshopstyleradiusbor" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var wborderradi = $("#webshop_s_borderradi").val();
		$('.mvcore-item-mid').css( "-webkit-border-bottom-left-radius" , wborderradi +"px" );
		$('.mvcore-item-mid').css( "-moz-border-bottom-left-radius" , wborderradi +"px" );
		$('.mvcore-item-mid').css( "border-bottom-left-radius" , wborderradi +"px" );
		
		$('.mvcore-item-top').css( "-webkit-border-top-left-radius" , wborderradi +"px" );
		$('.mvcore-item-top').css( "-moz-border-top-left-radius" , wborderradi +"px" );
		$('.mvcore-item-top').css( "border-top-left-radius" , wborderradi +"px" );
		
		$('.mvcore-item-mid').css( "-webkit-border-bottom-right-radius" , wborderradi +"px" );
		$('.mvcore-item-mid').css( "-moz-border-bottom-right-radius" , wborderradi +"px" );
		$('.mvcore-item-mid').css( "border-bottom-right-radius" , wborderradi +"px" );
		
		$('.mvcore-item-top').css( "-webkit-border-top-right-radius" , wborderradi +"px" );
		$('.mvcore-item-top').css( "-moz-border-top-right-radius" , wborderradi +"px" );
		$('.mvcore-item-top').css( "border-top-right-radius" , wborderradi +"px" );
		
		$('.mvcore-ucp-info').css( "-webkit-border-radius" , wborderradi +"px" );
		$('.mvcore-ucp-info').css( "-moz-border-radius" , wborderradi +"px" );
		$('.mvcore-ucp-info').css( "border-radius" , wborderradi +"px" );
	});
	
	//Webshop Styling Radius
	$( "#webshop_bg_transMenus" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var wbgcolor = $("#webshop_s_bgcolor").css( "background-color" );
			var tablebgtrans = ', 0.'+ $("#webshop_bg_transMenu").val()+')';
			if($("#webshop_bg_transMenu").val() == '10'){ tablebgtrans =', 1.0)'; };
			var tResult1 = wbgcolor.replace(")", tablebgtrans);
			var tResult1s = tResult1.replace("rgb", "rgba");
		$('.mvcore-ucp-info').css( "background-color" , tResult1s );
	});	
		
	//Webshop Styling Radius
	$( "#webshop_bg_transs" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var witembgcolor = $("#webshop_s_itembgcolor").css( "background-color" );
			var tablebgtranss = ', 0.'+ $("#webshop_bg_trans").val()+')';
			if($("#webshop_bg_trans").val() == '10'){ tablebgtranss =', 1.0)'; };
			var tResult1asd = witembgcolor.replace(")", tablebgtranss);
			var tResult1sasd = tResult1asd.replace("rgb", "rgba");
		$('.mvcore-item-top').css( "background-color" , tResult1asd );
		
		var witembgcolordivi = $("#webshop_s_itembgcolordivi").css( "background-color" );
			var tablebgtranssd = ', 0.'+ $("#webshop_bg_trans").val()+')';
			if($("#webshop_bg_trans").val() == '10'){ tablebgtranssd =', 1.0)'; };
			var tResult1asds = witembgcolordivi.replace(")", tablebgtranssd);
			var tResult1sasdd = tResult1asds.replace("rgb", "rgba");
		$('.mvcore-item-mid').css( "background-color" , tResult1asds );
	});
	
	// Webshop Styling
	$( "#webshopStyleDiv" ).on('change keyup paste click mousedown mouseup', function() {
		
		var wtextsize = $("#webshop_s_textsize").val();
		$('.mvcore-item-top').css( "font-size" , wtextsize );
		$('.mvcore-item-mid').css( "font-size" , wtextsize );
		$('.mvcore-ucp-info').css( "font-size" , wtextsize );
		
		var wtextfont = $("#webshop_s_textfontfami").val();
		$('.mvcore-item-top').css( "font-family" , wtextfont );
		$('.mvcore-item-mid').css( "font-family" , wtextfont );
		$('.mvcore-ucp-info').css( "font-family" , wtextfont );
		
		
		var wbgcolor = $("#webshop_s_bgcolor").css( "background-color" );
			var tablebgtrans = ', 0.'+ $("#webshop_bg_transMenu").val()+')';
			if($("#webshop_bg_transMenu").val() == '10'){ tablebgtrans =', 1.0)'; };
			var tResult1 = wbgcolor.replace(")", tablebgtrans);
			var tResult1s = tResult1.replace("rgb", "rgba");
		$('.mvcore-ucp-info').css( "background-color" , tResult1s );
		
		var witembgcolor = $("#webshop_s_itembgcolor").css( "background-color" );
			var tablebgtranss = ', 0.'+ $("#webshop_bg_trans").val()+')';
			if($("#webshop_bg_trans").val() == '10'){ tablebgtranss =', 1.0)'; };
			var tResult1asd = witembgcolor.replace(")", tablebgtranss);
			var tResult1sasd = tResult1asd.replace("rgb", "rgba");
		$('.mvcore-item-top').css( "background-color" , tResult1asd );
		
		var witembgcolordivi = $("#webshop_s_itembgcolordivi").css( "background-color" );
			var tablebgtranssd = ', 0.'+ $("#webshop_bg_trans").val()+')';
			if($("#webshop_bg_trans").val() == '10'){ tablebgtranssd =', 1.0)'; };
			var tResult1asds = witembgcolordivi.replace(")", tablebgtranssd);
			var tResult1sasdd = tResult1asds.replace("rgb", "rgba");
		$('.mvcore-item-mid').css( "background-color" , tResult1asds );
		
		var menuposi = $("#webshop_s_menuposi").val();
			if(menuposi == 'top') { $("#hiddendivtop").show(1000); $("#hiddendivtoptri").hide(1000); $("#hiddendivleft").hide(1000); $("#hiddendivright").hide(1000); };
			if(menuposi == 'top3') { $("#hiddendivtoptri").show(1000); $("#hiddendivtop").hide(1000); $("#hiddendivleft").hide(1000); $("#hiddendivright").hide(1000); };
			if(menuposi == 'left') { $("#hiddendivtop").hide(1000); $("#hiddendivtoptri").hide(1000); $("#hiddendivleft").show(1000); $("#hiddendivright").hide(1000); };
			if(menuposi == 'right') { $("#hiddendivtop").hide(1000); $("#hiddendivtoptri").hide(1000); $("#hiddendivleft").hide(1000); $("#hiddendivright").show(1000); };
		
		var wborderradi = $("#webshop_s_borderradi").val();
		$('.mvcore-item-mid').css( "-webkit-border-bottom-left-radius" , wborderradi +"px" );
		$('.mvcore-item-mid').css( "-moz-border-bottom-left-radius" , wborderradi +"px" );
		$('.mvcore-item-mid').css( "border-bottom-left-radius" , wborderradi +"px" );
		
		$('.mvcore-item-top').css( "-webkit-border-top-left-radius" , wborderradi +"px" );
		$('.mvcore-item-top').css( "-moz-border-top-left-radius" , wborderradi +"px" );
		$('.mvcore-item-top').css( "border-top-left-radius" , wborderradi +"px" );
		
		$('.mvcore-item-mid').css( "-webkit-border-bottom-right-radius" , wborderradi +"px" );
		$('.mvcore-item-mid').css( "-moz-border-bottom-right-radius" , wborderradi +"px" );
		$('.mvcore-item-mid').css( "border-bottom-right-radius" , wborderradi +"px" );
		
		$('.mvcore-item-top').css( "-webkit-border-top-right-radius" , wborderradi +"px" );
		$('.mvcore-item-top').css( "-moz-border-top-right-radius" , wborderradi +"px" );
		$('.mvcore-item-top').css( "border-top-right-radius" , wborderradi +"px" );
		
		var wtextColor = $("#webshop_s_textcolor").css( "background-color" );
		$('.mvcore-item-top a').css( "color" , wtextColor );
		$('.mvcore-item-mid a').css( "color" , wtextColor );
		$('.mvcore-ucp-info a').css( "color" , wtextColor );
		$('.mvcore-ucp-info').css( "color" , wtextColor );
		
			var wtextColorHex = rgb2hex(wtextColor);
			
			var getAllValues = 
		
		$("#webshop_s_menuposi").val()+"-ids-"
		+$("#webshop_s_borderradi").val()+"-ids-"
		+$("#webshop_s_textsize").val()+"-ids-"
		+$("#webshop_s_textfontfami").val()+"-ids-"
		+wtextColorHex+"-ids-"
		+$("#webshop_s_bgcolor").css( "background-color" )+"-ids-"
		+$("#webshop_s_itembgcolor").css( "background-color" )+"-ids-"
		+$("#webshop_s_itembgcolordivi").css( "background-color" )+"-ids-"
		+tResult1s+"-ids-"
		+tResult1sasd+"-ids-"
		+tResult1sasdd+"-ids-"
		+$("#webshop_bg_trans").val()+"-ids-"
		+$("#webshop_bg_transMenu").val();
		
			$.post("acps.php", {
				webshopStyleDiv: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
			
	});
	
	var titleSizae = $("#inpSelec_s_textsize").val();
		$('.mvcore-input-main-FTM').css( "font-size" , titleSizae );
		$('.mvcore-select-main-FTM').css( "font-size" , titleSizae );

	//Input/Select Styling
	
	//INPUT Styling
	$( "#InputStyling1" ).on('change keyup paste click mousedown mouseup mousemove', function() {

		var verSize1 = $("#inpSelec_s_vsize").val();
		var verSize2 = +$("#inpSelec_s_vsize").val(); verSize2 = verSize2 + 18;
		
		$('.mvcore-input-main-FTM').css( "height" , verSize1+"px" );
		$('.mvcore-input-main-FTM').css( "-webkit-height" , verSize1+"px" );
		$('.mvcore-input-main-FTM').css( "-moz-height" , verSize1+"px" );
		
		$('.mvcore-select-main-FTM').css( "height" , verSize2+"px" );
		$('.mvcore-select-main-FTM').css( "-webkit-height" , verSize2+"px" );
		$('.mvcore-select-main-FTM').css( "-moz-height" , verSize2+"px" );
		
	});
	
	//INPUT Styling
	$( "#InputStyling2" ).on('change keyup paste click mousedown mouseup mousemove', function() {

		var horSize1 = +$("#inpSelec_s_hsize").val(); horSize1 = horSize1 - 18;
		var horSize2 = $("#inpSelec_s_hsize").val();
		
		$('.mvcore-input-main-FTM').css( "width" , horSize1+"px" );
		$('.mvcore-input-main-FTM').css( "-webkit-width" , horSize1+"px" );
		$('.mvcore-input-main-FTM').css( "-moz-width" , horSize1+"px" );
		
		$('.mvcore-select-main-FTM').css( "width" , horSize2+"px" );
		$('.mvcore-select-main-FTM').css( "-webkit-width" , horSize2+"px" );
		$('.mvcore-select-main-FTM').css( "-moz-width" , horSize2+"px" );
		
	});
	
	$( "#inpSelectStyling1" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var inpBorderRadius = $("#inpSelec_s_bradius").val();
		$('.mvcore-input-main-FTM').css( "-webkit-border-radius" , inpBorderRadius +"px" );
		$('.mvcore-input-main-FTM').css( "-moz-border-radius" , inpBorderRadius +"px" );
		$('.mvcore-input-main-FTM').css( "border-radius" , inpBorderRadius +"px" );
		$('.mvcore-select-main-FTM').css( "-webkit-border-radius" , inpBorderRadius +"px" );
		$('.mvcore-select-main-FTM').css( "-moz-border-radius" , inpBorderRadius +"px" );
		$('.mvcore-select-main-FTM').css( "border-radius" , inpBorderRadius +"px" );
	});
	$( "#inpSelectStyling2" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var borderColors = $("#inpSelec_s_borcolor").css( "background-color" );
		var borderSizes = 1;
		$('.mvcore-input-main-FTM').css( "border" , borderSizes + "px solid " + borderColors );
		$('.mvcore-select-main-FTM').css( "border" , borderSizes + "px solid " + borderColors );
	});
	
	$( "#inpSelect_bg_transs" ).on('change keyup paste click mousedown mouseup mousemove', function() {
			var bgColor = $("#inpSelec_s_bgcolor").css( "background-color" );
				var tablebgtransdq = ', 0.'+ $("#inpSelect_bg_trans").val()+')';
				if($("#inpSelect_bg_trans").val() == '10'){ tablebgtransdq =', 1.0)'; };
				var tResult1a = bgColor.replace(")", tablebgtransdq);
				var tResult1sd = tResult1a.replace("rgb", "rgba");
			$('.mvcore-input-main-FTM').css( "background-color" , tResult1sd );
			$('.mvcore-select-main-FTM').css( "background-color" , tResult1sd );	});
	
	$( "#inpSelect_bg_transHovers" ).on('change keyup paste click mousedown mouseup mousemove', function() {
			var bgActColor = $("#inpSelec_s_bgcoloractiv").css( "background-color" );
				var tablebgtransd = ', 0.'+ $("#inpSelect_bg_transHover").val()+')';
				if($("#inpSelect_bg_transHover").val() == '10'){ tablebgtransd =', 1.0)'; };
				var tResult1dd = bgActColor.replace(")", tablebgtransd);
				var tResult1ds = tResult1dd.replace("rgb", "rgba");
			$('.mvcore-input-main-FTM:focus').css( "background-color" , tResult1ds );
			$('.mvcore-select-main-FTM:focus').css( "background-color" , tResult1ds );
	});
	$( "#InputSelectStyling" ).on('change keyup paste click mousedown mouseup', function() {
		
		var inpBorderRadius = $("#inpSelec_s_bradius").val();
		$('.mvcore-input-main-FTM').css( "-webkit-border-radius" , inpBorderRadius +"px" );
		$('.mvcore-input-main-FTM').css( "-moz-border-radius" , inpBorderRadius +"px" );
		$('.mvcore-input-main-FTM').css( "border-radius" , inpBorderRadius +"px" );
		$('.mvcore-select-main-FTM').css( "-webkit-border-radius" , inpBorderRadius +"px" );
		$('.mvcore-select-main-FTM').css( "-moz-border-radius" , inpBorderRadius +"px" );
		$('.mvcore-select-main-FTM').css( "border-radius" , inpBorderRadius +"px" );
		
		var textFontFamilys = $("#inpSelec_s_textfontf option:selected").val();
		$('.mvcore-input-main-FTM').css( "font-family" , textFontFamilys );
		$('.mvcore-select-main-FTM').css( "font-family" , textFontFamilys );
		
		var titleSizae = $("#inpSelec_s_textsize").val();
		$('.mvcore-input-main-FTM').css( "font-size" , titleSizae );
		$('.mvcore-select-main-FTM').css( "font-size" , titleSizae );
		
		var TextsColor = $("#inpSelec_s_textcolor").css( "background-color" );
		$('.mvcore-input-main-FTM').css( "color" , TextsColor );
		$('.mvcore-select-main-FTM').css( "color" , TextsColor );
		
		var TextsActColor = $("#inpSelec_s_textcoloractiv").css( "background-color" );
		$('.mvcore-input-main-FTM:focus').css( "color" , TextsActColor );
		$('.mvcore-select-main-FTM:focus').css( "color" , TextsActColor );
		
			var bgColor = $("#inpSelec_s_bgcolor").css( "background-color" );
				var tablebgtransdq = ', 0.'+ $("#inpSelect_bg_trans").val()+')';
				if($("#inpSelect_bg_trans").val() == '10'){ tablebgtransdq =', 1.0)'; };
				var tResult1a = bgColor.replace(")", tablebgtransdq);
				var tResult1sd = tResult1a.replace("rgb", "rgba");
			$('.mvcore-input-main-FTM').css( "background-color" , tResult1sd );
			$('.mvcore-select-main-FTM').css( "background-color" , tResult1sd );
			
			var bgActColor = $("#inpSelec_s_bgcoloractiv").css( "background-color" );
				var tablebgtransd = ', 0.'+ $("#inpSelect_bg_transHover").val()+')';
				if($("#inpSelect_bg_transHover").val() == '10'){ tablebgtransd =', 1.0)'; };
				var tResult1dd = bgActColor.replace(")", tablebgtransd);
				var tResult1ds = tResult1dd.replace("rgb", "rgba");
			$('.mvcore-input-main-FTM:focus').css( "background-color" , tResult1ds );
			$('.mvcore-select-main-FTM:focus').css( "background-color" , tResult1ds );
		
		var borderColors = $("#inpSelec_s_borcolor").css( "background-color" );
		var borderSizes = 1;
		$('.mvcore-input-main-FTM').css( "border" , borderSizes + "px solid " + borderColors );
		$('.mvcore-select-main-FTM').css( "border" , borderSizes + "px solid " + borderColors );
		
			var getAllValues = 
		
		$("#inpSelec_s_bradius").val()+"-ids-"
		+1+"-ids-"
		+$("#inpSelec_s_borcolor").css( "background-color" )+"-ids-"
		+$("#inpSelec_s_bgcolor").css( "background-color" )+"-ids-"
		+$("#inpSelec_s_bgcoloractiv").css( "background-color" )+"-ids-"
		+$("#inpSelec_s_textfontf").val()+"-ids-"
		+$("#inpSelec_s_textsize").val()+"-ids-"
		+$("#inpSelec_s_textcolor").css( "background-color" )+"-ids-"
		+$("#inpSelec_s_textcoloractiv").css( "background-color" )+"-ids-"
		+tResult1sd+"-ids-"
		+tResult1ds+"-ids-"
		+$("#inpSelect_bg_trans").val()+"-ids-"
		+$("#inpSelect_bg_transHover").val()+"-ids-"
		+$("#inpSelec_s_vsize").val()+"-ids-"
		+$("#inpSelec_s_hsize").val();
		
			$.post("acps.php", {
				InputSelectStyling: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
			
	});
	
	$( "#NewsStyling2" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var borderColor = $("#news_s_bordcolor").css( "background-color" );
		var borderSize = $("#news_s_bsize").val();
		$('.mvcore-box-style1').css( "border" , borderSize + "px solid " + borderColor );	
	});
	
	$( "#NewsStyling1" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var borderRadius = $("#news_s_bradous").val();
		$('.mvcore-box-style1').css( "-moz-border-radius" , borderRadius+"px" );
		$('.mvcore-box-style1').css( "-webkit-border-radius" , borderRadius+"px" );
		$('.mvcore-box-style1').css( "border-radius" , borderRadius+"px" );
	});
	$( "#news_bg_transs" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var bgColor = $("#news_s_bgcolor").css( "background-color" );
			var tablebgtrans = ', 0.'+ $("#news_bg_trans").val()+')';
			if($("#news_bg_trans").val() == '10'){ tablebgtrans =', 1.0)'; };
			var tResult1 = bgColor.replace(")", tablebgtrans);
			var tResult1s = tResult1.replace("rgb", "rgba");
			$('.mvcore-box-style1').css( "background-color" , tResult1 );
			
	});
	//News Styling
	$( "#NewsStylinsg" ).on('change keyup paste click mousedown mouseup', function() {
		
		var gpsbgcolor = $("#news_s_titlebg").css( "background-color" );
			var tablebgtrans = ', 0.'+ $("#news_title_bg_trans").val()+')';
			if($("#news_title_bg_trans").val() == '10'){ tablebgtrans =', 1.0)'; };
			var title_bg_color1_result = gpsbgcolor.replace(")", tablebgtrans);
			var titleBGColorHoqwewve = title_bg_color1_result.replace("rgb", "rgba");
			
		var gpsbgcolor = $("#news_s_titlebgHover").css( "background-color" );
		var tbgwegew = rgb2hex(gpsbgcolor);
			var tablebgtrans = ', 0.'+ $("#news_title_bg_trans").val()+')';
			if($("#news_title_bg_trans").val() == '10'){ tablebgtrans =', 1.0)'; };
			var title_bg_color_result = gpsbgcolor.replace(")", tablebgtrans);
			var titleBGColorHoversavwve = title_bg_color_result.replace("rgb", "rgba");
			
		var borderColor = $("#news_s_bordcolor").css( "background-color" );
		var borderSize = $("#news_s_bsize").val();
		$('.mvcore-box-style1').css( "border" , borderSize + "px solid " + borderColor );
		
		var bgColor = $("#news_s_bgcolor").css( "background-color" );
			var tablebgtrans = ', 0.'+ $("#news_bg_trans").val()+')';
			if($("#news_bg_trans").val() == '10'){ tablebgtrans =', 1.0)'; };
			var tResult1 = bgColor.replace(")", tablebgtrans);
			var tResult1s = tResult1.replace("rgb", "rgba");
			
		var getAllValues = 
		
		$("#news_s_titlealign").val()+"-ids-"
		+$("#news_s_titlesize").val()+"-ids-"
		+$("#news_s_titlebg").css( "background-color" )+"-ids-"
		+$("#news_s_titlebgHover").css( "background-color" )+"-ids-"
		+$("#news_s_dtextcolor").css( "background-color" )+"-ids-"
		+$("#news_s_dateColor").css( "background-color" )+"-ids-"
		+$("#news_s_bgcolor").css( "background-color" )+"-ids-"
		+$("#news_s_titletextcolor").css( "background-color" )+"-ids-"
		+$("#news_s_bradous").val()+"-ids-"
		+$("#news_s_bsize").val()+"-ids-"
		+$("#news_s_bordcolor").css( "background-color" )+"-ids-"
		+$("#news_bg_trans").val()+"-ids-"
		+tResult1s+"-ids-"
		+titleBGColorHoqwewve+"-ids-"
		+titleBGColorHoversavwve+"-ids-"
		+$("#news_title_bg_trans").val();
		
			$.post("acps.php", {
				NewsStylinsg: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
		
		var textDefaultColor = $("#news_s_dtextcolor").css( "background-color" );
		$('.mvcore-div-entry').css( "color" , textDefaultColor );
		
		var dateColor = $("#news_s_dateColor").css( "background-color" );
		$('.mvcore-meta-bga div p').css( "color" , dateColor );
		
		var titleAlign = $("#news_s_titlealign").val();
		$('.mvcore-titles').css( "text-align" , titleAlign );
		
		var titleSize = $("#news_s_titlesize").val();
		$('.mvcore-titles').css( "font-size" , titleSize );
		
		$('.mvcore-box-style1').css( "background-color" , tResult1 );
			
		var titleTextColor = $("#news_s_titletextcolor").css( "background-color" );
		$('.mvcore-titles').css( "color" , titleTextColor );
		
		//------------------
			var convertTop = titleBGColorHoqwewve;
			var convertBottom = titleBGColorHoversavwve;
		$('.mvcore-titles').css( "background" , "-webkit-gradient(linear, left top, left bottom, color-stop(0.05, "+convertTop+"), color-stop(1, "+convertBottom+"))" );
		$('.mvcore-titles').css( "background" , "-moz-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-titles').css( "background" , "-webkit-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-titles').css( "background" , "-o-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-titles').css( "background" , "-ms-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-titles').css( "background" , "linear-gradient(to bottom, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-titles').css( "filter" , "progid:DXImageTransform.Microsoft.gradient(startColorstr='"+convertBottom+"', endColorstr='"+convertBottom+"',GradientType=0)" );
		$('.mvcore-titles').css( "background-color" , convertTop );
		//------------------
			
	});
	
	//Table Styling
	$( "#table_bg_transasd" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var evenTBGColor = $("#table_s_rcolc").css( "background-color" );
			var tablebgtrans = ', 0.'+ $("#table_bg_trans").val()+')';
			if($("#table_bg_trans").val() == '10'){ tablebgtrans =', 1.0)'; };
			var tResult1 = evenTBGColor.replace(")", tablebgtrans);
			
			$('.mvcore-table td').css( "background-color" , tResult1 );
			
			var TitleColorTwo = $("#table_s_trowcolgra").css( "background-color" );
			$('.mvcore-table tr:first-child td').css( "background-color" , TitleColorTwo );
		
	});
	//Table Styling
	$( "#table_bg_transasd2" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var evenTBGColorsd = $("#table_s_hoverrcolc").css( "background-color" );
			var tablebgtransdd = ', 0.'+ $("#table_bg_transhov").val()+')';
			if($("#table_bg_transhov").val() == '10'){ tablebgtransdd =', 1.0)'; };
			var tResult2 = evenTBGColorsd.replace(")", tablebgtransdd);
			
			$('.mvcore-table td:hover').css( "background-color" , tResult2 );
				
			var TitleColorTwo = $("#table_s_trowcolgra").css( "background-color" );
			$('.mvcore-table tr:first-child td').css( "background-color" , TitleColorTwo );
		
	});
	//Table Styling
	$( "#tableStyling" ).on('change keyup paste click mousedown mouseup', function() {
	
		var evenTBGColor = $("#table_s_rcolc").css( "background-color" );
			var tablebgtrans = ', 0.'+ $("#table_bg_trans").val()+')';
			if($("#table_bg_trans").val() == '10'){ tablebgtrans =', 1.0)'; };
			var tResult1 = evenTBGColor.replace(")", tablebgtrans);
			var tResult1s = tResult1.replace("rgb", "rgba");
			
		var evenTBGColorsd = $("#table_s_hoverrcolc").css( "background-color" );
			var tablebgtransdd = ', 0.'+ $("#table_bg_transhov").val()+')';
			if($("#table_bg_transhov").val() == '10'){ tablebgtransdd =', 1.0)'; };
			var tResult2 = evenTBGColorsd.replace(")", tablebgtransdd);
			var tResult2s = tResult2.replace("rgb", "rgba");
			
		var getAllValues = 
		
		$("#table_s_padd").val()+"-ids-"
		+$("#table_s_rcolc").css( "background-color" )+"-ids-"
		+$("#table_s_talign").val()+"-ids-"
		+$("#table_s_textsize").val()+"-ids-"
		+$("#table_s_textcolor").css( "background-color" )+"-ids-"
		+$("#table_s_titletalign").val()+"-ids-"
		+$("#table_s_tittextsize").val()+"-ids-"
		+$("#table_s_trowcolgra").css( "background-color" )+"-ids-"
		+$("#table_s_titletextcolor").css( "background-color" )+"-ids-"
		+$("#table_s_borcolor").css( "background-color" )+"-ids-"
		+$("#table_s_hoverrcolc").css( "background-color" )+"-ids-"
		+$("#table_bg_trans").val()+"-ids-"
		+$("#table_bg_transhov").val()+"-ids-"
		+tResult1s+"-ids-"
		+tResult2s;
		
			$.post("acps.php", {
				tableStyling: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
			
		var PaddingCell = $("#table_s_padd").val();
		$('.mvcore-table td').css( "padding" , PaddingCell );
  
		var textaligns = $("#table_s_talign").val();
		$('.mvcore-table td').css( "text-align" , textaligns );
		
		var sTextSize = $("#table_s_textsize").val();
		$('.mvcore-table td').css( "font-size" , sTextSize );
		
		var TextColor = $("#table_s_textcolor").css( "background-color" );
		$('.mvcore-table td').css( "color" , TextColor );
		
		var borderColor = $("#table_s_borcolor").css( "background-color" );
		$('.mvcore-table').css( "border" , "1px solid " + borderColor );
		$('.mvcore-table td').css( "border" , "1px solid " + borderColor );

		var titleTextAlign = $("#table_s_titletalign").val();
		$('.mvcore-table tr:first-child td').css( "text-align" , titleTextAlign );
		
		var titleTextSize = $("#table_s_tittextsize").val();
		$('.mvcore-table tr:first-child td').css( "font-size" , titleTextSize );

		$('.mvcore-table td').css( "background-color" , tResult1 );
		
		var TitleColorTwo = $("#table_s_trowcolgra").css( "background-color" );
		$('.mvcore-table tr:first-child td').css( "background-color" , TitleColorTwo );

		var TitleTextColorTwo = $("#table_s_titletextcolor").css( "background-color" );
		$('.mvcore-table tr:first-child td').css( "color" , TitleTextColorTwo );
	
				
			$( '.mvcore-table td' ) .mouseout(function() {
				
				$('.mvcore-table td').css( "background-color" , tResult1 );
				
				var TitleColorTwo = $("#table_s_trowcolgra").css( "background-color" );
				$('.mvcore-table tr:first-child td').css( "background-color" , TitleColorTwo );
			}) .mouseover(function() {
				$('.mvcore-table td:hover').css( "background-color" , tResult2 );
				
				var TitleColorTwo = $("#table_s_trowcolgra").css( "background-color" );
				$('.mvcore-table tr:first-child td').css( "background-color" , TitleColorTwo );
			});
			
	});
	
	//Button Styling
	$( "#buttonStyling1" ).on('change keyup paste click mousedown mouseup mousemove', function() {

		var verSize = $("#button_s_vsize").val();
		$('.mvcore-button-style').css( "padding-top" , verSize+"px" );
		$('.mvcore-button-style').css( "padding-bottom" , verSize+"px" );
		
	});
	
	//Button Styling
	$( "#buttonStyling2" ).on('change keyup paste click mousedown mouseup mousemove', function() {

		var horSize = $("#button_s_hsize").val();
		$('.mvcore-button-style').css( "padding-left" , horSize+"px" );
		$('.mvcore-button-style').css( "padding-right" , horSize+"px" );
		
	});
	
	//Button Styling
	$( "#buttonStyling3" ).on('change keyup paste click mousedown mouseup mousemove', function() {

		var borderRadius = $("#button_s_bradius").val();
		$('.mvcore-button-style').css( "-moz-border-radius" , borderRadius+"px" );
		$('.mvcore-button-style').css( "-webkit-border-radius" , borderRadius+"px" );
		$('.mvcore-button-style').css( "border-radius" , borderRadius+"px" );
		
	});
	
	//Button Styling
	$( "#buttonStyling4" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		
		var borderColor = $("#button_s_bordecolor").css( "background-color" );
		var borderSize = $("#button_s_bsizes").val();
		$('.mvcore-button-style').css( "border" , borderSize + "px solid " + borderColor );	
		
	});
		
	//Button Styling
	$( "#buttonStyling" ).on('change keyup paste click mousedown mouseup', function() {
				
		var textSize = $("#button_s_textsize option:selected").val();
		$('.mvcore-button-style').css( "font-size" , textSize );
		
		var textFontTransfor = $("#button_s_textfonttans option:selected").val();
		$('.mvcore-button-style').css( "text-transform" , textFontTransfor );

		var textFontFamily = $("#button_s_textfontf option:selected").val();
		$('.mvcore-button-style').css( "font-family" , textFontFamily );
		
		var textBolds = $("#button_s_textbold option:selected").val();
		$('.mvcore-button-style').css( "font-weight" , textBolds );
		
		var borderColor = $("#button_s_bordecolor").css( "background-color" );
		var borderSize = $("#button_s_bsizes").val();
		var borderColorOut = rgb2hex(borderColor);
		$('.mvcore-button-style').css( "border" , borderSize + "px solid " + borderColor );
		
		var textColor = $("#button_s_textcolor").css( "background-color" );
		$('.mvcore-button-style').css( "color" , textColor );

			$( '.mvcore-button-style' ) .mouseout(function() {
				var textColor = $("#button_s_textcolor").css( "background-color" );
				$('.mvcore-button-style').css( "color" , textColor );
			}) .mouseover(function() {
				var textColorHover = $("#button_s_textcolorhover").css( "background-color" );
				$('.mvcore-button-style').css( "color" , textColorHover );
			});
		
		var bgTopColor = $("#button_s_bgtcolor").css( "background-color" );
		var bgBottomColor = $("#button_s_bgbcolor").css( "background-color" );
			var convertTop = rgb2hex(bgTopColor);
			var convertBottom = rgb2hex(bgBottomColor);
		$('.mvcore-button-style').css( "background" , "-webkit-gradient(linear, left top, left bottom, color-stop(0.05, "+convertTop+"), color-stop(1, "+convertBottom+"))" );
		$('.mvcore-button-style').css( "background" , "-moz-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-button-style').css( "background" , "-webkit-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-button-style').css( "background" , "-o-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-button-style').css( "background" , "-ms-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-button-style').css( "background" , "linear-gradient(to bottom, "+convertTop+" 5%, "+convertBottom+" 100%)" );
		$('.mvcore-button-style').css( "filter" , "progid:DXImageTransform.Microsoft.gradient(startColorstr='"+convertBottom+"', endColorstr='"+convertBottom+"',GradientType=0)" );
		$('.mvcore-button-style').css( "background-color" , convertTop );
		
		var bgTopColorHover = $("#button_s_bgtcolorhover").css( "background-color" );
		var bgBottomColorHover = $("#button_s_bgbcolorhover").css( "background-color" );
			var convertTopHover = rgb2hex(bgTopColorHover);
			var convertBottomHover = rgb2hex(bgBottomColorHover);
		
			$( '.mvcore-button-style' ) .mouseout(function() {
				$('.mvcore-button-style').css( "background" , "-webkit-gradient(linear, left top, left bottom, color-stop(0.05, "+convertTop+"), color-stop(1, "+convertBottom+"))" );
				$('.mvcore-button-style').css( "background" , "-moz-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
				$('.mvcore-button-style').css( "background" , "-webkit-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
				$('.mvcore-button-style').css( "background" , "-o-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
				$('.mvcore-button-style').css( "background" , "-ms-linear-gradient(top, "+convertTop+" 5%, "+convertBottom+" 100%)" );
				$('.mvcore-button-style').css( "background" , "linear-gradient(to bottom, "+convertTop+" 5%, "+convertBottom+" 100%)" );
				$('.mvcore-button-style').css( "filter" , "progid:DXImageTransform.Microsoft.gradient(startColorstr='"+convertBottom+"', endColorstr='"+convertBottom+"',GradientType=0)" );
				$('.mvcore-button-style').css( "background-color" , convertTop );
			}) .mouseover(function() {
				$('.mvcore-button-style').css( "background" , "-webkit-gradient(linear, left top, left bottom, color-stop(0.05, "+convertTopHover+"), color-stop(1, "+convertBottomHover+"))" );
				$('.mvcore-button-style').css( "background" , "-moz-linear-gradient(top, "+convertTopHover+" 5%, "+convertBottomHover+" 100%)" );
				$('.mvcore-button-style').css( "background" , "-webkit-linear-gradient(top, "+convertTopHover+" 5%, "+convertBottomHover+" 100%)" );
				$('.mvcore-button-style').css( "background" , "-o-linear-gradient(top, "+convertTopHover+" 5%, "+convertBottomHover+" 100%)" );
				$('.mvcore-button-style').css( "background" , "-ms-linear-gradient(top, "+convertTopHover+" 5%, "+convertBottomHover+" 100%)" );
				$('.mvcore-button-style').css( "background" , "linear-gradient(to bottom, "+convertTopHover+" 5%, "+convertBottomHover+" 100%)" );
				$('.mvcore-button-style').css( "filter" , "progid:DXImageTransform.Microsoft.gradient(startColorstr='"+convertTop+"', endColorstr='"+convertBottomHover+"',GradientType=0)" );
				$('.mvcore-button-style').css( "background-color" , bgTopColorHover );
			});
		
		var getAllValues = 
		
		$("#button_s_textfontf option:selected").val()+"-ids-"
		+textBolds+"-ids-"
		+$("#button_s_textsize option:selected").val()+"-ids-"
		+$("#button_s_textcolor").css( "background-color" )+"-ids-"
		+$("#button_s_vsize").val()+"-ids-"
		+$("#button_s_hsize").val()+"-ids-"
		+$("#button_s_bradius").val()+"-ids-"
		+$("#button_s_bsizes").val()+"-ids-"
		+borderColorOut+"-ids-"
		+convertTop+"-ids-"
		+convertBottom+"-ids-"
		+$("#button_s_textfonttans option:selected").val()+"-ids-"
		+convertTopHover+"-ids-"
		+convertBottomHover+"-ids-"
		+$("#button_s_textcolorhover").css( "background-color" );
		
			$.post("acps.php", {
				buttonStyling: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	
	});
	
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>