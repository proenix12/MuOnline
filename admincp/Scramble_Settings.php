
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
			<li <?php if($_GET['op3'] == 'Scramble_Event') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Scramble_Settings-id-Scramble_Event.html" title=""><span style="height:30px;">Scramble Event Settings</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
			
		<?php if($_GET['op3'] == 'Scramble_Event') { ?> <!-- Scramble_Event -->
		<div class="widget fluid" id="scrambleevensett">
			<div class="whead"><h6>Scramble Event Settings <?php if($mvcore['Scramble'] != 'on') { echo '( <font color="red"><u><b>Scramble Event</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
						<div class="grid3"><label>Scramble Event Timer:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="scramble_start_timer" name="scramble_start_timer" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="on" <?php if($mvcore['scramble_start_timer'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['scramble_start_timer'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option>  
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Scramble Start:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="scramble_starts" name="scramble_starts" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['scramble_starts'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Every 1 Hour</option>
								<option value="2" <?php if($mvcore['scramble_starts'] == '2') { echo 'selected'; } else { echo ''; }; ?>>Every 2 Hours</option>
								<option value="3" <?php if($mvcore['scramble_starts'] == '3') { echo 'selected'; } else { echo ''; }; ?>>Every 3 Hours</option>
								<option value="4" <?php if($mvcore['scramble_starts'] == '4') { echo 'selected'; } else { echo ''; }; ?>>Every 4 Hours</option>
								<option value="5" <?php if($mvcore['scramble_starts'] == '5') { echo 'selected'; } else { echo ''; }; ?>>Every 5 Hours</option>
								<option value="6" <?php if($mvcore['scramble_starts'] == '6') { echo 'selected'; } else { echo ''; }; ?>>Every 6 Hours</option>
								<option value="7" <?php if($mvcore['scramble_starts'] == '7') { echo 'selected'; } else { echo ''; }; ?>>Every 7 Hours</option>
								<option value="8" <?php if($mvcore['scramble_starts'] == '8') { echo 'selected'; } else { echo ''; }; ?>>Every 8 Hours</option>
								<option value="9" <?php if($mvcore['scramble_starts'] == '9') { echo 'selected'; } else { echo ''; }; ?>>Every 9 Hours</option>
								<option value="10" <?php if($mvcore['scramble_starts'] == '10') { echo 'selected'; } else { echo ''; }; ?>>Every 10 Hours</option>
								<option value="11" <?php if($mvcore['scramble_starts'] == '11') { echo 'selected'; } else { echo ''; }; ?>>Every 11 Hours</option>
								<option value="12" <?php if($mvcore['scramble_starts'] == '12') { echo 'selected'; } else { echo ''; }; ?>>Every 12 Hours</option>
								<option value="168" <?php if($mvcore['scramble_starts'] == '168') { echo 'selected'; } else { echo ''; }; ?>>Every Week</option>
								<option value="720" <?php if($mvcore['scramble_starts'] == '720') { echo 'selected'; } else { echo ''; }; ?>>Every Month</option>
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Scramble Interval ( <b>Not Active If Start Is 0</b> ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="scramble_starts_int" name="scramble_starts_int" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="3" <?php if($mvcore['scramble_starts_int'] == '3') { echo 'selected'; } else { echo ''; }; ?>>3 Minutes</option>
								<option value="5" <?php if($mvcore['scramble_starts_int'] == '5') { echo 'selected'; } else { echo ''; }; ?>>5 Minutes</option>
								<option value="10" <?php if($mvcore['scramble_starts_int'] == '10') { echo 'selected'; } else { echo ''; }; ?>>10 Minutes</option>
								<option value="20" <?php if($mvcore['scramble_starts_int'] == '20') { echo 'selected'; } else { echo ''; }; ?>>20 Minutes</option>
								<option value="30" <?php if($mvcore['scramble_starts_int'] == '30') { echo 'selected'; } else { echo ''; }; ?>>30 Minutes</option>
								<option value="60" <?php if($mvcore['scramble_starts_int'] == '60') { echo 'selected'; } else { echo ''; }; ?>>1 Hour</option>
								<option value="120" <?php if($mvcore['scramble_starts_int'] == '120') { echo 'selected'; } else { echo ''; }; ?>>2 Hours</option>
								<option value="180" <?php if($mvcore['scramble_starts_int'] == '180') { echo 'selected'; } else { echo ''; }; ?>>3 Hours</option>
								<option value="240" <?php if($mvcore['scramble_starts_int'] == '240') { echo 'selected'; } else { echo ''; }; ?>>4 Hours</option>
								<option value="300" <?php if($mvcore['scramble_starts_int'] == '300') { echo 'selected'; } else { echo ''; }; ?>>5 Hours</option>
							</select>
						</div> 						
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Scramble Max Level:</label></div>
                        <div class="grid9"><input id="scramble_mlevel" name="scramble_mlevel" type="text" value="<?php echo $mvcore['scramble_mlevel']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Minus 1 Lvl For Each Wrong Answer ? ( Untill lvl 0 ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="scramble_lvldel" name="scramble_lvldel" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="yes" <?php if($mvcore['scramble_lvldel'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['scramble_lvldel'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option>  
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Reward Value Per Each Correct Answer ( <?php echo $mvcore['money_name1']; ?> ):</label></div>
                        <div class="grid9"><input id="scramble_nreward" name="scramble_nreward" type="text" value="<?php echo $mvcore['scramble_nreward']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Grand Reward Value ( <?php echo $mvcore['money_name1']; ?> ):</label></div>
                        <div class="grid9"><input id="scramble_grandrew" name="scramble_grandrew" type="text" value="<?php echo $mvcore['scramble_grandrew']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
<script>
$(document).ready(function() {
	//Scramble
	$( "#scrambleevensett" ).on('change', function() {
		var getAllValues = 
		
				$("#scramble_mlevel").val()+"-ids-"
				+$("#scramble_nreward").val()+"-ids-"
				+$("#scramble_grandrew").val()+"-ids-"
				+$("#scramble_lvldel option:selected").val()+"-ids-"
				+$("#scramble_starts option:selected").val()+"-ids-"
				+$("#scramble_starts_int option:selected").val()+"-ids-"
				+$("#scramble_start_timer option:selected").val();
				
			$.post("acps.php", {
				scrambleevensett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>