
<?php if($mvcore['Webshop'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<?php

if($_GET['op1'] == 'webshop' && $_GET['op3'] != 'sc' || $_GET['op1'] == 'Webshop' && $_GET['op3'] != 'sc') {
    $_SESSION['webshop_allow_reload'] = '0';

};

if(isset($_POST['mainSubmitData'])){

//checking all

	$link_get = $_POST['linkdata'];
	$item_name = $_POST['name'];
	$item_id = $_POST['ids'];
	$item_cat = $_POST['cat'];
	$item_refin = $_POST['refin'];
	$item_anc = $_POST['anc'];
	$item_skill = $_POST['skill'];
	$item_luck = $_POST['luck'];
	$item_level = $_POST['level'];
	
	if($mvcore['max_exc_opt'] <= $_POST['exc']) {
	    $item_exc = $mvcore['max_exc_opt'];

	} else {
	    $item_exc = $_POST['exc'];

	};

	if($mvcore['max_sock_opt'] <= $_POST['sk']) {
	    $item_sk = $mvcore['max_sock_opt'];

	} else {
	    $item_sk = $_POST['sk'];

	};
	
	
	if($mvcore['w_exc_refin_item'] == 'no' && $item_refin >= '1') {
	    $item_exc = 0;
	}; // Item 380
	
	$sanci = $mvcorex->prepare("Select anc_name from MVCore_Wshopp_Ancient where item_id='".$item_id."' and item_cat='"
        .$item_cat
        ."'");
	$stmt = $sanci->execute();
	$stmt = $sanci->fetch();
	$sanci= $stmt;

	if($mvcore['w_exc_anc_item'] == 'no' && $sanci[0] != '') {
	    $item_exc = 0;
	}; // Ancient.
	
	if($mvcore['w_harm_anc_item'] == 'no' && $sanci[0] != '') {
	    $item_harms = 0;
	}; // Ancient.

$check_item = $mvcorex->prepare("Select item_name, item_cost, zen_cost, can_buy_w_money2, can_buy_w_money1, can_buy_w_zen, is_harmony, bought_count, category, id, is_socket, is_ancient  
from MVCore_Wshopp  
where item_name='".$item_name."' 
and category='".$item_cat."'");
$stmt = $check_item->execute();
$stmt = $check_item->fetch();
$check_item_ok = $stmt;

if($check_item_ok[8] == 13 && $check_item_ok[9] >= 8 && $check_item_ok[9] <= 9 || $check_item_ok[8] == 13 && $check_item_ok[9] >= 21 && $check_item_ok[9] <= 24 || $check_item_ok[8] == 13 && $check_item_ok[9] >= 12 && $check_item_ok[9] <= 13 || $check_item_ok[8] == 13 && $check_item_ok[9] >= 25 && $check_item_ok[9] <= 28) {
	$item_luck = '0';
};

if($mvcore['socket_exc_item'] == 'no' && $check_item_ok[10] >= '1') {
    $item_exc = 0;
}; // Excellent disable if Socket item.

if($mvcore['sockets_parts'] == 'no') {
    $drop_sockets = 'where type >= 1 and sok_on_off = 1';

}
elseif($item_cat >= '0' && $item_cat <= '5' ) {
    $drop_sockets = 'where type = 1 and sok_on_off = 1';

}
elseif($item_cat >= '6' && $item_cat <= '11' ) {
    $drop_sockets = 'where type = 2 and sok_on_off = 1';

};
if($pvsWebshop != 'ok4722') {
    exit;

};
$calc_gold_cost = $check_item_ok[1] + ((- $mvcore['gold_dif'] * $check_item_ok[1]) / 100) ;
$zen_cost = $check_item_ok[1] * $mvcore['cost_cred_to_zen'];

//allow buy with ?
if($check_item_ok[3] == '1') {
    $drop_costshow_gcred = '<tr><td>'.$mvcore['money_name2'].':</td><td><b><span id="total_credits_g">'.floor($calc_gold_cost).'</span></b></td></tr>';

};
if($mvcore['cost_cred_to_creda'] == 'yes') {
    $drop_costshow_cred = '<tr><td>'.$mvcore['money_name1'].':</td><td><b><span id="total_credits">'.$check_item_ok[1].'</span></b></td></tr>';

};
if($mvcore['cost_cred_to_zena'] == 'yes') {
    $drop_costshow_zen = '<tr><td>Zen:</td><td><b><span id="total_zen">'.$zen_cost.'</span></b></td></tr>';

};

if($check_item_ok[3] == '1') {
    $drop_cost_gcred = '<button id="gcred" class="mvcore-button-style" name="buygoldcred">'.main_p_webshop_buywith.' '.$mvcore['money_name2'].'</button>';

};
if($mvcore['cost_cred_to_creda'] == 'yes') {
    $drop_cost_cred = '<button id="tokens" class="mvcore-button-style" name="buycred">'.main_p_webshop_buywith.' '.$mvcore['money_name1'].'</button>';

};
if($mvcore['cost_cred_to_zena'] == 'yes') {
    $drop_cost_zen = '<button id="tokens" class="mvcore-button-style" name="buyzen">'.main_p_webshop_buywith.' Zen</button>';

};
//end allow buy
		
//---------------------
if($check_item_ok[11] == '1'){ // Ancient Column used for Addition option ^^
if($check_item_ok[8] >= 0 && $check_item_ok[8] <= 4 && $mvcore['max_ad_opt_jof'] >= '1') { // Swords, Axe, Spears, Mace, Scepters, Bows, Crossbows
$drop_ad_opt = '
				<select style="width:95% !important;" class="mvcore-select-main" id="item_opt" onchange="checkall();" name="item_opt">
					<option value="0" selected="selected">Additional Damage + 0</option>
					'; if($mvcore['max_ad_opt_jof'] >= '1') {
					    $drop_ad_opt .= '<option value="1">Additional Damage + 4</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '2') {
					    $drop_ad_opt .= '<option value="2">Additional Damage + 8</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '3') {
					    $drop_ad_opt .= '<option value="3">Additional Damage + 12</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '4') {
					    $drop_ad_opt .= '<option value="4">Additional Damage + 16</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '5') {
					    $drop_ad_opt .= '<option value="5">Additional Damage + 20</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '6') {
					    $drop_ad_opt .= '<option value="6">Additional Damage + 24</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '7') {
					    $drop_ad_opt .= '<option value="7">Additional Damage + 28</option>';

					};
					$drop_ad_opt .= '
			</select>
';} elseif($check_item_ok[8] == 13 && $check_item_ok[9] == 30 && $mvcore['max_ad_opt_jof'] >= '1' || $check_item_ok[8] >= 6 && $check_item_ok[8] <= 11 && $mvcore['max_ad_opt_jof'] >= '1' || $check_item_ok[8] == 12 && $check_item_ok[9] >= 0 && $check_item_ok[9] <= 6 && $mvcore['max_ad_opt_jof'] >= '1') { // Shield, Set Items, Wings Level 1 , Wings level 2
$drop_ad_opt = '
				<select style="width:95% !important;" class="mvcore-select-main" id="item_opt" onchange="checkall();" name="item_opt">
					<option value="0" selected="selected">Additional Defense + 0</option>
					'; if($mvcore['max_ad_opt_jof'] >= '1') {
					    $drop_ad_opt .= '<option value="1">Additional Defense + 4</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '2') {
					    $drop_ad_opt .= '<option value="2">Additional Defense + 8</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '3') {
					    $drop_ad_opt .= '<option value="3">Additional Defense + 12</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '4') {
					    $drop_ad_opt .= '<option value="4">Additional Defense + 16</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '5') {
					    $drop_ad_opt .= '<option value="5">Additional Defense + 20</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '6') {
					    $drop_ad_opt .= '<option value="6">Additional Defense + 24</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '7') {
					    $drop_ad_opt .= '<option value="7">Additional Defense + 28</option>';

					};
					$drop_ad_opt .= '
			</select>
';} elseif($check_item_ok[8] == 5 && $mvcore['max_ad_opt_jof'] >= '1') { // Stafs
$drop_ad_opt = '
				<select style="width:95% !important;" class="mvcore-select-main" id="item_opt" onchange="checkall();" name="item_opt">
					<option value="0" selected="selected">Additional Wizardry DMG + 0</option>
					'; if($mvcore['max_ad_opt_jof'] >= '1') {
					    $drop_ad_opt .= '<option value="1">Additional Wizardry DMG + 4</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '2') {
					    $drop_ad_opt .= '<option value="2">Additional Wizardry DMG + 8</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '3') {
					    $drop_ad_opt .= '<option value="3">Additional Wizardry DMG + 12</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '4') {
					    $drop_ad_opt .= '<option value="4">Additional Wizardry DMG + 16</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '5') {
					    $drop_ad_opt .= '<option value="5">Additional Wizardry DMG + 20</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '6') {
					    $drop_ad_opt .= '<option value="6">Additional Wizardry DMG + 24</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '7') {
					    $drop_ad_opt .= '<option value="7">Additional Wizardry DMG + 28</option>';

					};
					$drop_ad_opt .= '
			</select>
';} elseif($check_item_ok[8] == 12 && $check_item_ok[9] >= 36 && $check_item_ok[9] <= 43 && $mvcore['max_ad_opt_jof'] >= '1' || 
$check_item_ok[8] == 12 && $check_item_ok[9] >= 49 && $check_item_ok[9] <= 50 && $mvcore['max_ad_opt_jof'] >= '1' || 
$check_item_ok[8] == 12 && $check_item_ok[9] >= 262 && $check_item_ok[9] <= 267 && $mvcore['max_ad_opt_jof'] >= '1') { // Wings level 3
$drop_ad_opt = '
				<select style="width:95% !important;" class="mvcore-select-main" id="item_opt" onchange="checkall();" name="item_opt">
					<option value="0" selected="selected">Automatic HP Recovery + 0</option>
					'; if($mvcore['max_ad_opt_jof'] >= '1') {
					    $drop_ad_opt .= '<option value="1">Automatic HP Recovery + 1%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '2') {
					    $drop_ad_opt .= '<option value="2">Automatic HP Recovery + 2%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '3') {
					    $drop_ad_opt .= '<option value="3">Automatic HP Recovery + 3%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '4') {
					    $drop_ad_opt .= '<option value="4">Automatic HP Recovery + 4%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '5') {
					    $drop_ad_opt .= '<option value="5">Automatic HP Recovery + 5%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '6') {
					    $drop_ad_opt .= '<option value="6">Automatic HP Recovery + 6%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '7') {
					    $drop_ad_opt .= '<option value="7">Automatic HP Recovery + 7%</option>';

					};
					$drop_ad_opt .= '
			</select>
';} elseif($check_item_ok[8] == 13 && $check_item_ok[9] == 24 && $mvcore['max_ad_opt_jof'] >= '1') { // Rings of Magic
$drop_ad_opt = '
				<select style="width:95% !important;" class="mvcore-select-main" id="item_opt" onchange="checkall();" name="item_opt">
					<option value="0" selected="selected">Max Mana Increase + 0</option>
					'; if($mvcore['max_ad_opt_jof'] >= '1') {
					    $drop_ad_opt .= '<option value="1">Max Mana Increase + 1%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '2') {
					    $drop_ad_opt .= '<option value="2">Max Mana Increase + 2%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '3') {
					    $drop_ad_opt .= '<option value="3">Max Mana Increase + 3%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '4') {
					    $drop_ad_opt .= '<option value="4">Max Mana Increase + 4%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '5') {
					    $drop_ad_opt .= '<option value="5">Max Mana Increase + 5%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '6') {
					    $drop_ad_opt .= '<option value="6">Max Mana Increase + 6%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '7') {
					    $drop_ad_opt .= '<option value="7">Max Mana Increase + 7%</option>';

					};
					$drop_ad_opt .= '
			</select>
';} elseif($check_item_ok[8] == 13 && $check_item_ok[9] >= 8 && $check_item_ok[9] <= 9 && $mvcore['max_ad_opt_jof'] >= '1' || 
$check_item_ok[8] == 13 && $check_item_ok[9] >= 12 && $check_item_ok[9] <= 13 && $mvcore['max_ad_opt_jof'] >= '1' || 
$check_item_ok[8] == 13 && $check_item_ok[9] >= 21 && $check_item_ok[9] <= 28 && $mvcore['max_ad_opt_jof'] >= '1') { // Rings, Pendant
$drop_ad_opt = '
				<select style="width:95% !important;" class="mvcore-select-main" id="item_opt" onchange="checkall();" name="item_opt">
					<option value="0" selected="selected">Automatic HP Recovery + 0</option>
					'; if($mvcore['max_ad_opt_jof'] >= '1') {
					    $drop_ad_opt .= '<option value="1">Automatic HP Recovery + 1%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '2') {
					    $drop_ad_opt .= '<option value="2">Automatic HP Recovery + 2%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '3') {
					    $drop_ad_opt .= '<option value="3">Automatic HP Recovery + 3%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '4') {
					    $drop_ad_opt .= '<option value="4">Automatic HP Recovery + 4%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '5') {
					    $drop_ad_opt .= '<option value="5">Automatic HP Recovery + 5%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '6') {
					    $drop_ad_opt .= '<option value="6">Automatic HP Recovery + 6%</option>';

					};
					if($mvcore['max_ad_opt_jof'] >= '7') {
					    $drop_ad_opt .= '<option value="7">Automatic HP Recovery + 7%</option>';

					};
					$drop_ad_opt .= '
			</select>
';} else { $drop_ad_opt = ''; };
};
if($pvsWebshop != 'ok4722') { exit; };

?>
<script>
function checkall(){
//Separator ^^ -------------------------------------------------------------------------------------------------
		if($('#socket1 option:selected').length && $('#socket1 option:selected').val() != 'no'){
			$(document).ready(function(){
				$.post("acps.php", {
					s_option: $('#socket1 option:selected').val(),			
				},
				function(data) {
					$('#credits_socket1').html("<b>"+parseInt(data)+"</b>");
					credits = credits + parseInt(data);
					setPrice(credits);
					zen = zen + parseInt(data) * parseInt(zenCalc) ;
					setPriceZen(zen);
				});
			});	
			removeOpt(1);	
		}
		if($('#socket2 option:selected').length && $('#socket2 option:selected').val() != 'no'){
			$(document).ready(function(){
				$.post("acps.php", {
					s_option: $('#socket2 option:selected').val(),			
				},
				function(data) {
					$('#credits_socket2').html("<b>"+parseInt(data)+"</b>");
					credits = credits + parseInt(data);
					setPrice(credits);
					zen = zen + parseInt(data) * parseInt(zenCalc) ;
					setPriceZen(zen);
				});
			});	
			removeOpt(2);	
		}
		if($('#socket3 option:selected').length && $('#socket3 option:selected').val() != 'no'){
			$(document).ready(function(){
				$.post("acps.php", {
					s_option: $('#socket3 option:selected').val(),			
				},
				function(data) {
					$('#credits_socket3').html("<b>"+parseInt(data)+"</b>");
					credits = credits + parseInt(data);
					setPrice(credits);
					zen = zen + parseInt(data) * parseInt(zenCalc) ;
					setPriceZen(zen);
				});
			});	
			removeOpt(3);	
		}
		if($('#socket4 option:selected').length && $('#socket4 option:selected').val() != 'no'){
			$(document).ready(function(){
				$.post("acps.php", {
					s_option: $('#socket4 option:selected').val(),			
				},
				function(data) {
					$('#credits_socket4').html("<b>"+parseInt(data)+"</b>");
					credits = credits + parseInt(data);
					setPrice(credits);
					zen = zen + parseInt(data) * parseInt(zenCalc) ;
					setPriceZen(zen);
				});
			});	
			removeOpt(4);	
		}
		if($('#socket5 option:selected').length && $('#socket5 option:selected').val() != 'no'){
			$(document).ready(function(){
				$.post("acps.php", {
					s_option: $('#socket5 option:selected').val(),			
				},
				function(data) {
					$('#credits_socket5').html("<b>"+parseInt(data)+"</b>");
					credits = credits + parseInt(data);
					setPrice(credits);
					zen = zen + parseInt(data) * parseInt(zenCalc) ;
					setPriceZen(zen);
				});
			});	
			removeOpt(5);		
		}
}

function removeOpt(socket){
		if($('#socket'+socket+' option:selected').val() != '254' && $('#socket'+socket+' option:selected').val() != 'no'){
			for(i = 1; i <= 5; i++){
				if(i == socket)
					i += 1;
				
				var eqeSocketsdd = '<?php echo $mvcore['eqe_sockets'];?>';
				
				if(eqeSocketsdd == 'yes') {
				} else {
					$("#socket"+i+" > option[value='"+$('#socket'+socket+' option:selected').val()+"']").remove();
					$("#socket"+i+" > option[value='"+$('#socket'+socket+' option:selected').val()+"']").remove();
					$("#socket"+i+" > option[value='"+$('#socket'+socket+' option:selected').val()+"']").remove();
					$("#socket"+i+" > option[value='"+$('#socket'+socket+' option:selected').val()+"']").remove();
				}
			}
		}		
}

$(document).ready(function (){
$('#item_luck').on('click keyup keydown', function() { if($('#item_luck').attr("checked")) { $('#item_luck').attr('checked', false); } else { $('#item_luck').attr('checked', true); }; });
$('#item_skill').on('click keyup keydown', function() { if($('#item_skill').attr("checked")) { $('#item_skill').attr('checked', false); } else { $('#item_skill').attr('checked', true); }; });
$('#item_ref').on('click keyup keydown', function() { if($('#item_ref').attr("checked")) { $('#item_ref').attr('checked', false); } else { $('#item_ref').attr('checked', true); }; });
$('#ex1').on('click keyup keydown', function() { if($('#ex1').attr("checked")) { $('#ex1').attr('checked', false); } else { $('#ex1').attr('checked', true); }; });
$('#ex2').on('click keyup keydown', function() { if($('#ex2').attr("checked")) { $('#ex2').attr('checked', false); } else { $('#ex2').attr('checked', true); }; });
$('#ex3').on('click keyup keydown', function() { if($('#ex3').attr("checked")) { $('#ex3').attr('checked', false); } else { $('#ex3').attr('checked', true); }; });
$('#ex4').on('click keyup keydown', function() { if($('#ex4').attr("checked")) { $('#ex4').attr('checked', false); } else { $('#ex4').attr('checked', true); }; });
$('#ex5').on('click keyup keydown', function() { if($('#ex5').attr("checked")) { $('#ex5').attr('checked', false); } else { $('#ex5').attr('checked', true); }; });
$('#ex6').on('click keyup keydown', function() { if($('#ex6').attr("checked")) { $('#ex6').attr('checked', false); } else { $('#ex6').attr('checked', true); }; });

$('#div_item_luck').click(function (e){ var cur = $(this).find('input[type=checkbox]'); if(cur.prop("checked")) { $(this).find('input[type=checkbox]').prop("checked", false); } else { $(this).find('input[type=checkbox]').prop("checked", true); } checkall(); });
$('#div_item_skill').click(function (e){ var cur = $(this).find('input[type=checkbox]'); if(cur.prop("checked")) { $(this).find('input[type=checkbox]').prop("checked", false); } else { $(this).find('input[type=checkbox]').prop("checked", true); } checkall(); });
$('#div_item_ref').click(function (e){ var cur = $(this).find('input[type=checkbox]'); if(cur.prop("checked")) { $(this).find('input[type=checkbox]').prop("checked", false); } else { $(this).find('input[type=checkbox]').prop("checked", true); } checkall(); });
$('#div_item_opt1').click(function (e){ var cur = $(this).find('input[type=checkbox]'); if(cur.prop("checked")) { $(this).find('input[type=checkbox]').prop("checked", false); } else { $(this).find('input[type=checkbox]').prop("checked", true); } checkall(); });
$('#div_item_opt2').click(function (e){ var cur = $(this).find('input[type=checkbox]'); if(cur.prop("checked")) { $(this).find('input[type=checkbox]').prop("checked", false); } else { $(this).find('input[type=checkbox]').prop("checked", true); } checkall(); });
$('#div_item_opt3').click(function (e){ var cur = $(this).find('input[type=checkbox]'); if(cur.prop("checked")) { $(this).find('input[type=checkbox]').prop("checked", false); } else { $(this).find('input[type=checkbox]').prop("checked", true); } checkall(); });
$('#div_item_opt4').click(function (e){ var cur = $(this).find('input[type=checkbox]'); if(cur.prop("checked")) { $(this).find('input[type=checkbox]').prop("checked", false); } else { $(this).find('input[type=checkbox]').prop("checked", true); } checkall(); });
$('#div_item_opt5').click(function (e){ var cur = $(this).find('input[type=checkbox]'); if(cur.prop("checked")) { $(this).find('input[type=checkbox]').prop("checked", false); } else { $(this).find('input[type=checkbox]').prop("checked", true); } checkall(); });
$('#div_item_opt6').click(function (e){ var cur = $(this).find('input[type=checkbox]'); if(cur.prop("checked")) { $(this).find('input[type=checkbox]').prop("checked", false); } else { $(this).find('input[type=checkbox]').prop("checked", true); } checkall(); });
});

