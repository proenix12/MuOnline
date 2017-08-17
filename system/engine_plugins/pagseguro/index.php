<?php
session_start(); 
ob_start();
require_once('_config.php');
require_once('util.php');
?>
<?php
	include('../../../system/engine_configs'.$mvcore['db_name'].'/main_engine_settings.php');

if (!file_exists('../../../themes/'.$mvcore['theme_dir'].'/MvCoreStyling/button_styling.php')) { // Checking If Exists
	require('../../../system/engine_configs'.$mvcore['db_name'].'/styling/button_styling.php'); // Default
} else {
	require('../../../themes/'.$mvcore['theme_dir'].'/MvCoreStyling/button_styling.php'); // Uniqe For Each Theme
};

if (!file_exists('../../../themes/'.$mvcore['theme_dir'].'/MvCoreStyling/input_select_styling.php')) { // Checking If Exists
	require('../../../system/engine_configs'.$mvcore['db_name'].'/styling/input_select_styling.php'); // Default
} else {
	require('../../../themes/'.$mvcore['theme_dir'].'/MvCoreStyling/input_select_styling.php'); // Uniqe For Each Theme
};

if (!file_exists('../../../themes/'.$mvcore['theme_dir'].'/MvCoreStyling/table_styling.php')) { // Checking If Exists
	require('../../../system/engine_configs'.$mvcore['db_name'].'/styling/table_styling.php'); // Default
} else {
	require('../../../themes/'.$mvcore['theme_dir'].'/MvCoreStyling/table_styling.php'); // Uniqe For Each Theme
};

?>

<style>
.mvcore-input-main {
	background: <?php echo''.$mvcore['inpSelect_bg_transColor'].'';?> !important;
	border:<?php echo''.$mvcore['inpSelec_s_bsizes'].'';?>px solid <?php echo''.$mvcore['inpSelec_s_borcolor'].'';?> !important;
	-webkit-border-radius: <?php echo''.$mvcore['inpSelec_s_bradius'].'';?>px !important;
	-moz-border-radius: <?php echo''.$mvcore['inpSelec_s_bradius'].'';?>px !important;
	border-radius: <?php echo''.$mvcore['inpSelec_s_bradius'].'';?>px !important;
	margin:4px !important;
	display:inline-block;
	cursor:pointer;
	font-family:<?php echo''.$mvcore['inpSelec_s_textfontf'].'';?> ;
	font-size:<?php echo''.$mvcore['inpSelec_s_textsize'].'';?> ;
	color: <?php echo''.$mvcore['inpSelec_s_textcolor'].'';?>;
	padding:8px !important;
	width: <?php $calcIs = $mvcore['inpSelec_s_hsize'] - 18; echo''.$calcIs.'';?>px !important;
	height: <?php echo''.$mvcore['inpSelec_s_vsize'].'';?>px !important;
	-webkit-width: <?php $calcIs = $mvcore['inpSelec_s_hsize'] - 18; echo''.$calcIs.'';?>px !important;
	-webkit-height: <?php echo''.$mvcore['inpSelec_s_vsize'].'';?>px !important;
	-moz-width: <?php $calcIs = $mvcore['inpSelec_s_hsize'] - 18; echo''.$calcIs.'';?>px !important;
	-moz-height: <?php echo''.$mvcore['inpSelec_s_vsize'].'';?>px !important;
}

.mvcore-input-main:focus {
	border:<?php echo''.$mvcore['inpSelec_s_bsizes'].'';?>px solid <?php echo''.$mvcore['inpSelec_s_borcolor'].'';?>;
	background: <?php echo''.$mvcore['inpSelect_bg_transHoverColor'].'';?>;
	color: <?php echo''.$mvcore['inpSelec_s_textcoloractiv'].'';?>;
}

