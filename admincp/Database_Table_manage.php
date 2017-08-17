
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

        <ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Column_manage') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Database_Table_manage-id-Column_manage.html" title=""><span style="height:30px;">Reset / GReset Column Manage</span></a></li>
            <li <?php if($_GET['op3'] == 'Table_credits') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Database_Table_manage-id-Table_credits.html" title=""><span style="height:30px;">Money ( Credits ) Settings</span></a></li>
            <li <?php if($_GET['op3'] == 'Table_wcoins') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Database_Table_manage-id-Table_wcoins.html" title=""><span style="height:30px;">Money ( WCoins ) Settings</span></a></li>
            <li <?php if($_GET['op3'] == 'Skilltree_table') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Database_Table_manage-id-Skilltree_table.html" title=""><span style="height:30px;">SkillTree Table Settings</span></a></li>
            <li <?php if($_GET['op3'] == 'Gens_table') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Database_Table_manage-id-Gens_table.html" title=""><span style="height:30px;">Gens Table Settings</span></a></li>
       </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
			
		<?php if($_GET['op3'] == 'Column_manage') { ?>
		<div class="widget fluid" id="onChsubwqtjwqdmon">
			<div class="whead"><h6>Reset / Grand Reset Column Settings</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Reset Column Name ( Default: Resets ):</label></div>
                        <div class="grid9"><input id="rr_column_name" name="rr_column_name" type="text" value="<?php echo $mvcore['rr_column_name']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Grand Reset Column Name ( Default: Grand_Resets ):</label></div>
                        <div class="grid9"><input id="gr_column_name" name="gr_column_name" type="text" value="<?php echo $mvcore['gr_column_name']; ?>"></div>
                    </div>
		</div>
		<?php } ?>
		<?php if($_GET['op3'] == 'Table_credits') { ?>
		<div class="widget fluid" id="onChsubwqdqwdwqdmon">
			<div class="whead"><h6>Money ( Credits ) Table Settings</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Credits Table Name<?php if($mvcore['medb_supp'] == 'yes') { echo' ( <b>'.$mvcore['medb_name'].'.dbo.Memb_Info</b> )';} ?>:</label></div>
                        <div class="grid9"><input id="credits_table" name="credits_table" type="text" value="<?php echo $mvcore['credits_table']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Username Column Name ( Default: memb___id ):</label></div>
                        <div class="grid9"><input id="user_column" name="user_column" type="text" value="<?php echo $mvcore['user_column']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Credits Column Name:</label></div>
                        <div class="grid9"><input id="credits_column" name="credits_column" type="text" value="<?php echo $mvcore['credits_column']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Credits2 ( Gold Credits ) Column Name:</label></div>
                        <div class="grid9"><input id="credits2_column" name="credits2_column" type="text" value="<?php echo $mvcore['credits2_column']; ?>"></div>
                    </div>
		</div>
		<?php } ?>
		<?php if($_GET['op3'] == 'Table_wcoins') { ?>
		<div class="widget fluid" id="onChsub4h34h34h3">
			<div class="whead"><h6>Money ( WCoins ) Table Settings</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>WCoins Table Name <?php if($mvcore['medb_supp'] == 'yes') { echo'( <b>'.$mvcore['medb_name'].'.dbo.Memb_Info</b> )';} ?>:</label></div>
                        <div class="grid9"><input id="wcoins_table" name="wcoins_table" type="text" value="<?php echo $mvcore['wcoins_table']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>User Column Name:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="guid_column" name="guid_column" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option>
								<option value="name" <?php if($mvcore['guid_column'] == 'name') { echo 'selected'; } else { echo ''; }; ?>>Name ( Contains Character Name )</option>
								<option value="accountid" <?php if($mvcore['guid_column'] == 'accountid') { echo 'selected'; } else { echo ''; }; ?>>AccountID ( Contains Username )</option>
								<option value="memb_guid" <?php if($mvcore['guid_column'] == 'memb_guid') { echo 'selected'; } else { echo ''; }; ?>>memb_guid ( Contains User ID )</option> 
								<option value="memb___id" <?php if($mvcore['guid_column'] == 'memb___id') { echo 'selected'; } else { echo ''; }; ?>>memb___id ( Contains Username )</option>
								<option value="MemberGuid" <?php if($mvcore['guid_column'] == 'MemberGuid') { echo 'selected'; } else { echo ''; }; ?>>MemberGuid ( Contains User ID ( For zTeam S8 ) )</option>								
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>WCoins Column Name:</label></div>
                        <div class="grid9"><input id="wcoins_column" name="wcoins_column" type="text" value="<?php echo $mvcore['wcoins_column']; ?>"></div>
                    </div>
		</div>
		<?php } ?>
		<?php if($_GET['op3'] == 'Skilltree_table') { ?>
		<div id="tableSkillTree">
		<div class="widget fluid">
			<div class="whead"><h6>SkillTree Table Settings</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>SkillTree Table Name:</label></div>
                        <div class="grid9"><input id="skilltree_table" name="skilltree_table" type="text" value="<?php echo $mvcore['skilltree_table']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Username Column:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="skilltree_userntable" name="skilltree_userntable" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option>
								<option value="name" <?php if($mvcore['skilltree_userntable'] == 'name') { echo 'selected'; } else { echo ''; }; ?>>Name ( Contains Character Name )</option>
								<option value="CHAR_NAME" <?php if($mvcore['skilltree_userntable'] == 'CHAR_NAME') { echo 'selected'; } else { echo ''; }; ?>>CHAR_NAME ( Contains Name ( For zTeam S8 ) )</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Level Column Name:</label></div>
                        <div class="grid9"><input id="skilltree_col_level" name="skilltree_col_level" type="text" value="<?php echo $mvcore['skilltree_col_level']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Points Column Name:</label></div>
                        <div class="grid9"><input id="skilltree_col_points" name="skilltree_col_points" type="text" value="<?php echo $mvcore['skilltree_col_points']; ?>"></div>
                    </div>
		</div>
		<div class="widget fluid">
			<div class="whead"><h6>SkillTree Skill Table Settings ( <b> Table Where Master Skills Are Stored ( Default: character table in MagicList column )</b> )</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>SkillTree Skill Table Name:</label></div>
                        <div class="grid9"><input id="skilltree_skill_table" name="skilltree_skill_table" type="text" value="<?php echo $mvcore['skilltree_skill_table']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Username Column:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="skilltree_skill_userntable" name="skilltree_skill_userntable" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option>
								<option value="name" <?php if($mvcore['skilltree_skill_userntable'] == 'name') { echo 'selected'; } else { echo ''; }; ?>>Name ( Contains Character Name )</option>
								<option value="accountid" <?php if($mvcore['skilltree_skill_userntable'] == 'accountid') { echo 'selected'; } else { echo ''; }; ?>>AccountID ( Contains Username )</option>
								<option value="memb_guid" <?php if($mvcore['skilltree_skill_userntable'] == 'memb_guid') { echo 'selected'; } else { echo ''; }; ?>>memb_guid ( Contains User ID )</option> 
								<option value="memb___id" <?php if($mvcore['skilltree_skill_userntable'] == 'memb___id') { echo 'selected'; } else { echo ''; }; ?>>memb___id ( Contains Username )</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Skill Column Name:</label></div>
                        <div class="grid9"><input id="skilltree_skill_column" name="skilltree_skill_column" type="text" value="<?php echo $mvcore['skilltree_skill_column']; ?>"></div>
                    </div>
		</div>
		</div>
		<?php } ?>
		<?php if($_GET['op3'] == 'Gens_table') { ?>
		<div class="widget fluid" id="onChsubwqjjertrn">
			<div class="whead"><h6>Gens Table Settings ( <b>For S6+</b> )</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Gens Table Name:</label></div>
                        <div class="grid9"><input id="gens_tab_name" name="gens_tab_name" type="text" value="<?php echo $mvcore['gens_tab_name']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Contribution ( Points ) Column Name:</label></div>
                        <div class="grid9"><input id="gens_contricol_name" name="gens_contricol_name" type="text" value="<?php echo $mvcore['gens_contricol_name']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Family ( Type ) Column Name:</label></div>
                        <div class="grid9"><input id="gens_famicol_name" name="gens_famicol_name" type="text" value="<?php echo $mvcore['gens_famicol_name']; ?>"></div>
                    </div>
		</div>
		<?php } ?>

