<?php
require_once "../dbcontroller/db_settings.inc";

$conn=mysqli_connect('127.0.0.1','root','','online_shop');

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
echo "Connected successfully";

mysqli_close($conn);