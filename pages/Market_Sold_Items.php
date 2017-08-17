
<?php if(!$mvcore['Market_Sold_Items'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Market_Sold_Items'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<div style="font-size:20px;" align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Warehouse.html"><?php echo main_p_market_sold_items_backtoware; ?></a></td></tr></table></div>

<?php
	$useracc = $_SESSION['username']; // Get Loged In Username
	$get_sold_items = mssql_query("SELECT top $Rank_show name,price,type,soldto,date from market_sold_items where memb___id = '".$useracc."' order by date desc");
	$drop_s_si = mssql_fetch_row($get_sold_items);
	if($drop_s_si[0] == '') { echo'<div class="mvcore-nNote mvcore-nInformation">'.main_p_market_sold_items_listempty.'</div>'; } else {
?>

<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr class="mvcore-tabletr">
		<td>#</td>
		<td><?php echo main_p_market_sold_items_itemname;?></td>
		<td><?php echo main_p_market_sold_items_soldto;?></td>
		<td><?php echo main_p_market_sold_items_for;?></td>
		<td><?php echo main_p_market_sold_items_ondate;?></td>
	</tr>
<?PHP

$useracc = (''.clean_variable($_SESSION['user_login_name']).''); // Get Loged In Username

$get_sold_items = mssql_query("SELECT top $Rank_show name,price,type,soldto,date from market_sold_items where memb___id = '".$useracc."' order by date desc");
for($i=0;$i < mssql_num_rows($get_sold_items);++$i) {
$drop_s_i = mssql_fetch_row($get_sold_items);

$get_char_info_name= mssql_query("Select top 1 name from Character where AccountID='".$drop_s_i[3]."'");
$s_char_is= mssql_fetch_row($get_char_info_name);

$rank = $i+1;

if($drop_s_i[2] == '1'){$ptype = $muweb['money_name1'];}
elseif($drop_s_i[2] == '2'){$ptype = 'WCoins';}
elseif($drop_s_i[2] == '3'){$ptype = 'Zen';}
elseif($drop_s_i[2] == '4'){$ptype = $muweb['money_name2'];}
else {$ptype = $muweb['money_name1'];};

$solddate = date ("Y-m-d H:i:s", $drop_s_i[4]);

$tr_color_2 = "even2"; 
$tr_color_1 = "even";
$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;
echo "
	<tr style='border-collapse: collapse; border-spacing: 0px;'>
		<td style='padding: 6px 3px 6px 3px;'>$rank</td>
		<td style='padding:0;'>$drop_s_i[0]</td>
		<td style='padding:0;'>$s_char_is[0]</td>
		<td style='padding:0;'>$drop_s_i[1] $ptype</td>
		<td style='padding:0;'>$solddate</td>
	</tr>
";
}
?>
</table>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>