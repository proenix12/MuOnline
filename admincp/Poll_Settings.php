
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

        <ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Poll_Vote_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Poll_Settings-id-Poll_Vote_Settings.html" title=""><span style="height:30px;">Poll Vote Settings</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
		
		<?php if($_GET['op3'] == 'Poll_Vote_Settings') { ?>
		<div class="formRow" style="margin-right:30px;">
			<a href="#" onclick="saqwythrkrwechakr(); return false;" class="buttonM bGreen" style="height:20px;padding-top:15px;text-align:center;font-size:12px;width:100%;float:left;color:#ffffff;">Click To Reset ( Clean ) Poll Votes & Data</a>
			<?php if($mvcore['poll_answer_1'] != '') { ?>
				<div align="left" style="margin-top:60px;">
					<?php if($mvcore['poll_answer_1'] != '') { ?><b><?php echo $mvcore['poll_answer_1'];?></b>: <?php echo $mvcore['poll_db_vote1_points'];?>&nbsp;&nbsp;&nbsp;<?php } ?>
					<?php if($mvcore['poll_answer_2'] != '') { ?><b><?php echo $mvcore['poll_answer_2'];?></b>: <?php echo $mvcore['poll_db_vote2_points'];?>&nbsp;&nbsp;&nbsp;<?php } ?>
					<?php if($mvcore['poll_answer_3'] != '') { ?><b><?php echo $mvcore['poll_answer_3'];?></b>: <?php echo $mvcore['poll_db_vote3_points'];?>&nbsp;&nbsp;&nbsp;<?php } ?>
					<?php if($mvcore['poll_answer_4'] != '') { ?><b><?php echo $mvcore['poll_answer_4'];?></b>: <?php echo $mvcore['poll_db_vote4_points'];?>&nbsp;&nbsp;&nbsp;<?php } ?>
				</div>
			<?php } ?>
		</div>
		<div class="widget fluid" id="onChsubPoll">
			<div class="whead"><h6>Poll Vote Settings ( <b>POLL Is Limited To 1 Poll & Max 4 Vote Options</b> )</h6></div>
                    <div class="formRow">
                        <div class="grid3"><label>Poll Voting ( <b>On / Off</b> ):</label></div>
                        <div class="grid9">
							<select style="width:100%;" id="poll_onoff" name="poll_onoff" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="on" <?php if( $mvcore['poll_onoff'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option>
								<option value="off" <?php if( $mvcore['poll_onoff'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option>
							</select>
						</div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Poll Voting IP Check ( <b>Enable To Prevent Multi Voting</b> ):</label></div>
                        <div class="grid9">
							<select style="width:100%;" id="poll_ip_check" name="poll_ip_check" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="yes" <?php if( $mvcore['poll_ip_check'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option>
								<option value="no" <?php if( $mvcore['poll_ip_check'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option>
							</select>
						</div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Show Poll ( <b>Use "Once Per User" To Prevent Annoying PopUp</b> ):</label></div>
                        <div class="grid9">
							<select style="width:100%;" id="poll_cookie_show" name="poll_cookie_show" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="1" <?php if( $mvcore['poll_cookie_show'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Once Per User</option>
								<option value="2" <?php if( $mvcore['poll_cookie_show'] == '2') { echo 'selected'; } else { echo ''; }; ?>>Show Always ( When Reload Page )</option>
							</select>
						</div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Poll Visit:</label></div>
                        <div class="grid9">
							<select style="width:100%;" id="poll_cookie_visit" name="poll_cookie_visit" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="1" <?php if( $mvcore['poll_cookie_visit'] == '1') { echo 'selected'; } else { echo ''; }; ?>>When Enter Website</option>
								<option value="2" <?php if( $mvcore['poll_cookie_visit'] == '2') { echo 'selected'; } else { echo ''; }; ?>>When User Login</option>
							</select>
						</div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Poll Load Delay ( <b>Default: 2000</b> ):</label></div>
                        <div class="grid9"><input id="poll_cookie_depay" name="poll_cookie_depay" type="text" value="<?php echo $mvcore['poll_cookie_depay']; ?>"></div>
                    </div>
				<div class="formRow"><div class="grid12"></div></div>
					<div class="formRow">
                        <div class="grid3"><label>Poll Question ( <b>Max 30 Letters</b> ):</label></div>
                        <div class="grid9"><input id="poll_question" name="poll_question" type="text" maxlength="30" value="<?php echo $mvcore['poll_question']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Poll Answer 1 ( <b>Leave Empty To Disable</b> ) ( <b>Max 35 Letters</b> ):</label></div>
                        <div class="grid9"><input id="poll_answer_1" name="poll_answer_1" type="text" maxlength="35" value="<?php echo $mvcore['poll_answer_1']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Poll Answer 2 ( <b>Leave Empty To Disable</b> ) ( <b>Max 35 Letters</b> ):</label></div>
                        <div class="grid9"><input id="poll_answer_2" name="poll_answer_2" type="text" maxlength="35" value="<?php echo $mvcore['poll_answer_2']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Poll Answer 3 ( <b>Leave Empty To Disable</b> ) ( <b>Max 35 Letters</b> ):</label></div>
                        <div class="grid9"><input id="poll_answer_3" name="poll_answer_3" type="text" maxlength="35" value="<?php echo $mvcore['poll_answer_3']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Poll Answer 4 ( <b>Leave Empty To Disable</b> ) ( <b>Max 35 Letters</b> ):</label></div>
                        <div class="grid9"><input id="poll_answer_4" name="poll_answer_4" type="text" maxlength="35" value="<?php echo $mvcore['poll_answer_4']; ?>"></div>
                    </div>
		</div>
		<?php } ?>
<script>
	function saqwythrkrwechakr() {
		var getAllValues = '1532';
			$.post("acps.php", {
				poll_clean_h53g435j5h: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});	
	};

$(document).ready(function() {

	$( "#onChsubPoll" ).on('change', function() {
		var getAllValues =
		
		$("#poll_onoff option:selected").val()+"-ids-"
		+$("#poll_cookie_show option:selected").val()+"-ids-"
		+$("#poll_cookie_visit option:selected").val()+"-ids-"
		+$("#poll_cookie_depay").val()+"-ids-"
		
		+$("#poll_question").val()+"-ids-"
		+$("#poll_answer_1").val()+"-ids-"
		+$("#poll_answer_2").val()+"-ids-"
		+$("#poll_answer_3").val()+"-ids-"
		+$("#poll_answer_4").val()+"-ids-"
		
		+$("#poll_ip_check option:selected").val()
		
		;
		
			$.post("acps.php", {
				poll_sett_53gr3b5h: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>
