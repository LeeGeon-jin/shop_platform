<?php
require_once "../../dbcontroller/DBManager.php";
$db=new DBManager();

$delete_id=$_GET["d_id"];
$sql="delete from orders where order_id='$delete_id'";
$sql2="delete from order_item where order_id='$delete_id'";
$method="update";

$db->updateOrder($sql,$sql2,$method);

$db->closeConn();