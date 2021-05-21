<?php
require_once "../../dbcontroller/db_settings.inc";

$conn=new mysqli(DB_HOST,DB_QUERY_USER,DB_PASS,DB_SCHEMA);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$sql="select * from orders inner join order_item on orders.order_id=order_item.order_id";
$result=$conn->query($sql);
?>

<html>
<head>
    <title>订单管理</title>
</head>
<body>
<h1>订单管理</h1>

<form action="searched_order.php" method="post">
    <input name="search-name" placeholder="电话号码">
    <input type="submit">
</form>

<?php
require_once "order_table.php";
$conn->close();
?>
</body>
</html>
