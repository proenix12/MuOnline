<?php


//IF Season 1 Then Option Data Empty.
	
//End

if($mvcore['db_season'] != '1') { //If Not Season 1
		if( $ioo >= '128' && $itemtype == '12' && $sy >= '0'){
			
			$sy = 256 + $sy;
			$ioo = $ioo - 128;
		}
		
		if( $ioo >= '128' && $itemtype == '13' && $sy >= '0'){
			
			$sy = 256 + $sy;
			$ioo = $ioo - 128;
		}
		
		if( $ioo >= '128' && $itemtype == '14' && $sy >= '0'){
			
			$sy = 256 + $sy;
			$ioo = $ioo - 128;
		}
};

	$nameselects= $mvcorex->prepare("Select item_name,durability,equip_level,can_buy,max_excellent,has_refinery,is_socket,is_ancient,category,id,clases 
    from MVCore_Wshopp where id= :dataId 
    and category= :category"
    );
	$stmt = $nameselects->execute( array(
            'dataId'   => $sy,
            'category' => $itemtype
        )
    );
	$stmt = $nameselects->fetch();
	$nameselect= $stmt;
	
		if($ac == '5') {
			$select_anc_info= $mvcorex->prepare("Select anc_name,item_id,item_cat 
            from MVCore_Wshopp_Ancient where item_id= :item_id 
            and item_cat= :item_cat"
            );
			$stmt = $select_anc_info->execute( array(
			        'item_id' => $sy,
                    'item_cat' => $itemtype
                )
            );
			$stmt = $select_anc_info->fetch();
			$s_anc_i= $stmt;

		} elseif($ac == '10') {
            $select_anc_info= $mvcorex->prepare("Select anc_name2,item_id,item_cat 
            from MVCore_Wshopp_Ancient 
            where item_id= :item_id and item_cat= :item_cat"
            );
            $stmt = $select_anc_info->execute( array(
                    'item_id' => $sy,
                    'item_cat' => $itemtype
                )
            );
            $stmt = $select_anc_info->fetch();
            $s_anc_i= $stmt;

		};

$select_anc_infoopt= $mvcorex->prepare("Select anc_name,options 
from MVCore_Wshopp_Ancient_Opt 
where anc_id= :anc_id"
);
$stmt = $select_anc_infoopt->execute( array(
    'anc_id' => $s_anc_[0]

) );
$stmt = $select_anc_infoopt->fetch();
$s_anc_iopt= $stmt;

if($ac == '5' || $ac == '10'){
    $anc_name = $s_anc_iopt[0];
    $acp_anc_name = $s_anc_i[0];
    $anc_option = '<br><div color=#e4ca6d>Set Item Options</div><br><br><div color=#666666>'.$s_anc_iopt[1].'</div><br>';
} else {
    $anc_name = ''; $anc_option = '';

};

if($sy == '37' && $itemtype == '13' && $ioo == '04') {
    $fenrir='Life 200 increase<br>200 increases<br>Attack power 33 increases<br>Defense power 16 increases<br><br><div color=#01DF01>Extremely rare and given only to the worthy.<br>It is produced in limited quantitues.</div>';

} elseif($sy == '37' && $itemtype == '13' && $ioo == '02') {
    $fenrir='Absorb final damage 10%<br>Increase speed';

}
elseif($sy == '37' && $itemtype == '13' && $ioo == '01') {
    $fenrir='Absorb final defense 10%<br>Increase speed';

}
elseif($sy == '0' && $itemtype == '13') {
    $fenrir='Absorb 20% of Demage<br>Max HP +50 increased';

}
elseif($sy == '1' && $itemtype == '13') {
    $fenrir='Increase 30% of attacking & Wizardry Dmg';

}
elseif($sy == '4' && $itemtype == '13') {
    $fenrir='Increases defensive skill + 225<br>Absorb 15% additional damage<br>Increase 2 possible attack distance';

}
elseif($sy == '5' && $itemtype == '13') {
    $fenrir='Dmg(rate): 180-200 (1000)<br>Attack speed: 20';

}
elseif($sy == '64' && $itemtype == '13') {
    $fenrir='Damage, horsepower, improve jeojuryeck 40%<br>Attack Speed + 10';

}
elseif($sy == '65' && $itemtype == '13') {
    $fenrir='Absorb 30% of monster attack.<br>Maximum Health + 50';

} else {
    $fenrir='';

}


if($sy == '37' && $itemtype == '13' && $ioo == '04') { $fenrirstat='Illusion';}
elseif($sy == '37' && $itemtype == '13' && $ioo == '02') { $fenrirstat='Damage';}
elseif($sy == '37' && $itemtype == '13' && $ioo == '01') { $fenrirstat='Defence';}
elseif($sy == '37' && $itemtype == '13' && $ioo == '00') { $fenrirstat='Normal';}
else { $fenrirstat='';}

