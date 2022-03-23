<?php 
use Bang\Lib\Bundle;
Bundle::Css('test_css', array(
    'Content/css/login.css',
));

?>
<div style="transform: rotate(-20deg);position: fixed;top: 50px;z-index: 5;left: 10px;">
    <img src="Content/img/title.png" alt="" style="width: 250px;">
    <span style="position: absolute;display: block;top: 50%;left: 50%;font-size: 45px;width: 250px;transform: translate(-50%, -50%);text-align: center;color: #fff;letter-spacing: 5px;">會員中心</span>
</div>

<div class="loginpage">
    <div class="allinone">
        <div class="switchtag">
            <div class="login" @click="ShowBox('login')" id="login" :class="control_box_show.login? 'show':'login_not_show'">登入</div>
            <div class="signup" @click="ShowBox('sign')" id="signup" :class="control_box_show.sign? 'show':'signup_not_show'">註冊</div>
        </div>

        <div v-if="control_box_show.login" class="logininswitch" id="logininswitch">
            <div class="sociallink">
                <span class="google_sign_in">Google登入</span>
                <span onclick="face_login()">Facebook登入</span>
            </div>

            <div class="underline"></div>
            <p class="title">會員登入</p>
                <div class="textin">
                    <input type="hidden" name="action" value="login">
                    <input type="text" class="form account" placeholder="帳號" id="login_account" name="userId" v-model="login_info.userId">
                    <input type="text" class="form password" placeholder="密碼" id="login_password" name="userPsw" v-model="login_info.userPsw">
                </div>
                <input @click="Login()" type="submit" class="loginbtn" id="login_btn" value="開始購物吧！">
                <p class="forget">忘記密碼?</p>
        </div>
            
        <div v-else class="signswitch" id="signswitch">
            <div class="sociallink">
                <span class="google_sign_in">Google註冊</span>
                <span onclick="face_login()">Facebook註冊</span>
            </div>
            <div class="underline"></div>
            <p class="title">會員註冊</p>
            <div class="textin">
                <input type="text" class="form account"  placeholder="帳號" id="sign_account" v-model="sign_info.account">
                <input type="password" class="form password" placeholder="密碼(至少6碼，且包含1個英文1個數字)" v-model="sign_info.password"> 
                <input type="password" class="form password" placeholder="密碼確認" id="sign_passwordcheck" v-model="sign_info.passwordcheck"> 
                <input type="text" class="form mail" placeholder="姓名" id="sign_name" v-model="sign_info.name">
                <input type="text" class="form phone" placeholder="ex. 0911111111" id="sign_phone" v-model="sign_info.phone">
            </div>
            <input @click="Signup()" class="loginbtn" id="signup_btn" value="開始購物吧！"></input>
        </div>

    </div>
</div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v8.0&appId=723194001886334&autoLogAppEvents=1" nonce="BVhEtwzq"></script>

<script>
let vue = new Vue({
    el:".loginpage",
    data:function(){
        return{
            control_box_show:{
                login:true,
                sign:false
            },
            login_info:{
                userId:"",
                userPsw:""
            },
            sign_info:{
                account:"",
                password:"",
                passwordcheck:"",
                name:"",
                phone:"",
            }
        }
    },
    computed:{

    },
    methods:{
        ShowBox:function(show_box_name){
            for(let i in this.control_box_show) {
                if(i != show_box_name){
                    this.control_box_show[i] = false;
                }else{
                    this.control_box_show[i] = true;
                }
            }
        },
        Login:function(){
            let v_this = this;
            let userId = v_this.login_info.userId;
            let userPsw = v_this.login_info.userPsw;
            if(userId && userPsw){
                v_this.LoginAjax(userId,userPsw,function(result){
                    alert(result);
                    location.href ='<?php echo Bang\Lib\Url::Action('MemberPage','Home') ?>';
                })
            }else{
                alert("請輸入完整");
            }
        },
        Signup:function(){
            let v_this = this;
            let sign_account = v_this.sign_info.account;
            let sign_password = v_this.sign_info.password;
            let sign_name = v_this.sign_info.name;
            let sign_phone = v_this.sign_info.phone;
            let check_password = v_this.sign_info.passwordcheck;
            let fn_name = "Signup";
            if(sign_account == '' || sign_password == '' || sign_name == '' || sign_phone == '' || check_password == ''){
                alert("資料輸入不完整");
                return false;
            }
            var password_reg = /^.*(?=.{6,})(?=.*\d)(?=.*[A-Za-z]{1,}).*$/;
            if(!sign_password.match(password_reg)){
                alert("密碼格式不正確");
                return false;
            }
            var phone_reg = /09\d{8}/;
            if(!sign_phone.match(phone_reg)){
                alert("手機格是不正確");
                return false;
            }
            if(check_password == sign_password){
                v_this.SignupAjax(sign_account,sign_password,sign_name,sign_phone,fn_name,function(result){
                    if(result == true){
                        alert("註冊成功，跳轉至登入畫面！");
                    }else{
                        alert("手機或是使用者帳號重複！");
                    }
                    location.href ='<?php echo Bang\Lib\Url::Action('login','Home') ?>';
                })
            }else{
                alert("請確認密碼!");
            }
        },
        LoginAjax:function(userId,userPsw,cb){
            this.callAjax("POST","<?php echo Bang\Lib\Url::Action('login','MemberControllers') ?>",{userId:userId,userPsw:userPsw},"text",cb);
        },
        SignupAjax:function(sign_account,sign_password,sign_name,sign_phone,fn_name,cb){
            this.callAjax("POST","<?php echo Bang\Lib\Url::Action('Signup','MemberControllers') ?>",{sign_account:sign_account,sign_password:sign_password,sign_name:sign_name,sign_phone:sign_phone,fn_name:fn_name},"text",cb);
        },
        callAjax:function(method,url,data,dataType,cb){
            $.ajax({
                type: method,
                url: url,
                data: data,
                dataType: dataType,
                success: function (response) {
                    cb(response);
                },error:function(err){
                    if(data.fn_name == "Signup"){
                        alert(err);
                        location.href ='<?php echo Bang\Lib\Url::Action('login','Home') ?>';
                    }
                    alert("something Error!");
                }
            });
        }
    }
})
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
