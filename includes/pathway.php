<?php
include_once($ROOT."functions/class.breadcrumb.inc.php");
?>
<div class="topmenu_outer">
	<div class="topmenu_inner">
		<span class="pathway">
			<?php
			$_SERVER['PATH_TRANSLATED'];
			$_SERVER['PHP_SELF'];
			$breadcrumb = new breadcrumb;
			$switches;
			$breadcrumb->changeName=array('acct'=>'My BenFund',
																		'register'=>'Start a BenFund');
			echo $breadcrumb->show_breadcrumb();
			?>
		</span>
		<a onclick="$.FontSizer.DecreaseSize();"><img src="https://www.benfund.com/images/decrease.gif" alt="decrease font size" width="20" height="20" border="0"/></a>
		<a onclick="$.FontSizer.IncreaseSize();"><img src="https://www.benfund.com/images/increase.gif" alt="increase font size" width="20" height="20" border="0"/></a>
	</div>
</div>