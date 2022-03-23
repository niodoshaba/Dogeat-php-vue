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
  
  
  //   點擊購物車彈出左側欄
    let r1 = document.getElementById('r1')
    let r2 = document.getElementById('r2')
    let r3 = document.getElementById('r3')
    let r4 = document.getElementById('r4')
    let r5 = document.getElementById('r5')
    let r6 = document.getElementById('r6')
    let close1 = document.getElementById("close1")
    let close2 = document.getElementById("close2")
    // let close3 = document.getElementById("close3")
    
    close1.addEventListener("click",function(){
        r1.style.transform = "scale(1)"
        r1.style.zIndex = "5"
        r2.style.transform = "scale(1)"
        r2.style.zIndex = "5"
        r3.style.transform = "scale(1)"
        r3.style.zIndex = "5"
        r5.style.transform = "scale(1)"
        r5.style.zIndex = "5"
        r6.style.transform = "scale(1)"
        r6.style.zIndex = "5"
    })
    close2.addEventListener("click",function(){
        r1.style.transform = "scale(1)"
        r1.style.zIndex = "5"
        r2.style.transform = "scale(1)"
        r2.style.zIndex = "5"
        r3.style.transform = "scale(1)"
        r3.style.zIndex = "5"
        r5.style.transform = "scale(1)"
        r5.style.zIndex = "5"
        r6.style.transform = "scale(1)"
        r6.style.zIndex = "5"
    })
    // close3.addEventListener("click",function(){
    //     r1.style.transform = "scale(1)"
    //     r1.style.zIndex = "5"
    //     r2.style.transform = "scale(1)"
    //     r2.style.zIndex = "5"
    //     r3.style.transform = "scale(1)"
    //     r3.style.zIndex = "5"
    //     r5.style.transform = "scale(1)"
    //     r5.style.zIndex = "5"
    //     r6.style.transform = "scale(1)"
    //     r6.style.zIndex = "5"
    // })



    r1.addEventListener("click",function(){

        r1.style.transform = "scale(1.7)"
        r1.style.zIndex = "15"
        r2.style.transform = "scale(1)"
        r2.style.zIndex = "5"
        r3.style.transform = "scale(1)"
        r3.style.zIndex = "5"
        r5.style.transform = "scale(1)"
        r5.style.zIndex = "5"
        r6.style.transform = "scale(1)"
        r6.style.zIndex = "5"

        if(innerWidth <= 576 ){
            r1.style.transform = "scale(1.3)" }

    })
    r2.addEventListener("click",function(){
        r1.style.transform = "scale(1)"
        r1.style.zIndex = "5"
        r2.style.transform = "scale(1.7)"
        r2.style.zIndex = "15"
        r3.style.transform = "scale(1)"
        r3.style.zIndex = "5"
        r5.style.transform = "scale(1)"
        r5.style.zIndex = "5"
        r6.style.transform = "scale(1)"
        r6.style.zIndex = "5"
        
        if(innerWidth <= 576 ){
            r2.style.transform = "scale(1.3)" }
    })
    r3.addEventListener("click",function(){
        r1.style.transform = "scale(1)"
        r1.style.zIndex = "5"
        r2.style.transform = "scale(1)"
        r2.style.zIndex = "5"
        r3.style.transform = "scale(1.7)"
        r3.style.zIndex = "15"
        r5.style.transform = "scale(1)"
        r5.style.zIndex = "5"
        r6.style.transform = "scale(1)"
        r6.style.zIndex = "5"

        if(innerWidth <= 576 ){
            r3.style.transform = "scale(1.3)" }
    })
    r5.addEventListener("click",function(){
        r1.style.transform = "scale(1)"
        r1.style.zIndex = "5"
        r2.style.transform = "scale(1)"
        r2.style.zIndex = "5"
        r3.style.transform = "scale(1)"
        r3.style.zIndex = "5"
        r5.style.transform = "scale(1.7)"
        r5.style.zIndex = "15"
        r6.style.transform = "scale(1)"
        r6.style.zIndex = "5"

        if(innerWidth <= 576 ){
            r5.style.transform = "scale(1.3)" }
    })
    r6.addEventListener("click",function(){
        r1.style.transform = "scale(1)"
        r1.style.zIndex = "5"
        r2.style.transform = "scale(1)"
        r2.style.zIndex = "5"
        r3.style.transform = "scale(1)"
        r3.style.zIndex = "5"
        r5.style.transform = "scale(1)"
        r5.style.zIndex = "5"
        r6.style.transform = "scale(1.7)"
        r6.style.zIndex = "15"

        if(innerWidth <= 576 ){
            r6.style.transform = "scale(1.3)" }
    })

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

    })
