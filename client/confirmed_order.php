<?php
require_once "../dbcontroller/DBManager.php";
$db=new DBManager();

$customerReference=$_POST['customerReference'];
$txnreference=$_POST['txnreference'];
$responseCode=$_POST['responseCode'];
$responseText=$_POST['responseText'];
$amount=$_POST['amount'];

echo "<h3>Payment Details 支付详情</h3>";
echo "<p>Customer Reference 用户账单号码: ".$customerReference."</p>";
echo "<p>Txn Reference TXN号码: ".$txnreference."</p>";
echo "<p>Response Code 返回代码: ".$responseCode."</p>";
echo "<p>Response Text 返回信息: ".$responseText."</p>";
echo "<p>Amount 金额: A$".$amount."</p>";
echo "<br><br>";


if($responseCode=="08")
{
    $sql="update orders set paid=1 where order_id='$customerReference'";
    $db->updateDB($sql,"orders");
    $db->closeConn();

    echo "<h1>Payment Success!</h1>";
    echo "<h1>支付成功！我们的客服会尽快联系您。</h1>";
    echo "<a href='https://www.ausimmi.com.au/zh-hans'>Back to homepage 返回主页</a>";
}
else
{
    echo "<h1>Payment Failed!</h1>";
    echo "<h1>支付失败！</h1>";

    echo "<form id='data-form' action='https://www.ipg.stgeorge.com.au/StgWeb/servlet/webpay.website.Simple?token1=0sxwHsM4n9rhtxdg4BKzK5qmY&token2=Ym59BlFOi2suaThaepVZrcP8I' method='post'>".
        "<input id='customerReference' name='customerReference' type='hidden' value='".$customerReference."'>".
        "<input id='amount' name='amount' type='hidden' value='".$amount."'>".
        "</form>";

    echo "<button onclick=\"document.getElementById('data-form').submit();\">Try again 重试</button>";
}

?>