function clearSelection() {
  var sel ;
  if(document.selection && document.selection.empty){
    document.selection.empty() ;
  } else if(window.getSelection) {
    sel=window.getSelection();
    if(sel && sel.removeAllRanges)
      sel.removeAllRanges() ;
  }
}
$(document).ready(function (){ 
	$('div').click(clearSelection);
});
</script>
<style>
.unselectable {
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
}
</style>
<?php if($mvcore['shop_disc'] == 'on'){
    if($mvcore['shop_disc_start'] != 1) {
        echo'<div style="text-align:left;"><div><b>'.main_p_webshop_discstart.' '.$OutPutDateOfDisct.' '.main_p_webshop_at.' '.date("h:i A",$mvcore['shop_start_at']).'</b></div></div>'; }

}; ?>
<?php if($mvcore['shop_disc'] == 'on'){
    if($mvcore['shop_disc_start'] == 1) {
        echo'<center><div><b>'.main_p_webshop_webshdisc.' '.$mvcore['shop_perc'].'% '.main_p_webshop_foronehour.'</b></div></center>'; }

}; ?>
<?php if($mvcore['web_shop_disc_vip'] > '0' && $mvcore['vip_sys_active'] == '1'){
    echo'<center><div><b>'.main_p_webshop_webshopdiscount.' '.$mvcore['web_shop_disc_vip'].'% '.main_p_webshop_forviponly.'</b></div></center>';

}; ?>
<center>
<div id="supitemchc">
<form method="POST" action="-id-<?php echo $_GET['op1'];?>-id-<?php echo $_GET['op2'];?>-id-sc.html" id="item_form">
<input type="hidden" id="buy_item" name="buy_item" value="<?php echo $check_item_ok[0];?>">
<table class="mvcore-table" cellpadding="0" cellspacing="0">
											
	<tr>
		<td colspan="4"><?php echo''.$item_name.''; ?></td>
	</tr>
										
	<tr>
		<td rowspan="4" colspan="2">
			<?php 
				if (file_exists("system/engine_images/webshop/item_images/".$item_cat."/".$item_id.".gif")) { 
					$image_load = "system/engine_images/webshop/item_images/".$item_cat."/".$item_id.".gif"; 
				} else { 
					$image_load = 'system/engine_images/webshop/item_images/no-img.gif'; 
				};
			?>
			<img src="<?php echo $image_load ;?>" alt="" style="border: 0px;">
		</td>
	</tr>
	
	<tr>
		<td><?php echo main_p_webshop_bought;?>:</td>
		<td><b><span id="total_bought"><?php echo $check_item_ok[7];?></span> <?php echo main_p_webshop_times;?></b></td>
	</tr>
	<?php echo $drop_costshow_gcred;?>
	<?php echo $drop_costshow_cred;?>
	<?php echo $drop_costshow_zen;?>											
</table>
<div style="width:100%;">
	<div style="margin:10px 0px;" class="unselectable">
											<?php if($check_item_ok[8] == 12 && $check_item_ok[9] >= 200 && $check_item_ok[9] <= 214 && $mvcore['pentagram_it_max_lev'] >= '1') { ?>
													<select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="0" selected="selected">Level + 0</option>
																<?php
                                                                for ($i = 0; $i < 16; ++$i) {
																		$value = $i + 1;
																		if($value > $mvcore['pentagram_it_max_lev']) {

                                                                        } else {
																			echo'<option value="'.$value.'">Level + '.$value.'</option>';
																		}
																	};
																?>
													</select>
											<?php } ?>
											
											<?php if($item_level >= '1' && $mvcore['it_max_lev'] >= '1') { ?>

													<select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="0" selected="selected">Level + 0</option>
																<?php
                                                                for ($i = 0; $i < 16; ++$i) {
																		$value = $i + 1;
																		if($value > $mvcore['it_max_lev']) {

                                                                        } else {
																			echo'<option value="'.$value.'">Level + '.$value.'</option>';
																		}
																	};
																?>
													</select>
							
											<?php } ?>
											
										<?php if($mvcore['db_season'] >= '8') { ?>
										
											<?php if($check_item_ok[8] == 12 && $check_item_ok[9] == 60) {?>
                                                <select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="0" selected="selected">Damage Increase (Damage/20)</option>
														<option value="1">Attack Speed Increase</option>
														<option value="2">Max Damage Increase</option>
														<option value="3">Min Damage Increase</option>
														<option value="4">Damage Increase</option>
														<option value="5">AG Usage Decrease</option>
											</select><?php } ?>
											
											<?php if($check_item_ok[8] == 12 && $check_item_ok[9] == 61) { ?>
                                                <select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="0" selected="selected">Defense Rate Increase</option>
														<option value="1">Defense Increase</option>
														<option value="2">Shield Defense Increase</option>
														<option value="3">Damage Decrease</option>
														<option value="4">Damage Reflect</option>
											</select><?php } ?>
											
											<?php if($check_item_ok[8] == 12 && $check_item_ok[9] == 62) { ?>
                                                <select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="0" selected="selected">Life / Monster Die Increase</option>
														<option value="1">Mana / Monster Die Increase</option>
														<option value="2">Skill Damage Increase</option>
														<option value="3">Attack Rate Increase</option>
														<option value="4">Durability Rate Increase</option>
											</select><?php } ?>
											
											<?php if($check_item_ok[8] == 12 && $check_item_ok[9] == 63) { ?>
                                                <select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="0" selected="selected">HP AutoRecovery Increase</option>
														<option value="1">Max HP Increase</option>
														<option value="2">Max Mana Increase</option>
														<option value="3">Mana AutoRecovery Increase</option>
														<option value="4">Max AG Increase</option>
											</select><?php } ?>
											
											<?php if($check_item_ok[8] == 12 && $check_item_ok[9] == 64) { ?>
                                                <select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="0" selected="selected">Exc Damage Increase</option>
														<option value="1">Exc Damage Chance Increase</option>
														<option value="2">Critical Damage Increase</option>
														<option value="3">Critical Chance Increase</option>
											</select><?php } ?>
											
											<?php if($check_item_ok[8] == 12 && $check_item_ok[9] == 65) { ?>
                                                <select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="2" selected="selected">Vitality Increase</option>
											</select><?php } ?>
											
											<?php if(
											$check_item_ok[8] == 12 && $check_item_ok[9] == 100 || 
											$check_item_ok[8] == 12 && $check_item_ok[9] == 106 || 
											$check_item_ok[8] == 12 && $check_item_ok[9] == 112 ||
											$check_item_ok[8] == 12 && $check_item_ok[9] == 118 ||
											$check_item_ok[8] == 12 && $check_item_ok[9] == 124
											) { ?><select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="0" selected="selected">Increase Damage/SkillPower (*lvl)</option>
														<option value="1">Increase Attack Speed</option>
														<option value="2">Increase Maximum Damage/Skill Power</option>
														<option value="3">Increase Maximum Damage/Skill Power</option>
														<option value="4">Attack/Wizardry Increase</option>
														<option value="5">AG Cost Decrease</option>
											</select><?php } ?>
											
											<?php if(
											$check_item_ok[8] == 12 && $check_item_ok[9] == 101 || 
											$check_item_ok[8] == 12 && $check_item_ok[9] == 107 || 
											$check_item_ok[8] == 12 && $check_item_ok[9] == 113 ||
											$check_item_ok[8] == 12 && $check_item_ok[9] == 119 ||
											$check_item_ok[8] == 12 && $check_item_ok[9] == 125
											) { ?><select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="0" selected="selected">Block rating increase</option>
														<option value="1">Defense Increase</option>
														<option value="2">Shield Protection Increase</option>
														<option value="3">Damage Reduction</option>
														<option value="4">Damage Reflections</option>
											</select><?php } ?>
											
											<?php if(
											$check_item_ok[8] == 12 && $check_item_ok[9] == 102 || 
											$check_item_ok[8] == 12 && $check_item_ok[9] == 108 || 
											$check_item_ok[8] == 12 && $check_item_ok[9] == 114 ||
											$check_item_ok[8] == 12 && $check_item_ok[9] == 120 ||
											$check_item_ok[8] == 12 && $check_item_ok[9] == 126
											) { ?><select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="0" selected="selected">Monster desc For The Life Increase</option>
														<option value="1">Monster desc For The Life Increase</option>
														<option value="2">Skill Attack Increase</option>
														<option value="3">Attack Rating Increase</option>
														<option value="4">Item Duarability Increase</option>
											</select><?php } ?>
											
											<?php if(
											$check_item_ok[8] == 12 && $check_item_ok[9] == 103 || 
											$check_item_ok[8] == 12 && $check_item_ok[9] == 109 || 
											$check_item_ok[8] == 12 && $check_item_ok[9] == 115 ||
											$check_item_ok[8] == 12 && $check_item_ok[9] == 121 ||
											$check_item_ok[8] == 12 && $check_item_ok[9] == 127
											) { ?><select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="0" selected="selected">Automatic Life Recovery Increase</option>
														<option value="1">Maximum Life Increase</option>
														<option value="2">Maximum Mana Increase</option>
														<option value="3">Automatic Mana Recovery Increase</option>
														<option value="4">Maximum AG Increase</option>
											</select><?php } ?>
											
											<?php if(
											$check_item_ok[8] == 12 && $check_item_ok[9] == 104 || 
											$check_item_ok[8] == 12 && $check_item_ok[9] == 110 || 
											$check_item_ok[8] == 12 && $check_item_ok[9] == 116 ||
											$check_item_ok[8] == 12 && $check_item_ok[9] == 122 ||
											$check_item_ok[8] == 12 && $check_item_ok[9] == 128
											) { ?><select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="0" selected="selected">Excellent Damage Increase</option>
														<option value="1">Excellent Damage Rate Increase</option>
														<option value="2">Critical Damage Increase</option>
														<option value="3">Critical Damage Rate Increase</option>
											</select><?php } ?>
											
											<?php if(
											$check_item_ok[8] == 12 && $check_item_ok[9] == 105 || 
											$check_item_ok[8] == 12 && $check_item_ok[9] == 111 || 
											$check_item_ok[8] == 12 && $check_item_ok[9] == 117 ||
											$check_item_ok[8] == 12 && $check_item_ok[9] == 123 ||
											$check_item_ok[8] == 12 && $check_item_ok[9] == 129
											) { ?><select style="width:95% !important;" id="item_level" class="mvcore-select-main" onchange="checkall();" name="item_level">
														<option value="2" selected="selected">Health Increase</option>
											</select><?php } ?>
											
											<?php if($check_item_ok[8] == 12 && $check_item_ok[9] >= 200 && $check_item_ok[9] <= 214 ) { ?>
												<select style="width:95% !important;" class="mvcore-select-main" onchange="checkall();" id="elementsys" name="elementsys">
														<option value="1" selected="selected">Fire Element</option>
														<option value="2">Water Element</option>
														<option value="3">Earth Element</option>
														<option value="4">Wind Element</option>
														<option value="5">Darkness Element</option>
												</select>
												
												<select style="width:95% !important;" class="mvcore-select-main" onchange="checkall();" name="socket1">
														<option value="1" selected="selected">Socket Count: 1</option>
														<?php if($mvcore['element_socket_max'] >= '2' ) { ?><option value="2">Socket Count: 2</option><?php } ?>
														<?php if($mvcore['element_socket_max'] >= '3' ) { ?><option value="3">Socket Count: 3</option><?php } ?>
														<?php if($mvcore['element_socket_max'] >= '4' ) { ?><option value="4">Socket Count: 4</option><?php } ?>
														<?php if($mvcore['element_socket_max'] == '5' ) { ?><option value="5">Socket Count: 5</option><?php } ?>
												</select>
											<?php } ?>
											
											<?php if($check_item_ok[8] == 12 && $check_item_ok[9] >= 221 && $check_item_ok[9] <= 261 ) { ?>
												<select style="width:95% !important;" class="mvcore-select-main" onchange="checkall();" id="elementsys" name="elementsys">
														<option value="1" selected="selected">Fire Element</option>
														<option value="2">Water Element</option>
														<option value="3">Earth Element</option>
														<option value="4">Wind Element</option>
														<option value="5">Darkness Element</option>
												</select>
												
											<div style="margin:10px 0px;">
												<!-- Slot1 -->
													<select style="width:95% !important;" class="mvcore-select-main" name="socket1" id="socket1">
																<option value="254" selected="selected">Default Option</option>
														<?php
															$slc_ertel= mssql_query("Select top 5 ertel_name, ertel_id from MVCore_Wshopp_Ertel where ertel_cat = '1' and ertel_type = '".$check_item_ok[9]."' order by ertel_id asc");
															for($i=0;$i < mssql_num_rows($slc_ertel);++$i) {
																$slc_ertels= mssql_fetch_row($slc_ertel);
																echo'<option value="'.$slc_ertels[1].'">'.$slc_ertels[0].'</option>';
															};
														?>
													</select>
													<?php if($mvcore['ertel_max_level'] >= '1' ) { ?>
													<select style="width:95% !important;" class="mvcore-select-main" id="socket1level" name="socket1level">
															<option value="0" selected="selected">Ertel Slot1 Level 0</option>
															<?php if($mvcore['ertel_max_level'] >= '1' ) { ?><option value="1">Ertel Slot1 Level 1</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '2' ) { ?><option value="2">Ertel Slot1 Level 2</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '3' ) { ?><option value="3">Ertel Slot1 Level 3</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '4' ) { ?><option value="4">Ertel Slot1 Level 4</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '5' ) { ?><option value="5">Ertel Slot1 Level 5</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '6' ) { ?><option value="6">Ertel Slot1 Level 6</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '7' ) { ?><option value="7">Ertel Slot1 Level 7</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '8' ) { ?><option value="8">Ertel Slot1 Level 8</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '9' ) { ?><option value="9">Ertel Slot1 Level 9</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] == '10' ) { ?><option value="10">Ertel Slot1 Level 10</option><?php } ?>
													</select>
													<?php } ?>
											</div>
											<div style="margin:10px 0px;">	
												<!-- Slot2 -->
													<select style="width:95% !important;" class="mvcore-select-main" name="socket2" id="socket2">
																<option value="254" selected="selected">EMPTY (No Mounting Slot)</option>
														<?php
															$slc_ertel = mssql_query("Select top 5 ertel_name, ertel_id from MVCore_Wshopp_Ertel where ertel_cat = '2' and ertel_type = '".$check_item_ok[9]."' order by ertel_id asc");
                                                            $stmt = $slc_ertel->execute();
                                                            $stmt = $slc_ertel->fetchAll(PDO::FETCH_BOTH);
                                                        $slc_ertel = $stmt;

															for ($i = 0; $i < count($slc_ertel); ++$i) {
																$slc_ertels= $slc_ertel;
																echo'<option value="'.$slc_ertels[$i][1].'">'
                                                                .$slc_ertels[$i][0].'</option>';
															};
														?>
													</select>
													<?php if($mvcore['ertel_max_level'] >= '1' ) { ?>
													<select style="width:95% !important;" class="mvcore-select-main" id="socket2level" name="socket2level">
															<option value="0" selected="selected">Ertel Slot2 Level 0</option>
															<?php if($mvcore['ertel_max_level'] >= '1' ) { ?><option value="1">Ertel Slot2 Level 1</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '2' ) { ?><option value="2">Ertel Slot2 Level 2</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '3' ) { ?><option value="3">Ertel Slot2 Level 3</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '4' ) { ?><option value="4">Ertel Slot2 Level 4</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '5' ) { ?><option value="5">Ertel Slot2 Level 5</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '6' ) { ?><option value="6">Ertel Slot2 Level 6</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '7' ) { ?><option value="7">Ertel Slot2 Level 7</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '8' ) { ?><option value="8">Ertel Slot2 Level 8</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '9' ) { ?><option value="9">Ertel Slot2 Level 9</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] == '10' ) { ?><option value="10">Ertel Slot2 Level 10</option><?php } ?>
													</select>
													<?php } ?>
											</div>
											<div style="margin:10px 0px;">		
												<!-- Slot3 -->
													<select style="width:95% !important;" class="mvcore-select-main" name="socket3" id="socket3">
																<option value="254" selected="selected">EMPTY (No Mounting Slot)</option>
														<?php
															$slc_ertel = $mvcorex->prepare("Select top 5 ertel_name, ertel_id from MVCore_Wshopp_Ertel where ertel_cat = '3' and ertel_type = '".$check_item_ok[9]."' order by ertel_id asc");
															$stmt = $slc_ertel->execute();
															$stmt = $slc_ertel->fectAll(PDO::FETCH_BOTH);
                                                            $slc_ertel = $stmt;
                                                        for ($i = 0; $i < count($slc_ertel); ++$i) {
																$slc_ertels= $slc_ertel;
																echo'<option value="'.$slc_ertels[$i][1].'">'
                                                                    .$slc_ertels[$i][0].'</option>';
															};
														?>
													</select>
													<?php if($mvcore['ertel_max_level'] >= '1' ) { ?>
													<select style="width:95% !important;" class="mvcore-select-main" id="socket3level" name="socket3level">
															<option value="0" selected="selected">Ertel Slot3 Level 0</option>
															<?php if($mvcore['ertel_max_level'] >= '1' ) { ?><option value="1">Ertel Slot3 Level 1</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '2' ) { ?><option value="2">Ertel Slot3 Level 2</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '3' ) { ?><option value="3">Ertel Slot3 Level 3</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '4' ) { ?><option value="4">Ertel Slot3 Level 4</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '5' ) { ?><option value="5">Ertel Slot3 Level 5</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '6' ) { ?><option value="6">Ertel Slot3 Level 6</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '7' ) { ?><option value="7">Ertel Slot3 Level 7</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '8' ) { ?><option value="8">Ertel Slot3 Level 8</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '9' ) { ?><option value="9">Ertel Slot3 Level 9</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] == '10' ) { ?><option value="10">Ertel Slot3 Level 10</option><?php } ?>
													</select>
													<?php } ?>
											</div>
											<div style="margin:10px 0px;">		
												<!-- Slot4 -->
													<select style="width:95% !important;" class="mvcore-select-main" name="socket4" id="socket4">
																<option value="254" selected="selected">EMPTY (No Mounting Slot)</option>
														<?php
															$slc_ertel= $mvcorex->prepare("Select top 5 ertel_name, ertel_id from MVCore_Wshopp_Ertel where ertel_cat = '4' and ertel_type = '".$check_item_ok[9]."' order by ertel_id asc");
															$stmt = $slc_ertel->execute();
															$stmt = $slc_ertel->fetchAll(PDO::FETCH_BOTH);
                                                            $slc_ertel = $stmt;
                                                        for ($i = 0; $i < count($slc_ertel); ++$i) {
																$slc_ertels= $slc_ertel;
																echo'<option value="'.$slc_ertels[$i][1].'">'
                                                                    .$slc_ertels[$i][0].'</option>';
															};
														?>
													</select>
													<?php if($mvcore['ertel_max_level'] >= '1' ) { ?>
													<select style="width:95% !important;" class="mvcore-select-main" id="socket4level" name="socket4level">
															<option value="0" selected="selected">Ertel Slot4 Level 0</option>
															<?php if($mvcore['ertel_max_level'] >= '1' ) { ?><option value="1">Ertel Slot4 Level 1</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '2' ) { ?><option value="2">Ertel Slot4 Level 2</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '3' ) { ?><option value="3">Ertel Slot4 Level 3</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '4' ) { ?><option value="4">Ertel Slot4 Level 4</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '5' ) { ?><option value="5">Ertel Slot4 Level 5</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '6' ) { ?><option value="6">Ertel Slot4 Level 6</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '7' ) { ?><option value="7">Ertel Slot4 Level 7</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '8' ) { ?><option value="8">Ertel Slot4 Level 8</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '9' ) { ?><option value="9">Ertel Slot4 Level 9</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] == '10' ) { ?><option value="10">Ertel Slot4 Level 10</option><?php } ?>
													</select>
													<?php } ?>
											</div>
											<div style="margin:10px 0px;">		
												<!-- Slot5 -->
													<select style="width:95% !important;" class="mvcore-select-main" name="socket5" id="socket5">
																<option value="254" selected="selected">EMPTY (No Mounting Slot)</option>
														<?php
															$slc_ertel = $mvcorex->prepare("Select top 5 ertel_name, ertel_id from MVCore_Wshopp_Ertel where ertel_cat = '5' and ertel_type = '".$check_item_ok[9]."' order by ertel_id asc");
															$stmt = $slc_ertel->execute();
															$stmt = $slc_ertel->fetchAll(PDO::FETCH_BOTH);
                                                            $slc_ertel = $stmt;

                                                        for ($i = 0; $i < count($slc_ertel); ++$i) {
																$slc_ertels= $slc_ertel;
																echo'<option value="'.$slc_ertels[$i][1].'">'
                                                                    .$slc_ertels[$i][0].'</option>';
															};
														?>
													</select>
													<?php if($mvcore['ertel_max_level'] >= '1' ) { ?>
													<select style="width:95% !important;" class="mvcore-select-main" id="socket5level" name="socket5level">
															<option value="0" selected="selected">Ertel Slot5 Level 0</option>
															<?php if($mvcore['ertel_max_level'] >= '1' ) { ?><option value="1">Ertel Slot5 Level 1</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '2' ) { ?><option value="2">Ertel Slot5 Level 2</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '3' ) { ?><option value="3">Ertel Slot5 Level 3</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '4' ) { ?><option value="4">Ertel Slot5 Level 4</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '5' ) { ?><option value="5">Ertel Slot5 Level 5</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '6' ) { ?><option value="6">Ertel Slot5 Level 6</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '7' ) { ?><option value="7">Ertel Slot5 Level 7</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '8' ) { ?><option value="8">Ertel Slot5 Level 8</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] >= '9' ) { ?><option value="9">Ertel Slot5 Level 9</option><?php } ?>
															<?php if($mvcore['ertel_max_level'] == '10' ) { ?><option value="10">Ertel Slot5 Level 10</option><?php } ?>
													</select>
													<?php } ?>
											</div>
											<?php } ?>
											
										<?php } ?>
											
												<?php echo $drop_ad_opt;?>							
											<?php if($item_luck >= '1') { ?>
							
												<div id="div_item_luck" style="width:92.60% !important;" class="mvcore-input-main">Item Luck: <input style="margin-top:2px;float:right;margin-right:70px;" id="item_luck" onclick="checkall();" name="item_luck" value="1" type="checkbox"></div>
								
											<?php } ?>
											<?php if($item_skill >= '1') { ?>
								
												<div id="div_item_skill" style="width:92.60% !important;" class="mvcore-input-main">Item Skill: <input style="margin-top:2px;float:right;margin-right:70px;" id="item_skill" onclick="checkall();" name="item_skill" value="1" type="checkbox"></div>
								
											<?php } ?>
											<?php if($item_refin >= '1' && $mvcore['refi_opt_buy'] == 'yes') { ?>
						
												<div id="div_item_ref" style="width:92.60% !important;" class="mvcore-input-main">Refinery Option: <input style="margin-top:2px;float:right;margin-right:70px;" id="item_ref" onclick="checkall();" name="item_ref" value="1" type="checkbox"></div>

											<?php } ?>	
	</div>
	<div style="margin:10px 0px;">
												<?php if($item_harms != '0' && $check_item_ok[6] >= '1' && $mvcore['har_opt_buy'] == 'yes') { ?>

													<select style="width:95% !important;" class="mvcore-select-main" id="item_harm" onchange="checkall();" name="item_harm">
														<option value="na" selected="selected"> - Select Harmony Option - </option>
														<?php 
														if($check_item_ok[8] >= 0 && $check_item_ok[8] <= 4) { // Swords
															$select_joh_info= $mvcorex->prepare("Select top 99 joh_name from MVCore_Wshopp_Harmony where joh_type='1' and joh_onoff = '1'");
															$stmt = $select_joh_info->execute();
															$stmt = $select_joh_info->fetchAll(PDO::FETCH_BOTH);
                                                            $select_joh_info = $stmt;
                                                            for ($i = 0; $i < count($select_joh_info); ++$i) {$value = $i + 1;
																$s_joh_i= $select_joh_info;
																echo'<option value="'.$s_joh_i[$i][0].'">'
                                                                    .$s_joh_i[$i][0]
                                                                    .'</option>';
															};
														} elseif($check_item_ok[8] == 5) { // Staffs
															$select_joh_info = $mvcorex->prepare("Select top 99 joh_name from MVCore_Wshopp_Harmony where joh_type='2' and joh_onoff = '1'");
															$stmt = $select_joh_info->execute();
															$stmt = $select_joh_info->fetchAll(PDO::FETCH_BOTH);
                                                            $select_joh_info = $stmt;

                                                            for ($i = 0; $i < count($select_joh_info); ++$i) {$value = $i + 1;
																$s_joh_i= $select_joh_info;
																echo'<option value="'.$s_joh_i[$i][0].'">'
                                                                    .$s_joh_i[$i][0]
                                                                    .'</option>';
															};
														} elseif($check_item_ok[8] >= 6 && $check_item_ok[8] <= 11) { // Sets & Shields
															$select_joh_info = mssql_query("Select top 99 joh_name from MVCore_Wshopp_Harmony where joh_type='3' and joh_onoff = '1'");
															$stmt = $select_joh_info->execute();
															$stmt = $select_joh_info->fetchAll(PDO::FETCH_BOTH);
                                                            $select_joh_info = $stmt;

                                                            for ($i = 0; $i < count($select_joh_info); ++$i) {$value = $i + 1;
																$s_joh_i= $select_joh_info;
																echo'<option value="'.$s_joh_i[$i][0].'">'
                                                                    .$s_joh_i[$i][0]
                                                                    .'</option>';
															};
														}
														?>
													</select>

											<?php } ?>
	</div>
	<div style="margin:10px 0px;">
