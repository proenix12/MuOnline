<?php
	if($mvcore['mysql_server'] == '' || $mvcore['mysql_user'] == '' || $mvcore['mysql_pass'] == '' || $mvcore['mysql_db'] == ''){
		
	} else {
		$g_link = mysql_connect($mvcore['mysql_server'],$mvcore['mysql_user'],$mvcore['mysql_pass']);
		mysql_select_db($mvcore['mysql_db'], $g_link);
	
		$result = mysql_query("select * from posts order by post_date desc LIMIT ".$mvcore['post_topic_top']."");

		if (mysql_num_rows($result) > 0) {
			// output data of each row
			while($row = mysql_fetch_assoc($result)) {
				
				$row["post"] = trim($row["post"]);
				if(strlen($row["post"]) < '40') { $post_string = str_replace(PHP_EOL, '', $row["post"]); } else { $post_string = substr($row["post"], 0, 40); };
					$post_string = preg_replace('/<[^>]*>/', '',$post_string);
				
				$r_topic = mysql_query("select * from topics where tid = '".$row["topic_id"]."'");
				$topic_row = mysql_fetch_assoc($r_topic);
				
				echo'
					<div class="latest-twitter-tweett">
						<div>
							<a href="'.$mvcore['forurl'].'/index.php?/topic/'.$row["topic_id"].'-'.$topic_row['title_seo'].'/?p='.$row["pid"].'"><b>'.$post_string.'...</b></a><br>
							<font style="float:left;">By '.$row["author_name"].'</font>
							<font style="float:right;">'.date("F j, Y, g:i a",$row["post_date"]).'</font>
						</div>
						<br>
					</div>
				';
			};
		};
		mysqli_close($conn);
	};
?>