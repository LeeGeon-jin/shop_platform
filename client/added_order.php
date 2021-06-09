<?php
require_once "../dbcontroller/DBManager.php";
$db=new DBManager();

$last_name=$_POST["lname"];
$first_name=$_POST["fname"];
$company_name=$_POST["comname"];
$country=$_POST["country"];
$state=$_POST["state"];
$suburb=$_POST["suburb"];
$address=$_POST["address"];
$postcode=$_POST["postcode"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$order_price=$_POST["price"];
$item_name=$_POST["iname"];
$payment=$_POST["payment"];

$sql="insert into orders (last_name,first_name,company_name,country,state,suburb,address,postcode,phone,email,order_price,paid) values ('$last_name','$first_name','$company_name','$country','$state','$suburb','$address','$postcode','$phone','$email','$order_price',0)";
$sql2="insert into order_item values ((select order_id from orders where phone='$phone'),'$item_name')";
$method="add";

if($db->updateOrder($sql,$sql2,$method)=="success")
{
    if($payment=="offline")
    {}
    elseif ($payment=="paypal")
    {}
    elseif ($payment=="bank")
    {}
}

$db->closeConn();