<style>

.latest-twitter-tweett{ 
	font-style: italic;
	margin: 0px 0px 10px 0px;
	border-bottom: 1px solid rgba(204, 204, 204, 0.5);
	padding: 0px 0px 10px 0px;
}

#sw_db_sys_left {
	position: fixed;
	top: 0;
	left: 0;
	z-index:9999;
}

#sw_db_sys_right {
	position: fixed;
	top: 0;
	right: 0;
	z-index:9999;
}

#msg_cs_event {
	position: fixed;
	bottom: 0;
	left: 0;
	z-index:9999;
}

#msg_event_post_one {
	position: fixed;
	bottom: 0;
	right: 0;
	z-index:9999;
}

#msg_event_post_two {
	position: fixed;
	bottom: 80px;
	right: 0;
	z-index:9999;
}

#msg_event_post_tri {
	position: fixed;
	bottom: 160px;
	right: 0;
	z-index:9999;
}

a:link {
	text-decoration: none;
}

a:visited {
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}

.msg_stu_bg {
  position: fixed;
  margin-top:-9px;
  width:100%;
  height:100%;
  background-color:#2E2E2E;
  opacity:0.9;
  z-index:100;
  left: 0;
  right: 0;
}

.msg_sent_to_user {
  position: fixed;
  color:#FAFAFA;
  font-size:15px;
  z-index:200;
  left: 0;
  right: 0;
}

/* =========================================================================== */
/* GAME PANEL STYLING V1 */

.mvcore-gp-container {
	margin-left:0px;
	float: left; 
}

.mvcore-gp-container .mvcore-gp-item {
	width: 50%; 
	float: left; 
}

.mvcore-gp-style2 {
	background-color:<?php echo''.$mvcore['gameP_bg_transColor'].'';?>;
	-moz-border-radius:<?php echo''.$mvcore['gp_s_borradiu'].'';?>px;
	-webkit-border-radius:<?php echo''.$mvcore['gp_s_borradiu'].'';?>px;
	border-radius:<?php echo''.$mvcore['gp_s_borradiu'].'';?>px;
	border:<?php echo''.$mvcore['gp_s_borsize'].'';?>px solid <?php echo''.$mvcore['gp_s_borcolor'].'';?>;
	cursor:pointer;
	margin-top:10px !important;
	margin-bottom:10px !important;
	color:<?php echo''.$mvcore['gp_s_ltextcolor'].'';?>;
	font-size:<?php echo''.$mvcore['gp_s_ltextsize'].'';?>;
	text-decoration:none;
	height:<?php echo''.$mvcore['gp_s_height'].'';?>px !important;
	width:<?php $newWidth = $mvcore['gp_s_width'] * 3; echo''.$newWidth.'';?>px;
}

.mvcore-gp-style2 p {
	font-size:<?php echo''.$mvcore['gp_s_infotsize'].'';?>;
	color:<?php echo''.$mvcore['gp_s_infotcolor'].'';?>;
}