<?php $sanci = $mvcorex->prepare("Select anc_name 
from MVCore_Wshopp_Ancient 
where item_id='" . $item_id . "' 
nd item_cat='" . $item_cat . "'"
);
        $stmt = $sanci->execute();
        $stmt = $sanci->fetch();
        $sanci = $stmt;

        if ($sanci[0] != '' && $mvcore['anc_opt_buy'] == 'yes') { ?>

            <select style="width:95% !important;" class="mvcore-select-main" id="item_anc" onchange="checkall();"
                    name="item_anc">
                <option value="na" selected="selected"> - Select Ancient Set -</option>
                <?php
                $select_anc_info = $mvcorex->prepare("Select anc_name,anc_name2,item_id,item_cat 
                from MVCore_Wshopp_Ancient 
                where item_id='" . $item_id . "' 
                and item_cat='" . $item_cat . "'"
                );
                $stmt = $select_anc_info->execute();
                $stmt = $select_anc_info->fetch();
                $s_anc_i = $stmt;

                $select_anc_info1 = $mvcorex->prepare("Select anc_name,options from MVCore_Wshopp_Ancient_Opt where anc_id='" . $s_anc_i[0] . "'");
                $stmt = $select_anc_info1->execute();
                $stmt = $select_anc_info1->fetch();
                $s_anc_opt1 = $stmt;

                $select_anc_info2 = $mvcorex->prepare("Select anc_name,options from MVCore_Wshopp_Ancient_Opt where anc_id='" . $s_anc_i[1] . "'");
                $stmt = $select_anc_info2->execute();
                $stmt = $select_anc_info2->fetch();
                $s_anc_opt2 = $stmt;


                if ($s_anc_opt1[0] != '' && $s_anc_opt1[0] != ' ') {
                    echo '<option value="5" style="padding-left:5px;">Set ' . $s_anc_opt1[0] . '</option>';

                };
                if ($s_anc_opt2[1] != '' && $s_anc_opt2[1] != ' ') {
                    echo '<option value="10" style="padding-left:5px;">Set ' . $s_anc_opt2[0] . '</option>';

                };
                ?>
            </select>

        <?php } ?>
	</div>
	<div style="margin:10px 0px;" class="unselectable">
        <?php if ($check_item_ok[8] == 13 && $check_item_ok[9] == 37) { // Fenrirs ?>
            <div style="width:92.60% !important;" class="mvcore-input-main">Fenrir +Damage (Black): <input style="margin-top:2px;float:right;margin-right:70px;" id="fenrir1" name="fenrir1" onclick="checkall();" value="1" type="radio"></div>
            <div style="width:92.60% !important;" class="mvcore-input-main">Fenrir +Defense (Blue): <input style="margin-top:2px;float:right;margin-right:70px;" id="fenrir2" name="fenrir1" onclick="checkall();" value="2" type="radio"></div>
            <div style="width:92.60% !important;" class="mvcore-input-main">Fenrir +Illusion (Gold): <input style="margin-top:2px;float:right;margin-right:70px;" id="fenrir3" name="fenrir1" onclick="checkall();" value="4" type="radio"></div>

        <?php } ?>

        <?php
        if ($check_item_ok[8] >= 0 && $check_item_ok[8] <= 5 || $check_item_ok[8] == 13 && $check_item_ok[9] >= 12 && $check_item_ok[9] <= 13 || $check_item_ok[8] == 13 && $check_item_ok[9] >= 25 && $check_item_ok[9] <= 28) { // Weapons, Pendants
            if ($item_exc != '0') {
                echo '
					<div id="div_item_opt1" style="width:92.60% !important;" class="mvcore-input-main">Increases Mana After monster +Mana/8: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex1" onclick="checkall();" name="exe1"  value="1" type="checkbox"></div>
																
					<div id="div_item_opt2" style="width:92.60% !important;" class="mvcore-input-main">Increases Life After monster +Life/8: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex2" onclick="checkall();" name="exe2" value="2" type="checkbox"></div>
																
					<div id="div_item_opt3" style="width:92.60% !important;" class="mvcore-input-main">Increase attacking(wizardly)speed+7: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex3" onclick="checkall();" name="exe3"  value="3" type="checkbox"></div>
																
					<div id="div_item_opt4" style="width:92.60% !important;" class="mvcore-input-main">Increase Damage +2%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex4" onclick="checkall();" name="exe4"  value="4" type="checkbox"></div>
																
					<div id="div_item_opt5" style="width:92.60% !important;" class="mvcore-input-main">Increase Damage +level/20: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex5" onclick="checkall();" name="exe5"  value="5" type="checkbox"></div>
																
					<div id="div_item_opt6" style="width:92.60% !important;" class="mvcore-input-main">Excellent Damage Rate +10%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex6" onclick="checkall();" name="exe6"  value="6" type="checkbox"></div>
																';
            };
        } elseif ($check_item_ok[8] >= 6 && $check_item_ok[8] <= 11) { // Sets & Shields
            if ($item_exc != '0') {
                echo '
					<div id="div_item_opt6" style="width:92.60% !important;" class="mvcore-input-main">Increase MaxHP +4%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex1" onclick="checkall();" name="exe6"  value="6" type="checkbox"></div>
																
					<div id="div_item_opt5" style="width:92.60% !important;" class="mvcore-input-main">Increase MaxMana +4%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex2" onclick="checkall();" name="exe5"  value="5" type="checkbox"></div>
																
					<div id="div_item_opt4" style="width:92.60% !important;" class="mvcore-input-main">Damage decrease +4%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex3" onclick="checkall();" name="exe4" value="4" type="checkbox"></div>
																
					<div id="div_item_opt3" style="width:92.60% !important;" class="mvcore-input-main">Reflect damage +5%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex4" onclick="checkall();" name="exe3" value="3" type="checkbox"></div>
																
					<div id="div_item_opt2" style="width:92.60% !important;" class="mvcore-input-main">Defense success rate +10%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex5" onclick="checkall();" name="exe2"  value="2" type="checkbox"></div>
																
					<div id="div_item_opt1" style="width:92.60% !important;" class="mvcore-input-main">Increase Zen After Hunt +40%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex6" onclick="checkall();" name="exe1"  value="1" type="checkbox"></div>
			        ';
            };
        } elseif ($check_item_ok[8] == 13 && $check_item_ok[9] == 30 || $check_item_ok[8] == 12 && $check_item_ok[9] >= 0 && $check_item_ok[9] <= 6) { // Wings level 1 & 2
            if ($item_exc != '0') {
                echo '
					<div id="div_item_opt1" style="width:92.60% !important;" class="mvcore-input-main">HP +115 Increase: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex1" onclick="checkall();" name="exe1"  value="1" type="checkbox"></div>
																
					<div id="div_item_opt2" style="width:92.60% !important;" class="mvcore-input-main">MP +115 Increase: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex2" onclick="checkall();" name="exe2"  value="2" type="checkbox"></div>
																
					<div id="div_item_opt3" style="width:92.60% !important;" class="mvcore-input-main">Ignore enemys defensive power by 3%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex3" onclick="checkall();" name="exe3" value="3" type="checkbox"></div>
																
					<div id="div_item_opt4" style="width:92.60% !important;" class="mvcore-input-main">Max AG +50 Increase: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex4" onclick="checkall();" name="exe4"  value="4" type="checkbox"></div>
																
					<div id="div_item_opt5" style="width:92.60% !important;" class="mvcore-input-main">Increase attacking(wizardly)speed+5: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex5" onclick="checkall();" name="exe5"value="5" type="checkbox"></div>
					';
            };
        } elseif ($check_item_ok[8] == 12 && $check_item_ok[9] >= 36 && $check_item_ok[9] <= 43 || $check_item_ok[8] == 12 && $check_item_ok[9] >= 49 && $check_item_ok[9] <= 50 || $check_item_ok[8] == 12 && $check_item_ok[9] == 266) { // Wings level 3
            if ($item_exc != '0') {
                echo '
					<div id="div_item_opt1" style="width:92.60% !important;" class="mvcore-input-main">Ingore opponents defensive power by 5%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex1" onclick="checkall();" name="exe1"  value="1" type="checkbox"></div>
																
					<div id="div_item_opt2" style="width:92.60% !important;" class="mvcore-input-main">Returns the enemys attack power in 5%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex2" onclick="checkall();" name="exe2"  value="2" type="checkbox"></div>
																
					<div id="div_item_opt3" style="width:92.60% !important;" class="mvcore-input-main">Complete recovery of life in 5% rate: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex3" onclick="checkall();" name="exe3" value="3" type="checkbox"></div>
																
					<div id="div_item_opt4" style="width:92.60% !important;" class="mvcore-input-main">Complete recover of Mana in 5% rate: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex4" onclick="checkall();" name="exe4"  value="4" type="checkbox"></div>
					';
            };
        } elseif ($check_item_ok[9] >= 262 && $check_item_ok[9] <= 265) { // Wings level 4
            if ($item_exc != '0') {
                echo '
					<div id="div_item_opt1" style="width:92.60% !important;" class="mvcore-input-main">Returns the enemys attack power in 5%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex1" onclick="checkall();" name="exe1" value="1" type="checkbox"></div>
																
					<div id="div_item_opt2" style="width:92.60% !important;" class="mvcore-input-main">Complete recovery of life in 5% rate: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex2" onclick="checkall();" name="exe2" value="2" type="checkbox"></div>
					';
            };
        } elseif ($check_item_ok[9] == 267) { // Wings level 4
            if ($item_exc != '0') {
                echo '
					<div id="div_item_opt1" style="width:92.60% !important;" class="mvcore-input-main">Complete recovery of life in 5% rate: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex1" onclick="checkall();" name="exe1" value="1" type="checkbox"></div>
																
					<div id="div_item_opt2" style="width:92.60% !important;" class="mvcore-input-main">Returns the enemys attack power in 5%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex2" onclick="checkall();" name="exe2"  value="2" type="checkbox"></div>
																
					<div id="div_item_opt3" style="width:92.60% !important;" class="mvcore-input-main">Chanse of Double damage +4%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex3" onclick="checkall();" name="exe3" value="3" type="checkbox"></div>
					';
            };
        } elseif ($check_item_ok[8] == 13 && $check_item_ok[9] >= 8 && $check_item_ok[9] <= 9 || $check_item_ok[8] == 13 && $check_item_ok[9] >= 21 && $check_item_ok[9] <= 24) { // Rings
            if ($item_exc != '0') {
                echo '
					<div id="div_item_opt6" style="width:92.60% !important;" class="mvcore-input-main">Increase MaxHP +4%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex1" onclick="checkall();" name="exe6" value="6" type="checkbox"></div>
																
					<div id="div_item_opt5" style="width:92.60% !important;" class="mvcore-input-main">Increase MaxMana +4%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex2" onclick="checkall();" name="exe5" value="5" type="checkbox"></div>
																
					<div id="div_item_opt4" style="width:92.60% !important;" class="mvcore-input-main">Damage decrease +4%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex3" onclick="checkall();" name="exe4" value="4" type="checkbox"></div>
																
					<div id="div_item_opt3" style="width:92.60% !important;" class="mvcore-input-main">Reflect damage +5%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex4" onclick="checkall();" name="exe3" value="3" type="checkbox"></div>
																
					<div id="div_item_opt2" style="width:92.60% !important;" class="mvcore-input-main">Defense success rate +10%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex5" onclick="checkall();" name="exe2" value="2" type="checkbox"></div>
																
					<div id="div_item_opt1" style="width:92.60% !important;" class="mvcore-input-main">Increase Zen After Hunt +40%: <input style="margin-top:2px;float:right;margin-right:70px;" id="ex6" onclick="checkall();" name="exe1" value="1" type="checkbox"></div>
					';
            };
        };
        ?>
    </div>
    <div style="margin:10px 0px;">
        <?php if ($check_item_ok[10] >= '1' && $mvcore['soc_opt_buy'] == 'yes') { ?>
            <?php if ($item_sk >= '1') { ?>
                <select style="width:95% !important;" class="mvcore-select-main" name="socket1" onchange="checkall();" id="socket1">
                    <option value="254">EMPTY (No Mounting Socket)</option>
                    <?php
                    $select_sk_info = $mvcorex->prepare("Select top 250 sok_name, sok_id from MVCore_Wshopp_Socket " .
                        $drop_sockets
                        . "");
                    $stmt = $select_sk_info->execute();
                    $stmt = $select_sk_info->fetchAll(PDO::FETCH_BOTH);
                    $select_sk_info = $stmt;

                    for ($i = 0; $i < count($select_sk_info); ++$i) { $value = $i;
                        $s_sk_i = $select_sk_info;
                        if ($mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[$i][1] <= '36' || $mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[$i][1] == '254') {
                            echo '<option value="' . $s_sk_i[$i][1] . '">' . $s_sk_i[$i][0] . '</option>';

                        } elseif ($mvcore['sockets_opt_ep'] != 'yes') {
                            echo '<option value="' . $s_sk_i[$i][1] . '">' . $s_sk_i[$i][0] . '</option>';

                        };
                    };
                    ?>
                </select>
            <?php } ?>
            <?php if ($item_sk >= '2') { ?>
                <select style="width:95% !important;" class="mvcore-select-main" name="socket2" onchange="checkall();"
                        id="socket2">
                    <option value="254">EMPTY (No Mounting Socket)</option>
                    <?php
                    $select_sk_info = $mvcorex->prepare("Select top 250 sok_name, sok_id from MVCore_Wshopp_Socket " . $drop_sockets . "");
                    $stmt = $select_sk_info->execute();
                    $stmt = $select_sk_info->fetchAll(PDO::FETCH_BOTH);
                    $select_sk_info = $stmt;
                    for ($i = 0; $i < count($select_sk_info); ++$i) {
                        $s_sk_i = $select_sk_info;
                        if ($mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[$i][1] <= '36' || $mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] == '254') {
                            echo '<option value="' . $s_sk_i[$i][1] . '">' . $s_sk_i[$i][0] . '</option>';

                        } elseif ($mvcore['sockets_opt_ep'] != 'yes') {

                            echo '<option value="' . $s_sk_i[$i][1] . '">' . $s_sk_i[$i][0] . '</option>';
                        };
                    };
                    ?>
                </select>
            <?php } ?>
            <?php if ($item_sk >= '3') { ?>
                <select style="width:95% !important;" class="mvcore-select-main" name="socket3" onchange="checkall();"
                        id="socket3">
                    <option value="254">EMPTY (No Mounting Socket)</option>
                    <?php
                    $select_sk_info = $mvcore->prepare("Select top 250 sok_name, sok_id from MVCore_Wshopp_Socket " .
                        $drop_sockets
                        . "");
                    $stmt = $select_sk_info->execute();
                    $stmt = $select_sk_info->fetchAll();
                    $select_sk_info = $stmt;

                    for ($i = 0; $i < count($select_sk_info); ++$i) {
                        $s_sk_i = $select_sk_info;
                        if ($mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[$i][1] <= '36' || $mvcore['sockets_opt_ep'] ==
                            'yes' && $s_sk_i[$i][1] == '254') {
                            echo '<option value="' . $s_sk_i[$i][1] . '">' . $s_sk_i[$i][0] . '</option>';

                        } elseif ($mvcore['sockets_opt_ep'] != 'yes') {
                            echo '<option value="' . $s_sk_i[$i][1] . '">' . $s_sk_i[$i][0] . '</option>';

                        };
                    };
                    ?>
                </select>
            <?php } ?>
            <?php if ($item_sk >= '4') { ?>
                <select style="width:95% !important;" class="mvcore-select-main" name="socket4" onchange="checkall();"
                        id="socket4">
                    <option value="254">EMPTY (No Mounting Socket)</option>
                    <?php
                    $select_sk_info = $mvcorex->prepare("Select top 250 sok_name, sok_id from MVCore_Wshopp_Socket " .
                        $drop_sockets . "");
                    $stmt = $select_sk_info->execute();
                    $stmt = $select_sk_info->fetchAll(PDO::FETCH_BOTH);
                    $select_sk_info = $stmt;
                    for ($i = 0; $i < count($select_sk_info); ++$i) {
                        $s_sk_i = $select_sk_info;
                        if ($mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[$i][1] <= '36' || $mvcore['sockets_opt_ep'] ==
                            'yes' && $s_sk_i[$i][1] == '254') {
                            echo '<option value="' . $s_sk_i[$i][1] . '">' . $s_sk_i[$i][0] . '</option>';

                        } elseif ($mvcore['sockets_opt_ep'] != 'yes') {
                            echo '<option value="' . $s_sk_i[$i][1] . '">' . $s_sk_i[$i][0] . '</option>';

                        };
                    };
                    ?>
                </select>
            <?php } ?>
            <?php if ($item_sk >= '5') { ?>
                <select style="width:95% !important;" class="mvcore-select-main" name="socket5" onchange="checkall();"
                        id="socket5">
                    <option value="254">EMPTY (No Mounting Socket)</option>
                    <?php
                    $select_sk_info = $mvcorex->prepare("Select top 250 sok_name, sok_id from MVCore_Wshopp_Socket " .
                        $drop_sockets
                        . "");
                    $stmt = $select_sk_info->execute();
                    $stmt = $select_sk_info->fetchAll();
                    $select_sk_info = $stmt;

                    for ($i = 0; $i < count($select_sk_info); ++$i) {
                        $s_sk_i = $select_sk_info;
                        if ($mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[$i][1] <= '36' || $mvcore['sockets_opt_ep'] ==
                            'yes' && $s_sk_i[$i][1] == '254') {
                            echo '<option value="' . $s_sk_i[$i][1] . '">' . $s_sk_i[$i][0] . '</option>';

                        } elseif ($mvcore['sockets_opt_ep'] != 'yes') {
                            echo '<option value="' . $s_sk_i[$i][1] . '">' . $s_sk_i[$i][0] . '</option>';

                        };
                    };
                    ?>
                </select>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<div align="center" style="margin:10px;">
<?php echo $drop_cost_gcred;?>
<?php echo $drop_cost_cred;?>
<?php echo $drop_cost_zen;?>
</div>
</form>
</div>
</center>
<br><br>

	<?php } } else { }; ?>
