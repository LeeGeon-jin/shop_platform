<?php

$conn=new mysqli("localhost","root","","online_shop");

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$a=$_POST["service-name"];
$b=$_POST["service-price"];
$c=$_POST["service-info"];
$d=$_POST["service-img"];
echo $a;
echo "<br>";
echo $b;
echo "<br>";
if($c=="")
{
    echo "C is empty";
}
elseif ($c==null)
{
    echo "C is null";
}
else
{
    echo $c;
}

echo "<br>";
if($d=="")
{
    echo "D is empty";
}
elseif ($d==null)
{
    echo "D is null";
}
else
{
    echo $d;
}

echo "<br>";
echo "END";
echo "<br>";

$sql="insert into item (item_name,item_price,item_info,image_url) values ('$a','$b','$c','$d')";
if($conn->query($sql)==true)
{
    echo "successful!";
}
else{echo "failed!";}

$conn->close();