.mvcore-gp-style2:hover {
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

.mvcore-gp-style2:active {
	position:relative;
	top:1px;
}

.mvcore-gp-style {
	background-color:<?php echo''.$mvcore['gameP_bg_transColor'].'';?>;
	-moz-border-radius:<?php echo''.$mvcore['gp_s_borradiu'].'';?>px;
	-webkit-border-radius:<?php echo''.$mvcore['gp_s_borradiu'].'';?>px;
	border-radius:<?php echo''.$mvcore['gp_s_borradiu'].'';?>px;
	border:<?php echo''.$mvcore['gp_s_borsize'].'';?>px solid <?php echo''.$mvcore['gp_s_borcolor'].'';?>;
	cursor:pointer;
	margin:10px !important;
	color:<?php echo''.$mvcore['gp_s_ltextcolor'].'';?>;
	font-size:<?php echo''.$mvcore['gp_s_ltextsize'].'';?>;
	text-decoration:none;
	width:<?php echo''.$mvcore['gp_s_width'].'';?>px;
	height:<?php echo''.$mvcore['gp_s_height'].'';?>px;
}

.mvcore-gp-style p {
	font-size:<?php echo''.$mvcore['gp_s_infotsize'].'';?>;
	color:<?php echo''.$mvcore['gp_s_infotcolor'].'';?>;
}

.mvcore-gp-style:hover {
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

.mvcore-gp-style:active {
	position:relative;
	top:1px;
}

/* =========================================================================== */
/* TABLE STYLING V1 */

.mvcore-table-disabled-td td {
	background-color:<?php echo''.$mvcore['table_bg_transColor'].'';?> !important;
	font-weight: normal !important;
	font-size:15px !important;
	font-family: initial !important;
	color:<?php echo''.$mvcore['table_s_textcolor'].'';?> !important;
}

.mvcore-table-disabled-td:hover td{
	background-color:<?php echo''.$mvcore['table_bg_transhovColor'].'';?> !important;
	color:<?php echo''.$mvcore['table_s_textcolor'].'';?> !important;
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

.mvcore-tablestat {
	margin:0px;padding:0px;
	width:100%;
	border:0px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;
	border-width:1px 1px 1px 1px;	
}

.mvcore-tablestat table{

	width:100%;
	height:100%;
	margin:0px;padding:0px;
}

.mvcore-tablestat td{
	vertical-align:middle;
	border:0px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;
	border-width:0px 0px 0px 0px;
	background-color:<?php echo''.$mvcore['table_bg_transColor'].'';?>;
	text-align:<?php echo''.$mvcore['table_s_talign'].'';?>;
	padding:<?php echo''.$mvcore['table_s_padd'].'';?>;
	font-size:<?php echo''.$mvcore['table_s_textsize'].'';?>;
	font-family:Helvetica;
	font-weight:bold;
	color:<?php echo''.$mvcore['table_s_textcolor'].'';?>;
}

.mvcore-tablestat tr:hover td{
	background-color:<?php echo''.$mvcore['table_bg_transhovColor'].'';?>;
}

.mvcore-tablestat tr:first-child td{
	background-color:<?php echo''.$mvcore['table_s_trowcolgra'].'';?>;
	border:0px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;
	text-align:<?php echo''.$mvcore['table_s_titletalign'].'';?>;
	border-width:0px 0px 0px 0px;
	font-size:<?php echo''.$mvcore['table_s_tittextsize'].'';?>;
	font-family:Times New Roman;
	font-weight:bold;
	color:<?php echo''.$mvcore['table_s_titletextcolor'].'';?>;
}

.mvcore-tablestat a{
	color:000;
}

.mvcore-tablestat a:hover{
	color:999;
}

/* =========================================================================== */
/* Input Style */

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

.mvcore-input-main-FTM {
	background: <?php echo''.$mvcore['inpSelect_bg_transColor'].'';?>;
	border:<?php echo''.$mvcore['inpSelec_s_bsizes'].'';?>px solid <?php echo''.$mvcore['inpSelec_s_borcolor'].'';?>;
	-webkit-border-radius: <?php echo''.$mvcore['inpSelec_s_bradius'].'';?>px;
	-moz-border-radius: <?php echo''.$mvcore['inpSelec_s_bradius'].'';?>px;
	border-radius: <?php echo''.$mvcore['inpSelec_s_bradius'].'';?>px;
	margin:8px;
	display:inline-block;
	cursor:pointer;
	font-family:<?php echo''.$mvcore['inpSelec_s_textfontf'].'';?> ;
	font-size:<?php echo''.$mvcore['inpSelec_s_textsize'].'';?> ;
	color: <?php echo''.$mvcore['inpSelec_s_textcolor'].'';?>;
	padding:8px;
	width: <?php $calcIs = $mvcore['inpSelec_s_hsize'] - 18; echo''.$calcIs.'';?>px;
	height: <?php echo''.$mvcore['inpSelec_s_vsize'].'';?>px;
	-webkit-width: <?php $calcIs = $mvcore['inpSelec_s_hsize'] - 18; echo''.$calcIs.'';?>px;
	-webkit-height: <?php echo''.$mvcore['inpSelec_s_vsize'].'';?>px;
	-moz-width: <?php $calcIs = $mvcore['inpSelec_s_hsize'] - 18; echo''.$calcIs.'';?>px;
	-moz-height: <?php echo''.$mvcore['inpSelec_s_vsize'].'';?>px;
}

.mvcore-select-main-FTM {
	background: <?php echo''.$mvcore['inpSelect_bg_transColor'].'';?>;
	border:<?php echo''.$mvcore['inpSelec_s_bsizes'].'';?>px solid <?php echo''.$mvcore['inpSelec_s_borcolor'].'';?>;
	-webkit-border-radius: <?php echo''.$mvcore['inpSelec_s_bradius'].'';?>px;
	-moz-border-radius: <?php echo''.$mvcore['inpSelec_s_bradius'].'';?>px;
	border-radius: <?php echo''.$mvcore['inpSelec_s_bradius'].'';?>px;
	margin:2px;
	margin-bottom:10px !important;
	cursor:pointer;
	font-family:<?php echo''.$mvcore['inpSelec_s_textfontf'].'';?> ;
	font-size:<?php echo''.$mvcore['inpSelec_s_textsize'].'';?>;
	color: <?php echo''.$mvcore['inpSelec_s_textcolor'].'';?>;
	padding:5px;
	width: <?php echo''.$mvcore['inpSelec_s_hsize'].'';?>px;
	height: <?php $calcIs = $mvcore['inpSelec_s_vsize'] + 18; echo''.$calcIs.'';?>px;
	-webkit-width: <?php echo''.$mvcore['inpSelec_s_hsize'].'';?>px;
	-webkit-height: <?php $calcIs = $mvcore['inpSelec_s_vsize'] + 18; echo''.$calcIs.'';?>px;
	-moz-width: <?php echo''.$mvcore['inpSelec_s_hsize'].'';?>px;
	-moz-height: <?php $calcIs = $mvcore['inpSelec_s_vsize'] + 18; echo''.$calcIs.'';?>px;
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

/* =========================================================================== */
/* Items */

.mvcore-item-top {
	background: <?php echo''.$mvcore['webshop_bg_transColor2'].'';?>;

	-webkit-border-top-left-radius: <?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	-moz-border-top-left-radius: <?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	border-top-left-radius: <?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	
	-webkit-border-top-right-radius: <?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	-moz-border-top-right-radius: <?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	border-top-right-radius: <?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	
	padding-top:5px;
	cursor:pointer;
	font-family:<?php echo''.$mvcore['webshop_s_textfontfami'].'';?> ;
	font-size:<?php echo''.$mvcore['webshop_s_textsize'].'';?> ;
	color: <?php echo''.$mvcore['webshop_s_textcolor'].'';?>;
	width:136px;
	height:28px;
}

.mvcore-item-mid {
	background: <?php echo''.$mvcore['webshop_bg_transColor3'].'';?>;

	-webkit-border-bottom-left-radius: <?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	-moz-border-bottom-left-radius: <?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	border-bottom-left-radius: <?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	
	-webkit-border-bottom-right-radius: <?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	-moz-border-bottom-right-radius: <?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	border-bottom-right-radius: <?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	
	padding:5px;
	cursor:pointer;
	font-family:<?php echo''.$mvcore['webshop_s_textfontfami'].'';?> ;
	font-size:<?php echo''.$mvcore['webshop_s_textsize'].'';?> ;
	color: <?php echo''.$mvcore['webshop_s_textcolor'].'';?>;
	width:136px;
	height:28px;
}

.mvcore-item-top a {
	color: <?php echo''.$mvcore['webshop_s_textcolor'].'';?>;
}

.mvcore-item-mid a {
	color: <?php echo''.$mvcore['webshop_s_textcolor'].'';?>;
}

.mvcore-items a{ 
	color:#FFFFFF; 
	font-family:Verdana, Helvetica, sans-serif; 
	font-size:13px; 
	text-decoration:none; 
	padding-bottom:5px;
}

.mvcore-items a:hover{ 
	color:#FFFFFF;
}

.mvcore-itemnclass {
	padding-right:1px;
	padding-left:1px;
}

.mvcore-ucp-info{
	width:100%;
	font-family:<?php echo''.$mvcore['webshop_s_textfontfami'].'';?> ;
	font-size:<?php echo''.$mvcore['webshop_s_textsize'].'';?> ;
	color:<?php echo''.$mvcore['webshop_s_textcolor'].'';?>;
	-moz-border-radius:<?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	-webkit-border-radius:<?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	border-radius:<?php echo''.$mvcore['webshop_s_borderradi'].'';?>px;
	background: <?php echo''.$mvcore['webshop_bg_transColor1'].'';?>;
}

.mvcore-ucp-info a {
	color:<?php echo''.$mvcore['webshop_s_textcolor'].'';?>;
}

.mvcore-ucp-info div a {
	color:<?php echo''.$mvcore['webshop_s_textcolor'].'';?>;
}

#mvcore-helm{
	position:absolute; 
	left:73px; 
	top:58px; 
	width:56px; 
	height:66px; 
}

#mvcore-wings{
	position:absolute; 
	left:272px;	
	top:59px; 	
	width:127px; 
	height:110px; 
}

#mvcore-pendant{
	position:absolute; 
	left:233px;	
	top:80px; 	
	width:29px; 
	height:29px; 
}

#mvcore-sword{
	position:absolute; 
	left:6px; 
	top:242px; 
	width:69px; 
	height:129px; 
}

