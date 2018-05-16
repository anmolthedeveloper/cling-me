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
    alert();
}
