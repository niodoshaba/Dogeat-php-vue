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

    
// Wrap every letter in a span
var textWrapper = document.querySelector('.ml6 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml6 .letter',
    translateY: ["1.5em", 0],
    translateZ: 0,
    duration: 1000,
    delay: 1000,
  }).add({
    targets: '.ml6',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000,
  });

  var textWrapper2 = document.querySelector('.ml6 .letters2');
textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml6 .letter',
    translateY: ["1.5em", 0],
    translateZ: 0,
    duration: 750,
    delay: (el, i) => 50 * i
  }).add({
    targets: '.ml6',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });

    
    });