<?php } ?>
<script>

jQuery(window).on("load", function(){
			
		if ($("#fenrir1:checked").val() > 0){
		    $nval = $("#fenrir1:checked").val();
		} else if ($("#fenrir2:checked").val() > 0){
		    $nval = $("#fenrir2:checked").val();
		} else if ($("#fenrir3:checked").val() > 0){
		    $nval = $("#fenrir3:checked").val();
		} else {
		    $nval = '0';
		};
		
		if ($("#ex1:checked").val() > 0){
		    $exe1 = $("#ex1:checked").val();
		} else {
		    $exe1 = '0';
		};
		if ($("#ex2:checked").val() > 0){
		    $exe2 = $("#ex2:checked").val();
		} else {
		    $exe2 = '0';
		};
		if ($("#ex3:checked").val() > 0){
		    $exe3 = $("#ex3:checked").val();
		} else {
		    $exe3 = '0';
		};
		if ($("#ex4:checked").val() > 0){
		    $exe4 = $("#ex4:checked").val();
		} else {
		    $exe4 = '0';
		};
		if ($("#ex5:checked").val() > 0){
		    $exe5 = $("#ex5:checked").val();
		} else {
		    $exe5 = '0';
		};
		if ($("#ex6:checked").val() > 0){
		    $exe6 = $("#ex6:checked").val();
		} else {
		    $exe6 = '0';
		};
		
		if ($("#item_skill:checked").val() > 0){
		    $item_skill = $("#item_skill:checked").val();
		} else {
		    $item_skill = '0';
		};
		if ($("#item_ref:checked").val() > 0){
		    $item_ref = $("#item_ref:checked").val();
		} else {
		    $item_ref = '0';
		};
		if ($("#item_luck:checked").val() > 0){
		    $item_luck = $("#item_luck:checked").val();
		} else {
		    $item_luck = '0';
		};
		
		var getAllValues = 
			//option:selected
			
				$("#buy_item").val()+"-ids-" //1
				+$("#elementsys").val()+"-ids-" //2
				+$("#item_level option:selected").val()+"-ids-" //3
				+$item_skill+"-ids-" //4
				+$item_ref+"-ids-" //5
				+$("#item_harm option:selected").val()+"-ids-" //6
				+$("#item_anc option:selected").val()+"-ids-" //7
				+$nval+"-ids-" //8
				+$("#socket1 option:selected").val()+"-ids-" //9
				+$("#socket2 option:selected").val()+"-ids-" //10
				+$("#socket3 option:selected").val()+"-ids-" //11
				+$("#socket4 option:selected").val()+"-ids-" //12
				+$("#socket5 option:selected").val()+"-ids-" //13
				+$exe1+"-ids-" //14
				+$exe2+"-ids-" //15
				+$exe3+"-ids-" //16
				+$exe4+"-ids-" //17
				+$exe5+"-ids-" //18
				+$exe6+"-ids-" //19
				+$item_luck+"-ids-" //20
				+$("#item_opt option:selected").val()+"-ids-" //21
				+$("#socket1level option:selected").val()+"-ids-" //22
				+$("#socket2level option:selected").val()+"-ids-" //23
				+$("#socket3level option:selected").val()+"-ids-" //24
				+$("#socket4level option:selected").val()+"-ids-" //25
				+$("#socket5level option:selected").val() //26
			
			;
			
			//alert(getAllValues);
			
			$.post("acps.php", {
				getcgzfw: getAllValues
			},
			function(data) {
				
				var opdat = data.split("-ids-");
				
				$('#total_zen').html(opdat[0]);
				$('#total_credits').html(opdat[1]);
				$('#total_credits_g').html(opdat[2]);
				
			});
});
	
$(document).ready(function() {
	$( "#supitemchc" ).on('click', function() {
		
		if ($("#fenrir1:checked").val() > 0){ $nval = $("#fenrir1:checked").val(); }
		else if ($("#fenrir2:checked").val() > 0){ $nval = $("#fenrir2:checked").val(); }
		else if ($("#fenrir3:checked").val() > 0){ $nval = $("#fenrir3:checked").val(); }
		else { $nval = '0'; };
		
		if ($("#ex1:checked").val() > 0){ $exe1 = $("#ex1:checked").val(); } else { $exe1 = '0'; };
		if ($("#ex2:checked").val() > 0){ $exe2 = $("#ex2:checked").val(); } else { $exe2 = '0'; };
		if ($("#ex3:checked").val() > 0){ $exe3 = $("#ex3:checked").val(); } else { $exe3 = '0'; };
		if ($("#ex4:checked").val() > 0){ $exe4 = $("#ex4:checked").val(); } else { $exe4 = '0'; };
		if ($("#ex5:checked").val() > 0){ $exe5 = $("#ex5:checked").val(); } else { $exe5 = '0'; };
		if ($("#ex6:checked").val() > 0){ $exe6 = $("#ex6:checked").val(); } else { $exe6 = '0'; };
		
		if ($("#item_skill:checked").val() > 0){ $item_skill = $("#item_skill:checked").val(); } else { $item_skill = '0'; };
		if ($("#item_ref:checked").val() > 0){ $item_ref = $("#item_ref:checked").val(); } else { $item_ref = '0'; };
		if ($("#item_luck:checked").val() > 0){ $item_luck = $("#item_luck:checked").val(); } else { $item_luck = '0'; };
		
		var getAllValues = 
			//option:selected
			
				$("#buy_item").val()+"-ids-" //1
				+$("#elementsys").val()+"-ids-" //2
				+$("#item_level option:selected").val()+"-ids-" //3
				+$item_skill+"-ids-" //4
				+$item_ref+"-ids-" //5
				+$("#item_harm option:selected").val()+"-ids-" //6
				+$("#item_anc option:selected").val()+"-ids-" //7
				+$nval+"-ids-" //8
				+$("#socket1 option:selected").val()+"-ids-" //9
				+$("#socket2 option:selected").val()+"-ids-" //10
				+$("#socket3 option:selected").val()+"-ids-" //11
				+$("#socket4 option:selected").val()+"-ids-" //12
				+$("#socket5 option:selected").val()+"-ids-" //13
				+$exe1+"-ids-" //14
				+$exe2+"-ids-" //15
				+$exe3+"-ids-" //16
				+$exe4+"-ids-" //17
				+$exe5+"-ids-" //18
				+$exe6+"-ids-" //19
				+$item_luck+"-ids-" //20
				+$("#item_opt option:selected").val()+"-ids-" //21
				+$("#socket1level option:selected").val()+"-ids-" //22
				+$("#socket2level option:selected").val()+"-ids-" //23
				+$("#socket3level option:selected").val()+"-ids-" //24
				+$("#socket4level option:selected").val()+"-ids-" //25
				+$("#socket5level option:selected").val() //26
			
			;
			
			//alert(getAllValues);
			
			$.post("acps.php", {
				getcgzfw: getAllValues
			},
			function(data) {
				
				var opdat = data.split("-ids-");
				
				$('#total_zen').html(opdat[0]);
				$('#total_credits').html(opdat[1]);
				$('#total_credits_g').html(opdat[2]);
				
			});
	});
});
</script>





