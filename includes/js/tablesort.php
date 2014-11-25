<link rel="stylesheet" href="https://www.benfund.com/includes/css/table.css" type="text/css" media="print, projection, screen" />
<script type="text/javascript" src="https://www.benfund.com/includes/js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="https://www.benfund.com/includes/js/jquery.tablesorter.pager.js"></script>
<script type="text/javascript">	
	$(<?php echo '"#'.$sortit.'"';?>) 
    .livequery(function(){
    	$(this)
			.tablesorter({widgets: ['zebra'], widthFixed: true})
			.tablesorterPager({container: $(this+"pager")});
	});
</script>
	
<script type="text/javascript">	
$(<?php echo '"div#'.$sortit.'pager"';?>).livequery(function(){
    	$(this).replaceWith("<div id='<?php echo $sortit.'pager';?>' class='pager'><form><table width='575' border='0' align='center'><tr><td align='right'><img src='https://www.benfund.com/images/elements/table/first.png' class='first'/><img src='https://www.benfund.com/images/elements/table/prev.png' class='prev'/><input type='text' class='pagedisplay'/><img src='https://www.benfund.com/images/elements/table/next.png' class='next'/><img src='https://www.benfund.com/images/elements/table/last.png' class='last'/><td align='right'><span class='bold'>Records per page:<br /><select class='pagesize'><option selected='selected' value='05'>05</option><option value='10'>10</option><option value='20'>20</option><option value='30'>30</option><option  value='40'>40</option></select></td></tr></table></form></div>");
    });	
</script>
	
<?php
	function tablesortpager() {
?>
<div id="pager" class="pager">
	<form>
		<table width="575" border="0" align="center">
			<tr>
				<td align="right">
					<img src="https://www.benfund.com/images/elements/table/first.png" class="first"/>
					<img src="https://www.benfund.com/images/elements/table/prev.png" class="prev"/>
					<input type="text" class="pagedisplay"/>
					<img src="https://www.benfund.com/images/elements/table/next.png" class="next"/>
					<img src="https://www.benfund.com/images/elements/table/last.png" class="last"/>
				<td align="right">
					<span class="bold">Records per page:<br />     
					<select class="pagesize">
						<option selected="selected" value="05">05</option>
						<option value="10">10</option>
						<option value="20">20</option>
						<option value="30">30</option>
						<option  value="40">40</option>
					</select>
			</td>
		</tr>
	</table>
	</form>
</div>
<?php		
	}
	?>