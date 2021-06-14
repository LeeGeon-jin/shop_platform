<?php

$discount_amount=0;

if(isset($_POST["voucher"]))
{
    require_once "../dbcontroller/DBManager.php";
    $db=new DBManager();


    $v_name=$_POST["voucher"];
    $sql_check_name="select * from voucher where v_name='$v_name'";
    $row=$db->displayDB($sql_check_name)->fetch_assoc();
    if(empty($row))
    {
        echo "<script>alert('优惠券名错误！');</script>";
    }
    else
    {
        if($row["expire_date"]=="0000-00-00" || $row["expire_date"] < date("Y-m-d"))
        {
            $discount_amount=$row["v_discount"];
        }
        else
        {
            echo "<script>alert('优惠券已过期！');</script>";
        }
    }
}

$final_price=null;

if(isset($_POST["item-price"]))
{
    if(isset($_POST["voucher"]))
    {$final_price = $_POST["item-price"] - $_POST["voucher"];}
    else
    {$final_price=$_POST["item-price"];}
}
elseif (isset($_SESSION["order-price"]))
{
    if(isset($_POST["voucher"]))
    {$final_price=$_SESSION["order-price"] - $_POST["voucher"];}
    else
    {$final_price=$_SESSION["order-price"];}
}
?>
<html>
<head>
    <title>结算</title>
</head>
<body>
<h1>结算</h1>
<form id="main-form" action="added_order.php" method="post">
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
            <th><?php echo $final_price ?></th>
        </tr>
    </table>
    <input id="price" name="price" type="hidden" value="<?php echo $final_price ?? '' ?>">
    <input id="iname" name="iname" type="hidden" value="<?php echo $_POST['item-name'] ?? '' ?>">
    <br>
    <h2>支付方式</h2>
    <div>
        <div>
            <input id="offline" name="payment" type="radio" value="offline" required>
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
</form>

<h2>优惠券</h2>
<form action="" method="post">
    <input id="voucher" name="voucher" type="text" placeholder="优惠券号">
    <input type="submit" value="使用">
</form>
<br>

<input type="submit" form="main-form" value="下单">

</body>
</html>