<?php if(!$mvcore['Webshop'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Webshop'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<?php

if(isset($_POST['buy_item'])) {
	
//main functions

$element = $_POST['elementsys']; // 0 = nothing

if($mvcore['ertel_max_level'] >= '1' ) {
	$socket1level = $_POST['socket1level'];
	$socket2level = $_POST['socket2level'];
	$socket3level = $_POST['socket3level'];
	$socket4level = $_POST['socket4level'];
	$socket5level = $_POST['socket5level'];
} else {
	$socket1level = 0;
	$socket2level = 0;
	$socket3level = 0;
	$socket4level = 0;
	$socket5level = 0;
}

$item_level = $_POST['item_level']; // 0 = nothing
$item_skill = $_POST['item_skill']; // 0 = nothing
if($mvcore['refi_opt_buy'] == 'yes'){ $item_ref = $_POST['item_ref']; } else { $item_ref = '0'; }; // 0 = nothing
if($mvcore['har_opt_buy'] == 'yes'){ $item_harm = $_POST['item_harm']; } else { $item_harm = ''; } // na = nothing
if($mvcore['anc_opt_buy'] == 'yes'){ $item_anc = $_POST['item_anc']; } else { $item_anc = ''; } // na = nothing

$is_fenrir1 = $_POST['fenrir1']; //  = nothing

if($mvcore['soc_opt_buy'] == 'yes'){
	if($mvcore['socket_type'] == 'scfmt'){
		$item_socket1 = $_POST['socket1'] + 1; // 255 = Empty Socket
		$item_socket2 = $_POST['socket2'] + 1; // 255 = Empty Socket
		$item_socket3 = $_POST['socket3'] + 1; // 255 = Empty Socket
		$item_socket4 = $_POST['socket4'] + 1; // 255 = Empty Socket
		$item_socket5 = $_POST['socket5'] + 1; // 255 = Empty Socket
	} else {
		$item_socket1 = $_POST['socket1']; // 254 = Empty Socket
		$item_socket2 = $_POST['socket2']; // 254 = Empty Socket
		$item_socket3 = $_POST['socket3']; // 254 = Empty Socket
		$item_socket4 = $_POST['socket4']; // 254 = Empty Socket
		$item_socket5 = $_POST['socket5']; // 254 = Empty Socket
	}
} else { 
	$item_socket1 = ''; // 254 = Empty Socket
	$item_socket2 = ''; // 254 = Empty Socket
	$item_socket3 = ''; // 254 = Empty Socket
	$item_socket4 = ''; // 254 = Empty Socket
	$item_socket5 = ''; // 254 = Empty Socket
}

//for element system check so it cant be cheated more then max is
if( $check_item_dat[10] == 12 && $check_item_dat[9] >= 200 && $check_item_dat[9] <= 214 ) {
	if($item_socket1 >= $mvcore['element_socket_max']) { $item_socket1 = $mvcore['element_socket_max']; } else { $item_socket1 = ''; };
}

$useracc = $_SESSION['username']; // Get Logedin Username

$check_item_data = $mvcorex->prepare("Select item_name, item_cost, zen_cost, can_buy_w_money2, can_buy_w_money1, can_buy_w_zen, is_harmony, bought_count, has_luck, id, category, x, y, durability, is_socket, can_buy, has_skill, has_luck, is_ancient from MVCore_Wshopp  where item_name='".$_POST['buy_item']."'");
$stmt = $check_item_data->execute();
$stmt = $check_item_data->fetch();
$check_item_dat = $stmt;

if($check_item_dat[15] == 0) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_itemdisableviaweb.'</div>'; };

if($mvcore['socket_exc_item'] == 'no' && $check_item_dat[14] >= '1') {
$item_exe1 = 0; // 0 = nothing
$item_exe2 = 0; // 0 = nothing
$item_exe3 = 0; // 0 = nothing
$item_exe4 = 0; // 0 = nothing
$item_exe5 = 0; // 0 = nothing
$item_exe6 = 0; // 0 = nothing
} else {
$item_exe1 = $_POST['exe1']; // 0 = nothing
$item_exe2 = $_POST['exe2']; // 0 = nothing
$item_exe3 = $_POST['exe3']; // 0 = nothing
$item_exe4 = $_POST['exe4']; // 0 = nothing
$item_exe5 = $_POST['exe5']; // 0 = nothing
$item_exe6 = $_POST['exe6']; // 0 = nothing
};

if($check_item_dat[8] == '1') {
	$item_luck = $_POST['item_luck'];
} else {
	$item_luck = 0; // 0 = nothing
}

if($mvcore['max_ad_opt_jof'] >= '1') { 
	if($check_item_dat[18] == 1) { $item_opt = $_POST['item_opt']; } else { $item_opt = 0; };
} else { $item_opt = 0; };

//Item Cost calculate
if($item_anc == '5'){
$c_anc = $mvcore['cost_anc1'];
$c_zen_anc = $mvcore['cost_anc1'] * $mvcore['cost_cred_to_zen'];
} elseif ($item_anc == '10') {
$c_anc = $mvcore['cost_anc2'];
$c_zen_anc = $mvcore['cost_anc2'] * $mvcore['cost_cred_to_zen'];
}

if( $check_item_dat[10] == 12 && $check_item_dat[9] >= 200 && $check_item_dat[9] <= 214 ) {
	$har_opt = '0';
	$har_opt_zen = '0';
	
	$socket_i1_item = '0';
	$socket_i1_item_zen = '0';
	
	$socket_i2_item = '0';
	$socket_i2_item_zen = '0';
	
	$socket_i3_item = '0';
	$socket_i3_item_zen = '0';
	
	$socket_i4_item = '0';
	$socket_i4_item_zen = '0';
	
	$socket_i5_item = '0';
	$socket_i5_item_zen = '0';
} else {
	
	if($item_harm == 'na') { $har_opt='0'; } else {
		$select_joh_info= $mvcorex->prepare("Select joh_id, joh_val, joh_cost from MVCore_Wshopp_Harmony where joh_name='"
            .$item_harm."'");
        $stmt = $select_joh_info->execute();
        $stmt = $select_joh_info->fetch();
        $select_joh_info = $stmt;

		if($mvcore['har_opt_inc'] == 0){
			$har_opt = ''.$check_joh_info[2].'';
			$har_opt_zen = $check_joh_info[2] * $mvcore['cost_cred_to_zen'];
		} else {
			if($check_joh_info[2] == '') {
				$har_opt = 0;
				$har_opt_zen = 0;
			} else {
				$har_opt = $check_joh_info[2] + $mvcore['har_opt_inc'];
				$har_opt_zen = $check_joh_info[2] * $mvcore['cost_cred_to_zen'] + $mvcore['har_opt_inc'];
			}
		};
	}

if($mvcore['socket_type'] == 'scfmt'){
	$item_sockets1 = $item_socket1 - 1;
	if($item_sockets1 == 'undefined' || $item_sockets1 == '255' || $item_sockets1 == '') { $socket_i1_item = '0'; $socket_i1_item_zen = 0; } else {
		$select_soc_info= $mvcorex->prepare("Select sok_id, sok_name, type, sok_cost from MVCore_Wshopp_Socket where sok_id='" .$item_sockets1."'");
		$stmt = $select_soc_info->execute();
		$stmt - $select_soc_info->fetch();
		$check_soc_info = $stmt;

		if($mvcore['sock_opt_inc'] == 0){
			$socket_i1_item = $check_soc_info[3];
			$socket_i1_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'];
		} else {
			if($check_soc_info[3] == '') {
				$socket_i1_item = 0;
				$socket_i1_item_zen = 0;
			} else {
				$socket_i1_item = $check_soc_info[3] + $mvcore['sock_opt_inc'];
				$socket_i1_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'] + $mvcore['sock_opt_inc'];
			}
		};
	}
	$item_sockets2 = $item_socket2 - 1;
	if($item_sockets2 == 'undefined' || $item_sockets2 == '255' || $item_sockets2 == '') { $socket_i2_item = '0'; $socket_i2_item_zen = 0; } else {
		$select_soc_info= $mvcorex->prepare("Select sok_id, sok_name, type, sok_cost from MVCore_Wshopp_Socket where sok_id='" .$item_sockets2."'");
		$stmt = $select_soc_info->execute();
		$stmt = $select_soc_info->fetch();
		$check_soc_info = $stmt;

		if($mvcore['sock_opt_inc'] == 0){
			$socket_i2_item = $check_soc_info[3];
			$socket_i2_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'];
		} else {
			if($check_soc_info[2] == '') {
				$socket_i2_item = 0;
				$socket_i2_item_zen = 0;
			} else {
				$socket_i2_item = $check_soc_info[3] + $mvcore['sock_opt_inc'];
				$socket_i2_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'] + $mvcore['sock_opt_inc'];
			}
		};
	}
	$item_sockets3 = $item_socket3 - 1;
	if($item_sockets3 == 'undefined' || $item_sockets3 == '255' || $item_sockets3 == '') { $socket_i3_item = '0'; $socket_i3_item_zen = 0; } else {
		$select_soc_info = $mvcorex->prepare("Select sok_id, sok_name, type, sok_cost from MVCore_Wshopp_Socket where sok_id='" .$item_sockets3."'");
		$stmt = $select_soc_info->execute();
		$stmt = $select_soc_info->fetch();
		$check_soc_info = $stmt;

		if($mvcore['sock_opt_inc'] == 0){
			$socket_i3_item = $check_soc_info[3];
			$socket_i3_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'];
		} else {
			if($check_soc_info[2] == '') {
				$socket_i3_item = 0;
				$socket_i3_item_zen = 0;
			} else {
				$socket_i3_item = $check_soc_info[3] + $mvcore['sock_opt_inc'];
				$socket_i3_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'] + $mvcore['sock_opt_inc'];
			}
		};
	}
	$item_sockets4 = $item_socket4 - 1;
	if($item_sockets4 == 'undefined' || $item_sockets4 == '255' || $item_sockets4 == '') { $socket_i4_item = '0'; $socket_i4_item_zen = 0; } else {
		$select_soc_info= $mvcorex->prepare("Select sok_id, sok_name, type, sok_cost from MVCore_Wshopp_Socket where sok_id='" .$item_sockets4."'");
        $stmt = $select_soc_info->execute();
        $stmt = $select_soc_info->fetch();
        $check_soc_info = $stmt;

		if($mvcore['sock_opt_inc'] == 0){
			$socket_i4_item = $check_soc_info[3];
			$socket_i4_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'];
		} else {
			if($check_soc_info[3] == '') {
				$socket_i4_item = 0;
				$socket_i4_item_zen = 0;
			} else {
				$socket_i4_item = $check_soc_info[3] + $mvcore['sock_opt_inc'];
				$socket_i4_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'] + $mvcore['sock_opt_inc'];
			}
		};
	}
	$item_sockets5 = $item_socket5 - 1;
	if($item_sockets5 == 'undefined' || $item_sockets5 == '255' || $item_sockets5 == '') { $socket_i5_item = '0'; $socket_i5_item_zen = 0; } else {
		$select_soc_info= $mvcorex->prepare("Select sok_id, sok_name, type, sok_cost from MVCore_Wshopp_Socket where sok_id='" .$item_sockets5."'");
        $stmt = $select_soc_info->execute();
        $stmt = $select_soc_info->fetch();
        $check_soc_info = $stmt;

		if($mvcore['sock_opt_inc'] == 0){
			$socket_i5_item = $check_soc_info[3];
			$socket_i5_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'];
		} else {
			if($check_soc_info[3] == '') {
				$socket_i5_item = 0;
				$socket_i5_item_zen = 0;
			} else {
				$socket_i5_item = $check_soc_info[3] + $mvcore['sock_opt_inc'];
				$socket_i5_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'] + $mvcore['sock_opt_inc'];
			}
		};
	}
} else {
	if($item_sockets1 == 'undefined' || $item_socket1 == '255' || $item_socket1 == '') { $socket_i1_item = '0'; $socket_i1_item_zen = 0; } else {
		$select_soc_info= $mvcorex->prepare("Select sok_id, sok_name, type, sok_cost from MVCore_Wshopp_Socket where sok_id='" .$item_socket1."'");
        $stmt = $select_soc_info->execute();
        $stmt = $select_soc_info->fetch();
        $check_soc_info = $stmt;

		if($mvcore['sock_opt_inc'] == 0){
			$socket_i1_item = $check_soc_info[3];
			$socket_i1_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'];
		} else {
			if($check_soc_info[3] == '') {
				$socket_i1_item = 0;
				$socket_i1_item_zen = 0;
			} else {
				$socket_i1_item = $check_soc_info[3] + $mvcore['sock_opt_inc'];
				$socket_i1_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'] + $mvcore['sock_opt_inc'];
			}
		};
	}
	
	if($item_sockets2 == 'undefined' || $item_socket2 == '255' || $item_socket2 == '') { $socket_i2_item = '0'; $socket_i2_item_zen = 0; } else {
		$select_soc_info= $mvcorex->prepare("Select sok_id, sok_name, type, sok_cost from MVCore_Wshopp_Socket where sok_id='" .$item_socket2."'");
        $stmt = $select_soc_info->execute();
        $stmt = $select_soc_info->fetch();
        $check_soc_info = $stmt;

		if($mvcore['sock_opt_inc'] == 0){
			$socket_i2_item = $check_soc_info[3];
			$socket_i2_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'];
		} else {
			if($check_soc_info[3] == '') {
				$socket_i2_item = 0;
				$socket_i2_item_zen = 0;
			} else {
				$socket_i2_item = $check_soc_info[3] + $mvcore['sock_opt_inc'];
				$socket_i2_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'] + $mvcore['sock_opt_inc'];
			}
		};
	}
	
	if($item_sockets3 == 'undefined' || $item_socket3 == '255' || $item_socket3 == '') { $socket_i3_item = '0'; $socket_i3_item_zen = 0; } else {
		$select_soc_info= $mvcorex->prepare("Select sok_id, sok_name, type, sok_cost from MVCore_Wshopp_Socket where sok_id='" .$item_socket3."'");
        $stmt = $select_soc_info->execute();
        $stmt = $select_soc_info->fetch();
        $check_soc_info = $stmt;

		if($mvcore['sock_opt_inc'] == 0){
			$socket_i3_item = $check_soc_info[3];
			$socket_i3_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'];
		} else {
			if($check_soc_info[3] == '') {
				$socket_i3_item = 0;
				$socket_i3_item_zen = 0;
			} else {
				$socket_i3_item = $check_soc_info[3] + $mvcore['sock_opt_inc'];
				$socket_i3_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'] + $mvcore['sock_opt_inc'];
			}
		};
	}
	
	if($item_sockets4 == 'undefined' || $item_socket4 == '255' || $item_socket4 == '') { $socket_i4_item = '0'; $socket_i4_item_zen = 0; } else {
		$select_soc_info= $mvcorex->prepare("Select sok_id, sok_name, type, sok_cost from MVCore_Wshopp_Socket where sok_id='" .$item_socket4."'");
        $stmt = $select_soc_info->execute();
        $stmt = $select_soc_info->fetch();
        $check_soc_info = $stmt;

		if($mvcore['sock_opt_inc'] == 0){
			$socket_i4_item = $check_soc_info[3];
			$socket_i4_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'];
		} else {
			if($check_soc_info[3] == '') {
				$socket_i4_item = 0;
				$socket_i4_item_zen = 0;
			} else {
				$socket_i4_item = $check_soc_info[3] + $mvcore['sock_opt_inc'];
				$socket_i4_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'] + $mvcore['sock_opt_inc'];
			}
		};
	}
	
	if($item_sockets5 == 'undefined' || $item_socket5 == '255' || $item_socket5 == '') { $socket_i5_item = '0'; $socket_i5_item_zen = 0; } else {
		$select_soc_info= $mvcorex->prepare("Select sok_id, sok_name, type, sok_cost from MVCore_Wshopp_Socket where sok_id='" .$item_socket5."'");
        $stmt = $select_soc_info->execute();
        $stmt = $select_soc_info->fetch();
        $check_soc_info = $stmt;

		if($mvcore['sock_opt_inc'] == 0){
			$socket_i5_item = $check_soc_info[3];
			$socket_i5_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'];
		} else {
			if($check_soc_info[3] == '') {
				$socket_i5_item = 0;
				$socket_i5_item_zen = 0;
			} else {
				$socket_i5_item = $check_soc_info[3] + $mvcore['sock_opt_inc'];
				$socket_i5_item_zen = $check_soc_info[3] * $mvcore['cost_cred_to_zen'] + $mvcore['sock_opt_inc'];
			}
		};
	}
}
}

if( $check_item_dat[10] == 12 && $check_item_dat[9] >= 221 && $check_item_dat[9] <= 261 ) {
	
	if($item_socket1 >= '1' && $item_socket1 <= '5') {
		$socket_i1_item = $mvcore['ertel_slopt'];
		$socket_i1_item_zen = $mvcore['ertel_slopt'] * $mvcore['cost_cred_to_zen'];
	} else { $socket_i1_item = '0'; $socket_i1_item_zen = '0'; }; 
	
	if($item_socket2 >= '1' && $item_socket2 <= '5') {
		$socket_i2_item = $mvcore['ertel_slopt'];
		$socket_i2_item_zen = $mvcore['ertel_slopt'] * $mvcore['cost_cred_to_zen'];
	} else { $socket_i2_item = '0'; $socket_i2_item_zen = '0'; }; 
	
	if($item_socket3 >= '1' && $item_socket3 <= '5') {
		$socket_i3_item = $mvcore['ertel_slopt'];
		$socket_i3_item_zen = $mvcore['ertel_slopt'] * $mvcore['cost_cred_to_zen'];
	} else { $socket_i3_item = '0'; $socket_i3_item_zen = '0'; }; 
	
	if($item_socket4 >= '1' && $item_socket4 <= '5') {
		$socket_i4_item = $mvcore['ertel_slopt'];
		$socket_i4_item_zen = $mvcore['ertel_slopt'] * $mvcore['cost_cred_to_zen'];
	} else { $socket_i4_item = '0'; $socket_i4_item_zen = '0'; }; 
	
	if($item_socket5 >= '1' && $item_socket5 <= '5') {
		$socket_i5_item = $mvcore['ertel_slopt'];
		$socket_i5_item_zen = $mvcore['ertel_slopt'] * $mvcore['cost_cred_to_zen'];
	} else { $socket_i5_item = '0'; $socket_i51_item_zen = '0'; }; 
	
}


if($socket1level == '254' || $socket1level == '255' || $socket1level == '') { $socket1levelCost = '0'; $socket1levelCostZen = 0; } else {
	$socket1levelCost = $mvcore['ertel_level'] * $socket1level;
	$socket1levelCostZen = $mvcore['ertel_level'] * $socket1level * $mvcore['cost_cred_to_zen'];
}
if($socket2level == '254' || $socket2level == '255' || $socket2level == '') { $socket2levelCost = '0'; $socket2levelCostZen = 0; } else {
	$socket2levelCost = $mvcore['ertel_level'] * $socket2level;
	$socket2levelCostZen = $mvcore['ertel_level'] * $socket2level * $mvcore['cost_cred_to_zen'];
}
if($socket3level == '254' || $socket3level == '255' || $socket3level == '') { $socket3levelCost = '0'; $socket3levelCostZen = 0; } else {
	$socket3levelCost = $mvcore['ertel_level'] * $socket3level;
	$socket3levelCostZen = $mvcore['ertel_level'] * $socket3level * $mvcore['cost_cred_to_zen'];
}
if($socket4level == '254' || $socket4level == '255' || $socket4level == '') { $socket4levelCost = '0'; $socket4levelCostZen = 0; } else {
	$socket4levelCost = $mvcore['ertel_level'] * $socket4level;
	$socket4levelCostZen = $mvcore['ertel_level'] * $socket4level * $mvcore['cost_cred_to_zen'];
}
if($socket5level == '254' || $socket5level == '255' || $socket5level == '') { $socket5levelCost = '0'; $socket5levelCostZen = 0; } else {
	$socket5levelCost = $mvcore['ertel_level'] * $socket5level;
	$socket5levelCostZen = $mvcore['ertel_level'] * $socket5level * $mvcore['cost_cred_to_zen'];
}


if($item_exe1 > '0'){
$c_exe1 = $mvcore['cost_exe'];
$c_zen_exe1 = $mvcore['cost_exe'] * $mvcore['cost_cred_to_zen'];
}
if($item_exe2 > '0'){
$c_exe2 = $mvcore['cost_exe'];
$c_zen_exe2 = $mvcore['cost_exe'] * $mvcore['cost_cred_to_zen'];
}
if($item_exe3 > '0'){
$c_exe3 = $mvcore['cost_exe'];
$c_zen_exe3 = $mvcore['cost_exe'] * $mvcore['cost_cred_to_zen'];
}
if($item_exe4 > '0'){
$c_exe4 = $mvcore['cost_exe'];
$c_zen_exe4 = $mvcore['cost_exe'] * $mvcore['cost_cred_to_zen'];
}
if($item_exe5 > '0'){
$c_exe5 = $mvcore['cost_exe'];
$c_zen_exe5 = $mvcore['cost_exe'] * $mvcore['cost_cred_to_zen'];
}
if($item_exe6 > '0'){
$c_exe6 = $mvcore['cost_exe'];
$c_zen_exe6 = $mvcore['cost_exe'] * $mvcore['cost_cred_to_zen'];
}

if($is_fenrir1 == '1'){
$c_fenrir1 = $mvcore['cost_fenblack'];
$c_zen_fenrir1 = $mvcore['cost_fenblack'] * $mvcore['cost_cred_to_zen'];
}
if($is_fenrir1 == '2'){
$c_fenrir2 = $mvcore['cost_fenblue'];
$c_zen_fenrir2 = $mvcore['cost_fenblue'] * $mvcore['cost_cred_to_zen'];
}
if($is_fenrir1 == '4'){
$c_fenrir3 = $mvcore['cost_fengold'];
$c_zen_fenrir3 = $mvcore['cost_fengold'] * $mvcore['cost_cred_to_zen'];
}

if($item_level > '0'){
$c_level = $mvcore['cost_level'] * $item_level;
$c_zen_level = $mvcore['cost_level'] * $item_level * $mvcore['cost_cred_to_zen'];
}
if($item_luck > '0'){
$c_luck = $mvcore['cost_luck'];
$c_zen_luck = $mvcore['cost_luck'] * $mvcore['cost_cred_to_zen'];
}
if($item_skill > '0'){
	$c_skill = $mvcore['cost_skill'];
	$c_zen_skill = $mvcore['cost_skill'] * $mvcore['cost_cred_to_zen'];
}
if($item_ref > '0'){
	$c_ref = $mvcore['cost_ref'];
	$c_zen_ref = $mvcore['cost_ref'] * $mvcore['cost_cred_to_zen'];
}
if($item_opt > '0'){
$c_opt = $mvcore['cost_opt'] * $item_opt;
$c_zen_opt = $mvcore['cost_opt'] * $item_opt * $mvcore['cost_cred_to_zen'];
}

//total item cost
$convert_to_zen = $check_item_dat[1] * $mvcore['cost_cred_to_zen'];
$item_cost_zen = $convert_to_zen + $socket1levelCostZen + $socket2levelCostZen + $socket3levelCostZen + $socket4levelCostZen + $socket5levelCostZen + $c_zen_fenrir1 + $c_zen_fenrir2 + $c_zen_fenrir3 + $c_zen_level + $c_zen_luck + $c_zen_opt + $c_zen_skill + $c_zen_ref + $c_zen_exe1 + $c_zen_exe2 + $c_zen_exe3 + $c_zen_exe4 + $c_zen_exe5 + $c_zen_exe6 + $socket_i1_item_zen + $socket_i2_item_zen + $socket_i3_item_zen + $socket_i4_item_zen + $socket_i5_item_zen + $c_zen_anc + $har_opt_zen; // Zen

$item_cost_cred = $check_item_dat[1] + $socket1levelCost + $socket2levelCost + $socket3levelCost + $socket4levelCost + $socket5levelCost + $c_fenrir1 + $c_fenrir2 + $c_fenrir3 + $c_level + $c_luck + $c_opt + $c_skill + $c_ref + $c_exe1 + $c_exe2 + $c_exe3 + $c_exe4 + $c_exe5 + $c_exe6 + $socket_i1_item + $socket_i2_item + $socket_i3_item + $socket_i4_item + $socket_i5_item + $c_anc + $har_opt; // Tokens

$calc_into_gold = $item_cost_cred + ((- $mvcore['gold_dif'] * $item_cost_cred) / 100) ;

	if($mvcore['shop_disc'] == "on"){
		if($mvcore['shop_disc_start'] == 1){
				$item_cost_zen = floor($item_cost_zen + ((- $mvcore['shop_perc'] * $item_cost_zen) / 100));
				$item_cost_cred = floor($item_cost_cred + ((- $mvcore['shop_perc'] * $item_cost_cred) / 100));
				$calc_into_gold = floor($calc_into_gold + ((- $mvcore['shop_perc'] * $calc_into_gold) / 100));
		};
	};
	
if($mvcore['web_shop_disc_vip'] > '0' && $mvcore['vip_sys_active'] == '1'){
	$item_cost_zen = floor($item_cost_zen + ((- $mvcore['web_shop_disc_vip'] * $item_cost_zen) / 100));
	$item_cost_cred = floor($item_cost_cred + ((- $mvcore['web_shop_disc_vip'] * $item_cost_cred) / 100));
	$calc_into_gold = floor($calc_into_gold + ((- $mvcore['web_shop_disc_vip'] * $calc_into_gold) / 100));
};
	
//check if player button click was normal.
if(isset($_POST['buygoldcred'])) { $is_cost_type = '1'; if($check_item_dat[3] != '1') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_cannotbuywith.' '.$mvcore['money_name2'].'.</div>'; }; 
} elseif(isset($_POST['buycred'])) { $is_cost_type = '2'; if($mvcore['cost_cred_to_creda'] != 'yes') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_cannotbuywith.' '.$mvcore['money_name1'].'.</div>'; }; 
} elseif(isset($_POST['buyzen'])) { $is_cost_type = '3'; if($mvcore['cost_cred_to_zena'] != 'yes') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_cannotbuywith.' zen.</div>'; }; };
//end

if( $check_item_dat[9] >= '256' ){
	
	$calcRightID = $check_item_dat[9] - 256;
	
	if(strlen(dechex($calcRightID)) == '1') { $it_id = '0'.dechex($calcRightID).''; } else { $it_id = ''.dechex($calcRightID).''; }; //Fix id
	
} else {
	if(strlen(dechex($check_item_dat[9])) == '1') { $it_id = '0'.dechex($check_item_dat[9]).''; } else { $it_id = ''.dechex($check_item_dat[9]).''; }; //Fix id
};

if($item_level > $mvcore['it_max_lev']) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_yiiltmalevel.' '.$mvcore['it_max_lev'].'</div>'; }; //Level
if($item_opt > $mvcore['max_ad_opt_jof']) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_yiiltmaadopt.' '.$mvcore['max_ad_opt_jof'].'</div>'; }; // AD
if($item_luck == '1' && $check_item_dat[17] != '1') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_yiiltmalucko.'</div>'; }; // Luck
if($item_skill == '1' && $check_item_dat[16] <= '0') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_yiiltmaskilli.'</div>'; }; // Skill

//Option data
if($item_luck == '1') { $item_luck = '4'; } else { $item_luck = '0'; };
if($item_skill == '1') { $item_skill = '128'; } else { $item_skill = '0'; };


if($item_opt > '3') { $item_opt_add = '64'; } else { $item_opt_add = '0'; };
if($item_opt == '4') { $item_opt = '0'; } 
elseif($item_opt == '5' || $item_opt == '1') { $item_opt = '1'; }
elseif($item_opt == '6' || $item_opt == '2') { $item_opt = '2'; }
elseif($item_opt == '7' || $item_opt == '3') { $item_opt = '3'; };

if( $check_item_dat[10] == 12 && $check_item_dat[9] >= 200 && $check_item_dat[9] <= 214 && $mvcore['pentagram_it_max_lev'] >= '1' ) {
	$item_level_calc = $item_level * 8;
} else { $item_level_calc = 0; if($mvcore['it_max_lev'] >= '1') { $item_level_calc = $item_level * 8; } else { $item_level_calc = 0; }; };

$optwo_count = $item_luck + $item_level_calc + $item_skill + $item_opt;
if(strlen(dechex($optwo_count)) == '1') { $optwo_count = '0'.dechex($optwo_count).''; } else { $optwo_count = dechex($optwo_count); }; //Fix opts

//Item Duration
if($is_fenrir1 >= '1') { $item_dur_c = '255'; } else { $item_dur_c = $check_item_dat[13]; };
if(strlen(dechex($item_dur_c)) == '1') { $item_dur_c = '0'.dechex($item_dur_c).''; } else { $item_dur_c = dechex($item_dur_c); }; //Fix Exc

