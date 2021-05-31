<?php
require_once "../../dbcontroller/DBManager.php";
$db=new DBManager();

$v_id=$_POST["v-id"];
$v_name=$_POST["v-name"];
$v_discount=$_POST["v-discount"];
$expire_date=$_POST["expire-date"];

if(empty($v_id))
{
    $sql="insert into voucher (v_name,v_discount,expire_date) values ('$v_name','$v_discount','$expire_date')";
}
else
{
    $sql="update voucher set v_name='$v_name',v_discount='$v_discount',expire_date='$expire_date' where v_id='$v_id'";
}

$db->updateDB($sql,"voucher");

$db->closeConn();