#mvcore-armor{
	position:absolute; 
	left:40px; 
	top:138px; 
	width:82px; 
	height:98px; 
}

#mvcore-shield{
	position:absolute; 
	left:330px; 
	top:242px; 
	width:69px; 
	height:129px; 
}

#mvcore-gloves{
	position:absolute; 
	left:271px;	
	top:178px;	
	width:85px;	
	height:55px; 
}
#mvcore-pants{
	position:absolute; 
	left:89px;	
	top:297px;	
	width:58px; 
	height:74px; 
}
#mvcore-ring_left{
	position:absolute; 
	left:102px;	
	top:252px; 	
	width:29px; 
	height:29px; 
}
#mvcore-ring_right{
	position:absolute; 
	left:272px;	
	top:252px; 	
	width:29px; 
	height:29px; 
}

#mvcore-boots{
	position:absolute; 
	left:258px;	
	top:297px; 	
	width:58px; 
	height:74px; 
}

 
/* =========================================================================== */
/* News Styling */

.mvcore-box-style1 {
	width:100%;
	overflow:hidden;
	background-color:<?php echo''.$mvcore['news_bg_transColor'].'';?>; /* News Background Color */
	margin:0px 0px 20px 0px;
	-moz-border-radius:<?php echo''.$mvcore['news_s_bradous'].'';?>px;
	-webkit-border-radius:<?php echo''.$mvcore['news_s_bradous'].'';?>px;
	border-radius:<?php echo''.$mvcore['news_s_bradous'].'';?>px;
	border: <?php echo''.$mvcore['news_s_bsize'].'';?>px solid <?php echo''.$mvcore['news_s_bordcolor'].'';?>;
}

