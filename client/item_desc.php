<?php
require_once "../dbcontroller/DBManager.php";
$db=new DBManager();

$service_id=$_GET["item_id"];

$sql="select * from item where item_id='$service_id'";
$result=$db->displayDB($sql);

$row=$result->fetch_assoc();
?>

<html>
<head>
    <title>服务详情</title>
    <style>
        .row{
            display: flex;
        }
        .column{
            flex: 50%;
            padding: 10px;
        }
    </style>
</head>
<body>
<h1>服务详情</h1>
<div class="row">
    <div class="column">
        <img src="<?php echo $row['image_url'] ?>" width="75%" height="75%">
    </div>
    <div class="column">
        <h2><?php echo $row['item_name'] ?></h2>
        <h2>A$<?php echo $row['item_price'] ?></h2>
        <p><?php echo $row['item_info'] ?></p>
        <br>
        <br>
        <div>
            <button onclick="document.getElementById('item-form').submit()">立即购买</button> <button>加入购物车</button>
        </div>
    </div>
</div>

<form id="item-form" action="checkout.php" method="post">
    <input id="item-id" name="item-id" type="hidden" value="<?php echo $row ['item_id']?>">
    <input id="item-name" name="item-name" type="hidden" value="<?php echo $row ['item_name']?>">
    <input id="item-price" name="item-price" type="hidden" value="<?php echo $row ['item_price'] ?>">
</form>
<?php
$db->closeConn();
?>
</body>
</html>

