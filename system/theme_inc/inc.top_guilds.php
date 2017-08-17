
<table width="100%" cellpadding="2" cellspacing="2">
	<tbody>
		<tr>
			<td><b>#</b></td>
			<td><b><?php echo''.theme_inc_name.'';?></b></td>
			<td><b><?php echo''.theme_inc_gmaster_name.'';?></b></td>
			<td><b><?php echo''.theme_inc_g_score.'';?></b></td>
		</tr>
		<?PHP

		$guild_query = $mvcorex->prepare("SELECT top 10 G_Name from Guild order by G_Score desc");
		$guild_query->execute();
		$results = $guild_query->fetchAll(PDO::FETCH_BOTH);

		for( $i=0; $i < count($results); ++$i ) {
		$row = $results;


		$sql_char = $mvcorex->prepare("Select G_Score,G_Master,G_Mark from Guild where G_Name=:g_name");
		$sql_char->execute(array(
		        'g_name' => $row[$i][0]
        ));
		$show = $sql_char->fetchAll(PDO::FETCH_BOTH);


		$sql_ce =$mvcorex->prepare("SELECT count(*) FROM guildmember WHERE G_Name = :g_name");
		$sql_ce->execute(array(
                'g_name' => $row[$i][0]
        ));
		$sql_ce->fetchAll();
            $mcount = count($sql_ce);
		if($show[$i][0] == '') { $DropgScore = '0'; } else { $DropgScore = $show[$i][0]; };

		$rank = $i+1;

		$tr_color_2 = "even2"; 
		$tr_color_1 = "even";
		$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;
		$guild_name = $row[$i][0];
		$guild_master = $show[0][1];
		echo "

			<tr style='border-collapse: collapse; border-spacing: 0px;'>
				<td>$rank</td>
				<td><a href='-id-Guild_View-id-$guild_name.html'>$guild_name</a></td>
				<td><a href='-id-Character_View-id-$guild_master.html'>$guild_master</a></td>
				<td>$DropgScore</td>
			</tr>
			
		";
		}
		?>
</table>