<?php
session_start();
$page_title = "About Us";
require ( "includes/globals.php" );
require( $ROOT . "/functions/common.php" );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $page_title ?> - BenFund</title>
<?php include ( $ROOT . "includes/head.php" ) ?>
</head>

<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ( $ROOT . "includes/header.php" ) ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ( $ROOT . "includes/left.php" ) ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top">
	<!--PATHWAY START-->
<?php include ( $ROOT . "includes/pathway2.php" ) ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">

<span class="pagetitle">About BenFund</span>
<div class="hr"></div>
<p>The owner of a successful internet company was Watching the late night local news one night. His attention was captured by a story of a young couple whos home had burned down the previous evening.</p>

<p>Although not harmed themselves, this family had lost virtually everything but the clothes on their backs.</p>

<p>Viewers were informed that a bank account had been set up at a local bank on behalf of the family and a plea for donations was given by the news anchorwoman. To help this young couple, you could either mail in a check or visit that particular bank in person.</p>

<p>The owner wanted to give a few dollars to help, but the bank was over 20 miles away and he was more inclined to use a credit card than a check for nearly all his expenditures, so he never took the time to send the $25.00 check in the mail. He thought the idea of setting up an account for this couple was a great idea, but the methods of donating could be improved. This planted a seed in his mind and some time was spent considering various possibilities. "Maybe something on the order of an online donation site for small groups and individuals was possible. There was a need, at least in this case."</p>

<p>A few nights later, on another local news cast there was a story of a young single mother who had developed a condition that required an expensive transplant operation. This woman had no health insurance to cover the needed procedures and there was no help available from public assistance for this type of treatment. Someone had started a bank account on her behalf and as before, one could contribute via mail or by visiting that particular bank.</p>

<p>Again the owner thought, how much more effective an online donation system could be in this situation. He continued to contemplate the various needs of people. The more he thought about how to structure the systems to fit various needs, many more needs for such a site became evident. In addition, the BenFund program could enable groups or an individual gain direct access to the entire world of possible donators. Examples: Grandparents could help send a grandchild to camp by directly sending the $ to the camp through a BenFund account.</p>

<p>Apparently the owner watches too much TV as only a few days later, there was another story that was aired (this one on CNN or Fox) about a High School sports team that lost their uniforms in a flood. They needed about $15,000.00 right away. The owner thought, if BenFund was up and running, they could easily raise the needed $ if the news station was to let the audience know that contibutions could be made IMMEDIATELY at BenFund.com under Account # ******. Payments could be made with any major Credit or Debit Card, online check or PayPal. Also, more individuals would be inclined to donate as the "Need or Cause" is very fresh on their minds, and the method of payment would be more efficient as opposed to driving the next day to a bank to make a contribution or writing out a check and sending it in the mail.</p>

<p>There had to be a way to start "Funds for the Benefit" of causes. Hmmm ... Benefit Fund .... Benfund .... That's it --- BenFund.com !</p>

<p>The domain was purchased in December of 2003, and the research continued. A team of developers was enlisted to research, develop, test, certify, and implement the BenFund.com site. In addition, During this development time, new possiblities kept emerging on a regular basis. It seemed there was a need for such a service in more and more situations.</p>

<p>It took nearly 3 years to implement this initial phase of the BenFund website. Keep watching for more exciting features as we grow the reality of our dream, "BenFund.com."</p>
	</div>
	</div>
	</td>
  </tr>
  <!--MAINBODY END-->
  <!--FOOTER START-->
  <tr>
    <td colspan="2">
<?php include ( $ROOT . "includes/footer.php" ) ?>
	</td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>