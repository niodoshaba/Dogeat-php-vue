
<div id="header">
	<div id="hamburger">
		<div id="hamburger_line">
			<span class="hr" id="hr1"></span>
			<span class="hr" id="hr2"></span>   
			<span class="hr" id="hr3"></span>
		</div>
	</div>
	<ul id="menubur">
		<li class="menup menup2"><a href="<?php echo Bang\Lib\Url::Action('product') ?>">蔬菜零食</a></li>
		<li class="menup menup3"><a href="<?php echo Bang\Lib\Url::Action('benefitpage') ?>">蔬菜功效</a></li>
		<li class="menup menup4"><a href="<?php echo Bang\Lib\Url::Action('QA') ?>">常見問題</a></li>
		<li class="menup menup5"><a href="<?php echo Bang\Lib\Url::Action('member') ?>">會員獨享</a></li>
	</ul>
	<div id="title_logo">
		<a href="<?php echo Bang\Lib\Url::Action('index') ?>">
		<img src="Content/img/logo.png" alt="">
		</a>
	</div>
	<div id="cart_btn" style="position:relative">
		<img src="Content/img/icon/shopcar_rwd.png">
		<div id="atchint">  
				<!-- 購物車上的圓點 -->
		</div>
	</div>
	<?php 
	if(isset($_SESSION['cus_name'])){
			echo'
					<form action="" method="POST" id="logout_form">
						<input id="logout_btn" type="submit" value="登出"></input>
						<input type="hidden" name="logout" value="true"/>
					</form>
				';
	};
?>
</div>
<div id="header_margin" style="width:100%;height:180px"></div>

<script>

	$("#hamburger_line").click(function(){
		$("#hr1").toggleClass("-on1")
		$("#hr2").toggleClass("-on2")
		$("#hr3").toggleClass("-on3")
		$("#menubur").toggleClass("-on4")
	});

</script>

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

<div id="fullpage">