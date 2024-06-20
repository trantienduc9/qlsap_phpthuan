<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_GET['iad'])){
    $iad = $_GET['iad'];
}
else{
    echo "<script type='text/javascript'>alert('Mời bạn đang nhập để vào trang admin!!');</script>";
    header('location: ./login.php');
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <!-- Custom fonts for this template-->
    <link href="../public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../public/admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./index.php?iad=<?php echo $iad; ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-users-cog"></i> 
                </div>
                <div class="sidebar-brand-text mx-3">Quản Lý</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="./index.php?iad=<?php echo $iad; ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tổng Quan 
                    </span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li style="padding-top: 0;" class="nav-item">
               <!--  <a style="padding-top: 0;" class="nav-link collapsed" href="header("Location: ./indexuser.php?id=".$iad);">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Trang mua sách</span>
                </a> -->
                <a style="padding-top: 0;" class="nav-link collapsed" href="<?php echo '../User/indexuser.php?id='.$iad; ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Trang mua sách</span>
                </a>

                
            </li>
            <hr class="sidebar-divider d-none d-md-block"> 
            <div class="sidebar-heading">
                Quản lý sách
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Quản lý sách</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Danh mục quản lý:</h6>
                        <a class="collapse-item" href="./quanlysach.php?iad=<?php echo $iad ?>">Sách</a>
                        <a class="collapse-item" href="./quanlygiohang.php?iad=<?php echo $iad ?>">Đơn hàng</a>
                        <a class="collapse-item" href="./quanlyyeucau.php?iad=<?php echo $iad ?>">Phản hồi người dùng</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Quản lý hệ thống</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Danh mục quản lý:</h6>
                        <a class="collapse-item" href="./quanlyuser.php?iad=<?php echo $iad ?>">Người dùng</a>
                       
                    </div>
                </div>
            </li>
          
        
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
      
        <div id="content-wrapper" class="d-flex flex-column">
         
            <div id="content">
           
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                   
                    <ul class="navbar-nav ml-auto">
                      
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                  
                        
                        <div class="topbar-divider d-none d-sm-block"></div>
                    
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="../public/admin/img/3837171.png">
                            </a>
                          
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>