.mvcore-select-main {
	background: <?php echo''.$mvcore['inpSelect_bg_transColor'].'';?> !important;
	border:<?php echo''.$mvcore['inpSelec_s_bsizes'].'';?>px solid <?php echo''.$mvcore['inpSelec_s_borcolor'].'';?> !important;
	-webkit-border-radius: <?php echo''.$mvcore['inpSelec_s_bradius'].'';?>px !important;
	-moz-border-radius: <?php echo''.$mvcore['inpSelec_s_bradius'].'';?>px !important;
	border-radius: <?php echo''.$mvcore['inpSelec_s_bradius'].'';?>px !important;
	margin:4px !important;
	cursor:pointer;
	font-family:<?php echo''.$mvcore['inpSelec_s_textfontf'].'';?> ;
	font-size:<?php echo''.$mvcore['inpSelec_s_textsize'].'';?>;
	color: <?php echo''.$mvcore['inpSelec_s_textcolor'].'';?>;
	padding:5px;
	width: <?php echo''.$mvcore['inpSelec_s_hsize'].'';?>px !important;
	height: <?php $calcIs = $mvcore['inpSelec_s_vsize'] + 18; echo''.$calcIs.'';?>px !important;
	-webkit-width: <?php echo''.$mvcore['inpSelec_s_hsize'].'';?>px !important;
	-webkit-height: <?php $calcIs = $mvcore['inpSelec_s_vsize'] + 18; echo''.$calcIs.'';?>px !important;
	-moz-width: <?php echo''.$mvcore['inpSelec_s_hsize'].'';?>px !important;
	-moz-height: <?php $calcIs = $mvcore['inpSelec_s_vsize'] + 18; echo''.$calcIs.'';?>px !important;
}

.mvcore-select-main option {
	background-color: <?php echo''.$mvcore['inpSelec_s_bgcoloractiv'].'';?>;
}

.mvcore-select-main:focus {
	border:<?php echo''.$mvcore['inpSelec_s_bsizes'].'';?>px solid <?php echo''.$mvcore['inpSelec_s_borcolor'].'';?>;
	background: <?php echo''.$mvcore['inpSelect_bg_transHoverColor'].'';?>;
	color: <?php echo''.$mvcore['inpSelec_s_textcoloractiv'].'';?>;
}

/* =========================================================================== */
/* Button Style */

.mvcore-button-style {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, <?php echo''.$mvcore['button_s_bgtcolor'].'';?>), color-stop(1, <?php echo''.$mvcore['button_s_bgbcolor'].'';?>));
	background:-moz-linear-gradient(top, <?php echo''.$mvcore['button_s_bgtcolor'].'';?> 5%, <?php echo''.$mvcore['button_s_bgbcolor'].'';?> 100%);
	background:-webkit-linear-gradient(top, <?php echo''.$mvcore['button_s_bgtcolor'].'';?> 5%, <?php echo''.$mvcore['button_s_bgbcolor'].'';?> 100%);
	background:-o-linear-gradient(top, <?php echo''.$mvcore['button_s_bgtcolor'].'';?> 5%, <?php echo''.$mvcore['button_s_bgbcolor'].'';?> 100%);
	background:-ms-linear-gradient(top, <?php echo''.$mvcore['button_s_bgtcolor'].'';?> 5%, <?php echo''.$mvcore['button_s_bgbcolor'].'';?> 100%);
	background:linear-gradient(to bottom, <?php echo''.$mvcore['button_s_bgtcolor'].'';?> 5%, <?php echo''.$mvcore['button_s_bgbcolor'].'';?> 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo''.$mvcore['button_s_bgtcolor'].'';?>', endColorstr='<?php echo''.$mvcore['button_s_bgbcolor'].'';?>',GradientType=0);
	background-color:<?php echo''.$mvcore['button_s_bgtcolor'].'';?>;
	-moz-border-radius:<?php echo''.$mvcore['button_s_bradius'].'';?>px;
	-webkit-border-radius:<?php echo''.$mvcore['button_s_bradius'].'';?>px;
	border-radius:<?php echo''.$mvcore['button_s_bradius'].'';?>px;
	border:<?php echo''.$mvcore['button_s_bsizes'].'';?>px solid <?php echo''.$mvcore['button_s_bordecolor'].'';?>;
	display:inline-block;
	cursor:pointer;
	margin:2px;
	text-transform: <?php echo''.$mvcore['button_s_textfonttans'].'';?>;
	color:<?php echo''.$mvcore['button_s_textcolor'].'';?>;
	font-weight:<?php echo''.$mvcore['button_s_textbold'].'';?>;
	font-family:<?php echo''.$mvcore['button_s_textfontf'].'';?>;
	font-size:<?php echo''.$mvcore['button_s_textsize'].'';?>;
	padding:<?php echo''.$mvcore['button_s_vsize'].'';?>px <?php echo''.$mvcore['button_s_hsize'].'';?>px;
	text-decoration:none;
}

