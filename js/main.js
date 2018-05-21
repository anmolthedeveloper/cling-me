window.addEventListener('load', handleEvents, false);
function handleEvents(){
    /*
        overlay is the element at the bottom of our web page that will help us to hide any drop down menus.
        This element is positioned fixed, left:0px; and top:0px.
        If you want to see the use of this element, goto main.css, search for '.overlay' and change the background of this element to rgba(0,0,0,0.5)
        You should see a transparent element which when clicked, the drop down menu hides
    */
    var overlay = document.getElementsByClassName('overlay')[0];
    overlay.addEventListener('click', hideMenus, false);
    var others = document.getElementsByClassName('navigationButton')[4];
    others.addEventListener('click', showMenu, false);

    var a = document.getElementsByClassName('piUpd')[0];
    a.addEventListener('change', loopImages, false);

    //the signup button
    var butt = document.getElementsByClassName('theSubmitButton')[0];
    butt.addEventListener('click', newPost, false);
}
function showMenu(){
    var overlay = document.getElementsByClassName('overlay')[0];
    var ww  = window.innerWidth;
    var wh = window.innerHeight;
    overlay.setAttribute('style','width:'+ww+'px; height:'+wh+'px; display:block;');
    var others = document.getElementsByClassName('navigationButton')[4].getElementsByClassName('navigationOptions')[0];
    others.style.display = 'block';
}
function hideMenus(){
    var overlay = document.getElementsByClassName('overlay')[0];
    overlay.setAttribute('style','width:0px; height:0px; display:none;');
    var others = document.getElementsByClassName('navigationButton')[4].getElementsByClassName('navigationOptions')[0];
    others.style.display = 'none';
}
function loopImages(){
    var mummy = document.getElementsByClassName('updims')[0];
    for(var i = 0; i < this.files.length; i++){
        var firstBorn = mummy.firstChild;
        var div = document.createElement('div');
        var prg = document.createElement('div');
        prg.className = 'uiprogress';
        div.className = 'ip';
        div.appendChild(prg);
        mummy.insertBefore(div,firstBorn);
        var n = new uploadPhoto(div,this.files[i]);
    }
}
function uploadPhoto(element,file){
    var bar = element.getElementsByClassName('uiprogress')[0];
	var fd = new FormData();
	fd.append("picture", file);
	var au;
	if(window.XMLHttpRequest) au = new XMLHttpRequest();
	else if(window.ActiveXObject) au = new ActiveXObject("Microsoft.XMLHTTP");

	au.open('POST', 'php/uploadPhoto.php', true);
	au.upload.onprogress = function(e) {
		if (e.lengthComputable) {
			var percentComplete  = (e.loaded / e.total) * element.offsetWidth;
            bar.setAttribute('style','width:'+percentComplete+'px;');
		}
	};
	au.onreadystatechange = function(){
		if(au.status == 200 && au.readyState == 4){
            element.innerHTML = '';
			var resp = au.response;
            var img = document.createElement('img');
            img.src = 'photos/mini-thumbs/'+resp;
			element.appendChild(img);

            var is = document.getElementById('images');
            var vs = is.value + ',' + resp;

            is.value = vs;
		}
	}
	au.send(fd);
}
function newPost(){
    var mummy = document.getElementsByClassName('pscn')[0];
    var c1    = document.getElementsByClassName('mypost')[1];
    var div = document.createElement('div');
    div.className = 'mypost';

    mummy.insertBefore(div,c1);

    //Time for ajax
    var txt = document.getElementsByClassName('mytextarea')[0];
    var ims = document.getElementById('images');
    var data = 'text='+txt.innerHTML+'&images='+ims.value;
    async('php/createPost.php','mypost','class',data,true,1,'');
}
