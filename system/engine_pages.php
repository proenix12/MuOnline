
<?php
$mwr_index=1; $mwr_engine_s_fnc=1;
if($_GET['op1'] != 'admincp' && $mvcore['anon_sys'] == 'on') {
	function randAnnoun(){
		$anoun = glob('system/engine_annou".$db_name_multi_annon."/*');
			return $anoun[rand(0, count($anoun) - 2)];
	}
	
	$filename = randAnnoun();
	
	$readfiledata = file_get_contents(''.$filename.'');
	$readfiledata = str_replace("&lt;p&gt;","",$readfiledata);
	$readfiledata = str_replace("&lt;/p&gt;","",$readfiledata);
	
	$stipName1 = str_replace(".txt","",$filename);
	$stipName2 = str_replace("system/engine_annou".$db_name_multi_annon."/","",$stipName1);
	$NEWS_DATA = explode("-ids-", $readfiledata);
	
		if($NEWS_DATA[1] == '') {} else {
			if($NEWS_DATA[0] == 'Information') { $n_data0 = '<b>'.annon_information.':</b><br>'; } 
			elseif($NEWS_DATA[0] == 'Announcement') { $n_data0 = '<b>'.annon_announce.':</b><br>'; }
			else { $n_data0 = '';};
			
				if(time() >= $stipName2) { unlink("system/engine_annou".$db_name_multi_annon."/".$stipName2.".txt"); } //Delete if has expire
				
			if($mvcore['anon_shop_discount'] == 'yes' && $mvcore['shop_disc_b5m_start'] == 1) {
				echo'<div class="mvcore-nNote mvcore-nAnnouncement"><b>'.annon_announce.':</b><br>'.annon_webshop_disc.' '.$mvcore['shop_perc'].'%</div>';
			} else {
				
				$bonuseventstart = $mvcore['vote_new_date_drop'] - 300 ;
				$bonuseventend = $mvcore['vote_new_date_drop'];
				if($mvcore['anon_vote_bonus'] == 'yes' && time() >= $bonuseventstart) {
					if(time() >= $bonuseventend) { echo'<div class="mvcore-nNote mvcore-nAnnouncement">'.$n_data0.' '.html_entity_decode($NEWS_DATA[1]).'</div>'; } else {
						echo'<div class="mvcore-nNote mvcore-nAnnouncement"><b>'.annon_announce.':</b><br>'.annon_vote_bonus.'</div>';
					}
				} else {
					echo'<div class="mvcore-nNote mvcore-nAnnouncement">'.$n_data0.' '.html_entity_decode($NEWS_DATA[1]).'</div>';
				}
			}
		}							
}
//------------------------------------------------------------------
// -== Event Post MSG ==- //
//if($_GET['op1'] == 'admincp' && $_SESSION['admin_panel'] == 'ok') {} else {
//$event_msg_post = $mvcorex->prepare("select top 3 title,message,game_master,expire_date from MVCore_Event_Post where expire_date >= '".time()."' order by expire_date desc");
//$event_msg_post->fetchAll(PDO::FETCH_ASSOC);
//$event_msg_post->execute();
//    print_r($event_msg_post);
//for($i=0;$i < mssql_num_rows($event_msg_post);++$i) {
//$event_msg_post_out = mssql_fetch_row($event_msg_post);
//$decDate = decode_time(time(),$event_msg_post_out[3],'short','');
//
//	if($i == '0' && $event_msg_post_out[3] >= time()){
//		echo '<div id="msg_event_post_one" class="mvcore-nNote mvcore-nAnnouncement"><b>'.$event_msg_post_out[0].'</b> ( In '.$decDate.') <font style="float:right;" size="1"><u>'.$event_msg_post_out[2].'</u></font><br>'.$event_msg_post_out[1].'</div>';
//	};
//
//	if($i == '1' && $event_msg_post_out[3] >= time()){
//		echo '<div id="msg_event_post_two" class="mvcore-nNote mvcore-nAnnouncement"><b>'.$event_msg_post_out[0].'</b> ( In '.$decDate.') <font style="float:right;" size="1"><u>'.$event_msg_post_out[2].'</u></font><br>'.$event_msg_post_out[1].'</div>';
//	};
//
//	if($i == '2' && $event_msg_post_out[3] >= time()){
//		echo '<div id="msg_event_post_tri" class="mvcore-nNote mvcore-nAnnouncement"><b>'.$event_msg_post_out[0].'</b> ( In '.$decDate.') <font style="float:right;" size="1"><u>'.$event_msg_post_out[2].'</u></font><br>'.$event_msg_post_out[1].'</div>';
//	};
//
//};
//}

