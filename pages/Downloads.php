
<?php if(!$mvcore['Downloads'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Downloads'] == 'on') { ?>
<script type="text/javascript">
    function onClicks() {
			$.post("shop.php", {
					plusone: "1",
			},
			function(data) {
				$('#clickedTimes').html("<b>"+parseInt(data)+"</b>");
			});
    };
</script>
<table border="0" align="right" cellspacing="0" cellpadding="0" width="100%">
<tr><td></td></tr>
	<!-- SPACE -->
	<?php
	$dwn_select1 = $mvcorex->prepare("SELECT link,name,file_name,category,add_date from MVCore_DWN where category = '1' order by add_date desc");
	$stmt = $dwn_select1->execute();
	$stmt = $dwn_select1->fetchAll(PDO::FETCH_BOTH);
	$dwn_drop1 = $stmt;

	print_r($dwn_drop1);

	if($dwn_drop1[0] != '') { $link1 = 'HAS';
	echo'
		<tr>
			<td colspan="2" style="text-align:left;padding-left:10px;padding-top:10px;padding-bottom:10px;"><font color="brown" size="3"><b>'.main_p_downloads_fullclient.'</b></font></td>
		</tr>
	';
	};

	$dwn_select = $mvcorex->prepare("SELECT top 10 link,name,file_name,category,add_date from MVCore_DWN where category = '1' order by add_date desc");
	$stmt = $dwn_select->execute();
	$stmt = $dwn_select->fetchAll(PDO::FETCH_BOTH);

	for( $i=0; $i < count($stmt);++$i) {
	$dwn_drop = $stmt;

	//No Sound Client
	$code_show = date('m/d/Y', $dwn_drop[4]);
	echo'<tr><td align="left" style="padding-top: 10px; padding-bottom: 10px; padding-left: 20px;" valign="top"><span><b>'.$dwn_drop[1].'</b></span><br><span>(<i>'.$dwn_drop[2].'</i>) '.main_p_downloads_extrwinrarsimil.'</span></td><td width="150px" align="center"><a onClick="onClicks();" href="'.$dwn_drop[0].'" target="_blank"><img src="system/engine_images/download-btn.png" width="150px" border="0" title="Download"></a></td></tr>';	

	};

	$dwn_select1 = $mvcorex->prepare("SELECT link,name,file_name,category,add_date from MVCore_DWN where category = '1' order by add_date desc");
	$stmt = $dwn_select1->execute();
	$stmt = $dwn_select1->fetchAll();

	$dwn_drop1 = count($stmt);
	if($dwn_drop1[0] != '') {
	    echo  '	';
	};
	?>
	
	<!-- SPACE -->
	
	<?php 

	$dwn_select2 = $mvcorex->prepare("SELECT link,name,file_name,category,add_date from MVCore_DWN where category = '2' order by add_date desc");
    $stmt = $dwn_select2->execute();
    $stmt = $dwn_select2->fetchAll();
	$dwn_drop2 = count($stmt);

	if($dwn_drop2[0] != '') { $link2 = 'HAS';
	    echo'
            <tr>
                <td colspan="2" style="text-align:left;padding-left:10px;padding-top:10px;padding-bottom:10px;"><font color="brown" size="3"><b>'.main_p_downloads_nosoundclic.'</b></font></td>
            </tr>
	        ';
	};

	$dwn_select = $mvcorex->prepare("SELECT top 10 link,name,file_name,category,add_date from MVCore_DWN where category = '2' order by add_date desc");
    $stmt = $dwn_select->execute();
    $stmt = $dwn_select->fetchAll(PDO::FETCH_BOTH);

	for($i=0;$i < count($stmt);++$i) {
	$dwn_drop = $stmt;

	//No Sound Client
	$code_show = date('m/d/Y', $dwn_drop[4]);
	echo'<tr><td align="left" style="padding-top: 10px; padding-bottom: 10px; padding-left: 20px;" valign="top"><span><b>'.$dwn_drop[1].'</b></span><br><span>(<i>'.$dwn_drop[2].'</i>) '.main_p_downloads_extrwinrarsimil.'</span></td><td width="150px" align="center"><a onClick="onClicks();" href="'.$dwn_drop[0].'" target="_blank"><img src="system/engine_images/download-btn.png" width="150px" border="0" title="Download"></a></td></tr>';	

	};

	$dwn_select2 = $mvcorex->prepare("SELECT link,name,file_name,category,add_date from MVCore_DWN where category = '2' order by add_date desc");
    $stmt = $dwn_select2->execute();
    $stmt = $dwn_select2->fetchAll(PDO::FETCH_BOTH);
	$dwn_drop2 = $stmt;
	if($dwn_drop2[0] != '') {
	    echo ' ';
	};
	?>
	
	<!-- SPACE -->
	
	<?php 

	$dwn_select3 = $mvcorex->prepare("SELECT link,name,file_name,category,add_date from MVCore_DWN where category = '3' order by add_date desc");
    $stmt = $dwn_select3->execute();
    $stmt = $dwn_select3->fetchAll(PDO::FETCH_BOTH);
	$dwn_drop3 = $stmt;

	if($dwn_drop3[0] != '') { $link3 = 'HAS';
	echo'
		<tr>
			<td colspan="2" style="text-align:left;padding-left:10px;padding-top:10px;padding-bottom:10px;"><font color="brown" size="3"><b>'.main_p_downloads_patchs.'</b></font></td>
		</tr>
	';
	};

	$dwn_select = $mvcorex->prepare("SELECT top 10 link,name,file_name,category,add_date from MVCore_DWN where category = '3' order by add_date desc");
    $stmt = $dwn_select->execute();
    $stmt = $dwn_select->fetchAll(PDO::FETCH_BOTH);

	for( $i=0; $i < count($stmt); ++$i ) {
	    $dwn_drop = $stmt;

	//No Sound Client
	$code_show = date('m/d/Y', $dwn_drop[4]);
	echo'<tr><td align="left" style="padding-top: 10px; padding-bottom: 10px; padding-left: 20px;" valign="top"><span><b>'.$dwn_drop[1].'</b></span><br><span>(<i>'.$dwn_drop[2].'</i>) '.main_p_downloads_extrwinrarsimil.'</span></td><td width="150px" align="center"><a onClick="onClicks();" href="'.$dwn_drop[0].'" target="_blank"><img src="system/engine_images/download-btn.png" width="150px" border="0" title="Download"></a></td></tr>';	

	};

	$dwn_select3 = $mvcorex->prepare("SELECT link,name,file_name,category,add_date from MVCore_DWN where category = '3' order by add_date desc");
    $stmt = $dwn_select3->execute();
    $stmt = $dwn_select3->fetchAll(PDO::FETCH_BOTH);
    $dwn_select3 = $stmt;

	if($dwn_drop3[0] != '') {
	    echo ' ';
	};
	?>
	
	<!-- SPACE -->
	
	<?php 

	$dwn_select4 = $mvcorex->prepare("SELECT link,name,file_name,category,add_date from MVCore_DWN where category = '4' order by add_date desc");
    $stmt = $dwn_select4->execute();
    $stmt = $dwn_select4->fetchAll(PDO::FETCH_BOTH);
    $dwn_select4 = $stmt;

	if($dwn_drop4[0] != '') { $link4 = 'HAS';
	echo'
		<tr>
			<td colspan="2" style="text-align:left;padding-left:10px;padding-top:10px;padding-bottom:10px;"><font color="brown" size="3"><b>'.main_p_downloads_untilities.'</b></font></td>
		</tr>
	';
	};

	$dwn_select = $mvcorex->prepare("SELECT top 10 link,name,file_name,category,add_date from MVCore_DWN where category = '4' order by add_date desc");
    $stmt = $dwn_select->execute();
    $stmt = $dwn_select->fetchAll(PDO::FETCH_BOTH);

	for($i=0;$i < count($stmt);++$i) {
	    $dwn_drop = $stmt;

	//No Sound Client
	$code_show = date('m/d/Y', $dwn_drop[4]);
	echo'<tr><td align="left" style="padding-top: 10px; padding-bottom: 10px; padding-left: 20px;" valign="top"><span><b>'.$dwn_drop[1].'</b></span><br><span>(<i>'.$dwn_drop[2].'</i>) '.main_p_downloads_extrwinrarsimil.'</span></td><td width="150px" align="center"><a onClick="onClicks();" href="'.$dwn_drop[0].'" target="_blank"><img src="system/engine_images/download-btn.png" width="150px" border="0" title="Download"></a></td></tr>';	

	};

	$dwn_select4 = $mvcorex->prepare("SELECT link,name,file_name,category,add_date from MVCore_DWN where category = '4' order by add_date desc");
    $stmt = $dwn_select4->execute();
    $stmt = $dwn_select4->fetchAll(PDO::FETCH_BOTH);
    $dwn_select4 = $stmt;

	if($dwn_drop4[0] != '') {
	echo'
		<tr>
			<td colspan="2" style="height: 2px;"></td>
		</tr>
	';
	};
	?>
</table>
	<?php 
		if($link1 == '' && $link2 == '' && $link3 == '' && $link4 == '') {
			echo'<div class="mvcore-nNote mvcore-nInformation">'.main_p_downloads_nodowns.'</div>';
		}
	?>
<?php } ?>