.mvcore-titles{
	color:<?php echo''.$mvcore['news_s_titletextcolor'].'';?>; /* Title Color */
	font-family:arial;
	font-size:<?php echo''.$mvcore['news_s_titlesize'].'';?>; /* Title Size */
	text-align:<?php echo''.$mvcore['news_s_titlealign'].'';?>;
	padding:12px;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, <?php echo''.$mvcore['news_s_titlebg2Trans'].'';?>), color-stop(1, <?php echo''.$mvcore['news_s_titlebgTrans'].'';?>));
	background:-moz-linear-gradient(top, <?php echo''.$mvcore['news_s_titlebg2Trans'].'';?> 5%, <?php echo''.$mvcore['news_s_titlebgTrans'].'';?> 100%);
	background:-webkit-linear-gradient(top, <?php echo''.$mvcore['news_s_titlebg2Trans'].'';?> 5%, <?php echo''.$mvcore['news_s_titlebgTrans'].'';?> 100%);
	background:-o-linear-gradient(top, <?php echo''.$mvcore['news_s_titlebg2Trans'].'';?> 5%, <?php echo''.$mvcore['news_s_titlebgTrans'].'';?> 100%);
	background:-ms-linear-gradient(top, <?php echo''.$mvcore['news_s_titlebg2Trans'].'';?> 5%, <?php echo''.$mvcore['news_s_titlebgTrans'].'';?> 100%);
	background:linear-gradient(to bottom, <?php echo''.$mvcore['news_s_titlebg2Trans'].'';?> 5%, <?php echo''.$mvcore['news_s_titlebgTrans'].'';?> 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo''.$mvcore['news_s_titlebg2Trans'].'';?>', endColorstr='<?php echo''.$mvcore['news_s_titlebgTrans'].'';?>',GradientType=0);
	background-color:<?php echo''.$mvcore['news_s_titlebg2Trans'].'';?>;
}

.mvcore-div-entry {
	padding: 5px 5px 5px 5px;
	color:<?php echo''.$mvcore['news_s_dtextcolor'].'';?>; /* Text Default Color */
}

.mvcore-meta-bga {
	overflow: hidden;
	position: relative;
	width: 100%;
	height: 50px;
	padding: 10px 45px 0px 35px;
	left: -10px;
}

.mvcore-meta-bga div {
	text-transform: uppercase;
	font-family: serif;
	width:100%;
}

.mvcore-meta-bga div p {
	color: <?php echo''.$mvcore['news_s_dateColor'].'';?>;
	float: right;
	padding: 10px 45px 0px 35px;
	margin-top:-15px;
}

/* =========================================================================== */
/* Warning Output */

.mvcore-nNote {
	padding: 10px 10px 10px 40px;
	margin:10px 0px;
}

.mvcore-nSuccess {
	color:#FFFFFF;
	background: #00CC00 url('system/engine_images/success.png') left center no-repeat;
	border:1px solid #233415;
	text-align:left !important;
	font-size:13px;
}

.mvcore-nFailure {
	color:#FFFFFF;
	background: #BC2119 url('system/engine_images/error.png') left center no-repeat;
	border:1px solid #C11B26;
	text-align:left !important;
	font-size:13px;
}

.mvcore-nInformation {
    color:#FFFFFF;
	background: #6FC2E9 url('system/engine_images/info.png') left center no-repeat;
	border:1px solid #048BC9;
	text-align:left !important;
	font-size:13px;
}

