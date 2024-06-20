<?php
ob_start();
include './header.php';

if(isset($_GET['iad'])){
    $iad = $_GET['iad'];
    $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
if($connect->connect_error)
{
    var_dump($connect->connect_error);
    die();
}
$querySelect = "SELECT * FROM books";
$results = mysqli_query($connect, $querySelect);
}
else{
    echo "<script type='text/javascript'>alert('Mời bạn đang nhập để vào trang admin!!');</script>";
    header('location: ./login.php');
}

?>
<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">QUẢN LÝ SÁCH</h1>

<div class="card shadow mb-4 ">
    <div class="card-header py-3">
    <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách book của shop </h6>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <label style="display:flex;justify-content: end;">Search:
                            <input style="width:40%" type="search" class="form-control form-control-sm" placeholder=""
                                aria-controls="dataTable"></label>
                    </div>
                </div>
            </div>
    </div>
    <div class="row">
    <div class="card-body col-sm-2">
    <h2 style="text-align: center">Thêm sách</h2>
    <a  style="display:flex;justify-content: center;"href="./themsach.php?iad=<?php echo $iad ?>" class="btn btn-primary" role="button">Thêm</a>
    </div>
    <div class="card-body col-sm-2">
    <h2 style="text-align: center">Xuất excel</h2>
    <form action="xuatsach.php" method="POST">
        <input type="submit" name="export_excel" value="Xuất Excel" class="btn btn-success" style="display:flex;justify-content: center;">
    </form>
    </div>
    <div class="card-body col-sm-10 ">
        <div class="table-responsive">
            <table class="table table-hover table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                     <th>STT</th>
                        <th>Tên sách</th>
                        <th>Hình ảnh</th>
                        <th>Thể loại</th>
                        <th>Tác giả</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Ngày nhập</th>
                        <th>Chức năng</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (mysqli_num_rows($results) > 0) {
                    $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
                    $count=1;
                    foreach ($users as $user) {
                    echo "
                    <tr>
                        <td style='width:5%;'>".$count++."</td>
                        <td>".$user['Namebook']."</td>
                        <td style='width:13%;'padding:0;><img style='width:100%;' src='../public/admin/img/".$user['Img']."' alt='erorr'></td>
                        <td>".$user['TheLoai']."</td>
                        <td>".$user['TacGia']."</td>  
                        <td>".$user['Soluong']."</td>
                        <td>".$user['Gia']."</td>
                        <td>".$user['Ngaydang']."</td>
                        <td style='width:8%;'><a  style='display:flex;justify-content: center;'href='./suasach.php?id=".$user['IdBook']."&iad=".$iad."' class='btn btn-success' >Sửa</a></td>
                        <td style='width:8%;'><a  style='display:flex;justify-content: center;'href='./delete.php?id=".$user['IdBook']."&iad=".$iad."' class='btn btn-danger ' >Xóa</a></td>
                    </tr> ";
                    }
                    }
                ?>
                <?php
                $connect->close(); ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    </div>
   
</div>

</div>


<?php
include './footer.php';
?>