if($drop_item_upg[3] == '26') {
	//Upgrade System
	if($itemtype == '0' && $item_refinary > '0') {
	    $drop_plus_level = ''; $ref='<div color=green>+ ( </div>Additional damage + 200<br>Attack success rate increase + 10 <div color=green>)</div><br><br>';

	}
	elseif($itemtype == '2' && $item_refinary > '0') {
	    $drop_plus_level = ''; $ref='<div color=green>+ ( </div>Additional damage + 200<br>Attack success rate increase + 10 <div color=green>)</div><br><br>';

	}
	elseif($itemtype == '4' && $item_refinary > '0') {
	    $drop_plus_level = ''; $ref='<div color=green>+ ( </div>Additional damage + 200<br>Attack success rate increase + 10 <div color=green>)</div><br><br>';

	}
	elseif($itemtype == '5' && $item_refinary > '0') {
	    $drop_plus_level = ''; $ref='<font color=green>+ ( </font>Additional damage + 200<br>Attack success rate increase + 10 <font color=green>)</font><br><br>';

	}
	elseif($itemtype == '7' && $item_refinary > '0') {
	    $drop_plus_level = ''; $ref='<div color=green>+ ( </div>SD recovery rate increase + 20<br>Defence success rate increase + 10 <div color=green>)</div><br><br>';

	}
	elseif($itemtype == '8' && $item_refinary > '0') {
	    $drop_plus_level = ''; $ref='<div color=green>+ ( </div>SD auto recovery<br>Defence success rate increase + 10 <div color=green>)</div><br><br>';

	}
	elseif($itemtype == '9' && $item_refinary > '0') {
	    $drop_plus_level = ''; $ref='<div color=green>+ ( </div>Defensive skill + 200<br>Defence success rate increase + 10 <div color=green>)</div><br><br>';

	}
	elseif($itemtype == '10' && $item_refinary > '0') {
	    $drop_plus_level = ''; $ref='<div color=green>+ ( </div>Max HP increase + 200<br>Defence success rate increase + 10 <div color=green>)</div><br><br>';

	}
	elseif($itemtype == '11' && $item_refinary > '0') {
	    $drop_plus_level = ''; $ref='<div color=green>+ ( </div>Max SD increase + 700<br>Defence success rate increase + 10 <div color=green>)</div><br><br>';

	}
	else {
	    $drop_plus_level = ''; $ref='';

	}
	//end
} else {
	if($itemtype == '0' && $item_refinary > '0') {
	    $acp_refsa = '1'; $ref='Additional damage + 200<br>Attack success rate increase + 10<br><br>';

	}
	elseif($itemtype == '2' && $item_refinary > '0') {
	    $acp_refsa = '1'; $ref='Additional damage + 200<br>Attack success rate increase + 10<br><br>';

	}
	elseif($itemtype == '4' && $item_refinary > '0') {
	    $acp_refsa = '1'; $ref='Additional damage + 200<br>Attack success rate increase + 10<br><br>';
	} elseif($itemtype == '5' && $item_refinary > '0') { $acp_refsa = '1'; $ref='Additional damage + 200<br>Attack success rate increase + 10<br><br>';

	} elseif($itemtype == '7' && $item_refinary > '0') {
	    $acp_refsa = '1'; $ref='SD recovery rate increase + 20<br>Defence success rate increase + 10<br><br>';

	} elseif($itemtype == '8' && $item_refinary > '0') {
	    $acp_refsa = '1'; $ref='SD auto recovery<br>Defence success rate increase + 10<br><br>';

	} elseif($itemtype == '9' && $item_refinary > '0') {
	    $acp_refsa = '1'; $ref='Defensive skill + 200<br>Defence success rate increase + 10<br><br>';

	} elseif($itemtype == '10' && $item_refinary > '0') {
	    $acp_refsa = '1'; $ref='Max HP increase + 200<br>Defence success rate increase + 10<br><br>';

	} elseif($itemtype == '11' && $item_refinary > '0') {
	    $acp_refsa = '1'; $ref='Max SD increase + 700<br>Defence success rate increase + 10<br><br>';

	} else {
	    $ref='';
	}
};

if($mvcore['socket_type'] == 'scfmt'){
	$sk_type_drop = '0';
	$item_socket1 = $item_socket[1] - 1; 
	$item_socket2 = $item_socket[2] - 1; 
	$item_socket3 = $item_socket[3] - 1; 
	$item_socket4 = $item_socket[4] - 1; 
	$item_socket5 = $item_socket[5] - 1; 
} else { 
	$sk_type_drop = '255';
	$item_socket1 = $item_socket[1]; 
	$item_socket2 = $item_socket[2]; 
	$item_socket3 = $item_socket[3]; 
	$item_socket4 = $item_socket[4]; 
	$item_socket5 = $item_socket[5]; 
};

if( $itemtype == 12 && $sy >= 221 && $sy <= 261 ) {
	$socketinfos = '<br>Elemental Slot Options<br><br>';
} else {
	if($item_socket[1] == '' && $item_socket[1] != '0' || $item_socket[1] == $sk_type_drop || $item_socket[1] == '-1' && $item_socket[1] != '0'){
	    $socketinfos = '';

	} else {
	    $socketinfos = '<br>Socket Options On Item<br><br>';

	};
}

// Socket 1 Information Select
$select_sok_info1= $mvcorex->prepare("Select sok_id,sok_name from MVCore_Wshopp_Socket where sok_id= :sock_id");
$stmt = $select_sok_info1->execute( array(
    'sock_id' => $item_socket1
) );
$stmt = $select_sok_info1->fetch();
$s_sok_i1= $stmt;

if($item_socket[1] == '' && $item_socket[1] != '0' || $item_socket[1] == $sk_type_drop || $item_socket[1] == '-1' && $item_socket[1] != '0') {
    $sok_info_drop1 ='';

} else {
    $acp_socket1 = $s_sok_i1[1]; $sok_info_drop1 = '<div color=#7fb2ff>'.$s_sok_i1[1].'</div><br>';

}; // Socket 1
// End Select

// Socket 2 Information Select
$select_sok_info2= $mvcorex->prepare("Select sok_id,sok_name from MVCore_Wshopp_Socket where sok_id= :sock_id");
$stmt = $select_sok_info2->execute( array(
    'sock_id' => $item_socket2
) );
$stmt = $select_sok_info2->fetch();
$s_sok_i2= $stmt;

