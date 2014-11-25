<center>
<span class="large bold">How would you like to apply tax to this item?</span>
<p>
<a href="#" id="speftax" alt="https://www.benfund.com/acct/invoice_manager/prompt2.php" class="medium bold">Apply a Specific Tax rate to this item.</a>
<p>
<a href="#" id="deftax" class="medium bold">Apply your default tax rate of 7.25% to this item</a>
<p>
<p>
<input type="hidden" id="var1" value="">
<div class="output"></div>
<p>
<img src="https://www.benfund.com/images/elements/buttons/sm/cancel.gif" class="jqmClose">
</center>
<script type="text/javascript">
$().ready(function() {

	var t1 = $('#prompt2 div.jqmdMSG');
	
	 // nested dialog
	 $('#prompt2').jqm({
	 	trigger: '#speftax',
	 	ajax: '@alt',
	 	target: t1,
	 	modal: false,
	 	overlay: 60,
	 	onLoad: function(l) {
			$('#var2').val($('#var1').val());
		},
		onHide: function(l) {
			if($('#spperctaxi').val()){
				$('#taxsp' + $('#var1').val()).fadeIn();
				$('#taxsp' + $('#var2').val()).val($('#spperctaxi').val());
			}
			if($('#spflattaxi').val()){
				$('#taxsp' + $('#var1').val()).fadeIn();
				$('#taxsp' + $('#var2').val()).val($('#spflattaxi').val());
			}
			l.w.fadeOut('2000',function(){ l.o.remove(); });
			$('#prompt1').jqmHide();
		}
	 	});
	
});
</script>
<script type="text/javascript">
$().ready(function() {
    var output = $('#prompt1 div.output');
    
    $('#deftax').click(function() {
    		$('#taxsp' + $('#var1').val()).fadeIn();
    		$('#taxsp' + $('#var1').val()).val('7.25');
        output.html("Your default tax rate was applied to this item.").fadeTo(1,1).fadeTo(4000,0);       
        $('#prompt1').fadeOut(888, function(){$('#prompt1').jqmHide()});
        return false;
    });
    
    
   $('#speftax').click(function() {
        $('#prompt2').jqmShow();
   });
    
});
</script>