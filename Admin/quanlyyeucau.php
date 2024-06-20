<?php
include './header.php';
ob_start();
if(isset($_GET['iad'])){
    $iad = $_GET['iad'];
    $connect = new mysqli('localhost',"root","","btlquanlysach");
    mysqli_set_charset($connect,"utf8");
if($connect->connect_error)
{
    var_dump($connect->connect_error);
    die();
}
$results = mysqli_query($connect,"SELECT feedback.IdFeed,user.NameUser,user.Email,user.SDT,feedback.text FROM feedback INNER JOIN user ON(feedback.IdUser=user.IdUser) ");
}
?>
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ PHẢN HỒI</h1>
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách các yêu cầu</h6>
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
                                <th>Tên</th>
                                <th>SDT</th>
                                <th>Nội dung</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
if (mysqli_num_rows($results) > 0) {
    $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
    $count=1;
    foreach ($users as $user) {
    echo "
    <tr>
        <td style='width:5%;'>".$count++."</td>
        <td>".$user['NameUser']."</td>
        <td>0".$user['SDT']."</td>
        <td>".$user['text']."</td>  
        <td style='width:14%;'><a  style='display:flex;justify-content: center;'href='./xemchitietyeucau.php?id=".$user['IdFeed']."&iad=".$iad."' class='btn btn-success' >Xem chi tiết</a></td>
        <td style='width:8%;'><a  style='display:flex;justify-content: center;'href='./xoafeedback.php?id=".$user['IdFeed']."&iad=".$iad."' class='btn btn-danger '>Xóa</a></td>
    </tr> ";
    }
    }
?>
                            <?php
$connect->close(); ?>
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