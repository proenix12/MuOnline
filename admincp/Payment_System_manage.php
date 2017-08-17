
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'PayPal_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Payment_System_manage-id-PayPal_Settings.html" title=""><span style="height:30px;">PayPal Manage</span></a></li>
            <li <?php if($_GET['op3'] == 'PayGol_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Payment_System_manage-id-PayGol_Settings.html" title=""><span style="height:30px;">PayGol Manage</span></a></li>
            <li <?php if($_GET['op3'] == 'Paymentwall_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Payment_System_manage-id-Paymentwall_Settings.html" title=""><span style="height:30px;">Paymentwall Manage</span></a></li>
            <li <?php if($_GET['op3'] == 'Superrewards_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Payment_System_manage-id-Superrewards_Settings.html" title=""><span style="height:30px;">Superrewards Manage</span></a></li>
			<li <?php if($_GET['op3'] == 'Fortumo_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Payment_System_manage-id-Fortumo_Settings.html" title=""><span style="height:30px;">Fortumo Manage</span></a></li>
			<li <?php if($_GET['op3'] == 'PagSeguro_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Payment_System_manage-id-PagSeguro_Settings.html" title=""><span style="height:30px;">PagSeguro Manage</span></a></li>
			<li <?php if($_GET['op3'] == 'interkassa_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Payment_System_manage-id-interkassa_Settings.html" title=""><span style="height:30px;">InterKassa Manage</span></a></li>
		</ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['Payment_System'] != 'on') { echo '<font color="red"><u><b>Payment System</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
			
		<?php if($_GET['op3'] == 'PayPal_Settings') { ?> <!-- PayPal_Settings -->
		<div class="widget fluid" id="ppsetdsfdsfsv">
			<div class="whead"><h6>PayPal Settings</h6><h6 style="float:right;"><a target="blank_" href="http://www.paypal.com">www.paypal.com</a></h6></div>
					<div class="formRow">
						<div class="grid3"><label>PayPal Module:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="paypal_status" name="paypal_status" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['paypal_status'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['paypal_status'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>PayPal Email:</label></div>
                        <div class="grid9"><input id="paypal_email" name="paypal_email" type="text" value="<?php echo $mvcore['paypal_email']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Promo Text ( HTML Allowed / Empty = OFF ):</label></div>
                        <div class="grid9"><input id="paypal_promo" name="paypal_promo" type="text" value="<?php echo $mvcore['paypal_promo']; ?>"></div>
                    </div>
		</div>
		<div class="widget">
            <div class="whead"><h6>PayPal Package Manage</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Package Name</td>
						<td><?php echo $mvcore['money_name2'];?></td>
                        <td>Enter EUR</td>
						<td>USD</td>
						<td>GBP</td>
						<td>Option</td>
                    </tr>
                </thead>
                <tbody>
					<tr>
						<td><input id="idcheck" name="idcheck" type="hidden" value=""> <!-- Hidden ID -->
							<div class="formRow">
								<div class="grid9"><input id="pnamesa" name="pnamesa" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="rewgc" name="rewgc" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="EURa" name="EURa" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="USDa" readonly="readonly" name="USDa" type="text" placeholder="ReadOnly" value=""></div>
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="GBPa" readonly="readonly" name="GBPa" type="text" placeholder="ReadOnly" value=""></div>
							</div>
						</td>
						<td align="center">
							<a href="#" id="ppfuncdeasdsaasdsal" class="buttonM bDefault mb10 mt5">Add / Save Package</a>
						</td>
					</tr>
						<?php
							$sys_startsaa = mssql_query("select top 100 pack_name,money,cost_eur,cost_usd,cost_gbp from MVCore_PP_Packs");
							for($i=0;$i < mssql_num_rows($sys_startsaa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsaa);
								
								echo'
											<tr>
												<td>'.$drop_info[0].'</td>
												<td>'.$drop_info[1].'</td>
												<td>'.$drop_info[2].'</td>
												<td>'.$drop_info[3].'</td>
												<td>'.$drop_info[4].'</td>
												<td align="center">
													<ul class="navi nav-pills">
													  <li class="dropdown">
														<a class="dropdown-toggle" data-toggle="dropdown">Options<b class="caret"></b></a>
														<ul class="dropdown-menu">
															<li> <a href="#" class="" onclick="ppfuncediasdsat('.$drop_info[1].')"><span class="icos-pencil"></span>Edit</a></li>
															<li><a href="#" onclick="ppfuncdeasdsal('.$drop_info[1].')"><span class="icos-trash"></span>Delete</a></li>
														</ul>
													  </li>
													</ul> 
												</td>
											</tr>
								';
							};
						?>
                </tbody>
            </table>
        </div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'PayGol_Settings') { ?> <!-- PayGol_Settings -->
		<h5 style="margin-top:15px;text-align:left;"><h6>PostBack URL:</h6> <i><?php echo $mvcore['surl'];?>/PostBack.php</i></h5>
		<div class="widget fluid" id="pgsettfdsfds">
			<div class="whead"><h6>PayGol Settings</h6><h6 style="float:right;"><a target="blank_" href="http://www.paygol.com">www.paygol.com</a></h6></div>
					<div class="formRow">
						<div class="grid3"><label>PayGol Module:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="paygol_status" name="paygol_status" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['paygol_status'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['paygol_status'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>PayGol ID:</label></div>
                        <div class="grid9"><input id="paygol_sid" name="paygol_sid" type="text" value="<?php echo $mvcore['paygol_sid']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Promo Text ( HTML Allowed / Empty = OFF ):</label></div>
                        <div class="grid9"><input id="paygol_promo" name="paygol_promo" type="text" value="<?php echo $mvcore['paygol_promo']; ?>"></div>
                    </div>
		</div>
		<div class="widget">
            <div class="whead"><h6>PayGol Package Manage</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Package Name</td>
						<td><?php echo $mvcore['money_name2'];?></td>
                        <td>Currency</td>
						<td>Price</td>
						<td>Option</td>
                    </tr>
                </thead>
                <tbody>
					<tr>
						<td><input id="idcheck" name="idcheck" type="hidden" value=""> <!-- Hidden ID -->
							<div class="formRow">
								<div class="grid9"><input id="pnamesas" name="pnamesas" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="rewgca" name="rewgca" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td width="250px">
							<div class="formRow">
								<div class="grid9">
									<select style="width:100%;padding-left:5px;opacity:0.6;" id="currs" name="currs" data-placeholder="Choose a option..." class="select" tabindex="2">
										<option value=""></option>
										<option value="ALB" style="padding-left:5px;">Albania Lek ALB</option>
										<option value="ARS" style="padding-left:5px;">Argentina Pesos ARS</option>
										<option value="AUD" style="padding-left:5px;">Austrlia Dollars AUD</option>
										<option value="AZN" style="padding-left:5px;">Azerbaijani New Manat AZN</option>
										<option value="BYR" style="padding-left:5px;">Belarusian Ruble BYR</option>
										<option value="BOB" style="padding-left:5px;">Bolivia Boliviano BOB</option>
										<option value="BAM" style="padding-left:5px;">Bosnia and H. convertible mark BAM</option>
										<option value="BRL" style="padding-left:5px;">Brazilian Real BRL</option>
										<option value="BGN" style="padding-left:5px;">Bulgaria Leva BGN</option>
										<option value="CAD" style="padding-left:5px;">Canada Dollars CAD</option>
										<option value="CLP" style="padding-left:5px;">Chile Pesos CLP</option>
										<option value="CNY" style="padding-left:5px;">China Yuan Renminbi CNY</option>
										<option value="COP" style="padding-left:5px;">Colombia Pesos COP</option>
										<option value="CRC" style="padding-left:5px;">Costa Rica, colón CRC</option>
										<option value="HRK" style="padding-left:5px;">Croatia Kuna HRK</option>
										<option value="CZK" style="padding-left:5px;">Czech Republic Koruny CZK</option>
										<option value="DKK" style="padding-left:5px;">Denmark Kroner DKK</option>
										<option value="DOP" style="padding-left:5px;">Dominican Peso DOP</option>
										<option value="EGP" style="padding-left:5px;">Egyptian Pound EGP</option>
										<option value="AED" style="padding-left:5px;">Emirati Dirham AED</option>
										<option value="EUR" style="padding-left:5px;" selected>Euro EUR</option>
										<option value="GTQ" style="padding-left:5px;">Guatemala, Quetzal GTQ</option>
										<option value="HNL" style="padding-left:5px;">Honduras, Lempira HNL</option>
										<option value="HKD" style="padding-left:5px;">Hong Kong dollar HKD</option>
										<option value="HUF" style="padding-left:5px;">Hungary Forint HUF</option>
										<option value="IDR" style="padding-left:5px;">Indonesia Rupiahs IDR</option>
										<option value="IQD" style="padding-left:5px;">Iraqi Dinar IQD</option>
										<option value="NIS" style="padding-left:5px;">Israel Shekel NIS</option>
										<option value="JOD" style="padding-left:5px;">Jordanian Dinar JOD</option>
										<option value="KES" style="padding-left:5px;">Kenyan Shilling KES</option>
										<option value="KWD" style="padding-left:5px;">Kuwait dinar KWD</option>
										<option value="KGS" style="padding-left:5px;">Kyrgyzstan, Som KGS</option>
										<option value="MKD" style="padding-left:5px;">Macedonia Denar MKD</option>
										<option value="MYR" style="padding-left:5px;">Malaysia Ringgits MYR</option>
										<option value="MXN" style="padding-left:5px;">Mexico Pesos MXN</option>
										<option value="MAD" style="padding-left:5px;">Morocco Dirhams MAD</option>
										<option value="NZD" style="padding-left:5px;">New Zealand Dollars NZD</option>
										<option value="NGN" style="padding-left:5px;">Nigerian naira NGN</option>
										<option value="NOK" style="padding-left:5px;">Norway Kroner NOK</option>
										<option value="PEN" style="padding-left:5px;">Peru Nuevos Soles PEN</option>
										<option value="PLN" style="padding-left:5px;">Poland Zlotych PLN</option>
										<option value="RUB" style="padding-left:5px;">Russia Rubles RUB</option>
										<option value="SAR" style="padding-left:5px;">Saudi Arabian Riyal SAR</option>
										<option value="RSD" style="padding-left:5px;">Serbian Dinar RSD</option>
										<option value="ZAR" style="padding-left:5px;">South Africa Rand ZAR</option>
										<option value="SEK" style="padding-left:5px;">Sweden Kronor SEK</option>
										<option value="CHF" style="padding-left:5px;">Switzerland Francs CHF</option>
										<option value="TWD" style="padding-left:5px;">Taiwan dollar TWD</option>
										<option value="THB" style="padding-left:5px;">Thai Baht THB</option>
										<option value="TRY" style="padding-left:5px;">Turkey Lira TRY</option>
										<option value="UAH" style="padding-left:5px;">Ukraine Hryvna UAH</option>
										<option value="GBP" style="padding-left:5px;">United Kingdom Pounds GBP</option>
										<option value="USD" style="padding-left:5px;">United States Dollars USD</option>
										<option value="UYU" style="padding-left:5px;">Uruguay peso UYU</option>
										<option value="VEF" style="padding-left:5px;">Venezuela Bolivares Fuertes VEF</option>	
									</select>
								</div>             
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="pricess" name="pricess" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td align="center">
							<a href="#" id="pgewuncdeasdsaasdsal" class="buttonM bDefault mb10 mt5">Add / Save Package</a>
						</td>
					</tr>
						<?php
							$sys_startsaa = mssql_query("select top 100 p_name,currency,money,cost_eur from MVCore_PG_Packs");
							for($i=0;$i < mssql_num_rows($sys_startsaa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsaa);
								
										switch($drop_info[1]){
										case 'ALB': $curdrop = 'Albania Lek ALB'; break;
										case 'ARS': $curdrop = 'Argentina Pesos ARS'; break;
										case 'AUD': $curdrop = 'Austrlia Dollars AUD'; break;
										case 'AZN': $curdrop = 'Azerbaijani New Manat AZN'; break;
										case 'BYR': $curdrop = 'Belarusian Ruble BYR'; break;
										case 'BOB': $curdrop = 'Bolivia Boliviano BOB'; break;
										case 'BAM': $curdrop = 'Bosnia and H. convertible mark BAM'; break;
										case 'BRL': $curdrop = 'Brazilian Real BRL'; break;
										case 'BGN': $curdrop = 'Bulgaria Leva BGN'; break;
										case 'CAD': $curdrop = 'Canada Dollars CAD'; break;
										case 'CLP': $curdrop = 'Chile Pesos CLP'; break;
										case 'CNY': $curdrop = 'China Yuan Renminbi CNY'; break;
										case 'COP': $curdrop = 'Colombia Pesos COP'; break;
										case 'CRC': $curdrop = 'Costa Rica, colón CRC'; break;
										case 'HRK': $curdrop = 'Croatia Kuna HRK'; break;
										case 'CZK': $curdrop = 'Czech Republic Koruny CZK'; break;
										case 'DKK': $curdrop = 'Denmark Kroner DKK'; break;
										case 'DOP': $curdrop = 'Dominican Peso DOP'; break;
										case 'EGP': $curdrop = 'Egyptian Pound EGP'; break;
										case 'AED': $curdrop = 'Emirati Dirham AED'; break;
										case 'EUR': $curdrop = 'Euro EUR'; break;
										case 'GTQ': $curdrop = 'Guatemala, Quetzal GTQ'; break;
										case 'HNL': $curdrop = 'Honduras, Lempira HNL'; break;
										case 'HKD': $curdrop = 'Hong Kong dollar HKD'; break;
										case 'HUF': $curdrop = 'Hungary Forint HUF'; break;
										case 'IDR': $curdrop = 'Indonesia Rupiahs IDR'; break;
										case 'IQD': $curdrop = 'Iraqi Dinar IQD'; break;
										case 'NIS': $curdrop = 'Israel Shekel NIS'; break;
										case 'JOD': $curdrop = 'Jordanian Dinar JOD'; break;
										case 'KES': $curdrop = 'Kenyan Shilling KES'; break;
										case 'KWD': $curdrop = 'Kuwait dinar KWD'; break;
										case 'KGS': $curdrop = 'Kyrgyzstan, Som KGS'; break;
										case 'MKD': $curdrop = 'Macedonia Denar MKD'; break;
										case 'MYR': $curdrop = 'Malaysia Ringgits MYR'; break;
										case 'MXN': $curdrop = 'Mexico Pesos MXN'; break;
										case 'MAD': $curdrop = 'Morocco Dirhams MAD'; break;
										case 'NZD': $curdrop = 'New Zealand Dollars NZD'; break;
										case 'NGN': $curdrop = 'Nigerian naira NGN'; break;
										case 'NOK': $curdrop = 'Norway Kroner NOK'; break;
										case 'PEN': $curdrop = 'Peru Nuevos Soles PEN'; break;
										case 'PLN': $curdrop = 'Poland Zlotych PLN'; break;
										case 'RUB': $curdrop = 'Russia Rubles RUB'; break;
										case 'SAR': $curdrop = 'Saudi Arabian Riyal SAR'; break;
										case 'RSD': $curdrop = 'Serbian Dinar RSD'; break;
										case 'ZAR': $curdrop = 'South Africa Rand ZAR'; break;
										case 'SEK': $curdrop = 'Sweden Kronor SEK'; break;
										case 'CHF': $curdrop = 'Switzerland Francs CHF'; break;
										case 'TWD': $curdrop = 'Taiwan dollar TWD'; break;
										case 'THB': $curdrop = 'Thai Baht THB'; break;
										case 'TRY': $curdrop = 'Turkey Lira TRY'; break;
										case 'UAH': $curdrop = 'Ukraine Hryvna UAH'; break;
										case 'GBP': $curdrop = 'United Kingdom Pounds GBP'; break;
										case 'USD': $curdrop = 'United States Dollars USD'; break;
										case 'UYU': $curdrop = 'Uruguay peso UYU'; break;
										case 'VEF': $curdrop = 'Venezuela Bolivares Fuertes VEF'; break;
										};
								
								echo'
											<tr>
												<td>'.$drop_info[0].'</td>
												<td>'.$drop_info[2].'</td>
												<td>'.$curdrop.'</td>
												<td>'.$drop_info[3].'</td>
												<td align="center">
													<ul class="navi nav-pills">
													  <li class="dropdown">
														<a class="dropdown-toggle" data-toggle="dropdown">Options<b class="caret"></b></a>
														<ul class="dropdown-menu">
															<li> <a href="#" class="" onclick="pguncediasdsat('.$drop_info[2].')"><span class="icos-pencil"></span>Edit</a></li>
															<li><a href="#" onclick="pguncdeasdsal('.$drop_info[2].')"><span class="icos-trash"></span>Delete</a></li>
														</ul>
													  </li>
													</ul> 
												</td>
											</tr>
								';
							};
						?>
                </tbody>
            </table>
        </div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Paymentwall_Settings') { ?> <!-- Paymentwall_Settings -->
		<h5 style="margin-top:15px;text-align:left;"><h6>PostBack URL:</h6> <i><?php echo $mvcore['surl'];?>/PostBack.php</i></h5>
		<div class="widget fluid" id="pwsettdsfdsrebbb">
			<div class="whead"><h6>PaymentWall Settings</h6><h6 style="float:right;"><a target="blank_" href="http://www.paymentwall.com">www.paymentwall.com</a></h6></div>
					<div class="formRow">
						<div class="grid3"><label>PaymentWall Module:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="paymentwall_status" name="paymentwall_status" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['paymentwall_status'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['paymentwall_status'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>PaymentWall 1 EUR = ? <?php echo $mvcore['money_name2'];?>:</label></div>
                        <div class="grid9"><input id="paymentwall_eur_val" name="paymentwall_eur_val" type="text" value="<?php echo $mvcore['paymentwall_eur_val']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>PaymentWall Width:</label></div>
                        <div class="grid9"><input id="paymentwall_width" name="paymentwall_width" type="text" value="<?php echo $mvcore['paymentwall_width']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>PaymentWall Height:</label></div>
                        <div class="grid9"><input id="paymentwall_height" name="paymentwall_height" type="text" value="<?php echo $mvcore['paymentwall_height']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>PaymentWall Project Key:</label></div>
                        <div class="grid9"><input id="paymentwall_pkey" name="paymentwall_pkey" type="text" value="<?php echo $mvcore['paymentwall_pkey']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>PaymentWall Secret Key:</label></div>
                        <div class="grid9"><input id="paymentwall_skey" name="paymentwall_skey" type="text" value="<?php echo $mvcore['paymentwall_skey']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>PaymentWall Widget Link:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="paymentwall_widget_link" name="paymentwall_widget_link" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="subscription" <?php if($mvcore['paymentwall_widget_link'] == 'subscription') { echo 'selected'; } else { echo ''; }; ?>>api.paymentwall.com/api/subscription</option>
								<option value="ps" <?php if($mvcore['paymentwall_widget_link'] == 'ps') { echo 'selected'; } else { echo ''; }; ?>>api.paymentwall.com/api/ps</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>PaymentWall Widget ID:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="paymentwall_widget" name="paymentwall_widget" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="p1_" <?php if($mvcore['paymentwall_widget'] == 'p1_') { echo 'selected'; } else { echo ''; }; ?>>Paymentwall Multi ( p1_ )</option>
								<option value="p4_" <?php if($mvcore['paymentwall_widget'] == 'p4_') { echo 'selected'; } else { echo ''; }; ?>>2-Click Payments ( p4_ )</option>
								<option value="p3_" <?php if($mvcore['paymentwall_widget'] == 'p3_') { echo 'selected'; } else { echo ''; }; ?>>Paymentwall Combo ( p3_ )</option>
								<option value="p2_" <?php if($mvcore['paymentwall_widget'] == 'p2_') { echo 'selected'; } else { echo ''; }; ?>>Paymentwall Uni ( p2_ )</option>
								<option value="p10_" <?php if($mvcore['paymentwall_widget'] == 'p10_') { echo 'selected'; } else { echo ''; }; ?>>Paymentwall Multi NEW ( p10_ )</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>PaymentWall Widget Number:</label></div>
                        <div class="grid9"><input id="paymentwall_widgetnum" name="paymentwall_widgetnum" type="text" value="<?php echo $mvcore['paymentwall_widgetnum']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Promo Text ( HTML Allowed / Empty = OFF ):</label></div>
                        <div class="grid9"><input id="paymentwall_promo" name="paymentwall_promo" type="text" value="<?php echo $mvcore['paymentwall_promo']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Superrewards_Settings') { ?> <!-- Superrewards_Settings -->
		<h5 style="margin-top:15px;text-align:left;"><h6>PostBack URL:</h6> <i><?php echo $mvcore['surl'];?>/PostBack.php</i></h5>
		<div class="widget fluid" id="srsettdsfrgeg3">
			<div class="whead"><h6>SuperRewards Settings</h6><h6 style="float:right;"><a target="blank_" href="http://www.superrewards.com">www.superrewards.com</a></h6></div>
					<div class="formRow">
						<div class="grid3"><label>SuperRewards Module:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="superrewards_status" name="superrewards_status" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['superrewards_status'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['superrewards_status'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>SuperRewards 1 EUR = ? <?php echo $mvcore['money_name2'];?>:</label></div>
                        <div class="grid9"><input id="superrewards_eur_val" name="superrewards_eur_val" type="text" value="<?php echo $mvcore['superrewards_eur_val']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>SuperRewards Width:</label></div>
                        <div class="grid9"><input id="superrewards_width" name="superrewards_width" type="text" value="<?php echo $mvcore['superrewards_width']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>SuperRewards Height:</label></div>
                        <div class="grid9"><input id="superrewards_height" name="superrewards_height" type="text" value="<?php echo $mvcore['superrewards_height']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>SuperRewards App Hash:</label></div>
                        <div class="grid9"><input id="superrewards_api" name="superrewards_api" type="text" value="<?php echo $mvcore['superrewards_api']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>SuperRewards Postback Key:</label></div>
                        <div class="grid9"><input id="superrewards_skey" name="superrewards_skey" type="text" value="<?php echo $mvcore['superrewards_skey']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Promo Text ( HTML Allowed / Empty = OFF ):</label></div>
                        <div class="grid9"><input id="superrewards_promo" name="superrewards_promo" type="text" value="<?php echo $mvcore['superrewards_promo']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Fortumo_Settings') { ?> <!-- Fortumo_Settings -->
		<h5 style="margin-top:15px;text-align:left;"><h6>PostBack URL:</h6> <i><?php echo $mvcore['surl'];?>/PostBack.php</i></h5>
		<div class="widget fluid" id="trhretrehwgetwe">
			<div class="whead"><h6>Fortumo Settings</h6><h6 style="float:right;"><a target="blank_" href="http://www.fortumo.com">www.fortumo.com</a></h6></div>
					<div class="formRow">
						<div class="grid3"><label>Fortumo Module:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="fortumo_status" name="fortumo_status" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['fortumo_status'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['fortumo_status'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Fortumo Service ID:</label></div>
                        <div class="grid9"><input id="fortumo_serv_id" name="fortumo_serv_id" type="text" value="<?php echo $mvcore['fortumo_serv_id']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Fortumo Secret ID:</label></div>
                        <div class="grid9"><input id="fortumo_secre_id" name="fortumo_secre_id" type="text" value="<?php echo $mvcore['fortumo_secre_id']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Promo Text ( HTML Allowed / Empty = OFF ):</label></div>
                        <div class="grid9"><input id="fortumo_promo" name="fortumo_promo" type="text" value="<?php echo $mvcore['fortumo_promo']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'PagSeguro_Settings') { ?> <!-- PagSeguro_Settings -->
		<div class="widget fluid" id="trhretrtjtrehwe">
			<div class="whead"><h6>PagSeguro Settings ( For Brazil Admins )</h6><h6 style="float:right;"><a target="blank_" href="https://pagseguro.uol.com.br/">pagseguro.uol.com.br</a></h6></div>
					<div class="formRow">
						<div class="grid3"><label>PagSeguro Module:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="pagseguro_status" name="pagseguro_status" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['pagseguro_status'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['pagseguro_status'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>PagSeguro Email:</label></div>
                        <div class="grid9"><input id="pagseguro_email" name="pagseguro_email" type="text" value="<?php echo $mvcore['pagseguro_email']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>PagSeguro TOKEN:</label></div>
                        <div class="grid9"><input id="pagseguro_token" name="pagseguro_token" type="text" value="<?php echo $mvcore['pagseguro_token']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>PagSeguro Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="pagseguro_type" name="pagseguro_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="production" <?php if($mvcore['pagseguro_type'] == 'production') { echo 'selected'; } else { echo ''; }; ?>>production</option> 
								<option value="sandbox" <?php if($mvcore['pagseguro_type'] == 'sandbox') { echo 'selected'; } else { echo ''; }; ?>>sandbox</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>PagSeguro Tax Value ( <b>Default: 10</b> ):</label></div>
                        <div class="grid9"><input id="pagseguro_tax_val" name="pagseguro_tax_val" type="text" value="<?php echo $mvcore['pagseguro_tax_val']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>PagSeguro MIN Price Tag ( <b>Default: 5</b> ):</label></div>
                        <div class="grid9"><input id="pagseguro_min_p_tag" name="pagseguro_min_p_tag" type="text" value="<?php echo $mvcore['pagseguro_min_p_tag']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>PagSeguro MAX Price Tag ( <b>Default: 999</b> ):</label></div>
                        <div class="grid9"><input id="pagseguro_max_p_tag" name="pagseguro_max_p_tag" type="text" value="<?php echo $mvcore['pagseguro_max_p_tag']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'interkassa_Settings') { ?> <!-- interkassa_Settings -->
		<div class="widget fluid" id="trh2reehwwe">
			<div class="whead"><h6>InterKassa Settings ( For Russians & Other )</h6><h6 style="float:right;"><a target="blank_" href="https://www.interkassa.com/">www.interkassa.com</a></h6></div>
					<div class="formRow">
						<div class="grid3"><label>InterKassa Module:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="interkassa_status" name="interkassa_status" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['interkassa_status'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['interkassa_status'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>InterKassa Checkouts ID:</label></div>
                        <div class="grid9"><input id="interkassa_ch_id" name="interkassa_ch_id" type="text" value="<?php echo $mvcore['interkassa_ch_id']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>InterKassa Currency Code:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="interkassa_cur_code" name="interkassa_cur_code" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="RUB" <?php if($mvcore['interkassa_cur_code'] == 'RUB') { echo 'selected'; } else { echo ''; }; ?>>RUB</option>
								<option value="UAH" <?php if($mvcore['interkassa_cur_code'] == 'UAH') { echo 'selected'; } else { echo ''; }; ?>>UAH</option> 
								<option value="EUR" <?php if($mvcore['interkassa_cur_code'] == 'EUR') { echo 'selected'; } else { echo ''; }; ?>>EUR</option> 
								<option value="USD" <?php if($mvcore['interkassa_cur_code'] == 'USD') { echo 'selected'; } else { echo ''; }; ?>>USD</option> 
							</select>
						</div>             
					</div>
				<div class="formRow"><div class="grid12"></div></div>
					<div class="formRow">
                        <div class="grid3"><label>InterKassa Values 1 ( <b>Ex: 1.50  /  Ex: 600</b> ):</label></div>
                        <div class="grid4"><input id="interkassa_val_p1" name="interkassa_val_p1" type="text" placeholder="Price Eur" value="<?php echo $mvcore['interkassa_val_p1']; ?>"></div>
						<div class="grid5"><input id="interkassa_cred_p1" name="interkassa_cred_p1" type="text" placeholder="<?php echo $mvcore['money_name2'];?> Value" value="<?php echo $mvcore['interkassa_cred_p1']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>InterKassa Values 2 ( <b>Ex: 2.00  /  Ex: 800</b> ):</label></div>
                        <div class="grid4"><input id="interkassa_val_p2" name="interkassa_val_p2" type="text" placeholder="Price Eur" value="<?php echo $mvcore['interkassa_val_p2']; ?>"></div>
						<div class="grid5"><input id="interkassa_cred_p2" name="interkassa_cred_p2" type="text" placeholder="<?php echo $mvcore['money_name2'];?> Value" value="<?php echo $mvcore['interkassa_cred_p2']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>InterKassa Values 3 ( <b>Ex: 3.00  /  Ex: 1200</b> ):</label></div>
                        <div class="grid4"><input id="interkassa_val_p3" name="interkassa_val_p3" type="text" placeholder="Price Eur" value="<?php echo $mvcore['interkassa_val_p3']; ?>"></div>
						<div class="grid5"><input id="interkassa_cred_p3" name="interkassa_cred_p3" type="text" placeholder="<?php echo $mvcore['money_name2'];?> Value" value="<?php echo $mvcore['interkassa_cred_p3']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>InterKassa Values 4 ( <b>Ex: 4.00  /  Ex: 1600</b> ):</label></div>
                        <div class="grid4"><input id="interkassa_val_p4" name="interkassa_val_p4" type="text" placeholder="Price Eur" value="<?php echo $mvcore['interkassa_val_p4']; ?>"></div>
						<div class="grid5"><input id="interkassa_cred_p4" name="interkassa_cred_p4" type="text" placeholder="<?php echo $mvcore['money_name2'];?> Value" value="<?php echo $mvcore['interkassa_cred_p4']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>InterKassa Values 5 ( <b>Ex: 5.00  /  Ex: 2000</b> ):</label></div>
                        <div class="grid4"><input id="interkassa_val_p5" name="interkassa_val_p5" type="text" placeholder="Price Eur" value="<?php echo $mvcore['interkassa_val_p5']; ?>"></div>
						<div class="grid5"><input id="interkassa_cred_p5" name="interkassa_cred_p5" type="text" placeholder="<?php echo $mvcore['money_name2'];?> Value" value="<?php echo $mvcore['interkassa_cred_p5']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
<script>
	//PayPal
	function ppfuncediasdsat(elmnts) {
		var getAllValues = elmnts;
		
			$.post("acps.php", {
				ppfuncediasdsat: getAllValues
			},
			function(data) {
				var outputData = data.split("-ids-");
				$('#idcheck').val(outputData[0]); //ID Check
				$('#pnamesa').val(outputData[1]);
				$('#rewgc').val(outputData[2]);
				$('#EURa').val(outputData[3]);
				$('#USDa').val(outputData[4]);
				$('#GBPa').val(outputData[5]);
				
			});
	};
	
	function ppfuncdeasdsal(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				ppfuncdeasdsal: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data); //error
				
				$('#idcheck').val(""); //ID Check
				$('#pnamesa').val("");
				$('#rewgc').val("");
				$('#EURa').val("");
				$('#USDa').val("");
				$('#GBPa').val("");
				
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
	//PayGol
	function pguncediasdsat(elmnts) {
		var getAllValues = elmnts;
		
			$.post("acps.php", {
				pguncediasdsat: getAllValues
			},
			function(data) {
				var outputData = data.split("-ids-");
				$('#idcheck').val(outputData[0]); //ID Check
				$('#pnamesas').val(outputData[1]);
				$('#rewgca').val(outputData[2]);
				$('#currs').val(outputData[3]);
				$('#pricess').val(outputData[4]);
				
				$("select").select2({ placeholder: "Choose a option..." });
				
			});
	}; 
	
	function pguncdeasdsal(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				pguncdeasdsal: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data); //error
				
				$('#idcheck').val(""); //ID Check
				$('#pnamesas').val("");
				$('#rewgca').val("");
				$('#currs').val("EUR");
				$('#pricess').val("");
				
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
	
$(document).ready(function() {
	//page1
	$( "#ppsetdsfdsfsv" ).on('change', function() {
		var getAllValues = 
		
				$("#paypal_status option:selected").val()+"-ids-"
				+$("#paypal_email").val()+"-ids-"
				+$("#paypal_promo").val()
			
			;
			
			$.post("acps.php", {
				ppsetdsfdsfsv: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	$( "#EURa" ).on('change keyup paste click mousedown mouseup mousemove', function() {
		var getAllValues = $('#EURa').val();
		var calcVallUSD = getAllValues * 1.09005;
		var calcVallGBP = getAllValues * 0.698783;
			$('#USDa').val((Math.round(calcVallUSD * 100)/100).toFixed(2));
			$('#GBPa').val((Math.round(calcVallGBP * 100)/100).toFixed(2));
	});
	
	$("#ppfuncdeasdsaasdsal").on('click', function() {
		var getAllValues = 
		
				$("#idcheck").val()+"-ids-" //ID Check
				+$("#pnamesa").val()+"-ids-"
				+$("#rewgc").val()+"-ids-"
				+$("#EURa").val()+"-ids-"
				+$("#USDa").val()+"-ids-"
				+$("#GBPa").val()
				
			;
			$.post("acps.php", {
				ppfuncdeasdsaasdsal: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data); //error
				
				$('#idcheck').val(""); //ID Check
				$('#pnamesa').val("");
				$('#rewgc').val("");
				$('#EURa').val("");
				$('#USDa').val("");
				$('#GBPa').val("");
				
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
	});
	
	//page2
	$( "#pgsettfdsfds" ).on('change', function() {
		var getAllValues = 
		
				$("#paygol_status option:selected").val()+"-ids-"
				+$("#paygol_sid").val()+"-ids-"
				+$("#paygol_promo").val()
			
			;
			
			$.post("acps.php", {
				pgsettfdsfds: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	$("#pgewuncdeasdsaasdsal").on('click', function() {
		var getAllValues = 
		
				$("#idcheck").val()+"-ids-" //ID Check
				+$("#pnamesas").val()+"-ids-"
				+$("#rewgca").val()+"-ids-"
				+$("#currs").val()+"-ids-"
				+$("#pricess").val()
				
			;
			$.post("acps.php", {
				pgewuncdeasdsaasdsal: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data); //error
				
				$('#idcheck').val(""); //ID Check
				$('#pnamesas').val("");
				$('#rewgca').val("");
				$('#currs').val("EUR");
				$('#pricess').val("");
				
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
	});
	
	//page3
	$( "#pwsettdsfdsrebbb" ).on('change', function() {
		var getAllValues = 
		
				$("#paymentwall_status option:selected").val()+"-ids-"
				+$("#paymentwall_pkey").val()+"-ids-"
				+$("#paymentwall_skey").val()+"-ids-"
				+$("#paymentwall_widget option:selected").val()+"-ids-"
				+$("#paymentwall_widgetnum").val()+"-ids-"
				+$("#paymentwall_width").val()+"-ids-"
				+$("#paymentwall_height").val()+"-ids-"
				+$("#paymentwall_eur_val").val()+"-ids-"
				+$("#paymentwall_widget_link option:selected").val()+"-ids-"
				+$("#paymentwall_promo").val()
			;
			
			$.post("acps.php", {
				pwsettdsfdsrebbb: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page4
	$( "#srsettdsfrgeg3" ).on('change', function() {
		var getAllValues = 
		
				$("#superrewards_status option:selected").val()+"-ids-"
				+$("#superrewards_api").val()+"-ids-"
				+$("#superrewards_skey").val()+"-ids-"
				+$("#superrewards_width").val()+"-ids-"
				+$("#superrewards_height").val()+"-ids-"
				+$("#superrewards_eur_val").val()+"-ids-"
				+$("#superrewards_promo").val()				
			;
			
			$.post("acps.php", {
				srsettdsfrgeg3: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	
	//Fortumo
	$( "#trhretrehwgetwe" ).on('change', function() {
		var getAllValues = 
		
				$("#fortumo_status option:selected").val()+"-ids-"
				+$("#fortumo_serv_id").val()+"-ids-"
				+$("#fortumo_secre_id").val()+"-ids-"
				+$("#fortumo_promo").val()				
			;
			
			$.post("acps.php", {
				trhretrehwgetwe: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//SMSCoin
	$( "#smscoinsettdatr" ).on('change', function() {
		var getAllValues = 
		
				$("#smscoin_status option:selected").val()+"-ids-"
				+$("#smscoin_id").val()+"-ids-"
				+$("#smscoin_cost").val()+"-ids-"
				+$("#smscoin_money").val()
			;
			
			$.post("acps.php", {
				smscoinsettdatr: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//Pewgew
	$( "#trhretrtjtrehwe" ).on('change', function() {
		var getAllValues = 
		
				$("#pagseguro_status option:selected").val()+"-ids-"
				+$("#pagseguro_email").val()+"-ids-"
				+$("#pagseguro_token").val()+"-ids-"
				+$("#pagseguro_type option:selected").val()+"-ids-"
				+$("#pagseguro_tax_val").val()+"-ids-"
				+$("#pagseguro_min_p_tag").val()+"-ids-"
				+$("#pagseguro_max_p_tag").val()	
			;
			
			$.post("acps.php", {
				trhretrtjtrehwe: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//Interkassa
	$( "#trh2reehwwe" ).on('change', function() {
		var getAllValues = 
		
				$("#interkassa_status option:selected").val()+"-ids-"
				+$("#interkassa_ch_id").val()+"-ids-"
				+$("#interkassa_val_p1").val()+"-ids-"
				+$("#interkassa_val_p2").val()+"-ids-"
				+$("#interkassa_val_p3").val()+"-ids-"
				+$("#interkassa_val_p4").val()+"-ids-"
				+$("#interkassa_val_p5").val()+"-ids-"
				+$("#interkassa_cred_p1").val()+"-ids-"
				+$("#interkassa_cred_p2").val()+"-ids-"
				+$("#interkassa_cred_p3").val()+"-ids-"
				+$("#interkassa_cred_p4").val()+"-ids-"
				+$("#interkassa_cred_p5").val()+"-ids-"
				+$("#interkassa_cur_code").val()
			;
			
			$.post("acps.php", {
				trh2reehwwe: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>