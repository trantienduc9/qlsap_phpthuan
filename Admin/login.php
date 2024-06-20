
<!DOCTYPE html>
<?php
ob_start();
 if(!empty($_POST))
 {
     $email1 = $_POST['email1'];
     $pass1 = $_POST['pass1'];
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
    $query1 = "select * from admin where Email = '$email1' ";
    $value = mysqli_query($connect,$query1);
    $dataa = mysqli_fetch_assoc($value);
   if($dataa!=null) {
    $checkpass1 = password_verify($pass1,$dataa['pass']);
      if($checkpass1)
      {
        header("Location: ./index.php?iad=".$dataa['IdAd']."");
      }
      else
      {
          echo "<script type='text/javascript'>alert('Sai tài khoản hoặc mật khẩu');</script>";
      }
   }
   else
   {
    echo "<script type='text/javascript'>alert('Email không tồn tại!');</script>";
   }
        $connect->close();
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="../public/admin/css/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary" style="background: url(https://images.pexels.com/photos/5407054/pexels-photo-5407054.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);background-position:center">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5" style="margin-top: 3rem;">
                                <div class="card shadow-lg border-0 rounded-lg mt-5" style="background:rgb(29 39 47 / 66%);">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4" style="color:azure;">Login | Admin</h3></div>
                                    <div class="card-body">
                                        <form class="was-validated" method="POST" action="">
                                            <div class="form-floating mb-3">
                                                <input class="form-control form-control-user" id="inputEmail" type="email" placeholder="name@example.com" name="email1" required/>
                                                <label for="inputEmail">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control form-control-user" id="inputPassword" type="password" placeholder="Password" name="pass1" required />
                                                <label for="inputPassword">Mật khẩu</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="./forgotPassword.php" style=" color:azure; font-size :1.2rem;">Quên mật khẩu?</a>
                                                
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="./createAcc.php" style=" color:azure; font-size: 1.2rem;"> Đăng ký ngay!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../public/admin/js/scripts.js"></script>
    </body>
</html>
