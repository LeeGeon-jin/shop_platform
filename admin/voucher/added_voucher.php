<?php
require_once "../../dbcontroller/db_settings.inc";

$conn=new mysqli(DB_HOST,DB_QUERY_USER,DB_PASS,DB_SCHEMA);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

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


if($conn->query($sql)==true)
{
    echo "优惠券更新成功！";
    echo "<a href='voucher_admin.php'>立即返回</a>";
}
else
{
    echo "优惠券更新失败！";
    echo "<a href='add_voucher.php'>重试</a>";
}
$conn->close();