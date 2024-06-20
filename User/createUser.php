
<!DOCTYPE html>
<?php

    if(isset($_POST['email']))
    {
        $fullname = $_POST['nameuser'];
        $email = $_POST['email'];
        $Password = $_POST['password'];
        $sdt = $_POST['phoneuser'];
        $connect1 = new mysqli("localhost","root","","btlquanlysach");
        mysqli_set_charset($connect1,"utf8");
        if($connect1->connect_error)
        {
            var_dump($connect->connect_error);
            die();
        }
        $kiemtra =  mysqli_query($connect1,"select * from  user where Email = '".$email."'");
        $data = mysqli_fetch_array($kiemtra);
        if($data==null) {
            $pass = password_hash($Password,PASSWORD_DEFAULT);
            $check=  mysqli_query($connect1,"INSERT INTO user (NameUser, Email ,pass,SDT) VALUES ('$fullname','$email','$pass','$sdt')");
             header("location:./loginuser.php");
             $connect1->close();
        }
        else {
            echo "<script type='text/javascript'>alert('Email đã tồn tại');</script>";
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
    <title>Tạo tài khoản</title>
    <link href="../public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../public/admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body style="background-repeat: no-repeat;background-size: cover;background-image: url('../public/admin/img/create.jpg');" class="bg-gradient-primary">
    <div class="container">
      <div style="
    background: transparent;
" class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-2 "></div>
                    <div class="col-lg-8">
                        <div style="backdrop-filter: brightness(0.5);" class="p-5">
                            <div class="text-center">
                                <h1 style="color:white;font-family: cursive;letter-spacing: 3px;" class="h4  mb-4">TẠO TÀI KHOẢN!</h1>
                            </div>
                            <form class="user was-validated" method="POST" action="">
                                <div class="form-group row "> 
                                <label style="color: white" for="nameuser">Tên tài khoản : </label>
                                    <input type="text" class="form-control form-control-user" id="nameuser" placeholder="Enter Name" name="nameuser" required>
                                </div>
                                <div class="form-group row "> 
                                <label style="color: white" for="Email">Email :</label>
                                    <input type="email" class="form-control form-control-user" id="email" placeholder="Enter Email" name="email" required>       
                                </div>
                                <div class="form-group row "> 
                                <label style="color: white" for="phoneuser">Số điện thoại : </label>
                                    <input type="tel" class="form-control form-control-user" id="phoneuser" placeholder="Enter SDT" name="phoneuser" pattern="(03|05|07|08|09|01[2|6|8|9])+([0-9]{7,10})\b" required>
                                </div>
                                <div class="form-group row "> 
                                <label style="color: white" for="password">Password : </label>
                                    <input type="password" class="form-control form-control-user" id="password" placeholder="Enter Password" name="password" required>                       
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Tạo tài khoản
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a style="color: white" class="small" href="./fogotpassuser.php">Quên mật khẩu?</a>
                            </div>
                            <div class="text-center">
                                <a style="color: white" class="small" href="./loginuser.php">Đã có tài khoản/Đăng nhập!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 "></div>
                </div>
            </div>
        </div>

    </div>
    <script src="../public/admin/vendor/jquery/jquery.min.js"></script>
    <script src="../public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../public/admin/js/sb-admin-2.min.js"></script>
</body>

</html>