//------------------------------------------------------------------
// -== Database Switch System ==- //
if($_GET['op1'] == 'admincp' && $_SESSION['admin_panel'] == 'ok') {} else {
if($mvcore['multi_dbs_supp'] == 'on') {
	if($mvcore['multi_dbs_app_t_sw'] == 'switleft') { 
		echo '<div id="sw_db_sys_left" class="mvcore-nNote mvcore-nAnnouncement"><form action="" method="POST"><select name="database_load" class="mvcore-select-main" onchange="this.form.submit()" style="width:100% !important;">';
		$cmulti_dbs = explode(',',$mvcore['multi_dbs_names']);
		$cmulti_dbs_titl = explode(',',$mvcore['multi_dbs_titlen']);
		for($i=0;$i < count($cmulti_dbs);++$i) {
			if($_SESSION['database_load']==$cmulti_dbs[$i]){ $opdsvgf[$i] = 'selected'; }else{ $opdsvgf[$i] = ''; };
			echo '<option value="'.$cmulti_dbs[$i].'" '.$opdsvgf[$i].'>'.$cmulti_dbs_titl[$i].'</option>';
		};
		echo '</select></form></div>'; 
	};
	if($mvcore['multi_dbs_app_t_sw'] == 'switright') { 
		echo '<div id="sw_db_sys_right" class="mvcore-nNote mvcore-nAnnouncement"><form action="" method="POST"><select name="database_load" class="mvcore-select-main" onchange="this.form.submit()" style="width:100% !important;">';
		$cmulti_dbs = explode(',',$mvcore['multi_dbs_names']);
		$cmulti_dbs_titl = explode(',',$mvcore['multi_dbs_titlen']);
		for($i=0;$i < count($cmulti_dbs);++$i) {
			if($_SESSION['database_load']==$cmulti_dbs[$i]){ $opdsvgf[$i] = 'selected'; }else{ $opdsvgf[$i] = ''; };
			echo '<option value="'.$cmulti_dbs[$i].'" '.$opdsvgf[$i].'>'.$cmulti_dbs_titl[$i].'</option>';
		};
		echo '</select></form></div>'; 
	};
};
};
//------------------------------------------------------------------
// -== Castle Siege CountDown Output ==- //
if($_GET['op1'] == 'admincp' && $_SESSION['admin_panel'] == 'ok') {} else {
	if($mvcore['siege_show_countdown'] == 'yes') {
			$siege_Start =$mvcore['siege_start_time'] * 3600;
			$siege_End =$mvcore['siege_end_time']  * 3600;
		$cs_drop_datas = $mvcorex->prepare("select Siege_End_Date From MuCastle_Data");
		$cs_drop_data = $cs_drop_datas->fetchAll();
		$cs_time_date = strtotime($cs_drop_data[0]) - 86400 + $siege_Start;
		$cs_time_date2 = strtotime($cs_drop_data[0]) - 86400 + $siege_End;

		$decDateCS = decode_time(time(),$cs_time_date,'large','<font color="green">Siege Started</font>');
		
		if($cs_time_date2 <= time()) {} else {
			echo '<div id="msg_cs_event" class="mvcore-nNote mvcore-nAnnouncement"><font size="4"><b>Castle Siege </b> (<font color="red">'.$decDateCS.'</font>)</font></div>';
		}
		
	};
}
?>
		<?php
			//LOAD PAGES
			$sub_page = !$_GET['op1'] ? "News" : $_GET['op1']; $mwr_acps=3;
			$sub_pagegm = !$_GET['op2'] ? "Ban_System" : $_GET['op2'];
			$sub_pageuser = !$_GET['op2'] ? "Reset_Character" : $_GET['op2'];
			$sub_pageadmin = !$_GET['op2'] ? "Main_Settings" : $_GET['op2'];

			if($_GET['op1'] == 'admincp' && $_SESSION['admin_panel'] == 'ok'){ $pages = 'admincp/'.clean_variable($sub_pageadmin).''; } 
			elseif($_GET['op1'] == 'gm_cp' && $_SESSION['gm_panel'] == 'ok'){ $pages = 'pages/gmcp/'.clean_variable($sub_pagegm).''; }
			elseif($_GET['op1'] == 'user_cp' && $_SESSION['user_login'] == 'ok'){ $pages = 'pages/usercp/'.clean_variable($sub_pageuser).''; }
			else{ $pages = 'pages/'.clean_variable($sub_page).''; };

			if (is_file("".$pages.".php")){ include("".$pages.".php"); }else{ echo '<center>'.eng_page_not_found.'</center>'; };
			$mwr_acps=1; //END 
		?>
