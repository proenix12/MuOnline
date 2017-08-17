<?php
	if(isset($_POST['optPiezime'])){
		$new_db = fopen("system/engine_configs/txt_note.php", "w");
		$data = "<?php\n";
		$data .="\$mvcore['notes'] = \"".$_POST['optPiezime']."\";\n";
		$data .="?>";
		fwrite($new_db,$data); fclose($new_db);
		exit;
	}
?>