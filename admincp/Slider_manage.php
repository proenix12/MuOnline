
<?php if($_SESSION['admin_panel'] == 'ok') { ?>
		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Slider_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Slider_manage-id-Slider_Settings.html" title=""><span style="height:30px;">Slider Settings</span></a></li>
			<li <?php if($_GET['op3'] == 'Image_upload_manage') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Slider_manage-id-Image_upload_manage.html" title=""><span style="height:30px;">Image Manage</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
			
<?php
if(isset($_POST["imgUpDrop"])){
$target_dir = "system/engine_images/uploaded/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo '<script>$.jGrowl("File is not an image.", { header: "<font color=red>Error</font>" });</script>';
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo '<script>$.jGrowl("Sorry, file already exists.", { header: "<font color=red>Error</font>" });</script>';
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo '<script>$.jGrowl("Sorry, your file is too large.", { header: "<font color=red>Error</font>" });</script>';
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo '<script>$.jGrowl("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", { header: "<font color=red>Error</font>" });</script>';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<script>$.jGrowl("Sorry, your file was not uploaded.", { header: "<font color=red>Error</font>" });</script>';
// if everything is ok, try to upload file
} else {
	
			$ia = 0; 
			$dir = 'system/engine_images/uploaded';
			if ($handle = opendir($dir)) {
				while (($file = readdir($handle)) !== false){
					if(is_file(''.$file.'') == true || $file == '.' || $file == '..') {} else {
						$ia++;
					}
				}
			}
	if($ia >= '15') {
		echo '<script>$.jGrowl("Sorry, max 15 images for slider.", { header: "<font color=red>Error</font>" });</script>';
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo '<script>$.jGrowl("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.", { header: "<font color=green>Success</font>" });</script>';
			
				// integer starts at 0 before counting
				$i = 0; 
				$dir = 'system/engine_images/uploaded';
				if ($handle = opendir($dir)) {
					while (($file = readdir($handle)) !== false){
						if(is_file(''.$file.'') == true || $file == '.' || $file == '..') {} else {
							$i++;
						}
					}
				}

				if($has_error >= '1'){} else {
					$new_db = fopen("system/engine_configs".$db_name_multi."/slider_img_count.php", "w");
					$data = "<?php\n";
					$data .="\$mvcore['slider_img_count'] = \"".$i."\";\n";
					$data .="?>";
					fwrite($new_db,$data); fclose($new_db); chmod("system/engine_configs".$db_name_multi."/slider_img_count.php", 0777);
				}

		} else {
			echo '<script>$.jGrowl("Sorry, there was an error uploading your file.", { header: "<font color=red>Error</font>" });</script>';
		}
	}
}
}
?> 
			
		<?php if($_GET['op3'] == 'Slider_Settings') { ?> <!-- Table_manage -->
		<div class="widget fluid" id="sliderImgSettings">
			<div class="whead"><h6>Slider Settings ( <b>IF Theme Supports</b> )</h6></div>
					<div class="formRow" id="optfeeww">
						<div class="grid3"><label>Main Image:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="slider_img_main" name="slider_img_main" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="001" <?php if($mvcore['slider_img_main'] == '001') { echo 'selected'; } else { echo ''; }; ?>> - OPT DISABLED - </option>
								<?php
									$dir = "system/engine_images/uploaded";

									if (is_dir($dir)) {
										if ($dh = opendir($dir)) {
											while (($file = readdir($dh)) !== false) {
												if(is_file(''.$file.'') == true || $file == '.' || $file == '..') {} else {
													if($mvcore['slider_img_main'] == $file) { $optisDs = 'selected'; } else { $optisDs = ''; };
												echo'<option value="'.$file.'" '.$optisDs.'>'.$file.'</option>';
												}
											}
											closedir($dh);
										}
									}
								?>
							</select>
						</div>					
					</div>
					<div class="formRow" id="optfeeww">
						<div class="grid3"><label>Image Interval:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="slider_img_interval" name="slider_img_interval" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1000" <?php if($mvcore['slider_img_interval'] == '1000') { echo 'selected'; } else { echo ''; }; ?>>1 Seconds</option>
								<option value="2000" <?php if($mvcore['slider_img_interval'] == '2000') { echo 'selected'; } else { echo ''; }; ?>>2 Seconds</option>
								<option value="3000" <?php if($mvcore['slider_img_interval'] == '3000') { echo 'selected'; } else { echo ''; }; ?>>3 Seconds</option>
								<option value="4000" <?php if($mvcore['slider_img_interval'] == '4000') { echo 'selected'; } else { echo ''; }; ?>>4 Seconds</option>
								<option value="5000" <?php if($mvcore['slider_img_interval'] == '5000') { echo 'selected'; } else { echo ''; }; ?>>5 Seconds</option>
								<option value="10000" <?php if($mvcore['slider_img_interval'] == '10000') { echo 'selected'; } else { echo ''; }; ?>>10 Seconds</option>
								<option value="1500000" <?php if($mvcore['slider_img_interval'] == '1500000') { echo 'selected'; } else { echo ''; }; ?>>OFF Interval</option>
							</select>
						</div>					
					</div>
					<div class="formRow" id="dssadqwqwq">
						<div class="grid3"><label>Slider Width Pixels:</label></div>
						<div class="grid9"><input id="slider_width" name="slider_width" type="text" value="<?php echo $mvcore['slider_width']; ?>"></div> 						
					</div>
					<div class="formRow" id="dssawdsdqqwq">
						<div class="grid3"><label>Slider Height Pixels:</label></div>
						<div class="grid9"><input id="slider_height" name="slider_height" type="text" value="<?php echo $mvcore['slider_height']; ?>"></div>						
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Image_upload_manage') { ?> <!-- Input_manage -->
		<div class="widget fluid" id="onChsubaccfisreefwae">
			<div class="whead"><h6>Image Upload & Manage ( <b>IF Theme Supports</b> )</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Upload Image:</label> </div>
						<div class="grid9">
							<div>
								<form action="" method="post" enctype="multipart/form-data">
									<input size="24" class="styled" name="fileToUpload" type="file">
									<button type="submit" name="imgUpDrop" class="buttonM bGreen" style="margin-left:10px;color:#ffffff;" >Upload Image</button>
								</form>
							</div>
						</div>
					</div>
					
				<table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Image Preview</td>
						<td>Name</td>
                        <td>Dimension</td>
						<td>Size</td>
						<td>Options</td>
                    </tr>
                </thead>
                <tbody id="echotabled">
								<?php
									$dir = "system/engine_images/uploaded";

									if (is_dir($dir)) {
										if ($dh = opendir($dir)) {
											while (($file = readdir($dh)) !== false) {
												if(is_file(''.$file.'') == true || $file == '.' || $file == '..') {} else {
													$data = getimagesize('system/engine_images/uploaded/'.$file.'');
													$width = $data[0];
													$height = $data[1];
													$file_size = human_filesize(filesize('system/engine_images/uploaded/'.$file.''));
													
													if($width > '800') { $imgwidh = 'width="500px"'; } else { $imgwidh = ''; };
														
												echo'
															<tr>
																<td align="center" ><img src="system/engine_images/uploaded/'.$file.'" '.$imgwidh.'></td>
																<td align="center" >'.$file.'</td>
																<td align="center" >'.$width.'x'.$height.'</td>
																<td align="center" >'.$file_size.'</td>
																<td align="center">
																	<a href="#" id="hehImgDelClicked" onclick="imgDeleteslider(\'system/engine_images/uploaded/'.$file.'\'); return false;" class="buttonM bDefault mb10 mt5">Delete Image</a>
																</td>
															</tr>
												';
								
												}
											}
											closedir($dh);
										}
									}
								?>
                </tbody>
            </table>
		</div>
		<?php }; ?>
<script>
	function imgDeleteslider(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				imgDeleteslider: getAllValues
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
$(document).ready(function() {
	$( "#sliderImgSettings" ).on('change', function() {
		
			var getAllValues = $("#slider_img_main option:selected").val()+"-ids-"
			+$("#slider_img_interval option:selected").val()+"-ids-"
			+$("#slider_width").val()+"-ids-"
			+$("#slider_height").val();
			
			$.post("acps.php", {
				sliderImgSettings: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>