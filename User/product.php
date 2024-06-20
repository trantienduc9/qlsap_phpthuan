<?php
ob_start();
include './header.php';
  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error)
    {
      var_dump($connect->connect_error);
      die();
    }
    $results = mysqli_query($connect, "SELECT * FROM books");
    $name="ALL BOOK";
  }
  if(isset($_GET['timkiem']))
  {
    $id = $_GET['id'];
    $timkiem = $_GET['timkiem'];
    $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error)
    {
      var_dump($connect->connect_error);
      die();
    }
    $results = mysqli_query($connect, "SELECT * FROM books where TheLoai like'%".$timkiem."%' or Namebook like'%".$timkiem."%' or TacGia like'%".$timkiem."%'");
    $name=$timkiem;
  }

  if(isset($_GET['id'])&&isset($_GET['check'])){
    $id = $_GET['id'];
    $check=$_GET['check'];
    $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
  if($connect->connect_error)
  {
    var_dump($connect->connect_error);
    die();
  }
  if($check=="1"){
    $name="Truyện - Tiểu thuyết";
    $results = mysqli_query($connect, "SELECT * FROM books where TheLoai='Tiểu thuyết'");
  }
    elseif($check=="2"){
      $name="Khoa học công nghệ - Kinh tế";
      $results = mysqli_query($connect,"SELECT * from books where TheLoai='Khoa học công nghệ'");
    }
  elseif($check=="3")
  {
    $name="Giáo trình học tập";
    $results = mysqli_query($connect,"SELECT * from books where TheLoai='Giáo trình'");
  }
  elseif($check=="4")
  {
    $name="Kĩ năng cuộc sống";
    $results = mysqli_query($connect,"SELECT * from books where TheLoai='Kĩ năng'");
  }

  }

?>
<section id="aa-error">
    <div class="container-fluid">
      <div style="text-align: center" class="row">
        <h1 style="font-size: 45px;font-weight: bold;letter-spacing: 3px;" ><?php echo $name?></h1>
      </div>
      <div class="row">
      <div class="col-md-1">
      </div>
        <div class="col-md-10">
         <ul class="aa-product-catg">
                    <?php if (mysqli_num_rows($results) > 0) {
                    $books = mysqli_fetch_all($results, MYSQLI_ASSOC);
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
                    <?php
                $connect->close(); ?>
                  </ul> 
        </div>
        <div class="col-md-1">
      </div>
      </div>
    </div>
  </section>
  <!-- / 404 error section -->
  <?php
include './footer.php';
?>