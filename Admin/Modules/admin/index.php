<?php
    require_once __DIR__. "/../../Autoload/autoload.php";

    $admin = $db->fetchAll("admin");
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
            <h3>Danh Sách Các Admin</h3>
        </div>
        <div class="col-lg-4">
            <a href="add.php" class="btn btn-success"><strong>Thêm Mới</strong></a>
        </div>
    </div>

    <hr/>

    <!--Notification-->
    <div class="clearfix"></div>
    <?php require_once __DIR__. "/../../../partials/notification.php"; ?>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
           Thông Tin Các Admin
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
                                        <th>Tên Admin</th>
                                        <th>Email</th>
                                        <th>Avatar</th>                                       
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt=1; foreach($admin as $item): ?>
                                        <tr>
                                            <td><?php echo $stt?></td>
                                            <td><?php echo $item['name']?></td>
                                            <td><?php echo $item['email']?></td>
                                            <td><img style ="width:50px; height=50px" src="<?php echo uploads()?>admin/<?php echo $item['avatar']?>"/></td>
                                            <td>                                       
                                                <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id']?>"><i class="fa fa-edit">&nbsp</i>Sửa</a>
                                                <a class="btn btn-xs btn-danger " href="delete.php?id=<?php echo $item['id']?>"><i class="fa fa-times">&nbsp</i>Xóa</a>
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