.mvcore-nAnnouncement {
	padding: 10px 10px 10px 10px;
    color:<?php echo''.$mvcore['annon_s_textcolor'].'';?>;
	border:<?php echo''.$mvcore['annon_s_bsize'].'';?>px solid <?php echo''.$mvcore['annon_s_bordcolor'].'';?>;
	-moz-border-radius:<?php echo''.$mvcore['annon_s_bradous'].'';?>px;
	-webkit-border-radius:<?php echo''.$mvcore['annon_s_bradous'].'';?>px;
	border-radius:<?php echo''.$mvcore['annon_s_bradous'].'';?>px;
	text-align:left !important;
	font-size:<?php echo''.$mvcore['annon_s_size'].'';?>;
	
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, <?php echo''.$mvcore['annon_s_bgcolorTrans'].'';?>), color-stop(1, <?php echo''.$mvcore['annon_s_bgcolor2Trans'].'';?>));
	background:-moz-linear-gradient(top, <?php echo''.$mvcore['annon_s_bgcolorTrans'].'';?> 5%, <?php echo''.$mvcore['annon_s_bgcolor2Trans'].'';?> 100%);
	background:-webkit-linear-gradient(top, <?php echo''.$mvcore['annon_s_bgcolorTrans'].'';?> 5%, <?php echo''.$mvcore['annon_s_bgcolor2Trans'].'';?> 100%);
	background:-o-linear-gradient(top, <?php echo''.$mvcore['annon_s_bgcolorTrans'].'';?> 5%, <?php echo''.$mvcore['annon_s_bgcolor2Trans'].'';?> 100%);
	background:-ms-linear-gradient(top, <?php echo''.$mvcore['annon_s_bgcolorTrans'].'';?> 5%, <?php echo''.$mvcore['annon_s_bgcolor2Trans'].'';?> 100%);
	background:linear-gradient(to bottom, <?php echo''.$mvcore['annon_s_bgcolorTrans'].'';?> 5%, <?php echo''.$mvcore['annon_s_bgcolor2Trans'].'';?> 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo''.$mvcore['annon_s_bgcolorTrans'].'';?>', endColorstr='<?php echo''.$mvcore['annon_s_bgcolor2Trans'].'';?>',GradientType=0);
	background-color:<?php echo''.$mvcore['annon_s_bgcolorTrans'].'';?>;
}

/* =========================================================================== */
/* Flag Sprite */

.mvcoreflag {
	width: 32px;
	height: 32px;
	background:url(system/engine_images/flags.png) no-repeat
}

