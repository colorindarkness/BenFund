<script type="text/javascript" language="javascript">
$().ready(function() {  
  $('#spperctaxq').click( function(){ $('#spflattax').fadeOut(); $('#spperctaxid').fadeIn(); } );
  $('#spflattaxq').click( function(){ $('#spperctax').fadeOut(); $('#spflattaxid').fadeIn(); } );
  
  $('#sptaxcancel').click( function(){ $("#spperctaxi").val(""); $("#spflattax").val(""); } );
  
  $('#spperctaxi').keyup( function(){ $('#sptaxsubmit').fadeIn(); } );
  $('#spflattaxi').keyup( function(){ $('#sptaxsubmit').fadeIn(); } );
  
});
</script>
<script type="text/javascript" language="javascript">
function Monetize(mnt){
    mnt -= 0;
    mnt = (Math.round(mnt*100))/100;
    return (mnt == Math.floor(mnt)) ? mnt + '.00' 
              : ( (mnt*10 == Math.floor(mnt*10)) ? 
                       mnt + '0' : mnt);
  }
</script> 
<center>
	<span class="medium bold">What kind of tax rate would you like to apply to this item?</span>
	<p>
	<p>
	<div id="spperctax">
		<a href="#" id="spperctaxq" class="medium bold">Specify a Percentile Tax rate to this item.</a>
		<div id="spperctaxid" style="display: none;">
			<br>
			&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<input type="text" size="6" value="" id="spperctaxi" class="nice" onblur="this.value=Monetize(this.value)"/><span class="large bold">&nbsp;%</span>
		</div>
	</div>
	<p>
		<div id="spflattax">
			<a href="#" id="spflattaxq" class="medium bold">Specify a Flat Tax Rate to this item</a>
				<div id="spflattaxid" style="display: none;">
					<br>
					<span class="large bold">$&nbsp;</span><input type="text" size="6" value="" id="spflattaxi" class="nice" onblur="this.value=Monetize(this.value)"/>&nbsp; &nbsp; &nbsp;&nbsp;
				</div>
		</div>
	<p>
	<p>
	<input type="image" src="https://www.benfund.com/images/elements/buttons/sm/cancel.gif"  id="sptaxcancel" class="jqmClose">
	<input type="image" src="https://www.benfund.com/images/elements/buttons/sm/proceed.gif" id="sptaxsubmit" class="jqmClose" style="display: none;"/>
	<input type="hidden" id="var2" value="">
</center>