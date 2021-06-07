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
            <button onclick="location.href='checkout.php?item_id=<?php echo $row["item_id"] ?>'">立即购买</button> <button>加入购物车</button>
        </div>
    </div>
</div>

<?php
$db->closeConn();
?>
</body>
</html>

