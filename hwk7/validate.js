function validate(){
    var usr = document.textForm.userName.value;
    var pass = document.textForm.password.value;
    var repeatPass = document.textForm.repeatPassword.value;
    var reUser = /^[a-zA-Z][a-zA-Z0-9]{5,9}$/;
    var rePass =/(?=.*[A-Z])(?=.*\d)(?!.*[^a-zA-Z0-9]).{6,10}$/;
    if(reUser.test(usr) && rePass.test(pass) && pass == repeatPass){
        window.alert("Passed Validation.");
    }else{
        window.alert("Invalid Input.");
    }
}