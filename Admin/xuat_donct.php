<?php 
session_start();
error_reporting(0);

if(isset($_GET['iad'])||isset($_GET['igh'])){
    $id = $_GET['igh'];
    $iad = $_GET['iad'];
    $conn = mysqli_connect("localhost","root","","btlquanlysach");
    mysqli_query($conn,"SET NAMES 'utf8'");
    if($connect->connect_error)
    {
        var_dump($connect->connect_error);
        die();
    }
    $sql="SELECT * from giaohang where IdGiao=".$id."";
    $kq=mysqli_query($conn,$sql);
}
else {
    echo "<script type='text/javascript'>alert('Mời bạn đăng nhập để vào trang admin!!');</script>"; 
}
$output='';
if (isset($_POST["export_excel"])) {
    if (mysqli_num_rows($kq)) {
        $output.='<table class="table" bordered="1">
            <tr>
                <td>Tên người nhận</td>
                <td>Email</td>
                <td>Số điện thoại</td>
                <td>Địa chỉ</td>
                <td>Đơn giá</td>
                <td>Ngày đặt</td>
                <td>Ghi chú</td>
            </tr>';
        while($row = mysqli_fetch_row($kq))
        {
            $output.='
            <tr>
                <td>'.$row[2].'</td>
                <td>'.$row[3].'</td>
                <td>'.$row[4].'</td>
                <td>'.$row[5].'</td>
                <td>'.$row[6].'</td>
                <td>'.$row[7].'</td>
                <td>'.$row[8].'</td>
            </tr>
            ';
        }
        $output.='</table>';
        header("Content-Type:application/xls");
        header("Content-Disposition: attachment; filename=don_hang_chi_tiet.xls");
        echo $output;
    }

}
 ?>