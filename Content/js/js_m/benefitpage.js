
$(".benefit_tag").each(function(i){
    $(this).click(function(){
        $(".benefit_tag").css("transform","translateY(0%)")
        $(".benefit_tag:eq("+i+")").css("transform","translateY(20%)")

        $(".benefit_switch").css("opacity","0")
        $(".benefit_switch:eq("+i+")").css("opacity","1")
        
        $(".benefit_veg_pic").css("opacity","0")
        $(".benefit_veg_pic:eq("+i+")").css("opacity","1")

        $(".benefitpage_down").css("opacity","0")
        $(".benefitpage_down:eq("+i+")").css("opacity","1")
    })
})