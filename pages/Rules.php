
<?php if(!$mvcore['reg_rules'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['reg_rules'] == 'on') { ?>
<?php
	echo''.$mvcore['reg_rule_file'].'';
?>
<?php } ?>