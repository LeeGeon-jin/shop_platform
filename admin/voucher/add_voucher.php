<?php

?>
<html>
<head>
    <title>更新优惠券</title>
</head>
<body>
<h1>添加或更新优惠券</h1>
<form action="added_voucher.php" method="post">
    <input id="v-id" name="v-id" type="hidden" value="<?php echo (!empty($_GET['u_id'])) ? $_GET['u_id'] : ''; ?>">
    <div>
        <label>优惠券名称</label>
        <input id="v-name" name="v-name" type="text" value="<?php echo (!empty($_GET['u_name'])) ? $_GET['u_name'] : ''; ?>" required>
    </div>
    <br>
    <div>
        <label>优惠金额</label>
        <input id="v-discount" name="v-discount" type="number" min="1" value="<?php echo (!empty($_GET['u_disc'])) ? $_GET['u_disc'] : ''; ?>" required>
    </div>
    <br>
    <div>
        <label>失效日期</label>
        <input id="expire-date" name="expire-date" type="date" min="<?php echo date('Y-m-d'); ?>" max="2099-12-31" value="<?php echo (!empty($_GET['u_date'])) ? $_GET['u_date'] : ''; ?>">
    </div>
    <br><br>
    <input type="submit" value="提交">
</form>
    <button onclick="location.href='voucher_admin.php'">返回</button>
</body>
</html>
