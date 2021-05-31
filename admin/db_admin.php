<?php
require_once "../dbcontroller/DBManager.php";
$db=new DBManager();

$db_table=$_GET["table_id"];

if($db_table=="service")
    $sql="select * from item";
elseif ($db_table=="voucher")
    $sql="select * from voucher";
elseif ($db_table=="order")
    $sql="select * from orders inner join order_item on orders.order_id=order_item.order_id";
else
    $sql="";
$result=$db->displayDB($sql);
?>

<html>
<head>
    <title>数据管理</title>
</head>
<body>
<h1 id="big-title">数据管理</h1>

<button id="add-button">新增</button>

<form action="searched_result.php" method="post">
    <input id="search-name" name="search-name">
    <input id="page-name" name="page-name" type="hidden">
    <input type="submit" value="查询">
</form>

<?php
if($db_table=="service")
    require_once "service/service_table.php";
elseif ($db_table=="voucher")
    require_once "voucher/voucher_table.php";
elseif ($db_table=="order")
    require_once "order/order_table.php";

$db->closeConn();
?>

</body>
<script>
    var table_name="<?php echo $db_table ?>";
    console.log(table_name);
    if(table_name==="service")
    {
        document.getElementById("big-title").innerHTML="服务管理";
        document.getElementById("add-button").disabled=false;
        document.getElementById("add-button").onclick=function (){location.href='service/add_service.php'};
        document.getElementById("search-name").placeholder="名称";
        document.getElementById("page-name").value="service";
    }
    else if(table_name==="voucher")
    {
        document.getElementById("big-title").innerHTML="优惠券管理";
        document.getElementById("add-button").disabled=false;
        document.getElementById("add-button").onclick=function (){location.href='voucher/add_voucher.php'};
        document.getElementById("search-name").placeholder="名称";
        document.getElementById("page-name").value="voucher";
    }
    else if(table_name==="order")
    {
        document.getElementById("big-title").innerHTML="订单管理";
        document.getElementById("add-button").disabled=true;
        document.getElementById("search-name").placeholder="手机号";
        document.getElementById("page-name").value="order";
    }

</script>
</html>

