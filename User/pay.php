<?php
ob_start();
include './header.php';
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $connect = new mysqli('localhost',"root","","btlquanlysach");
  mysqli_set_charset($connect,"utf8");
  if($connect->connect_error)
  {
    var_dump($connect->connect_error);
    die();
  }
  $giohang = mysqli_query($connect, "SELECT hoadon.IdUser,hoadon.IdBook, books.Namebook,books.Img,books.gia,hoadon.SoLuong,books.SoLuong as 'sum' FROM books INNER JOIN hoadon ON (books.IdBook=hoadon.IdBook) WHERE hoadon.IdUser =".$id." ");
  $summoney = mysqli_query($connect, "SELECT SUM(SoLuong*Gia) FROM  hoadon WHERE IdUser=".$id." GROUP by IdUser ");
  $sumtien = mysqli_fetch_all($summoney,MYSQLI_ASSOC);
}
if(isset($_POST['name']))
    {
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $Phone = $_POST['Phone'];
        $diachi = $_POST['diachi'];
        $note = $_POST['note'];
        $connect1 = new mysqli("localhost","root","","btlquanlysach");
        mysqli_set_charset($connect1,"utf8");
        if($connect1->connect_error)
        {
            var_dump($connect1->connect_error);
            die();
        }

         $check=  mysqli_query($connect1,"INSERT INTO giaohang (IdUser,Name, Email ,SDT,	Diacchi,Sum,ngay,note) VALUES (".$id.",'$fullname','$email',$Phone,'$diachi', ".$sumtien[0]['SUM(SoLuong*Gia)'].",now(),'$note')");
        if($check)
        {
          $giohang = mysqli_query($connect1, "SELECT hoadon.IdBook,hoadon.SoLuong,books.SoLuong as 'sum' FROM books INNER JOIN hoadon ON (books.IdBook=hoadon.IdBook) WHERE hoadon.IdUser =".$id." ");
          if(mysqli_num_rows($giohang)>0){
            $update = mysqli_fetch_all($giohang,MYSQLI_ASSOC);
            $idbook = array();
            $tien = array();
            foreach($update as $update)
            {
              array_push($idbook,$update['IdBook']);
              array_push($tien,($update['sum']-$update['SoLuong']));
            }
            for($i=0;$i<count($idbook);$i++)
            {
              $capnhat=mysqli_query($connect1,"update books set SoLuong = ".$tien[$i]." where IdBook = ".$idbook[$i]."");
            }
            $deletehoadon=mysqli_query($connect1,"delete from hoadon where IdUser =".$id."");
            header("location:./thanksyou.php?id=".$id."");
            $connect1->close();
          }
        }
    }
?>
<!-- Cart view section -->
<section id="checkout">
  <div class="container">
    <div class="row">
      <div class="col-md-8" style="border-radius: 13px;border-style: solid;border-color: beige;">
        <form action="" class="was-validated" method="post">
          <div class="form-group">
            <label for="name">Tên :</label>
            <input type="text" class="form-control" id="name" placeholder="Họ và tên" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" placeholder="Email " name="email" required>
          </div>
          <div class="form-group">
            <label for="Phone">Số Điện thoại :</label>
            <input type="tel" class="form-control" id="Phone" placeholder="Số điện thoại" name="Phone" required>
          </div>
          <label for="diachi">Địa chỉ :</label>
          <div class="form-group">
            <textarea class="form-control" rows="5" placeholder="Địa chỉ" name="diachi" required></textarea>
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="5" placeholder="Ghi chú" name="note"></textarea>
          </div>
          <div style="display:flex;justify-content: center;" class="form-group">
            <button type="submit" class="btn btn-light">Thanh Toán</button>
          </div>

        </form>
      </div>
      <div style="border-radius: 13px;border-style: solid;border-color: red;" class="col-md-4">
        <div class="checkout-right">
          <h4>Hóa đơn</h4>
          <div class="aa-order-summary-area">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Sản phẩm</th>
                  <th>Tổng</th>
                </tr>
              </thead>
              <tbody>
                <?php
          if(mysqli_num_rows($giohang)>0){
              $products = mysqli_fetch_all($giohang,MYSQLI_ASSOC);
              foreach($products as $product)
              {
                echo " <tr>
                <td>".$product['Namebook']." <strong> x ".$product['SoLuong']."  </strong></td>
                <td>".$product['gia']*$product['SoLuong']."đ</td>
              </tr>
              ";
              }
          }
          ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Tổng đơn hàng</th>
                  <td><?php echo $sumtien[0]['SUM(SoLuong*Gia)'] ?>đ</td>
                </tr>
                <?php $connect->close(); ?>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>
  </div>
</section>
<?php
include './footer.php';
?>