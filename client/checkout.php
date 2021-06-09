<?php

?>
<html>
<head>
    <title>结算</title>
</head>
<body>
<h1>结算</h1>
<form action="added_order.php" method="post">
    <h2>客户详情</h2>
    <div>
        <label>姓*</label>
        <input id="lname" name="lname" type="text">

        <label>名*</label>
        <input id="fname" name="fname" type="text">
    </div>
    <br>
    <div>
        <label>公司名</label>
        <input id="comname" name="comname" type="text">
    </div>
    <br>
    <div>
        <label>国家</label>
        <input id="country" name="country" type="text">

        <label>省/直辖市</label>
        <input id="state" name="state" type="text">

        <label>地级市/县</label>
        <input id="suburb" name="suburb" type="text">
    </div>
    <div>
        <label>街道地址</label>
        <input id="address" name="address" type="text" >

        <label>邮政编码</label>
        <input id="postcode" name="postcode" type="text">
    </div>
    <br>
    <div>
        <label>电话号码*</label>
        <input id="phone" name="phone" type="tel" required>

        <label>电子邮箱</label>
        <input id="email" name="email" type="email">
    </div>
    <br>
    <h2>订单信息</h2>
    <table width="50%" style="text-align: left; margin-left: 5%">
        <tr>
            <th>服务</th>
            <th>价格</th>
        </tr>
        <?php
            if(isset($_POST))
            {
                echo "<tr>";
                echo "<td>".$_POST["item-name"]."</td>";
                echo "<td>".$_POST["item-price"]."</td>";
                echo "</tr>";
            }
        ?>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th>合计</th>
            <th><?php echo $_POST["item-price"] ?? "" ?></th>
        </tr>
    </table>
    <input id="price" name="price" type="hidden" value="<?php echo $_POST['item-price'] ?? '' ?>">
    <input id="iname" name="iname" type="hidden" value="<?php echo $_POST['item-name'] ?? '' ?>">
    <br>
    <h2>支付方式</h2>
    <div>
        <div>
            <input id="offline" name="payment" type="radio" value="offline">
            <label>平台外支付</label>
            <p>用手机APP或ATM机直接付款到我们的银行账户。请使用订单号作为付款备注。我们会在资金到账后配送订单。</p>
        </div>
        <div>
            <input id="paypal" name="payment" type="radio" value="paypal">
            <label>PayPal</label>
            <p>支持绑定银联卡的账户</p>
        </div>
        <div>
            <input id="bank" name="payment" type="radio" value="bank">
            <label>银行卡支付</label>
            <p>仅支持Visa和MasterCard，暂不支持银联卡。</p>
        </div>
    </div>

    <br>
    <input type="submit" value="下单">
</form>

</body>
</html>
