<?php
if(isset($_GET['idhoa'])){
    $iduser = $_GET['iddon'];
    $idbook = $_GET['idhoa'];
    $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error)
    {
        var_dump($connect->connect_error);
        die();
    }
    $query ="Delete from hoadon where Idbook=".$idbook." and IdUser = ".$iduser."";
    $check= mysqli_query($connect, $query);
    if($check)
    {
        header("Location: ./cart.php?id=".$iduser."");
        $connect->close();
    }
}