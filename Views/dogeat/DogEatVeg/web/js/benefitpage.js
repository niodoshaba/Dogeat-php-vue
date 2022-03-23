// 3/25 saved

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

    let bnftag1 = document.getElementById('bnftag1');
    let bnftag2 = document.getElementById('bnftag2');
    let bnftag3 = document.getElementById('bnftag3');
    let bnftag4 = document.getElementById('bnftag4');
    let bnftag1rwd = document.getElementById('bnftag1rwd')
    let bnftag2rwd = document.getElementById('bnftag2rwd')
    let bnftag3rwd = document.getElementById('bnftag3rwd')
    let bnftag4rwd = document.getElementById('bnftag4rwd')
    
    bnftag1.addEventListener("click",function(){
      bnftag1.style.transform = 'translateX(0%)';
      bnftag2.style.transform = 'translateX(-20%)';
      bnftag3.style.transform = 'translateX(-20%)';
      bnftag4.style.transform = 'translateX(-20%)';
      switchdiv1.style.opacity = '1';
      switchdiv2.style.opacity = '0';
      switchdiv3.style.opacity = '0';
      switchdiv4.style.opacity = '0';
      vegetable_pic1.style.opacity ='1'
      vegetable_pic2.style.opacity ='0'
      vegetable_pic3.style.opacity ='0'
      vegetable_pic4.style.opacity ='0'
      benefitpage_down1.style.transform='translateY(0)'
      benefitpage_down2.style.transform='translateY(0)'
      benefitpage_down3.style.transform='translateY(0)'
      benefitpage_down4.style.transform='translateY(0)'
      benefitpage_down1.style.opacity='1'
      benefitpage_down2.style.opacity='0'
      benefitpage_down3.style.opacity='0'
      benefitpage_down4.style.opacity='0'
    });

    bnftag2.addEventListener("click",function(){
      bnftag1.style.transform = 'translateX(-20%)';
      bnftag2.style.transform = 'translateX(0%)';
      bnftag3.style.transform = 'translateX(-20%)';
      bnftag4.style.transform = 'translateX(-20%)';
      switchdiv1.style.opacity = '0';
      switchdiv2.style.opacity = '1';
      switchdiv3.style.opacity = '0';
      switchdiv4.style.opacity = '0';
      vegetable_pic1.style.opacity ='0'
      vegetable_pic2.style.opacity ='1'
      vegetable_pic3.style.opacity ='0'
      vegetable_pic4.style.opacity ='0'
      benefitpage_down1.style.transform='translateY(-100%)'
      benefitpage_down2.style.transform='translateY(-100%)'
      benefitpage_down3.style.transform='translateY(-100%)'
      benefitpage_down4.style.transform='translateY(-100%)'
      benefitpage_down1.style.opacity='0'
      benefitpage_down2.style.opacity='1'
      benefitpage_down3.style.opacity='0'
      benefitpage_down4.style.opacity='0'
    });

    bnftag3.addEventListener("click",function(){
      bnftag1.style.transform = 'translateX(-20%)';
      bnftag2.style.transform = 'translateX(-20%)';
      bnftag3.style.transform = 'translateX(0%)';
      bnftag4.style.transform = 'translateX(-20%)';
      switchdiv1.style.opacity = '0';
      switchdiv2.style.opacity = '0';
      switchdiv3.style.opacity = '1';
      switchdiv4.style.opacity = '0';
      vegetable_pic1.style.opacity ='0'
      vegetable_pic2.style.opacity ='0'
      vegetable_pic3.style.opacity ='1'
      vegetable_pic4.style.opacity ='0'
      benefitpage_down1.style.transform='translateY(-200%)'
      benefitpage_down2.style.transform='translateY(-200%)'
      benefitpage_down3.style.transform='translateY(-200%)'
      benefitpage_down4.style.transform='translateY(-200%)'
      benefitpage_down1.style.opacity='0'
      benefitpage_down2.style.opacity='0'
      benefitpage_down3.style.opacity='1'
      benefitpage_down4.style.opacity='0'
    });

    bnftag4.addEventListener("click",function(){
      bnftag1.style.transform = 'translateX(-20%)';
      bnftag2.style.transform = 'translateX(-20%)';
      bnftag3.style.transform = 'translateX(-20%)';
      bnftag4.style.transform = 'translateX(0%)';
      switchdiv1.style.opacity = '0';
      switchdiv2.style.opacity = '0';
      switchdiv3.style.opacity = '0';
      switchdiv4.style.opacity = '1';
      vegetable_pic1.style.opacity ='0'
      vegetable_pic2.style.opacity ='0'
      vegetable_pic3.style.opacity ='0'
      vegetable_pic4.style.opacity ='1'
      benefitpage_down1.style.transform='translateY(-300%)'
      benefitpage_down2.style.transform='translateY(-300%)'
      benefitpage_down3.style.transform='translateY(-300%)'
      benefitpage_down4.style.transform='translateY(-300%)'
      benefitpage_down1.style.opacity='0'
      benefitpage_down2.style.opacity='0'
      benefitpage_down3.style.opacity='0'
      benefitpage_down4.style.opacity='1'
    });
      bnftag1rwd.addEventListener("click",function(){
        bnftag1rwd.style.transform = 'translateY(0%)';
        bnftag2rwd.style.transform = 'translateY(-25%)';
        bnftag3rwd.style.transform = 'translateY(-25%)';
        bnftag4rwd.style.transform = 'translateY(-25%)';
        switchdiv1.style.opacity = '1';
        switchdiv2.style.opacity = '0';
        switchdiv3.style.opacity = '0';
        switchdiv4.style.opacity = '0';
        vegetable_pic1.style.opacity ='1'
        vegetable_pic2.style.opacity ='0'
        vegetable_pic3.style.opacity ='0'
        vegetable_pic4.style.opacity ='0'
        benefitpage_down1.style.transform='translateY(0)'
        benefitpage_down2.style.transform='translateY(0)'
        benefitpage_down3.style.transform='translateY(0)'
        benefitpage_down4.style.transform='translateY(0)'
        benefitpage_down1.style.opacity='1'
        benefitpage_down2.style.opacity='0'
        benefitpage_down3.style.opacity='0'
        benefitpage_down4.style.opacity='0'
      });
      bnftag2rwd.addEventListener("click",function(){
        bnftag1rwd.style.transform = 'translateY(-25%)';
        bnftag2rwd.style.transform = 'translateY(0%)';
        bnftag3rwd.style.transform = 'translateY(-25%)';
        bnftag4rwd.style.transform = 'translateY(-25%)';
        switchdiv1.style.opacity = '0';
        switchdiv2.style.opacity = '1';
        switchdiv3.style.opacity = '0';
        switchdiv4.style.opacity = '0';
        vegetable_pic1.style.opacity ='0'
        vegetable_pic2.style.opacity ='1'
        vegetable_pic3.style.opacity ='0'
        vegetable_pic4.style.opacity ='0'
        benefitpage_down1.style.transform='translateY(-0%)'
        benefitpage_down2.style.transform='translateY(-100%)'
        benefitpage_down3.style.transform='translateY(-100%)'
        benefitpage_down4.style.transform='translateY(-100%)'
        benefitpage_down1.style.opacity='0'
        benefitpage_down2.style.opacity='1'
        benefitpage_down3.style.opacity='0'
        benefitpage_down4.style.opacity='0'
      });
      bnftag3rwd.addEventListener("click",function(){
        bnftag1rwd.style.transform = 'translateY(-25%)';
        bnftag2rwd.style.transform = 'translateY(-25%)';
        bnftag3rwd.style.transform = 'translateY(0%)';
        bnftag4rwd.style.transform = 'translateY(-25%)';
        switchdiv1.style.opacity = '0';
        switchdiv2.style.opacity = '0';
        switchdiv3.style.opacity = '1';
        switchdiv4.style.opacity = '0';
        vegetable_pic1.style.opacity ='0'
        vegetable_pic2.style.opacity ='0'
        vegetable_pic3.style.opacity ='1'
        vegetable_pic4.style.opacity ='0'
        benefitpage_down1.style.transform='translateY(-200%)'
        benefitpage_down2.style.transform='translateY(-200%)'
        benefitpage_down3.style.transform='translateY(-200%)'
        benefitpage_down4.style.transform='translateY(-200%)'
        benefitpage_down1.style.opacity='0'
        benefitpage_down2.style.opacity='0'
        benefitpage_down3.style.opacity='1'
        benefitpage_down4.style.opacity='0'
      });
      bnftag4rwd.addEventListener("click",function(){
        bnftag1rwd.style.transform = 'translateY(-25%)';
        bnftag2rwd.style.transform = 'translateY(-25%)';
        bnftag3rwd.style.transform = 'translateY(-25%)';
        bnftag4rwd.style.transform = 'translateY(0%)';
        switchdiv1.style.opacity = '0';
        switchdiv2.style.opacity = '0';
        switchdiv3.style.opacity = '0';
        switchdiv4.style.opacity = '1';
        vegetable_pic1.style.opacity ='0'
        vegetable_pic2.style.opacity ='0'
        vegetable_pic3.style.opacity ='0'
        vegetable_pic4.style.opacity ='1'
        benefitpage_down1.style.transform='translateY(-300%)'
        benefitpage_down2.style.transform='translateY(-300%)'
        benefitpage_down3.style.transform='translateY(-300%)'
        benefitpage_down4.style.transform='translateY(-300%)'
        benefitpage_down1.style.opacity='0'
        benefitpage_down2.style.opacity='0'
        benefitpage_down3.style.opacity='0'
        benefitpage_down4.style.opacity='1'
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
        });
