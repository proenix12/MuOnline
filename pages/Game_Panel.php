
<?php if($_SESSION['user_login'] == 'ok') { ?>
<div align="center">
	<?php 
	
		$gp_name  = "Reset_Character,Grand_Reset,Add_Stats,Buy_Level_Up_Points,Change_Class,Clear_PK_Status,Rename_Character,Reset_SkillTree,Reset_Stats,Sell_Free_Stats,Master_Grand_Reset,Buy_Level,Warp_Character,Inventory_Clear";
		$pieces = explode(",", $gp_name);
	
	if($mvcore['Waiting_Room'] == 'off' && $mvcore['Character_Market'] == 'off') {} else {
		echo '<div align="center">';
			if($mvcore['Waiting_Room'] == 'on') { echo '<button onclick=location.href="-id-Waiting_Room.html" class="mvcore-gp-style2" style="cursor:pointer;width:100%;" name="hideinfos" type="submit"><b>'.main_p_GamePanel_CharWaitRoom.'</b></button>'; }
			if($mvcore['Character_Market'] == 'on') { echo '<button onclick=location.href="-id-Character_Market.html" class="mvcore-gp-style2" style="cursor:pointer;width:100%;" name="hideinfos" type="submit">'.main_p_GamePanel_CharSellBuy.'</button>'; }
		echo '</div>';
	}
	
	echo '<div class="mvcore-gp-container" align="center">';
	
		foreach($pieces as $piece) {
			$piece = trim($piece);
				
				$sdpiece = str_replace("_"," ",$piece);
				
			if( $piece == 'Reset_Character' ) {
				if( $mvcore['Reset_Character'] == "on" ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_resetchar.'</button></div>';
				} else { };
			};
			
			if( $piece == 'Grand_Reset' ) {
				if( $mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on' ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_grandreset.'</button></div>';
				} else { };
			};
			
			if( $piece == 'Add_Stats' ) {
				if( $mvcore['Add_Stats'] == "on" ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_addstats.'</button></div>';
				} else { };
			};
			
			if( $piece == 'Buy_Level_Up_Points' ) {
				if( $mvcore['Buy_Level_Up_Points'] == "on" ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_buylup.'</button></div>';
				} else { };
			};
			
			if( $piece == 'Change_Class' ) {
				if( $mvcore['Change_Class'] == "on" ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_changeclass.'</button></div>';
				} else { };
			};
			
			if( $piece == 'Clear_PK_Status' ) {
				if( $mvcore['Clear_PK_Status'] == "on" ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_clearpk.'</button></div>';
				} else { };
			};
			
			if( $piece == 'Rename_Character' ) {
				if( $mvcore['Rename_Character'] == "on" ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_renamechar.'</button></div>';
				} else { };
			};
			
			if( $piece == 'Reset_SkillTree' ) {
				if( $mvcore['Reset_SkillTree'] == "on" ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_resetskilltree.'</button></div>';
				} else { };
			};
			
			if( $piece == 'Reset_Stats' ) {
				if( $mvcore['Reset_Stats'] == "on" ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_resetstats.'</button></div>';
				} else { };
			};
			
			if( $piece == 'Sell_Free_Stats' ) {
				if( $mvcore['Sell_Free_Stats'] == "on" ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_sellfreesetat.'</button></div>';
				} else { };
			};
			
			if( $piece == 'Master_Grand_Reset' ) {
				if( $mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on' && $mvcore['Master_Grand_Reset'] == 'on' ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_mastegr.'</button></div>';
				} else { };
			};
			
			if( $piece == 'Inventory_Clear' ) {
				if( $mvcore['Inventory_Clear'] == 'on' ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_invclear.'</button></div>';
				} else { };
			};
			
			if( $piece == 'Buy_Level' ) {
				if( $mvcore['Buy_Level'] == "on" ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_levelbuy.'</button></div>';
				} else { };
			};
			
			if( $piece == 'Warp_Character' ) {
				if( $mvcore['Warp_Character'] == "on" ) { echo '<div class="mvcore-gp-item"><button onclick=location.href="-id-user_cp-id-'.$piece.'.html" class="mvcore-gp-style" style="cursor:pointer" name="hideinfos" type="submit">'.theme_link_warpcharr.'</button></div>';
				} else { };
			};

		}
		
	echo '</div>';
	
	?>
</div>
<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>