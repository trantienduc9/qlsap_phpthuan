<?php
if(isset($_GET['1']))
{
    $id=$_GET['id'];
    $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error)
    {
      var_dump($connect->connect_error);
      die();
    }
    $num = mysqli_query($connect, "SELECT count(*),Idbook FROM hoadon WHERE IdUser =".$id." ");
    $num1 = mysqli_query($connect, "SELECT Idbook FROM hoadon WHERE IdUser =".$id." ");
    $dem = mysqli_fetch_all($num, MYSQLI_ASSOC);
    $dem1 = mysqli_fetch_all($num1, MYSQLI_ASSOC);
    $a= array();
    for($i=1;$i<=$dem[0]['count(*)'];$i++){
        array_push($a, $_GET[$i]);
    }

     for($j=0;$j<$dem[0]['count(*)'];$j++){
    $giohang =mysqli_query($connect, "update hoadon set soluong=".$a[$j]." where IdBook = ".$dem1[$j]['Idbook']."" );
    }
    // $summoney = mysqli_query($connect, "SELECT SUM(SoLuong*Gia) FROM  hoadon WHERE IdUser=".$id." GROUP by IdUser ");
    header("Location: ./cart.php?id=".$id."");
    $connect->close();
    
} 
?>