<script>
$(document).ready(function() {
	//Credits
	$( "#onChsubwqjjertrn" ).on('change', function() {
		var getAllValues = 
			$("#gens_tab_name").val()+"-ids-"
			+$("#gens_contricol_name").val()+"-ids-"
			+$("#gens_famicol_name").val();
			$.post("acps.php", {
				onChsubwqjjertrn: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	//Credits
	$( "#onChsubwqdqwdwqdmon" ).on('change', function() {
		var getAllValues = 
			$("#credits_table").val()+"-ids-"
			+$("#user_column").val()+"-ids-"
			+$("#credits_column").val()+"-ids-"
			+$("#credits2_column").val();
			$.post("acps.php", {
				onChsubwqdqwdwqdmon: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	//reset column names
	$( "#onChsubwqtjwqdmon" ).on('change', function() {
		var getAllValues = 
			$("#rr_column_name").val()+"-ids-"
			+$("#gr_column_name").val();
			$.post("acps.php", {
				onChsubwqtjwqdmon: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	//WCoins
	$( "#onChsub4h34h34h3" ).on('change', function() {
		var getAllValues = 
			$("#wcoins_table").val()+"-ids-"
			+$("#guid_column option:selected").val()+"-ids-"
			+$("#wcoins_column").val();
			$.post("acps.php", {
				onChsub4h34h34h3: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	//SkillTree
	$( "#tableSkillTree" ).on('change', function() {
		var getAllValues = 
			$("#skilltree_table").val()+"-ids-"
			+$("#skilltree_userntable option:selected").val()+"-ids-"
			+$("#skilltree_column").val()+"-ids-"
			+$("#skilltree_col_level").val()+"-ids-"
			+$("#skilltree_col_points").val()+"-ids-"
			+$("#skilltree_skill_table").val()+"-ids-"
			+$("#skilltree_skill_userntable option:selected").val()+"-ids-"
			+$("#skilltree_skill_column").val();
			
			$.post("acps.php", {
				tableSkillTree: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>
