window.onload = function() {

// MOO.FX OPACITY 
	viewOpacity = new fx.Opacity('viewclient', {duration: 800, onComplete: function()
 		  { editOpacity.setOpacity(0); }
  	});
		
	editOpacity = new fx.Opacity('editclient', {duration: 800, onComplete: function()
 		  { viewOpacity.setOpacity(0); }
 	});
		
		viewOpacity.setOpacity(1);
		editOpacity.setOpacity(0);
		
}

// HIDE/DISPLAY FUNCTIONS 
// (to combat moo.fx's weak "hide" function that doesn't truly hide elements...now links aren't clickable 
//	on elements that aren't shown)
function displayView() { document.getElementById('viewclient').style.display = ''; }
function displayEdit() { document.getElementById('editclient').style.display = ''; }
			
function hideAll() {
		document.getElementById('viewclient').style.display = 'none';
		document.getElementById('editclient').style.display = 'none';
		}