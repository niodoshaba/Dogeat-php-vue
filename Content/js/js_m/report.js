window.addEventListener('load',function(){

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
})