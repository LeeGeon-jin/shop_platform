<?php
require_once "../../dbcontroller/db_settings.inc";

$conn=new mysqli(DB_HOST,DB_QUERY_USER,DB_PASS,DB_SCHEMA);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$search_name=$_POST["search-name"];

$sql="select * from voucher where v_name='$search_name'";

$result=$conn->query($sql);
?>

<html>
<head>
    <title>查询结果</title>
</head>
<body>
<h1>查询结果</h1>

<?php
require_once "voucher_table.php";

$conn->close();
?>

<button onclick="location.href='voucher_admin.php'">返回</button>
</body>
</html>