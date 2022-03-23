
<div>
    <p class="member_page_title">會員中心</p> 
</div>
<div style="display:flex;justify-content:space-around;width:100%;margin:5% auto">
    <button id="member_info_btn" >個人資料</button> 
    <button id="chase_order_btn" >追蹤訂單</button> 
    <button id="leave_message_btn">留言</button>
    <button id="game_btn">小遊戲</button> 
</div>

<div id="member_page_info" style="display:block">
    <div style="border-style: solid;border-color: #6bbc64;border-width: 10px;width: 65%;border-radius: 15px;margin: 0 auto;display: flex;flex-direction: column;font-size: 45px;">
        <p style="padding: 15px;background: #6bbc64;color: #fff;font-size: 55px;">個人資料</p>
        <div style="margin:20px 0">
            <div style="display:inline-block;width:45%;"><span>姓名：</span></div>
            <div class="member_info_show" style="display:inline-block;width:45%;text-align:left"><span> <?php echo $_SESSION['cus_name'] ?> </span></div>
            <input class="member_info_edit" id="cus_name" value="<?php echo $_SESSION['cus_name'] ?>" style="display:none;outline:none;border:2px solid #e8eef3;vertical-align:initial;text-align:center;"></input>
        </div>
        <hr style="height: 5px;width: 100%;background: linear-gradient(to right,#6bbc6424, #6bbc64,#6bbc6424);border: none;margin: 0">
        <div style="margin:20px 0">
            <div style="display:inline-block;width:45%;"><span>電話：</span></div>
            <div class="member_info_show" style="display:inline-block;width:45%;text-align:left"><span><?php echo $_SESSION['cus_phone'] ?></span></div>
            <input class="member_info_edit" id="cus_phone" value="<?php echo $_SESSION['cus_phone'] ?>" style="display:none;outline:none;border:2px solid #e8eef3;vertical-align:initial;text-align:center;"></input>
        </div>
        <hr style="height: 5px;width: 100%;background: linear-gradient(to right,#6bbc6424, #6bbc64,#6bbc6424);border: none;margin: 0">
        <div style="margin:20px 0">
            <div style="display:inline-block;width:45%;"><span>電話：</span></div>
            <div class="member_info_show" style="display:inline-block;width:45%;text-align:left"><span><?php echo $_SESSION['cus_point'] ?></span></div>
            <input class="member_info_edit" id="cus_point" value="<?php echo $_SESSION['cus_point'] ?>" style="display:none;outline:none;border:2px solid #e8eef3;vertical-align:initial;text-align:center;"></input>
        </div>

    </div>
    <div id="member_info_btn_div" style="text-align:center;margin-top:20px">
        <button id="edit_member_btn">修改個人資料</button>
    </div>
</div>

<div id="chase_order" style="display:none">
    <div style="width: 65%;margin: 0 auto;border-style: solid;display: flex;flex-direction: column;border-radius: 15px;border-width: 10px;border-color: #6bbc64;">
        <p style="background: #6bbc64;font-size: 65px;color: #fff;border-radius: 5px 5px 0 0;">訂單查詢</p>
        <div style="margin:20px 0">
            <div style="display:inline-block;width:100%;text-align:center"><span>輸入手機號碼：</span></div>
            <input id="member_search_input" style="display:inline-block;outline:none;border: 1px solid #606060;border-radius:15px;vertical-align:initial;text-align:center;margin-top:34px" placeholder="ex. 0911222333"></input>
        </div>
    </div>
    <div id="order_check_div" style="display:flex;flex-direction:column;margin-top:5%">
            <span style="margin-bottom:15px">訂單編號 : <span id="ord_no_check"></span> </span>
            <span style="margin-bottom:15px">訂單金額 : <span id="ord_price_check"></span> </span>
            <span style="margin-bottom:15px">訂單狀況 : <span id="ord_status_check"></span> </span>
        </div>
    <div id="member_info_btn_div" style="text-align:center;margin-top:20px">
        <button id="order_search_btn">查詢</button>
    </div>
