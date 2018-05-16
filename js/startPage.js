window.addEventListener('load', positionWindow, false);
window.addEventListener('resize', positionWindow, false);
function positionWindow(){
    var ct = 0;
    var t = setInterval(function (){
        if(ct == 3){
            clearInterval(t);
        }
        else {
            ct++;
            var c = document.getElementsByClassName('main')[0];
            var wh = window.innerHeight;
            var ch = c.offsetHeight;
            var tp = wh * .5 - ch * .5;
            c.setAttribute('style','top:'+tp+'px; opacity:1;');

            var mummy = document.getElementsByClassName('signupForm')[0];
            var children = mummy.getElementsByClassName('formElement');
            var wd = mummy.offsetWidth;
            for(var a = 0; a < children.length; a++){
                children[a].setAttribute('style','width:'+wd+'px;');
            }
            var mywidth = wd * children.length;
            var mh = c.offsetHeight;
            document.getElementsByClassName('formContainer')[0].setAttribute('style','width:'+mywidth+'px;');
            document.getElementsByClassName('formContainer')[0].setAttribute('data-left',0);
            //add addEventListeners to back/next buttons
        }

    },700);
    adEventListeners();
}
function adEventListeners(){
    var ps = document.getElementsByClassName('formElement');
    for(var v = 0; v < ps.length; v++){
        var backButton = ps[v].getElementsByTagName('button')[0];
        var nextButton = ps[v].getElementsByTagName('button')[1];
        backButton.addEventListener('click', fetchpreviousform, false);
        nextButton.addEventListener('click', fetchnextform, false);
    }
    //the signup button
    var buttons = document.getElementsByClassName('signupForm')[0].getElementsByTagName('button');
    var lb = buttons[buttons.length-1];
    lb.removeEventListener('click', fetchnextform, false);
    lb.addEventListener('click', signup, false);

    var cb = document.getElementsByClassName('leftMenu')[0].getElementsByTagName('button');
    var loginButton = cb[0];
    var signupButton = cb[1];
    loginButton.addEventListener('click', showLoginForm, false);
    signupButton.addEventListener('click', showSignupForm, false);

    document.getElementsByClassName('loginForm')[0].getElementsByTagName('button')[1].addEventListener('click', login, false);

}
function login(){
    var boxes = document.getElementsByClassName('loginForm')[0].getElementsByTagName('input');
    var email = boxes[0].value;
    var pass = boxes[1].value;
    var data = 'email='+email+'&password='+pass;
    document.getElementsByClassName('lprogress')[0].innerHTML = 'Please wait...';
    var xhr = new XMLHttpRequest();
	xhr.open('POST','php/login.php',true);
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	xhr.send(data);
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4 && xhr.status == 200){
			response = xhr.responseText;
            //replace the placeholder with the text from the PHP script
			document.getElementsByClassName('lprogress')[0].innerHTML = response;
            if(response == 'success'){
                document.getElementsByClassName('lprogress')[0].innerHTML = 'Registered successfully, loading...';
                window.location.href = 'index.php';
            }
		}
	}
    positionWindow();
}
function showLoginForm(){
    document.getElementsByClassName('signupForm')[0].style.display = 'none';
    document.getElementsByClassName('loginForm')[0].style.display = 'block';
}

function showSignupForm(){
    document.getElementsByClassName('signupForm')[0].style.display = 'block';
    document.getElementsByClassName('loginForm')[0].style.display = 'none';
}
function fetchnextform(){
    //show the next form
    var mummy = document.getElementsByClassName('signupForm')[0];
    var children = mummy.getElementsByClassName('formContainer');
    var wd = mummy.offsetWidth;
    var lf = parseInt(children[0].getAttribute('data-left'));
    // alert(lf);
    // var ar = lf.split(':')[1];
    // var l  = parseInt(ar.split('p')[0]);
    // alert(ar);
    var sb = lf + wd;
    var ow = document.getElementsByClassName('formElement').length * wd;
    children[0].setAttribute('data-left',sb);
    children[0].setAttribute('style',' width:'+ow+'px; margin-left:-'+sb+'px;');
    // alert(wd);
}
function fetchpreviousform(){
    //show the next form
    var mummy = document.getElementsByClassName('signupForm')[0];
    var children = mummy.getElementsByClassName('formContainer');
    var wd = mummy.offsetWidth;
    var lf = parseInt(children[0].getAttribute('data-left'));
    // alert(lf);
    // var ar = lf.split(':')[1];
    // var l  = parseInt(ar.split('p')[0]);
    // alert(ar);
    var sb = lf - wd;
    var ow = document.getElementsByClassName('formElement').length * wd;
    children[0].setAttribute('data-left',sb);
    children[0].setAttribute('style',' width:'+ow+'px; margin-left:-'+sb+'px;');
    // alert(wd);
}
function signup(){
    //creating a new user
    //lets fetch the data from the form using DOM
    var boxes = document.getElementsByClassName('signupForm')[0].getElementsByTagName('input');
    var select = document.getElementsByClassName('signupForm')[0].getElementsByTagName('select');
    var fname = boxes[0].value;
    var lname = boxes[1].value;
    var email = boxes[2].value;
    var phone = boxes[3].value;
    var country = boxes[4].value;
    var pass1 = boxes[5].value;
    var pass2 = boxes[6].value;
    var month = select[0].value;
    var day = select[1].value;
    var year = select[2].value;

    //construct a new variable that we'll parse to the signup script in the backend
    var data = 'fname='+fname+'&lname='+lname+'&email='+email+'&phone='+phone+'&country='+country+'&pass1='+pass1+'&pass2='+pass2+'&month='+month+'&day='+day+'&year='+year;

    //place a placehoder to make them wait
    document.getElementsByClassName('sprogress')[0].innerHTML = 'Please wait...';

    var xhr = new XMLHttpRequest();

    /* php/signup.php is the script we want to execute at the back */
	xhr.open('POST','php/signup.php',true);
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	//alert(data);
	xhr.send(data);
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4 && xhr.status == 200){
			response = xhr.responseText;
            //replace the placeholder with the text from the PHP script
			document.getElementsByClassName('sprogress')[0].innerHTML = response;
            if(response == 'success'){
                document.getElementsByClassName('sprogress')[0].innerHTML = 'Registered successfully, loading...';
                window.location.href = 'index.php';
            }
		}
	}
}
