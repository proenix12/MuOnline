
<?php if($_SESSION['admin_panel'] == 'ok') { ?>
		
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Add_Remove_News') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-News_manage-id-Add_Remove_News.html" title=""><span style="height:30px;">News Settings / Add</span></a></li>
			<li <?php if($_GET['op3'] == 'News_list') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-News_manage-id-News_list.html" title=""><span style="height:30px;">News List</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['News'] != 'on') { echo '<font color="red"><u><b>News</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
			
		<?php if($_GET['op3'] == 'Add_Remove_News') { ?> <!-- Add_Remove_News -->
		<div class="widget fluid" id="onCqwdhsubDBSett">
			<div class="whead"><h6>News Settings</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>News Per Page:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="news_ppage" name="news_ppage" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="5" <?php if( $mvcore['news_ppage'] == '5') { echo 'selected'; } else { echo ''; }; ?>>5 Par Page</option> 
								<option value="10" <?php if( $mvcore['news_ppage'] == '10') { echo 'selected'; } else { echo ''; }; ?>>10 Par Page</option> 
								<option value="15" <?php if( $mvcore['news_ppage'] == '15') { echo 'selected'; } else { echo ''; }; ?>>15 Par Page</option> 
								<option value="20" <?php if( $mvcore['news_ppage'] == '20') { echo 'selected'; } else { echo ''; }; ?>>20 Par Page</option> 
								<option value="25" <?php if( $mvcore['news_ppage'] == '25') { echo 'selected'; } else { echo ''; }; ?>>25 Par Page</option> 
								<option value="30" <?php if( $mvcore['news_ppage'] == '30') { echo 'selected'; } else { echo ''; }; ?>>30 Par Page</option> 
							</select>
						</div> 
                    </div>
		</div>
		<script type="text/javascript">
			tinymce.init({
				selector: "#textareas",
				menubar: false,
				theme: "modern",
				plugins: [
					"advlist autolink lists link image preview hr anchor pagebreak",
					"wordcount code",
					"media",
					"emoticons template textcolor colorpicker textpattern imagetools"
				],
				toolbar1: "bold italic underline | forecolor backcolor | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | media | emoticons | preview",
				image_advtab: true,
				templates: [
					{title: 'Test template 1', content: 'Test 1'}
				]
			});
		</script>
		<div class="widget" style="opacity:0.8;">
					<div class="formRow">
                        <div class="grid3"><label>News Title ( <b>Leave Empty To Hide Title</b> ):</label></div>
                        <div class="grid9"><input id="userna" name="title" type="text" value=""></div>
                    </div>
					<textarea name="content" id="textareas" style="height:400px;"></textarea>
		</div>
		<div class="formRow" style="margin-right:30px;">
			<a href="#" onclick="newitnews(<?php echo''.time().'';?>)" class="buttonM bGreen" style="height:20px;padding-top:15px;text-align:center;margin-top:20px;margin-bottom:20px;font-size:12px;width:100%;float:left;color:#ffffff;">Click To Add News</a>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'News_list') { ?> <!-- News_list -->
		<div class="widget">
            <div class="whead"><h6>News List</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Title</td>
						<td>Post Date</td>
						<td>Options</td>
                    </tr>
                </thead>
                <tbody>
					<?php
					$dir = "system/engine_ndb".$db_name_multi_news."";
					chdir($dir);
					array_multisort(array_map('basename', ($files = glob("*.*"))), SORT_DESC, $files);
							foreach($files as $filename){
									if($filename == '.' || $filename == '..' || $filename == 'index.php') {} else {
										
										$readfiledata = file_get_contents(''.$filename.'');
										$NEWS_DATA = explode("-ids-", $readfiledata);
										$stipName = str_replace(".txt","",$filename);
											
										echo'
													<tr>
														<td>'.$NEWS_DATA[0].'</td>
														<td>'.date("F j, Y, g:i a",$stipName).'</td>
														<td align="center">
															<ul class="navi nav-pills">
															  <li class="dropdown">
																<a class="dropdown-toggle" data-toggle="dropdown">Options<b class="caret"></b></a>
																<ul class="dropdown-menu">
																	<li><a href="#" class="" onclick="shfunsac('.$stipName.')"><span class="icos-pencil"></span><div id="shtextmm'.$stipName.'">Edit</div></a></li>
																	<li><a href="#" onclick="delnewsDas('.$stipName.')"><span class="icos-trash"></span>Delete</a></li>
																</ul>
															  </li>
															</ul> 
														</td>
													</tr>
														<tr>
															<td colspan="4" id="hidenscOde'.$stipName.'" style="display:none;">
																<div class="widget" style="margin-top:2px;opacity:0.8;">
																			<div class="formRow">
																				<div class="grid3"><label>News Edit Title ( <b>Leave Empty To Hide Title</b> ):</label></div>
																				<div class="grid9"><input id="userna'.$stipName.'" name="ntitle" type="text" value="'.html_entity_decode($NEWS_DATA[0]).'"></div>
																			</div>
																			<textarea name="content" id="textareas'.$stipName.'" style="height:400px;">'.html_entity_decode($NEWS_DATA[1]).'</textarea>
																			<a href="#" onclick="saveeditnews('.$stipName.')" class="buttonM bGreen" style="margin-top:5px;float:right;color:#ffffff;">SAVE NEWS !</a>
																</div>
															</td>
														</tr>
														<script type="text/javascript">
															tinymce.init({
																selector: "#textareas'.$stipName.'",
																menubar: false,
																theme: "modern",
																plugins: [
																	"advlist autolink lists link image preview hr anchor pagebreak",
																	"wordcount code",
																	"media",
																	"emoticons template textcolor colorpicker textpattern imagetools"
																],
																toolbar1: "bold italic underline | forecolor backcolor | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | media | emoticons | preview",
																image_advtab: true,
																templates: [
																	{title: "Test template 1", content: "Test 1"}
																]
															});
														</script>
										';
									}
						
							}
					?>
                </tbody>
            </table>
        </div>
		<?php }; ?>
<script> 
function shfunsac(elmnts) {
	if($("#shtextmm" + elmnts).html() == 'Hide Edit') {
		$("#hidenscOde" + elmnts).fadeOut(1000);
		$("#shtextmm" + elmnts).html("Edit");
	} else {
		$("#hidenscOde" + elmnts).fadeIn(1000);
		$("#shtextmm" + elmnts).html("Hide Edit");
	};
};

function delnewsDas(elmnts) {
	$.post("acps.php", {
		delnewsDas: elmnts
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

function saveeditnews(elmnts) {
	var getAllValues = $("#userna" + elmnts).val()+"-ids-"
		+tinyMCE.get("textareas" + elmnts).getContent()+"-ids-"+ elmnts;
			$.post("acps.php", {
				rehh3reerherasch: getAllValues
			},
			function(data) {
				
				$("#hidenscOde" + elmnts).fadeOut(1000);
				$("#shtextmm" + elmnts).html("Edit");
	
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
function newitnews(elmnts) {
		var getAllValues = $("#userna").val()+"-ids-"
			+tinyMCE.activeEditor.getContent()+"-ids-"+ elmnts;
			$.post("acps.php", {
				rehh3reerherh: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
				$("#userna").val('');
				tinyMCE.activeEditor.setContent('');
			});
};
$(document).ready(function() {
	
	//save pages
	$( "#news_ppage" ).on('change', function() {
		
		var getAllValues = $("#news_ppage").val();
		
			$.post("acps.php", {
				onCqwdhsubDBSett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>