</div>

<div id="leave_message_box" style="width: 80%;margin: 0 auto;display: none;min-height: 970px;">
    <div style="display: flex;flex-direction: column;justify-content: center;align-items: center">
        <div style="width: 100%;">
            <span style="font-size: 50px;">歡迎留言：</span>
        </div>
        <textarea id="mes_content" style="padding: 10px;outline: none;resize: none;width: 100%;height: 320px;font-size: 50px;border: 2px solid #e8eef3;"></textarea>
        <button id="leave_message" style="margin: 20px;font-size: 3rem;color: white;text-align: center;border: none;background-color: #6bbc64;padding: 5px 10px;border-radius: 10px;outline: none;cursor: pointer;height: 80px;width: 200px;">留言</button>
    </div>
    <hr style="border: none;background: linear-gradient(to right, white,rgb(0 0 0 / 25%), white);height: 5px;">
    <div id="reply_box" style="display: flex;flex-direction: column;justify-content: center;align-items: center;">

    </div>
</div>

<div id="game_box" style="width:100%;display:none;min-height: 850px;">
    <div class="content">
        <div id="slotMachineButton1" class="button"></div>
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
        <div id="point" style="left: 234px;font-size: 45px;position: absolute;top: 588px;"><?php echo $_SESSION['cus_point'];?></div>
        <div id="buttom10" style="left: 400px;" class="btn">10</div>
        <div id="buttom50" style="left: 520px;" class="slotMachineButton">50</div>
        <div id="buttom100" style="left: 635px;" class="slotMachineButton">100</div>
    </div>
    <div style="width: 355px;height: 100px;overflow: hidden;position: absolute;left: 47.5%;top: 730px;transform: translateX(-50%);">
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

