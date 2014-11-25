<?php
session_start();
?>

	<div class="notice_wizard" id="notice_wizard" style="position: absolute; width: 500px; height: 300px; min-height: 300px; padding: 0px; background: transparent url('https://www.benfund.com/images/elements/backgrounds/wiz_alert_bg.gif') no-repeat center center; z-index: 199;">
		<div style="padding: 15px !important;">
		<p>
		<span class="subtitle">Welcome to BenFund.</span><br>
		<div style="float: right; padding-right: 20px;"><img src="https://www.benfund.com/images/elements/icons/wizard.gif"></div>Thank you for selecting BenFund for your <?php echo _MTYPE ?> solution.<p>
		To better assist you in becoming established I can walk you through setting up your account.<p>
		This process will take approximately 7-10 minutes. If you choose not to do this at this time this wizard is always available in your Preferences.<br>
		<div style="float: left;"><a href="#" onclick="tb_remove() "><img src="https://www.benfund.com/images/elements/later.png" border="0"></a></div>
		<div style="float: right;"<a href="https://www.benfund.com/acct/wizard.php"><img src="https://www.benfund.com/images/elements/begin.png" border="0"></a></div>
	<p><p><br><div style="display: block; float: right; text-align: right; padding-right: 10px;"><input type="checkbox" id="hidewizprompt"><span class="small blue">Dont display this again.</span>
		</div>
		</div>
