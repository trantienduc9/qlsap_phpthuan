<?php
if(isset($_GET['iad'])||isset($_GET['id'])){
    $id = $_GET['id'];
    $iad = $_GET['iad'];
    $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error)
    {
        var_dump($connect->connect_error);
        die();
    }
    $query ="Delete from books where Idbook='".$id."'";
    $check= mysqli_query($connect, $query);
    if($check)
    {
        header("Location:./quanlysach.php?iad=".$iad."");
        $connect->close();
    }
}