if($item_socket[2] == '' && $item_socket[2] != '0' || $item_socket[2] == $sk_type_drop || $item_socket[2] == '-1' && $item_socket[2] != '0') {
    $sok_info_drop2 ='';

} else {
    $acp_socket2 = $s_sok_i2[1]; $sok_info_drop2 = '<font color=#7fb2ff>'.$s_sok_i2[1].'</font><br>';

}; // Socket 2
// End Select

// Socket 3 Information Select
$select_sok_info3= $mvcorex->prepare("Select sok_id,sok_name from MVCore_Wshopp_Socket where sok_id= :sock_id");
$stmt = $select_sok_info3->execute( array(
    'sock_id' => $item_socket3
) );
$stmt = $select_sok_info3->fetch();
$s_sok_i3= $stmt;
if($item_socket[3] == '' && $item_socket[3] != '0' || $item_socket[3] == $sk_type_drop || $item_socket[3] == '-1' && $item_socket[3] != '0') {
    $sok_info_drop3 ='';

} else {
    $acp_socket3 = $s_sok_i3[1]; $sok_info_drop3 = '<div color=#7fb2ff>'.$s_sok_i3[1].'</div><br>';

}; // Socket 3
// End Select

// Socket 4 Information Select
$select_sok_info4= $mvcorex->prepare("Select sok_id,sok_name from MVCore_Wshopp_Socket where sok_id= :sock_id");
$stmt = $select_sok_info4->execute( array(
    'sock_id' => $item_socket4
) );
$stmt = $select_sok_info4->fetch();
$s_sok_i4= $stmt;

if($item_socket[4] == '' && $item_socket[41] != '0' || $item_socket[4] == $sk_type_drop || $item_socket[4] == '-1' && $item_socket[4] != '0') {
    $sok_info_drop4 ='';

} else {
    $acp_socket4 = $s_sok_i4[1]; $sok_info_drop4 = '<div color=#7fb2ff>'.$s_sok_i4[1].'</div><br>';

}; // Socket 4
// End Select

// Socket 5 Information Select
$select_sok_info5= $mvcorex->prepare("Select sok_id,sok_name from MVCore_Wshopp_Socket where sok_id= :sock_id");
$stmt = $select_sok_info5->execute( array(
    'sock_id' => $item_socket5
) );
$stmt = $select_sok_info5->fetch();
$s_sok_i5= $stmt;
if($item_socket[5] == '' && $item_socket[5] != '0' || $item_socket[5] == $sk_type_drop || $item_socket[5] == '-1' && $item_socket[5] != '0') {
    $sok_info_drop5 ='';

} else {
    $acp_socket5 = $s_sok_i5[1]; $sok_info_drop5 = '<font color=#7fb2ff>'.$s_sok_i5[1].'</font><br>';

}; // Socket 5
// End Select


if( $itemtype == 12 && $sy >= 221 && $sy <= 261 ) {

$item_slot_1 = dechex($item_socket[1]);
$item_slot_2 = dechex($item_socket[2]);
$item_slot_3 = dechex($item_socket[3]);
$item_slot_4 = dechex($item_socket[4]);
$item_slot_5 = dechex($item_socket[5]);

$item_slot_level_1 = hexdec(substr($item_slot_1,0,1));
$item_slot_level_2 = hexdec(substr($item_slot_2,0,1));
$item_slot_level_3 = hexdec(substr($item_slot_3,0,1));
$item_slot_level_4 = hexdec(substr($item_slot_4,0,1));
$item_slot_level_5 = hexdec(substr($item_slot_5,0,1));

$select_ertelSlot1= mssql_query("Select ertel_id,ertel_cat,ertel_name from MVCore_Wshopp_Ertel where ertel_id = '".substr($item_slot_1,1,1)."' and ertel_cat = '1' and ertel_type = '".$sy."'");
$s_slot_i1= mssql_fetch_row($select_ertelSlot1);
if($item_socket[1] == '255' || $item_socket[1] == '254' || substr($item_slot_1,1,1) == '0') {$sok_info_drop1 ='';} else { $acp_socket5 = $s_slot_i1[2]; $sok_info_drop1 = '<font color=#7fb2ff>'.$s_slot_i1[2].' (Lvl '.$item_slot_level_1.')</font><br>';}; //

$select_ertelSlot2= mssql_query("Select ertel_id,ertel_cat,ertel_name from MVCore_Wshopp_Ertel where ertel_id = '".substr($item_slot_2,1,1)."' and ertel_cat = '2' and ertel_type = '".$sy."'");
$s_slot_i2= mssql_fetch_row($select_ertelSlot2);
if($item_socket[2] == '255' || $item_socket[2] == '254' || substr($item_slot_2,1,1) == '0') {$sok_info_drop2 ='';} else { $acp_socket5 = $s_slot_i2[2]; $sok_info_drop2 = '<font color=#7fb2ff>'.$s_slot_i2[2].' (Lvl '.$item_slot_level_2.')</font><br>';}; //

$select_ertelSlot3= mssql_query("Select ertel_id,ertel_cat,ertel_name from MVCore_Wshopp_Ertel where ertel_id = '".substr($item_slot_3,1,1)."' and ertel_cat = '3' and ertel_type = '".$sy."'");
$s_slot_i3= mssql_fetch_row($select_ertelSlot3);
if($item_socket[3] == '255' || $item_socket[3] == '254' || substr($item_slot_3,1,1) == '0') {$sok_info_drop3 ='';} else { $acp_socket5 = $s_slot_i3[2]; $sok_info_drop3 = '<font color=#7fb2ff>'.$s_slot_i3[2].' (Lvl '.$item_slot_level_3.')</font><br>';}; //

$select_ertelSlot4= mssql_query("Select ertel_id,ertel_cat,ertel_name from MVCore_Wshopp_Ertel where ertel_id = '".substr($item_slot_4,1,1)."' and ertel_cat = '4' and ertel_type = '".$sy."'");
$s_slot_i4= mssql_fetch_row($select_ertelSlot4);
if($item_socket[4] == '255' || $item_socket[4] == '254' || substr($item_slot_4,1,1) == '0') {$sok_info_drop4 ='';} else { $acp_socket5 = $s_slot_i4[2]; $sok_info_drop4 = '<font color=#7fb2ff>'.$s_slot_i4[2].' (Lvl '.$item_slot_level_4.')</font><br>';}; //

$select_ertelSlot5= mssql_query("Select ertel_id,ertel_cat,ertel_name from MVCore_Wshopp_Ertel where ertel_id = '".substr($item_slot_5,1,1)."' and ertel_cat = '5' and ertel_type = '".$sy."'");
$s_slot_i5= mssql_fetch_row($select_ertelSlot5);
if($item_socket[5] == '255' || $item_socket[5] == '254' || substr($item_slot_5,1,1) == '0') {$sok_info_drop5 ='';} else { $acp_socket5 = $s_slot_i5[2]; $sok_info_drop5 = '<font color=#7fb2ff>'.$s_slot_i5[2].' (Lvl '.$item_slot_level_5.')</font><br>';}; //

};
															
