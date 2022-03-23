$("#back").click(function(){
    history.back()
})

$.ajax({
    url: "/frontVue/index.php?action=CartRender&controller=CartControllers",
    type: "GET",
    dataType: "text",
    cache: false,
    success: function(res) {
        if(JSON.parse(res) != null){
            let render_data = JSON.parse(res)
            //渲染資料
            for(i=0;i<render_data.length;i++){
                let render_img = JSON.parse(render_data[i].pro_img)
                ord_content.innerHTML += 
                `
                <div class="each_product" data-pro_no="${render_data[i].pro_no}">
                    <div style="width:20%;display:inline-block">
                        <img src="${render_img["img_01"]} " style="width:100%" alt="">
                    </div>
                    <span>${render_data[i].pro_name}</span>
                    <span>NT$
                        <span class="each_price each_price_check">${render_data[i].pro_price}</span>
                    </span>
                    <span class="del_in_check" style="font-size:32px;color:maroon;cursor:pointer" data-orditem_no="${render_data[i].orditem_no}">&times</span>
                </div> 
                `;
                //計算總合
                CountPrice()

                $(".del_in_check").each(function(){
                    $(this).on("click",function(){
                        let delete_orditem_no = this.dataset.orditem_no
                        $.ajax({
                            url: "/frontVue/index.php?action=DeleteCart&controller=CartControllers",   //後端的URL
                            type: "POST",
                            dataType: "json",
                            cache: false,
                            data: {"orditem_no":delete_orditem_no},
                            success: function(res) {
                                console.log("已刪除資料 ");
                            }
                        });
                        $(this).parent().remove()
                        CountPrice()
                    })
                })
            }
        }else{
            ord_content.innerHTML = "購物車內沒有商品";
        }
    }
});

$("#final_check").click(function(){
    if($(".each_product").length == 0){
        alert("尚未選購商品，快去購物!")
    }else if($("#ord_name").val() == "" || $("#ord_address").val() == "" || $("#ord_phone").val() == ""){
        alert("請填寫完整")
    }else{
        let date = new Date();
        let now_date=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
        let pro_no = "";
        for(let i=0;i<$(".each_product").length;i++){
            if(i+1 != $(".each_product").length){
                pro_no += $(".each_product").eq(i).attr("data-pro_no")+" ";
            }else{
                pro_no += $(".each_product").eq(i).attr("data-pro_no");
            }
        }
        if($("#cvs_address").text() != ""){
            order_data = {
                "ord_price":$("#total_price").text(),
                "ord_address":$("#cvs_address").text()+"("+$("#cvs_store_name").text()+")",
                "ord_phone":$("#ord_phone").val(),
                "now_date":now_date,"pro_no":pro_no
            }
        }else{
            order_data = {
                "ord_price":$("#total_price").text(),
                "ord_address":$("#ord_address").val(),
                "ord_phone":$("#ord_phone").val(),
                "now_date":now_date,"pro_no":pro_no
            }
        }
        $.ajax({
        url: "/frontVue/index.php?action=CreateOrder&controller=OrderControllers",   //後端的URL
        type: "POST",
        dataType: "text",
        data:order_data,
        cache: false,
        success: function(res){
            if(res){
                if($("#use-point").val() != ""){
                    UsePoint();
                    CleanCart();
                }
                else{
                    EarnPoint();
                    CleanCart();
                }
            }else{
                console.log(false);
            }
        }
        });
    }
});
function CleanCart(res){
    $.ajax({
    url: "/frontVue/index.php?action=CleanCart&controller=CartControllers",   //後端的URL
    type: "GET",
    dataType: "text",
    cache: false,
    success: function(){
        alert("結帳完成");
        location.reload();
        }
    });
}

function CountPrice(){
    var total = 0;
    $(".each_price_check").each(function(){
        total += parseInt($(this).text())
    });
    $('#total_price').text(total);
    CountPoint(total)
}

function EarnPoint(){
    $.ajax({
    url: "/frontVue/index.php?action=EarnPoint&controller=MemberControllers",   //後端的URL
    type: "GET",
    dataType: "text",
    cache: false,
    data:{
        "ord_price":$("#total_price").text(),
        "cus_phone":$("#ord_phone").val()},
    });
}
function UsePoint(){
    $.ajax({
    url: "/frontVue/index.php?action=UsePoint&controller=MemberControllers",   //後端的URL
    type: "GET",
    dataType: "text",
    cache: false,
    data:{
        "use_point":$("#use-point").val(),
        "cus_phone":$("#ord_phone").val()},
    });
}
function CountPoint(total){
    //點數折扣
    $("#use-point").keyup(function(){     
        if( parseInt($("#use-point").val()) > parseInt($("#point-have").text())){
            alert("沒那麼多點數")
            $("#use-point").val("0")
        }else if($("#use-point").val() == ""){
            $('#total_price').text(total);
        }else{
            let total_discount = total - parseInt($("#use-point").val())
            $('#total_price').text(total_discount);  
        }
    })
}
$("#ecpay").click(function(){
    if($(".each_product").length == 0){
        alert("尚未選購商品，快去購物!")
    }else if($("#ord_name").val() == "" || $("#ord_address").val() == "" || $("#ord_phone").val() == ""){
        alert("請填寫完整")
    }else{
        let pro_info = new Array();
        let pro_no = "";
        for(let i=0;i<$(".each_product").length;i++){
            if(i+1 != $(".each_product").length){
                pro_no += $(".each_product").eq(i).attr("data-pro_no")+" ";
            }else{
                pro_no += $(".each_product").eq(i).attr("data-pro_no");
            }
            let pro_name = $(".each_product").eq(i).children("span").eq(0).html();
            let pro_price = $(".each_product").eq(i).children("span").children("span").html();
            pro_info[i] = new Array();
            pro_info[i] = [pro_name,pro_price,1];
        }
        console.log(pro_no);
        console.log("sdf");
        $.ajax({
        url: "/frontVue/index.php?action=Ecpay&controller=OrderControllers",   //後端的URL
        type: "POST",
        dataType: "text",
        data:{"ord_price":$("#total_price").text(),"pro_info":pro_info,"pro_no":pro_no,"ord_phone":$("#ord_phone").val(),"ord_address":$("#ord_address").val()},
        cache: false,
        success: function(res){
            if(res){
                if($("#use-point").val() != ""){
                    UsePoint();
                }
                else{
                    EarnPoint();
                }
                $("#box_ecpay").append(res);
            }else{
                console.log(false);
            }
        }
        });
    }
})
$("#print").click(function (e) { 
    window.print(); 
});
let carry_on_hit_count=1;
$("#carry_on").click(function (e) {
    if(carry_on_hit_count == 1){
        carry_on_hit_count++;
        alert("請詳記代碼/條碼!");
    }else{
        location.href = "/frontVue/index.php?action=product&controller=Home";
    }
});

