
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Vote_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Vote_manage-id-Vote_Settings.html" title=""><span style="height:30px;">Vote Settings</span></a></li>
			<li <?php if($_GET['op3'] == 'Add_Remove_Vote') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Vote_manage-id-Add_Remove_Vote.html" title=""><span style="height:30px;">Add / Remove Vote links</span></a></li>
        	<li <?php if($_GET['op3'] == 'MultiAccount_Voting') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Vote_manage-id-MultiAccount_Voting.html" title=""><span style="height:30px;">Multi Account Voter List</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['Vote'] != 'on') { echo '<font color="red"><u><b>Vote</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
			
		<?php if($_GET['op3'] == 'Vote_Settings') { ?> <!-- Vote_Settings -->
		<div class="widget fluid" id="votesett">
			<div class="whead"><h6>Vote Settings</h6></div>
					<div class="formRow">
						<div class="grid3"><label>IP Check ( Dynamic IP Use DISABLED ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="vote_ipcheck" name="vote_ipcheck" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="yes" <?php if($mvcore['vote_ipcheck'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['vote_ipcheck'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Need Character To Vote:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="vote_nchar" name="vote_nchar" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="yes" <?php if($mvcore['vote_nchar'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['vote_nchar'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Character Need Resets To Vote:</label></div>
                        <div class="grid9"><input id="vote_chneed_resets" name="vote_chneed_resets" type="text" value="<?php echo $mvcore['vote_chneed_resets']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Voting Reward Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="reward_sys_vote" name="reward_sys_vote" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="1" <?php if($mvcore['reward_sys_vote'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option> 
								<option value="2" <?php if($mvcore['reward_sys_vote'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option> 
							</select>
						</div>             
					</div>
		</div>
		<div class="widget fluid" id="topvotersett">
			<div class="whead"><h6>Top Voter Settings</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Top 10 Voter System:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="vote_top_of" name="vote_top_of" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="on" <?php if($mvcore['vote_top_of'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['vote_top_of'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Winner Count From Top 10:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="vote_top_top" name="vote_top_top" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="1" <?php if($mvcore['vote_top_top'] == '1') { echo 'selected'; } else { echo ''; }; ?>>1 Winner</option>
								<option value="2" <?php if($mvcore['vote_top_top'] == '2') { echo 'selected'; } else { echo ''; }; ?>>2 Winners</option>
								<option value="3" <?php if($mvcore['vote_top_top'] == '3') { echo 'selected'; } else { echo ''; }; ?>>3 Winners</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Reward For Each Winner ( <?php echo $mvcore['money_name1']; ?> ):</label></div>
                        <div class="grid9"><input id="vote_top_reward" name="vote_top_reward" type="text" value="<?php echo $mvcore['vote_top_reward']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Rewarding Start:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="vote_top_at" name="vote_top_at" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1438999200" <?php if($mvcore['vote_top_at'] == '1438999200') { echo 'selected'; } else { echo ''; }; ?>>At 4:00</option>
								<option value="1438999200" <?php if($mvcore['vote_top_at'] == '1438999200') { echo 'selected'; } else { echo ''; }; ?>>At 5:00</option>
								<option value="1439002800" <?php if($mvcore['vote_top_at'] == '1439002800') { echo 'selected'; } else { echo ''; }; ?>>At 6:00</option>
								<option value="1439006400" <?php if($mvcore['vote_top_at'] == '1439006400') { echo 'selected'; } else { echo ''; }; ?>>At 7:00</option>
								<option value="1439010000" <?php if($mvcore['vote_top_at'] == '1439010000') { echo 'selected'; } else { echo ''; }; ?>>At 8:00</option>
								<option value="1439013600" <?php if($mvcore['vote_top_at'] == '1439013600') { echo 'selected'; } else { echo ''; }; ?>>At 9:00</option>
								<option value="1439017200" <?php if($mvcore['vote_top_at'] == '1439017200') { echo 'selected'; } else { echo ''; }; ?>>At 10:00</option>
								<option value="1439020800" <?php if($mvcore['vote_top_at'] == '1439020800') { echo 'selected'; } else { echo ''; }; ?>>At 11:00</option>
								<option value="1439024400" <?php if($mvcore['vote_top_at'] == '1439024400') { echo 'selected'; } else { echo ''; }; ?>>At 12:00</option>
								<option value="1439028000" <?php if($mvcore['vote_top_at'] == '1439028000') { echo 'selected'; } else { echo ''; }; ?>>At 13:00</option>
								<option value="1439031600" <?php if($mvcore['vote_top_at'] == '1439031600') { echo 'selected'; } else { echo ''; }; ?>>At 14:00</option>
								<option value="1439035200" <?php if($mvcore['vote_top_at'] == '1439035200') { echo 'selected'; } else { echo ''; }; ?>>At 15:00</option>
								<option value="1439038800" <?php if($mvcore['vote_top_at'] == '1439038800') { echo 'selected'; } else { echo ''; }; ?>>At 16:00</option>
								<option value="1439042400" <?php if($mvcore['vote_top_at'] == '1439042400') { echo 'selected'; } else { echo ''; }; ?>>At 17:00</option>
								<option value="1439046000" <?php if($mvcore['vote_top_at'] == '1439046000') { echo 'selected'; } else { echo ''; }; ?>>At 18:00</option>
								<option value="1439049600" <?php if($mvcore['vote_top_at'] == '1439049600') { echo 'selected'; } else { echo ''; }; ?>>At 19:00</option>
								<option value="1439053200" <?php if($mvcore['vote_top_at'] == '1439053200') { echo 'selected'; } else { echo ''; }; ?>>At 20:00</option>
								<option value="1439056800" <?php if($mvcore['vote_top_at'] == '1439056800') { echo 'selected'; } else { echo ''; }; ?>>At 21:00</option>
								<option value="1439060400" <?php if($mvcore['vote_top_at'] == '1439060400') { echo 'selected'; } else { echo ''; }; ?>>At 22:00</option>
								<option value="1439064000" <?php if($mvcore['vote_top_at'] == '1439064000') { echo 'selected'; } else { echo ''; }; ?>>At 23:00</option>
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Rewarding Interval:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="vote_top_int" name="vote_top_int" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="604800" <?php if($mvcore['vote_top_int'] == '604800') { echo 'selected'; } else { echo ''; }; ?>>Once a week</option>
								<option value="2629743" <?php if($mvcore['vote_top_int'] == '2629743') { echo 'selected'; } else { echo ''; }; ?>>Once a month</option>
							</select>
						</div>             
					</div>
		</div>
		<div class="widget fluid" id="votebonussett">
			<div class="whead"><h6>Voting Bonus Settings</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Bonus System:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="vote_bonus_io" name="vote_bonus_io" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="on" <?php if($mvcore['vote_bonus_io'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['vote_bonus_io'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Bonus Reward ( + To Existing Vote Reward Per Link ):</label></div>
                        <div class="grid9"><input id="vote_rew_bonus" name="vote_rew_bonus" type="text" value="<?php echo $mvcore['vote_rew_bonus']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Bonus Times Per Day:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="vote_tpday" name="vote_tpday" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="1" <?php if($mvcore['vote_tpday'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Once a Day</option>
								<option value="2" <?php if($mvcore['vote_tpday'] == '2') { echo 'selected'; } else { echo ''; }; ?>>Twice a Day</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Bonus Active Time:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="vote_rew_long" name="vote_rew_long" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="300" <?php if($mvcore['vote_rew_long'] == '300') { echo 'selected'; } else { echo ''; }; ?>>5 Minutes</option>
								<option value="600" <?php if($mvcore['vote_rew_long'] == '600') { echo 'selected'; } else { echo ''; }; ?>>10 Minutes</option>
								<option value="1200" <?php if($mvcore['vote_rew_long'] == '1200') { echo 'selected'; } else { echo ''; }; ?>>20 Minutes</option>
								<option value="2400" <?php if($mvcore['vote_rew_long'] == '2400') { echo 'selected'; } else { echo ''; }; ?>>40 Minutes</option>
								<option value="3000" <?php if($mvcore['vote_rew_long'] == '3000') { echo 'selected'; } else { echo ''; }; ?>>50 Minutes</option>
								<option value="3600" <?php if($mvcore['vote_rew_long'] == '3600') { echo 'selected'; } else { echo ''; }; ?>>1 Hour</option>
								<option value="7200" <?php if($mvcore['vote_rew_long'] == '7200') { echo 'selected'; } else { echo ''; }; ?>>2 Hours</option>
								<option value="10800" <?php if($mvcore['vote_rew_long'] == '10800') { echo 'selected'; } else { echo ''; }; ?>>3 Hours</option>
								<option value="14400" <?php if($mvcore['vote_rew_long'] == '14400') { echo 'selected'; } else { echo ''; }; ?>>4 Hours</option>
								<option value="18000" <?php if($mvcore['vote_rew_long'] == '18000') { echo 'selected'; } else { echo ''; }; ?>>5 Hours</option>
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Add_Remove_Vote') { ?> <!-- Add_Remove_Vote -->
		<div class="widget">
            <div class="whead"><h6>Vote Link Manage</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Vote Name</td>
						<td>Reward</td>
                        <td>Vote Time</td>
						<td>URL ( LINK )</td>
						<td>Image URL ( LINK )</td>
						<td>Option</td>
                    </tr>
                </thead>
                <tbody id="echotabled">
					<tr>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="vname" name="vname" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="rewv" name="rewv" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td width="250px">
							<input id="idcheck" name="idcheck" type="hidden" value=""> <!-- Hidden ID -->
							<div class="formRow">
								<div class="grid9">
									<select style="width:100%;padding-left:5px;opacity:0.6;" id="vtime" name="vtime" data-placeholder="Choose a option..." class="select" tabindex="2">
										<option value=""></option>
										<option value="86400" style="padding-left:5px;">Once a Day ( 24h )</option>
										<option value="43200" style="padding-left:5px;">Every 12 Hours</option>
										<option value="21600" style="padding-left:5px;">Every 6 Hours</option>
									</select>
								</div>             
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="urll" name="urll" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="imgurll" name="imgurll" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td align="center">
							<a href="#" id="votedownlinkm" class="buttonM bDefault mb10 mt5">Add / Save Link</a>
						</td>
					</tr>
						<?php
							$sys_startsa = mssql_query("select top 100 name,url,img_url,reward,un_id,date_int from MVCore_Vote");
							for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsa);
								
								if($drop_info[5] == '86400'){$cat_time = 'Once a Day ( 24h )';}
								elseif($drop_info[5] == '43200'){$cat_time = 'Every 12 Hours';}
								elseif($drop_info[5] == '21600'){$cat_time = 'Every 6 Hours';};

								echo'
											<tr>
												<td>'.$drop_info[0].'</td>
												<td>'.$drop_info[3].'</td>
												<td>'.$cat_time.'</td>
												<td>'.$drop_info[1].'</td>
												<td>'.$drop_info[2].'</td>
												<td align="center">
													<ul class="navi nav-pills">
													  <li class="dropdown">
														<a class="dropdown-toggle" data-toggle="dropdown">Options<b class="caret"></b></a>
														<ul class="dropdown-menu">
															<li><a href="#" class="" onclick="votefuncediasdsat('.$drop_info[4].')"><span class="icos-pencil"></span>Edit</a></li>
															<li><a href="#" onclick="votefuncdeasdsal('.$drop_info[4].')"><span class="icos-trash"></span>Delete</a></li>
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
		<?php if($_GET['op3'] == 'MultiAccount_Voting') { ?> <!-- MultiAccount_Voting -->
		<div class="widget">
            <div class="whead"><h6>Multi Account Voter List</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
						<td>Original Account</td>
                        <td>Fake Accounts</td>
						<td>Total Fake Accounts</td>
						<td>Used IP</td>
						<td>Delete All User Accounts</td>
						<td>Ban All User Accounts</td>
                    </tr>
                </thead>
                <tbody id="echotabled">
						<?php
							$sys_startsa = mssql_query("select top 100 memb___id, IP, votes from MVCore_MultiAcc_Voters order by votes desc");
							for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsa);
								
								$accounts_found = explode(',' , $drop_info[0]);
								$num_accs = count($accounts_found);

								echo'
											<tr>
												<td>'.$accounts_found[0].'</td>
												<td><textarea>'.$drop_info[0].'</textarea></td>
												<td>'.$num_accs.'</td>
												<td>'.$drop_info[1].'</td>
												<td align="center" width="360px">
													<a href="#" onclick="votedomaccdelete(\''.$drop_info[1].'\'); return false;" class="buttonM bDefault mb10 mt5">Delete All User Accounts</a>
												</td>
												<td align="center" width="360px">
													<a href="#" onclick="votedomaccban(\''.$drop_info[1].'\'); return false;" class="buttonM bDefault mb10 mt5">Ban All User Accounts ( <b>Recommend</b> )</a>
												</td>
											</tr>
								';
							};
						?>
                </tbody>
            </table>
        </div>
		<?php }; ?>
<script>

	function votedomaccdelete(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				voteDoMultiAccDelete: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
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
	
	function votedomaccban(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				voteDoMultiAccBan: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
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
	
	function votefuncediasdsat(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				votefuncediasdsat: getAllValues
			},
			function(data) {
				var outputData = data.split("-ids-");
				$('#vname').val(outputData[0]);
				$('#rewv').val(outputData[1]);
				$('#vtime').val(outputData[2]);
				$('#urll').val(outputData[3]);
				$('#imgurll').val(outputData[4]);
				$('#idcheck').val(outputData[5]);
				
				$("select").select2({ placeholder: "Choose a option..." });
				
			});
	};
	
	function votefuncdeasdsal(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				votefuncdeasdsal: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data); //error
				
				$('#vname').val("");
				$('#rewv').val("");
				$('#vtime').val("");
				$('#urll').val("");
				$('#imgurll').val("");
				$('#idcheck').val("");
				
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
	$( "#votesett" ).on('change', function() {
		var getAllValues = $("#vote_ipcheck option:selected").val()+"-ids-"
			+$("#reward_sys_vote option:selected").val()+"-ids-"
			+$("#vote_nchar option:selected").val()+"-ids-"
			+$("#vote_chneed_resets").val();
			
			$.post("acps.php", {
				votesett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	$( "#topvotersett" ).on('change', function() {
		var getAllValues = $("#vote_top_of option:selected").val()+"-ids-"
			+$("#vote_top_top option:selected").val()+"-ids-"
			+$("#vote_top_reward").val()+"-ids-"
			+$("#vote_top_int option:selected").val()+"-ids-"
			+$("#vote_top_at option:selected").val();
			$.post("acps.php", {
				topvotersett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	$( "#votebonussett" ).on('change', function() {
		var getAllValues = $("#vote_bonus_io option:selected").val()+"-ids-"
			+$("#vote_rew_bonus").val()+"-ids-"
			+$("#vote_tpday option:selected").val()+"-ids-"
			+$("#vote_rew_long option:selected").val();
			
			$.post("acps.php", {
				votebonussett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	//page2
	$("#votedownlinkm").on('click', function() {
		var getAllValues = $("#vname").val()+"-ids-"
			+$("#rewv").val()+"-ids-"
			+$("#vtime").val()+"-ids-"
			+$("#urll").val()+"-ids-"
			+$("#imgurll").val()+"-ids-"
			+$("#idcheck").val();
			$.post("acps.php", {
				votedownlinkm: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data); //error
				
				$('#vname').val("");
				$('#rewv').val("");
				$('#vtime').val("");
				$('#urll').val("");
				$('#imgurll').val("");
				$('#idcheck').val("");
				
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
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>