// Harmony Information Select
if($itemtype >= '0' && $itemtype <= '4'){
    $item_type_kod = '1';

} elseif($itemtype == '5') {
    $item_type_kod = '2';

} elseif($itemtype >= '6' && $itemtype <= '11'){
    $item_type_kod = '3';

} else {
    $item_type_kod = '1';

}
$select_joh_info= $mvcorex->prepare("Select joh_id,joh_val,joh_name,joh_cost 
from MVCore_Wshopp_Harmony 
where joh_id= :joh_id 
and joh_val= :joh_val 
and joh_type= :joh_type"
);
$stmt = $select_joh_info->execute( array(
    'joh_id' => $item_harmony,
    'joh_val' => $item_harm_val,
    'joh_type' => $item_type_kod
) );
$stmt = $select_joh_info->fetch();
$s_joh_i= $stmt;

if($item_harmony == '0' || $item_harmony == '') {$joh_info_drop =''; $AE_joh_cost = '0'; } else { $AE_joh_cost = $s_joh_i[3]; $acp_harselected = $s_joh_i[2]; $joh_info_drop = '<font color=yellow>'.$s_joh_i[2].'</font><br><br>';};
// End Select

if( $itemtype == 12 && $sy >= 221 && $sy <= 261 ) {
	
	switch($item_harm_val){
		case 1: $joh_info_drop = '<font color=red>Containts Element Of Fire</font><br>'; break;
		case 2: $joh_info_drop = '<font color=blue>Containts Element Of Water</font><br>'; break;
		case 3: $joh_info_drop = '<font color=brown>Containts Element Of Earth</font><br>'; break;
		case 4: $joh_info_drop = '<font color=green>Containts Element Of Wind</font><br>'; break;
		case 5: $joh_info_drop = '<font color=black>Containts Element Of Darkness</font><br>'; break;
		default: $joh_info_drop = ''; break;
	};
	
};

if( $itemtype == 12 && $sy >= 200 && $sy <= 214 ) { //Hide JOH & SK If Pentagram item
	$joh_info_drop = '';
	$sok_info_drop1 ='';
	$sok_info_drop2 ='';
	$sok_info_drop3 ='';
	$sok_info_drop4 ='';
	$sok_info_drop5 ='';
	$socketinfos = '';
	
	switch($item_harm_val){
		case 1: $joh_info_drop = '<div color=red>Containts Element Of Fire</div><br>'; break;
		case 2: $joh_info_drop = '<div color=blue>Containts Element Of Water</div><br>'; break;
		case 3: $joh_info_drop = '<div color=brown>Containts Element Of Earth</div><br>'; break;
		case 4: $joh_info_drop = '<div color=green>Containts Element Of Wind</div><br>'; break;
		case 5: $joh_info_drop = '<div color=black>Containts Element Of Darkness</div><br>'; break;
		default: $joh_info_drop = ''; break;
	};
};

	if ($iop<128) 
		{ $skill	= ''; $AE_skill_cost = '0'; }
	elseif($itemtype == '13' && $sy == '37') { $skill	= 'This pet has a skill<br>'; $acp_skill	= 1; }
	elseif($sy == '4' && $itemtype == '13') {
		$skill	= 'Earth Shake skill<br>'; $acp_skill	= 1; }
	else {
		$skill	= 'This item has a skill<br>';
		$iop	= $iop-128;
		$acp_skill	= 1;
		$AE_skill_cost = '1';
	}
	// Item Level Check
	$itemlevel	= floor($iop/8);
	$acp_itemlevel	= floor($iop/8);
	$AE_level_count = floor($iop/8);
	$itemacplevelsa = $mvcore['it_max_lev'] - $itemlevel;
	
	$iop		= $iop-$itemlevel*8;
	// Luck Check
	if($iop<4){
		$luck	= '';
		$AE_luck_cost = '0';
		}
	else {
		$luck	= "Luck (success rate of jewel of soul +25%)<br>Luck (critical damage rate +5%)<br>";
		$acp_luck	= 1;
		$AE_luck_cost = '1';
	}
	
	if($drop_item_upg[3] == '25'){ $drop_plus_level = ''; $skill = '<font color=green>+ ( </font>This item has a skill <font color=green>)</font><br>'; }; //Upgrade System
	if($drop_item_upg[3] == '24'){ $drop_plus_level = ''; $luck = '<font color=green>+ ( </font>Luck (success rate of jewel of soul +25%)<br>Luck (critical damage rate +5%) <font color=green>)</font><br>'; } //Upgrade System

