<?php
session_start();
require ("includes/globals.php");
require ($ROOT."/functions/common.php");
$page_title = "Reset Password";
$mid = $_POST['mid'];
$cid = $_POST['cid'];
$m_type = $_POST['m_type'];
$question = $_POST['question'];
$answer = $_POST['answer'];
$challenged = $_POST['challenged'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php") ?>
<script type='text/javascript'>
window.onload = function()
{
  var mooTogs    = document.getElementsByClassName('stretchtoggle');
  var mooStretch = document.getElementsByClassName('stretcher');

  // must be before mooAccordion
  mooTogs.each(function(tog, i) {
    tog.onclick = function() {
      if (tog.className == 'stretch_active') {
        mooAccordion.clearAndToggle(mooStretch[i], i);
        tog.className = 'stretchtoggle';

        // automatically show the next stretcher (unless we're the last one)
        if (i+1 != mooTogs.length) {
          mooTogs[i+1].className='stretch_active';
          mooAccordion.clearAndToggle(mooStretch[i+1], i+1);
        }

        return;
      }

      // reset then all then set clicked
      mooTogs.each(function(rtog, ri) {mooTogs[ri].className = 'stretchtoggle';});
      tog.className='stretch_active';
    };
  });

  // could not get onComplete:function(el){} to achieve this effect
  var mooAccordion = new fx.Accordion(mooTogs, mooStretch, {opacity:true, width:false, height:true});

  // stretcher to open initially
  mooAccordion.showThisHideOpen(mooStretch[0]);
  mooTogs[0].className='stretch_active'
enableTooltips()
}

</script>
</head>
<body>
	<div class="container" id="container">
		<table cellspacing="0" cellpadding="0" align="center">
			<!--HEADER START-->
  		<tr>
    		<td colspan="2" valign="top">
					<?php include ($ROOT."/includes/header.php"); ?>
				</td>
  		</tr>
  		<!--HEADER END-->
  		<!--LEFT COLUMN START-->
  		<tr>
    		<td class="leftcolumn" width="150px" valign="top">
					<?php include ($ROOT."/includes/left.php") ?>
    		</td>
				<!--LEFT COLUMN END-->
    		<td valign="top">
				<!--PATHWAY START-->
				<?php include ($ROOT."/includes/pathway.php"); ?>
				<!--PATHWAY END-->
				<!--MAINBODY START-->
					<div class="content_outer">
						<div class="content_inner">	
<?php
echo '$confirm_num_rows:'.$confirm_num_rows.'<br>$acct_verified:'.$acct_verified;
echo '<br>$truth_num_rows:'.$truth_num_rows.'<br>';
print_r($segment);
echo '<br>$answer:'.$answer.'<br>';
?>
<?php
include($ROOT."/includes/reset_password/confirm.php");
include($ROOT."/includes/reset_password/truth.php");
if($acct_verified == 1){
	//Check Answer
	if($correct_answer == 1){
		//Set Randpass
		include($ROOT."/includes/reset_password/reset.php");
	}else{
		//Challenge
		include($ROOT."/includes/reset_password/challenge.php");
	}
}else{
	//Verify Account
	include($ROOT."/includes/reset_password/verify.php");
}
?>			
						</div>
					</div>
				</td>
  		</tr>
  	<!--MAINBODY END-->
  	<!--FOOTER START-->
  	<tr>
    	<td colspan="2">
				<?php include ($ROOT."/includes/footer.php") ?>
			</td>
  	</tr>
  	<!--FOOTER END-->
	</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>