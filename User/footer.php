<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(isset($_POST['feeback'])){
      $text=$_POST['feeback'];
      $connect = new mysqli('localhost',"root","","btlquanlysach");
      mysqli_set_charset($connect,"utf8");
      if($connect->connect_error)
      {
        var_dump($connect->connect_error);
        die();
      }
      $results = mysqli_query($connect, "Insert into feedback (IdUser,text) Values(".$id.",'".$text."')");
      if($results)
      {
        echo "<script type='text/javascript'>alert('Chúng tôi đã nhận được phản hồi của bạn .Chúc bạn có một ngày vui vẻ !!');</script>";
      }
    }
  }
?>
<style>
  li{
    padding: 4px 0px 4px 0px;
  }
</style>
<section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h2>Phản hồi của người dùng</h2>
            <p>Bạn muốn tìm sách mà cửa hàng không có ?</p>
            <p>Bạn có phản hồi về sản phẩm và chất lượng bên chúng tôi ?</p>
            <p>Hãy gửi phản hồi cho chúng tôi , chúng tôi sẽ thêm và đáp ứng đúng nhu cầu của bạn đưa ra.</p>
            <form action="" class="aa-subscribe-form" method="post" >
              <div class="form-group">
              <textarea class="form-control" rows="5" placeholder="Feedback" name="feeback" required></textarea>
              <input type="submit" value="Feeback">
              </div>
            
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

  <!-- footer -->
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-footer-top-area">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <div class="aa-footer-widget">
                    <h2>Thể Loại chính</h2>
                    <ul class="aa-footer-nav">
                    <li><a href="./product.php?id=<?php echo $users[0]['IdUser']?>&check=1">Truyện-tiểu thuyết</a></li>
                    <li><a href="./product.php?id=<?php echo $users[0]['IdUser']?>&check=2">Khoa học công nghệ – Kinh tế</a></li>
                    <li><a href="./product.php?id=<?php echo $users[0]['IdUser']?>&check=3">Giáo trình học tập</a></li>
                    <li><a href="./product.php?id=<?php echo $users[0]['IdUser']?>&check=4">Kĩ năng cuộc sống</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="aa-footer-widget">
                    <div class="aa-footer-widget">
                      <h2>Người thực hiện </h2>
                      <ul class="aa-footer-nav">
                        <li><a href="#">Nguyễn Thành Nam</a></li>
                        <li><a href="#">Thái Bình</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="aa-footer-widget">
                    <div class="aa-footer-widget">
                    <h2>Liên hệ </h2>
                      <ul class="aa-footer-nav">
                        <li><a href="#">218 Lĩnh Nam - Hoàng Mai - Hà Nội</a></li>
                        <li><a href="#">Đại học Kinh Tế - Kỹ Thuật Công Nghiệp</a></li>
                        <li><a href="#">Khoa Công  Nghệ Thông Tin</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../public/user/js/bootstrap.js"></script>
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="../public/user/js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="../public/user/js/jquery.smartmenus.bootstrap.js"></script>
  <!-- To Slider JS -->
  <script src="../public/user/js/sequence.js"></script>
  <script src="../public/user/js/sequence-theme.modern-slide-in.js"></script>
  <!-- Product view slider -->
  <script type="text/javascript" src="../public/user/js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="../public/user/js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="../public/user/js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="../public/user/js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="../public/user/js/custom.js"></script>

</body>

</html>