<?php
ob_start();
include './header.php';
if(isset($_GET['id'])){ 
  $id=$_GET['id'];
  $connect = new mysqli('localhost',"root","","btlquanlysach");
  mysqli_set_charset($connect,"utf8");
  if($connect->connect_error)
  {
    var_dump($connect->connect_error);
    die();
  }
  $results1 = mysqli_query($connect,"SELECT * from books where TheLoai='Tiểu thuyết' LIMIT 8 ");
  $results2 = mysqli_query($connect,"SELECT * from books where TheLoai='Khoa học công nghệ' LIMIT 8 ");
  $results3 = mysqli_query($connect,"SELECT * from books where TheLoai='Giáo trình' LIMIT 8 ");
  $results4 = mysqli_query($connect,"SELECT * from books where TheLoai='Kĩ năng' LIMIT 8 ");
  $thinhhanh = mysqli_query($connect,"SELECT * from books order by Soluong DESC LIMIT 10 ");
  $muanhieu = mysqli_query($connect,"SELECT * from books order by Soluong ASC LIMIT 10 ");
  $moinhat = mysqli_query($connect,"SELECT * from books order by Ngaydang DESC LIMIT 10 ");

}
else{
  header("location: ./loginuser.php");
}
?>
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            
            <li>
              <div class="seq-model">
                <img  data-seq src="../public/admin/img/triethoc.png"
                  alt="Men slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Sách Mới</span>
                <h2 data-seq>Triết học</h2>
                <p data-seq>Sách đã được cập nhật bản mới nhất trên hệ thống.</p>
                <a data-seq href="./product.php?id=<?php echo $id ?>" class="aa-shop-now-btn aa-secondary-btn">Mua ngay</a>
              </div>
            </li>
            
            <li>
              <div class="seq-model">
                <img  data-seq src="../public/admin/img/hccm.png"
                  alt="Wristwatch slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Mới Về</span>
                <h2 data-seq>Tư tưởng Hồ Chí Minh</h2>
                <p data-seq>Sách đã được cập nhật bản mới nhất trên hệ thống.</p>
                <a data-seq href="./product.php?id=<?php echo $id ?>" class="aa-shop-now-btn aa-secondary-btn">Mua ngay</a>
              </div>
            </li>
            
            <li>
              <div class="seq-model">
                <img  data-seq src="../public/admin/img/mac_lein.jpg"
                  alt="Women Jeans slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Bán Chạy</span>
                <h2 data-seq>Kinh tế chính trị</h2>
                <p data-seq>Sách đã được cập nhật bản mới nhất trên hệ thống.</p>
                <a  data-seq href="./product.php?id=<?php echo $id ?>" class="aa-shop-now-btn aa-secondary-btn">Mua ngay</a>
              </div>
            </li>
            
            <li>
              <div class="seq-model">
                <img  data-seq src="../public/admin/img/lichsudang.jpg"
                  alt="Shoes slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Phổ Biến</span>
                <h2 data-seq>Lịch sử đảng cộng sản Việt Nam </h2>
                <p data-seq>Sách đã được cập nhật bản mới nhất trên hệ thống.</p>
                <a data-seq href="./product.php?id=<?php echo $id ?>" class="aa-shop-now-btn aa-secondary-btn">Mua nay</a>
              </div>
            </li>
          </ul>
        </div>
       
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
             
                <ul class="nav nav-tabs aa-products-tab">
                  <li class="active"><a href="#men" data-toggle="tab">Tiểu thuyết</a></li>
                  <li><a href="#women" data-toggle="tab">Khoa học</a></li>
                  <li><a href="#sports" data-toggle="tab">Giáo trình</a></li>
                  <li><a href="#electronics" data-toggle="tab">Văn học</a></li>
                </ul>
              
                <div class="tab-content">
                  <div class="tab-pane fade in active" id="men">
                    <ul class="aa-product-catg">
                    <?php if (mysqli_num_rows($results1) > 0) {
                    $books = mysqli_fetch_all($results1, MYSQLI_ASSOC);
                    foreach ($books as $book) {
                      if($book['Soluong']<1)
                      {
                        echo "
                      <li >
                      <figure>
                        <a class='aa-product-img' href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."'><img style='width: 75%;box-shadow: 1px 1px 8px 2px black;'
                            src='../public/admin/img/".$book['Img']."' alt='Lỗi ảnh'></a>
                        <a style='color:red;cursor: default;background-color:white;'  class='aa-add-card-btn' href='#' onclick='return false;'' ></span>Đã hết hàng</a>
                        <figcaption>
                          <h4 class='aa-product-title'><a style='font-weight:bold;' href='#'>".$book['Namebook']."</a></h4>
                          <span class='aa-product-price'>Hết hàng</span>
                        </figcaption>
                      </figure>
                      <div class='aa-product-hvr-content'>
                        <a  href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."' data-toggle2='tooltip' data-placement='top' title='Xem sản phẩm' data-toggle='modal'
                          ><span class='fa fa-search'></span></a>
                      </div>
                      </li>
                            ";

                      }
                      else{
                        echo "
                        <li >
                        <figure>
                          <a class='aa-product-img' href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."'><img style='width: 75%;box-shadow: 1px 1px 8px 2px black;'
                              src='../public/admin/img/".$book['Img']."' alt='Lỗi ảnh'></a>
                          <a  class='aa-add-card-btn' href='./cart.php?id=".$id."&book=".$book['IdBook']."&soluong=1' ><span class='fa fa-shopping-cart'></span>Thêm giỏ hàng</a>
                          <figcaption>
                            <h4 class='aa-product-title'><a style='font-weight:bold;' href='#'>".$book['Namebook']."</a></h4>
                            <span class='aa-product-price'>".$book['Gia']."đ</span>
                          </figcaption>
                        </figure>
                        <div class='aa-product-hvr-content'>
                          <a  href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."' data-toggle2='tooltip' data-placement='top' title='Xem sản phẩm' data-toggle='modal'
                            ><span class='fa fa-search'></span></a>
                        </div>
                        </li>
                              ";
                        
                      }
                      
                    } }
                    ?>
                    </ul>
                    <a class="aa-browse-btn" href="./product.php?id=<?php echo $id ?>">Xem tất cả sản phẩm <span
                        class="fa fa-long-arrow-right"></span></a>
                  </div>
                  <div class="tab-pane fade" id="women">
                    <ul class="aa-product-catg">
                      
                      <?php if (mysqli_num_rows($results2) > 0) {
                    $books = mysqli_fetch_all($results2, MYSQLI_ASSOC);
                    foreach ($books as $book) {if($book['Soluong']<1)
                      {
                        echo "
                      <li >
                      <figure>
                        <a class='aa-product-img' href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."'><img style='width: 75%;box-shadow: 1px 1px 8px 2px black;'
                            src='../public/admin/img/".$book['Img']."' alt='Lỗi ảnh'></a>
                        <a style='color:red;cursor: default;background-color:white;'  class='aa-add-card-btn' href='#' onclick='return false;' ></span>Đã hết hàng</a>
                        <figcaption>
                          <h4 class='aa-product-title'><a style='font-weight:bold;' href='#'>".$book['Namebook']."</a></h4>
                          <span class='aa-product-price'>Hết hàng</span>
                        </figcaption>
                      </figure>
                      <div class='aa-product-hvr-content'>
                        <a  href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."' data-toggle2='tooltip' data-placement='top' title='Xem sản phẩm' data-toggle='modal'
                          ><span class='fa fa-search'></span></a>
                      </div>
                      </li>
                            ";

                      }
                      else{
                        echo "
                        <li >
                        <figure>
                          <a class='aa-product-img' href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."'><img style='width: 75%;box-shadow: 1px 1px 8px 2px black;'
                              src='../public/admin/img/".$book['Img']."' alt='Lỗi ảnh'></a>
                          <a  class='aa-add-card-btn' href='./cart.php?id=".$id."&book=".$book['IdBook']."&soluong=1' ><span class='fa fa-shopping-cart'></span>Thêm giỏ hàng</a>
                          <figcaption>
                            <h4 class='aa-product-title'><a style='font-weight:bold;' href='#'>".$book['Namebook']."</a></h4>
                            <span class='aa-product-price'>".$book['Gia']."đ</span>
                          </figcaption>
                        </figure>
                        <div class='aa-product-hvr-content'>
                          <a  href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."' data-toggle2='tooltip' data-placement='top' title='Xem sản phẩm' data-toggle='modal'
                            ><span class='fa fa-search'></span></a>
                        </div>
                        </li>
                              ";
                        
                      }
                    } }
                    ?>
                    </ul>
                    <a class="aa-browse-btn" href="./product.php?id=<?php echo $id ?>">Xem tất cả sản phẩm <span
                        class="fa fa-long-arrow-right"></span></a>
                  </div>
               
                  <div class="tab-pane fade" id="sports">
                    <ul class="aa-product-catg">
                    <?php if (mysqli_num_rows($results3) > 0) {
                    $books = mysqli_fetch_all($results3, MYSQLI_ASSOC);
                    foreach ($books as $book) {if($book['Soluong']<1)
                      {
                        echo "
                      <li >
                      <figure>
                        <a class='aa-product-img' href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."'><img style='width: 75%;box-shadow: 1px 1px 8px 2px black;'
                            src='../public/admin/img/".$book['Img']."' alt='Lỗi ảnh'></a>
                        <a style='color:red;cursor: default;background-color:white;'  class='aa-add-card-btn' href='#' onclick='return false;' ></span>Đã hết hàng</a>
                        <figcaption>
                          <h4 class='aa-product-title'><a style='font-weight:bold;' href='#'>".$book['Namebook']."</a></h4>
                          <span class='aa-product-price'>Hết hàng</span>
                        </figcaption>
                      </figure>
                      <div class='aa-product-hvr-content'>
                        <a  href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."' data-toggle2='tooltip' data-placement='top' title='Xem sản phẩm' data-toggle='modal'
                          ><span class='fa fa-search'></span></a>
                      </div>
                      </li>
                            ";

                      }
                      else{
                        echo "
                        <li >
                        <figure>
                          <a class='aa-product-img' href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."'><img style='width: 75%;box-shadow: 1px 1px 8px 2px black;'
                              src='../public/admin/img/".$book['Img']."' alt='Lỗi ảnh'></a>
                          <a  class='aa-add-card-btn' href='./cart.php?id=".$id."&book=".$book['IdBook']."&soluong=1' ><span class='fa fa-shopping-cart'></span>Thêm giỏ hàng</a>
                          <figcaption>
                            <h4 class='aa-product-title'><a style='font-weight:bold;' href='#'>".$book['Namebook']."</a></h4>
                            <span class='aa-product-price'>".$book['Gia']."đ</span>
                          </figcaption>
                        </figure>
                        <div class='aa-product-hvr-content'>
                          <a  href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."' data-toggle2='tooltip' data-placement='top' title='Xem sản phẩm' data-toggle='modal'
                            ><span class='fa fa-search'></span></a>
                        </div>
                        </li>
                              ";
                        
                      }
                    } }
                    ?>
                    </ul>
                  </div>
                 
                  <div class="tab-pane fade" id="electronics">
                    <ul class="aa-product-catg">
                    <?php if (mysqli_num_rows($results4) > 0) {
                    $books = mysqli_fetch_all($results4, MYSQLI_ASSOC);
                    foreach ($books as $book) {
                      if($book['Soluong']<1)
                      {
                        echo "
                      <li >
                      <figure>
                        <a class='aa-product-img' href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."'><img style='width: 75%;box-shadow: 1px 1px 8px 2px black;'
                            src='../public/admin/img/".$book['Img']."' alt='Lỗi ảnh'></a>
                        <a style='color:red;cursor: default;background-color:white;'  class='aa-add-card-btn' href='#' onclick='return false;' ></span>Đã hết hàng</a>
                        <figcaption>
                          <h4 class='aa-product-title'><a style='font-weight:bold;' href='#'>".$book['Namebook']."</a></h4>
                          <span class='aa-product-price'>Hết hàng</span>
                        </figcaption>
                      </figure>
                      <div class='aa-product-hvr-content'>
                        <a  href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."' data-toggle2='tooltip' data-placement='top' title='Xem sản phẩm' data-toggle='modal'
                          ><span class='fa fa-search'></span></a>
                      </div>
                      </li>
                            ";

                      }
                      else{
                        echo "
                        <li >
                        <figure>
                          <a class='aa-product-img' href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."'><img style='width: 75%;box-shadow: 1px 1px 8px 2px black;'
                              src='../public/admin/img/".$book['Img']."' alt='Lỗi ảnh'></a>
                          <a  class='aa-add-card-btn' href='./cart.php?id=".$id."&book=".$book['IdBook']."&soluong=1' ><span class='fa fa-shopping-cart'></span>Thêm giỏ hàng</a>
                          <figcaption>
                            <h4 class='aa-product-title'><a style='font-weight:bold;' href='#'>".$book['Namebook']."</a></h4>
                            <span class='aa-product-price'>".$book['Gia']."đ</span>
                          </figcaption>
                        </figure>
                        <div class='aa-product-hvr-content'>
                          <a  href='./chitietsanpham.php?id=".$id."&book=".$book['IdBook']."' data-toggle2='tooltip' data-placement='top' title='Xem sản phẩm' data-toggle='modal'
                            ><span class='fa fa-search'></span></a>
                        </div>
                        </li>
                              ";
                        
                      }
                    } }
                    ?>
                    </ul>
                    <a class="aa-browse-btn" href="./product.php?id=<?php echo $id ?>">Xem tất cả sản phẩm <span
                        class="fa fa-long-arrow-right"></span></a>
                  </div>
                 
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-banner-area">
              <a href="#"><img style="width:100% "
                  src="../public/admin/img/meomeo.png"
                  alt="fashion banner img"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
             
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" data-toggle="tab">Thịnh hành</a></li>
                <li><a href="#featured" data-toggle="tab">Mới nhất</a></li>
                <li><a href="#latest" data-toggle="tab">Mua nhiều</a></li>                    
              </ul>
             
              <div class="tab-content">
                
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                   
                   
                     <?php if (mysqli_num_rows($thinhhanh) > 0) {
                    $books = mysqli_fetch_all($thinhhanh, MYSQLI_ASSOC);
                    foreach ($books as $book) {
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
                  </ul>
                  <a class="aa-browse-btn" href="./product.php?id=<?php echo $id ?>">Xem tất cả sản phẩm <span class="fa fa-long-arrow-right"></span></a>
                </div>
         
                <div class="tab-pane fade" id="featured">
                 <ul class="aa-product-catg aa-featured-slider">
                    <!-- start single product item -->
                    <?php if (mysqli_num_rows($moinhat) > 0) {
                    $books = mysqli_fetch_all($moinhat, MYSQLI_ASSOC);
                    foreach ($books as $book) {if($book['Soluong']<1)
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
                  </ul>
                  <a class="aa-browse-btn" href="./product.php?id=<?php echo $id ?>">Xem tất cả sản phẩm <span class="fa fa-long-arrow-right"></span></a>
                </div>
       
                <div class="tab-pane fade" id="latest">
                  <ul class="aa-product-catg aa-latest-slider">
                  
                    <?php if (mysqli_num_rows($muanhieu) > 0) {
                    $books = mysqli_fetch_all($muanhieu, MYSQLI_ASSOC);
                    foreach ($books as $book) {
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
                  </ul>
                   <a class="aa-browse-btn" href="./product.php?id=<?php echo $id ?>">Xem tất cả sản phẩm <span class="fa fa-long-arrow-right"></span></a>
                </div>
                             
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>

  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
        
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>Giao Hàng Nhanh</h4>
                <P>Chúng tôi có đội ngũ nhân viên lớn có thể đáp ứng được nhu cầu của bạn</P>
              </div>
            </div>
     
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>Uy Tín</h4>
                <P>Chúng tôi có đội ngũ nhân viên lớn có thể đáp ứng được nhu cầu của bạn</P>
              </div>
            </div>
       
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>Hỗ Trợ 24/7</h4>
                <P>Chúng tôi có đội ngũ nhân viên lớn có thể đáp ứng được nhu cầu của bạn</P>
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