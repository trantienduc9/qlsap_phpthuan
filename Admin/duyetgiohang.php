<?php

if(isset($_GET['iad'])||isset($_GET['igh'])){
    $id = $_GET['igh'];
    $iad = $_GET['iad'];
    $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error)
    {
        var_dump($connect->connect_error);
        die();
    }
    $query ="Delete from giaohang where IdGiao=".$id."";
    $check= mysqli_query($connect, $query);
    if($check)
    {
        header("Location:./quanlygiohang.php?iad=".$iad."&o=1");
        $connect->close();
    }
}