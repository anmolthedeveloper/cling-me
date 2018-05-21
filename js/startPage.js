window.addEventListener('load', positionWindow, false);
window.addEventListener('resize', positionWindow, false);
function positionWindow(){
    /*
        initialize a variable c that will help to position the window for x number of times
    */
    var ct = 0;
    var t = setInterval(function (){
        if(ct == 3){
            clearInterval(t);
            //stop positioning the window if the timer has looped for three times
        }
        else {
            //increment c and do the positioning
            ct++;

            //[0] means we want to store only the element at the first index after an array has been returned from document.getElementsByClassName('main')
            var c = document.getElementsByClassName('main')[0];

            //get the browser's height
            var wh = window.innerHeight;

            //get the height of the element stored in the variable c
            var ch = c.offsetHeight;

            //divide wh by 2 and ch by 2
            //this will help the browser to know where the element in c has to be positioned
            var tp = wh * .5 - ch * .5;
            c.setAttribute('style','top:'+tp+'px; opacity:1;');

            //mummy is the parent div where the signup form was placed
            var mummy = document.getElementsByClassName('signupForm')[0];

            //children is an array of all the elements with a  class 'formElement'
            var children = mummy.getElementsByClassName('formElement');

            //wd will store the width of mummy. offsetWidth will count the absolute width including the padding and border width
            var wd = mummy.offsetWidth;
            for(var a = 0; a < children.length; a++){
                /*
                    since the parent's overflow is hidden, we want to have only one child at one face.
                    So, we will give each child a width of the parent node so that other children do not appear
                */
                children[a].setAttribute('style','width:'+wd+'px;');
            }
            //mywidth will contain a sum of all the widths of the children.
            var mywidth = wd * children.length;
            var mh = c.offsetHeight;

            //now, make the formContainer as large as mywidth so that our form doesn't look messy.
            document.getElementsByClassName('formContainer')[0].setAttribute('style','width:'+mywidth+'px; transition:0s all;');

            //we are setting this attribute to help us know which face has been focused for this case, we'll use 0
            document.getElementsByClassName('formContainer')[0].setAttribute('data-left',0);
        }

    },1000);
    //event listeners for buttons
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

    //buttons is an array of all the buttons in the signupForm.
    //this next line will help you to get the position of the last button which is the signup button
    var lb = buttons[buttons.length-1];
    //since all the buttons were given an event listener triggering the function 'fetchnextform', we have to remove it and add another function instead
    lb.removeEventListener('click', fetchnextform, false);
    lb.addEventListener('click', signup, false);

    /*
        in the left menu, we only have 2 buttons. tHe login and signup buttons
        we have to add event listeners to those buttons so we can trigger respective function when the buttons have been clicked.
    */
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
    positionWindow();
    document.getElementsByClassName('signupForm')[0].style.display = 'none';
    document.getElementsByClassName('loginForm')[0].style.display = 'block';
}

function showSignupForm(){
    positionWindow();
    document.getElementsByClassName('signupForm')[0].style.display = 'block';
    document.getElementsByClassName('loginForm')[0].style.display = 'none';
}
function fetchnextform(){
    //show the next form
    var mummy = document.getElementsByClassName('signupForm')[0];
    var children = mummy.getElementsByClassName('formContainer');
        //since mummy is the overall container and all the elements inherited their width from her, we need her width in order to slide different sections of the form
    var wd = mummy.offsetWidth;
    //lf = the position from the left of mummy as defined in the positionWindow()
    var lf = parseInt(children[0].getAttribute('data-left'));
    // alert(lf);
    // var ar = lf.split(':')[1];
    // var l  = parseInt(ar.split('p')[0]);
    // alert(ar);
    //add wd to lf to show a new face and store this value in the data-left attribute
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

    //data has been entered in input boxes and we want to retrieve it at once.
    //boxes contains an array of all the input fields and at different indexes, we have one element
    //so we only need to call an array supplied with an index like boxes[0]
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

    //construct a new variable that we'll parse this data to the signup script in the backend
    var data = 'fname='+fname+'&lname='+lname+'&email='+email+'&phone='+phone+'&country='+country+'&pass1='+pass1+'&pass2='+pass2+'&month='+month+'&day='+day+'&year='+year;

    //place a placehoder to make them wait as the PHP script is being executed in the backend
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
            //response contains text from the server
			document.getElementsByClassName('sprogress')[0].innerHTML = response;
            if(response == 'success'){
                document.getElementsByClassName('sprogress')[0].innerHTML = 'Registered successfully, loading...';
                window.location.href = 'index.php';
            }
		}
	}
}
