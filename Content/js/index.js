window.addEventListener('load',function(){

// $(function(){
//     AOS.init();
//   });
const $section = $('.section');

var numOfPages = $section.length - 1, //取得section的數量
curPage = 0, //初始頁
scrollLock = false;

function scrollPage() {
//滑鼠滾動
$(document).on("mousewheel DOMMouseScroll", function(e) {
if (scrollLock) return;
if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0)
navigateUp();
else
navigateDown();
});
//鍵盤上下鍵
$(document).on("keydown", function(e) {
if (scrollLock) return;
if (e.which === 38)
navigateUp();
else if (e.which === 40)
navigateDown();
});
}

function pagination(curPage) {
scrollLock = true;
if(curPage === 0){
  $("#fullpage").animate({
    scrollTop: "0px"
    }, 500, 'swing', function(){
    scrollLock = false;
    });
}
if(curPage === 1){
  $("#fullpage").animate({
    scrollTop: "780px"
    }, 500, 'swing', function(){
    scrollLock = false;
    });
}
if(curPage === 2){
  $("#fullpage").animate({
    scrollTop: "1560px"
    }, 500, 'swing', function(){
    scrollLock = false;

    });
}

};

function navigateUp () {
if (curPage === 0) return;
curPage--;
$(".section").css("opacity","0")
$(".section:eq("+curPage+")").css("opacity","1")
pagination(curPage);
};

function navigateDown() {
if (curPage === numOfPages) return;
curPage++;
$(".section").css("opacity","0")
$(".section:eq("+curPage+")").css("opacity","1")
pagination(curPage);
};


$(function() {
scrollPage();
});


  });




