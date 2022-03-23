/*購物車*/
let each_price;
let price_sum
let incarout
let incar 
let atchint
document.addEventListener("DOMContentLoaded", function(){
    each_price = document.getElementsByClassName('each_price')
    price_sum = document.getElementById('price_sum')
    incarout = document.getElementById('incarout')
    incar = document.getElementsByClassName('incar')
    atchint = document.getElementById('atchint');
    RenderData();
});
//加入購物車資料庫
function AddToCartDatabase(pro_num){
    $.ajax({
        url: "/frontVue/index.php?action=CartAdd&controller=CartControllers",   //後端的URL
        type: "GET",
        dataType: "text",
        cache: false,
        data: {"pro_no":pro_num},
        success: function(res) {
            if(res == "true"){
                $("#CartPrompt").text("加入購物車成功");
                $("#CartPrompt").slideDown(500,function(){
                    $("#CartPrompt").slideUp(500);
                });
                RenderData(pro_num);
            }else{
                $("#CartPrompt").text("加入購物車失敗");
                $("#CartPrompt").slideDown(500,function(){
                    $("#CartPrompt").slideUp(500);
                });
            }
        }
    });
}
function CountPrice(){
    //計算金額總數
    let totalprice = parseInt(0);
    for(let k=0;k<each_price.length;k++){
        totalprice += parseInt(each_price[k].innerHTML)
    }
    price_sum.value = totalprice
    $(".delincar").click(function () {
        if($(this).parent().css("transform") == 'matrix(1, 0, 0, 1, 0, 0)' || $(this).parent().css("transform")=="none"){
            let delete_orditem_no = this.dataset.orditem_no
            $.ajax({
                url: "/frontVue/index.php?action=DeleteCart&controller=CartControllers",   //後端的URL
                type: "POST",
                dataType: "text",
                cache: false,
                data: {"orditem_no":delete_orditem_no},
                success: function(res) {
                    $("#CartPrompt").text("移除所選商品成功");
                    $("#CartPrompt").slideDown(500,function(){
                        $("#CartPrompt").slideUp(500);
                    });
                    atcHint()
                }
            });
            totalprice -= $(this).parent().children(".incartext").children(":last").children().text()
            price_sum.value = totalprice
            $(this).parent().remove()
            if(incar.length == 0){
                price_sum.value = parseInt(0);
                let color = "#000";
                if($(".incardiv").css("width")=="275px"){
                    color="#fff";
                }
                console.log($(this).parent().css("transform"));
                $("#incarout").append('<div style="text-align: center;font-size:65px">'+
                                    '<svg margin: 35px 0 0; fill="'+color+'" height="137.5px" viewBox="-3 0 512 512" width="137.5px" xmlns="http://www.w3.org/2000/svg"><path d="m494.925781 97.144531c-9.492187-10.839843-23.019531-16.8125-38.089843-16.8125h-113.785157v-65.332031c0-8.285156-6.714843-15-15-15h-80.332031c-8.285156 0-15 6.714844-15 15v65.332031h-140.316406l-3.667969-27.5c-3.953125-29.625-24.578125-52.832031-46.957031-52.832031h-26.777344c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h26.777344c4.8125 0 15.003906 10.175781 17.21875 26.796875l42.9375 322.039063c1.890625 14.195312 9.183594 27.484374 20.535156 37.421874 8.417969 7.371094 18.367188 12.273438 28.789062 14.324219-4.246093 7.808594-6.65625 16.753907-6.65625 26.25 0 30.421875 24.746094 55.167969 55.164063 55.167969s55.167969-24.746094 55.167969-55.167969c0-9.0625-2.210938-17.613281-6.101563-25.164062h78.601563c-3.890625 7.550781-6.101563 16.101562-6.101563 25.164062 0 30.421875 24.746094 55.167969 55.167969 55.167969 30.417969 0 55.164062-24.746094 55.164062-55.167969 0-9.0625-2.210937-17.613281-6.097656-25.164062h39.300782c8.28125 0 15-6.71875 15-15 0-8.285157-6.71875-15-15-15h-302.589844c-14.65625 0-28.671875-12.273438-30.609375-26.800781l-3.136719-23.535157h296.167969c14.320312 0 28.457031-5.472656 39.808593-15.40625 11.347657-9.9375 18.640626-23.230469 20.539063-37.425781l21.511719-161.367188c1.992187-14.941406-2.136719-29.144531-11.632813-39.988281zm-269.992187 359.6875c0 13.878907-11.289063 25.167969-25.167969 25.167969-13.875 0-25.164063-11.289062-25.164063-25.167969 0-13.875 11.289063-25.164062 25.164063-25.164062 13.878906 0 25.167969 11.289062 25.167969 25.164062zm176.734375 0c0 13.878907-11.289063 25.167969-25.167969 25.167969-13.875 0-25.164062-11.289062-25.164062-25.167969 0-13.875 11.289062-25.164062 25.164062-25.164062 13.878906 0 25.167969 11.289062 25.167969 25.164062zm-138.949219-426.832031h50.332031v65.160156c0 .058594-.007812.113282-.007812.171875 0 .058594.007812.117188.007812.175781v80.160157c0 8.28125 6.714844 15 15 15h5.289063l-44.558594 44.203125-44.558594-44.203125h3.496094c8.285156 0 15-6.71875 15-15zm214.101562 103.164062-21.511718 161.371094c-1.9375 14.523438-15.953125 26.796875-30.609375 26.796875h-300.167969l-28.128906-211h136.316406v50.335938h-24.917969c-6.078125 0-11.554687 3.667969-13.867187 9.285156-2.316406 5.621094-1.011719 12.082031 3.304687 16.363281l80.980469 80.332032c2.921875 2.902343 6.742188 4.351562 10.5625 4.351562s7.640625-1.449219 10.5625-4.351562l80.980469-80.332032c4.316406-4.28125 5.621093-10.742187 3.304687-16.363281-2.3125-5.617187-7.789062-9.285156-13.867187-9.285156h-26.710938v-50.335938h113.785157c6.296874 0 11.808593 2.335938 15.519531 6.574219 3.710937 4.242188 5.296875 10.015625 4.464843 16.257812zm0 0"/></svg>'+
                                    '<p style="color:'+color+'">快去選購商品吧~</p>'+
                                    '</div>');
            }
        }
    })
    
}
//渲染購物車
function RenderData(){
    $.ajax({
        url: "/frontVue/index.php?action=CartRender&controller=CartControllers",
        type: "GET",
        dataType: "text",
        cache: false,
        success: function(res) {

            let render_data = JSON.parse(res)

            incarout.innerHTML="";
            if(render_data != null){
                for(let i=0;i<render_data.length;i++){
                    let render_img = JSON.parse(render_data[i].pro_img)
                    incarout.innerHTML += 
                    `
                    <div class="incar ">
                        <img src="${render_img["img_01"]}" style="width:100px"></img>
                        <div class="incartext" >
                            <span>${render_data[i].pro_name}</span><br>
                            <span>NT$<span><span class="each_price">${render_data[i].pro_price} </span>
                        </div>
                        <div class="delincar" data-orditem_no="${render_data[i].orditem_no}">
                        <img src="./Content/img/delete.svg" class="delete_img">
                        </div>
                    </div>
                    `;
                }
                swip();
                CountPrice();      
                atcHint() 
            }else{
                document.getElementById('price_sum').value = parseInt(0);
                console.log("購物車沒東西");
                let color = "#000";
                if($(".incardiv").css("width")=="275px"){
                    color="#fff";
                }
                $("#incarout").append('<div style="text-align: center;font-size:65px">'+
                                    '<svg margin: 35px 0 0; fill="'+color+'" height="137.5px" viewBox="-3 0 512 512" width="137.5px" xmlns="http://www.w3.org/2000/svg"><path d="m494.925781 97.144531c-9.492187-10.839843-23.019531-16.8125-38.089843-16.8125h-113.785157v-65.332031c0-8.285156-6.714843-15-15-15h-80.332031c-8.285156 0-15 6.714844-15 15v65.332031h-140.316406l-3.667969-27.5c-3.953125-29.625-24.578125-52.832031-46.957031-52.832031h-26.777344c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h26.777344c4.8125 0 15.003906 10.175781 17.21875 26.796875l42.9375 322.039063c1.890625 14.195312 9.183594 27.484374 20.535156 37.421874 8.417969 7.371094 18.367188 12.273438 28.789062 14.324219-4.246093 7.808594-6.65625 16.753907-6.65625 26.25 0 30.421875 24.746094 55.167969 55.164063 55.167969s55.167969-24.746094 55.167969-55.167969c0-9.0625-2.210938-17.613281-6.101563-25.164062h78.601563c-3.890625 7.550781-6.101563 16.101562-6.101563 25.164062 0 30.421875 24.746094 55.167969 55.167969 55.167969 30.417969 0 55.164062-24.746094 55.164062-55.167969 0-9.0625-2.210937-17.613281-6.097656-25.164062h39.300782c8.28125 0 15-6.71875 15-15 0-8.285157-6.71875-15-15-15h-302.589844c-14.65625 0-28.671875-12.273438-30.609375-26.800781l-3.136719-23.535157h296.167969c14.320312 0 28.457031-5.472656 39.808593-15.40625 11.347657-9.9375 18.640626-23.230469 20.539063-37.425781l21.511719-161.367188c1.992187-14.941406-2.136719-29.144531-11.632813-39.988281zm-269.992187 359.6875c0 13.878907-11.289063 25.167969-25.167969 25.167969-13.875 0-25.164063-11.289062-25.164063-25.167969 0-13.875 11.289063-25.164062 25.164063-25.164062 13.878906 0 25.167969 11.289062 25.167969 25.164062zm176.734375 0c0 13.878907-11.289063 25.167969-25.167969 25.167969-13.875 0-25.164062-11.289062-25.164062-25.167969 0-13.875 11.289062-25.164062 25.164062-25.164062 13.878906 0 25.167969 11.289062 25.167969 25.164062zm-138.949219-426.832031h50.332031v65.160156c0 .058594-.007812.113282-.007812.171875 0 .058594.007812.117188.007812.175781v80.160157c0 8.28125 6.714844 15 15 15h5.289063l-44.558594 44.203125-44.558594-44.203125h3.496094c8.285156 0 15-6.71875 15-15zm214.101562 103.164062-21.511718 161.371094c-1.9375 14.523438-15.953125 26.796875-30.609375 26.796875h-300.167969l-28.128906-211h136.316406v50.335938h-24.917969c-6.078125 0-11.554687 3.667969-13.867187 9.285156-2.316406 5.621094-1.011719 12.082031 3.304687 16.363281l80.980469 80.332032c2.921875 2.902343 6.742188 4.351562 10.5625 4.351562s7.640625-1.449219 10.5625-4.351562l80.980469-80.332032c4.316406-4.28125 5.621093-10.742187 3.304687-16.363281-2.3125-5.617187-7.789062-9.285156-13.867187-9.285156h-26.710938v-50.335938h113.785157c6.296874 0 11.808593 2.335938 15.519531 6.574219 3.710937 4.242188 5.296875 10.015625 4.464843 16.257812zm0 0"/></svg>'+
                                    '<p style="color:'+color+'">快去選購商品吧~</p>'+
                                    '</div>');
            }      
        }
    })
    
}
//險是購物車上的商品數量
function atcHint(){
    if(incar.length == 0){
        atchint.style.opacity="0";
    }else{
        atchint.style.opacity="1";
        atchint.innerText=incar.length
    }
}
//網頁版開關購物車
$(function(){
    $("button.headerbtn_shopcar,#closecar").on("click", function(){
        $("#cardiv").toggleClass("-open");
    });
});
//手機版開關購物車
$(document).ready(function () {
    $("#cart_btn,.foot_btn_cart,.cart_close").click(function () {
        $('.shoppingCart_cardiv').toggleClass('cart_open');
    });
});
//滑動效果
function swip(){
    let pageXstart = 0;//按下的位置
    let slidelangth = 0;//移动的距离
    $('.incar').on({
        // 屏幕按下的x坐标
        touchstart:function(e){
            const touch = e.originalEvent.targetTouches[0];
            pageXstart = touch.pageX;
            const index = $(this).index()
            reloadX(index);
    
        },
        touchmove:function(e) {
            const touch = e.originalEvent.targetTouches[0];
            const x = touch.pageX;
            slidelangth= (x - pageXstart);
            if(x<pageXstart){
            if(slidelangth<120){
                slidelangth=0;
            }
            $(this).css('transform','translate('+slidelangth+'px)')
            }
            //右滑，距离大于于开始距离
            if(x>pageXstart){
            if(slidelangth>120){
                slidelangth=120;
            }
            $(this).css('transform','translate('+(slidelangth)+'px)')
            }
        },
        touchend:function(e){
            const touch = e.originalEvent.changedTouches[0];
            if(slidelangth<100){
            $(this).css('transform','translate(0)')
            }else{
            $(this).css('transform','translate(120px)')
            }
        }
    })
    //重置滑块
    function reloadX(i){
        $('.incar').each(function(){
        const index = $(this).index()
            if(index!==i){
                const style = $(this).css('transform');
                // 如果模块划出去了
                if(style!=='matrix(1, 0, 0, 1, 120, 0)'){
                $(this).css('transform','translate(120px)')
                }
            }
        })
    }
}
/*購物車*/
