<html>
<head>
	<title>更新订单</title>
</head>
<body>
	<h1>更新订单</h1>
	<form action="updated_order.php" method="post">
		<input id="order-id" name="order-id" type="hidden" value="<?php echo $_GET['u_id'] ?>">
		<div>
			<label>姓*</label>
			<input id="lname" name="lname" type="text" value="<?php echo $_GET['u_lname'] ?>" required>
			
			<label>名*</label>
			<input id="fname" name="fname" type="text" value="<?php echo $_GET['u_fname'] ?>" required>
		</div>
		<br>
		<div>
			<label>公司名</label>
			<input id="comname" name="comname" type="text" value="<?php echo $_GET['u_comname'] ?>">
		</div>
		<br>
		<div>
			<label>国家</label>
			<input id="country" name="country" type="text" value="<?php echo $_GET['u_country'] ?>">
			
			<label>省/直辖市</label>
			<input id="state" name="state" type="text" value="<?php echo $_GET['u_state'] ?>">
			
			<label>地级市/县</label>
			<input id="suburb" name="suburb" type="text" value="<?php echo $_GET['u_suburb'] ?>">
		</div>
		<div>
			<label>街道地址</label>
			<input id="address" name="address" type="text" value="<?php echo $_GET['u_address'] ?>">

			<label>邮政编码</label>
			<input id="postcode" name="postcode" type="text" value="<?php echo $_GET['u_postcode'] ?>">
		</div>
		<br>
		<div>
			<label>电话号码*</label>
			<input id="phone" name="phone" type="tel" value="<?php echo $_GET['u_phone'] ?>" required>
		
			<label>电子邮箱</label>
			<input id="email" name="email" type="email" value="<?php echo $_GET['u_email'] ?>">
		</div>
		<br>
		<div>
			<label>订单总金额*</label>
			<input id="price" name="price" type="number" min="1" value="<?php echo $_GET['u_price'] ?>" required>
		</div>
		<br>
		<div>
			<label>是否已付*</label>
			<div>
				<label>未付</label>
				<input id="not_paid" name="paid" type="radio" value="0">
			</div>
			<div>
				<label>已付*</label>
				<input id="paid" name="paid" type="radio" value="1">
			</div>
			<script>
				var paidValue=<?php echo $_GET['u_paid'] ?>;
				if(paidValue==0)
				{
					document.getElementById("not_paid").checked=true;
				}
				else
				{
					document.getElementById("paid").checked=true;
				}
			</script>
		</div>
		<br>
		<div>
			<label>服务名称*</label>
			<input id="iname" name="iname" type="text" value="<?php echo $_GET['u_iname'] ?>">
            <input id="old_iname" name="old_iname" type="hidden" value="<?php echo $_GET['u_iname']?>">
		</div>
		<input type="submit" value="提交">
	</form>
</body>
</html>