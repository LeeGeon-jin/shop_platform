<?php
require_once "../../dbcontroller/db_settings.inc";

$conn=new mysqli(DB_HOST,DB_QUERY_USER,DB_PASS,DB_SCHEMA);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$sql="select * from item";
$result=$conn->query($sql);
?>

<html>
<head>
    <title>服务管理</title>
</head>
<body>
<h1>服务管理</h1>

<button onclick="location.href='add_service.php'">新增</button>

<form action="searched_service.php" method="post">
    <input name="search-name" placeholder="名称">
    <input type="submit" value="查询">
</form>

<?php
require_once "service_table.php";
$conn->close();
?>

</body>
</html>