//Random serial
function generateRandomString($length = 8) {
    $characters = '0123456789ABCDE';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$item_exe_count = '0';
//Exc option
if($item_exe1 == '1') { $item_exe1 = '1'; $item_exe_count += '1'; } else { $item_exe1 = '0'; };
if($item_exe2 == '2') { $item_exe2 = '2'; $item_exe_count += '1'; } else { $item_exe2 = '0'; };
if($item_exe3 == '3') { $item_exe3 = '4'; $item_exe_count += '1'; } else { $item_exe3 = '0'; };
if($item_exe4 == '4') { $item_exe4 = '8'; $item_exe_count += '1'; } else { $item_exe4 = '0'; };
if($item_exe5 == '5') { $item_exe5 = '16'; $item_exe_count += '1'; } else { $item_exe5 = '0'; };
if($item_exe6 == '6') { $item_exe6 = '32'; $item_exe_count += '1'; } else { $item_exe6 = '0'; };


if( $check_item_dat[9] >= '256' ){
		$calc_item_exc = $item_opt_add + $item_exe1 + $item_exe2 + $item_exe3 + $item_exe4 + $item_exe5 + $item_exe6 + 128;
} else {
	$calc_item_exc = $item_opt_add + $item_exe1 + $item_exe2 + $item_exe3 + $item_exe4 + $item_exe5 + $item_exe6;
};

if($is_fenrir1 == '1') { $calc_item_exc = '1'; } elseif($is_fenrir1 == '2') { $calc_item_exc = '2'; } elseif($is_fenrir1 == '4') { $calc_item_exc = '4'; };

if(strlen(dechex($calc_item_exc)) == '1') { $calc_item_exc = '0'.dechex($calc_item_exc).''; } else { $calc_item_exc = dechex($calc_item_exc); }; //Fix Exc

//Ancient option
if($item_anc == '5') { $addhex = '05'; } elseif($item_anc == '10') { $addhex = '0A'; } else { $addhex = '00'; };
if($mvcore['w_exc_anc_item'] == 'drop_error' && $item_anc >= '5' && $item_exe_count >= '1' && $item_anc != 'na') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_excancblock.', '.main_p_webshop_chooseonofthem.'.</div>'; };
if($mvcore['w_harm_anc_item'] == 'drop_error' && $item_harm >= '1' && $item_anc >= '5'  && $item_anc != 'na') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_harmancblock.', '.main_p_webshop_chooseonofthem.'.</div>'; };

//Item Category
$item_cat_calc = $check_item_dat[10] ;
if(strlen(dechex($item_cat_calc)) == '1') { $item_cat_calc = ''.dechex($item_cat_calc).''; } else { $item_cat_calc = dechex($item_cat_calc); }; //Fix cat

//item refinary
if($item_ref == '1') { $item_ref = '8'; } else { $item_ref = '0'; }; //refin
if($mvcore['w_exc_refin_item'] == 'drop_error' && $item_ref >= '1' && $item_exe_count >= '1') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_excelerefinarblock.', '.main_p_webshop_chooseonofthem.'.</div>'; };

if( $check_item_dat[10] == 12 && $check_item_dat[9] >= 200 && $check_item_dat[9] <= 214 ) {
	$item_har_data = '0'.$element.''; // Item Element Type.
}
elseif( $check_item_dat[10] == 12 && $check_item_dat[9] >= 221 && $check_item_dat[9] <= 261 ) {
	$item_har_data = '0'.$element.''; // Item Element Type.
} 
else {
//Item harmony
$item_har_data = ''.dechex($check_joh_info[0]).''.dechex($check_joh_info[1]).'';
}

//for pentagram
if( $check_item_dat[10] == 12 && $check_item_dat[9] >= 200 && $check_item_dat[9] <= 214 ) {
	if($item_socket1 == '1') { $item_socket1 = 'FE'; $item_socket2 = 'FF'; $item_socket3 = 'FF'; $item_socket4 = 'FF'; $item_socket5 = 'FF'; }
	elseif($item_socket1 == '2') { $item_socket1 = 'FE'; $item_socket2 = 'FE'; $item_socket3 = 'FF'; $item_socket4 = 'FF'; $item_socket5 = 'FF'; }
	elseif($item_socket1 == '3') { $item_socket1 = 'FE'; $item_socket2 = 'FE'; $item_socket3 = 'FE'; $item_socket4 = 'FF'; $item_socket5 = 'FF'; }
	elseif($item_socket1 == '4') { $item_socket1 = 'FE'; $item_socket2 = 'FE'; $item_socket3 = 'FE'; $item_socket4 = 'FE'; $item_socket5 = 'FF'; }
	elseif($item_socket1 == '5') { $item_socket1 = 'FE'; $item_socket2 = 'FE'; $item_socket3 = 'FE'; $item_socket4 = 'FE'; $item_socket5 = 'FE'; } 
	else { $item_socket1 = 'FF'; $item_socket2 = 'FF'; $item_socket3 = 'FF'; $item_socket4 = 'FF'; $item_socket5 = 'FF'; }; //Fix sk
}

//for Ertel
elseif( $check_item_dat[10] == 12 && $check_item_dat[9] >= 221 && $check_item_dat[9] <= 261 ) {
	
	if($item_socket1 == '254' || $item_socket1 == '255' || $item_socket1 == '0') { $item_socket1 = '01'; } else { $item_socket1 = ''.dechex($socket1level).''.$item_socket1.''; };
	if($item_socket2 == '254' || $item_socket2 == '255' || $item_socket2 == '0') { $item_socket2 = 'FF'; } else { $item_socket2 = ''.dechex($socket2level).''.$item_socket2.''; };
	if($item_socket3 == '254' || $item_socket3 == '255' || $item_socket3 == '0') { $item_socket3 = 'FF'; } else { $item_socket3 = ''.dechex($socket3level).''.$item_socket3.''; };
	if($item_socket4 == '254' || $item_socket4 == '255' || $item_socket4 == '0') { $item_socket4 = 'FF'; } else { $item_socket4 = ''.dechex($socket4level).''.$item_socket4.''; };
	if($item_socket5 == '254' || $item_socket5 == '255' || $item_socket5 == '0') { $item_socket5 = 'FF'; } else { $item_socket5 = ''.dechex($socket5level).''.$item_socket5.''; };

} else {
if($pvsWebshop != 'ok4722') { exit; };
if($mvcore['soc_opt_buy'] == 'yes') {
	if($check_item_dat[14] >= '1') {
	//checking for disabled sockets.
	$select_soc_infod1= $mvcore->prepare("Select sok_on_off from MVCore_Wshopp_Socket where sok_id='".$item_socket1."'");
	$stmt = $select_soc_infod1->execute();
	$stmt = $select_soc_infod1->fetch();
	$check_soc_infod1 = $stmt;

	$select_soc_infod2= $mvcorex->prepare("Select sok_on_off from MVCore_Wshopp_Socket where sok_id='".$item_socket2 ."'");
	$stmt = $select_soc_infod2->execute();
	$stmt = $select_soc_infod2->fetch();
	$check_soc_infod2 = $stmt;

	$select_soc_infod3 = $mvcorex->prepare("Select sok_on_off from MVCore_Wshopp_Socket where sok_id='".$item_socket3 ."'");
	$stmt = $select_soc_infod3->execute();
	$stmt = $select_soc_infod3->fetch();
	$check_soc_infod3 = $stmt;

	$select_soc_infod4= $mvcorex->prepare("Select sok_on_off from MVCore_Wshopp_Socket where sok_id='".$item_socket4 ."'");
	$stmt = $select_soc_infod4->execute();
	$stmt = $select_soc_infod4->fetch();
	$check_soc_infod4 = $stmt;

	$select_soc_infod5= $mvcorex->prepare("Select sok_on_off from MVCore_Wshopp_Socket where sok_id='".$item_socket5."'");
	$stmt = $check_soc_infod5->execute();
	$stmt = $check_soc_infod5->fetch();
	$check_soc_infod5 = $stmt;
	
	if($check_soc_infod1[0] == '0') { if($mvcore['max_sock_opt'] >= '1') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_sockoptdisable.'</div>'; }; }
	elseif($check_soc_infod2[0] == '0') { if($mvcore['max_sock_opt'] >= '2') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_sockoptdisable.'</div>'; }; }
	elseif($check_soc_infod3[0] == '0') { if($mvcore['max_sock_opt'] >= '3') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_sockoptdisable.'</div>'; }; }
	elseif($check_soc_infod4[0] == '0') { if($mvcore['max_sock_opt'] >= '4') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_sockoptdisable.'</div>'; }; }
	elseif($check_soc_infod5[0] == '0') { if($mvcore['max_sock_opt'] == '5') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_sockoptdisable.'</div>'; }; }
	else { };
	
	if($check_soc_infod1[0] == '') { if($mvcore['max_sock_opt'] >= '1') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_selectsockdoedb.'</div>'; }; }
	elseif($check_soc_infod2[0] == '') { if($mvcore['max_sock_opt'] >= '2') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_selectsockdoedb.'</div>'; }; }
	elseif($check_soc_infod3[0] == '') { if($mvcore['max_sock_opt'] >= '3') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_selectsockdoedb.'</div>'; }; }
	elseif($check_soc_infod4[0] == '') { if($mvcore['max_sock_opt'] >= '4') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_selectsockdoedb.'</div>'; }; }
	elseif($check_soc_infod5[0] == '') { if($mvcore['max_sock_opt'] == '5') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_selectsockdoedb.'</div>'; }; }
	else { };
	//end
	};
};

//Socket option
if(strlen(dechex($item_socket1)) == '1') { $item_socket1 = '0'.dechex($item_socket1).''; } else { $item_socket1 = dechex($item_socket1); }; //Fix sk
if(strlen(dechex($item_socket2)) == '1') { $item_socket2 = '0'.dechex($item_socket2).''; } else { $item_socket2 = dechex($item_socket2); }; //Fix sk
if(strlen(dechex($item_socket3)) == '1') { $item_socket3 = '0'.dechex($item_socket3).''; } else { $item_socket3 = dechex($item_socket3); }; //Fix sk
if(strlen(dechex($item_socket4)) == '1') { $item_socket4 = '0'.dechex($item_socket4).''; } else { $item_socket4 = dechex($item_socket4); }; //Fix sk
if(strlen(dechex($item_socket5)) == '1') { $item_socket5 = '0'.dechex($item_socket5).''; } else { $item_socket5 = dechex($item_socket5); }; //Fix sk

if($check_item_dat[14] >= '1') {
	if($mvcore['socket_type'] == 'scfmt'){
		if($item_socket1 == '0' || $item_socket1 == '255' || $item_socket1 == '00') { $item_socket1 = dechex(255); } else { $item_socket1 = $item_socket1; }; //Fix sk2
		if($item_socket2 == '0' || $item_socket2 == '255' || $item_socket2 == '00') { $item_socket2 = dechex(255); } else { $item_socket2 = $item_socket2; }; //Fix sk2
		if($item_socket3 == '0' || $item_socket3 == '255' || $item_socket3 == '00') { $item_socket3 = dechex(255); } else { $item_socket3 = $item_socket3; }; //Fix sk2
		if($item_socket4 == '0' || $item_socket4 == '255' || $item_socket4 == '00') { $item_socket4 = dechex(255); } else { $item_socket4 = $item_socket4; }; //Fix sk2
		if($item_socket5 == '0' || $item_socket5 == '255' || $item_socket5 == '00') { $item_socket5 = dechex(255); } else { $item_socket5 = $item_socket5; }; //Fix sk2
	} else {
		if($item_socket1 == '254') { $item_socket1 = dechex(254); } else { $item_socket1 = $item_socket1; }; //Fix sk2
		if($item_socket2 == '254') { $item_socket2 = dechex(254); } else { $item_socket2 = $item_socket2; }; //Fix sk2
		if($item_socket3 == '254') { $item_socket3 = dechex(254); } else { $item_socket3 = $item_socket3; }; //Fix sk2
		if($item_socket4 == '254') { $item_socket4 = dechex(254); } else { $item_socket4 = $item_socket4; }; //Fix sk2
		if($item_socket5 == '254') { $item_socket5 = dechex(254); } else { $item_socket5 = $item_socket5; }; //Fix sk2
	};
} else {
	if($item_socket1 == '0' || $item_socket1 == '254' || $item_socket1 == '00') { $item_socket1 = '00'; } else { $item_socket1 = $item_socket1; }; //Fix sk2
	if($item_socket2 == '0' || $item_socket2 == '254' || $item_socket2 == '00') { $item_socket2 = '00'; } else { $item_socket2 = $item_socket2; }; //Fix sk2
	if($item_socket3 == '0' || $item_socket3 == '254' || $item_socket3 == '00') { $item_socket3 = '00'; } else { $item_socket3 = $item_socket3; }; //Fix sk2
	if($item_socket4 == '0' || $item_socket4 == '254' || $item_socket4 == '00') { $item_socket4 = '00'; } else { $item_socket4 = $item_socket4; }; //Fix sk2
	if($item_socket5 == '0' || $item_socket5 == '254' || $item_socket5 == '00') { $item_socket5 = '00'; } else { $item_socket5 = $item_socket5; }; //Fix sk2	
};


if($mvcore['socket_type'] == 'scfmt'){
if($check_item_dat[14] >= '1' && $mvcore['soc_opt_buy'] == 'yes' && $mvcore['max_sock_opt'] >= '1') { $item_socket1 = $item_socket1; } elseif($mvcore['max_sock_opt'] < '1') { $item_socket1 = '00'; } else { $item_socket1 = '00'; };
if($check_item_dat[14] >= '2' && $mvcore['soc_opt_buy'] == 'yes' && $mvcore['max_sock_opt'] >= '2') { $item_socket2 = $item_socket2; } elseif($mvcore['max_sock_opt'] < '2') { $item_socket2 = '00'; } else { $item_socket2 = '00'; };
if($check_item_dat[14] >= '3' && $mvcore['soc_opt_buy'] == 'yes' && $mvcore['max_sock_opt'] >= '3') { $item_socket3 = $item_socket3; } elseif($mvcore['max_sock_opt'] < '3') { $item_socket3 = '00'; } else { $item_socket3 = '00'; };
if($check_item_dat[14] >= '4' && $mvcore['soc_opt_buy'] == 'yes' && $mvcore['max_sock_opt'] >= '4') { $item_socket4 = $item_socket4; } elseif($mvcore['max_sock_opt'] < '4') { $item_socket4 = '00'; } else { $item_socket4 = '00'; };
if($check_item_dat[14] == '5' && $mvcore['soc_opt_buy'] == 'yes' && $mvcore['max_sock_opt'] == '5') { $item_socket5 = $item_socket5; } elseif($mvcore['max_sock_opt'] < '5') { $item_socket5 = '00'; } else { $item_socket5 = '00'; };
} else {
if($check_item_dat[14] >= '1' && $mvcore['soc_opt_buy'] == 'yes' && $mvcore['max_sock_opt'] >= '1') { $item_socket1 = $item_socket1; } elseif($mvcore['max_sock_opt'] < '1') { $item_socket1 = 'FF'; } else { $item_socket1 = 'FF'; };
if($check_item_dat[14] >= '2' && $mvcore['soc_opt_buy'] == 'yes' && $mvcore['max_sock_opt'] >= '2') { $item_socket2 = $item_socket2; } elseif($mvcore['max_sock_opt'] < '2') { $item_socket2 = 'FF'; } else { $item_socket2 = 'FF'; };
if($check_item_dat[14] >= '3' && $mvcore['soc_opt_buy'] == 'yes' && $mvcore['max_sock_opt'] >= '3') { $item_socket3 = $item_socket3; } elseif($mvcore['max_sock_opt'] < '3') { $item_socket3 = 'FF'; } else { $item_socket3 = 'FF'; };
if($check_item_dat[14] >= '4' && $mvcore['soc_opt_buy'] == 'yes' && $mvcore['max_sock_opt'] >= '4') { $item_socket4 = $item_socket4; } elseif($mvcore['max_sock_opt'] < '4') { $item_socket4 = 'FF'; } else { $item_socket4 = 'FF'; };
if($check_item_dat[14] == '5' && $mvcore['soc_opt_buy'] == 'yes' && $mvcore['max_sock_opt'] == '5') { $item_socket5 = $item_socket5; } elseif($mvcore['max_sock_opt'] < '5') { $item_socket5 = 'FF'; } else { $item_socket5 = 'FF'; };
}
}

$opt_sk_val = 0;

	if($item_socket1 != 'fe' && $item_socket1 != '00' && $item_socket1 != 'ff'){ $opt_sk_val += '1'; };
	
	if($item_socket2 != 'fe' && $item_socket2 != '00' && $item_socket2 != 'ff'){ $opt_sk_val += '1'; };
	
	if($item_socket3 != 'fe' && $item_socket3 != '00' && $item_socket3 != 'ff'){ $opt_sk_val += '1'; };
	
	if($item_socket4 != 'fe' && $item_socket4 != '00' && $item_socket4 != 'ff'){ $opt_sk_val += '1'; };
	
	if($item_socket5 != 'fe' && $item_socket5 != '00' && $item_socket5 != 'ff'){ $opt_sk_val += '1'; };

if($mvcore['socket_exc_item'] == 'drop_error' && $item_exe_count >= '1' && $opt_sk_val >= '1') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_excelesocketblock.', '.main_p_webshop_chooseonofthem.'.</div>'; };

if($check_item_dat[14] >= '1') {
//check if same is Disabled, checking 
if($mvcore['eqe_sockets'] == 'no' && $mvcore['soc_opt_buy'] == 'yes') {
	if($item_socket1 == $item_socket2 && $item_socket1 != 'fe' && $item_socket1 != '00' && $item_socket1 != 'ff' 
	|| $item_socket1 == $item_socket3 && $item_socket1 != 'fe' && $item_socket1 != '00' && $item_socket1 != 'ff' 
	|| $item_socket1 == $item_socket4 && $item_socket1 != 'fe' && $item_socket1 != '00' && $item_socket1 != 'ff' 
	|| $item_socket1 == $item_socket5 && $item_socket1 != 'fe' && $item_socket1 != '00' && $item_socket1 != 'ff'){ $eror_this = '1'; };
	
	if($item_socket2 == $item_socket1 && $item_socket2 != 'fe' && $item_socket2 != '00' && $item_socket2 != 'ff' 
	|| $item_socket2 == $item_socket3 && $item_socket2 != 'fe' && $item_socket2 != '00' && $item_socket2 != 'ff' 
	|| $item_socket2 == $item_socket4 && $item_socket2 != 'fe' && $item_socket2 != '00' && $item_socket2 != 'ff' 
	|| $item_socket2 == $item_socket5 && $item_socket2 != 'fe' && $item_socket2 != '00' && $item_socket2 != 'ff'){ $eror_this = '1'; };
	
	if($item_socket3 == $item_socket1 && $item_socket3 != 'fe' && $item_socket3 != '00' && $item_socket3 != 'ff' 
	|| $item_socket3 == $item_socket2 && $item_socket3 != 'fe' && $item_socket3 != '00' && $item_socket3 != 'ff' 
	|| $item_socket3 == $item_socket4 && $item_socket3 != 'fe' && $item_socket3 != '00' && $item_socket3 != 'ff' 
	|| $item_socket3 == $item_socket5 && $item_socket3 != 'fe' && $item_socket3 != '00' && $item_socket3 != 'ff'){ $eror_this = '1'; };
	
	if($item_socket4 == $item_socket1 && $item_socket4 != 'fe' && $item_socket4 != '00' && $item_socket4 != 'ff' 
	|| $item_socket4 == $item_socket2 && $item_socket4 != 'fe' && $item_socket4 != '00' && $item_socket4 != 'ff' 
	|| $item_socket4 == $item_socket3 && $item_socket4 != 'fe' && $item_socket4 != '00' && $item_socket4 != 'ff' 
	|| $item_socket4 == $item_socket5 && $item_socket4 != 'fe' && $item_socket4 != '00' && $item_socket4 != 'ff'){ $eror_this = '1'; };
	
	if($item_socket5 == $item_socket1 && $item_socket5 != 'fe' && $item_socket5 != '00' && $item_socket5 != 'ff' 
	|| $item_socket5 == $item_socket2 && $item_socket5 != 'fe' && $item_socket5 != '00' && $item_socket5 != 'ff' 
	|| $item_socket5 == $item_socket3 && $item_socket5 != 'fe' && $item_socket5 != '00' && $item_socket5 != 'ff' 
	|| $item_socket5 == $item_socket4 && $item_socket5 != 'fe' && $item_socket5 != '00' && $item_socket5 != 'ff'){ $eror_this = '1'; };
	
	define("LOG_FILE_IsSameSocket", "system/engine_logs/SameTypeSocketBuy.log"); // Log Save
	error_log(date('[Y-m-d H:i e] '). "Buyer Username: ".$_SESSION['username']."". PHP_EOL, 3, LOG_FILE_IsSameSocket); if($pvsWebshop != 'ok4722') { exit; };
	
	if($eror_this >= '1') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_eqaltypeusersave.'</div>'; };
}
};

//building HEX
$hex = "".$it_id."".$optwo_count."".$item_dur_c."".generateRandomString()."".$calc_item_exc."".$addhex."".$item_cat_calc."".$item_ref."".$item_har_data."".$item_socket1."".$item_socket2."".$item_socket3."".$item_socket4."".$item_socket5."";