.mvcoreflag.mvcoreflag-ad {background-position: -32px 0}
.mvcoreflag.mvcoreflag-ae {background-position: -64px 0}
.mvcoreflag.mvcoreflag-af {background-position: -96px 0}
.mvcoreflag.mvcoreflag-ag {background-position: -128px 0}
.mvcoreflag.mvcoreflag-ai {background-position: -160px 0}
.mvcoreflag.mvcoreflag-al {background-position: -192px 0}
.mvcoreflag.mvcoreflag-am {background-position: -224px 0}
.mvcoreflag.mvcoreflag-an {background-position: -256px 0}
.mvcoreflag.mvcoreflag-ao {background-position: -288px 0}
.mvcoreflag.mvcoreflag-ar {background-position: -320px 0}
.mvcoreflag.mvcoreflag-as {background-position: -352px 0}
.mvcoreflag.mvcoreflag-at {background-position: -384px 0}
.mvcoreflag.mvcoreflag-au {background-position: -416px 0}
.mvcoreflag.mvcoreflag-aw {background-position: -448px 0}
.mvcoreflag.mvcoreflag-az {background-position: 0 -32px}
.mvcoreflag.mvcoreflag-ba {background-position: -32px -32px}
.mvcoreflag.mvcoreflag-bb {background-position: -64px -32px}
.mvcoreflag.mvcoreflag-bd {background-position: -96px -32px}
.mvcoreflag.mvcoreflag-be {background-position: -128px -32px}
.mvcoreflag.mvcoreflag-bf {background-position: -160px -32px}
.mvcoreflag.mvcoreflag-bg {background-position: -192px -32px}
.mvcoreflag.mvcoreflag-bh {background-position: -224px -32px}
.mvcoreflag.mvcoreflag-bi {background-position: -256px -32px}
.mvcoreflag.mvcoreflag-bj {background-position: -288px -32px}
.mvcoreflag.mvcoreflag-bm {background-position: -320px -32px}
.mvcoreflag.mvcoreflag-bn {background-position: -352px -32px}
.mvcoreflag.mvcoreflag-bo {background-position: -384px -32px}
.mvcoreflag.mvcoreflag-br {background-position: -416px -32px}
.mvcoreflag.mvcoreflag-bs {background-position: -448px -32px}
.mvcoreflag.mvcoreflag-bt {background-position: 0 -64px}
.mvcoreflag.mvcoreflag-bw {background-position: -32px -64px}
.mvcoreflag.mvcoreflag-by {background-position: -64px -64px}
.mvcoreflag.mvcoreflag-bz {background-position: -96px -64px}
.mvcoreflag.mvcoreflag-ca {background-position: -128px -64px}
.mvcoreflag.mvcoreflag-cd {background-position: -160px -64px}
.mvcoreflag.mvcoreflag-cf {background-position: -192px -64px}
.mvcoreflag.mvcoreflag-cg {background-position: -224px -64px}
.mvcoreflag.mvcoreflag-ch {background-position: -256px -64px}
.mvcoreflag.mvcoreflag-ci {background-position: -288px -64px}
.mvcoreflag.mvcoreflag-ck {background-position: -320px -64px}
.mvcoreflag.mvcoreflag-cl {background-position: -352px -64px}
.mvcoreflag.mvcoreflag-cm {background-position: -384px -64px}
.mvcoreflag.mvcoreflag-cn {background-position: -416px -64px}
.mvcoreflag.mvcoreflag-co {background-position: -448px -64px}
.mvcoreflag.mvcoreflag-cr {background-position: 0 -96px}
.mvcoreflag.mvcoreflag-cu {background-position: -32px -96px}
.mvcoreflag.mvcoreflag-cv {background-position: -64px -96px}
.mvcoreflag.mvcoreflag-cy {background-position: -96px -96px}
.mvcoreflag.mvcoreflag-cz {background-position: -128px -96px}
.mvcoreflag.mvcoreflag-de {background-position: -160px -96px}
.mvcoreflag.mvcoreflag-dj {background-position: -192px -96px}
.mvcoreflag.mvcoreflag-dk {background-position: -224px -96px}
.mvcoreflag.mvcoreflag-dm {background-position: -256px -96px}
.mvcoreflag.mvcoreflag-do {background-position: -288px -96px}
.mvcoreflag.mvcoreflag-dz {background-position: -320px -96px}
.mvcoreflag.mvcoreflag-ec {background-position: -352px -96px}
.mvcoreflag.mvcoreflag-ee {background-position: -384px -96px}
.mvcoreflag.mvcoreflag-eg {background-position: -416px -96px}
.mvcoreflag.mvcoreflag-eh {background-position: -448px -96px}
.mvcoreflag.mvcoreflag-er {background-position: 0 -128px}
.mvcoreflag.mvcoreflag-es {background-position: -32px -128px}
.mvcoreflag.mvcoreflag-et {background-position: -64px -128px}
.mvcoreflag.mvcoreflag-fi {background-position: -96px -128px}
.mvcoreflag.mvcoreflag-fj {background-position: -128px -128px}
.mvcoreflag.mvcoreflag-fm {background-position: -160px -128px}
.mvcoreflag.mvcoreflag-fo {background-position: -192px -128px}
.mvcoreflag.mvcoreflag-fr {background-position: -224px -128px}
.mvcoreflag.mvcoreflag-ga {background-position: -256px -128px}
.mvcoreflag.mvcoreflag-gb {background-position: -288px -128px}
.mvcoreflag.mvcoreflag-gd {background-position: -320px -128px}
.mvcoreflag.mvcoreflag-ge {background-position: -352px -128px}
.mvcoreflag.mvcoreflag-gg {background-position: -384px -128px}
.mvcoreflag.mvcoreflag-gh {background-position: -416px -128px}
.mvcoreflag.mvcoreflag-gi {background-position: -448px -128px}
.mvcoreflag.mvcoreflag-gl {background-position: 0 -160px}
.mvcoreflag.mvcoreflag-gm {background-position: -32px -160px}
.mvcoreflag.mvcoreflag-gn {background-position: -64px -160px}
.mvcoreflag.mvcoreflag-gp {background-position: -96px -160px}
.mvcoreflag.mvcoreflag-gq {background-position: -128px -160px}
.mvcoreflag.mvcoreflag-gr {background-position: -160px -160px}
.mvcoreflag.mvcoreflag-gt {background-position: -192px -160px}
.mvcoreflag.mvcoreflag-gu {background-position: -224px -160px}
.mvcoreflag.mvcoreflag-gw {background-position: -256px -160px}
.mvcoreflag.mvcoreflag-gy {background-position: -288px -160px}
.mvcoreflag.mvcoreflag-hk {background-position: -320px -160px}
.mvcoreflag.mvcoreflag-hn {background-position: -352px -160px}
.mvcoreflag.mvcoreflag-hr {background-position: -384px -160px}
.mvcoreflag.mvcoreflag-ht {background-position: -416px -160px}
.mvcoreflag.mvcoreflag-hu {background-position: -448px -160px}
.mvcoreflag.mvcoreflag-id {background-position: 0 -192px}
.mvcoreflag.mvcoreflag-ie {background-position: -32px -192px}
.mvcoreflag.mvcoreflag-il {background-position: -64px -192px}
.mvcoreflag.mvcoreflag-im {background-position: -96px -192px}
.mvcoreflag.mvcoreflag-in {background-position: -128px -192px}
.mvcoreflag.mvcoreflag-iq {background-position: -160px -192px}
.mvcoreflag.mvcoreflag-ir {background-position: -192px -192px}
.mvcoreflag.mvcoreflag-is {background-position: -224px -192px}
.mvcoreflag.mvcoreflag-it {background-position: -256px -192px}
.mvcoreflag.mvcoreflag-je {background-position: -288px -192px}
.mvcoreflag.mvcoreflag-jm {background-position: -320px -192px}
.mvcoreflag.mvcoreflag-jo {background-position: -352px -192px}
.mvcoreflag.mvcoreflag-jp {background-position: -384px -192px}
.mvcoreflag.mvcoreflag-ke {background-position: -416px -192px}
.mvcoreflag.mvcoreflag-kg {background-position: -448px -192px}
.mvcoreflag.mvcoreflag-kh {background-position: 0 -224px}
.mvcoreflag.mvcoreflag-ki {background-position: -32px -224px}
.mvcoreflag.mvcoreflag-km {background-position: -64px -224px}
.mvcoreflag.mvcoreflag-kn {background-position: -96px -224px}
.mvcoreflag.mvcoreflag-kp {background-position: -128px -224px}
.mvcoreflag.mvcoreflag-kr {background-position: -160px -224px}
.mvcoreflag.mvcoreflag-kw {background-position: -192px -224px}
.mvcoreflag.mvcoreflag-ky {background-position: -224px -224px}
.mvcoreflag.mvcoreflag-kz {background-position: -256px -224px}
.mvcoreflag.mvcoreflag-la {background-position: -288px -224px}
.mvcoreflag.mvcoreflag-lb {background-position: -320px -224px}
.mvcoreflag.mvcoreflag-lc {background-position: -352px -224px}
.mvcoreflag.mvcoreflag-li {background-position: -384px -224px}
.mvcoreflag.mvcoreflag-lk {background-position: -416px -224px}
.mvcoreflag.mvcoreflag-lr {background-position: -448px -224px}
.mvcoreflag.mvcoreflag-ls {background-position: 0 -256px}
.mvcoreflag.mvcoreflag-lt {background-position: -32px -256px}
.mvcoreflag.mvcoreflag-lu {background-position: -64px -256px}
.mvcoreflag.mvcoreflag-lv {background-position: -96px -256px}
.mvcoreflag.mvcoreflag-ly {background-position: -128px -256px}
.mvcoreflag.mvcoreflag-ma {background-position: -160px -256px}
.mvcoreflag.mvcoreflag-mc {background-position: -192px -256px}
.mvcoreflag.mvcoreflag-md {background-position: -224px -256px}
.mvcoreflag.mvcoreflag-me {background-position: -256px -256px}
.mvcoreflag.mvcoreflag-mg {background-position: -288px -256px}
.mvcoreflag.mvcoreflag-mh {background-position: -320px -256px}
.mvcoreflag.mvcoreflag-mk {background-position: -352px -256px}
.mvcoreflag.mvcoreflag-ml {background-position: -384px -256px}
.mvcoreflag.mvcoreflag-mm {background-position: -416px -256px}
.mvcoreflag.mvcoreflag-mn {background-position: -448px -256px}
.mvcoreflag.mvcoreflag-mo {background-position: 0 -288px}
.mvcoreflag.mvcoreflag-mq {background-position: -32px -288px}
.mvcoreflag.mvcoreflag-mr {background-position: -64px -288px}
.mvcoreflag.mvcoreflag-ms {background-position: -96px -288px}
.mvcoreflag.mvcoreflag-mt {background-position: -128px -288px}
.mvcoreflag.mvcoreflag-mu {background-position: -160px -288px}
.mvcoreflag.mvcoreflag-mv {background-position: -192px -288px}
.mvcoreflag.mvcoreflag-mw {background-position: -224px -288px}
.mvcoreflag.mvcoreflag-mx {background-position: -256px -288px}
.mvcoreflag.mvcoreflag-my {background-position: -288px -288px}
.mvcoreflag.mvcoreflag-mz {background-position: -320px -288px}
.mvcoreflag.mvcoreflag-na {background-position: -352px -288px}
.mvcoreflag.mvcoreflag-nc {background-position: -384px -288px}
.mvcoreflag.mvcoreflag-ne {background-position: -416px -288px}
.mvcoreflag.mvcoreflag-ng {background-position: -448px -288px}
.mvcoreflag.mvcoreflag-ni {background-position: 0 -320px}
.mvcoreflag.mvcoreflag-nl {background-position: -32px -320px}
.mvcoreflag.mvcoreflag-no {background-position: -64px -320px}
.mvcoreflag.mvcoreflag-np {background-position: -96px -320px}
.mvcoreflag.mvcoreflag-nr {background-position: -128px -320px}
.mvcoreflag.mvcoreflag-nz {background-position: -160px -320px}
.mvcoreflag.mvcoreflag-om {background-position: -192px -320px}
.mvcoreflag.mvcoreflag-pa {background-position: -224px -320px}
.mvcoreflag.mvcoreflag-pe {background-position: -256px -320px}
.mvcoreflag.mvcoreflag-pf {background-position: -288px -320px}
.mvcoreflag.mvcoreflag-pg {background-position: -320px -320px}
.mvcoreflag.mvcoreflag-ph {background-position: -352px -320px}
.mvcoreflag.mvcoreflag-pk {background-position: -384px -320px}
.mvcoreflag.mvcoreflag-pl {background-position: -416px -320px}
.mvcoreflag.mvcoreflag-pr {background-position: -448px -320px}
.mvcoreflag.mvcoreflag-ps {background-position: 0 -352px}
.mvcoreflag.mvcoreflag-pt {background-position: -32px -352px}
.mvcoreflag.mvcoreflag-pw {background-position: -64px -352px}
.mvcoreflag.mvcoreflag-py {background-position: -96px -352px}
.mvcoreflag.mvcoreflag-qa {background-position: -128px -352px}
.mvcoreflag.mvcoreflag-re {background-position: -160px -352px}
.mvcoreflag.mvcoreflag-ro {background-position: -192px -352px}
.mvcoreflag.mvcoreflag-rs {background-position: -224px -352px}
.mvcoreflag.mvcoreflag-ru {background-position: -256px -352px}
.mvcoreflag.mvcoreflag-rw {background-position: -288px -352px}
.mvcoreflag.mvcoreflag-sa {background-position: -320px -352px}
.mvcoreflag.mvcoreflag-sb {background-position: -352px -352px}
.mvcoreflag.mvcoreflag-sc {background-position: -384px -352px}
.mvcoreflag.mvcoreflag-sd {background-position: -416px -352px}
.mvcoreflag.mvcoreflag-se {background-position: -448px -352px}
.mvcoreflag.mvcoreflag-sg {background-position: 0 -384px}
.mvcoreflag.mvcoreflag-si {background-position: -32px -384px}
.mvcoreflag.mvcoreflag-sk {background-position: -64px -384px}
.mvcoreflag.mvcoreflag-sl {background-position: -96px -384px}
.mvcoreflag.mvcoreflag-sm {background-position: -128px -384px}
.mvcoreflag.mvcoreflag-sn {background-position: -160px -384px}
.mvcoreflag.mvcoreflag-so {background-position: -192px -384px}
.mvcoreflag.mvcoreflag-sr {background-position: -224px -384px}
.mvcoreflag.mvcoreflag-st {background-position: -256px -384px}
.mvcoreflag.mvcoreflag-sv {background-position: -288px -384px}
.mvcoreflag.mvcoreflag-sy {background-position: -320px -384px}
.mvcoreflag.mvcoreflag-sz {background-position: -352px -384px}
.mvcoreflag.mvcoreflag-tc {background-position: -384px -384px}
.mvcoreflag.mvcoreflag-td {background-position: -416px -384px}
.mvcoreflag.mvcoreflag-tg {background-position: -448px -384px}
.mvcoreflag.mvcoreflag-th {background-position: 0 -416px}
.mvcoreflag.mvcoreflag-tj {background-position: -32px -416px}
.mvcoreflag.mvcoreflag-tl {background-position: -64px -416px}
.mvcoreflag.mvcoreflag-tm {background-position: -96px -416px}
.mvcoreflag.mvcoreflag-tn {background-position: -128px -416px}
.mvcoreflag.mvcoreflag-to {background-position: -160px -416px}
.mvcoreflag.mvcoreflag-tr {background-position: -192px -416px}
.mvcoreflag.mvcoreflag-tt {background-position: -224px -416px}
.mvcoreflag.mvcoreflag-tv {background-position: -256px -416px}
.mvcoreflag.mvcoreflag-tw {background-position: -288px -416px}
.mvcoreflag.mvcoreflag-tz {background-position: -320px -416px}
.mvcoreflag.mvcoreflag-ua {background-position: -352px -416px}
.mvcoreflag.mvcoreflag-ug {background-position: -384px -416px}
.mvcoreflag.mvcoreflag-us {background-position: -416px -416px}
.mvcoreflag.mvcoreflag-uy {background-position: -448px -416px}
.mvcoreflag.mvcoreflag-uz {background-position: 0 -448px}
.mvcoreflag.mvcoreflag-va {background-position: -32px -448px}
.mvcoreflag.mvcoreflag-vc {background-position: -64px -448px}
.mvcoreflag.mvcoreflag-ve {background-position: -96px -448px}
.mvcoreflag.mvcoreflag-vg {background-position: -128px -448px}
.mvcoreflag.mvcoreflag-vi {background-position: -160px -448px}
.mvcoreflag.mvcoreflag-vn {background-position: -192px -448px}
.mvcoreflag.mvcoreflag-vu {background-position: -224px -448px}
.mvcoreflag.mvcoreflag-ws {background-position: -256px -448px}
.mvcoreflag.mvcoreflag-ye {background-position: -288px -448px}
.mvcoreflag.mvcoreflag-za {background-position: -320px -448px}
.mvcoreflag.mvcoreflag-zm {background-position: -352px -448px}
.mvcoreflag.mvcoreflag-zw {background-position: -384px -448px}
</style>