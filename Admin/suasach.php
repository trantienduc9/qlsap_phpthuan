<?php
ob_start();
include './header.php';
if(isset($_GET['iad'])){
    $iad = $_GET['iad'];
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $connect = new mysqli('localhost',"root","","btlquanlysach");
        mysqli_set_charset($connect,"utf8");
        if($connect->connect_error)
        {
            var_dump($connect->connect_error);
            die();
        }
        $query ="Select * from books where Idbook='".$id."'";
        $check= mysqli_query($connect, $query);
        $data = mysqli_fetch_assoc($check);
    }
}
else{
    echo "<script type='text/javascript'>alert('Mời bạn đang nhập để vào trang admin!!');</script>";
    header('location: ./login.php');
}

?>
<?php
if(isset($_POST['namebook'])){
    $id = $_GET['id'];
    $namebook = $_POST['namebook'];
    $tacgia = $_POST['tacgia'];
    $theloai = $_POST['theloai'];
    $soluong = $_POST['soluong'];
    $giaca = $_POST['giaca'];
    $noidung = $_POST['tomtat'];
    if(isset($_FILES['img']))
    {
        
        $file = $_FILES['img'];
        $file_name = $file['name'];
        if(empty($file_name)){
        $file_name = $data['Img'];
        }
        else
        {
            if($file['type'] == 'image/jpeg'||$file['type'] == 'image/jpg'||$file['type'] == 'image/png'){
                move_uploaded_file($file['tmp_name'],'../public/admin/img/'.$file_name);
            }
            else{
                echo "Ko dung dinh dang";
                $file_name="";
            }
        }
    }
    $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error)
    {
        var_dump($connect->connect_error);
        die();
    }
    $query ="UPDATE books set Namebook ='".$namebook."', TheLoai = '".$theloai."' , TacGia ='".$tacgia."', Img ='".$file_name."' , Soluong=".$soluong.", Gia =".$giaca.",noidung='".$noidung."' WHERE IdBook = '".$id."'";
    $check= mysqli_query($connect, $query);
    if($check)
    {
        header("Location: ./quanlysach.php?iad=".$iad."");
        $connect->close();
    }
}
?>
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Cập nhật</h1>
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <a href="./quanlysach.php"class="m-0 font-weight-bold text-primary">Quản lý sách</a>
            </div>
        </div>
    </div>
</div>
<form action="" class="was-validated" method="post" enctype="multipart/form-data" > 
    <div class="form-group row">  
            <div class="col-6">
            <label for="namebook">Tên sách : </label>
             <input type="text" class="form-control" id="namebook" value="<?php echo $data['Namebook'] ?>"placeholder="Enter Tên sách" name="namebook" required>
            </div>
            <div class="col-6">
            <label for="tacgia">Tác giả : </label>
             <input type="text" class="form-control" id="tacgia" value="<?php echo $data['TacGia'] ?>" placeholder="Enter Tác giả" name="tacgia" required>
            </div>
    </div>
    <div class="form-group">
    <select name="theloai" class="form-select form-control"  aria-label="Default select example">
        <option value="<?php echo $data['TheLoai'] ?>"><?php echo $data['TheLoai'] ?> </option>
        <option value="Tiểu thuyết">Tiểu thuyết </option>
         <option value="Khoa học công nghệ">Khoa học công nghệ</option>
         <option value="Giáo trình">Giáo trình</option>
         <option value="Kĩ năng">Kĩ năng</option>

</select>
    </div>
    <div class="form-group">
      <label for="img">Hình ảnh : </label>
      <input type="file" class="form-control" id=""  name="img" >
      <img src="../public/admin/img/<?php echo $data['Img'] ?>" alt="">
    </div>
    <div class="form-group row">  
            <div class="col-6">
            <label for="soluong">Số lượng : </label>
             <input type="number" class="form-control" id="soluong" name="soluong" value="<?php echo $data['Soluong'] ?>" min="1" required>
            </div>
            <div class="col-6">
            <label for="giaca">Giá : </label>
             <input type="number" min="1" class="form-control" id="giaca" value="<?php echo $data['Gia'] ?>" placeholder="Enter Giá" name="giaca" required>
            </div>
    </div>
    <div class="form-group">
      <label for="tomtat">Tóm tắt</label>
      <textarea class="form-control" rows="10" placeholder="Tóm tắt" name="tomtat"required><?php echo $data['noidung'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>

</div>

<?php
include './footer.php';
?>