<script>
$(document).ready(function () {
    RenderMessage();
        //預設值
        score = <?php echo $_SESSION['cus_point'];?>;
    lock = false;
    counter = 10;
    bt10 = true;
    bt50 = false;
    bt100 = false;
    number_of_times = 1;
    //點擊10
    $("#buttom10").click(		
        function(){
            if(score >= 10 && lock==false){
                if(bt10 == false){
                    $("#buttom10").attr("class","btn");
                    $("#buttom50").attr("class","slotMachineButton");
                    $("#buttom100").attr("class","slotMachineButton");
                    bt10 = true; 
                    bt50 = false; 
                    bt100 = false; 
                    counter = 10;
                }
            }				
        }
    );
    //點擊50
    $("#buttom50").click(
        function(){
            if(score >= 50 && lock==false){
                if(bt50 == false){
                    $("#buttom10").attr("class","slotMachineButton");
                    $("#buttom50").attr("class","btn");
                    $("#buttom100").attr("class","slotMachineButton");
                    bt10 = false; 
                    bt50 = true; 
                    bt100 = false; 
                    counter = 50;
                }
            }else if(score < 50){
                alert("點數不足");
            }
        }
    );
    //點擊100
    $("#buttom100").click(
        function(){
            if(score >= 100 && lock==false){
                if(bt100 == false){
                    $("#buttom10").attr("class","slotMachineButton");
                    $("#buttom50").attr("class","slotMachineButton");
                    $("#buttom100").attr("class","btn");
                bt10 = false; 
                bt50 = false; 
                bt100 = true; 
                counter = 100;
                }
            }else if(score < 100){
                alert("點數不足");
            }
        }
    );
    //點擊拉霸
    $("#slotMachineButton1").click(
        function(){
            let Bargaining_chip;
            if(bt10){
                Bargaining_chip = 10;
            }else if(bt50){
                Bargaining_chip = 50;
            }else{
                Bargaining_chip = 100;
            }
            if(lock == false && score >= Bargaining_chip){
                lock = true ;
                let box1 = document.getElementById('box1');
                let box2 = document.getElementById('box2');
                let box3 = document.getElementById('box3');
                $(this).animate({ top: 400, height:'130px',width:'130px',fontSize: 100, 'line-height':'200px',duration: '5000',right: "45",
                                easing: 'easeOutBounce'},500);
                $(this).animate({ top: 390 , height:'100px',width:'100px',fontSize: 60,'line-height':'150px',duration: '5000',right: "67",
                    easing: 'easeOutBounce'}, 500);
                setTimeout(function(){ box1.className = "rotate"; }, 200);
                setTimeout(function(){ box2.className = "rotate"; }, 300);
                setTimeout(function(){ box3.className = "rotate"; }, 400);
                updatapoint(Bargaining_chip);
            }else if(score < Bargaining_chip){
                alert("點數不足");
            }
        }
    )
});
//拉霸AJAX
function updatapoint(Bargaining_chip){
    let cus_phone = '<?php echo $_SESSION['cus_phone'] ?>';
    $("#point").text(score-Bargaining_chip);
    $.ajax({
        type: "POST",
        url: "<?php echo Bang\Lib\Url::Action('updatapoint','MemberControllers') ?>",
        data:  {"cus_phone":cus_phone,"Bargaining_chip":Bargaining_chip},
        dataType:"text",
        success: function (response) {
            let data = JSON.parse(response);
            score = data[0];//點數
            setTimeout(function(){ $("#box1").removeClass("rotate"); $("#box1").css("margin-top",data[1]*(-140))}, 1600);
            setTimeout(function(){ $("#box2").removeClass("rotate"); $("#box2").css("margin-top",data[2]*(-140))}, 1700);
            setTimeout(function(){ $("#box3").removeClass("rotate"); $("#box3").css("margin-top",data[3]*(-140))}, 1800);
            //轉完後才執行
            setTimeout(function(){
                $(".result_msg_box").animate({ top: 0,easing: 'easeOutBounce'},2000);
                setTimeout(function(){$(".result_msg_box").animate({ top: -100,easing: 'easeOutBounce'},2000);lock = false;},3000)
                $(".result_msg").text(data[4]);
                if(score - $("#point").text() > 0){
                    $(".record_game_info").append(`
                    <p><span>${number_of_times}</span><span>${Bargaining_chip}</span><span style="color:green;">+${score - $("#point").text()}</span></p>
                    `);
                }else{
                    $(".record_game_info").append(`
                    <p><span>${number_of_times}</span><span>${Bargaining_chip}</span><span style="color:red;">-${Bargaining_chip}</span></p>
                    `);
                }
                number_of_times++;
                $("#point").text(score);
                if(score<50){
                $("#buttom10").attr("class","btn");
                $("#buttom50").attr("class","slotMachineButton");
                $("#buttom100").attr("class","slotMachineButton");
                bt10 = true;
                bt50 = false;
                bt100 = false;
                }else if(score >= 50 && score < 100){
                    $("#buttom10").attr("class","slotMachineButton");
                    $("#buttom50").attr("class","btn");
                    $("#buttom100").attr("class","slotMachineButton");
                    bt10 = false;
                    bt50 = true; 
                    bt100 = false;
                }
            },1800);
        }
    });
}
function SelectTag(tag1,tag2,tag3,tag4,block,none1,none2,none3){
    $(tag1).css("background-color","#6bbc64")
    $(tag1).css("color","white")
    $(tag1).css("border","none")
    
    $(tag2).css("background-color","white")
    $(tag2).css("color","#6bbc64")
    $(tag2).css("border","2px solid #6bbc64")

    $(tag3).css("background-color","white")
    $(tag3).css("color","#6bbc64")
    $(tag3).css("border","2px solid #6bbc64")

    $(tag4).css("background-color","white")
    $(tag4).css("color","#6bbc64")
    $(tag4).css("border","2px solid #6bbc64")

    $(block).css("display","block")
    $(none1).css("display","none")
    $(none2).css("display","none")
    $(none3).css("display","none")
}

$("#member_info_btn").click(function(){
    SelectTag("#member_info_btn","#chase_order_btn","#leave_message_btn","#game_btn","#member_page_info","#chase_order","#leave_message_box","#game_box")
})

