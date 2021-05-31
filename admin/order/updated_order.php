<?php
require_once "../../dbcontroller/DBManager.php";
$db=new DBManager();

$order_id=$_POST["order-id"];
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
$paid=$_POST["paid"];
$item_name=$_POST["iname"];
$old_item_name=$_POST["old_iname"];

if(empty($order_id))
{

}
else
{
	$sql="update orders set last_name='$last_name',first_name='$first_name',company_name='$company_name',country='$country',state='$state',suburb='$suburb',address='$address',postcode='$postcode',phone='$phone',email='$email',order_price='$order_price',paid='$paid' where order_id='$order_id'";
	$sql2="update order_item set item_name='$item_name' where order_id='$order_id' and item_name='$old_item_name'";
}

$db->updateOrder($sql,$sql2);

$db->closeConn();