<?php 
function mvcore_error($error_title, $error_msg) {
	die('
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="MVCore, Mu Online, Mu, Game, Online, Server, Play, For, Free" />
<meta name="description" content="MuOnline Private Server" />
<link rel="shortcut icon" href="system/engine_images/favi.png" /> <!-- MVCore ICO -->

<title>MVCore System Error Page</title>
	
	<link rel="stylesheet" href="admincp/theme/css/css1.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css2.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css3.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css4.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css5.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css6.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css7.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css8.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css9.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css10.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css11.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css12.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css13.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css14.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/stylesJS.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/main.css" type="text/css" />
	<?php include(system/theme_inc/inc.item_viewer.php); ?> <!-- Item View JS, ( Location: Body Top ) -->
	<?php include(system/engine_css/mvcore_style.php); ?> <!-- Engine CSS -->

	<style>
		@charset utf-8;
		@import "validation.css";
		@import "notice.css";
		@import "ui.css";
		
		.sideright{
			background: #444;
			position:absolute;
			margin-left:100px;
			margin-top:55px;
			width:227px;
			height: auto !important;
			z-index:1;
		}
		.contentIN {
			z-index:30;
			margin-right:30px;
			margin-left:30px;
			margin-top:126px;
		}

		.contentINTop {
			position:fixed;
			z-index:60;
			min-width:100%;
			margin-left:0px;
			margin-top:1px;
		}
	</style>
	
<script src="admincp/theme/js/css_browser_selector.js" type="text/javascript"></script>

<script type="text/javascript" src="admincp/theme/js/jquery.min.js"></script> 
<script type="text/javascript" src="admincp/theme/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/excanvas.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.sortable.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.resizable.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.autosize.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.inputlimiter.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.autotab.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.select2.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.dualListBox.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.cleditor.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.ibutton.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.plupload.queue.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.form.wizard.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.form.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.progress.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.colorpicker.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.fancybox.js"></script>
</head>
<body>
<div class="content">
	<div class="contentINTop">
		<div class="contentTop" style="margin-left:0px;">
			<div style="font-size:30px;padding-top:20px;"><font color="red">Error, '.$error_title.'</font> <span style="padding-left:80px;font-size:15px;color:#666;">'.date('Y-m-d H:i e').'</span> </div>
		</div>
		
		<!-- Breadcrumbs line -->
		<div class="breadLine" style="margin-left:-93px;">
			<div class="bc" style="float:right;color:black;margin-top:3px;padding-right:30px;">
				Errors like this are saved in website log folder.
			</div>
		</div>
	</div>
	<div class="contentIN">
				<div class="widget">
           
                    <div class="body">
                        '.$error_msg.'
                    </div>
                </div>
				<div class="invList fluid">
					<a href="" onclick="reloadthisPage();" class="buttonS bGreen grid1" style="color:#ffffff;width:130px !important;float:right;">RELOAD</a>
				</div>
		<div style="height:20px;"></div>
	</div>
</div>
<script type="text/javascript" src="admincp/theme/js/jquery.fileTree.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.sourcerer.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.easytabs.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/bootstrap.js"></script>
<script type="text/javascript" src="admincp/theme/js/functions.js"></script>
<script type="text/javascript" src="admincp/theme/js/chart.js"></script>
<script type="text/javascript" src="admincp/theme/js/hBar_side.js"></script>

</body>
</html>
<script>
	function reloadthisPage() {
		history.go(0); location.reload();
	};
</script>
	');
}
?>