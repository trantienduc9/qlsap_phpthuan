
<!DOCTYPE html>
<?php
ob_start();
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error)
    {
        var_dump($connect->connect_error);
        die();
    }
    $query ="Select * from user where IdUser='".$id."'";
    $check= mysqli_query($connect, $query);
    $users = mysqli_fetch_all($check, MYSQLI_ASSOC);
    $sogiohang = mysqli_query($connect,"select Count(*) from hoadon where IdUser =".$id."");
    if(mysqli_num_rows($sogiohang)>0){

      $demso = mysqli_fetch_all($sogiohang,MYSQLI_ASSOC);
      $so =$demso[0]["Count(*)"] ;
    }
    else{
      $so = 0;
    }
}

?>
<html lang="en">
<style>
  .dropdown-menu :hover{background:palevioletred}
  .li-hiver li:hover { background:palevioletred};
  a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document</title>
  <link href="../public/user/css/font-awesome.css" rel="stylesheet">
  <link href="../public/user/css/bootstrap.css" rel="stylesheet">
  <link href="../public/user/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../public/user/css/jquery.simpleLens.css">
  <link rel="stylesheet" type="text/css" href="../public/user/css/slick.css">
  <link rel="stylesheet" type="text/css" href="../public/user/css/nouislider.css">
  <link id="switcher" href="../public/user/css/theme-color/default-theme.css" rel="stylesheet">
  <link href="../public/user/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">
  <link href="../public/user/css/style.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>

<body>
 
  <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>




  <header id="aa-header">
 
    <section id="menu">
    <div class="container">
      <div class="menu-area">
  
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
          
            <ul class="nav navbar-nav li-hiver">
              <li><a href="./indexuser.php?id=<?php echo $users[0]['IdUser']?>">Home</a></li>
              <li><a href="./product.php?id=<?php echo $users[0]['IdUser']?>&check=1">Truyện-tiểu thuyết</a></li>
              <li><a href="./product.php?id=<?php echo $users[0]['IdUser']?>&check=2">Khoa học công nghệ – Kinh tế</a></li>
              <li><a href="./product.php?id=<?php echo $users[0]['IdUser']?>&check=3">Giáo trình học tập</a></li>
              <li><a href="./product.php?id=<?php echo $users[0]['IdUser']?>&check=4">Kĩ năng cuộc sống</a></li>
              <li><a href="../Admin/login.php">Trang Quản lý</a></li>
              <li class="hidden-xs"><a href="./product.php?id=<?php echo $users[0]['IdUser'] ?>">Sản phẩm </a></li>
              <li>
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">login</span>
                </a>
                
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="./loginuser.php">Logout</a>
                </div>
              </li>
            </ul>
          </div>
         
        </div>
      </div>
    </div>
    </section>
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              
              <div class="aa-logo">
              
                <a href="./indexuser.php?id=<?php echo $users[0]['IdUser']?>">
                  <span class="fa fa-shopping-cart"></span>
                  <p>Quần áo đá bóng<strong>Shop</strong> <span>Knowledge is power
                    </span></p>
                </a>
               
              </div>
              
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="./cart.php?id=<?php echo $users[0]['IdUser'] ?>">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">Giỏ hàng của tôi</span>
                  <span class="aa-cart-notify"><?php echo $so ?></span>
                </a>
                
                
              </div>
            
              <div class="aa-search-box">
                <form action="./product.php" method="GET">
                  <input type="text" name="timkiem" id="timkiem" placeholder="Tìm kiếm áo">
                  <input type="hidden" name="id" id="id" value="<?php echo $users[0]['IdUser']?>">

                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
         
            </div>
          </div>
        </div>
      </div>
    </div>
  

  </header>
  <?php
  $connect->close();
  ?>