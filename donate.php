<?php require ("includes/globals.php");
session_start();
require ($ROOT."functions/logout.php");
$page_title = "Donate";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."includes/head.php") ?>
</head>

<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
  <!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
      <?php include ($ROOT."includes/header.php") ?>
    </td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
      <?php include ($ROOT."includes/left.php") ?>
    </td>
    <!--LEFT COLUMN END-->
    <td valign="top">
      <!--PATHWAY START-->
      <?php include ($ROOT."includes/pathway.php") ?>
      <!--PATHWAY END-->
      <!--MAINBODY START-->
      <div class="content_outer">
        <div class="content_inner"> <span class="pagetitle">Donate to a Fund</span>
		<div class="hr"></div>
		<table width="100%">
		<tr><td valign="top">
            <span class="subtitle">Benfund Number</span>
			<div class="hrinline"></div>
			If you already know the Benfund Number you wish to donate to simply type it below to proceed.
            </p>
          <form>
              <input name="id" type="text" id="id" size="5" maxlength="6" class="big" />
            <br />
              <input name="Submit" type="submit" value="Submit" />
          </form>
          <p>
		  <span class="subtitle">Search by Name</span>
		  <div class="hrinline"></div>
			Do you know what BenFund you wish to Donate to but do not have their BenFund Number? No Problem! Simply type their organization name below to find it.
          <form>
              <input name="id2" type="text" id="id" size="45" maxlength="40" class="big" />
            <br />
              <input name="Submit" type="submit" value="Submit" />
          </form>
		  <p>
		  <span class="subtitle">Browse Funds</span>
		  <div class="hrinline"></div>
            <a href="browse.php?order=1">Most Popular</a><br />
            <a href="browse.php?order=2">Most Ambitious</a><br />
            <a href="browse.php?order=3">Alphabetically by Organization Name.</a><br />
            <a href="browse.php?order=4">By Region</a><br />
            </td>
			<td with="175" valign="top"><img src="https://www.benfund.com/images/splashright.jpg"></td>
			</tr>
			</table>
        </div>
      </div>
    </td>
  </tr>
  <!--MAINBODY END-->
  <!--FOOTER START-->
  <tr>
    <td colspan="2">
      <?php include ($ROOT."includes/footer.php") ?>
    </td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>