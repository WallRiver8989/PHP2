<?php
    require_once __DIR__. "/../../Autoload/autoload.php";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $data = [
            "name" => postInput('name'),
            "alias" => to_slug(postInput("name"))
        ];
        $error = [];
        if(postInput('name') == ''){
            $error['name'] = "Mời bạn nhập đầy đủ tên danh mục.";
        }
        if(empty($error)){
            $isset = $db->fetchOne("productcategories"," name = '".$data['name']."' ");
            if(count($isset)>0){
                $_SESSION['error'] = "Tên Danh Mục Đã Tồn Tại!";
            }
            else{
                $id_insert = $db->insert("productcategories",$data);
                if($id_insert > 0){
                    $_SESSION['success'] = "Thêm Mới Thành Công";
                    redirectAdmin("category");
                }
                else{
                    $_SESSION['error'] = "Thêm Mới Thất Bại"; 
                }
            }
        }
    }
?>

<?php require_once __DIR__. "/../../Layouts/Header.php"; ?>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?php echo base_url()?>/admin">Trang Chủ</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo base_url()?>/admin/modules/Category/index.php">Các Danh Mục</a>
        </li>
        <li class="breadcrumb-item active">Thêm Mới Danh Mục</li>
    </ol>
    <!-- Page Content -->
    <h3>Thêm Mới Danh Mục</h3>
    <hr/>
    
    <!--Notification-->
    <div class="clearfix"></div>
    <?php require_once __DIR__. "/../../../partials/notification.php"; ?>


    <div class="row">
        <div class="col-md-12">
            <form class="" action="" method="POST">
                <!--Name-->
                <div class="row">
                    <label class="col-sm-2 control-label">Tên danh mục: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Nhập tên admin" name="name">


                        <?php if(isset($error['name'])):?>
                            <p class="text-danger"><?php echo $error['name']?></p>
                        <?php endif ?>

                    </div>
                    <div class="offset-col-sm-2">

                    </div>

                </div>

                <br/>
                <br/>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-success"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>

<?php require_once __DIR__. "/../../Layouts/Footer.php"; ?>