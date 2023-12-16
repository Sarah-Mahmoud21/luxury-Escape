// Inside Register Page

let regClose = document.querySelector('#form-close-Reg');

regClose.addEventListener('click', () => {
    window.location.replace('../index.php');
});

window.onload = function(){
    if(window.location.href.includes("AlreadyExist")){
        window.alert("User name or Email already exists.");
    } else if(window.location.href.includes("NotRegistered")){
        window.alert("Please register so you can login");
    }
};

var flagPass=false,flagShow=false;

let regPass = document.querySelector('#regPass');
let regPassCon = document.querySelector('#regPass_Con');
let SubmitButton = document.querySelector('.btn');

regPass.addEventListener('keyup',function(){
    let regexTest = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,32}$/;
    if(regexTest.test(regPass.value)){
        flagPass=true;
    } else {
        flagPass=false;
    }
});

regPassCon.addEventListener('keyup',function(){
    if(regPassCon.value == regPass.value){
        if(flagPass){
            SubmitButton.removeAttribute('disabled');
        } else{
            window.alert(`Password must be 8-32 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.`);
        }
    } else {
        SubmitButton.setAttribute('disabled','');
    }
});


let showPass = document.querySelector('#showPass');

showPass.addEventListener('click',()=>{
    if(!flagShow){
        regPass.setAttribute('type','text');
        regPassCon.setAttribute('type','text');
    } else {
        regPass.setAttribute('type','password');
        regPassCon.setAttribute('type','password');
    }
    flagShow = !flagShow;
});