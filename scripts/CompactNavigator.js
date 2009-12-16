function addCNLoadEvent(func) {
	var oldonload = window.onload; 

	if (typeof window.onload != 'function')
		window.onload = func; 
	else { 
		window.onload = function() { 
			if (oldonload)
				oldonload();

			func(); 
		}
	} 
}

function CNShowHide(cnNavigator) {
	var cnNavigator	= document.getElementById('CN_CompactNavigator');

	if(cnNavigator.style.display == 'none')
		cnNavigator.style.display = 'block';
	else
		cnNavigator.style.display = 'none';
}

addCNLoadEvent(function() { 
	var cnShowHide	= document.getElementById('CN_ShowHide');
	var cnNavigator	= document.getElementById('CN_CompactNavigator');
	
	cnNavigator.style.display = 'none';
	
	cnShowHide.onclick = CNShowHide;
});