// 3/25 saved

window.addEventListener('load',function(){

// let google_data = 
//   {
//     "resourceName":"people/117505336238647129218",
//     "etag":"%EgkBAj0JPgs/Ny4aBAECBQciDDBGSkl4QndLZDdFPQ==",
//     "names":[
//     {
//     "metadata":{
//     "primary":true,
//     "source":{
//     "type":"PROFILE",
//     "id":"117505336238647129218"
//     }
//     },
//     "displayName":"王致傑",
//     "familyName":"王",
//     "givenName":"致傑",
//     "displayNameLastFirst":"王致傑",
//     "unstructuredName":"王致傑"
//     }
//     ],
//     "emailAddresses":[
//     {
//     "metadata":{
//     "primary":true,
//     "verified":true,
//     "source":{
//     "type":"ACCOUNT",
//     "id":"117505336238647129218"
//     }
//     },
//     "value":"kof011466@gmail.com"
//     }
//     ],
//     "phoneNumbers":[
//     {
//     "metadata":{
//     "primary":true,
//     "source":{
//     "type":"PROFILE",
//     "id":"117505336238647129218"
//     }
//     },
//     "value":"0976769237",
//     "type":"home",
//     "formattedType":"住家"
//     }
//     ]
//     }

    
    $(function () {
      $(".google_sign_in").on("click", function () {
          GoogleLogin();
      });
      $("#btnDisconnect").on("click", function () {
          Google_disconnect();
      });
  });

  function GoogleLogin() {
      let auth2 = gapi.auth2.getAuthInstance();
      auth2.signIn().then(function (GoogleUser) {
          console.log("Google登入成功");
          let user_id = GoogleUser.getId();//取得user id，不過要發送至Server端的話，為了資安請使用id_token，本人另一篇文章有範例：https://dotblogs.com.tw/shadow/2019/01/31/113026
          console.log(`user_id:${user_id}`);
          let AuthResponse = GoogleUser.getAuthResponse(true) ;//true會回傳包含access token ，false則不會
          let id_token = AuthResponse.id_token;//取得id_token
          //people.get方法參考：https://developers.google.com/people/api/rest/v1/people/get
          gapi.client.people.people.get({
              'resourceName': 'people/me',
              //通常你會想要知道的用戶個資↓
              'personFields': 'names,phoneNumbers,emailAddresses',
          }).then(function (res) {

                    console.log(res.result)
                    console.log(res.result["names"][0]["displayName"])

                    console.log(res.result["resourceName"].slice(7))
                    
                    let google_sign_data = {
                      "sign_account" : res.result["resourceName"].slice(7),
                      "sign_password" : res.result["resourceName"].slice(7),
                      "sign_name" : res.result["names"][0]["displayName"],

                      }
                      
                    let google_login_data = {
                      "sign_account" : res.result["resourceName"].slice(7),
                      "sign_password" : res.result["resourceName"].slice(7),
                      }
              
                    $.ajax({
                      url: "/frontVue/index.php?action=GoogleSignup&controller=MemberControllers",   //後端的URL
                      type: "POST",
                      dataType: "text",
                      cache: false,
                      data: google_sign_data,
                      success: function(res) {
                        GoogleLogin(google_login_data)
                        location.href ='index.php?action=MemberPage&controller=Home'
                      },
                  });
              
                });
              
                function GoogleLogin(google_login_data){
                  $.ajax({
                    url: "/frontVue/index.php?action=GoogleLogin&controller=MemberControllers",   //後端的URL
                    type: "POST",
                    dataType: "text",
                    cache: false,
                    data: google_login_data,
                    success: function(res) {
              
                    },
                  });
                }

      },
          function (error) {
              console.log("Google登入失敗");
              console.log(error);
          });

  }//end function GoogleLogin

  function Google_disconnect() {
      let auth2 = gapi.auth2.getAuthInstance(); //取得GoogleAuth物件

      auth2.disconnect().then(function () {
          console.log('User disconnect.');
      });
  }


  
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
