// 3/25 saved

window.addEventListener('load',function(){

  //   點擊購物車彈出左側欄  
    $(function(){
        $("button.headerbtn_shopcar").on("click", function(){
        $("#cardiv").toggleClass("-open");
        });
      });
  //   點擊購物車彈出左側欄
  
  
  // 關閉購物車
      let carclose = document.getElementById('closecar')
      let cardiv = document.getElementById('cardiv')
  
      carclose.addEventListener('click',function(){
        cardiv.classList.toggle('-open')
      })
  // 關閉購物車
  
  
  
  // 漢堡
      var hamburger_icon = document.getElementById("hamburger_icon");
      var hr1 = document.getElementById('hr1')
      var hr2 = document.getElementById('hr2')
      var hr3 = document.getElementById('hr3')
      var menubur = document.getElementsByClassName('menubur')
      var bodylock = document.getElementsByTagName('body')
      var burclick = true;
     
      hamburger_icon.addEventListener("click", function(){
        
        if(burclick){
          burclick= false;
          
          
        hr1.classList.toggle("-on1")
        hr2.classList.toggle("-on2")
        hr3.classList.toggle("-on3")
        menubur[0].classList.toggle("-on4")
  
        if(innerWidth <= 768 ){
        bodylock[0].classList.toggle("-bodylock")
  
          TweenMax.from('.menup1', .5, {
          x: 500,
          ease: Expo.easeOut,
          });
          TweenMax.from('.menup2', .5, {
          x: -500,
          delay:0.1,
          ease: Expo.easeOut,
          });
          TweenMax.from('.menup3', .5, {
          x: 500,
          delay:0.15,
          ease: Expo.easeOut,
          });
          TweenMax.from('.menup4', .5, {
          x: -500,
          delay:0.2,
          ease: Expo.easeOut,
          });
          TweenMax.from('.menup5', .5, {
          x: 500,
          delay:0.25,
          ease: Expo.easeOut,
          });
          TweenMax.from('.menup6', .5, {
          x: -500,
          delay:0.3,
          ease: Expo.easeOut,
          });
          TweenMax.from('.menup7', .5, {
          x: 500,
          delay:0.35,
          ease: Expo.easeOut,
          });
          TweenMax.from('.menup8', .5, {
          x: -500,
          delay:0.4,
          ease: Expo.easeOut,
          });
          TweenMax.from('.menup9', .5, {
          x: 500,
          delay:0.45,
          ease: Expo.easeOut,
          });

        }
          
        setTimeout(function(){
          burclick = true;
          }, 1000);
        }
      });
    // 漢堡

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
  
     //jQuery處理button click event 當畫面DOM都載入時....
     $(function GooglePeopleApi() {
      $("#google_sign_in").on("click", function () {
          $("#content").html("");//清空顯示結果
          GoogleLogin();//Google 登入
      });
      $("#btnDisconnect").on("click", function () {
          Google_disconnect();//和Google App斷連
      });
  });

  function GoogleClientInit() {
      //官網範例寫client:auth2，但本人實測由於待會要呼叫gapi.client.init而不是gapi.auth2.init，所以給client即可
      gapi.load('client', function () {
          gapi.client.init({
              //client_id 和 scope 兩者參數必填
              clientId: CLIENT_ID,
              //"profile"是簡寫，要用完整scope名稱也可以
              scope: "profile",//"https://www.googleapis.com/auth/userinfo.profile",
              discoveryDocs: DISCOVERY_DOCS
          });
      });//end gapi.load
  }//end GoogleClientInit function


  function GoogleLogin() {
      let auth2 = gapi.auth2.getAuthInstance();//取得GoogleAuth物件
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
              'personFields': 'names,phoneNumbers,emailAddresses,addresses,residences,genders,birthdays,occupations',
          }).then(function (res) {

                  //success
                  let str = JSON.stringify(res.result);//將物件列化成string，方便顯示結果在畫面上
                  //顯示授權你網站存取的用戶個資
                  document.getElementById('content').innerHTML = str;
                  //↑通常metadata標記primary:true的個資就是你該抓的資料
                  //請再自行Parse JSON，可以將JSON字串丟到線上parse工具查看：http://json.parser.online.fr/
                  //最終，取得用戶個資後看要填在畫面表單上或是透過Ajax儲存到資料庫(記得是傳id_token給你的Web Server而不是明碼的user_id喔)，本範例就不贅述，請自行努力XD
          });
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