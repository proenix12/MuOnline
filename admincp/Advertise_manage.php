
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Advertise_manage_p') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Advertise_manage-id-Advertise_manage_p.html" title=""><span style="height:30px;">Google Advertise Manage</span></a></li>
       </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
		
		<?php if($_GET['op3'] == 'Advertise_manage_p') { ?> <!-- Advertise_manage_p -->
		<div class="fluid">
			<div class="widget" id="onChsubEnginesdfsdSociAl">
				<div class="whead"><h6>Google Advertise Script Insert ( <b>IF Theme Supports</b> )</h6></div>
						<div class="formRow">
							<div class="grid3"><label>Leaderboard 728 x 90:</label></div>
							<div class="grid9"><textarea rows="6" cols="" id="ads_spt_728x90" name="ads_spt_728x90" placeholder="Leave empty if you are not using this!"><?php echo $mvcore['ads_spt_728x90']; ?></textarea></div>
						</div>
						<div class="formRow">
							<div class="grid3"><label>Banner 468 x 60:</label></div>
							<div class="grid9"><textarea rows="6" cols="" id="ads_spt_468x60" name="ads_spt_468x60" placeholder="Leave empty if you are not using this!"><?php echo $mvcore['ads_spt_468x60']; ?></textarea></div>
						</div>
						<div class="formRow">
							<div class="grid3"><label>Large Skycraper 300 x 600:</label></div>
							<div class="grid9"><textarea rows="6" cols="" id="ads_spt_300x600" name="ads_spt_300x600" placeholder="Leave empty if you are not using this!"><?php echo $mvcore['ads_spt_300x600']; ?></textarea></div>
						</div>
						<div class="formRow">
							<div class="grid3"><label>Medium Rectangle 300 x 250:</label></div>
							<div class="grid9"><textarea rows="6" cols="" id="ads_spt_300x250" name="ads_spt_300x250" placeholder="Leave empty if you are not using this!"><?php echo $mvcore['ads_spt_300x250']; ?></textarea></div>
						</div>
			</div>
		</div>
		<?php }; ?>
<script>
$(document).ready(function() {

	$("#onChsubEnginesdfsdSociAl").on('change', function() {
		var getAllValues =
		
			$("#ads_spt_728x90").val()+"-ids-"
			+$("#ads_spt_468x60").val()+"-ids-"
			+$("#ads_spt_300x600").val()+"-ids-"
			+$("#ads_spt_300x250").val()
			
		;

			$.post("acps.php", {
				ererttytytred: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>