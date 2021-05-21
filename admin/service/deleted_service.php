<?php
require_once "../../dbcontroller/db_settings.inc";

$conn=new mysqli(DB_HOST,DB_QUERY_USER,DB_PASS,DB_SCHEMA);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

if(isset($_GET['d_id']))
{
    $delete_id=$_GET['d_id'];
    $sql="delete from item where item_id='$delete_id'";
    if($conn->query($sql)==true)
    {
        echo "<script>";
        echo "alert('删除成功！');";
        echo "location.href='service_admin.php';";
        echo "</script>";

    }
    else
    {
        echo "<script>";
        echo "alert('删除失败！');";
        echo "location.href='service_admin.php';";
        echo "</script>";
    }
}

$conn->close();