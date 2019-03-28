<?php
    require_once __DIR__. "/../../Autoload/autoload.php";

    $orders = $db->fetchAll("orders");

    
?>

<?php require_once __DIR__. "/../../Layouts/Header.php"; ?>

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?php echo base_url()?>/admin">Trang Chủ</a>
        </li>
        <li class="breadcrumb-item active">Trang Chủ Admin</li>
    </ol>

    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-8">
            <h3>Danh Sách Order</h3>
        </div>
    </div>

    <hr/>

    <!--Notification-->
    <div class="clearfix"></div>
    <?php require_once __DIR__. "/../../../partials/notification.php"; ?>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
           Các Thông Tin Đơn Hàng
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th>STT</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Messege</th>                                                                            
                                        <th>Action</th>                                                                             
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt=1; foreach($orders as $item): ?>
                                        <tr>
                                            <td><?php echo $stt?></td>
                                            <td><?php echo $item['CostomerName']?></td> 
                                            <td><?php echo $item['CostomerPhone']?></td>
                                            <td><?php echo $item['CostomerAddress']?></td>
                                            <td><?php echo $item['CostomerMail']?></td>                                                                                    
                                            <td>
                                                <a href="#" class="btn btn-xs <?php echo $item['Status'] == 0 ? 'btn-danger' : 'btn-info' ?>"><?php echo $item['Status'] == 0?'Chưa xủ lý' : 'Đã xử lý' ?></a>
                                            </td> 
                                            <td><?php echo $item['Message']?></td>                                           
                                            <td>                                       
                                                <a class="btn btn-xs btn-danger " href="delete.php?id=<?php echo $item['ID']?>"><i class="fa fa-times">&nbsp</i>Xóa</a>
                                            </td>
                                        </tr>
                                    <?php $stt++; endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once __DIR__. "/../../Layouts/Footer.php"; ?>
