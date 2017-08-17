   <script type="text/javascript" src="system/engine_js/jssor.slider.mini.js"></script>

    <script>
        jQuery(document).ready(function ($) {


            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
			  $Idle: <?php echo $mvcore['slider_img_interval'];?>,
              $PauseOnHover: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        });
    </script>
	
    <style>
        
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('system/engine_images/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 12 css */
        /*
        .jssora12l                  (normal)
        .jssora12r                  (normal)
        .jssora12l:hover            (normal mouseover)
        .jssora12r:hover            (normal mouseover)
        .jssora12l.jssora12ldn      (mousedown)
        .jssora12r.jssora12rdn      (mousedown)
        */
        .jssora12l, .jssora12r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 30px;
            height: 46px;
            cursor: pointer;
            background: url('system/engine_images/a12.png') no-repeat;
            overflow: hidden;
        }
        .jssora12l { background-position: -16px -37px; }
        .jssora12r { background-position: -75px -37px; }
        .jssora12l:hover { background-position: -136px -37px; }
        .jssora12r:hover { background-position: -195px -37px; }
        .jssora12l.jssora12ldn { background-position: -256px -37px; }
        .jssora12r.jssora12rdn { background-position: -315px -37px; }
    </style>

    <div id="jssor_1" style="position: relative; z-index:999; margin: 0 auto; top: 0px; left: 0px; width: <?php echo $mvcore['slider_width']; ?>; height: <?php echo $mvcore['slider_height']; ?>; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width:100%;"></div>
            <div style="position:absolute;display:block;background:url('system/engine_images/loading.gif') no-repeat center center;top:0px;left:0px; width:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: <?php echo $mvcore['slider_width']; ?>; height: <?php echo $mvcore['slider_height']; ?>; overflow: hidden;">

<?php
	if($mvcore['slider_img_main'] != '001'){
		echo'<div data-p="112.50" style="display: none;">';
			echo'<img data-u="image" src="system/engine_images/uploaded/'.$mvcore['slider_img_main'].'" style="width: '.$mvcore['slider_width'].'; height: '.$mvcore['slider_height'].';" />';
		echo'</div>';
	};

	$dir = "system/engine_images/uploaded";
	$i = 0;
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while (($file = readdir($dh)) !== false) {
				if(is_file(''.$file.'') == true || $file == '.' || $file == '..') {} else {
						if($mvcore['slider_img_main'] == $file) { } else {
							echo'<div data-p="112.50" style="display: none;">';
								echo'<img data-u="image" src="system/engine_images/uploaded/'.$file.'" style="width: '.$mvcore['slider_width'].'; height: '.$mvcore['slider_height'].';" />';
							echo'</div>';
						}
					$i++;
				}
			}
			closedir($dh);
		}
	}
	
?>

        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:6px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
    </div>