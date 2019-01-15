/*var servResponse = document.querySelector('#response');

document.forms.menuForm.onsubmit = function(e) {
    e.preventDefault();

    //var readF = document.forms.menuF.menu.value;
    //readF = encodeURIComponent(readF);



    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'crud.php');
    //xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    var formData = new FormData(document.forms.menuF);

    xhr.onreadystatechange = function() {
        if(xhr.redyState === 4 && xhr.status === 200) {
            servResponse.textContent = xhr.responseText;
        }
    }

    xhr.send(formData);
}
*/