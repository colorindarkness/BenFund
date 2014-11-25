<div class="mainmenu">
	<a href="http://www.benfund.com/index.php" class="mainitem">Home</a>
	<p>
	<a href="http://www.benfund.com/about_us.php" class="mainitem">About Us</a>
	<!---<a href="https://www.benfund.com/who/" class="mainitem">Who we help</a>
	<a href="https://www.benfund.com/testimony/" class="mainitem">Testimonies</a>
	<a href="https://www.benfund.com/faq/" class="mainitem">FAQ</a>
	<hr class="mainmenuhr" align="left">
	-->
</div>
<p>
<div class="usermenu">
	<span class="mainitem">Funds</span><p>
	<a href="http://www.benfund.com/search.php" class="mainitem2" >Make a Donation</a><p>
	<a href="http://www.benfund.com/register" class="mainitem2" >Start a BenFund</a><p>
	<?php if ($_SESSION['valid_user']){ ?>
	<a href="https://www.benfund.com/acct/" class="mainitem2">My BenFund</a><p>
	<?php } elseif ($_SESSION['valid_client']){ ?>
	<a href="https://www.benfund.com/client/" class="mainitem2">My BenFund</a><p>
	<?php } else { ?>
	<a href="https://www.benfund.com/login.php" class="mainitem2">My BenFund</a><p>
	<?php } ?>
	<?php if (($_SESSION['valid_user']) || ($_SESSION['valid_client'])){?>
		<a href="http://www.benfund.com/login.php?logout=true" class="mainitem2">Logout</a><p>
	<?php } ?>
	<a href="http://www.benfund.com/help" class="mainitem2" >Help</a>
</div>