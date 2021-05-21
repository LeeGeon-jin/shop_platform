<?php

?>
<html>
<head>
    <title>更新服务</title>
</head>
<body>
<h1>添加或更新服务</h1>
<form action="added_service.php" method="post">
    <input id="service-id" name="service-id" type="hidden" value="<?php echo (!empty($_GET['u_id'])) ? $_GET['u_id'] : ''; ?>">
    <div>
        <label>服务名称</label>
        <input id="service-name" name="service-name" type="text" value="<?php echo (!empty($_GET['u_name'])) ? $_GET['u_name'] : ''; ?>" required>
    </div>
    <br>
    <div>
        <label>价格</label>
        <input id="service-price" name="service-price" type="number" min="1" value="<?php echo (!empty($_GET['u_price'])) ? $_GET['u_price'] : ''; ?>" required>
    </div>
    <br>
    <div>
        <label>服务介绍</label>
        <textarea id="service-info" name="service-info"><?php echo (!empty($_GET['u_info'])) ? $_GET['u_info'] : ''; ?></textarea>
    </div>
    <br>
    <div>
        <label>图片网址</label>
        <input id="service-img" name="service-img" type="text" value="<?php echo (!empty($_GET['u_url'])) ? $_GET['u_url'] : ''; ?>">
    </div>
    <br><br>
    <input type="submit" value="提交">
</form>
    <button onclick="location.href='service_admin.php'">返回</button>

</body>
</html>