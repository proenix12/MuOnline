
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Link_manage') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Downloads_manage-id-Link_manage.html" title=""><span style="height:30px;">Downloads Manage</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['Downloads'] != 'on') { echo '<font color="red"><u><b>Downloads</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
			
		<?php if($_GET['op3'] == 'Link_manage') { ?> <!-- Link_List -->
		<div class="widget">
            <div class="whead"><h6>Download Link Manage</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Category</td>
						<td>URL ( Link )</td>
                        <td>Mirror Name</td>
						<td>File Name</td>
						<td>Options</td>
                    </tr>
                </thead>
                <tbody id="echotabled">
					<tr>
						<td width="250px">
							<input id="idsdown" name="idsdown" type="hidden" value=""> <!-- Hidden ID -->
							<div class="formRow">
								<div class="grid9">
									<select style="width:100%;padding-left:5px;opacity:0.6;" id="catdrop" name="aa" data-placeholder="Choose a option..." class="select" tabindex="2">
										<option value=""></option>
										<option value="1" style="padding-left:5px;">Full Client</option>
										<option value="2" style="padding-left:5px;">No Sound Client</option>
										<option value="3" style="padding-left:5px;">Patch</option>
										<option value="4" style="padding-left:5px;">Utilites</option>
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
								<div class="grid9"><input id="mirrname" name="mirrname" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td>
							<div class="formRow">
								<div class="grid9"><input id="fname" name="fname" type="text" placeholder="" value=""></div>
							</div>
						</td>
						<td align="center">
							<a href="#" id="downlinkm" class="buttonM bDefault mb10 mt5">Add / Save Link</a>
						</td>
					</tr>
						<?php
							$sys_startsa = mssql_query("select top 100 link,name,file_name,add_date,category from MVCore_DWN");
							for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsa);
								
								if($drop_info[4] == '1'){$cat_name = 'Full Client';}
								elseif($drop_info[4] == '2'){$cat_name = 'No Sound Client';}
								elseif($drop_info[4] == '3'){$cat_name = 'Patches';}
								elseif($drop_info[4] == '4'){$cat_name = 'Utilites';};

								echo'
											<tr>
												<td>'.$cat_name.'</td>
												<td>'.$drop_info[0].'</td>
												<td>'.$drop_info[1].'</td>
												<td>'.$drop_info[2].'</td>
												<td align="center">
													<ul class="navi nav-pills">
													  <li class="dropdown">
														<a class="dropdown-toggle" data-toggle="dropdown">Options<b class="caret"></b></a>
														<ul class="dropdown-menu">
															<li><a href="#" class="" onclick="funcediasdsat('.$drop_info[3].')"><span class="icos-pencil"></span>Edit</a></li>
															<li><a href="#" onclick="funcdeasdsal('.$drop_info[3].')"><span class="icos-trash"></span>Delete</a></li>
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
	function funcediasdsat(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				funcediasdsat: getAllValues
			},
			function(data) {
				var outputData = data.split("-ids-");
				$('#idsdown').val(outputData[0]);
				$('#catdrop').val(outputData[1]);
				$('#urll').val(outputData[2]);
				$('#mirrname').val(outputData[3]);
				$('#fname').val(outputData[4]);
				
				$("select").select2({ placeholder: "Choose a option..." });
				
			});
	};
	
	function funcdeasdsal(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				funcdeasdsal: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data); //error
				
				$('#idsdown').val("");
				$('#catdrop').val("");
				$('#urll').val("");
				$('#mirrname').val("");
				$('#fname').val("");
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
		var getAllValues = $("#idsdown").val()+"-ids-"
			+$("#catdrop").val()+"-ids-"
			+$("#urll").val()+"-ids-"
			+$("#mirrname").val()+"-ids-"
			+$("#fname").val();
			$.post("acps.php", {
				downlinkm: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data); //error
				
				$('#idsdown').val("");
				$('#catdrop').val("");
				$('#urll').val("");
				$('#mirrname').val("");
				$('#fname').val("");
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