<?php if($_GET['op1'] == 'admincp' && $_SESSION['admin_panel'] == 'ok'){ } else { ?>	
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js' type='text/javascript'></script>
<style>
#fanback {
display:none;
background:rgba(0,0,0,0.8);
width:100%;
height:100%;
position:fixed;
top:0;
left:0;
z-index:99999;
}
#fan-exit {
width:100%;
height:100%;
}
#JasperRoberts {
background:white;
width:402px;
height:270px;
position:absolute;
top:58%;
left:63%;
margin:-220px 0 0 -375px;
-webkit-box-shadow: inset 0 0 50px 0 #939393;
-moz-box-shadow: inset 0 0 50px 0 #939393;
box-shadow: inset 0 0 50px 0 #939393;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
margin: -220px 0 0 -375px;
}
#TheBlogWidgets {
float:right;
cursor:pointer;
background:url(http://3.bp.blogspot.com/-NRmqfyLwBHY/T4nwHOrPSzI/AAAAAAAAAdQ/8b9O7O1q3c8/s1600/TheBlogWidgets.png) repeat;
height:15px;
padding:20px;
position:relative;
padding-right:40px;
margin-top:-20px;
margin-right:-22px;
}
.remove-borda {
height:1px;
width:366px;
margin:0 auto;
background:#F3F3F3;
margin-top:16px;
position:relative;
margin-left:20px;
}
#linkit,#linkit a.visited,#linkit a,#linkit a:hover {
color:#80808B;
font-size:10px;
margin: 0 auto 5px auto;
float:center;
}
fieldset {
	width: 370px;
	display: block; /* IE 7 Requires This */
}
.group{
	content:"";
	list-style: none;
	display:table;
	clear:both;
}
.pollbar{
	height:15px;
	margin:0 0 10px 0;
	background:<?php echo''.$mvcore['button_s_bgtcolor'].'';?>;
}
button,input,select,textarea{font-size:100%;margin:0;vertical-align:baseline;*vertical-align:middle}
button,input{line-height:normal}
button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}
button[disabled],input[disabled]{cursor:default}
input[type="checkbox"],input[type="radio"]{padding:0}
input[type="search"]{-webkit-appearance:textfield}
input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}
button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}
textarea{overflow:auto;vertical-align:top}
</style>
 
 
<script type='text/javascript'>
//<![CDATA[
jQuery.cookie = function (key, value, options) {
 
// key and at least value given, set cookie...
if (arguments.length > 1 && String(value) !== "[object Object]") {
options = jQuery.extend({}, options);
 
if (value === null || value === undefined) {
options.expires = -1;
}
 
if (typeof options.expires === 'number') {
var days = options.expires, t = options.expires = new Date();
t.setDate(t.getDate() + days);
}
 
value = String(value);
 
return (document.cookie = [
encodeURIComponent(key), '=',
options.raw ? value : encodeURIComponent(value),
options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
options.path ? '; path=' + options.path : '',
options.domain ? '; domain=' + options.domain : '',
options.secure ? '; secure' : ''
].join(''));
}
 
// key and possibly options given, get cookie...
options = value || {};
var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};
//]]>
</script>
<?php if($mvcore['poll_cookie_show'] == '1') { $datexp = explode('.',$mvcore['surl']); $sysnum = ''.$datexp[1].''.$mvcore['poll_cookie_rand'].''; } else { $sysnum = '59jh55h4'; } ?>
<script type='text/javascript'>
jQuery(document).ready(function($){
if($.cookie('popup_poll_system_<?php echo $sysnum;?>') != 'yes'){
$('#fanback').delay(<?php echo $mvcore['poll_cookie_depay'];?>).fadeIn('medium');
$('#TheBlogWidgets, #fan-exit').click(function(){
$('#fanback').stop().fadeOut('medium');
});
}
<?php if($mvcore['poll_cookie_show'] == '1') { ?>
	$.cookie('popup_poll_system_<?php echo $sysnum;?>', 'yes', { path: '/', expires: 7 });
<?php } ?>
});
</script>
 
