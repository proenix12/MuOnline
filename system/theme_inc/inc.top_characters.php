<?php
$encodedString = ""; //This is the string that will hold all your location data
$x = 0; //This is a trigger to keep the string tidy

if ( $x == 0 )
{
    $separator = "";
}
else
{
    //Each row in the database is separated in the string by four *'s
    $separator = "****";
}
?>
<table width="100%" cellpadding="2" cellspacing="2">
	<tr>
		<td><b>#</b></td>
		<td><b><?php echo''.theme_inc_name.'';?></b></td>
		<?php if($mvcore['Reset_Character'] == 'on') { echo'<td><b>'.theme_inc_resets.'</b></td>'; }; ?>
		<?php if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on') { echo'<td><b>'.theme_inc_gresets.'</b></td>'; }; ?>
		<?php if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on' && $mvcore['Master_Grand_Reset'] == 'on') { echo'<td><b>'.theme_inc_mastergresets.'</b></td>'; }; ?>
	</tr>
	<?PHP
		$guild_query = $mvcorex->prepare("SELECT top 10 name from character where CtlCode <= '7' order by m_Grand_Resets desc, "
            .$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." Desc, clevel desc");
		$guild_query->execute();
		$results = $guild_query->fetchAll(PDO::FETCH_BOTH);


		for($i=0;$i < count($results); ++$i) {
			$row = $results;

			
			$sql_char = $mvcorex->prepare("Select clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",m_Grand_Resets,class,MapNumber from character where name=:name ");
            $sql_char->execute(array(
                    'name' => $row[$i][0]
            ));
			$show = $sql_char->fetchAll(PDO::FETCH_BOTH);

			
			$rank = $i+1;
			if($mvcore['Reset_Character'] == 'on') {
			    $rr_text = '<td>'.$show[0][1].'</td>';

			} else {
			    $rr_text = '';

			};
			if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on') {
			    $gr_text = '<td>'.$show[0][2] .'</td>';

			} else {
			    $gr_text = '';

			};
			if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on' && $mvcore['Master_Grand_Reset'] == 'on') {
			    $mgr_text = '<td>'.$show[0][3].'</td>';

			} else {
			    $mgr_text = '';

			};
			$tr_color_2 = "even2"; 
			$tr_color_1 = "even";
			$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;
            $charName = $row[$i][0];
				echo"
					<tr style='border-collapse: collapse; border-spacing: 0px;'>
						<td>$rank</td>
						<td><a href='-id-character_view-id-$charName.html'>$charName</a></td>
						$rr_text
						$gr_text
						$mgr_text
					</tr>
				";
		}
	?>
</table>
<div id=\"map_canvas\"></div>