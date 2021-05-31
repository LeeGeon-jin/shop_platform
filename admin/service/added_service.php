<?php
require_once "../../dbcontroller/DBManager.php";
$db=new DBManager();

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

$db->updateDB($sql,'service');

$db->closeConn();