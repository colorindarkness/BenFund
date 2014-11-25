<div class="mainmenu">                                                         
<a href="http://www.benfund.com/mindex.php?mid=<?php echo $mid ?>&pid=1" class="mainitem">Home</a><p>
<a href="http://www.benfund.com/mindex.php?mid=<?php echo $mid ?>&pid=2" class="mainitem">About Us</a><p>
<a href="https://www.benfund.com/mindex.php?mid=<?php echo $mid ?>&pid=3" class="mainitem"><?php echo _PAY_NOW; ?></a><p>
</div>                                                                           
<p>              
<div class="usermenu">
	<span class="mainitem">Funds</span><p>
	<a href="http://www.benfund.com/search.php" class="mainitem2" >Make a Donation</a><p>
	<a href="http://www.benfund.com/register" class="mainitem2" >Start a BenFund</a><p>
	<?php if ($_SESSION['valid_user']){?>
	<a href="https://www.benfund.com/acct/" class="mainitem2">My BenFund</a><p>
	<?php } elseif ($_SESSION['valid_client']){?>
	<a href="https://www.benfund.com/client/" class="mainitem2">My BenFund</a><p>
	<?php } else {?>
	<a href="https://www.benfund.com/login.php" class="mainitem2">My BenFund</a><p>
	<?php } ?>
	<?php if (($_SESSION['valid_user']) || ($_SESSION['valid_client'])){?>
		<a href="https://www.benfund.com/login.php?logout=true" class="mainitem2">Logout</a><p>
	<?php } ?>
	<a href="http://www.benfund.com/help" class="mainitem2" >Help</a>
</div>                                                                
<!--<div class="minfo">                                                           
<?php echo $info ?>                                            
</div>                                                                               
		</div>             
-->                                                              