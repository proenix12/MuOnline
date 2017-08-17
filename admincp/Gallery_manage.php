
<?php if($_SESSION['admin_panel'] == 'ok') { ?>
		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Gallery_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Gallery_manage-id-Gallery_Settings.html" title=""><span style="height:30px;">Gallery Settings</span></a></li>
			<li <?php if($_GET['op3'] == 'gal_upload_manage') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Gallery_manage-id-gal_upload_manage.html" title=""><span style="height:30px;">Gallery Image Manage</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['Gallery'] != 'on') { echo '<font color="red"><u><b>Gallery</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
			
<?php
if(isset($_POST["imgUpDrop"])){
$target_dir = "system/engine_images/gallery/";
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
if ($_FILES["fileToUpload"]["size"] > 15000000) {
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
			$dir = 'system/engine_images/gallery';
			if ($handle = opendir($dir)) {
				while (($file = readdir($handle)) !== false){
					if(is_file(''.$file.'') == true || $file == '.' || $file == '..') {} else {
						$ia++;
					}
				}
			}
	if($ia >= '100') {
		echo '<script>$.jGrowl("Sorry, max 15 images for gallery.", { header: "<font color=red>Error</font>" });</script>';
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo '<script>$.jGrowl("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.", { header: "<font color=green>Success</font>" });</script>';
		} else {
			echo '<script>$.jGrowl("Sorry, there was an error uploading your file.", { header: "<font color=red>Error</font>" });</script>';
		}
	}
}
}
?> 
			
		<?php if($_GET['op3'] == 'Gallery_Settings') { ?> <!-- Gallery_Settings -->
		<div class="widget fluid" id="GalleryImgSettings">
			<div class="whead"><h6>Gallery Settings</h6></div>
					<div class="formRow" id="optfeeww">
						<div class="grid3"><label>Gallery Columns:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="gallery_columns" name="gallery_columns" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['gallery_columns'] == '1') { echo 'selected'; } else { echo ''; }; ?>>1 Column</option>
								<option value="2" <?php if($mvcore['gallery_columns'] == '2') { echo 'selected'; } else { echo ''; }; ?>>2 Columns</option>
								<option value="3" <?php if($mvcore['gallery_columns'] == '3') { echo 'selected'; } else { echo ''; }; ?>>3 Columns</option>
								<option value="4" <?php if($mvcore['gallery_columns'] == '4') { echo 'selected'; } else { echo ''; }; ?>>4 Columns</option>
								<option value="4" <?php if($mvcore['gallery_columns'] == '5') { echo 'selected'; } else { echo ''; }; ?>>5 Columns</option>
							</select>
						</div>					
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Thumbnail Padding:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="gallery_thumb_padding" name="gallery_thumb_padding" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0px" <?php if($mvcore['gallery_thumb_padding'] == '0px') { echo 'selected'; } else { echo ''; }; ?>>0 Pixels</option>
								<option value="5px" <?php if($mvcore['gallery_thumb_padding'] == '5px') { echo 'selected'; } else { echo ''; }; ?>>5 Pixels</option>
								<option value="10px" <?php if($mvcore['gallery_thumb_padding'] == '10px') { echo 'selected'; } else { echo ''; }; ?>>10 Pixels</option>
								<option value="15px" <?php if($mvcore['gallery_thumb_padding'] == '15px') { echo 'selected'; } else { echo ''; }; ?>>15 Pixels</option>
								<option value="20px" <?php if($mvcore['gallery_thumb_padding'] == '20px') { echo 'selected'; } else { echo ''; }; ?>>20 Pixels</option>
								<option value="25px" <?php if($mvcore['gallery_thumb_padding'] == '25px') { echo 'selected'; } else { echo ''; }; ?>>25 Pixels</option>
							</select>
						</div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Thumbnail Width:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="gallery_thumb_width" name="gallery_thumb_width" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="100%" <?php if($mvcore['gallery_thumb_width'] == '100%') { echo 'selected'; } else { echo ''; }; ?>>Original</option>
								<option value="50px" <?php if($mvcore['gallery_thumb_width'] == '50px') { echo 'selected'; } else { echo ''; }; ?>>50 Pixels</option>
								<option value="70px" <?php if($mvcore['gallery_thumb_width'] == '70px') { echo 'selected'; } else { echo ''; }; ?>>70 Pixels</option>
								<option value="80px" <?php if($mvcore['gallery_thumb_width'] == '80px') { echo 'selected'; } else { echo ''; }; ?>>80 Pixels</option>
								<option value="90px" <?php if($mvcore['gallery_thumb_width'] == '90px') { echo 'selected'; } else { echo ''; }; ?>>90 Pixels</option>
								<option value="100px" <?php if($mvcore['gallery_thumb_width'] == '100px') { echo 'selected'; } else { echo ''; }; ?>>100 Pixels</option>
								<option value="120px" <?php if($mvcore['gallery_thumb_width'] == '120px') { echo 'selected'; } else { echo ''; }; ?>>120 Pixels</option>
								<option value="150px" <?php if($mvcore['gallery_thumb_width'] == '150px') { echo 'selected'; } else { echo ''; }; ?>>150 Pixels</option>
							</select>
						</div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Thumbnail Height:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="gallery_thumb_height" name="gallery_thumb_height" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="100%" <?php if($mvcore['gallery_thumb_height'] == '100%') { echo 'selected'; } else { echo ''; }; ?>>Original</option>
								<option value="50px" <?php if($mvcore['gallery_thumb_height'] == '50px') { echo 'selected'; } else { echo ''; }; ?>>50 Pixels</option>
								<option value="70px" <?php if($mvcore['gallery_thumb_height'] == '70px') { echo 'selected'; } else { echo ''; }; ?>>70 Pixels</option>
								<option value="80px" <?php if($mvcore['gallery_thumb_height'] == '80px') { echo 'selected'; } else { echo ''; }; ?>>80 Pixels</option>
								<option value="90px" <?php if($mvcore['gallery_thumb_height'] == '90px') { echo 'selected'; } else { echo ''; }; ?>>90 Pixels</option>
								<option value="100px" <?php if($mvcore['gallery_thumb_height'] == '100px') { echo 'selected'; } else { echo ''; }; ?>>100 Pixels</option>
								<option value="120px" <?php if($mvcore['gallery_thumb_height'] == '120px') { echo 'selected'; } else { echo ''; }; ?>>120 Pixels</option>
								<option value="150px" <?php if($mvcore['gallery_thumb_height'] == '150px') { echo 'selected'; } else { echo ''; }; ?>>150 Pixels</option>
							</select>
						</div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'gal_upload_manage') { ?> <!-- gal_upload_manage -->
		<div class="widget fluid">
			<div class="whead"><h6>Gallery Image Upload & Manage</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Upload Image:</label> </div>
						<div class="grid9">
							<div>
								<form action="" method="post" enctype="multipart/form-data">
									<input  size="24" name="fileToUpload" type="file">
									<button type="submit" name="imgUpDrop" class="buttonM bGreen" style="margin-left:10px;color:#ffffff;">Upload Image</button>
								</form>
							</div>
						</div>
					</div>
					
				<table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Image Preview</td>
						<td>Name</td>
						<td>Thumbnail Dimension</td>
                        <td>Dimension</td>
						<td>Size</td>
						<td>Options</td>
                    </tr>
                </thead>
                <tbody id="echotabled">
								<?php
									$dir = "system/engine_images/gallery";

									if (is_dir($dir)) {
										if ($dh = opendir($dir)) {
											while (($file = readdir($dh)) !== false) {
												if(is_file(''.$file.'') == true || $file == '.' || $file == '..') {} else {
													$data = getimagesize('system/engine_images/gallery/'.$file.'');
													$width = $data[0];
													$height = $data[1];
													$file_size = human_filesize(filesize('system/engine_images/gallery/'.$file.''));

												echo'
															<tr>
																<td align="center" ><img src="system/engine_images/gallery/'.$file.'" width="'.$mvcore['gallery_thumb_width'].'" height="'.$mvcore['gallery_thumb_height'].'"></td>
																<td align="center" >'.$file.'</td>
																<td align="center" >'.$mvcore['gallery_thumb_width'].' / '.$mvcore['gallery_thumb_height'].'</td>
																<td align="center" >'.$width.'x'.$height.'</td>
																<td align="center" >'.$file_size.'</td>
																<td align="center">
																	<a href="#" id="hehImgDelClicked" onclick="imgDeleteGallery(\'system/engine_images/gallery/'.$file.'\'); return false;" class="buttonM bDefault mb10 mt5">Delete Image</a>
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
	function imgDeleteGallery(elmnts) {
		var getAllValues = elmnts;
			$.post("acps.php", {
				imgDeleteGallery: getAllValues
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
	$( "#GalleryImgSettings" ).on('change', function() {
		
			var getAllValues = $("#gallery_columns option:selected").val()+"-ids-"
			+$("#gallery_thumb_padding option:selected").val()+"-ids-"
			+$("#gallery_thumb_width option:selected").val()+"-ids-"
			+$("#gallery_thumb_height option:selected").val();
			
			$.post("acps.php", {
				GalleryImgSettings: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>