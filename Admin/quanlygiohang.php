<?php
ob_start();
include './header.php';

if(isset($_GET['iad']))
{
    $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error)
    {
    var_dump($connect->connect_error);
    die();
    }
    $giohang = mysqli_query($connect, "SELECT * FROM giaohang ");
}
if(isset($_GET['o'])){
    echo "<script type='text/javascript'>alert('Duyệt thành công!!');</script>";
}
?>

<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ ĐƠN HÀNG</h1>
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng cần xử lý</h6>
                </div>
                <div class="col-sm-12 col-md-6" style="margin-top: 1rem;">
                    <form action="xuat_don.php" method="POST">
                        <input type="submit" name="export_excel" value="Xuất Excel" class="btn btn-success" style="display:flex;justify-content: center;">
                    </form>
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
                                <th>Tên Người đặt</th>
                                <th>Phone</th>
                                <th>Địa chỉ</th>
                                <th>Tổng tiền </th>        
                                <th>Ngày đặt</th>
                                <th>Ghi chú</th>
                                <th></th>
                                <th></th>
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
                                <td style='width:4%;'>".$INDEX++."</td>
                                <td>".$data['Name']."</td>
                                <td>0".$data['SDT']."</td>
                                <td>".$data['Diacchi']."</td>
                                <td>".$data['Sum']."</td>
                                <td>".$data['ngay']."</td>
                                <td>".$data['note']."</td>
                                <td style='width:6%;'><a style='display:flex;justify-content: center;' href='./duyetgiohang.php?iad=".$iad."&igh=".$data['IdGiao']."' class='btn btn-success' role='button'>Duyệt</></td>
                                <td style='width:12%;'><a style='display:flex;justify-content: center;' href='./xemchitietdon.php?iad=".$iad."&igh=".$data['IdGiao']."' class='btn btn-primary' role='button'>Xem chi tiết</></td>
                                <td style='width:6%;'><a style='display:flex;justify-content: center;' href='./xoagiohang.php?iad=".$iad."&igh=".$data['IdGiao']."' class='btn btn-danger'role='button'>Xóa</></td>
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