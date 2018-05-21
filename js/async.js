function async(filename,result,type,data,preload,index,ptxt){
	if(result != ''){
		if(preload == true){
			if(type == 'id'){
				if(document.getElementById(result)){
					document.getElementById(result).innerHTML = document.getElementById('loader').innerHTML;
				}
			}
			else if(type == 'class'){
				document.getElementsByClassName(result)[index].innerHTML = document.getElementById('loader').innerHTML;
			}
		}
        else if(ptxt != ''){
            if(type == 'id'){
				if(document.getElementById(result)){
					document.getElementById(result).innerHTML = ptxt;
				}
			}
			else if(type == 'class'){
				document.getElementsByClassName(result)[index].innerHTML = ptxt;
			}
        }
	}
	var xhr = new XMLHttpRequest();
	xhr.open('POST',filename,true);
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	//alert(data);
	xhr.send(data);
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4 && xhr.status == 200){
			response = xhr.responseText;
            if(result != ''){
				if(type == 'id'){
					if(document.getElementById(result)){
						document.getElementById(result).innerHTML = response;
					}
				}
				else if(type == 'class'){
					document.getElementsByClassName(result)[index].innerHTML = response;
				}
			}
		}
	}
}