$("#chase_order_btn").click(function(){
    SelectTag("#chase_order_btn","#member_info_btn","#leave_message_btn","#game_btn","#chase_order","#member_page_info","#leave_message_box","#game_box")
})

$("#leave_message_btn").click(function(){
    SelectTag("#leave_message_btn","#member_info_btn","#chase_order_btn","#game_btn","#leave_message_box","#chase_order","#member_page_info","#game_box")
})

$("#game_btn").click(function(){
    SelectTag("#game_btn","#leave_message_btn","#member_info_btn","#chase_order_btn","#game_box","#leave_message_box","#chase_order","#member_page_info")
})

//修改個人資料按鈕
$("#edit_member_btn").click(function(){
    $(".member_info_show").each(function(){
        $(".member_info_show").css("display","none")
    })
    $(".member_info_edit").each(function(){
        $(".member_info_edit").css("display","inline-block")
    })
    $("#edit_member_btn").css("display","none")
    $("#member_info_btn_div").append(
        `<button id="edit_member_complete" style="font-size:30px;margin:0 10px 30px 10px;color:white;text-align:center;border:none;background-color:#6bbc64;padding:10px 15px;border-radius:10px;outline:none;cursor:pointer">完成</button>
        <button id="edit_member_cancel" style="font-size:30px;margin:0 10px 30px 10px;color:white;text-align:center;border:none;background-color:#959595;padding:10px 15px;border-radius:10px;outline:none;cursor:pointer">取消</button>`
    )

    //取消
    $("#edit_member_cancel").click(function(){
        location.reload()
    })
    //完成
    $("#edit_member_complete").click(function(){
        let member_data = {
            "cus_name" : $("#cus_name").val(),
            "cus_phone" : $("#cus_phone").val()
        }
        console.log(member_data)

        $.ajax({
            url: "<?php echo Bang\Lib\Url::Action('MemberUpdate','MemberControllers') ?>",   //後端的URL
            type: "POST",   //用POST的方式
            dataType: "json",   //response的資料格式
            cache: false,   //是否暫存
            data: member_data,
        })
        alert("修改完成，請重新登入")
        $('#logout_btn').click();
    })
});

