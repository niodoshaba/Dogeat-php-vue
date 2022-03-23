// 3/25 saved

window.addEventListener('load',function(){

  let cir1 = document.getElementById("cir1")
  let cir2 = document.getElementById("cir2")
  let cir3 = document.getElementById("cir3")
  let cir4 = document.getElementById("cir4")
  let bdiv = document.getElementById("bdiv")

  cir1.addEventListener('click',function(){
    bdiv.style.transform = "translateX(0%)"
    cir1.style.backgroundColor = "#55A34D"
    cir2.style.backgroundColor = "white"
    cir3.style.backgroundColor = "white"
    cir4.style.backgroundColor = "white"
  })
  cir2.addEventListener('click',function(){
    bdiv.style.transform = "translateX(-50%)"
    cir1.style.backgroundColor = "white"
    cir2.style.backgroundColor = "#55A34D"
    cir3.style.backgroundColor = "white"
    cir4.style.backgroundColor = "white"
  })
  cir3.addEventListener('click',function(){
    bdiv.style.transform = "translateX(-100%)"
    cir1.style.backgroundColor = "white"
    cir2.style.backgroundColor = "white"
    cir3.style.backgroundColor = "#55A34D"
    cir4.style.backgroundColor = "white"
  })
  cir4.addEventListener('click',function(){
    bdiv.style.transform = "translateX(-150%)"
    cir1.style.backgroundColor = "white"
    cir2.style.backgroundColor = "white"
    cir3.style.backgroundColor = "white"
    cir4.style.backgroundColor = "#55A34D"
  })
})