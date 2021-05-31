<?php
require_once "../dbcontroller/DBManager.php";
$db=new DBManager();

$search_name=$_POST["search-name"];
$page_name=$_POST["page-name"];

if($page_name=="service")
    $sql="select * from item where item_name='$search_name'";
elseif ($page_name=="voucher")
    $sql="select * from voucher where v_name='$search_name'";
elseif ($page_name=="order")
    $sql="select * from orders inner join order_item on orders.order_id=order_item.order_id where phone='$search_name'";
else
    $sql="";

$result=$db->displayDB($sql);
?>

<html>
<head>
    <title>查询结果</title>
</head>
<body>
<h1>查询结果</h1>

<?php
if($page_name=="service")
    require_once "service/service_table.php";
elseif ($page_name=="voucher")
    require_once "voucher/voucher_table.php";
elseif ($page_name=="order")
    require_once "order/order_table.php";

$db->closeConn();
?>

<button onclick="history.back()">返回</button>

</body>
</html>