$itemoptionhide = $iop*4;

if($iop<4){ $iop = $iop+4; $iopas = $iop+4; };

	if($drop_item_upg[3] == '23'){ $drop_plus_level = '<font color=green>+ ( '.$itemacplevelsa.' )</font>'; } else { $drop_plus_level = ''; }; //Upgrade System

if($itemlevel == '0') {$ilevell ='';} else {$ilevell =('+ '.$itemlevel.' ');}; // Removes Item Level + 0

if ($sy == '42' && $itemtype == '14') { $iname='<font color=gold>'.$anc_name.' '.$nameselect[0].'<br><br></font>';}
elseif ($sy == '15' && $itemtype == '12') { $iname='<font color=gold>'.$anc_name.' '.$nameselect[0].'<br><br></font>';}
elseif ($sy == '13' && $itemtype == '14') { $iname='<font color=gold>'.$anc_name.' '.$nameselect[0].'<br><br></font>';}
elseif ($sy == '22' && $itemtype == '14') { $iname='<font color=gold>'.$anc_name.' '.$nameselect[0].'<br><br></font>';}
elseif ($sy == '14' && $itemtype == '14') { $iname='<font color=gold>'.$anc_name.' '.$nameselect[0].'<br><br></font>';}
elseif ($sy == '16' && $itemtype == '14') { $iname='<font color=gold>'.$anc_name.' '.$nameselect[0].'<br><br></font>';}
elseif ($sy == '31' && $itemtype == '14') { $iname='<font color=gold>'.$anc_name.' '.$nameselect[0].'<br><br></font>';}
elseif ($sy == '41' && $itemtype == '14') { $iname='<font color=gold>'.$anc_name.' '.$nameselect[0].'<br><br></font>';}

elseif($ioo == '0') { if($anc_name == ''){ $iname='<font color=silver>'.$anc_name.' '.$nameselect[0].' '.$ilevell.' '.$drop_plus_level.'<br><br></font>'; } 
else {$iname='<div style=background-color:blue;><font color=#19ff7f>'.$anc_name.' '.$nameselect[0].' '.$ilevell.' '.$drop_plus_level.'<br></font></div><br>';} }

elseif ($sy == '37' && $itemtype == '13' && $ioo == '4') { $iname='<font color=silver>'.$nameselect[0].' + '.$fenrirstat.'<br><br></font>';}
elseif ($sy == '37' && $itemtype == '13' && $ioo == '2') { $iname='<font color=silver>'.$nameselect[0].' + '.$fenrirstat.'<br><br></font>';}
elseif ($sy == '37' && $itemtype == '13' && $ioo == '1') { $iname='<font color=silver>'.$nameselect[0].' + '.$fenrirstat.'<br><br></font>';}
elseif ($sy == '37' && $itemtype == '13' && $ioo == '0') { $iname='<font color=silver>'.$nameselect[0].' + '.$fenrirstat.'<br><br></font>';}
else { if($anc_name == ''){$iname='<font color=#19ff7f>Excellent '.$anc_name.' '.$nameselect[0].' '.$ilevell.' '.$drop_plus_level.'<br><br></font>';} else{$iname='<div style=background-color:blue;><font color=#19ff7f>Excellent '.$anc_name.' '.$nameselect[0].' '.$ilevell.' '.$drop_plus_level.'<br></font></div><br>';};}

if ($sy == '42' && $itemtype == '14') { $inames='<font color=gold>'.$anc_name.' '.$nameselect[0].'</font>';}
elseif ($sy == '15' && $itemtype == '12') { $inames='<font color=gold>'.$anc_name.' '.$nameselect[0].'</font>';}
elseif ($sy == '13' && $itemtype == '14') { $inames='<font color=gold>'.$anc_name.' '.$nameselect[0].'</font>';}
elseif ($sy == '22' && $itemtype == '14') { $inames='<font color=gold>'.$anc_name.' '.$nameselect[0].'</font>';}
elseif ($sy == '14' && $itemtype == '14') { $inames='<font color=gold>'.$anc_name.' '.$nameselect[0].'</font>';}
elseif ($sy == '16' && $itemtype == '14') { $inames='<font color=gold>'.$anc_name.' '.$nameselect[0].'</font>';}
elseif ($sy == '31' && $itemtype == '14') { $inames='<font color=gold>'.$anc_name.' '.$nameselect[0].'</font>';}
elseif ($sy == '41' && $itemtype == '14') { $inames='<font color=gold>'.$anc_name.' '.$nameselect[0].'</font>';}

elseif($ioo == '0') { if($anc_name == ''){ $inames='<font color=silver><b>'.$anc_name.' '.$nameselect[0].' '.$ilevell.'</b><br></font>'; } 
else {$inames='<font color=blue>'.$anc_name.' '.$nameselect[0].' '.$ilevell.' '.$drop_plus_level.'<br></font>';}; }

