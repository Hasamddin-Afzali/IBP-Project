var userName = document.getElementById('#username').values;
var password = document.getElementById('#password').values;

if(password != NULL){
    if(password<8){
        alert("The password must be at least 8 character");
    }
}

var userNameCheck = function(){
    if(document.login.username.value == ""){
        alert("The Input is empty");
    }else{
        return false;
    }
}