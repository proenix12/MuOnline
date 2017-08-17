
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Exchange_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Exchange_System_manage-id-Exchange_Settings.html" title=""><span style="height:30px;">Exchange Settings</span></a></li>
		</ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['Exchange_System'] != 'on') { echo '<font color="red"><u><b>Exchange System</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
			
		<?php if($_GET['op3'] == 'Exchange_Settings') { ?> <!-- Exchange_Settings -->
		<div id="ocexsett">
		<div class="widget fluid" id="addstatsss">
			<div class="whead"><h6>Online Hours To <?php echo $mvcore['money_name1'];?> Settings</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Exchange:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="oh_t_c_onoff" name="oh_t_c_onoff" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['oh_t_c_onoff'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['oh_t_c_onoff'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Rate ( 1 Hour = ? <?php echo $mvcore['money_name1'];?> ):</label></div>
                        <div class="grid9"><input id="oh_t_c_rate" name="oh_t_c_rate" type="text" value="<?php echo $mvcore['oh_t_c_rate']; ?>"></div>
                    </div>
		</div>
		<div class="widget fluid" id="addstatsss">
			<div class="whead"><h6><?php echo $mvcore['money_name1'];?> To WCoins Settings</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Exchange:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="c_t_w_onoff" name="c_t_w_onoff" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['c_t_w_onoff'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['c_t_w_onoff'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Rate ( 1 <?php echo $mvcore['money_name1'];?> = ? WCoins ):</label></div>
                        <div class="grid9"><input id="c_t_w_rate" name="c_t_w_rate" type="text" value="<?php echo $mvcore['c_t_w_rate']; ?>"></div>
                    </div>
		</div>
		<div class="widget fluid" id="addstatsss">
			<div class="whead"><h6><?php echo $mvcore['money_name1'];?> To <?php echo $mvcore['money_name2'];?> Settings</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Exchange:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="c_t_g_onoff" name="c_t_g_onoff" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['c_t_g_onoff'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['c_t_g_onoff'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Rate ( 1 <?php echo $mvcore['money_name1'];?> = ? <?php echo $mvcore['money_name2'];?>):</label></div>
                        <div class="grid9"><input id="c_t_g_rate" name="c_t_g_rate" type="text" value="<?php echo $mvcore['c_t_g_rate']; ?>"></div>
                    </div>
		</div>
		<div class="widget fluid" id="addstatsss">
			<div class="whead"><h6><?php echo $mvcore['money_name2'];?> To <?php echo $mvcore['money_name1'];?> Settings</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Exchange:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="g_t_c_onoff" name="g_t_c_onoff" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['g_t_c_onoff'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['g_t_c_onoff'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Rate ( 1 <?php echo $mvcore['money_name2'];?> = ? <?php echo $mvcore['money_name1'];?> ):</label></div>
                        <div class="grid9"><input id="g_t_c_rate" name="g_t_c_rate" type="text" value="<?php echo $mvcore['g_t_c_rate']; ?>"></div>
                    </div>
		</div>
		<div class="widget fluid" id="addstatsss">
			<div class="whead"><h6>Zen To <?php echo $mvcore['money_name1'];?> & <?php echo $mvcore['money_name1'];?> To Zen  Settings</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Exchange <?php echo $mvcore['money_name1'];?> To Zen:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="z_t_c_onoff" name="z_t_c_onoff" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['z_t_c_onoff'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['z_t_c_onoff'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Exchange Zen To <?php echo $mvcore['money_name1'];?>:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="c_t_z_onoff" name="c_t_z_onoff" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['c_t_z_onoff'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['c_t_z_onoff'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow"><div class="grid12">Note: Editing zen also req. to edit credits value in order to have same exchange rate ( Ex: if 1000 zen then 0.001 <?php echo $mvcore['money_name1'];?> / if 10000 zen then 0.0001 <?php echo $mvcore['money_name1'];?> )</div></div>
					<div class="formRow">
                        <div class="grid3"><label>Rate ( 1 <?php echo $mvcore['money_name1'];?> = ? Zen ( <b>Default: 1000</b> )):</label></div>
                        <div class="grid9"><input id="c_t_z_rate" name="c_t_z_rate" type="text" value="<?php echo $mvcore['c_t_z_rate']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Rate ( 1000 Zen = ? <?php echo $mvcore['money_name1'];?> ( <b>Default: 0.001</b> )):</label></div>
                        <div class="grid9"><input id="z_t_c_rate" name="z_t_c_rate" type="text" value="<?php echo $mvcore['z_t_c_rate']; ?>"></div>
                    </div>
		</div>
		</div>
		<?php }; ?>
<script>
$(document).ready(function() {
	//page1
	$( "#ocexsett" ).on('change', function() {
		var getAllValues = 
		
				$("#oh_t_c_onoff option:selected").val()+"-ids-"
				+$("#oh_t_c_rate").val()+"-ids-"
				+$("#c_t_w_onoff option:selected").val()+"-ids-"
				+$("#c_t_w_rate").val()+"-ids-"
				+$("#c_t_g_onoff option:selected").val()+"-ids-"
				+$("#c_t_g_rate").val()+"-ids-"
				+$("#g_t_c_onoff option:selected").val()+"-ids-"
				+$("#g_t_c_rate").val()+"-ids-"
				+$("#c_t_z_onoff option:selected").val()+"-ids-"
				+$("#c_t_z_rate").val()+"-ids-"
				+$("#z_t_c_rate").val()+"-ids-"
				+$("#z_t_c_onoff option:selected").val()
			
			;
			
			$.post("acps.php", {
				ocexsett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>