.mvcore-button-style:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, <?php echo''.$mvcore['button_s_bgtcolorhover'].'';?>), color-stop(1, <?php echo''.$mvcore['button_s_bgbcolorhover'].'';?>));
	background:-moz-linear-gradient(top, <?php echo''.$mvcore['button_s_bgtcolorhover'].'';?> 5%, <?php echo''.$mvcore['button_s_bgbcolorhover'].'';?> 100%);
	background:-webkit-linear-gradient(top, <?php echo''.$mvcore['button_s_bgtcolorhover'].'';?> 5%, <?php echo''.$mvcore['button_s_bgbcolorhover'].'';?> 100%);
	background:-o-linear-gradient(top, <?php echo''.$mvcore['button_s_bgtcolorhover'].'';?> 5%, <?php echo''.$mvcore['button_s_bgbcolorhover'].'';?> 100%);
	background:-ms-linear-gradient(top, <?php echo''.$mvcore['button_s_bgtcolorhover'].'';?> 5%, <?php echo''.$mvcore['button_s_bgbcolorhover'].'';?> 100%);
	background:linear-gradient(to bottom, <?php echo''.$mvcore['button_s_bgtcolorhover'].'';?> 5%, <?php echo''.$mvcore['button_s_bgbcolorhover'].'';?> 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo''.$mvcore['button_s_bgtcolorhover'].'';?>', endColorstr='<?php echo''.$mvcore['button_s_bgbcolorhover'].'';?>',GradientType=0);
	background-color:<?php echo''.$mvcore['button_s_bgtcolorhover'].'';?>;
	color:<?php echo''.$mvcore['button_s_textcolorhover'].'';?>;
}

.mvcore-button-style:active {
	position:relative;
	top:1px;
}
.mvcore-table {
	margin:0px;padding:0px;
	width:100%;
	border:0px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;
	border-width:1px 1px 0px 0px;	
}

.mvcore-table table{

	width:100%;
	height:100%;
	margin:0px;padding:0px;
}

.mvcore-table td{
	vertical-align:middle;
	border:0px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;
	border-width:0px 0px 1px 1px;
	background-color:<?php echo''.$mvcore['table_bg_transColor'].'';?>;
	text-align:<?php echo''.$mvcore['table_s_talign'].'';?>;
	padding:<?php echo''.$mvcore['table_s_padd'].'';?>;
	font-size:<?php echo''.$mvcore['table_s_textsize'].'';?>;
	font-family:Helvetica;
	font-weight:bold;
	color:<?php echo''.$mvcore['table_s_textcolor'].'';?>;
}

.mvcore-table tr:hover td{
	background-color:<?php echo''.$mvcore['table_bg_transhovColor'].'';?>;
}

.mvcore-table tr:first-child td{
	background-color:<?php echo''.$mvcore['table_s_trowcolgra'].'';?>;
	border:0px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;
	text-align:<?php echo''.$mvcore['table_s_titletalign'].'';?>;
	border-width:0px 0px 1px 1px;
	font-size:<?php echo''.$mvcore['table_s_tittextsize'].'';?>;
	font-family:Times New Roman;
	font-weight:bold;
	color:<?php echo''.$mvcore['table_s_titletextcolor'].'';?>;
}

.mvcore-table a{
	color:000;
}

.mvcore-table a:hover{
	color:999;
}
</style>
	<div id="PaymentBox">
		<center>
			<form action="action.php" method="POST"><input name="Username" type="hidden" size="10" value="<?php echo $_SESSION['username'];?>"/>
				<table class="mvcore-table" cellpadding="0" cellspacing="0">
					<tr>
						<td>Valor:</td><td>R$<input class="mvcore-select-main" style="width:120px !important;" name="value" maxlength="5" type="text" size="3"/>,00</td> <td><input class="mvcore-button-style" type="submit" value="Doar" /></td>
					</tr>
				</table>
			</form>
			
			<?php if(isset($_GET['message'])) echo('<br>'.urldecode($_GET['message'])); ?>
		</center>
	</div>