if($mvcore['db_season'] == '1') {
	
	$item_cat_calc = ''.hexdec($item_cat_calc).''; $item_cat_calc = $item_cat_calc * 2; 
	if($item_cat_calc >= '16') {
		$item_cat_calc = $item_cat_calc - 16; $item_cat_calc = ''.dechex($item_cat_calc).'0';
		$calc_item_exc = hexdec($calc_item_exc); $calc_item_exc = $calc_item_exc + 128; $calc_item_exc = ''.dechex($calc_item_exc).'';
	} else { $item_cat_calc = ''.dechex($item_cat_calc).'0'; };
	$it_id_cat = hexdec($item_cat_calc) + hexdec($it_id); $it_id_cat = dechex($it_id_cat);
	if(strlen($it_id_cat) == '1') { $it_id_cat = '0'.$it_id_cat.''; };
	
	function generateRandomString2($length = 6) {
		$characters = '0123456789ABCDE';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	};
	$hex = "".$it_id_cat."".$optwo_count."".$item_dur_c."00".generateRandomString2()."".$calc_item_exc."".$addhex."00";	

};

//end
if($mvcore['db_season'] >= '9' && strlen($hex) == '32') {
    $exHex = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF';
} else {
    $exHex = '';
};
$Final_Result_hex = ''.$hex.''.$exHex.'';

function smartsearch($whbin,$itemX,$itemY,$incSeason, $mvcorex) {

	if($incSeason >= '9') { $hexlen = '64'; } elseif($incSeason == '1') { $hexlen = '20'; } else { $hexlen = '32'; };
	if($incSeason >= '9') { $ilc = '480'; } elseif($incSeason == '1') { $ilc = '60'; } else { $ilc = '240'; };

	if (substr($whbin,0,2)=='0x') $whbin=substr($whbin,2);	
	$items 	= str_repeat('0', $ilc);
	$itemsm = str_repeat('1', $ilc);
	$i	= 0; 
	while ($i<$ilc) {
		$_item	= substr($whbin,($hexlen*$i), $hexlen);
		$check_ref = hexdec(substr($_item, 19,1))/16;	
		$check_wid = hexdec(substr($_item, 14,2));		
			if($check_ref == 0.5)
				$type	= floor(hexdec(substr($_item,18,2))/16);
			else
				$type	= round(hexdec(substr($_item,18,2))/16);

			if ($check_wid <= '127') { $last_try=hexdec(substr($_item,0,2)); $check_two = $last_try; }
			elseif ($check_wid >= '128') { $last_try=hexdec(substr($_item,0,2)); $check_two = $last_try+'256'; }

		if($incSeason == '1') {
			$type = hexdec(substr($_item, 0,2))/32; // Category
			$exc = hexdec(substr($_item, 14,2)); // Excelent
			$ids = hexdec(substr($_item, 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($exc >= 128) { $type = $type + 8; }; $type = round($type); $check_two = $syfd;
		};
				
		$res= $mvcorex->prepare("select [x],[y] from [MVCore_Wshopp] where [id]='".$check_two."' and [category]='" .$type ."'");
		$stmt = $res->execute();
		$stmt = $res->fetch();
		$res = $stmt;
		
		$y	= 0;
        while ($y < $res[1]) {
			$y++;$x=0;
			while($x<$res[0]) {
				$items	= substr_replace($items, '1', ($i+$x)+(($y-1)*8), 1);
				$x++;	
			} 
		}	
		$i++;
	}
				
	$y	= 0;
	while($y<$itemY) {
		$y++;$x=0;
		while($x<$itemX) {
			$x++;
			$spacerq[$x+(8*($y-1))] = true;
		} 
	}
	$walked	= 0;
	$i	= 0;
	while($i<$ilc) {
		if (isset($spacerq[$i])) {
			$itemsm	= substr_replace($itemsm, '0', $i-1, 1);
			$last	= $i;
			$walked++;
		}
		if ($walked==count($spacerq)) $i=$ilc;
		$i++;
	}
	$useforlength	= substr($itemsm,0,$last);
	$findslotlikethis='^'.str_replace('++','+',str_replace('1','+[0-1]+', $useforlength));
	$i=0;$nx=0;$ny=0;
	while ($i<$ilc) {
		if ($nx==8) { $ny++; $nx=0; }
		if ((preg_match($findslotlikethis,substr($items, $i, strlen($useforlength)))) && ($itemX+$nx<9) && ($itemY+$ny<16))
			return $i;
		$i++;
		$nx++;

	}
	return 1337;
}

if($mvcore['db_season'] >= '9') { $hexlen = '64'; } elseif($mvcore['db_season'] == '1') { $hexlen = '20'; } else { $hexlen = '32'; };

if($mvcore['db_season'] >= '9') { $cvbins = '7680'; } elseif($mvcore['db_season'] == '1') { $cvbins = '1200'; } else { $cvbins = '3840'; }; // Warehouse
if($mvcore['db_season'] >= '9') { $cvbinsch = '7584'; } elseif($mvcore['db_season'] == '1') { $cvbinsch = '1080'; } else { $cvbinsch = '3776'; }; // Inventory

$query		= $mvcorex->prepare("declare @it varbinary(".$cvbins."); set @it=(select [Items] from [warehouse] where [AccountID]='" .$useracc."'); print @it");
$mycuritems	= $mvcorex->errorInfo();

$newitem	= $Final_Result_hex;
$test		= 0;
$slot 		= smartsearch($mycuritems,$check_item_dat[11],$check_item_dat[12],$mvcore['db_season'], $mvcorex);
$test		= $slot*$hexlen;

$mynewitems = substr_replace($mycuritems, $newitem, ($test+2), $hexlen);

$get_ware_info_name= $mvcorex->prepare("Select money from warehouse where AccountID='".$useracc."'");
$stmt = $get_ware_info_name->execute();
$stmt = $get_ware_info_name->fetch();
$drop_infoa= $stmt;

$get_credits = $mvcorex->prepare("select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from " .$mvcore['credits_table']." where ".$mvcore['user_column']." ='".$useracc."'");
$stmt = $get_credits->execute();
$stmt = $get_credits->fetch();
$get_creditss = $stmt; if($pvsWebshop != 'ok4722') { exit; };

	$sys_starst = $mvcorex->prepare("select name from character where AccountID = '".$useracc."'"); // Check if Char// Exists.
    $stmt = $sys_starst->execute();
    $stmt = $sys_starst->fetch();
	$drop_info = $stmt;

	if($drop_info[0] == '') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_createcharbefore.'</div>'; } else {
		if($is_cost_type == '3') {
			$drop_infoa[0] <= $item_cost_zen ? $costz=1 : $costz=0; //Zen
				if( $costz == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_needmore.' zen '.main_p_webshop_tobuythis.'</div>'; };
		}
		elseif($is_cost_type == '2') {
			$get_creditss[0] <= $item_cost_cred ? $costc=1 : $costc=0; //Credits
				if( $costc == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_needmore.' '.$mvcore['money_name1'].' '.main_p_webshop_tobuythis.'</div>'; };
		}
		elseif($is_cost_type == '1') {
			$get_creditss[1] <= floor($calc_into_gold) ? $costg=1 : $costg=0; //Credits2 
				if( $costg == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_needmore.' '.$mvcore['money_name2'].' '.main_p_webshop_tobuythis.'</div>'; };
		};
		
		$CharCount = $mvcorex->prepare("SELECT count(*) FROM character WHERE AccountID = '".$useracc."'");
		$stmt = $CharCount->execute();
		$stmt = $CharCount->fetchAll();
		$dCcount = count($CharCount);

		if($dCcount <= '0') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_createcharbefore.'</div>'; };
		
	};
	
		if(strlen($Final_Result_hex) < '32' && $mvcore['db_season'] != '1') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_somethialywrong.'</div>'; };


if($slot == '1337' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_warehousefull.'</div>'; };

$check_online = $mvcorex->prepare("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'");
$stmt = $check_online->execute();
$stmt = $check_online->fetch();
$check_onlines = $stmt;
		
		if( $check_onlines[0] == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_charisonline.'</div>'; };
		
		
if($_SESSION['webshop_allow_reload'] >= '1') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nSuccess">'.main_p_webshop_sorcentbuyi.'</div>'; header('refresh:5;url=-id-Webshop.html'); };


if($check_item_dat[10] == 13 && $check_item_dat[9] == 30 || $check_item_dat[10] == 12 && $check_item_dat[9] >= 0 && $check_item_dat[9] <= 6 ||
$check_item_dat[10] == 12 && $check_item_dat[9] >= 36 && $check_item_dat[9] <= 43 || $check_item_dat[10] == 12 && $check_item_dat[9] >= 49 && $check_item_dat[9] <= 50 || $check_item_dat[10] == 12 && $check_item_dat[9] == 266 ||
$check_item_dat[9] >= 262 && $check_item_dat[9] <= 265 || $check_item_dat[9] == 267 ) { 
	if($mvcore['wing_max_exc_opt'] < $item_exe_count ) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_tomanexcmis.' '.$mvcore['wing_max_exc_opt'].'</div>'; }; // wings error
} else {
	if($mvcore['max_exc_opt'] < $item_exe_count ) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_tomanexcmis.' '.$mvcore['max_exc_opt'].'</div>'; };
};



