<?php
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
    $results1 = mysqli_query($connect,"SELECT count(*) from user ");
    $results2 = mysqli_query($connect,"SELECT count(*) from feedback ");
    $results3 = mysqli_query($connect,"SELECT count(*) from giaohang ");
    $results4 = mysqli_query($connect,"SELECT count(*) from books ");

    $sumuser=mysqli_fetch_assoc($results1);
    $sumfeedback=mysqli_fetch_assoc($results2);
    $sumgiaohang=mysqli_fetch_assoc($results3);
    $sumbooks=mysqli_fetch_assoc($results4);


}
else{
    echo "<script type='text/javascript'>alert('Mời bạn đang nhập để vào trang admin!!');</script>";
    header('location: ./login.php');
}
?>
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Quản lý</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Tổng Sản phẩm
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sumbooks['count(*)']." sản phẩm" ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tổng Đơn hàng cần duyệt
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sumgiaohang['count(*)']." Đơn" ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Số người sử dụng hệ thống
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sumuser['count(*)']." Tài khoản" ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Số người phản hồi
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sumfeedback['count(*)']." Người" ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $connect->close() ?>
 <?php
 include './footer.php';
 ?>