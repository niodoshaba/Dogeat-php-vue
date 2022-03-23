<?php
use Bang\Lib\Bundle;
Bundle::Css('test_css', array(
    'Content/css/header_footer.css',
    'Content/css/member_center.css',
    'Content/css/slot_machine.css',
));
Bundle::Js('test_js', array(
    'Content/js/lib/vue.js',
));
?>
<style>
.show_btn{
    margin-bottom:30px;
    font-size:1.4rem;
    font-weight:500;
    color:white;
    text-align:center;
    border:none;
    background-color:#6bbc64;
    padding:5px 10px;
    border-radius:10px;
    outline:none;
    cursor:pointer;
}
.not_show_btn{
    margin-bottom:30px;
    font-size:1.4rem;
    font-weight:500;
    color:#6bbc64;
    text-align:center;
    border:2px solid #6bbc64;
    background-color:white;
    padding:5px 10px;
    border-radius:10px;
    outline:none;
    cursor:pointer;
}
</style>
<div id="vue">
    <div style="transform: rotate(-20deg);position: fixed;top: 50px;z-index: 5;left: 10px;">
        <img src="Content/img/title.png" alt="" style="width: 250px;">
        <span style="position: absolute;display: block;top: 50%;left: 50%;font-size: 45px;width: 250px;transform: translate(-50%, -50%);text-align: center;color: #fff;letter-spacing: 5px;">會員中心</span>
    </div>
    <!-- 選單列 -->
    <div id="menu" style="display:flex;justify-content:space-around;width:30%;margin: 50px auto;">
        <button @click="ShowBox('member_info_show',$event)"   :class="control_box_show.member_info_show ? 'show_btn':'not_show_btn'">個人資料</button> 
        <button @click="ShowBox('chase_order_show',$event)"   :class="control_box_show.chase_order_show ? 'show_btn':'not_show_btn'">追蹤訂單</button>
        <button @click="ShowBox('leave_message_show',$event)" :class="control_box_show.leave_message_show ? 'show_btn':'not_show_btn'">留言</button>
        <button @click="ShowBox('game_show',$event)"          :class="control_box_show.game_show ? 'show_btn' : 'not_show_btn'">小遊戲</button> 
    </div>
    <!-- 會員資料 -->
    <div v-if="control_box_show.member_info_show">
        <div style="border-style: solid;border-color: #6bbc64;border-radius: 15px;width:20%;margin: 0 auto;display:flex;flex-direction:column">
            <p style="padding: 10px;border-radius: 10px 10px 0 0;background: #6bbc64;text-align:center;font-size:1.6rem;color:#fff;margin:0;">個人資料</p>

            <div style="margin:15px 0;font-size: 1.4rem;">
                <div style="display:inline-block;width:45%;text-align:right"><span style="padding-left:30px;">姓名：</span></div>
                <div v-if="!edit_member_click" class="member_info_show" style="display:inline-block;width:45%;text-align:left"><span style="padding-left:20px;"> {{cus_info.cus_name}} </span></div>
                <input v-if="edit_member_click" class="member_info_edit" id="cus_name" v-model="cus_info.cus_name" style="outline:none;border:2px solid #e8eef3;vertical-align:initial;text-align:center;"></input>
            </div>
            <hr style="height: 2px;width: 100%;background: linear-gradient(to right,#6bbc6424, #6bbc64,#6bbc6424);border: none;margin: 0">
            <div style="margin:15px 0;font-size: 1.4rem;">
                <div style="display:inline-block;width:45%;text-align:right"><span style="padding-left:30px">電話：</span></div>
                <div v-if="!edit_member_click" class="member_info_show" style="display:inline-block;width:45%;text-align:left"><span style="padding-left:20px;">{{cus_info.cus_phone}}</span></div>
                <input v-if="edit_member_click" class="member_info_edit" id="cus_phone" v-model="cus_info.cus_phone" style="outline:none;border:2px solid #e8eef3;vertical-align:initial;text-align:center;"></input>
            </div>
            <hr style="height: 2px;width: 100%;background: linear-gradient(to right,#6bbc6424, #6bbc64,#6bbc6424);border: none;margin: 0">
            <div style="margin:15px 0;font-size: 1.4rem;">
                <div style="display:inline-block;width:45%;text-align:right"><span style="padding-left:30px">點數：</span></div>
                <div class="member_info_show" style="display:inline-block;width:45%;text-align:left"><span style="padding-left:20px;">{{cus_info.cus_point}}</span></div>
            </div>

        </div>
        <div id="member_info_btn_div" style="text-align:center;margin-top:20px">
            <div v-if="edit_member_click">
                <button id="edit_member_complete" @click="edit_member_complete" style="margin-bottom:30px;font-size:1rem;color:white;text-align:center;border:none;background-color:#6bbc64;padding:5px 10px;border-radius:10px;outline:none;cursor:pointer">完成</button>
                <button id="edit_member_cancel" @click="edit_member_cancel" style="margin-bottom:30px;font-size:1rem;color:white;text-align:center;border:none;background-color:#959595;padding:5px 10px;border-radius:10px;outline:none;cursor:pointer">取消</button>
            </div>
            <div v-else>
                <button id="edit_member_btn" @click="edit_member" style="margin-bottom:30px;font-size:1.7rem;color:white;text-align:center;border:none;background-color:#6bbc64;padding:5px 10px;border-radius:10px;outline:none;cursor:pointer">修改個人資料</button>
            </div>
        </div>
    </div>
    <!-- 查詢訂單 -->
    <div v-if="control_box_show.chase_order_show" style="width:70%;margin-left:15%;">
        <div style="width:30%;margin:0 auto;display:flex;flex-direction:column;border-style: solid;border-color: #6bbc64;border-radius: 15px;">
            <p style="text-align:center;font-size:1.5rem;color:#fff;background: #6bbc64;border-radius: 10px 10px 0 0;margin:0;padding: 10px;">訂單查詢</p>
            <div style="margin:10px 0;display:flex;flex-direction:column;align-items:center;font-size: 20px;">
                <div style="display:inline-block;width:45%;text-align:center"><p>輸入手機號碼：</p></div>
                <input v-model="cus_info.search_order_phone" style="margin-bottom: 16px;font-size: 20px;display:inline-block;outline:none;border:2px solid #e8eef3;vertical-align:initial;text-align:center;" placeholder="ex. 0911222333"></input>
            </div>
            <div v-if="order_serch_result !== false">
                <div id="order_check_div" v-for="(item, index) in order_serch_result" style="width:100%;text-align:center;line-height:50px">
                    <div v-if="item.ord_status == '未出貨'">
                        <span>訂單編號 : <span style="margin-right:25px">{{item.ord_no}}</span></span>
                        <span style="display: block;">訂單金額 : <span style="margin-right:25px">{{item.ord_price}}</span></span>
                        <span>訂單狀況 : <span>{{item.ord_status}}</span></span>
                        <span @click="cancel_ord" :data-ord_no="item.ord_no" style="cursor:pointer;margin-left:25px;border-bottom:1px solid maroon;color:maroon;font-size:12px">取消訂單</span>
                    </div>    
                    <div v-else>
                        <span>訂單編號 : <span style="margin-right:25px">{{item.ord_no}}</span></span>
                        <span style="display: block;">訂單金額 : <span style="margin-right:25px">{{item.ord_price}}</span></span>
                        <span>訂單狀況 : <span>{{item.ord_status}}</span></span>
                    </div>
                </div>
            </div>
            <div v-else style="width:100%;text-align:center;line-height:50px">
                <span>查無訂單資料</span>
            </div>
        </div>
        <div id="member_info_btn_div" style="text-align:center;margin-top:20px">
            <button @click="order_search" style="margin-bottom:30px;font-size:1.7rem;color:white;text-align:center;border:none;background-color:#6bbc64;padding:5px 10px;border-radius:10px;outline:none;cursor:pointer">查詢</button>
        </div>
    </div>
    <!-- 留言 -->
    <div v-if="control_box_show.leave_message_show" style="width:70%;margin-left:15%;">
        <div style="display: flex;flex-direction: column;justify-content: center;align-items: center">
            <div style="width: 50%;">
                <span style="font-size: 25px;">歡迎留言：</span>
            </div>
            <textarea id="mes_content" style="padding: 10px;outline: none;resize: none;width: 50%;height: 200px;font-size: 25px;border: 2px solid #e8eef3"></textarea>
            <button @click="leave_message" style="margin: 20px;font-size: 1.4rem;color: white;text-align: center;border: none;background-color: #6bbc64;padding: 5px 10px;border-radius: 10px;outline: none;cursor: pointer;height: 40px;width: 75px;">留言</button>
        </div>
        <hr style="border: none;background: linear-gradient(to right, white,rgb(0 0 0 / 25%), white);height: 5px;">
        <div id="reply_box" style="display: flex;flex-direction: column;justify-content: center;align-items: center;">
            <div v-if="message">
                <div v-for="(item, index) in message" style="position: relative;width:900px;margin: 10px 0 50px 0;height: 245px;">
                    <div style="position: absolute;z-index: 2;left: -40px;top: 5px;width: 0px;height: 0px;border-top: 20px solid rgb(163 220 158);border-left: 50px solid rgb(0 0 0 / 0%);"></div>
                    <div style="width: 55%;height: 100px;background: #7fce78b8;margin: 5px 0;padding: 10px;border-radius: 10px;">
                        <div>{{cus_info.cus_name}}<div style="position: absolute;top: 15px;right: 400px;">{{item.leave_time}}</div></div>
                        <textarea cols="30" rows="10" style="border: none;box-sizing: border-box;padding: 5px;width: 99%;height: 64px;margin: 10px 0px;resize: none;outline: none;" readonly="">{{item.mes_content}}</textarea>
                    </div>
                    <div style="position: absolute;right: -40px;z-index: 2;bottom: 90px;width: 0px;height: 0px;border-top: 20px solid rgb(163 220 158);border-right: 50px solid transparent;"></div>
                    <div style="width: 55%;height: 100px;background: #7fce78b8;right: 0;position: absolute;margin: 5px 0;padding: 10px;border-radius: 10px;">
                        <div style="text-align: end;">管理員<div style="position: absolute;top: 15px;right: 400px;">{{item.reply_time}}</div></div>
                        <textarea cols="30" rows="10" style="border: none;box-sizing: border-box;padding: 5px;width: 99%;height: 64px;margin: 10px 0px;resize: none;outline: none;" readonly="">{{item.administrator_Reply}}</textarea>
                    </div>
                </div>
            </div>
            <div v-else>
                <p style="background: #6bbc64;color: white;font-size: 1.4rem;width: 480px;text-align: center;height: 50px;line-height: 50px;border-radius: 15px">快與我們討論吧~</p>
            </div>
        </div>
    </div>
    <!-- 小遊戲 -->
    <div v-if="control_box_show.game_show" style="width: 100%;padding: 30px 0;">
        <div class="content">
            <div id="slotMachineButton1" class="button" @click="PlaySlotMachine"></div>
            <div class="machineContainer">
                <div id="casino1" class="slotMachine">
                    <div id="box1">    
                        <div class="slot slot1"></div>
                        <div class="slot slot2"></div>
                        <div class="slot slot3"></div>
                        <div class="slot slot4"></div>
                        <div class="slot slot5"></div>
                        <div class="slot slot6"></div>
                    </div>
                </div>
                <div id="casino2" class="slotMachine">         
                    <div id="box2">
                        <div class="slot slot1"></div>
                        <div class="slot slot2"></div>
                        <div class="slot slot3"></div>
                        <div class="slot slot4"></div>
                        <div class="slot slot5"></div>
                        <div class="slot slot6"></div>
                    </div>
                </div>
                <div id="casino3" class="slotMachine">
                    <div id="box3">
                        <div class="slot slot1"></div>
                        <div class="slot slot2"></div>
                        <div class="slot slot3"></div>
                        <div class="slot slot4"></div>
                        <div class="slot slot5"></div>
                        <div class="slot slot6"></div>
                    </div>
                </div>
            </div>
            <div id="point" style="left: 625px;font-size: 45px;position: absolute;top: 435px;">{{cus_info.cus_point}}</div>
            <div id="buttom10" @click="buttom10" style="left: 850px;font-size: 45px;position: absolute;top: 435px;" class="btn">10</div>
            <div id="buttom50" @click="buttom50" style="left: 950px;font-size: 45px;position: absolute;top: 435px;" class="slotMachineButton">50</div>
            <div id="buttom100" @click="buttom100" style="left: 1050px;font-size: 45px;position: absolute;top: 435px;" class="slotMachineButton">100</div>
        </div>
        <div style="width: 355px;height: 100px;overflow: hidden;position: absolute;left: 48.6%;top: 560px;transform: translateX(-50%);">
            <div class="result_msg_box">
                <div class="result_msg">
                </div>
            </div>
        </div>
        <div class="record_game_box">
            <div class="record_game_info">
                <p><span>局數</span><span>賭金</span><span>結果</span></p>
            </div>
        </div>
    </div>