elseif ($sy == '37' && $itemtype == '13' && $ioo == '4') { $inames='<font color=silver><b>'.$nameselect[0].' + '.$fenrirstat.'</b><br></font>';}
elseif ($sy == '37' && $itemtype == '13' && $ioo == '2') { $inames='<font color=silver><b>'.$nameselect[0].' + '.$fenrirstat.'</b><br></font>';}
elseif ($sy == '37' && $itemtype == '13' && $ioo == '1') { $inames='<font color=silver><b>'.$nameselect[0].' + '.$fenrirstat.'</b><br></font>';}
elseif ($sy == '37' && $itemtype == '13' && $ioo == '0') { $inames='<font color=silver><b>'.$nameselect[0].' + '.$fenrirstat.'</b><br></font>';}
else { if($anc_name == ''){ $inames='<font color=#19ff7f>Excellent '.$anc_name.' '.$nameselect[0].' '.$ilevell.'<br></font>'; } 
else{$inames='<font color=blue>Excellent '.$anc_name.' '.$nameselect[0].' '.$ilevell.' '.$drop_plus_level.'<br></font>';} }


//Without <br>
if($ioo == '0') { if($anc_name == ''){ $inamesa='<font color=silver><b>'.$anc_name.' '.$nameselect[0].' '.$ilevell.'</b></font>'; }
else {$inamesa='<font color=#19ff7f><b>'.$anc_name.' '.$nameselect[0].' '.$ilevell.' '.$drop_plus_level.'</b></font>';} }
elseif ($sy == '37' && $itemtype == '13' && $ioo == '4') { $inamesa='<font color=silver><b>'.$nameselect[0].' + '.$fenrirstat.'</b></font>';}
elseif ($sy == '37' && $itemtype == '13' && $ioo == '2') { $inamesa='<font color=silver><b>'.$nameselect[0].' + '.$fenrirstat.'</b></font>';}
elseif ($sy == '37' && $itemtype == '13' && $ioo == '1') { $inamesa='<font color=silver><b>'.$nameselect[0].' + '.$fenrirstat.'</b></font>';}
elseif ($sy == '37' && $itemtype == '13' && $ioo == '0') { $inamesa='<font color=silver><b>'.$nameselect[0].' + '.$fenrirstat.'</b></font>';}
else { if($anc_name == ''){ $inamesa='<font color=#19ff7f>Excellent '.$anc_name.' '.$nameselect[0].' '.$ilevell.'</font>'; }
else {$inamesa='<font color=blue>Excellent '.$anc_name.' '.$nameselect[0].' '.$ilevell.' '.$drop_plus_level.'</font>';} }


//If socket item
if( $itemtype == 12 && $sy >= 200 && $sy <= 261 ) {} else {
if($item_socket[1] == '' && $item_socket[1] != '0' || $item_socket[1] == $sk_type_drop || $item_socket[1] == '-1' && $item_socket[1] != '0'){
} else {
$iname='<font color=#927cc4>'.$anc_name.' '.$nameselect[0].' '.$ilevell.' '.$drop_plus_level.'<br><br></font>';
$inamesa='<font color=#927cc4>'.$anc_name.' '.$nameselect[0].' '.$ilevell.'</font>';
$inames='<font color=#927cc4>'.$anc_name.' '.$nameselect[0].' '.$ilevell.'<br></font>';
} };

$mwr_engine_s_fnc=2;
	if($ioo>=64)	{ $iop+=4; $ioo+=-64; }
	if($ioo<32)	{ $iopx6=0; $acp_exc_opt6 = '0'; } else { $iopx6=1; $ioo+=-32; $acp_exc_opt6 = '1'; }
	if($ioo<16)	{ $iopx5=0; $acp_exc_opt5 = '0'; } else { $iopx5=1; $ioo+=-16; $acp_exc_opt5 = '1'; }
	if($ioo<8)	{ $iopx4=0; $acp_exc_opt4 = '0'; } else { $iopx4=1; $ioo+=-8; $acp_exc_opt4 = '1'; }
	if($ioo<4)	{ $iopx3=0; $acp_exc_opt3 = '0'; } else { $iopx3=1; $ioo+=-4; $acp_exc_opt3 = '1'; }
	if($ioo<2)	{ $iopx2=0; $acp_exc_opt2 = '0'; } else { $iopx2=1; $ioo+=-2; $acp_exc_opt2 = '1'; }
	if($ioo<1)	{ $iopx1=0; $acp_exc_opt1 = '0'; } else { $iopx1=1; $ioo+=-1; $acp_exc_opt1 = '1'; }
	
	$AE_exc_count = $acp_exc_opt1 + $acp_exc_opt2 + $acp_exc_opt3 + $acp_exc_opt4 + $acp_exc_opt5 + $acp_exc_opt6;

if($itemtype >= 0 && $itemtype <= 5 || $itemtype == 13 && $sy >= 12 && $sy <= 13 || $itemtype == 13 && $sy >= 25 && $sy <= 28) { // Weapons, Pendants	
	$itemtypecodefd='1';
} elseif($itemtype >= 6 && $itemtype <= 11) { // Sets & Shields
	$itemtypecodefd='2';
} elseif($itemtype == 13 && $sy == 30 || $itemtype == 12 && $sy >= 0 && $sy <= 6 || $itemtype == 12 && $sy == 49) { // Wings level 1 & 2
	$itemtypecodefd='3';
} elseif($itemtype == 12 && $sy >= 36 && $sy <= 43 || $itemtype == 12 && $sy == 50 || $itemtype == 12 && $sy == 266) { // Wings level 3
	$itemtypecodefd='4';
} elseif($itemtype == 12 && $sy >= 262 && $sy <= 265) { // Wings level 3
	$itemtypecodefd='5';
} elseif($itemtype == 12 && $sy == 267) { // Wings level 3
	$itemtypecodefd='6';
} elseif($itemtype == 13 && $sy >= 8 && $sy <= 9 || $itemtype == 13 && $sy >= 21 && $sy <= 24) { // Rings
	$itemtypecodefd='2';
} else { $itemtypecodefd='9';};

