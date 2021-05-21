<?php

$conn=new mysqli("localhost","root","","online_shop");

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$sql="insert into item (item_name,item_price,item_info,image_url) values ('护照翻译','40',null,null)";
if($conn->query($sql)==true)
{
    echo "successful!";
}
else{echo "failed!";}

$conn->close();