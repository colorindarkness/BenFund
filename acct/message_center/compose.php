<?php
require ("../functions/editor.php");
$cid = $_GET['cid'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php simple_editor(); ?>
<script type="text/javascript">womOn();</script>

<body onload=liveSearchInit()>
<form name="searchform" id="searchform" onsubmit="return liveSearchSubmit()" action="https://www.benfund.com/acct/message_center.php?cmd=send" method="post">
<span class="subtitle">Compose Message</span>
<div class="hr"></div>
<table width="100%">
<tr><td width="270"><span class="subtitle">To:</span></td><td rowspan="4"><div id="LSResult" style="display: block;"><div id="LSShadow"></div></div</td></tr>
<tr><td width="270"><input type="text" class="big" size="30" id="livesearch" name="q" onkeypress="liveSearchStart()" onchange="liveSearchStart()" value="<?php echo $cid ?>"></td></tr>
<tr><td width="270"><span class="subtitle">Subject:</span></td></tr>
<tr><td width="270"><input type="text" class="big" size="30" id="send_subject" name="send_subject"></td></tr>
<tr><td colspan="2">
<textarea id="send_content" name="send_content" rows="15" cols="70" style="width: 100%">
<?php echo $content ?>
</textarea>
</td></tr>
</table>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="javascript:document.compose_new.submit();"><img src="https://www.benfund.com/images/elements/icons/mail-reply.png" border="0"/><br />Send</form></a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/message_center.php"><img src="https://www.benfund.com/images/elements/icons/delete_page.gif" border="0"/><br />Cancel</a></td>
</tr></table>
</td></tr></table>
