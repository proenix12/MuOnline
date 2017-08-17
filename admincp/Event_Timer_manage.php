
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Timer_manage') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Event_Timer_manage-id-Timer_manage.html" title=""><span style="height:30px;">Event Timer Manage</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['Downloads'] != 'on') { echo '<font color="red"><u><b>Downloads</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
			
		<?php if($_GET['op3'] == 'Timer_manage') { ?> <!-- Link_List -->
		<div class="widget">
            <div class="whead"><h6>Event Timer Manage ( <b>Runs Always After Specific Time ( Start Date Used To Setup Interval Start Point )</b> )</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Event Name</td>
						<td>Start Date ( Month/Day/Year Hour:Minute )</td>
						<td>Interval ( As Minutes )</td>
						<td>Event Minutes ( How Long Event Runs )</td>
						<td>Event Reward Info</td>
						<td>Options</td>
                    </tr>
                </thead>
                <tbody id="echotabled">
					<tr>
						<td><input id="et_hidden" name="et_hidden" type="hidden" value=""><input id="et_date" name="et_date" type="hidden" value="">
							<div class="formRow">
								<div class="grid9"><input id="et_event_name" name="et_event_name" type="text" placeholder="Ex: Blood Castle" value=""></div>
							</div>
						</td>
						<td style="width:220px;">
							<div class="formRow">
								<div class="grid9"><input id="et_event_start_date" name="et_event_start_date" type="text" placeholder="Ex: 03/22/2016 23:21" value=""></div>
							</div>
						</td>
						<td style="width:180px;">
							<div class="formRow">
								<div class="grid9"><input id="et_interval" name="et_interval" type="text" placeholder="Ex: 720" value=""></div>
							</div>
						</td>
						<td style="width:250px;">
							<div class="formRow">
								<div class="grid9"><input id="et_event_min" name="et_event_min" type="text" placeholder="Ex: 5" value=""></div>
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="et_reward_info" name="et_reward_info" type="text" placeholder="Ex: Reward is random yewel" value=""></div>
							</div>
						</td>
						<td align="center">
							<a href="#" id="downlinkm" class="buttonM bDefault mb10 mt5">Add / Save</a>
						</td>
					</tr>
						<?php
							$sys_startsa = mssql_query("select top 100 event_name, event_hour, event_min, event_interval, event_run_time, event_reward_info, type, date, event_start_date from MVCore_Event_Timer where type = '1' order by date desc");
							for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsa);
								
								echo'
											<tr>
												<td>'.$drop_info[0].'</td>
												<td>'.$drop_info[8].'</td>
												<td>'.$drop_info[3].'</td>
												<td>'.$drop_info[4].'</td>
												<td>'.$drop_info[5].'</td>
												<td align="center">
													<ul class="navi nav-pills">
													  <li class="dropdown">
														<a class="dropdown-toggle" data-toggle="dropdown">Options<b class="caret"></b></a>
														<ul class="dropdown-menu">
															<li><a href="#" class="" onclick="rtfuncediasdsat('.$drop_info[7].')"><span class="icos-pencil"></span>Edit</a></li>
															<li><a href="#" onclick="rtsfuncdeasdsal('.$drop_info[7].')"><span class="icos-trash"></span>Delete</a></li>
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
		<div class="widget">
            <div class="whead"><h6>Event Timer Manage ( <b>With Static Hours & Minutes</b> )</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Event Name</td>
						<td>Starting Hour ( 24 Hours )</td>
						<td>Starting Minute</td>
						<td>Event Minutes ( How Long Event Runs )</td>
						<td>Event Reward Info</td>
						<td>Options</td>
                    </tr>
                </thead>
                <tbody id="echotabled">
					<tr>
						<td><input id="ett_hidden" name="ett_hidden" type="hidden" value=""><input id="ett_date" name="ett_date" type="hidden" value="">
							<div class="formRow">
								<div class="grid9"><input id="ett_event_name" name="ett_event_name" type="text" placeholder="Ex: Devil Squere" value=""></div>
							</div>
						</td>
						<td style="width:180px;">
							<div class="formRow">
								<div class="grid9"><input id="ett_event_start_hour" name="ett_event_start_hour" type="text" placeholder="Ex: 22" value=""></div>
							</div>
						</td>
						<td style="width:180px;">
							<div class="formRow">
								<div class="grid9"><input id="ett_event_start_min" name="ett_event_start_min" type="text" placeholder="Ex: 45" value=""></div>
							</div>
						</td>
						<td style="width:260px;">
							<div class="formRow">
								<div class="grid9"><input id="ett_event_min" name="ett_event_min" type="text" placeholder="Ex: 5" value=""></div>
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="ett_reward_info" name="ett_reward_info" type="text" placeholder="Ex: Reward is random yewel" value=""></div>
							</div>
						</td>
						<td align="center">
							<a href="#" id="timerlinksub" class="buttonM bDefault mb10 mt5">Add / Save</a>
						</td>
					</tr>
						<?php
							$sys_startsa = mssql_query("select top 100 event_name, event_hour, event_min, event_interval, event_run_time, event_reward_info, type, date, event_start_date from MVCore_Event_Timer where type = '2' order by date desc");
							for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsa);
								
								echo'
											<tr>
												<td>'.$drop_info[0].'</td>
												<td>'.$drop_info[1].'</td>
												<td>'.$drop_info[2].'</td>
												<td>'.$drop_info[4].'</td>
												<td>'.$drop_info[5].'</td>
												<td align="center">
													<ul class="navi nav-pills">
													  <li class="dropdown">
														<a class="dropdown-toggle" data-toggle="dropdown">Options<b class="caret"></b></a>
														<ul class="dropdown-menu">
															<li><a href="#" class="" onclick="timerfuncediasdsat('.$drop_info[7].')"><span class="icos-pencil"></span>Edit</a></li>
															<li><a href="#" onclick="timerfuncdeasdsal('.$drop_info[7].')"><span class="icos-trash"></span>Delete</a></li>
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
<script>
	function rtfuncediasdsat(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				rtfuncediasdsat: getAllValues
			},
			function(data) {
				var outputData = data.split("-ids-");
				$('#et_event_name').val(outputData[0]);
				$('#et_interval').val(outputData[1]);
				$('#et_event_min').val(outputData[2]);
				$('#et_reward_info').val(outputData[3]);
				$('#et_hidden').val(outputData[4]);
				$('#et_date').val(outputData[5]);
				$('#et_event_start_date').val(outputData[6]);
				$("select").select2({ placeholder: "Choose a option..." });
				
			});
	};
	
	function rtsfuncdeasdsal(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				rtsfuncdeasdsal: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data); //error
				
				$('#et_event_name').val("");
				$('#et_interval').val("");
				$('#et_event_min').val("");
				$('#et_reward_info').val("");
				$('#et_hidden').val("");
				$('#et_event_start_date').val("");
				$("select").select2({ placeholder: "Choose a option..." });
				
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
	$("#downlinkm").on('click', function() {
		var getAllValues = $("#et_event_name").val()+"-ids-"
			+$("#et_interval").val()+"-ids-"
			+$("#et_event_min").val()+"-ids-"
			+$("#et_reward_info").val()+"-ids-"
			+$("#et_hidden").val()+"-ids-"
			+$("#et_date").val()+"-ids-"
			+$("#et_event_start_date").val();
			$.post("acps.php", {
				etierdownlinkm: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data); //error
				
				$('#et_event_name').val("");
				$('#et_interval').val("");
				$('#et_event_min').val("");
				$('#et_reward_info').val("");
				$('#et_hidden').val("");
				$('#et_event_start_date').val("");
				$("select").select2({ placeholder: "Choose a option..." });
				
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

//-----------------------------------------------------------------------------------------------------------

	function timerfuncediasdsat(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				timerfuncediasdsat: getAllValues
			},
			function(data) {
				var outputData = data.split("-ids-");
				$('#ett_event_name').val(outputData[0]);
				$('#ett_event_start_hour').val(outputData[1]);
				$('#ett_event_start_min').val(outputData[2]);
				$('#ett_event_min').val(outputData[3]);
				$('#ett_reward_info').val(outputData[4]);
				$('#ett_hidden').val(outputData[5]);
				$('#ett_date').val(outputData[6]);
				$("select").select2({ placeholder: "Choose a option..." });
				
			});
	};
	
	function timerfuncdeasdsal(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				timerfuncdeasdsal: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data); //error
				
				$('#ett_event_name').val("");
				$('#ett_event_start_hour').val("");
				$('#ett_event_start_min').val("");
				$('#ett_event_min').val("");
				$('#ett_reward_info').val("");
				$('#ett_hidden').val("");
				$("select").select2({ placeholder: "Choose a option..." });
				
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
	$("#timerlinksub").on('click', function() {
		var getAllValues = $("#ett_event_name").val()+"-ids-"
			+$("#ett_event_start_hour").val()+"-ids-"
			+$("#ett_event_start_min").val()+"-ids-"
			+$("#ett_event_min").val()+"-ids-"
			+$("#ett_reward_info").val()+"-ids-"
			+$("#ett_hidden").val()+"-ids-"
			+$("#ett_date").val();
			$.post("acps.php", {
				timerlinksub: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data); //error
				
				$('#ett_event_name').val("");
				$('#ett_event_start_hour').val("");
				$('#ett_event_start_min').val("");
				$('#ett_event_min').val("");
				$('#ett_reward_info').val("");
				$('#ett_hidden').val("");
				$("select").select2({ placeholder: "Choose a option..." });
				
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