//訂單
$("#order_search_btn").click(function(){


$.ajax({
        url: "<?php echo Bang\Lib\Url::Action('CheckOrder','OrderControllers') ?>",   //後端的URL
        type: "GET",   //用POST的方式
        dataType: "json",   //response的資料格式
        cache: false,   //是否暫存
        data: {cus_phone : $("#member_search_input").val()},
        success: function(resp) {  

            if(resp == false){
                    $("#order_check_div").html("")
                    $("#order_check_div").css("display","block")
                    $("#order_check_div").append(`<span>查無訂單資料</span>`)
                }else{ 
                    $("#order_check_div").html("")
                    for(i=0;i<resp.length;i++){
                        $("#order_check_div").css("display","flex")

                        if(resp[i]["ord_status"] == "未出貨"){
                            $("#order_check_div").append(`
                            <span>訂單編號 : <span id="ord_no_check" style="margin-right:25px">${resp[i]["ord_no"]}</span></span>
                            <span>訂單金額 : <span id="ord_price_check" style="margin-right:25px">${resp[i]["ord_price"]}</span> </span>
                            <span>訂單狀況 : <span id="ord_status_check">${resp[i]["ord_status"]}</span> </span>
                            <span id="cancel_ord${resp[i]["ord_no"]}" data-cancel_id=${resp[i]["ord_no"]} style="text-decoration:underline;text-decoration-color:maroon;cursor:pointer;margin-left:25px;color:maroon;font-size:36px">取消訂單</span>
                            <br>
                        `)
                            
                        $("#cancel_ord"+resp[i]["ord_no"]).click(function(){
                            console.log( $(this).data("cancel_id") )
                            let cancel_data = {
                            "ord_no" : $(this).data("cancel_id"),
                            "ord_status" : "取消"
                            }
                            $.ajax({
                                url: "<?php echo Bang\Lib\Url::Action('CancelOrder','OrderControllers') ?>",   //後端的URL
                                type: "POST",   //用POST的方式
                                dataType: "text",   //response的資料格式
                                cache: false,   //是否暫存
                                data: cancel_data,
                                success: function(resp) {
                                    alert(resp)
                                    location.reload()
                                },
                            })
                        })
                        }else{
                            $("#order_check_div").append(`
                            <span>訂單編號 : <span id="ord_no_check" style="margin-right:25px">${resp[i]["ord_no"]}</span></span>
                            <span>訂單金額 : <span id="ord_price_check" style="margin-right:25px">${resp[i]["ord_price"]}</span> </span>
                            <span>訂單狀況 : <span id="ord_status_check">${resp[i]["ord_status"]}</span> </span>
                            <br>`
                            )
                        }
                    }
                }
        },
    })
//AJAX
});
$("#leave_message").click(function () {
    let cus_phone =  "<?php echo $_SESSION['cus_phone']?>";
    let mes_content = $("#mes_content").val();
    let date = new Date();
    let now_date=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
    $.ajax({
        type: "GET",
        url: "<?php echo Bang\Lib\Url::Action('LeaveMessage','MemberControllers') ?>",
        data: {"cus_phone":cus_phone,"mes_content":mes_content,"now_date":now_date},
        dataType: "text",
        success: function (response) {
            if(response){
                alert("留言成功");
                location.reload();
            }else{
                alert("留言失敗");
                location.reload()
            }
        }
    });
});
function RenderMessage(){
    let cus_phone =  "<?php echo $_SESSION['cus_phone']?>";
    $.ajax({
        type: "GET",
        url: "<?php echo Bang\Lib\Url::Action('GetMemberMessage','MemberControllers') ?>",
        data: {"cus_phone":cus_phone},
        dataType: "json",
        success: function (response) {
            for(let i=0;i<response.length;i++){
                let reply_time;
                if(response[i]["reply_time"] == null){
                    reply_time="";
                }else{
                    reply_time=response[i]["reply_time"];
                }
                $("#reply_box").append(`
                <div style="position: relative;width:840px;margin: 10px 0 50px 0;height: 500px;">
                    <div style="position: absolute;z-index: 2;left: -40px;top: 5px;width: 0px;height: 0px;border-top: 45px solid rgb(163 220 158);border-left: 50px solid rgb(0 0 0 / 0%);"></div>
                    <div style="width: 85%;height: 250px;background: #7fce78b8;margin: 5px 0;padding: 10px;border-radius: 10px;">
                        <div style="font-size: 40px;"><?php echo $_SESSION['cus_name'] ?><div style="position: absolute;top: 15px;right: 145px;">`+response[i]["leave_time"]+`</div></div>
                        <textarea cols="30" rows="10" style="border: none;box-sizing: border-box;padding: 5px;width: 99%;height: 160px;margin: 10px 0px;resize: none;font-size: 35px;outline: none;" readonly="">`+response[i]["mes_content"]+`</textarea>
                    </div>
                    <div style="position: absolute;right: -40px;z-index: 2;bottom: 190px;width: 0px;height: 0px;border-top: 45px solid rgb(163 220 158);border-right: 50px solid transparent;"></div>
                    <div style="width: 85%;height: 250px;background: #7fce78b8;right: 0;position: absolute;margin: 5px 0;padding: 10px;border-radius: 10px;">
                        <div style="font-size: 40px;text-align: end;">管理員<div style="position: absolute;top: 15px;left: 25px;">`+reply_time+`</div></div>
                        <textarea cols="30" rows="10" style="border: none;box-sizing: border-box;padding: 5px;width: 99%;height: 160px;margin: 10px 0px;resize: none;outline: none;font-size: 35px;" readonly="">`+response[i]["administrator_Reply"]+`</textarea>
                    </div>
                </div>
                `)
            }
        }
    });
}
</script>
