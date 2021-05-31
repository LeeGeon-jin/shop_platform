<?php
require_once "db_settings.inc";

class DBManager
{
    public mysqli $conn;

    public function __construct()
    {
        //连接数据库
        $this->conn=new mysqli(DB_HOST,DB_QUERY_USER,DB_PASS,DB_SCHEMA);
        if($this->conn->connect_error){
            die("Connection failed: ".$this->conn->connect_error);
        }
    }

    public function displayDB($sql)
    {
        return $this->conn->query($sql);
    }

    public function updateDB($sql,$table)
    {
        if($this->conn->query($sql))
        {
            echo "<script>";
            echo "alert('成功！');";
            if(!empty($table))
                echo "location.href=\"../db_admin.php?table_id=$table\"";
            else
                echo "close();";
            echo "</script>";
        }
        else
        {
            $this->failUpdate();
        }
    }

    public function updateOrder($sql,$sql2)
    {
        if($this->conn->query($sql) && $this->conn->query($sql2))
        {
            echo "<script>";
            echo "alert('成功！');";
            echo "location.href='../db_admin.php?table_id=order';";
            echo "</script>";
        }
        else
        {
            $this->failUpdate();
        }
    }

    public function closeConn()
    {
        $this->conn->close();
    }




    private function failUpdate()
    {
        echo "<script>";
        echo "alert('失败！');";
        echo "history.back();";
        echo "</script>";
    }
}