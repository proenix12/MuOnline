
<?php if(!$mvcore['Gallery'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Gallery'] == 'on') { ?>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>

<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="system/engine_plugins/fancyapps-fancyBox-18d1712/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="system/engine_plugins/fancyapps-fancyBox-18d1712/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="system/engine_plugins/fancyapps-fancyBox-18d1712/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="system/engine_plugins/fancyapps-fancyBox-18d1712/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="system/engine_plugins/fancyapps-fancyBox-18d1712/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="system/engine_plugins/fancyapps-fancyBox-18d1712/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="system/engine_plugins/fancyapps-fancyBox-18d1712/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<?php
$dir = "system/engine_images/gallery";
$count = 0;
	echo '<div align="center">';
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while (($file = readdir($dh)) !== false) {
				if(is_file(''.$file.'') == true || $file == '.' || $file == '..') {} else {
				$count++;
					$data = getimagesize('system/engine_images/gallery/'.$file.'');
					$width = $data[0];
					$height = $data[1];
					$file_size = human_filesize(filesize('system/engine_images/gallery/'.$file.''));

					echo'<a class="fancybox" rel="group" href="system/engine_images/gallery/'.$file.'"><img src="system/engine_images/gallery/'.$file.'" alt="" width="'.$mvcore['gallery_thumb_width'].'" height="'.$mvcore['gallery_thumb_height'].'" style="padding:'.$mvcore['gallery_thumb_padding'].';" /></a>';
						$ccol1 = $mvcore['gallery_columns'] * 1; if($ccol1 == $count) { echo'<br>'; } else {};
						$ccol2 = $mvcore['gallery_columns'] * 2; if($ccol2 == $count) { echo'<br>'; } else {};
						$ccol3 = $mvcore['gallery_columns'] * 3; if($ccol3 == $count) { echo'<br>'; } else {};
						$ccol4 = $mvcore['gallery_columns'] * 4; if($ccol4 == $count) { echo'<br>'; } else {};
						$ccol5 = $mvcore['gallery_columns'] * 5; if($ccol5 == $count) { echo'<br>'; } else {};
						$ccol6 = $mvcore['gallery_columns'] * 6; if($ccol6 == $count) { echo'<br>'; } else {};
						$ccol7 = $mvcore['gallery_columns'] * 7; if($ccol7 == $count) { echo'<br>'; } else {};
						$ccol8 = $mvcore['gallery_columns'] * 8; if($ccol8 == $count) { echo'<br>'; } else {};
						$ccol9 = $mvcore['gallery_columns'] * 9; if($ccol9 == $count) { echo'<br>'; } else {};
						$ccol10 = $mvcore['gallery_columns'] * 10; if($ccol10 == $count) { echo'<br>'; } else {};
						$ccol11 = $mvcore['gallery_columns'] * 11; if($ccol11 == $count) { echo'<br>'; } else {};
						$ccol12 = $mvcore['gallery_columns'] * 12; if($ccol12 == $count) { echo'<br>'; } else {};
						$ccol13 = $mvcore['gallery_columns'] * 13; if($ccol13 == $count) { echo'<br>'; } else {};
						$ccol14 = $mvcore['gallery_columns'] * 14; if($ccol14 == $count) { echo'<br>'; } else {};
						$ccol15 = $mvcore['gallery_columns'] * 15; if($ccol15 == $count) { echo'<br>'; } else {};
						$ccol16 = $mvcore['gallery_columns'] * 16; if($ccol16 == $count) { echo'<br>'; } else {};
						$ccol17 = $mvcore['gallery_columns'] * 17; if($ccol17 == $count) { echo'<br>'; } else {};
						$ccol18 = $mvcore['gallery_columns'] * 18; if($ccol18 == $count) { echo'<br>'; } else {};
						$ccol19 = $mvcore['gallery_columns'] * 19; if($ccol19 == $count) { echo'<br>'; } else {};
						$ccol20 = $mvcore['gallery_columns'] * 20; if($ccol20 == $count) { echo'<br>'; } else {};
				}
			}
			closedir($dh);
		}
	}
	echo '</div>';
?>
	
<?php } ?>