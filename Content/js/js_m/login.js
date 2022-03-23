//登入註冊切換   

let login = document.getElementById('login')
let signup = document.getElementById('signup')
let logininswitch = document.getElementById('logininswitch')
let signswitch = document.getElementById('signswitch')
let signup_btn = document.getElementById('signup_btn')

//登入註冊切換      

login.addEventListener('click',function(){
    signup.style.borderBottom = '1px solid #e0e0e0'
    signup.style.borderLeft = '1px solid #e0e0e0'
    signup.style.backgroundColor = '#f1f1f1'
    login.style.borderBottom = '0'
    login.style.borderRight = '0'
    login.style.backgroundColor = 'white'
    signswitch.style.display = 'none'
    logininswitch.style.display = 'block'
    
})

signup.addEventListener('click',function(){
    login.style.borderBottom = '1px solid #e0e0e0'
    login.style.borderRight = '1px solid #e0e0e0'
    login.style.backgroundColor = '#f1f1f1'
    signup.style.borderBottom = '0'
    signup.style.borderLeft = '0'
    signup.style.backgroundColor = 'white'
    signswitch.style.display = 'block'
    logininswitch.style.display = 'none'
})

let sign_account = document.getElementById('sign_account')
let sign_password = document.getElementById('sign_password')
let sign_passwordcheck = document.getElementById('sign_passwordcheck')
let sign_phone = document.getElementById('sign_phone')


var password_reg = /^.*(?=.{6,})(?=.*\d)(?=.*[A-Za-z]{1,}).*$/
var phone_reg = /09\d{8}/

NoSignInfo()
$('#sign_account').blur(function(){
    NoSignInfo()
})
$('#sign_phone').blur(function(){
    NoSignInfo()
    if(sign_phone.value.match(phone_reg)){
    sign_phone.style.backgroundColor = "rgba(0,200,0,.05)"
    NoSignInfo()
    }else{
    sign_phone.style.backgroundColor = "rgba(255,0,0,.1)"
    
    $("#signup_btn").attr('disabled', true);
    $("#signup_btn").css('background-color', "#959595");
    }
})
$('#sign_password').blur(function(){
NoSignInfo()
if(sign_password.value.match(password_reg)){
    sign_password.style.backgroundColor = "rgba(0,200,0,.05)"
    NoSignInfo()
}else{
    sign_password.style.backgroundColor = "rgba(255,0,0,.1)"
    
    $("#signup_btn").attr('disabled', true);
    $("#signup_btn").css('background-color', "#959595");
}

})
$('#sign_passwordcheck').blur(function(){
NoSignInfo()
if(sign_passwordcheck.value.match(password_reg)){
    sign_passwordcheck.style.backgroundColor = "rgba(0,200,0,.05)"
    NoSignInfo()
}else{
    sign_passwordcheck.style.backgroundColor = "rgba(255,0,0,.1)"
    
    $("#signup_btn").attr('disabled', true);
    $("#signup_btn").css('background-color', "#959595");
}
if(sign_passwordcheck.value == sign_password.value){
    sign_passwordcheck.style.backgroundColor = "rgba(0,200,0,.05)"
    NoSignInfo()
}else{
    sign_passwordcheck.style.backgroundColor = "rgba(255,0,0,.1)"
    
    $("#signup_btn").attr('disabled', true);
    $("#signup_btn").css('background-color', "#959595");
}
if(sign_passwordcheck.value == ''){
    sign_passwordcheck.style.backgroundColor = "rgba(255,0,0,.1)"
    
    $("#signup_btn").attr('disabled', true);
    $("#signup_btn").css('background-color', "#959595");
}

})

function NoSignInfo(){
if(sign_account.value == ""|| sign_password.value == ""|| sign_passwordcheck.value == ""|| sign_phone.value == ""){
    $("#signup_btn").attr('disabled', true);
    $("#signup_btn").css('background-color', "#959595");
}else{
    $("#signup_btn").attr('disabled', false);
    $("#signup_btn").css('background-color', "#55A34D");
}
}

