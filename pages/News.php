
<?php if(!$mvcore['News'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['News'] == 'on') { ?>
<?php
$oldPath = getcwd();
$dir = "system/engine_ndb".$db_name_multi_news."";
chdir($dir);
array_multisort(array_map('basename', ($files = glob("*.*"))), SORT_DESC, $files);
$i = 1;
$pagecount = count($files);
	foreach($files as $filename){
		if($filename == '.' || $filename == '..' || $filename == 'index.php') {} else {							
			$readfiledata = file_get_contents(''.$filename.'');
			$NEWS_DATA = explode("-ids-", $readfiledata);
			$stipName = str_replace(".txt","",$filename);
				
				$pages_nr = $mvcore['news_ppage'] * $_POST['pageNr'];
				if($_POST['pageNr'] == '') { $pages_nr = '1'; };
			
			if($i == $mvcore['news_ppage'] + $pages_nr) { break; } else {};
			if($i >= $pages_nr) {
				
			if($NEWS_DATA[0] != '') { $newsOutTitle[$i] = '<div class="mvcore-titles">'.$NEWS_DATA[0].'</div>'; };
			
				echo'
					<div class="mvcore-box-style1" style="margin-bottom:25px;" width="100%">
						'.$newsOutTitle[$i].'
							<div class="mvcore-div-entry" width="100%">
								<div width="100%">
									'.html_entity_decode($NEWS_DATA[1]).'
								</div>
							</div>
							<img src="system/engine_images/news_sep.png" width="100%" height="1px">
							<div class="mvcore-meta-bga">
								<div>
									<p>'.date("F j, Y, g:i a",$stipName).'</p>
								</div>
							</div>
					</div>
				';
			} else {}
		}	
	++$i;
	}
chdir($oldPath);
?>
<center>
	<form action="" method="POST">
		<?php if($pagecount >= $mvcore['news_ppage'] && $pagecount != $mvcore['news_ppage']) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="Main Page"><?php } ?>
		<?php if($pagecount >= $mvcore['news_ppage'] * 1 && $pagecount != $mvcore['news_ppage']) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="1"><?php } ?>
		<?php if($pagecount >= $mvcore['news_ppage'] * 2) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="2"><?php } ?>
		<?php if($pagecount >= $mvcore['news_ppage'] * 3) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="3"><?php } ?>
		<?php if($pagecount >= $mvcore['news_ppage'] * 4) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="4"><?php } ?>
		<?php if($pagecount >= $mvcore['news_ppage'] * 5) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="5"><?php } ?>
		<?php if($pagecount >= $mvcore['news_ppage'] * 6) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="6"><?php } ?>
		<?php if($pagecount >= $mvcore['news_ppage'] * 7) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="7"><?php } ?>
		<?php if($pagecount >= $mvcore['news_ppage'] * 8) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="8"><?php } ?>
		<?php if($pagecount >= $mvcore['news_ppage'] * 9) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="9"><?php } ?>
		<?php if($pagecount >= $mvcore['news_ppage'] * 10) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="10"><?php } ?>
		<?php if($pagecount >= $mvcore['news_ppage'] * 11) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="11"><?php } ?>
		<?php if($pagecount >= $mvcore['news_ppage'] * 12) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="12"><?php } ?>
		<?php if($pagecount >= $mvcore['news_ppage'] * 13) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="13"><?php } ?>
	</form>
</center>
<?php } ?>