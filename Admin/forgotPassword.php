<?php if(!empty($_POST))
    {
        $email1 = $_POST['reset'];
            // setcookie("fullname",$fullname,time()+24*60*60 ,"/");
        // setcookie("email",$email,time()+24*60*60 ,"/");
        // setcookie("Password",$Password,time()+24*60*60 ,"/");
        // header("location: process.php");
        // $_SESSION["fullname"]=$fullname;
        $connect = new mysqli('localhost',"root","","btlquanlysach");
        mysqli_set_charset($connect,"utf8");
        if($connect->connect_error)
        {
            var_dump($connect->connect_error);
            die();
        }
        $value=mysqli_query($connect,"select * from admin where Email = '$email1'");
         $users1 = mysqli_fetch_assoc($value);
        if($users1!=null){
            $passnew = 12345;
             $pass = password_hash($passnew,PASSWORD_DEFAULT);
             $query1 = " UPDATE admin SET pass ='$pass' WHERE Email='$email1' ";
        mysqli_query($connect,$query1);
        $connect->close();
         echo "<script type='text/javascript'>alert('Mật khẩu đã đổi thành 12345');</script>";
        }
        else {
            echo "<script type='text/javascript'>alert('Email này chưa đăng kí tài khoản !');</script>";
        }
       
}
?>
<!DOCTYPE html>
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
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image" style="background: url(https://images.unsplash.com/photo-1513001900722-370f803f498d?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTJ8fGJvb2tzfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60);"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Quên mật khẩu?</h1>
                                        <p class="mb-4">Hãy nhập email của bạn vào đây, chúng tôi sẽ gửi cho bạn một thông báo chứa mật khẩu mới!</p>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Nhập email" name="reset">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Lấy lại mật khẩu
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="./createAcc.php">Tạo một tài khoản!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="./login.php">Bạn có tài khoản? Đăng nhập!</a>
                                    </div>
                                </div>
                            </div>
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