$itemexl = "";
	switch ($itemtypecodefd) {
	case 1 :
		$op1	= 'Increases Mana After monster +Mana/8<br>';
		$op2	= 'Increases Life After monster +Life/8<br>';
		$op3	= 'Increase attacking(wizardly)speed+7<br>';
		$op4	= 'Increase Damage +2%<br>';
		$op5	= 'Increase Damage +level/20<br>';
		$op6	= 'Excellent Damage Rate +10%<br>';
		break;
	case 2:
		$op1	= 'Increase Zen After Hunt +40%<br>';
		$op2	= 'Defence success rate +10%<br>';
		$op3	= 'Reflect damage +5%<br>';
		$op4	= 'Damage decrease +4%<br>';
		$op5	= 'Increase MaxMana +4%<br>';
		$op6	= 'Increase MaxHP +4%<br>';
		break;
	case 3: 
		$op1	= 'HP + 115 increased<br>';
		$op2	= 'Mana + 115 increased<br>';
		$op3	= 'Ignore opponents defensive power by 3%<br>';
		$op4	= 'Max AG + 50 increased<br>';
		$op5	= 'Increase Attacking(Wizardry) speed + 5<br>';
		$op6	= '';
		break;
	case 4:
		$op1	= 'Ignore opponents defensive power by 5%<br>';
		$op2	= 'Enemy attack power it returns with 5% probabilities<br>';
		$op3	= 'With 5% probabilities life complete recovery<br>';
		$op4	= 'It rolls up with but 5% probabilities complete recovery<br>';
		$op5	= '';
		$op6	= '';
		break;
	case 5:
		$op1	= 'With 5% probabilities life complete recovery<br>';
		$op2	= 'Enemy attack power it returns with 5% probabilities<br>';
		$op3	= '';
		$op4	= '';
		$op5	= '';
		$op6	= '';
		break;
	case 6:
		$op1	= 'With 5% probabilities life complete recovery<br>';
		$op2	= 'Enemy attack power it returns with 5% probabilities<br>';
		$op3	= 'Chanse of Double damage +4%<br>';
		$op4	= '';
		$op5	= '';
		$op6	= '';
		break;

	default :

		$op1	= '';
		$op2	= '';
		$op3	= '';
		$op4	= '';
		$op5	= '';
		$op6	= '';
		break;
	}

	if ($iopx1==1) 		$itemexl.='^^'.$op1;
	if ($iopx2==1) 		$itemexl.='^^'.$op2;
	if ($iopx3==1) 		$itemexl.='^^'.$op3;
	if ($iopx4==1) 		$itemexl.='^^'.$op4;
	if ($iopx5==1) 		$itemexl.='^^'.$op5;
	if ($iopx6==1) 		$itemexl.='^^'.$op6;


$db_item_info=''.str_replace('^^','', $itemexl).'';

$iop		= $iop-4;
$acp_iop_ad		= $iop;
// AD New System
//------------------------
$iop21		= $iop-4;

if($iop == '0') { $convert_to = ''; }
elseif($iop == '1') { $convert_to = '4'; }
elseif($iop == '2') { $convert_to = '8'; }
elseif($iop == '3') { $convert_to = '12'; }
elseif($iop == '4') { $convert_to = '16'; }
elseif($iop == '5') { $convert_to = '20'; }
elseif($iop == '6') { $convert_to = '24'; }
elseif($iop == '7') { $convert_to = '28'; }
else { $convert_to = ''; }

if($iopas == '0') { $convert_tos = ''; }
elseif($iop == '1') { $convert_tos = '1'; }
elseif($iop == '2') { $convert_tos = '2'; }
elseif($iop == '3') { $convert_tos = '3'; }
elseif($iop == '4') { $convert_tos = '4'; }
elseif($iop == '5') { $convert_tos = '5'; }
elseif($iop == '6') { $convert_tos = '6'; }
elseif($iop == '7') { $convert_tos = '7'; }
else { $convert_tos = ''; }

$AE_ad_cost = $convert_tos;

//---------------------
if($nameselect[8] >= 0 && $nameselect[8] <= 4) { // Swords, Axe, Spears, Mace, Scepters, Bows, Crossbows
	$drop_ad_opt_name = 'Additional Damage + '.$convert_to.'<br>';
} elseif($nameselect[8] == 13 && $nameselect[9] == 30 || $nameselect[3] == 5 || $nameselect[8] >= 6 && $nameselect[8] <= 11 || $nameselect[8] == 12 && $nameselect[9] >= 0 && $nameselect[9] <= 6) { // Stafs, Shield, Set Items, Wings Level 1 , Wings level 2
	$drop_ad_opt_name = 'Additional Defense + '.$convert_to.'<br>';
} elseif($nameselect[8] == 12 && $nameselect[9] >= 36 && $nameselect[9] <= 43 || $nameselect[8] == 12 && $nameselect[9] >= 49 && $nameselect[9] <= 50 || $nameselect[8] == 12 && $nameselect[9] >= 262 && $nameselect[9] <= 267 || $nameselect[8] == 13 && $nameselect[9] >= 8 && $nameselect[9] <= 9 || $nameselect[8] == 13 && $nameselect[9] >= 12 && $nameselect[9] <= 13 || $nameselect[8] == 13 && $nameselect[9] >= 21 && $nameselect[9] <= 28) { // Rings, Pendant, Wings level 3
	$drop_ad_opt_name = 'Automatic HP Recovery + '.$convert_tos.'%<br>';
} elseif($nameselect[8] == 13 && $nameselect[9] == 24) { // Rings of Magic
	$drop_ad_opt_name = 'Max Mana Increase + '.$convert_tos.'%<br>';
};
$mwr_engine=1;
if($iop > '0') {
	$itemoptionname = $drop_ad_opt_name;
} else { $itemoptionname = ''; }
//------------------------

