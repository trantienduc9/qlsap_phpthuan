<?php 
session_start();
error_reporting(0);
//include 'Connect.php';
$conn = mysqli_connect("localhost","root","","btlquanlysach");
        mysqli_query($conn,"SET NAMES 'utf8'");
$sql="select * from books";
$kq=mysqli_query($conn,$sql);
$STT = 1;
$output='';
if (isset($_POST["export_excel"])) {
    if (mysqli_num_rows($kq)) {
        $output.='<table class="table" bordered="1">
            <tr>
                <td>STT</td>
                <td>Tên sách</td>
                <td>Img</td>
                <td>Thể loại</td>
                <td>Tác giả</td>
                <td>Số lượng</td>
                <td>Giá</td>
                <td>Ngày đăng</td>
                <td>Nội dung</td>
            </tr>';
        while($row = mysqli_fetch_row($kq))
        {
            $output.='
            <tr>
                <td>'.$STT++.'</td>
                <td>'.$row[1].'</td>
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
        header("Content-Disposition: attachment; filename=sach.xls");
        echo $output;
    }

}
 ?>