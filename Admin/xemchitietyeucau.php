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
        $results = mysqli_query($connect,"SELECT user.NameUser,user.Email,user.SDT,feedback.text FROM feedback INNER JOIN user ON(feedback.IdUser=user.IdUser) where IdFeed=".$id."");
        $data=mysqli_fetch_assoc($results);
    }
}
else{
    echo "<script type='text/javascript'>alert('Mời bạn đang nhập để vào trang admin!!');</script>";
    header('location: ./login.php');
}

?>
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Xem chi tiết phản hồi</h1>
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <a href="./quanlyyeucau.php?iad=<?echo $iad; ?>"class="m-0 font-weight-bold text-primary">Quản lý phản hồi</a>
            </div>
        </div>
    </div>
</div>
<form action="" class="was-validated" method="post" enctype="multipart/form-data" > 
    <div class="form-group row">  
            
            <label for="namebook">Tên người phản hồi : </label>
             <input disabled type="text" class="form-control" value="<?php echo $data['NameUser'] ?>" name="namebook" >
            </div>
    <div class="form-group row">  
            <label for="tacgia">Số điện thoại : </label>
             <input disabled type="text" class="form-control" id="tacgia" value="<?php echo $data['SDT'] ?>"  >
            
    </div>
    <div class="form-group row">  
            <label for="tacgia">Email : </label>
             <input disabled type="text" class="form-control" id="tacgia" value="<?php echo $data['Email'] ?>"  >
            
    </div>
    <div class="form-group row">
      <label for="tomtat">Nội dung phản hồi :</label>
      <textarea disabled class="form-control" rows="10" placeholder="Tóm tắt" name="tomtat"required><?php echo $data['text'] ?></textarea>
    </div>
    <a href="./quanlyyeucau.php?iad=<?echo $iad; ?>" class="btn btn-primary">Trở về</a>
  </form>

</div>

<?php
$connect->close();
include './footer.php';
?>