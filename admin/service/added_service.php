<?php
require_once "../../dbcontroller/db_settings.inc";

$conn=new mysqli(DB_HOST,DB_QUERY_USER,DB_PASS,DB_SCHEMA);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$service_id=$_POST["service-id"];
$service_name=$_POST["service-name"];
$service_price=$_POST["service-price"];
$service_info=$_POST["service-info"];
$service_img=$_POST["service-img"];

if(empty($service_id))
{
    $sql="insert into item (item_name,item_price,item_info,image_url) values ('$service_name','$service_price','$service_info','$service_img')";
}
else
{
    $sql="update item set item_name='$service_name', item_price='$service_price', item_info='$service_info', image_url='$service_img' where item_id='$service_id'";
}

if($conn->query($sql)==true)
{
    echo "数据库更新成功！";
    echo "<a href='service_admin.php'>立即返回</a>";
}
else
{
    echo "数据库更新失败！";
    echo "<a href='add_service.php'>重试</a>";
}
$conn->close();
