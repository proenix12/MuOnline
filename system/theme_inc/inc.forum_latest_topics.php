<?php
	if($mvcore['mysql_server'] == '' || $mvcore['mysql_user'] == '' || $mvcore['mysql_pass'] == '' || $mvcore['mysql_db'] == ''){
		
	} else {
		$g_link = mysql_connect($mvcore['mysql_server'],$mvcore['mysql_user'],$mvcore['mysql_pass']);
		mysql_select_db($mvcore['mysql_db'], $g_link);
	
		$result = mysql_query("select * from topics order by start_date desc LIMIT ".$mvcore['post_topic_top']."");

		if (mysql_num_rows($result) > 0) {
			// output data of each row
			while($row = mysql_fetch_assoc($result)) {
				
				$r_forum = mysql_query("select * from forums where id = '".$row["forum_id"]."'");
				$forum_row = mysql_fetch_assoc($r_forum);

				echo'
					<div class="latest-twitter-tweett">
						<div class="trhowthis">
							<div>
								<a href="'.$mvcore['forurl'].'/index.php?/forum/'.$forum_row["id"].'-'.$forum_row['name_seo'].'/"><b>'.$row["title"].'</b></a><br>
								<font style="float:left;">By '.$row["seo_first_name"].'</font>
								<font style="float:right;">'.date("F j, Y, g:i a",$row["start_date"]).'</font>
							</div>
							<br>
						</div>
					</div>
				';
			};
		};
		mysqli_close($conn);
	};
?>