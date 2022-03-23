window.addEventListener('load',function(){

    // let cardimg = document.getElementsByClassName('cardimg')
    // let lightbox_out = document.getElementById('lightbox_out')
    // let lightbox_in = document.getElementById('lightbox_in')
    // let close = document.getElementById("close")
    // let lightbox_right = document.getElementsByClassName("lightbox_right")
    var bodylock = document.getElementsByTagName('body')
    // let lightbox_product = ['菠菜雞胸乾','南瓜雞胸乾','胡蘿蔔雞胸乾','紫甘藍雞胸乾','彩虹雞胸乾','胡瓜雞胸乾','地瓜雞胸乾','芋頭雞胸乾']
    // let lightbox_title = document.getElementById('lightbox_title')
    // let lightbtn = document.getElementById('lightbtn')
    // let price = document.getElementsByClassName('price')
    let each_price = document.getElementsByClassName('each_price')
    let carclose = document.getElementById('closecar')
    let cardiv = document.getElementById('cardiv')
    let price_sum = document.getElementById('price_sum')
    // let paybtn = document.getElementById('paybtn')
    let incarout = document.getElementById('incarout')
    let delincar = document.getElementsByClassName('delincar')
    let incar = document.getElementsByClassName('incar')
    let atchint = document.getElementById('atchint');
    let atc = document.getElementsByClassName('atc')
    // let atc1 = document.getElementsByClassName('atc1')  
    // console.log($("#cus_id").text())

    RenderData();

 

  // 關閉購物車
    carclose.addEventListener('click',function(){
        cardiv.classList.toggle('-open')
    })

    $(".atc").click(function () { 
        let pro_num = $(this).attr("data-atcnum")-1;
        AddProductData(pro_num);
    });
    function AddProductData(pro_num){
        $.ajax({
            url: "/frontVue/index.php?action=Cart&controller=CartControllers",   //後端的URL
            type: "GET",
            dataType: "json",
            cache: false,
            success: function(info_cart){
              // 加入購物車資料庫
                add_to_cart = {
                    "pro_no":info_cart[pro_num].pro_no,
                    "pro_name":info_cart[pro_num].pro_name,
                    "pro_price":info_cart[pro_num].pro_price,
                    "pro_img":info_cart[pro_num].pro_img,
                }
                AddToCartDatabase(add_to_cart);
                RenderData(pro_num);
            }
        });
    }

    function AddToCartDatabase(add_to_cart){
        $.ajax({
            url: "/frontVue/index.php?action=CartAdd&controller=CartControllers",   //後端的URL
            type: "GET",
            dataType: "text",
            cache: false,
            data: add_to_cart,
            success: function(res) {
                $("#CartPrompt").text("加入購物車成功");
                $("#CartPrompt").slideDown(500,function(){
                    $("#CartPrompt").slideUp(500);
                });
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
        //計算刪減後總數
        for(let j=0;j<delincar.length;j++){
            delincar[j].addEventListener('click',function(){
                
            let delete_orditem_no = this.dataset.orditem_no
                // console.log(this.dataset.orditem_no)
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
                    }
                });

                totalprice -= $(this).next().next().children(":last").children(":last").text()
                price_sum.value = totalprice
                $(this).parent().remove()
                if(incar.length == 0){
                    price_sum.value = parseInt(0);
                    atchint.style.opacity = '0'
                }
            })
        }
    }

    function RenderData(i){
        $.ajax({
            url: "/frontVue/index.php?action=CartRender&controller=CartControllers",
            type: "GET",
            dataType: "text",
            cache: false,
            success: function(res) {
                //console.log(JSON.parse(res));
                let render_data = JSON.parse(res)
                incarout.innerHTML="";
                if(render_data != null){
                    for(i=0;i<render_data.length;i++){
                        incarout.innerHTML += 
                        `
                        <div class="incar ">
                            <div class="delincar" data-orditem_no="${render_data[i].orditem_no}">&times</div>
                            <img src="${render_data[i].pro_img}" style="width:100px"></img>
                            <div class="incartext" >
                                <span>${render_data[i].pro_name}</span><br>
                                <span>NT$<span><span class="each_price">${render_data[i].pro_price} </span>
                            </div>
                        </div>
                        `;
                    }
                    CountPrice();       
                }else{
                    console.log("購物車沒東西");
                }      
            }
        })
    }
// 燈箱

    // for(var i=0;i<cardimg.length;i++){
    //     cardimg[i].addEventListener("click",lightbox)
    // }

    // function lightbox(){
    //     lightbox_out.classList.toggle("-lightboxopen")
    //     lightbox_in.classList.toggle("-lightboxopen2")

    //     let lightbox_count = this.dataset.cardnumber;

    //     // console.log(lightbox_count)
    //     lightbox_pic.src = `./img/Heybogua/ch${lightbox_count}.png`
    //     lightbox_title.innerText = lightbox_product[lightbox_count-1];
    //     lightbtn.innerHTML += `
    //     <div class="cart atc1" data-atc1num="${lightbox_count}">加入購物車</div>
    //     <div class="takebill">直接結帳</div>`

    //     for(let i=0;i<atc1.length;i++){
    //       atc1[i].addEventListener('click',function(){
    //         atchint.style.opacity = '1'
    //         alert('已加入購物車!')
    //         let atc1count = this.dataset.atc1num
    //         // console.log(atccount)
    //         incarout.innerHTML +=
    //         `
    //         <div class="incar" id='incar${atc1count}'>
    //           <div class="delincar" data-delnum="${atc1count-1}">&times</div>
    //           <img src="./img/Heybogua/ch${atc1count}.png" alt="">
    //           <div class="incartext">
    //             <span>${lightbox_product[atc1count-1]}</span><br><span>NT$130 &times; 1 </span>
    //           </div>
    //         </div>
    //         `
    //         for(let j=0;j<delincar.length;j++){
    //           delincar[j].addEventListener('click',function(){
    //               $(this).parent().remove()
    //               if(incar.length == 0){
    //                 atchint.style.opacity = '0'
    //               }
    //           })
    //       }
    //       if(incar.length == 0){
    //         atchint.style.opacity = '0'
    //       }else{
    //         atchint.style.opacity = '1'
    //       }
    //       })
    //     }
        
    //     // console.log(lightbox_title[lightbox_count-1])


    //     close.style.display = "block"
    //     lightbox_right[0].style.display = "block"
    //     if(innerWidth <= 1024 ){
    //       bodylock[0].classList.toggle("-bodylock")
    //       }
    // }

    // close.addEventListener("click",function(){
    //     lightbox_out.classList.toggle("-lightboxopen")
    //     lightbox_in.classList.toggle("-lightboxopen2")
    //     close.style.display = "none"
    //     lightbox_right[0].style.display = "none"

    //     $(lightbtn).children().remove()

    //     if(innerWidth <= 1024 ){
    //       bodylock[0].classList.toggle("-bodylock")
    //       }
    // });
        
    // 燈箱

     // AOS彈出
     $(function(){
        AOS.init();
    });

  // 點擊購物車彈出左側欄  
    $(function(){
        $("button.headerbtn_shopcar").on("click", function(){
            $("#cardiv").toggleClass("-open");
        });
    });

    // 漢堡
    var hamburger_icon = document.getElementById("hamburger_icon");
    var hr1 = document.getElementById('hr1')
    var hr2 = document.getElementById('hr2')
    var hr3 = document.getElementById('hr3')
    var menubur = document.getElementsByClassName('menubur')
    var bodylock = document.getElementsByTagName('body')

    // var tlmax = new TimelineMax({});
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
});
