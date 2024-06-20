
<!DOCTYPE html>
<?php
 if(!empty($_POST))
 {
     $email1 = $_POST['reset'];
     $connect = new mysqli('localhost',"root","","btlquanlysach");
     mysqli_set_charset($connect,"utf8");
     if($connect->connect_error)
     {
         var_dump($connect->connect_error);
         die();
     }
     $value=mysqli_query($connect,"select * from user where Email = '$email1'");
     $users = mysqli_fetch_assoc($value);
     if($users!=null)
     {
        $passnew = 12345;
        $pass = password_hash($passnew,PASSWORD_DEFAULT);
       
        $query1 = " UPDATE user SET pass ='".$pass."' WHERE Email='$email1' ";
       mysqli_query($connect,$query1);
        $connect->close();
        echo "<script type='text/javascript'>alert('Mật khẩu đã đổi thành 12345');</script>";
     }
     else
     {
        echo "<script type='text/javascript'>alert('Email này chưa đăng kí tài khoản !');</script>";
     }
     
    
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Quên mật khẩu</title>
    <link href="../public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../public/admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body style="background-repeat: no-repeat;background-size: cover;background-image: url('../public/admin/img/quenpass.jpg');" class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div style="background: transparent;" class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div style="background: aliceblue;" class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Bạn Quên mật khẩu ?</h1>
                                        <p class="mb-4">Chúng tôi sẽ giúp bạn lấy lại ,bạn chỉ cần nhập đúng email tài khoản chúng tôi sẽ thông báo mật khẩu cho bạn </p>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="reset">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="./createUser.php">Tạo tài khoản</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="./loginuser.php">Đã có tài khoản?Đăng nhập</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../public/admin/vendor/jquery/jquery.min.js"></script>
    <script src="../public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../public/admin/s/sb-admin-2.min.js"></script>
</body>

</html>