<?php
//Percent Calculation
$c_percent_vote1 = round(($mvcore['poll_db_vote1_points'] * 100 ) / $mvcore['poll_db_vote_total_points']);
$c_percent_vote2 = round(($mvcore['poll_db_vote2_points'] * 100 ) / $mvcore['poll_db_vote_total_points']);
$c_percent_vote3 = round(($mvcore['poll_db_vote3_points'] * 100 ) / $mvcore['poll_db_vote_total_points']);
$c_percent_vote4 = round(($mvcore['poll_db_vote4_points'] * 100 ) / $mvcore['poll_db_vote_total_points']);
?>
<?php if($mvcore['poll_cookie_visit'] == '1' || $_SESSION['user_login'] == 'ok' && $mvcore['poll_cookie_visit'] == '2') { ?>
<?php if($mvcore['poll_onoff'] == 'on') { ?>
<div id='fanback'>
	<div id='fan-exit'>
	</div>
	<div id='JasperRoberts'>
		<div id='TheBlogWidgets'>
		</div>
		<center><div id="errorDrop"></div>
			<fieldset>
				<legend style="font-size:20px;"><?php echo $mvcore['poll_question'];?></legend>
					<div style="text-align:left;width:100%;height:100%;">
						<?php if($mvcore['poll_answer_1'] != '') { ?>
							<div>
								<input type="radio" id="Poll_h53h4" name="Poll_h53h4" value="1" /> <span><?php echo $mvcore['poll_answer_1'];?></span>
								<small>(<?php echo $c_percent_vote1;?>%, <?php echo $mvcore['poll_db_vote1_points'];?> Votes)</small>
								<div class="pollbar" style="width: <?php echo $c_percent_vote1;?>%;" title="<?php echo $mvcore['poll_answer_1'];?>. (<?php echo $c_percent_vote1;?>% | <?php echo $mvcore['poll_db_vote1_points'];?> Votes)"></div>
							</div>
						<?php } ?>
						<?php if($mvcore['poll_answer_2'] != '') { ?>
							<div>
								<input type="radio" id="Poll_h53h4" name="Poll_h53h4" value="2" /> <span><?php echo $mvcore['poll_answer_2'];?></span> 
								<small>(<?php echo $c_percent_vote2;?>%, <?php echo $mvcore['poll_db_vote2_points'];?> Votes)</small>
								<div class="pollbar" style="width: <?php echo $c_percent_vote2;?>%;" title="<?php echo $mvcore['poll_answer_2'];?>. (<?php echo $c_percent_vote2;?>% | <?php echo $mvcore['poll_db_vote2_points'];?> Votes)"></div>
							</div>
						<?php } ?>
						<?php if($mvcore['poll_answer_3'] != '') { ?>
							<div>
								<input type="radio" id="Poll_h53h4" name="Poll_h53h4" value="3" /> <span><?php echo $mvcore['poll_answer_3'];?></span>
								<small>(<?php echo $c_percent_vote3;?>%, <?php echo $mvcore['poll_db_vote3_points'];?> Votes)</small>
								<div class="pollbar" style="width: <?php echo $c_percent_vote3;?>%;" title="<?php echo $mvcore['poll_answer_3'];?>. (<?php echo $c_percent_vote3;?>% | <?php echo $mvcore['poll_db_vote3_points'];?> Votes)"></div>
							</div>
						<?php } ?>
						<?php if($mvcore['poll_answer_4'] != '') { ?>
							<div>
								<input type="radio" id="Poll_h53h4" name="Poll_h53h4" value="4" /> <span><?php echo $mvcore['poll_answer_4'];?></span>
								<small>(<?php echo $c_percent_vote4;?>%, <?php echo $mvcore['poll_db_vote4_points'];?> Votes)</small>
								<div class="pollbar" style="width: <?php echo $c_percent_vote4;?>%;" title="<?php echo $mvcore['poll_answer_4'];?>. (<?php echo $c_percent_vote4;?>% | <?php echo $mvcore['poll_db_vote4_points'];?> Votes)"></div>
							</div>
						<?php } ?>
					</ul>
					</div>
			</fieldset>
		</center>
		<div align="center" style="margin-top:-20px;"><button onclick="sahrheehyrtkr(); return false;" class="mvcore-button-style" name="Poll_jh223h2" style="margin-top:5px;cursor:pointer" type="submit">   Cast My Vote   </button></div>
	</div>
</div>
<script>
	function sahrheehyrtkr() {
		var getAllValues = $("#Poll_h53h4:checked").val();
			$.post("acps.php", {
				Poll_h53h4: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
				window.location.href = "-id-News.html";
			});	
	};
</script>
<?php } ?>
<?php } ?>
<?php } ?>