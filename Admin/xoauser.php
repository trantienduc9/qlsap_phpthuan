<?php
if(isset($_GET['iad'])&&isset($_GET['idu'])){
    $id = $_GET['idu'];
    $iad = $_GET['iad'];
    $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error)
    {
        var_dump($connect->connect_error);
        die();
    }
    $query ="Delete from user where IdUser=".$id."";
    $check= mysqli_query($connect, $query);
    if($check)
    {
        header("Location:./quanlyuser.php?iad=".$iad."");
        $connect->close();
    }
    else
    {  
        echo "<div style='display:flex;justify-self: center;'>
        <h1>KHÔNG THỂ XÓA CẦN PHẢI XỬ LÝ HẾT CÁC ĐƠN HÀNG VÀ FEEDBACK</h1>
        </div>";
    }
}