if($has_error >= '1'){} else {

		$up_data = $mvcorex->prepare("UPDATE warehouse SET Items = ".$mynewitems." WHERE AccountId='".$useracc."'");
		$stmt = $up_data->execute();
        $up_data = $mvcorex->prepare("UPDATE MVCore_Wshopp SET bought_count = bought_count + '1' WHERE item_name='" .$_POST['buy_item']."'");
	    $stmt = $up_data->execute();
		//Take Cost
		if($is_cost_type == '3') {
			$run = $mvcorex->prepare("update warehouse set money = money - '".$item_cost_zen."' where accountid ='".$useracc."'");
			$stmt = $run->execute();

			$do_insert = $mvcorex->prepare("insert into MVCore_Wshopp_Item_Log (name,hex,cost,boughtby,date,type) VALUES ('".$check_item_dat[0]."','".$hex."','".$item_cost_zen."','".$useracc."','".time()."','3')");
		    $stmt = $do_insert->execute();
		}
		elseif($is_cost_type == '2') {
			$run = $mvcorex->prepare("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$item_cost_cred."' where ".$mvcore['user_column']." ='".$useracc."'");
			$stmt = $run->execute();

			$do_insert = $mvcorex->prepare("insert into MVCore_Wshopp_Item_Log (name,hex,cost,boughtby,date,type) VALUES ('".$check_item_dat[0]."','".$hex."','".$item_cost_cred."','".$useracc."','".time()."','2')");
		    $stmt = $do_insert->execute();

		}
		elseif($is_cost_type == '1') {
			$run = $mvcorex->prepare("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".floor($calc_into_gold)."' where ".$mvcore['user_column']." ='".$useracc."'");
			$stmt = $run->execute();

			$do_insert = $mvcorex->prepare("insert into MVCore_Wshopp_Item_Log (name,hex,cost,boughtby,date,type) VALUES ('".$check_item_dat[0]."','".$hex."','".floor($calc_into_gold)."','".$useracc."','".time()."','1')");
		    $stmt = $do_insert->execute();

		};
		//end
$_SESSION['webshop_allow_reload'] = '1'; if($pvsWebshop != 'ok4722') { exit; };
echo '<div class="mvcore-nNote mvcore-nSuccess">'.$check_item_dat[0].' '.main_p_webshop_successadded.'</div>';
};
};
?>

							<?php if( $mvcore['webshop_s_menuposi'] == 'top3') { ?>
							<div class="mvcore-ucp-info" align="center" style="width:100%;padding-top: 15px; padding-bottom: 15px;">
								<div align="center" style="text-align:center;">
									<?php if($mvcore['wshop_page1'] == '1') { echo"<a href='-id-Webshop-id-0.html'>".main_p_webshop_swords."</a> - ";} ?>
									<?php if($mvcore['wshop_page2'] == '1') { echo"<a href='-id-Webshop-id-1.html'>".main_p_webshop_axes."</a> - ";} ?>
									<?php if($mvcore['wshop_page3'] == '1') { echo"<a href='-id-Webshop-id-2.html'>".main_p_webshop_scepters."</a> - ";} ?>
									<?php if($mvcore['wshop_page4'] == '1') { echo"<a href='-id-Webshop-id-3.html'>".main_p_webshop_spears."</a> - ";} ?>
									<?php if($mvcore['wshop_page5'] == '1') { echo"<a href='-id-Webshop-id-4.html'>".main_p_webshop_bows."</a> - ";} ?>
									<?php if($mvcore['wshop_page6'] == '1') { echo"<a href='-id-Webshop-id-5.html'>".main_p_webshop_staff."</a> - ";} ?>
									<?php if($mvcore['wshop_page7'] == '1') { echo"<a href='-id-Webshop-id-6.html'>".main_p_webshop_shields."</a> - ";} ?>
									<?php if($mvcore['wshop_page8'] == '1') { echo"<a href='-id-Webshop-id-7.html'>".main_p_webshop_helps."</a> - ";} ?>
									<?php if($mvcore['wshop_page9'] == '1') { echo"<a href='-id-Webshop-id-8.html'>".main_p_webshop_armors."</a> - ";} ?>
									<?php if($mvcore['wshop_page10'] == '1') { echo"<a href='-id-Webshop-id-9.html'>".main_p_webshop_pants."</a> - ";} ?>
									<?php if($mvcore['wshop_page11'] == '1') { echo"<a href='-id-Webshop-id-10.html'>".main_p_webshop_gloves."</a> - ";} ?>
									<?php if($mvcore['wshop_page12'] == '1') { echo"<a href='-id-Webshop-id-11.html'>".main_p_webshop_boots."</a> - ";} ?>
									<?php if($mvcore['wshop_page13'] == '1') { echo"<a href='-id-Webshop-id-12.html'>".main_p_webshop_accesories."</a> - ";} ?>
									<?php if($mvcore['wshop_page14'] == '1') { echo"<a href='-id-Webshop-id-13.html'>".main_p_webshop_miscitems."</a> - ";} ?>
									<?php if($mvcore['wshop_page15'] == '1') { echo"<a href='-id-Webshop-id-14.html'>".main_p_webshop_miscitemstwo."</a> - ";} ?>
									<?php if($mvcore['wshop_page16'] == '1') { echo"<a href='-id-Webshop-id-15.html'>".main_p_webshop_scrolls."</a>";} ?>
								</div>
							</div>
							<br>
							<div style="float:right;padding-bottom:10px;"> Choose Class: 
							<form action="" method="POST">
								<select onchange="this.form.submit()" style="width:200px !important;" <?php echo'class="mvcore-select-main"'; ?> name="getClassCode" id="getClassCode">
									<option value="-1" <?php if($_POST['getClassCode'] == '-1') { echo'selected'; } else { echo''; }; ?>> All Classes </option>
									<option value="00" <?php if($_POST['getClassCode'] == '00') { echo'selected'; } else { echo''; }; ?>> Dark Wizard </option>
									<option value="016" <?php if($_POST['getClassCode'] == '016') { echo'selected'; } else { echo''; }; ?>> Dark Knight </option>
									<option value="032" <?php if($_POST['getClassCode'] == '032') { echo'selected'; } else { echo''; }; ?>> Elf </option>
									<option value="048" <?php if($_POST['getClassCode'] == '048') { echo'selected'; } else { echo''; }; ?>> Magic Gladiator </option>
									<option value="064" <?php if($_POST['getClassCode'] == '064') { echo'selected'; } else { echo''; }; ?>> Dark Lord </option>
									<?php if($mvcore['db_season'] >= '4') { ?><option value="080" <?php if($_POST['getClassCode'] == '080') { echo'selected'; } else { echo''; }; ?>> Summoner </option><?php } ?>
									<?php if($mvcore['db_season'] >= '6') { ?><option value="096" <?php if($_POST['getClassCode'] == '096') { echo'selected'; } else { echo''; }; ?>> Rage Fighter </option><?php } ?>
									<?php if($mvcore['db_season'] >= '9') { ?><option value="0112" <?php if($_POST['getClassCode'] == '0112') { echo'selected'; } else { echo''; }; ?>> Grow Lancer </option><?php } ?>
								</select>
							</form>
							</div>
							<br>
							<br>
										<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<?PHP
$default_category = $mvcore['wshop_default'];
if($_GET['op2'] == '0' && $mvcore['wshop_page1'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '1' && $mvcore['wshop_page2'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '2' && $mvcore['wshop_page3'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '3' && $mvcore['wshop_page4'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '4' && $mvcore['wshop_page5'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '5' && $mvcore['wshop_page6'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '6' && $mvcore['wshop_page7'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '7' && $mvcore['wshop_page8'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '8' && $mvcore['wshop_page9'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '9' && $mvcore['wshop_page10'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '10' && $mvcore['wshop_page11'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '11' && $mvcore['wshop_page12'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '12' && $mvcore['wshop_page13'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '13' && $mvcore['wshop_page14'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '14' && $mvcore['wshop_page15'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '15' && $mvcore['wshop_page16'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '') { $cat_drop = $default_category; } 
else { $cat_drop = $_GET['op2']; };

$nvalue1 = $_POST['getClassCode'];
$nvalue2 = $_POST['getClassCode'] + 1;
$nvalue3 = $_POST['getClassCode'] + 2;
$nvalue4 = $_POST['getClassCode'] + 3;

if($_POST['getClassCode'] == '00') {
	$nvalue1 = '00';
	$nvalue2 = '01';
	$nvalue3 = '02';
	$nvalue4 = '03';
}

if($_POST['getClassCode'] == '' && $_POST['getClassCode'] == '-1') {
	$select_items = $mvcorex->prepare("select top 300 item_name, category, id, item_cost, can_buy, max_excellent, has_refinery, is_socket, is_ancient, has_skill, has_luck, max_level, clases from MVCore_Wshopp where category = '".$cat_drop."' and can_buy >= '1' order by item_cost asc");
    $stmt = $select_items->execute();
    $stmt = $select_items->fetchAll(PDO::FETCH_BOTH);
    $select_items = $stmt;

} else {
	$showtopcl1 = "".$nvalue1.","; $showtopcl2 = "".$nvalue2.","; $showtopcl3 = "".$nvalue3.","; $showtopcl4 = "".$nvalue4.",";
	$select_items = $mvcorex->prepare("select top 300 item_name, category, id, item_cost, can_buy, max_excellent, has_refinery, is_socket, is_ancient, has_skill, has_luck, max_level, clases from MVCore_Wshopp where category = '".$cat_drop."' and can_buy >= '1' and CHARINDEX('".$showtopcl1."', clases) > 0 or category = '".$cat_drop."' and can_buy >= '1' and CHARINDEX('".$showtopcl2."', clases) > 0 or category = '".$cat_drop."' and can_buy >= '1' and CHARINDEX('".$showtopcl3."', clases) > 0 or category = '".$cat_drop."' and can_buy >= '1' and CHARINDEX('".$showtopcl4."', clases) > 0 order by item_cost asc");
    $stmt = $select_items->execute();
    $stmt = $select_items->fetchAll(PDO::FETCH_BOTH);
    $select_items = $stmt;

}

for ($i = 0; $i < count($select_items); ++$i) {
$select_items_drop = $select_items;

if(strlen($select_items_drop[$i][0]) > '17'){
    $ech_name = '<div color="'.$mvcore['webshop_s_textcolor'].'">'.substr($select_items_drop[$i][0], 0, 14).'...</div>';

} else {
    $ech_name = '<div color="'.$mvcore['webshop_s_textcolor'].'">'.$select_items_drop[$i][0].'</div>';

};
	
if (file_exists("system/engine_images/webshop/item_images/".$select_items_drop[$i][1]."/".$select_items_drop[2].".gif")) {
    $image_load = "system/engine_images/webshop/item_images/".$select_items_drop[$i][1]."/".$select_items_drop[$i][2] .".gif";

} else {
    $image_load = 'system/engine_images/webshop/item_images/no-img.gif';

};
	
if($i == 0 ) { echo'<tr align="center">'; };
if($i == 3 ) { echo'<tr align="center">'; };
if($i == 6 ) { echo'<tr align="center">'; };
if($i == 9 ) { echo'<tr align="center">'; };
if($i == 12 ) { echo'<tr align="center">'; };
if($i == 15 ) { echo'<tr align="center">'; };
if($i == 18 ) { echo'<tr align="center">'; };
if($i == 21 ) { echo'<tr align="center">'; };
if($i == 24 ) { echo'<tr align="center">'; };
if($i == 27 ) { echo'<tr align="center">'; };
if($i == 30 ) { echo'<tr align="center">'; };
if($i == 33 ) { echo'<tr align="center">'; };
if($i == 36 ) { echo'<tr align="center">'; };
if($i == 39 ) { echo'<tr align="center">'; };
if($i == 42 ) { echo'<tr align="center">'; };
if($i == 45 ) { echo'<tr align="center">'; };
if($i == 48 ) { echo'<tr align="center">'; };
if($i == 51 ) { echo'<tr align="center">'; };
if($i == 54 ) { echo'<tr align="center">'; };
if($i == 57 ) { echo'<tr align="center">'; };
if($i == 60 ) { echo'<tr align="center">'; };
if($i == 63 ) { echo'<tr align="center">'; };
if($i == 66 ) { echo'<tr align="center">'; };
if($i == 69 ) { echo'<tr align="center">'; };
if($i == 72 ) { echo'<tr align="center">'; };
if($i == 75 ) { echo'<tr align="center">'; };
if($i == 78 ) { echo'<tr align="center">'; };
if($i == 81 ) { echo'<tr align="center">'; };
if($i == 84 ) { echo'<tr align="center">'; };
if($i == 87 ) { echo'<tr align="center">'; };
if($i == 90 ) { echo'<tr align="center">'; };
if($i == 93 ) { echo'<tr align="center">'; };
if($i == 96 ) { echo'<tr align="center">'; };
if($i == 99 ) { echo'<tr align="center">'; };
if($i == 102 ) { echo'<tr align="center">'; };
if($i == 105 ) { echo'<tr align="center">'; };
if($i == 108 ) { echo'<tr align="center">'; };
if($i == 111 ) { echo'<tr align="center">'; };
if($i == 114 ) { echo'<tr align="center">'; };
if($i == 117 ) { echo'<tr align="center">'; };
if($i == 120 ) { echo'<tr align="center">'; };
if($i == 123 ) { echo'<tr align="center">'; };
if($i == 126 ) { echo'<tr align="center">'; };
if($i == 129 ) { echo'<tr align="center">'; };
if($i == 132 ) { echo'<tr align="center">'; };
if($i == 135 ) { echo'<tr align="center">'; };
if($i == 138 ) { echo'<tr align="center">'; };
if($i == 141 ) { echo'<tr align="center">'; };
if($i == 144 ) { echo'<tr align="center">'; };
if($i == 147 ) { echo'<tr align="center">'; };
if($i == 150 ) { echo'<tr align="center">'; };
if($i == 153 ) { echo'<tr align="center">'; };
if($i == 156 ) { echo'<tr align="center">'; };
if($i == 159 ) { echo'<tr align="center">'; };
if($i == 162 ) { echo'<tr align="center">'; };
if($i == 165 ) { echo'<tr align="center">'; };
if($i == 168 ) { echo'<tr align="center">'; };
if($i == 171 ) { echo'<tr align="center">'; };
if($i == 174 ) { echo'<tr align="center">'; };
if($i == 177 ) { echo'<tr align="center">'; };
if($i == 180 ) { echo'<tr align="center">'; };
if($i == 183 ) { echo'<tr align="center">'; };
if($i == 186 ) { echo'<tr align="center">'; };
if($i == 189 ) { echo'<tr align="center">'; };
if($i == 192 ) { echo'<tr align="center">'; };
if($i == 195 ) { echo'<tr align="center">'; };
if($i == 198 ) { echo'<tr align="center">'; };

$formCreate = '
<form action="-id-'.$_GET['op1'].'-id-'.$_GET['op2'].'.html" method="POST" id="formSubmit'.$select_items_drop[$i][2].'' .$select_items_drop[$i][1].'">
<input type="hidden" name="name" value="'.$select_items_drop[$i][0].'">
<input type="hidden" name="ids" value="'.$select_items_drop[$i][2].'">
<input type="hidden" name="cat" value="'.$select_items_drop[$i][1].'">
<input type="hidden" name="exc" value="'.$select_items_drop[$i][5].'">
<input type="hidden" name="refin" value="'.$select_items_drop[$i][6].'">
<input type="hidden" name="sk" value="'.$select_items_drop[$i][7].'">
<input type="hidden" name="anc" value="'.$select_items_drop[$i][8].'">
<input type="hidden" name="skill" value="'.$select_items_drop[$i][9].'">
<input type="hidden" name="luck" value="'.$select_items_drop[$i][10].'">
<input type="hidden" name="level" value="'.$select_items_drop[$i][11].'">
<input type="hidden" name="linkData" value="'.$_GET['op2'].'">
<input type="hidden" name="mainSubmitData" value="0">
</form>
';

echo '
<td class="mvcore-itemnclass">
	'.$formCreate.'
	<table align="center" cellpadding="0" cellspacing="0">
		<tr onclick="document.getElementById(\'formSubmit'.$select_items_drop[$i][2].''.$select_items_drop[$i][1].'\').submit();">
			<td class="mvcore-item-top"><div align="center">'.$ech_name.'</div></td>
		</tr>
		<tr onclick="document.getElementById(\'formSubmit'.$select_items_drop[$i][2].''.$select_items_drop[$i][1].'\').submit();">
			<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="'.$image_load.'" border="0"></center></div></td>
		</tr>
	</table>
</td>
';


if($i == 2 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 5 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 8 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 11 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 14 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 17 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 20 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 23 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 26 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 29 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 32 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 35 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 38 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 41 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 44 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 47 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 50 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 53 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 56 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 59 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 62 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 65 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 68 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 71 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 74 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 77 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 80 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 83 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 86 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 89 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 92 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 95 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 98 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 101 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 104 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 107 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 110 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 113 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 116 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 119 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 122 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 125 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 128 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 131 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 134 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 137 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 140 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 143 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 146 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 149 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 152 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 155 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 158 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 161 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 164 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 167 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 170 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 173 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 176 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 179 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 182 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 185 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 188 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 191 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 194 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 197 ) { echo'</tr><tr><td height="15px"></td></tr>';};

 } ?>
										</table>
							<?php } ?>
							<?php if( $mvcore['webshop_s_menuposi'] == 'top') { ?>
							<div class="mvcore-ucp-info" align="center" style="width:100%;padding-top: 15px; padding-bottom: 15px;">
								<div align="center" style="text-align:center;">
									<?php if($mvcore['wshop_page1'] == '1') { echo"<a href='-id-Webshop-id-0.html'>".main_p_webshop_swords."</a> - ";} ?>
									<?php if($mvcore['wshop_page2'] == '1') { echo"<a href='-id-Webshop-id-1.html'>".main_p_webshop_axes."</a> - ";} ?>
									<?php if($mvcore['wshop_page3'] == '1') { echo"<a href='-id-Webshop-id-2.html'>".main_p_webshop_scepters."</a> - ";} ?>
									<?php if($mvcore['wshop_page4'] == '1') { echo"<a href='-id-Webshop-id-3.html'>".main_p_webshop_spears."</a> - ";} ?>
									<?php if($mvcore['wshop_page5'] == '1') { echo"<a href='-id-Webshop-id-4.html'>".main_p_webshop_bows."</a> - ";} ?>
									<?php if($mvcore['wshop_page6'] == '1') { echo"<a href='-id-Webshop-id-5.html'>".main_p_webshop_staff."</a> - ";} ?>
									<?php if($mvcore['wshop_page7'] == '1') { echo"<a href='-id-Webshop-id-6.html'>".main_p_webshop_shields."</a> - ";} ?>
									<?php if($mvcore['wshop_page8'] == '1') { echo"<a href='-id-Webshop-id-7.html'>".main_p_webshop_helps."</a> - ";} ?>
									<?php if($mvcore['wshop_page9'] == '1') { echo"<a href='-id-Webshop-id-8.html'>".main_p_webshop_armors."</a> - ";} ?>
									<?php if($mvcore['wshop_page10'] == '1') { echo"<a href='-id-Webshop-id-9.html'>".main_p_webshop_pants."</a> - ";} ?>
									<?php if($mvcore['wshop_page11'] == '1') { echo"<a href='-id-Webshop-id-10.html'>".main_p_webshop_gloves."</a> - ";} ?>
									<?php if($mvcore['wshop_page12'] == '1') { echo"<a href='-id-Webshop-id-11.html'>".main_p_webshop_boots."</a> - ";} ?>
									<?php if($mvcore['wshop_page13'] == '1') { echo"<a href='-id-Webshop-id-12.html'>".main_p_webshop_accesories."</a> - ";} ?>
									<?php if($mvcore['wshop_page14'] == '1') { echo"<a href='-id-Webshop-id-13.html'>".main_p_webshop_miscitems."</a> - ";} ?>
									<?php if($mvcore['wshop_page15'] == '1') { echo"<a href='-id-Webshop-id-14.html'>".main_p_webshop_miscitemstwo."</a> - ";} ?>
									<?php if($mvcore['wshop_page16'] == '1') { echo"<a href='-id-Webshop-id-15.html'>".main_p_webshop_scrolls."</a>";} ?>
								</div>
							</div>
							<br>
							<div style="float:right;padding-bottom:10px;"> Choose Class: 
							<form action="" method="POST">
								<select onchange="this.form.submit()" style="width:200px !important;" <?php echo'class="mvcore-select-main"'; ?> name="getClassCode" id="getClassCode">
									<option value="-1" <?php if($_POST['getClassCode'] == '-1') { echo'selected'; } else { echo''; }; ?>> All Classes </option>
									<option value="00" <?php if($_POST['getClassCode'] == '00') { echo'selected'; } else { echo''; }; ?>> Dark Wizard </option>
									<option value="016" <?php if($_POST['getClassCode'] == '016') { echo'selected'; } else { echo''; }; ?>> Dark Knight </option>
									<option value="032" <?php if($_POST['getClassCode'] == '032') { echo'selected'; } else { echo''; }; ?>> Elf </option>
									<option value="048" <?php if($_POST['getClassCode'] == '048') { echo'selected'; } else { echo''; }; ?>> Magic Gladiator </option>
									<option value="064" <?php if($_POST['getClassCode'] == '064') { echo'selected'; } else { echo''; }; ?>> Dark Lord </option>
									<?php if($mvcore['db_season'] >= '4') { ?><option value="080" <?php if($_POST['getClassCode'] == '080') { echo'selected'; } else { echo''; }; ?>> Summoner </option><?php } ?>
									<?php if($mvcore['db_season'] >= '6') { ?><option value="096" <?php if($_POST['getClassCode'] == '096') { echo'selected'; } else { echo''; }; ?>> Rage Fighter </option><?php } ?>
									<?php if($mvcore['db_season'] >= '9') { ?><option value="0112" <?php if($_POST['getClassCode'] == '0112') { echo'selected'; } else { echo''; }; ?>> Grow Lancer </option><?php } ?>
								</select>
							</form>
							</div>
							<br>
							<br>
										<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<?PHP
$default_category = $mvcore['wshop_default'];
if($_GET['op2'] == '0' && $mvcore['wshop_page1'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '1' && $mvcore['wshop_page2'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '2' && $mvcore['wshop_page3'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '3' && $mvcore['wshop_page4'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '4' && $mvcore['wshop_page5'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '5' && $mvcore['wshop_page6'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '6' && $mvcore['wshop_page7'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '7' && $mvcore['wshop_page8'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '8' && $mvcore['wshop_page9'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '9' && $mvcore['wshop_page10'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '10' && $mvcore['wshop_page11'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '11' && $mvcore['wshop_page12'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '12' && $mvcore['wshop_page13'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '13' && $mvcore['wshop_page14'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '14' && $mvcore['wshop_page15'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '15' && $mvcore['wshop_page16'] != '1') { $cat_drop = $default_category; }
elseif($_GET['op2'] == '') { $cat_drop = $default_category; } 
else { $cat_drop = $_GET['op2']; };

$nvalue1 = $_POST['getClassCode'];
$nvalue2 = $_POST['getClassCode'] + 1;
$nvalue3 = $_POST['getClassCode'] + 2;
$nvalue4 = $_POST['getClassCode'] + 3;

if($_POST['getClassCode'] == '00') {
	$nvalue1 = '00';
	$nvalue2 = '01';
	$nvalue3 = '02';
	$nvalue4 = '03';
}

if($_POST['getClassCode'] == '' && $_POST['getClassCode'] == '-1') {
	$select_items = $mvcorex->prepare("select top 300 item_name, category, id, item_cost, can_buy, max_excellent, has_refinery, is_socket, is_ancient, has_skill, has_luck, max_level, clases 
from MVCore_Wshopp 
where category = '".$cat_drop."' 
and can_buy >= '1' 
order by item_cost asc");
	$stmt = $select_items->execute();
	$stmt = $select_items->fetchAll();
	$select_items = $stmt;

} else {
	$showtopcl1 = "".$nvalue1.","; $showtopcl2 = "".$nvalue2.","; $showtopcl3 = "".$nvalue3.","; $showtopcl4 = "".$nvalue4.",";
	$select_items = $mvcorex->prepare("select top 300 item_name, category, id, item_cost, can_buy, max_excellent, has_refinery, is_socket, is_ancient, has_skill, has_luck, max_level, clases 
from MVCore_Wshopp 
where category = '".$cat_drop."' 
and can_buy >= '1' 
and CHARINDEX('".$showtopcl1."', clases) > 0 or category = '".$cat_drop."' 
and can_buy >= '1' 
and CHARINDEX('".$showtopcl2."', clases) > 0 
or category = '".$cat_drop."' 
and can_buy >= '1' 
and CHARINDEX('".$showtopcl3."', clases) > 0 
or category = '".$cat_drop."' 
and can_buy >= '1' 
and CHARINDEX('".$showtopcl4."', clases) > 0 
order by item_cost asc");
	$stmt = $select_items->execute();
	$stmt = $select_items->fetchAll();
    $select_items = $stmt;

}

for ($i = 0; $i < count($select_items); ++$i) {
$select_items_drop = $select_items;


if(strlen($select_items_drop[$i][0]) > '17'){
    $ech_name = '<div color="'.$mvcore['webshop_s_textcolor'].'">'.substr
    ($select_items_drop[$i][0], 0, 14).'...</div>';

} else {
    $ech_name = '<div color="'.$mvcore['webshop_s_textcolor'].'">'.$select_items_drop[$i][0].'</div>'; };
	
if (file_exists("system/engine_images/webshop/item_images/".$select_items_drop[$i][1]."/".$select_items_drop[$i][2]."
.gif")) {
    $image_load = "system/engine_images/webshop/item_images/".$select_items_drop[$i][1]."/".$select_items_drop[$i][2].".gif";

} else {
    $image_load = 'system/engine_images/webshop/item_images/no-img.gif'; };
	
if($i == 0 ) {
    echo'<tr align="center">';
};

if($i == 4 ) { echo'<tr align="center">'; };
if($i == 8 ) { echo'<tr align="center">'; };
if($i == 12 ) { echo'<tr align="center">'; };
if($i == 16 ) { echo'<tr align="center">'; };
if($i == 20 ) { echo'<tr align="center">'; };
if($i == 24 ) { echo'<tr align="center">'; };
if($i == 28 ) { echo'<tr align="center">'; };
if($i == 32 ) { echo'<tr align="center">'; };
if($i == 36 ) { echo'<tr align="center">'; };
if($i == 40 ) { echo'<tr align="center">'; };
if($i == 44 ) { echo'<tr align="center">'; };
if($i == 48 ) { echo'<tr align="center">'; };
if($i == 52 ) { echo'<tr align="center">'; };
if($i == 56 ) { echo'<tr align="center">'; };
if($i == 60 ) { echo'<tr align="center">'; };
if($i == 64 ) { echo'<tr align="center">'; };
if($i == 68 ) { echo'<tr align="center">'; };
if($i == 72 ) { echo'<tr align="center">'; };
if($i == 76 ) { echo'<tr align="center">'; };
if($i == 80 ) { echo'<tr align="center">'; };
if($i == 84 ) { echo'<tr align="center">'; };
if($i == 88 ) { echo'<tr align="center">'; };
if($i == 92 ) { echo'<tr align="center">'; };
if($i == 96 ) { echo'<tr align="center">'; };
if($i == 100 ) { echo'<tr align="center">'; };
if($i == 104 ) { echo'<tr align="center">'; };
if($i == 108 ) { echo'<tr align="center">'; };
if($i == 112 ) { echo'<tr align="center">'; };
if($i == 116 ) { echo'<tr align="center">'; };
if($i == 120 ) { echo'<tr align="center">'; };
if($i == 124 ) { echo'<tr align="center">'; };
if($i == 128 ) { echo'<tr align="center">'; };
if($i == 132 ) { echo'<tr align="center">'; };
if($i == 136 ) { echo'<tr align="center">'; };
if($i == 140 ) { echo'<tr align="center">'; };
if($i == 144 ) { echo'<tr align="center">'; };
if($i == 148 ) { echo'<tr align="center">'; };
if($i == 152 ) { echo'<tr align="center">'; };
if($i == 156 ) { echo'<tr align="center">'; };
if($i == 160 ) { echo'<tr align="center">'; };
if($i == 164 ) { echo'<tr align="center">'; };
if($i == 168 ) { echo'<tr align="center">'; };
if($i == 172 ) { echo'<tr align="center">'; };
if($i == 176 ) { echo'<tr align="center">'; };
if($i == 180 ) { echo'<tr align="center">'; };
if($i == 184 ) { echo'<tr align="center">'; };
if($i == 188 ) { echo'<tr align="center">'; };
if($i == 192 ) { echo'<tr align="center">'; };
if($i == 196 ) { echo'<tr align="center">'; };

$formCreate = '
<form action="-id-'.$_GET['op1'].'-id-'.$_GET['op2'].'.html" method="POST" id="formSubmit'.$select_items_drop[$i][2].''.$select_items_drop[$i][1].'">
<input type="hidden" name="name" value="'.$select_items_drop[$i][0].'">
<input type="hidden" name="ids" value="'.$select_items_drop[$i][2].'">
<input type="hidden" name="cat" value="'.$select_items_drop[$i][1].'">
<input type="hidden" name="exc" value="'.$select_items_drop[$i][5].'">
<input type="hidden" name="refin" value="'.$select_items_drop[6].'">
<input type="hidden" name="sk" value="'.$select_items_drop[$i][7].'">
<input type="hidden" name="anc" value="'.$select_items_drop[$i][8].'">
<input type="hidden" name="skill" value="'.$select_items_drop[$i][9].'">
<input type="hidden" name="luck" value="'.$select_items_drop[$i][10].'">
<input type="hidden" name="level" value="'.$select_items_drop[$i][11].'">
<input type="hidden" name="linkData" value="'.$_GET['op2'].'">
<input type="hidden" name="mainSubmitData" value="0">
</form>
';

echo '
<td class="mvcore-itemnclass">
	'.$formCreate.'
	<table align="center" cellpadding="0" cellspacing="0">
		<tr onclick="document.getElementById(\'formSubmit'.$select_items_drop[$i][2].''.$select_items_drop[$i][1].'\').submit();">
			<td class="mvcore-item-top"><div align="center">'.$ech_name.'</div></td>
		</tr>
		<tr onclick="document.getElementById(\'formSubmit'.$select_items_drop[$i][2].''.$select_items_drop[$i][1].'\').submit();">
			<td class="mvcore-item-mid"><div align="center" style="width:136px;height: 128px;"><center><img src="'.$image_load.'" border="0"></center></div></td>
		
		</tr>
	</table>
</td>
';

if($i == 3 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 7 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 11 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 15 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 19 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 23 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 27 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 31 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 35 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 39 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 43 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 47 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 51 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 55 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 59 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 63 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 67 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 71 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 75 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 79 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 83 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 87 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 91 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 95 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 99 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 103 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 107 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 111 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 115 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 119 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 123 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 127 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 131 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 135 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 139 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 143 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 147 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 151 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 155 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 159 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 163 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 167 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 171 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 175 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 179 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 183 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 187 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 191 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 195 ) { echo'</tr><tr><td height="15px"></td></tr>';};
if($i == 199 ) { echo'</tr><tr><td height="15px"></td></tr>';};

 } ?>
										</table>
							<?php } ?>

	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>