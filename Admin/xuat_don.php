<?php 
session_start();
error_reporting(0);
//include 'Connect.php';
$conn = mysqli_connect("localhost","root","","btlquanlysach");
        mysqli_query($conn,"SET NAMES 'utf8'");
$sql="select * from giaohang";
$kq=mysqli_query($conn,$sql);
$STT = 1;
$output='';
if (isset($_POST["export_excel"])) {
    if (mysqli_num_rows($kq)) {
        $output.='<table class="table" bordered="1">
            <tr>
                <td>STT</td>
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
                <td>'.$STT++.'</td>
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
        header("Content-Disposition: attachment; filename=don_hang.xls");
        echo $output;
    }

}
 ?>