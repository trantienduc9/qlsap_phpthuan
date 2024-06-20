<?php 
	$id = $_GET['id'];
	$connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
    $query ="SELECT * from giaohang where IdGiao=".$id."";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_assoc($result);
?>
<?php 
    foreach($result as $val){
        $tennm = $val['Name'];
        $sdt = $val['SDT'];
        $mail = $val['Email'];
        $diachi = $val['Diacchi'];
        $tien = $val['Sum'];
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	
    <style type="text/css">
    html{
    	background: #999;
    	cursor: default;
    }
    body{
    
	    border-radius: 1px;
	    box-sizing: border-box;
	    overflow: hidden;
	}
  
    .bao{
    	width: 51rem;
    	background: white;
        box-sizing: border-box;
        height: 11in;
        margin: 0 auto;
        overflow: hidden;
    }
    .trong{

        text-align: center;
    }
    </style>
   	<div class="bao">
	    <div class="trong">
	 
	    <div align="center">
	        <h1>HÓA ĐƠN</h1>
	    </div>
        <address >
            <p><a href="" style="font-size: 1.8rem; font-weight: 700; background: linear-gradient(45deg,#ca4246 16.666%,#e16541 16.666%,#e16541 33.333%,#f18f43 33.333%,#f18f43 50%,#8b9862 50%,#8b9862 66.666%,#476098 66.666%,#476098 83.333%, #a7489b 83.333%); background-clip: text;-webkit-background-clip: text; -webkit-text-fill-color: transparent;">Quần áo đá bóng </a></p>
            <p><strong style="font-size: 14px">Địa chỉ: 218 Lĩnh Nam,Phường Lĩnh Nam,Quận Hoàng Mai, TP. Hà Nội</strong></p>
        </address>
        <div>
        	<h2>Khách Hàng : <?php echo $tennm; ?> </h2>
        	<h2>Số điện thoại : <?php echo $sdt; ?> </h2>
        	<h2>Email : <?php echo $mail; ?> </h2>
        	<h2>Địa chỉ : <?php echo $diachi; ?> </h2>
        	<h2>Tổng tiền : <?php echo $tien; ?> </h2>
        	<h2>Số điện thoại : <?php echo $sdt; ?> </h2>
        </div>

    </div>
    <br>
    <br>
    <hr width="80%" style="height: 5px;border: none; background: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet); margin-bottom: 40px;">
    <br><br>
    <h2 style="color: lightblue; text-align: center;">Chúc quý khách một ngày dồi dào sức khỏe</h2>
</body>
</html>