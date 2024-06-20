<?php
ob_start();
include('./header.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<section id="aa-error">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-error-area">
            <h2>Thank you</h2>
            <span>Đặt hàng thành công</span>
            <p>Cảm ơn quý khác đã tin tưởng và ủng hộ chúng tôi . Nếu có thắc mắc xin hay để lại ý kiến ở phần dưới!</p>
            <a href="./indexuser.php?id=<?php echo $id ?>"> Trở về trang chủ</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
include('./footer.php');
?>