<?php 
use Bang\Lib\Bundle;

?>
<div class="loginpage">
    <div class="allinone">
        <div class="switchtag">
            <div class="login" id="login">登入</div>
            <div class="signup" id="signup">註冊</div>
        </div>

        <div class="logininswitch" id="logininswitch">
            <div class="sociallink">
                <span class="google_sign_in">Google登入</span>
                <span onclick="face_login()">Facebook登入</span>
            </div>

            <div class="underline"></div>
            <p class="title">會員登入</p>

                <div class="textin">
                    <input type="hidden" name="action" value="login">
                    <input type="text" class="form account" placeholder="帳號" id="login_account" name="userId">
                    <input type="text" class="form password" placeholder="密碼" id="login_password" name="userPsw">
                </div>
                <input type="submit" class="loginbtn" id="login_btn" value="開始購物吧！">

        </div>
        <div class="signswitch" id="signswitch">
            <div class="sociallink">
                <span class="google_sign_in">Google註冊</span>
                <span onclick="face_login()">Facebook註冊</span>
            </div>

            <div class="underline"></div>
            <p class="title">會員註冊</p>
            <div class="textin">
                <input type="text" class="form account"  placeholder="帳號" id="sign_account">
                <input type="password" class="form password"  placeholder="密碼(至少6碼，且包含1個英文1個數字)" id="sign_password">
                <input type="password" class="form password" placeholder="密碼確認" id="sign_passwordcheck">
                <input type="text" class="form mail" placeholder="姓名" id="sign_name">
                <input type="text" class="form phone" placeholder="ex. 0911111111" id="sign_phone">
            </div>
            <input class="loginbtn" id="signup_btn" value="開始購物吧！"></input>
        </div>
    </div>
</div>

<?php 

    Bundle::Js('test_js', array(
        'Content/js/js_m/login.js',
    ));

?>
<script>

$("#login_btn").on("click",function login(){
    
    let input_id = $("#login_account").val();
    let input_password = $("#login_password").val();

    $.ajax({
            url: "<?php echo Bang\Lib\Url::Action('login','MemberControllers') ?>",   //後端的URL
            type: "POST",   //用POST的方式
            dataType: "text",   //response的資料格式
            cache: false,   //是否暫存
            data: {userId:input_id , userPsw:input_password },
            success: function(resp) {                
                alert(resp);
                location.href ='index.php?action=MemberPage&controller=Home'
            } 
        })
});

$("#signup_btn").on("click",function signup(){
    
    let sign_account = $("#sign_account").val();
    let sign_password = $("#sign_password").val();
    let sign_name = $("#sign_name").val();
    let sign_phone = $("#sign_phone").val();

    let sign_data = {
                "sign_account" : sign_account,
                "sign_password" : sign_password,
                "sign_name" : sign_name,
                "sign_phone" : sign_phone
                }

    $.ajax({
            url: "<?php echo Bang\Lib\Url::Action('Signup','MemberControllers') ?>",   //後端的URL
            type: "POST",   //用POST的方式
            dataType: "text",   //response的資料格式
            cache: false,   //是否暫存
            data: sign_data,
            success: function() {    
            alert("註冊成功，跳轉至登入畫面！");
            },
            error: function(){
                alert("手機或是使用者帳號重複！");
            }
        })
        location.href ='index.php?action=MemberPage&controller=Home_m'

    });
</script>


 <!-- 引用jQuery-->
    <!--CLIENT_ID請自己改成從 後端組態檔讀取，例如：ASP.net的Web.config-->
    <script type="text/javascript">
        let CLIENT_ID = "636782637413-5ok64d76njdjjo0a83iif86vhs5rorjs.apps.googleusercontent.com";
        let DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/people/v1/rest"];
        function GoogleClientInit() {
            gapi.load('client', function () {
                gapi.client.init({
                clientId: CLIENT_ID,
                scope:  "https://www.googleapis.com/auth/user.phonenumbers.read ",               
                discoveryDocs: DISCOVERY_DOCS
                });
            });
        }
    </script>
    <script async defer src="https://apis.google.com/js/api.js"
            onload="this.onload=function(){};GoogleClientInit()"
            onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>