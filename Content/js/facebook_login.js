//fb登入
window.fbAsyncInit = function() {
  FB.init({
    appId      : '{723194001886334}',
    cookie     : true,
    xfbml      : true,
    version    : 'v8.0'
  });
    
  FB.AppEvents.logPageView();   
  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
};
function face_login() {
    FB.getLoginStatus(function (res) {
        console.log(`status:${res.status}`);//Debug
        if (res.status === "connected") { //已授權
            let userID = res["authResponse"]["userID"];
            console.log("用戶已授權您的App，用戶須先revoke撤除App後才能再重新授權你的App");
            console.log(`已授權App登入FB 的 userID:${userID}`);
            GetProfile();
        } else if (res.status === 'not_authorized' || res.status === "unknown") {//尚未授權
            //App未授權或用戶登出FB網站才讓用戶執行登入動作
            FB.login(function (response) {
                //console.log(response); //debug用
                if (response.status === 'connected') {
                    //user已登入FB
                    //抓userID
                    let userID = response["authResponse"]["userID"];
                    console.log(`已授權App登入FB 的 userID:${userID}`);
                    GetProfile();
                } else {
                    // user FB取消授權
                    alert("Facebook帳號無法登入");
                }
                //"public_profile"可省略，仍然可以取得name、userID
            }, { scope: 'email' }); 
        }
    });
}
function GetProfile() {
  FB.api("/me", "GET", { fields: 'name,email,address,picture' }, function (user) {
      if (user.error) {
          console.log(user);
      } else {
      $.ajax({
        type: "POST",
        url: "/frontVue/index.php?action=ThirdPartyLogin&controller=MemberControllers",
        data: {"cus_id":user["id"],"cus_name":user["name"]},
        dataType: "text",
        success: function (response) {
          if(response){
            alert(response);
            location.href ='index.php?action=MemberPage&controller=Home';
          }else{
            alert(response);
            location.href ='index.php?action=login&controller=Home';
          }
        }
      });
      let user_info = JSON.stringify(user);
      console.table(user_info);
      console.log(user["name"]);
    }
  });
}
function logout() {
  FB.logout(function (response) {
    console.log(response)
  });
}