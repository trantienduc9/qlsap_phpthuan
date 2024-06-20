
<!DOCTYPE html>
<?php
ob_start();
  if(!empty($_POST))
  {
      $email1 = $_POST['email1'];
      $pass1 = $_POST['pass1'];
      $connect = new mysqli('localhost',"root","","btlquanlysach");
      mysqli_set_charset($connect,"utf8");
      if($connect->connect_error)
      {
          var_dump($connect->connect_error);
          die();
      }
     $query1 = "select * from user where Email = '$email1'";
     $value = mysqli_query($connect,$query1);
     $users = mysqli_fetch_assoc($value);
     if($users!=null){
         $checkpass = password_verify($pass1,$users['pass']);
        if($checkpass)
        {
            header("Location: ./indexuser.php?id=".$users['IdUser']."");
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
        <title>Đăng nhập</title>
        <link href="../public/admin/css/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body  class="bg-primary">
        <div id="layoutAuthentication">
            <div style="background-repeat: no-repeat;background-size: cover;background-image: url('../public/admin/img/back.jpg');" id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div style=" background-color: transparent;backdrop-filter: contrast(0.5);"class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 style="color: white;font-family: cursive;letter-spacing: 3px;" class="text-center font-weight-light my-4">Đăng Nhập</h3>
                                        <h6 style="color: white;font-family: cursive" class="text-center font-weight-light my-4">Đăng nhập với tư cách khách hàng</h6>
                                </div>
                                    <div class="card-body">
                                        <form class="was-validated" method="POST" action="">
                                            <div class="form-floating mb-3">
                                                <input class="form-control form-control-user" id="inputEmail" type="email" placeholder="name@example.com" name="email1" required/>
                                                <label for="inputEmail">Tài khoản Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control form-control-user" id="inputPassword" type="password" placeholder="Password" name="pass1" required />
                                                <label for="inputPassword">Mật khẩu</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Login</button>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a style="color:white"  class="small" href="./fogotpassuser.php">Quên mật khẩu</a>
                                                
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a style="color:white"  href="./createUser.php">Tạo tài khoản </a></div>
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
