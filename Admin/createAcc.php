
<!DOCTYPE html>
<?php
    if(!empty($_POST))
    {
        $fullname = $_POST['nameadmin'];
        $email = $_POST['email'];
        $Password = $_POST['password'];
        $connect = new mysqli('localhost',"root","","btlquanlysach");
        mysqli_set_charset($connect,"utf8");
        if($connect->connect_error)
        {
            var_dump($connect->connect_error);
            die();
        }
        $kiemtra =  mysqli_query($connect,"select * from  admin where Email = '".$email."'");
        $data = mysqli_fetch_array($kiemtra);
        if($data==null) {
        $pass = password_hash($Password,PASSWORD_DEFAULT);
        $check=  mysqli_query($connect,"INSERT INTO admin (NameAdmin , Email ,pass) VALUES ('$fullname','$email','$pass')");
            header("location:./login.php");
             $connect->close();
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
    <title>Register</title>
    <link href="../public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../public/admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary" style="background:rgb(36 121 121 / 59%);">
    <div class="container">
      <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"  style="background: url(https://images.unsplash.com/photo-1513001900722-370f803f498d?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTJ8fGJvb2tzfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60https://images.unsplash.com/photo-1452421822248-d4c2b47f0c81?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fGJvb2tzfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60);"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">TẠO TÀI KHOẢN!</h1>
                                <h1 class="h4 text-gray-900 mb-4">ADMIN</h1>
                            </div>
                            <form class="user was-validated" method="POST" action="">
                                <div class="form-group row "> 
                                <label for="nameadmin">Tên tài khoản : </label>
                                    <input type="text" class="form-control form-control-user" id="nameadmin" placeholder="Enter Name" name="nameadmin" required>
                                         <div class="valid-feedback">Đúng</div>
                                        <div class="invalid-feedback">Vui lòng nhập lại</div>
                                </div>
                                <div class="form-group row "> 
                                <label for="Email">Email :</label>
                                    <input type="email" class="form-control form-control-user" id="email" placeholder="Enter Email" name="email" required>
                                         <div class="valid-feedback">Đúng</div>
                                        <div class="invalid-feedback">Vui lòng nhập đúng định dạng!</div>
                                </div>
                                <div class="form-group row "> 
                                <label for="password">Password : </label>
                                    <input type="password" class="form-control form-control-user" id="password" placeholder="Enter Password" name="password" required>
                        
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Tạo tài khoản
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="./forgotPassword.php">Quên mật khẩu?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="./login.php">Đăng nhập!</a>
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
    <script src="../public/admin/js/sb-admin-2.min.js"></script>
</body>

