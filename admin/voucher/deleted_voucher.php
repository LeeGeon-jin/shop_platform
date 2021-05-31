<?php
require_once "../../dbcontroller/DBManager.php";
$db=new DBManager();

if(isset($_GET['d_id']))
{
    $delete_id=$_GET['d_id'];
    $sql="delete from voucher where v_id='$delete_id'";

    $db->updateDB($sql,"voucher");
}
$db->closeConn();