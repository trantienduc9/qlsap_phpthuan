<?php
ob_start();
include './header.php';
error_reporting(0);
    if(isset($_GET['iad'])||isset($_GET['igh'])){
        $id = $_GET['igh'];
        $iad = $_GET['iad'];
        $connect = new mysqli('localhost',"root","","btlquanlysach");
        mysqli_set_charset($connect,"utf8");
        if($connect->connect_error)
        {
            var_dump($connect->connect_error);
            die();
        }
        $query ="SELECT * from giaohang where IdGiao=".$id."";
        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_assoc($result);
    
    }
    
    else {
        echo "<script type='text/javascript'>alert('Mời bạn đăng nhập để vào trang admin!!');</script>";
        header('Location: ./login.php');
       
    }
?>

<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Xem chi tiết đơn hàng</h1>
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6 class="m-0 font-weight-bold text-primary">Quản lý đơn hàng</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6" style="margin-top: 1rem;">
                    <form action="xuat_donct.php?iad=<?php echo $iad ?>&igh=<?php echo $data['IdGiao'] ?>" method="POST">
                        <input type="submit" name="export_excel" value="Xuất Excel" class="btn btn-success" style="display:flex;justify-content: center;">
                    </form>
            </div>

            <a href="inhoadon.php?id='<?php echo $id ?>'">In hóa đơn</a>
        </div>
    </div>
</div>
<form action="" class="was-validated" method="post" enctype="multipart/form-data" > 
<?php 
    foreach($result as $val){
        $tennm = $val['Name'];
        $sdt = $val['SDT'];
        $mail = $val['Email'];
        $diachi = $val['Diacchi'];
        $tien = $val['Sum'];
        $tennm = $val['Name'];
      echo('<div class="form-group row">  
            <label for="Name">Tên người mua : </label>
             <input disabled type="text" class="form-control" id="Name" value="' . $val['Name'] . '" name="Name" >
            </div>
        
        <div class="form-group row">  
                <label >Số điện thoại : </label>
                <input disabled type="text" class="form-control" value='.$val['SDT'] .'  >
                
        </div>
        <div class="form-group row">  
                <label >Email : </label>
                <input disabled type="text" class="form-control" value='.$val['Email'] .' >
                
        </div>
        <div class="form-group row">  
                <label>Địa chỉ : </label>
                <input disabled type="text" class="form-control" value="'.$val['Diacchi'] .'"  >
                
        </div>
        <div class="form-group row">  
                <label>Tổng tiền : </label>
                <input disabled type="number" class="form-control" value='.$val['Sum'] .'  >
                
        </div>
        <div class="form-group row">
            <label for="tomtat">Nội dung ghi chú</label>
            <input disabled type="text" class="form-control" value="'.$val['note'] .'"  >
        </div>'
    );
    }
?>
    
    <a href="./quanlyyeucau.php?iad=<?echo $iad; ?>" class="btn btn-primary">Trở về</a>
    <button type="button" class="ds">xuất</button>
  </form>

</div>
     <button id="exportButton">Xuất PDF</button>

<?php
$connect->close();
include './footer.php';
?>





           