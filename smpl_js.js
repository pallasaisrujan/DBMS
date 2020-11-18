function redirect()
{
    verifyNull();
    verifyEmail();
}
function verifyNull(){
    if(!document.getElementById('email').value.length){
        alert('Please enter email');
    }
    else if(!document.getElementById('password').value.length){
        alert('Please enter password');
    }
    else {
        return true;
    }
}
function verifyEmail(){
    var x = document.getElementById('email').value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
    else {
        return true;
    }
}