</div>
<script>
let vue = new Vue({
    el: '#vue',
    data : function(){
        return {
            cus_info:{
                cus_name:'<?php echo $_SESSION['cus_name']?>',
                cus_phone:'<?php echo $_SESSION['cus_phone']?>',
                cus_point:'<?php echo $_SESSION['cus_point']?>',
                search_order_phone:""
            },
            control_box_show:{
                member_info_show: true,
                chase_order_show:false,
                leave_message_show:false,
                game_show:false
            },
            order_serch_result:[],
            message:[],
            edit_member_click:false,
            lock : false,
            counter : 10,
            bt10 : true,
            bt50 : false,
            bt100 : false,
            number_of_times : 1
        }
    },
    mounted: function() {
        this.RenderMessage();
    },
    methods : {
        ShowBox:function(show_box_name,event){
            for(let i in this.control_box_show) {
                if(i != show_box_name){
                    this.control_box_show[i] = false;
                }else{
                    this.control_box_show[i] = true;
                }
            }
        },
        edit_member:function(){
            this.edit_member_click = true;
        },
        edit_member_cancel:function(){
            location.reload()
        },
        edit_member_complete:function(){
            this.edit_member_completeAjax(this.cus_info.cus_name,this.cus_info.cus_phone,function(res){
                alert("修改完成，請重新登入")
                $('#logout_btn').click();
            })
        },
        order_search:function(){
            let v_this = this;
            v_this.order_searchAjax(this.cus_info.search_order_phone,function(serch_result){
                console.log(serch_result);
                v_this.order_serch_result = serch_result;
            })
        },
        cancel_ord:function(event){
            let ord_no = event.target.getAttribute("data-ord_no");
            console.log(event);
            this.ecancel_ordAjax(ord_no,function(res){
                alert(res);
                location.reload();
            })
        },
        RenderMessage:function(){
            let v_this = this;
            let cus_phone = v_this.cus_info.cus_phone;
            if(cus_phone != ""){
                v_this.RenderMessageAjax(cus_phone,function(message){
                    console.log(message);
                    v_this.message = message;
                })
            }else{
                alert("先輸入電話好讓我們能夠親口討論您的問題~");
            }
        },
        leave_message:function(){
            let cus_phone =  this.cus_info.cus_phone;
            let mes_content = $("#mes_content").val();
            let date = new Date();
            let now_date=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
            if(cus_phone == ""){
                alert("先輸入電話好讓我們能夠親口討論您的問題~");
            }else if(mes_content == ""){
                alert("真的沒有話要說嗎再想想吧~");
            }else{
                this.LeaveMessage(cus_phone,mes_content,now_date,function(res){
                    alert("留言成功");
                    location.reload();
                })
            }
        },
        buttom10:function(){
            console.log("sdf");
            if(this.cus_info.cus_point >= 10 && this.lock==false){
                if(this.bt10 == false){
                    $("#buttom10").attr("class","btn");
                    $("#buttom50").attr("class","slotMachineButton");
                    $("#buttom100").attr("class","slotMachineButton");
                    this.bt10 = true; 
                    this.bt50 = false; 
                    this.bt100 = false; 
                }
            }				
        },
        buttom50:function(){
            if(this.cus_info.cus_point >= 50 && this.lock==false){
                if(this.bt50 == false){
                    $("#buttom10").attr("class","slotMachineButton");
                    $("#buttom50").attr("class","btn");
                    $("#buttom100").attr("class","slotMachineButton");
                    this.bt10 = false; 
                    this.bt50 = true; 
                    this.bt100 = false; 
                }
            }				
        },
        buttom100:function(){
            if(this.cus_info.cus_point >= 100 && this.lock==false){
                if(this.bt100 == false){
                    $("#buttom10").attr("class","slotMachineButton");
                    $("#buttom50").attr("class","slotMachineButton");
                    $("#buttom100").attr("class","btn");
                    this.bt10 = false; 
                    this.bt50 = false; 
                    this.bt100 = true; 
                }
            }				
        },
        PlaySlotMachine:function(){
            let v_this = this;
            let Bargaining_chip;
            if(v_this.bt10){
                Bargaining_chip = 10;
            }else if(v_this.bt50){
                Bargaining_chip = 50;
            }else{
                Bargaining_chip = 100;
            }
            if(v_this.lock == false && v_this.cus_info.cus_point >= Bargaining_chip){
                v_this.lock = true ;
                let box1 = document.getElementById('box1');
                let box2 = document.getElementById('box2');
                let box3 = document.getElementById('box3');
                $("#slotMachineButton").animate({ top: 225, height:'130px',width:'130px',fontSize: 100, 'line-height':'200px',duration: '5000',right: "437",
                    easing: 'easeOutBounce'},500);
                $("#slotMachineButton").animate({ top: 225 , height:'100px',width:'100px',fontSize: 60,'line-height':'150px',duration: '5000',right: "456",
                    easing: 'easeOutBounce'}, 500);
                setTimeout(function(){ box1.className = "rotate"; }, 200);
                setTimeout(function(){ box2.className = "rotate"; }, 300);
                setTimeout(function(){ box3.className = "rotate"; }, 400);
                this.updatapoint(Bargaining_chip);
            }else if(v_this.cus_info.cus_point < Bargaining_chip){
                alert("點數不足");
            }
        },
        updatapoint :function(Bargaining_chip){
            let v_this = this;
            let cus_phone = v_this.cus_info.cus_phone;
            v_this.cus_info.cus_point = v_this.cus_info.cus_point-Bargaining_chip;
            v_this.UpdatapointAjax(cus_phone,Bargaining_chip,function(response){
                let data = JSON.parse(response);
                score = data[0];//點數
                setTimeout(function(){ $("#box1").removeClass("rotate"); $("#box1").css("margin-top",data[1]*(-140))}, 1600);
                setTimeout(function(){ $("#box2").removeClass("rotate"); $("#box2").css("margin-top",data[2]*(-140))}, 1700);
                setTimeout(function(){ $("#box3").removeClass("rotate"); $("#box3").css("margin-top",data[3]*(-140))}, 1800);
                //轉完後才執行
                setTimeout(function(){
                    $(".result_msg_box").animate({ top: 0,easing: 'easeOutBounce'},2000);
                    setTimeout(function(){$(".result_msg_box").animate({ top: -100,easing: 'easeOutBounce'},2000);v_this.lock = false;},3000);

                    $(".result_msg").text(data[4]);
                    if(score - v_this.cus_info.cus_point > 0){
                        $(".record_game_info").append(`
                        <p><span>${v_this.number_of_times}</span><span>${Bargaining_chip}</span><span style="color:green;">+${score - v_this.cus_info.cus_point}</span></p>
                        `);
                    }else{
                        $(".record_game_info").append(`
                        <p><span>${v_this.number_of_times}</span><span>${Bargaining_chip}</span><span style="color:red;">-${Bargaining_chip}</span></p>
                        `);
                    }
                    v_this.number_of_times++;
                    v_this.cus_info.cus_point = score;
                    if(v_this.cus_info.cus_point<50){
                    $("#buttom10").attr("class","btn");
                    $("#buttom50").attr("class","slotMachineButton");
                    $("#buttom100").attr("class","slotMachineButton");
                    v_this.bt10 = true;
                    v_this.bt50 = false;
                    v_this.bt100 = false;
                    }else if(v_this.cus_info.cus_point >= 50 && v_this.cus_info.cus_point < 100){
                        $("#buttom10").attr("class","slotMachineButton");
                        $("#buttom50").attr("class","btn");
                        $("#buttom100").attr("class","slotMachineButton");
                        v_this.bt10 = false;
                        v_this.bt50 = true; 
                        v_this.bt100 = false;
                    }
                },1800);
            })
        },
        //-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----
        //-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----
        //-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----
        //-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----
        //-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----
        edit_member_completeAjax: function(cus_name,cus_phone, cb) {
            this.callAjax("POST","<?php echo Bang\Lib\Url::Action('MemberUpdate','MemberControllers')?>",{cus_name:cus_name,cus_phone:cus_phone},"text",cb);
        },
        order_searchAjax:function(search_order_phone,cb){
            this.callAjax("GET","<?php echo Bang\Lib\Url::Action('CheckOrder','OrderControllers')?>",{cus_phone:search_order_phone},"json",cb);
        },
        ecancel_ordAjax:function(ord_no,cb){
            this.callAjax("POST","<?php echo Bang\Lib\Url::Action('CancelOrder','OrderControllers') ?>",{ord_no:ord_no,ord_status:"取消"},"text",cb);
        },
        RenderMessageAjax:function(cus_phone,cb){
            this.callAjax("GET","<?php echo Bang\Lib\Url::Action('GetMemberMessage','MemberControllers') ?>",{cus_phone:cus_phone},"json",cb);
        },
        LeaveMessage:function(cus_phone,mes_content,now_date,cb){
            this.callAjax("GET","<?php echo Bang\Lib\Url::Action('LeaveMessage','MemberControllers') ?>",{cus_phone:cus_phone,mes_content:mes_content,now_date:now_date},"text",cb);
        },
        UpdatapointAjax:function(cus_phone,Bargaining_chip,cb){
            this.callAjax("POST","<?php echo Bang\Lib\Url::Action('updatapoint','MemberControllers') ?>",{cus_phone:cus_phone,Bargaining_chip:Bargaining_chip},"text",cb);
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
                    alert("something Error!");
                }
            });
        }
    }
})
</script>
