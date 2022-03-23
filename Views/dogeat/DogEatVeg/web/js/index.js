// 3/25 saved

window.addEventListener('load',function(){


  // $(function() {
  //   // $('#loading').delay(3000).slideUp();
  //   $('#loading').delay(4000).fadeOut();
  // })


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



// 首頁banner下方彈出
$(function(){
    AOS.init();
  });
// 首頁banner下方彈出


//  點擊加入購物車出現圓點 
    let atchint = document.getElementById('atchint');
    let atc = document.getElementsByClassName('atc')

    for(let i=0;i<atc.length;i++){
      atc[i].addEventListener('click',function(){
        atchint.style.opacity = '1'
        alert('已加入購物車!')
      })
    }
//  點擊加入購物車出現圓點    

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



    //   tlmax.from('.menup1', .1, {
    //     x: 500,
    //     ease: Bounce.easeOut,
    // }).from('.menup2', .1, {
    //     x: -500,
    //     ease: Bounce.easeOut,
    // }).from('.menup5', .1, {
    //     x: 500,
    //     ease: Bounce.easeOut,
    // }).from('.menup4', .1, {
    //     x: -500,
    //     ease: Bounce.easeOut,
    // }).from('.menup5', .1, {
    //     x: 500,
    //     ease: Bounce.easeOut,
    // }).from('.menup6', .1, {
    //     x: -500,
    //     ease: Bounce.easeOut,
    // }).from('.menup7', .1, {
    //     x: 500,
    //     ease: Bounce.easeOut,
    // }).from('.menup8', .1, {
    //     x: -500,
    //     ease: Bounce.easeOut,
    // }).from('.menup9', .1, {
    //     x: 500,
    //     ease: Bounce.easeOut,
    // })

      }
        
      setTimeout(function(){
        burclick = true;
        }, 1000);
      }
    });
// 漢堡





// 燈箱
// let cardimg = document.getElementsByClassName('cardimg')
// let lightbox_out = document.getElementsByClassName('lightbox_out')
// let lightbox_in = document.getElementsByClassName('lightbox_in')
// let close = document.getElementById("close")
// let lightbox_right = document.getElementsByClassName("lightbox_right")
// var bodylock = document.getElementsByTagName('body')


// for(i=0;i<cardimg.length;i++){
//     cardimg[i].addEventListener("click",lightbox)
// }
// function lightbox(){
//     lightbox_out[0].classList.toggle("-lightboxopen")
//     lightbox_in[0].classList.toggle("-lightboxopen2")
//     close.style.display = "block"
//     lightbox_right[0].style.display = "block"
//     if(innerWidth <= 1024 ){
//       bodylock[0].classList.toggle("-bodylock")
//       }
// }

// close.addEventListener("click",function(){
//     lightbox_out[0].classList.toggle("-lightboxopen")
//     lightbox_in[0].classList.toggle("-lightboxopen2")
//     if(innerWidth <= 1024 ){
//       bodylock[0].classList.toggle("-bodylock")
//       }
// });

// 燈箱



  });




