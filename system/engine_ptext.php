
				<?php
					if($_GET['op1'] == 'gm_cp' && $_SESSION['gm_panel'] == 'ok'){ 
						$need_to_check = ''.htmlspecialchars(strtoupper(!$_GET['op2'] ? 'Ban_System' : clean_variable($_GET['op2']))).''; 
					}
					elseif($_GET['op1'] == 'admincp' && $_SESSION['admin_panel'] == 'ok'){ 
						$need_to_check = ''.htmlspecialchars(strtoupper(!$_GET['op2'] ? 'Main_Settings' : clean_variable($_GET['op2']))).''; 
					}
					elseif($_GET['op1'] == 'user_cp' && $_SESSION['user_login'] == 'ok'){ 
						$need_to_check = ''.htmlspecialchars(strtoupper(!$_GET['op2'] ? 'Reset_Character' : clean_variable($_GET['op2']))).''; 
					}
					else { 
						$need_to_check = ''.htmlspecialchars(strtoupper(!$_GET['op1'] ? 'News' : clean_variable($_GET['op1']))).''; 
					};
					
						$this_to_space = array("_");
						$output_of_pname = str_replace($this_to_space, " ", $need_to_check);
						
					echo''.$output_of_pname.'';
				?>