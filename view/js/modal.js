// ### Modal window WebNet ###
 // Get button 
var Modal0 = document.getElementsByClassName('modal')[0];
 // Event modal
Modal0.addEventListener('click', showModal);
function showModal() {
	 // Container
	var modalDiv = document.createElement('div');
	 // Modal
	var	divContent = document.createElement('div');
		divContent.style.cssText = 'background-color: rgb(254, 254, 254); margin: 8px auto; padding: 2em; border: 1px solid rgb(136, 136, 136); width: 80%; height: auto;';
	  // Close button 
	var	closeSpan = document.createElement('span');
		closeSpan.textContent = 'X';
		closeSpan.style.cssText = 'overflow: auto; margin: 0; user-select: none; cursor: default; font-family: sans-serif; color: rgb(136, 136, 136); float: right; font-size: 2em; font-weight: bold;';
	 // Text window
	var	modalP = document.createElement('p');
		modalP.textContent = 'Message out browser';
	 // Append elements
	document.body.appendChild(modalDiv);
	modalDiv.appendChild(divContent);
	divContent.appendChild(closeSpan);
	divContent.appendChild(modalP);

	modalDiv.style.cssText = 'display: block; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; owerflow: auto; background-color: rgba(0, 0, 0, 0.5);';

	 // Close click button
	closeSpan.addEventListener('click', cSpan);
	function cSpan() {document.body.removeChild(modalDiv);
	}
	 // Close click window
	window.onclick = function(event) {
		if(event.target == modalDiv) {
			document.body.removeChild(modalDiv);
		}
	}
}
