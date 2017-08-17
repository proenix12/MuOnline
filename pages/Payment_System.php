
<?php if(!$mvcore['Payment_System'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Payment_System'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<center>
<div style="text-align:center;">
							<?php if($mvcore['paymentwall_status'] == 'on') { ?><button href="javascript:;" class="mvcore-button-style" id="pw">PaymentWall</button><?php } ?>
							<?php if($mvcore['superrewards_status'] == 'on') { ?><button href="javascript:;" class="mvcore-button-style" id="sr">SuperRewards</button><?php } ?>
							<?php if($mvcore['paypal_status'] == 'on') { ?><button href="javascript:;" class="mvcore-button-style" id="pp">Paypal</button><?php } ?>
							<?php if($mvcore['paygol_status'] == 'on') { ?><button href="javascript:;" class="mvcore-button-style" id="pg">PayGol</button><?php } ?>
							<?php if($mvcore['fortumo_status'] == 'on') { ?><button href="javascript:;" class="mvcore-button-style" id="fort">Fortumo</button><?php } ?>
							<?php if($mvcore['pagseguro_status'] == 'on' && $mvcore['multi_dbs_supp'] == 'off') { ?><button href="javascript:;" class="mvcore-button-style" id="pags">PagSeguro</button><?php } ?>
							<?php if($mvcore['interkassa_status'] == 'on') { ?><button href="javascript:;" class="mvcore-button-style" id="inter">InterKassa</button><?php } ?>
</div>
<br>
		<script>
		function funcShowpp(){
			$("#div-pw").hide();
			$("#div-sr").hide();
			$("#div-pp").show();
			$("#div-pg").hide();
			$("#div-fort").hide();
			$("#div-pags").hide();
			$("#div-inter").hide();
		}
				
		$(document).ready(function(){
			
			$("#div-pp").show();
		
		var pw = '<?php echo $mvcore['paymentwall_status']; ?>';
		var sr = '<?php echo $mvcore['superrewards_status']; ?>';
		var pp = '<?php echo $mvcore['paypal_status']; ?>';
		var pg = '<?php echo $mvcore['paygol_status']; ?>';
		var fort = '<?php echo $mvcore['fortumo_status']; ?>';
		var pags = '<?php echo $mvcore['pagseguro_status']; ?>';
		var inter = '<?php echo $mvcore['interkassa_status']; ?>';
			
			
			if(pw == 'on') { $("#pw").click(function(){
				$("#div-pw").show();
				$("#div-sr").hide();
				$("#div-pp").hide();
				$("#div-pg").hide();
				$("#div-fort").hide();
				$("#div-pags").hide();
				$("#div-inter").hide();
			}); }
			if(sr == 'on') { $("#sr").click(function(){
				$("#div-pw").hide();
				$("#div-sr").show();
				$("#div-pp").hide();
				$("#div-pg").hide();
				$("#div-fort").hide();
				$("#div-pags").hide();
				$("#div-inter").hide();
			}); }
			if(pp == 'on') { $("#pp").click(function(){
				$("#div-pw").hide();
				$("#div-sr").hide();
				$("#div-pp").show();
				$("#div-pg").hide();
				$("#div-fort").hide();
				$("#div-pags").hide();
				$("#div-inter").hide();
			}); }
			if(pg == 'on') { $("#pg").click(function(){
				$("#div-pw").hide();
				$("#div-sr").hide();
				$("#div-pp").hide();
				$("#div-pg").show();
				$("#div-fort").hide();
				$("#div-pags").hide();
				$("#div-inter").hide();
			}); }
			if(fort == 'on') { $("#fort").click(function(){
				$("#div-pw").hide();
				$("#div-sr").hide();
				$("#div-pp").hide();
				$("#div-pg").hide();
				$("#div-fort").show();
				$("#div-pags").hide();
				$("#div-inter").hide();
			}); }
			if(pags == 'on') { $("#pags").click(function(){
				$("#div-pw").hide();
				$("#div-sr").hide();
				$("#div-pp").hide();
				$("#div-pg").hide();
				$("#div-fort").hide();
				$("#div-pags").show();
				$("#div-inter").hide();
			}); }
			if(inter == 'on') { $("#inter").click(function(){
				$("#div-pw").hide();
				$("#div-sr").hide();
				$("#div-pp").hide();
				$("#div-pg").hide();
				$("#div-fort").hide();
				$("#div-pags").hide();
				$("#div-inter").show();
			}); }
		});
		</script>
<div id="div-fort" style="display: none;">
	<script src="https://assets.fortumo.com/fmp/fortumopay.js" type="text/javascript"></script>
	<a id="fmp-button" href="#" rel="<?php echo $mvcore['fortumo_serv_id'];?>/<?php echo''.$_SESSION['username'].'49729'.$db_name_drop.'';?>" class="mvcore-button-style">
		Fortumo Pay With Mobile
	</a>
</div>
<div id="div-pp" style="display: none;">
<?php if($mvcore['paypal_promo'] != '') { echo''.$mvcore['paypal_promo'].'<br>'; }; ?>
<?php

if($_POST['submit_pp'] == '') {
echo'
	<table class="mvcore-table" cellpadding="0" cellspacing="0">
		<tbody><tr class="mvcore-tabletr">
			<td>'.main_p_payment_sys_packname.'</td>
			<td>'.$mvcore['money_name2'].'</td>
			<td>EUR</td>
			<td>USD</td>
			<td>GBP</td>
		</tr>
'; }

if(isset($_POST['submit_pp'])) {
	
	$useracc = $_SESSION['username']; // Get username
	$corrency_name = $_POST['c1'];
	$corpa_data = explode("554yy5",$corrency_name);
	$corrency_name = $corpa_data[1];
	$pack_name = $corpa_data[0];

if($corrency_name == '') {
    $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_payment_sys_correntselected.'</div>';

};

if($corrency_name == '1'){
	$cur_n = 'EUR';
	$select_ppx_info = $mvcorex->prepare("Select pack_name, money, cost_eur from MVCore_PP_Packs where pack_name = '" .$pack_name."'");
    $stmt    = $select_ppx_info->execute();
    $stmt    = $select_ppx_info->fetch();
    $s_ppx_i = $stmt;
} elseif($corrency_name == '2'){
	$cur_n   = 'USD';
	$select_ppx_info = $mvcorex->prepare("Select pack_name, money, cost_usd from MVCore_PP_Packs where pack_name = '" .$pack_name."'");
    $stmt    = $select_ppx_info->execute();
	$stmt    = $select_ppx_info->fetch();
    $s_ppx_i = $stmt;
} elseif($corrency_name == '3'){
	$cur_n   = 'GBP';
	$select_ppx_info = $mvcorex->prepare("Select pack_name, money, cost_gbp from MVCore_PP_Packs where pack_name = '".$pack_name."'");
	$stmt    = $select_ppx_info->execute();
	$stmt    = $select_ppx_info->fetch();
	$s_ppx_i = $stmt;
};

    $select_ppxs_info = $mvcorex->prepare("Select pack_name from MVCore_PP_Packs where pack_name = '".$pack_name."'");
    $stmt    = $select_ppxs_info->execute();
    $stmt    = $select_ppxs_info->fetch();
    $s_ppxs_i= $stmt;

if($s_ppxs_i[0] == '') {
    $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_payment_sys_papalnamenotfoud.'</div>';

};
if($pvsPaymentSystem != 'ok6523') {
    exit;
};
//Random digits
function genRanDig($length = 7) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$rand_here = genRanDig(); //Random Invoice

if($has_error >= '1'){} else {

	
$do_insert = $mvcorex->prepare("insert into MVCore_Tran_Log (business,currency_code,item_name,custom,invoice,amount,money) VALUES 
('".$mvcore['paypal_email']."','".$cur_n."','".$s_ppx_i[2]." ".$cur_n." For ".$s_ppx_i[1]." ".$mvcore['money_name2']."','".$useracc."','".$rand_here."','".$s_ppx_i[2]."','".$s_ppx_i[1]."')");
$stmt = $do_insert->execute();
echo'
<script>
$(document).ready(function(){
	$("#div-pw").hide();
	$("#div-sr").hide();
	$("#div-pp").show();
	$("#div-pg").hide();
	$("#div-fort").hide();
	$("#div-pags").hide();
	$("#div-inter").hide();
});
$( "#buttonClickeds" ).on("click", function() {
			var GetVald = "'.$s_ppx_i[2].'";
			$("input[name=amount]").val(GetVald);
			$("#cbyids").val(GetVald);
			
			var customs = "'.$useracc.'49729'.$db_name_drop.'";
			$("input[name=custom]").val(customs);
			$("#sdcbyids").val(customs);
});
</script>
<form action="https://www.paypal.com/uk/cgi-bin/webscr" method="post">
<input name="cmd" value="_xclick" type="hidden">
<input name="business" value="'.$mvcore['paypal_email'].'" type="hidden">
<input name="cbt" value="Return to '.$mvcore['stitle'].'" type="hidden">
<input name="currency_code" value="'.$cur_n.'" type="hidden">
<input name="quantity" value="1" type="hidden">

<input name="item_name" value="'.$s_ppx_i[2].' '.$cur_n.' For '.$s_ppx_i[1].' '.$mvcore['money_name2'].'" type="hidden">
<input name="custom" value="'.$useracc.'49729'.$db_name_drop.'" id="sdcbyids" type="hidden">
<input name="shipping" value="0" type="hidden">
<input name="invoice" value="'.$rand_here.'" type="hidden">
<input name="amount" value="'.$s_ppx_i[2].'" id="cbyids" type="hidden">
<input name="return" value="'.$mvcore['surl'].'" type="hidden">
<input name="cancel_return" value="'.$mvcore['surl'].'" type="hidden">
<input name="notify_url" value="'.$mvcore['surl'].'/PostBack.php" type="hidden">
<input type="hidden" name="rm" value="2">

<table class="mvcore-table" cellpadding="0" cellspacing="0">
			<tr class="mvcore-tabletr">
				<td><b>'.$s_ppx_i[2].' '.$cur_n.' '.main_p_payment_sys_for.' '.$s_ppx_i[1].' '.$mvcore['money_name2'].'</b></td>
				<td>'.main_p_payment_sys_processpayment.' </td>
				<td id="buttonClickeds"><input type="image" src="system/engine_images/paypal.png" width="150px" name="submit_pp" value="SUBMIT" /></td>
			</tr>
</table>
</form>
';
	
};
};


if($_POST['submit_pp'] == '') {
echo'<form action="" method="post" id="2321">';
$select_pp_info= $mvcorex->prepare("Select pack_name, money, cost_eur, cost_usd, cost_gbp from MVCore_PP_Packs order by money asc");
$stmt = $select_pp_info->execute();
$stmt = $select_pp_info->fetchAll(PDO::FETCH_BOTH);
$select_pp_info = $stmt;


for ($i = 0; $i < count($select_pp_info); ++$i) {
$s_pp_i= $select_pp_info;
if($pvsPaymentSystem != 'ok6523') {
    exit;
};
echo'
			<tr>
				<td><b>'.$s_pp_i[$i][0].'</b></td>
				<td><b>'.$s_pp_i[$i][1].'</b></td>
				<td>'.$s_pp_i[$i][2].' EUR <input name="c1" value="'.$s_pp_i[$i][0].'554yy51" type="radio" checked></td>
				<td>'.$s_pp_i[$i][3].' USD <input name="c1" value="'.$s_pp_i[$i][0].'554yy52" type="radio"></td>
				<td>'.$s_pp_i[$i][4].' GBP <input name="c1" value="'.$s_pp_i[$i][0].'554yy53" type="radio"></td>
			</tr>

';

};
echo'<tr align="center"><td colspan="5"><button name="submit_pp" value="000" class="mvcore-button-style" type="submit">'.main_p_payment_sys_checkout.'</button></td></tr></form></table>';
}					
?>
</div>

<?php
//Select user Email
$gUEFD = $mvcorex->prepare("select mail_addr from ".$mvcore_medb_i." where memb___id = '".$_SESSION['username']."'");
$stmt = $gUEFD->execute();
$stmt = $gUEFD->fetch();
$emailIs = $stmt;
?>
<div id="div-pw" style="display: none;">
<?php if($mvcore['paymentwall_promo'] != '') {
    echo''.$mvcore['paymentwall_promo'].'<br>';

}; ?>
	<iframe src="https://api.paymentwall.com/api/<?php echo $mvcore['paymentwall_widget_link'];?>/?key=<?php echo $mvcore['paymentwall_pkey'];?>&uid=<?php echo''.$_SESSION['username'].'49729'.$db_name_drop.'';?>&email=<?php echo $emailIs[0];?>&history[registration_date]=<?php echo''.time().'';?>&widget=<?php echo $mvcore['paymentwall_widget'];?><?php echo $mvcore['paymentwall_widgetnum'];?>" width="<?php echo $mvcore['paymentwall_width'];?>px" height="<?php echo $mvcore['paymentwall_height'];?>px" frameborder="0"></iframe>
</div>

<div id="div-sr" style="display: none;">
<?php if($mvcore['superrewards_promo'] != '') {
    echo''.$mvcore['superrewards_promo'].'<br>';

}; ?>
	<iframe src="https://wall.superrewards.com/super/offers?h=<?php echo $mvcore['superrewards_api'];?>&uid=<?php echo''.$_SESSION['username'].'49729'.$db_name_drop.'';?>" frameborder="0" width="<?php echo $mvcore['superrewards_width'];?>px" height="<?php echo $mvcore['superrewards_height'];?>px" scrolling="no"></iframe>
</div>

<div id="div-pags" style="display: none;">
	<iframe src="system/engine_plugins/pagseguro/index.php" frameborder="0" width="100%" height="200px" scrolling="no"></iframe>
</div>

<div id="div-inter" style="display: none;">
<?php

if($_POST['ik_hed'] != '' && $_POST['ik_gew'] != '') {
	
//Random digits
function genRanDig($length = 7) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$useracc = $_SESSION['username']; // Get username
$rand_invoc = genRanDig(); //Random Invoice
$rand_pm_no = genRanDig(); //Random PM Nomber
if($pvsPaymentSystem != 'ok6523') { exit; };
if($mvcore['interkassa_val_p1'] == $_POST['ik_gew']) { $cr_value = $mvcore['interkassa_cred_p1']; }
elseif($mvcore['interkassa_val_p2'] == $_POST['ik_gew']) { $cr_value = $mvcore['interkassa_cred_p2']; }
elseif($mvcore['interkassa_val_p3'] == $_POST['ik_gew']) { $cr_value = $mvcore['interkassa_cred_p3']; }
elseif($mvcore['interkassa_val_p4'] == $_POST['ik_gew']) { $cr_value = $mvcore['interkassa_cred_p4']; }
elseif($mvcore['interkassa_val_p5'] == $_POST['ik_gew']) { $cr_value = $mvcore['interkassa_cred_p5']; }
else { $cr_value = 0; }
$conv = 'ID_'.$rand_pm_no.'';
$do_insert = $mvcorex->prepare("insert into MVCore_Tran_Log (business,currency_code,item_name,custom,invoice,amount,money) VALUES ('Interkassa','".$mvcore['interkassa_cur_code']."','Buy Gold Credits Via Interkassa','".$_SESSION['username']."49729".$db_name_drop."','$conv','".$_POST['ik_gew']."','".$cr_value."')");
$$stmt = $do_insert->execute();

echo'
<script>
$(document).ready(function(){
	$("#div-pw").hide();
	$("#div-sr").hide();
	$("#div-pp").hide();
	$("#div-pg").hide();
	$("#div-fort").hide();
	$("#div-pags").hide();
	$("#div-inter").show();
	
	document.getElementById("34y43g464").submit();
	
});
</script>
	<form name="payment" id="34y43g464" method="post" target="_blank" action="https://sci.interkassa.com/" accept-charset="UTF-8">
		<input type="hidden" name="ik_co_id" value="'.$mvcore['interkassa_ch_id'].'" />
		<input type="hidden" name="ik_pm_no" value="ID_'.$rand_pm_no.'" />
		<input type="hidden" name="ik_inv_id" value="'.$rand_invoc.'" />
		<input type="hidden" name="ik_am" value="'.$_POST['ik_gew'].'" />
		<input type="hidden" name="ik_desc" value="Buy '.$mvcore['money_name2'].'" />
		<input type="hidden" name="ik_cur" value="'.$mvcore['interkassa_cur_code'].'" />
	</form>
';

};

echo '
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tr><td>Choose Amount & Click Buy '.$mvcore['money_name2'].'</td></tr>
	<tr>
		<td>
			<form method="post" action="">
				<select name="ik_gew" class="mvcore-select-main" style="width:220px !important;">
					<option value="'.$mvcore['interkassa_val_p1'].'">'.$mvcore['interkassa_val_p1'].' Eur '.main_p_payment_sys_for.' '.$mvcore['interkassa_cred_p1'].' '.$mvcore['money_name2'].'</option>
					<option value="'.$mvcore['interkassa_val_p2'].'">'.$mvcore['interkassa_val_p2'].' Eur '.main_p_payment_sys_for.' '.$mvcore['interkassa_cred_p2'].' '.$mvcore['money_name2'].'</option>
					<option value="'.$mvcore['interkassa_val_p3'].'">'.$mvcore['interkassa_val_p3'].' Eur '.main_p_payment_sys_for.' '.$mvcore['interkassa_cred_p3'].' '.$mvcore['money_name2'].'</option>
					<option value="'.$mvcore['interkassa_val_p4'].'">'.$mvcore['interkassa_val_p4'].' Eur '.main_p_payment_sys_for.' '.$mvcore['interkassa_cred_p4'].' '.$mvcore['money_name2'].'</option>
					<option value="'.$mvcore['interkassa_val_p5'].'">'.$mvcore['interkassa_val_p5'].' Eur '.main_p_payment_sys_for.' '.$mvcore['interkassa_cred_p5'].' '.$mvcore['money_name2'].'</option>
				</select>
				<input type="submit" name="ik_hed" class="mvcore-button-style" value="'.main_p_payment_sys_buyehrer.' '.$mvcore['money_name2'].'">
			</form>
		</td>
	</tr>
</table>
';
?>
</div>
	
<div id="div-pg" style="display: none;">
<?php if($mvcore['paygol_promo'] != '') { echo''.$mvcore['paygol_promo'].'<br>'; }; ?>
<?php

echo'
	<table class="mvcore-table" cellpadding="0" cellspacing="0">
		<tbody><tr class="mvcore-tabletr">
			<td>'.main_p_payment_sys_packname.'</td>
			<td>'.main_p_payment_sys_paywithpaygol.'</td>
		</tr>
';

$select_pg_info= $mvcorex->prepare("Select p_name, money, cost_eur, currency  from MVCore_PG_Packs order by money asc");
$stmt = $select_pg_info->execute();
$stmt = $select_pg_info->fetchAll(PDO::FETCH_BOTH);
$select_pg_info = $stmt;
for($i = 0; $i < count($select_pg_info); ++$i) {
$s_pg_i= $select_pg_info;

$c_up = $i + 1 ;

echo'
<form name="pg_frm" method="post" action="https://www.paygol.com/pay" >
	   <input type="hidden" name="pg_serviceid" value="'.$mvcore['paygol_sid'].'">
	   <input type="hidden" name="pg_currency" value="'.$s_pg_i[$i][3].'">
	   <input type="hidden" name="pg_name" value="Buy '.$mvcore['money_name2'].'">
	   <input type="hidden" name="pg_custom" value="'.$_SESSION['username'].'49729'.$db_name_drop.'">
	   <input type="hidden" name="pg_return_url" value="'.$mvcore['surl'].'">
	   <input type="hidden" name="pg_price" value="'.$s_pg_i[$i][2].'">
	   <input type="hidden" name="pg_cancel_url" value="">
				<tr>
					<td><b>'.$s_pg_i[$i][1].' '.$mvcore['money_name2'].' For '.$s_pg_i[$i][2].' EUR</b></td>
					<input type="hidden" name="pg_price" value="'.$c_up.'">
					<td><input type="image" style="margin-top:9px;" width="110px" name="pg_button" src="system/engine_images/white.png" alt="Make payments with PayGol: the easiest way!" title="Make payments with PayGol: the easiest way!" ></td>
				</tr>
</form>
';

};
echo'</table>';							
?>
	</form>
</div>
</center>
	<?php } else {
	    echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>';

	}; ?>
<?php } ?>