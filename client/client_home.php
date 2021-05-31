<?php
require_once "../dbcontroller/DBManager.php";
$db=new DBManager();

$sql="select * from item";
$result=$db->displayDB($sql);
?>
<html>
<head>
    <title>澳吉移民服务</title>
</head>
<body>
<h1>我们的服务</h1>
<form action="searched_item.php" method="post">
    <input id="search-name" name="search-name" type="text" placeholder="你需要的服务">
    <input type="submit" value="搜索">
</form>

<?php
while ($row=$result->fetch_assoc())
{
    //tier1 框框
    echo "<div>";
    //tier2 上面部分
    echo "<div>";
    echo "<a href='item_desc.php?item_id=".$row["item_id"]."'>";
    echo "<img src='".$row["image_url"]."' width='200' height='200'>";
    echo "</a>";
    echo "</div>";
    //tier2 下面部分
    echo "<div>";
    //tier3 下面部分的上面部分
    echo "<div>";
    echo "<a href='item_desc.php?item_id=".$row["item_id"]."' style='text-decoration:none'>";
    echo $row["item_name"];
    echo "</a>";
    echo "</div>";
    //tier3 下面部分的下面部分
    echo "<div>";
    echo "$".$row["item_price"]." AUD";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>

</body>
</html>