$classExpl = explode(",",$nameselect[10]);
$expl1 = $classExpl[0];
$expl2 = $classExpl[1];
$expl3 = $classExpl[2];
$expl4 = $classExpl[3];
$expl5 = $classExpl[4];
$expl6 = $classExpl[5];
$expl7 = $classExpl[6];
$expl8 = $classExpl[7];

if($expl1 == '00') { $ClassS1 =''.getClass(substr($expl1, 1)).'<br>'; }
elseif($expl1 == '01') { $ClassS1 = ''.getClass(substr($expl1, 1)).'<br>'; }
elseif($expl1 >= '02') { $ClassS1 = ''.getClass(substr($expl1, 1)).'<br>'; }
else { $ClassS1 = ''; };

if($expl2 == '016') { $ClassS2 = ''.getClass(substr($expl2, 1)).'<br>'; }
elseif($expl2 == '017') { $ClassS2 = ''.getClass(substr($expl2, 1)).'<br>'; }
elseif($expl2 >= '018') { $ClassS2 = ''.getClass(substr($expl2, 1)).'<br>'; } 
else { $ClassS2 = ''; };

if($expl3 == '032') { $ClassS3 = ''.getClass(substr($expl3, 1)).'<br>'; }
elseif($expl3 == '033') { $ClassS3 = ''.getClass(substr($expl3, 1)).'<br>'; }
elseif($expl3 >= '034') { $ClassS3 = ''.getClass(substr($expl3, 1)).'<br>'; } 
else { $ClassS3 = ''; };

if($expl4 == '048') { $ClassS4 = ''.getClass(substr($expl4, 1)).'<br>'; }
elseif($expl4 >= '049') { $ClassS4 = ''.getClass(substr($expl4, 1)).'<br>'; } 
else { $ClassS4 = ''; };

if($expl5 == '065') { $ClassS5 = ''.getClass(substr($expl5, 1)).'<br>'; }
elseif($expl5 >= '066') { $ClassS5 = ''.getClass(substr($expl5, 1)).'<br>'; } 
else { $ClassS5 = ''; };

if($expl6 == '080') { $ClassS6 = ''.getClass(substr($expl6, 1)).'<br>'; }
elseif($expl6 == '081') { $ClassS6 = ''.getClass(substr($expl6, 1)).'<br>'; }
elseif($expl6 >= '082') { $ClassS6 = ''.getClass(substr($expl6, 1)).'<br>'; } 
else { $ClassS6 = ''; };

if($expl7 == '096') { $ClassS7 = ''.getClass(substr($expl7, 1)).'<br>'; }
elseif($expl7 >= '097') { $ClassS7 = ''.getClass(substr($expl7, 1)).'<br>'; } 
else { $ClassS7 = ''; };

if($expl8 == '0112') { $ClassS8 = ''.getClass(substr($expl8, 1)).'<br>'; }
elseif($expl8 >= '0113') { $ClassS8 = ''.getClass(substr($expl8, 1)).'<br>'; } 
else { $ClassS8 = ''; };

if($expl1 == '-1' && $expl2 == '-1' && $expl3 == '-1' && $expl4 == '-1' && $expl5 == '-1' && $expl6 == '-1' && $expl7 == '-1' && $expl8 == '-1' && $mvcore['db_season'] == '10' ) {
	$item_class_need = '';
} elseif($expl1 == '-1' && $expl2 == '-1' && $expl3 == '-1' && $expl4 == '-1' && $expl5 == '-1' && $expl6 == '-1' && $expl7 == '-1') {
	$item_class_need = '';
} else {
	$item_class_need = '<font color=red>'.$ClassS1.''.$ClassS2.''.$ClassS3.''.$ClassS4.''.$ClassS5.''.$ClassS6.''.$ClassS7.''.$ClassS8.'</font><br>';
}

$item_need_dur = 'Durability: ['.$nameselect[1].']<br>';
$item_need_level = 'Minimum level requred: '.$nameselect[2].'<br><br>';

if( $itemtype == 12 && $sy >= 200 && $sy <= 214 || $itemtype == 12 && $sy >= 221 && $sy <= 261 ) {
	$item_class_need = '';
};

if($sy == '42' && $itemtype == '14') { $other_item_infos='<font color=silver>Jewel for item reinforcement</font><br>';}
elseif($sy == '15' && $itemtype == '12') { $other_item_infos='<font color=silver>It is used to combine chaos items</font><br>';}
elseif($sy == '22' && $itemtype == '14') { $other_item_infos='<font color=silver>It is used to create fruits that increase stats</font><br>';}
elseif($sy == '13' && $itemtype == '14') { $other_item_infos='<font color=silver>It is used to increase item level up to + 6</font><br>';}
elseif($sy == '14' && $itemtype == '14') { $other_item_infos='<font color=silver>It is used to increase item level up to + 9</font><br>';}
elseif($sy == '16' && $itemtype == '14') { $other_item_infos='<font color=silver>Increases item option by 1 level</font><br>';}
elseif($sy == '31' && $itemtype == '14') { $other_item_infos='<font color=silver>Create and improve items for siege</font><br>';}
elseif($sy == '41' && $itemtype == '14') { $other_item_infos='<font color=silver>Jewel with impurity</font><br>';}
else {$other_item_infos = '';};

?>