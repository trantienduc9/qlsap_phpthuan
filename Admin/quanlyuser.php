<?php
include './header.php';
ob_start();

if(isset($_GET['iad']))
{
    $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error)
    {
    var_dump($connect->connect_error);
    die();
    }
    $giohang = mysqli_query($connect, "SELECT * FROM user ");
}
if(isset($_GET['o'])){
    echo "<script type='text/javascript'>alert('Duyệt thành công!!');</script>";
}
?>

<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ NGƯỜI DÙNG</h1>
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách các USER</h6>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <label style="display:flex;justify-content: end;">Search:
                            <input style="width:40%" type="search" class="form-control form-control-sm" placeholder=""
                                aria-controls="dataTable"></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên </th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th>Số điện thoại</th>        
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           if(mysqli_num_rows($giohang))
                           {
                               $datas = mysqli_fetch_all($giohang,MYSQLI_ASSOC);
                               $INDEX =1;
                               foreach($datas as $data){
                                   echo "
                                   <tr>
                                <td style='width:7%;'>".$INDEX++."</td>
                                <td>".$data['NameUser']."</td>
                                <td>".$data['Email']."</td>
                                <td>".$data['pass']."</td>
                                <td>0".$data['SDT']."</td>
                                <td style='width:7%;'><a style='display:flex;justify-content: center;' href='./xoauser.php?iad=".$iad."&idu=".$data['IdUser']."' class='btn btn-danger'role='button'>Xóa</></td>
                                    </tr>
                                   ";
                               }
                               $connect->close();
                           }
                           ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

<?php
include './footer.php';
?>