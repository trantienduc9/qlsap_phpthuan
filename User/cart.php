<?php
ob_start();
include './header.php';
if(isset($_GET['soluong'])){
  $id=$_GET['id'];
  $idbook =$_GET['book'];
  $soluong =$_GET['soluong'];
  $connect = new mysqli('localhost',"root","","btlquanlysach");
  mysqli_set_charset($connect,"utf8");
  if($connect->connect_error)
  {
    var_dump($connect->connect_error);
    die();
  }
  //check gia sp
  $results = mysqli_query($connect, "SELECT * FROM books where Idbook=".$idbook."");
  $books = mysqli_fetch_all($results, MYSQLI_ASSOC);
  if($books[0]['Gia']>0)
  {
    $giaca = $books[0]['Gia'];
  }
  
  //cap nhat so luong hoa don
  $check = mysqli_query($connect, "SELECT books.Namebook,books.Img,books.gia,hoadon.SoLuong FROM books INNER JOIN hoadon ON (books.IdBook=hoadon.IdBook) WHERE hoadon.IdUser =".$id." AND hoadon.IdBook=".$idbook."");
  if(mysqli_num_rows($check) > 0){
    $soluongnew = mysqli_fetch_all($check, MYSQLI_ASSOC);
    $soluong+=$soluongnew[0]['SoLuong'];
    $giohang =mysqli_query($connect, "update hoadon set soluong=".$soluong." where IdBook = ".$idbook."" );
  }
  else{
    mysqli_query($connect, "Insert into hoadon(IdUser, IdBook, SoLuong, Gia) Value (".$id.",".$idbook.",".$soluong.",".$giaca.")");
  }
  $giohang = mysqli_query($connect, "SELECT hoadon.IdUser,hoadon.IdBook, books.Namebook,books.Img,books.gia,hoadon.SoLuong ,books.SoLuong as 'sum' FROM books INNER JOIN hoadon ON (books.IdBook=hoadon.IdBook) WHERE hoadon.IdUser =".$id." ");
  $summoney = mysqli_query($connect, "SELECT SUM(SoLuong*Gia) FROM  hoadon WHERE IdUser=".$id." GROUP by IdUser ");
}
if(isset($_GET['id'])){
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
}
?>
<?php
 
 ?>
 
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action='./updatecart.php?>' method="get">
             
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng </th>
                        <th>Tổng tiền</th>
                        <input type='hidden' name='id'  value='<?php echo $id?>'>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                      if (mysqli_num_rows($giohang) > 0) {
                        $hoadons = mysqli_fetch_all($giohang, MYSQLI_ASSOC);
                        $index =1;
                        foreach ($hoadons as $hoadon) {
                          echo "
                          <tr>
                          <td><a class='remove' href='./deletesanpham.php?idhoa=".$hoadon['IdBook']."&iddon=".$hoadon['IdUser']."'><fa class='fa fa-close'></fa></a></td>
                          <td><a href=#'><img src='../public/admin/img/".$hoadon['Img']."' alt='img'></a></td>
                          <td><a class='aa-cart-title' href='#'>".$hoadon['Namebook']."</a></td>
                          <td>".$hoadon['gia']."</td>
                          <td><input class='aa-cart-quantity' name='".$index++."' min='1' max ='".$hoadon['sum']."'  type='number' value='".$hoadon['SoLuong']."'></td>
                          <td>".$hoadon['gia']*$hoadon['SoLuong']."</td>
                      </tr>      
                          ";
                        }
                        echo "
                        <tr>
                        <td colspan='6' class='aa-cart-view-bottom'>
                          <input class='aa-cart-view-btn' type='submit' value='Thêm vào giỏ hàng'>
                        </td>
                      </tr>
                      ";
                      } 
                      ?>
                      
                      <!-- <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <a href="./quaylai.php" class="aa-cart-view-btn" >Quay lại</a>
                        </td>
                      </tr> -->
                      </tbody>
                  </table>
                </div>
             </form>
           
             <div class="cart-view-total">
               <h4>Tổng hóa đơn</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Tổng tiền</th>
                     <td><?php
                     if(mysqli_num_rows($summoney)>0)
                     {
                      $sumtien = mysqli_fetch_all($summoney,MYSQLI_ASSOC);
                      if($sumtien[0]['SUM(SoLuong*Gia)']>0)
                               {echo $sumtien[0]['SUM(SoLuong*Gia)'];}
                      else{echo "0";}
                     }
                     else{echo "0";}?></td>
                   </tr>
                  
                 </tbody>
               </table>
               <?php
                     if(mysqli_num_rows($summoney)>0)
                     {
                       echo "<a href='./pay.php?id=".$id."' class='aa-cart-view-btn'>Thanh toán</a>";
                     }
               ?>
             </div>
             <?php $connect->close(); ?>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <?php
  include './footer.php'; 
  ?>