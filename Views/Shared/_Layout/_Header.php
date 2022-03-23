
<div id="all_header">
<div class="header">
	<div style="width:15%;height:20px"></div>

	<div class="headerbtn">
		<a href="<?php echo Bang\Lib\Url::Action('product') ?>">
			<div class="headerbtn_desert">
				<img src="Content/img/focus.png" alt="">蔬菜零食</div>
		</a>
		<a href="<?php echo Bang\Lib\Url::Action('product2') ?>">
		<div class="headerbtn_vegetable"> <img src="Content/img/focus.png" alt="">蔬菜粉粉</div>
		</a>
		<a href="<?php echo Bang\Lib\Url::Action('benefitpage') ?>">
			<div class="headerbtn_benefit_page"> <img src="Content/img/focus.png" alt="">蔬菜功效</div>
			</a>
		<a href="<?php echo Bang\Lib\Url::Action('QA') ?>">
		<div class="headerbtn_QA"> <img src="Content/img/focus.png" alt="">常見問題</div>
		</a>
		<a href="<?php echo Bang\Lib\Url::Action('member') ?>">
		<div class="headerbtn_formember"> <img src="Content/img/focus.png" alt="">會員獨享</div>
		</a>
		<a href="<?php echo Bang\Lib\Url::Action('MemberPage') ?>">
		<div class="headerbtn_member_center"> <img src="Content/img/focus.png" alt="">會員中心</div>
		</a>
	</div>

	<div class="carandmember">
		<button type="button" class="headerbtn_shopcar">
			<a href="#">
				<img src="Content/img/icon/shopcar.svg" alt="shopcar">
			</a>
			<div id="atchint">  
				<!-- 購物車上的圓點 -->
			</div>
			<a href="#">
				<img src="Content/img/icon/shopcar_rwd.png" alt="shopcar">
			</a>
		</button>
		<button class="headerbtn_member">
			<a href="<?php echo Bang\Lib\Url::Action('login') ?>">
				<img src="Content/img/icon/member.svg" alt="member">
			</a>
			<a href="<?php echo Bang\Lib\Url::Action('login') ?>">
				<img src="Content/img/icon/member_rwd.png" alt="member">
			</a>
		</button>
<?php 
	if(isset($_SESSION['cus_name'])){
		echo'
			<button class="headerbtn_member">
				<form action="" method="POST">
					<input id="logout_btn" type="submit" value="登出" style="border:none;background-color:#FF5151;color:white;padding:5px;border-radius:10px;font-size:12px"></input>
					<input type="hidden" name="logout" value="true"/>
				</form>
			</button>';
	};
?>
	</div>
</div>
<!-- <div class="banner_line">
	<img src="Content/img/banner_line.png" alt="" id="banner_line">
</div> -->
</div>
	<?php 
	if (isset($_POST['logout']) && $_POST['logout'] == "true"){
		unset($_SESSION['cus_name']);
		unset($_SESSION['cus_id']);
		unset($_SESSION['cus_phone']);
		unset($_SESSION['cus_password']);
		unset($_SESSION['cus_point']);
		echo "<script>;
		location.href = window.location.href
		</script>";
		;
	}
	?>

<div class="logo">
	<a href="<?php echo Bang\Lib\Url::Action('index') ?>" id="logoa">
		<img src="Content/img/logoBg3.png" alt="logo">
	</a>
</div>

<img src="Content/img/cabegepic.png" alt="" id="p1" class="big_veg_pic">
<img src="Content/img/carrotpic.png" alt="" id="p2" class="big_veg_pic">
<!-- <img src="Content/img/pumpkinpic.png" alt="" id="p3" class="big_veg_pic"> -->
<img src="Content/img/vegetablepic.png" alt="" id="p4" class="big_veg_pic">

<div id="bgc"></div>
<div id="fullpage">
