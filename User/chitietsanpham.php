<?php
ob_start();
include './header.php';
if(isset($_GET['book']))
{
  $id=$_GET['id'];
  $idbook=$_GET['book'];
  $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error)
    {
      var_dump($connect->connect_error);
      die();
    }
    $results = mysqli_query($connect, "SELECT * FROM books where IdBook=".$idbook."");
   if(mysqli_num_rows($results)>0)
   {
    $books = mysqli_fetch_all($results, MYSQLI_ASSOC);
    $resultsgoiy = mysqli_query($connect, "SELECT * FROM books where TheLoai='".$books[0]['TheLoai']."'");
   }
}
?>

<section id="aa-product-details">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-product-details-area">
          <div class="aa-product-details-content">
            <div class="row">
           
              <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="aa-product-view-slider">
                  <div id="demo-1" class="simpleLens-gallery-container">
                    <div class="simpleLens-container">
                      <div class="simpleLens-big-image-container"><a
                         class="simpleLens-lens-image"><img
                            src="../public/admin/img/<?php echo $books[0]['Img'] ?>" class="simpleLens-big-image"></a></div>
                    </div>
                  </div>
                </div>
              </div>
             
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="aa-product-view-content">
                  <h3><?php echo $books[0]['Namebook'] ?></h3>
                  <div class="aa-price-block">
                    <span style="color: red;" class="aa-product-view-price">Giá tiền : <?php echo $books[0]['Gia'] ?>đ</span>
                    <p class="aa-product-avilability">Tác Giả : <span><?php echo $books[0]['TacGia'] ?></span></p>
                  </div>
                  <p><?php echo $books[0]['noidung'] ?></p>
                  <div class="aa-prod-quantity">
                    <p>Số lượng còn :</p><input style=" width: 20%;" type="text" disabled name="soluong" value="<?php if($books[0]['Soluong']>1){echo $books[0]['Soluong'];}else{echo "hết hàng";}?>">
                    <p class="aa-prod-category">
                      Thể Loại : <a href="#"><?php echo $books[0]['TheLoai'] ?></a>
                    </p>
                  </div>
                  <div class="aa-prod-view-bottom">
                    <?php 
                    if( $books[0]['Soluong']>1)
                    {
                      echo" <a class='aa-add-to-cart-btn' href='./cart.php?id=".$id."&book=".$idbook."&soluong=1'>Thêm vào giỏ hàng</a>";
                    }
                    ?>
                    <a class="aa-add-to-cart-btn" href="./indexuser.php?id=<?php echo $id;?>">Trở về</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="aa-product-related-item">
            <h3>Sản phẩm liên quan</h3>
            <ul class="aa-product-catg aa-related-item-slider">
            
              <?php if (mysqli_num_rows($resultsgoiy) > 0) {
                    $book1 = mysqli_fetch_all($resultsgoiy, MYSQLI_ASSOC);
                    foreach ($book1 as $book) {
                      if($book['Soluong']<1)
                      {
                        echo "
                      <li >
                      <figure>
                        <a style='display: flex;justify-content:center;' class='aa-product-img' href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."'><img style='width: 75%;box-shadow: 1px 1px 8px 2px black;'
                            src='../public/admin/img/".$book['Img']."' alt='Lỗi ảnh'></a>
                            <a style='color:red;cursor: default;background-color:white;'  class='aa-add-card-btn' href='#' onclick='return false;' ></span>Đã hết hàng</a>
                        <figcaption>
                          <h4 class='aa-product-title'><a style='font-weight:bold;' href='#'>".$book['Namebook']."</a></h4>
                          <span class='aa-product-price'>Hết hàng</span>
                        </figcaption>
                      </figure>
                      <div class='aa-product-hvr-content'>
                        <a href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."' data-toggle2='tooltip' data-placement='top' title='Xem sản phẩm' data-toggle='modal'
                          ><span class='fa fa-search'></span></a>
                      </div>
                      </li>
                            ";

                      }
                      else{
                        echo "
                      <li >
                      <figure>
                        <a style='display: flex;justify-content:center;' class='aa-product-img' href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."'><img style='width: 75%;box-shadow: 1px 1px 8px 2px black;'
                            src='../public/admin/img/".$book['Img']."' alt='Lỗi ảnh'></a>
                        <a class='aa-add-card-btn' href='./cart.php?id=".$id."&book=".$book['IdBook']."&soluong=1'><span class='fa fa-shopping-cart'></span>Thêm giỏ hàng</a>
                        <figcaption>
                          <h4 class='aa-product-title'><a style='font-weight:bold;' href='#'>".$book['Namebook']."</a></h4>
                          <span class='aa-product-price'>".$book['Gia']."đ</span>
                        </figcaption>
                      </figure>
                      <div class='aa-product-hvr-content'>
                        <a href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."' data-toggle2='tooltip' data-placement='top' title='Xem sản phẩm' data-toggle='modal'
                          ><span class='fa fa-search'></span></a>
                      </div>
                      </li>
                            ";

                      }
                    } }
                    ?>
                <?php $connect->close(); ?>
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
  </div>
</section>
<?php
include './footer.php';
?>