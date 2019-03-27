<?php
    require_once __DIR__. "/../../Autoload/autoload.php";

    $data = [
        "name" => postInput('name'),
        "phone" => postInput('phone'),
        "address" => postInput('address'),
        "email" => postInput('email'),
        "password" => MD5(postInput('password')),
    ];

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $error = [];

        if(postInput('name') == ''){
            $error['name'] = "Mời bạn nhập đầy đủ tên admin.";
        }

        if(postInput('phone') == ''){
            $error['phone'] = "Mời bạn nhập đầy đủ số điện thoại.";
        }

        if(postInput('address') == ''){
            $error['address'] = "Mời bạn nhập đầy đủ địa chỉ.";
        }

        if(postInput('email') == ''){
            $error['email'] = "Mời bạn nhập đầy đủ email.";
        }
        else{
            $check_email = $db->fetchOne("admin","email= '".$data['email']."'");
            if($check_email != null){
                $error['email'] = "Email đã tồn tại.";
            }
        }

        if(postInput('password') == ''){
            $error['password'] = "Mời bạn nhập mật khẩu.";
        }

        if(postInput('repassword') == ''){
            $error['repassword'] = "Mời bạn nhập lại mật khẩu.";
        }

        if($data['password'] != MD5(postInput("repassword"))){
            $error['repassword'] = "Mật khẩu nhập lại không chính xác.";
        }

        if(postInput('avatar') == ''){
            $data['avatar'] = "default.png";
        }

        if(empty($error)){
            $isset = $db->fetchOne("admin"," name = '".$data['name']."' ");
            if(count($isset)>0){
                $_SESSION['error'] = "Admin Đã Tồn Tại!";
            }
            else{

                if(isset($_FILES['avatar'])){
                    $file_name = $_FILES['avatar']['name'];
                    $file_tmp = $_FILES['avatar']['tmp_name'];
                    $file_type = $_FILES['avatar']['type'];
                    $file_erro = $_FILES['avatar']['error'];

                    if($file_erro == 0){
                        $part= ROOT."admin/";
                        $data['avatar'] = $file_name;
                    }
                }

                $id_insert = $db->insert("admin",$data);
                if($id_insert > 0){
                    move_uploaded_file($file_tmp,$part.$file_name);
                    $_SESSION['success'] = "Thêm Mới Thành Công";
                    redirectAdmin("admin");
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
            <a href="<?php echo base_url()?>/admin/modules/Admin/index.php">Các Admin</a>
        </li>
        <li class="breadcrumb-item active">Thêm Mới Admin</li>
    </ol>
    <!-- Page Content -->
    <h3 class="text-center">Thêm Mới Admin</h3>
    <hr/>

    <!--Notification-->
    <div class="clearfix"></div>
    <?php require_once __DIR__. "/../../../partials/notification.php"; ?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="" action="" method="POST" enctype="multipart/form-data "> 

                    <!--Name-->
                    <div class="row">
                        <label class="col-sm-2 control-label">Tên Admin: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Nhập tên admin" name="name" value="<?php echo $data['name']?>">


                            <?php if(isset($error['name'])):?>
                                <p class="text-danger"><?php echo $error['name']?></p>
                            <?php endif ?>

                        </div>
                        <div class="offset-col-sm-2">

                        </div>

                    </div>

                    <br/>

                    <!--Email-->
                    <div class="row">
                        <label class="col-sm-2 control-label">Email: </label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" placeholder="Nhập email" name="email" value="<?php echo $data['email']?>">


                            <?php if(isset($error['email'])):?>
                                <p class="text-danger"><?php echo $error['email']?></p>
                            <?php endif ?>

                        </div>
                        <div class="offset-col-sm-2">

                        </div>

                    </div>

                    <br/>

                    <!--Phone-->
                    <div class="row">
                        <label class="col-sm-2 control-label">Phone: </label>
                        <div class="col-sm-8">
                            <input type="tel" class="form-control" placeholder="Nhập số điện thoại" name="phone" value="<?php echo $data['phone']?>">


                            <?php if(isset($error['phone'])):?>
                                <p class="text-danger"><?php echo $error['phone']?></p>
                            <?php endif ?>

                        </div>
                        <div class="offset-col-sm-2">

                        </div>

                    </div>

                    <br/>

                    <!--Address-->
                    <div class="row">
                        <label class="col-sm-2 control-label">Địa Chỉ: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" value="<?php echo $data['address']?>">


                            <?php if(isset($error['address'])):?>
                                <p class="text-danger"><?php echo $error['address']?></p>
                            <?php endif ?>

                        </div>
                        <div class="offset-col-sm-2">

                        </div>

                    </div>

                    <br/>

                    <!--Password-->
                    <div class="row">
                        <label class="col-sm-2 control-label">Mật Khẩu: </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" placeholder="Mật Khẩu" name="password">


                            <?php if(isset($error['password'])):?>
                                <p class="text-danger"><?php echo $error['password']?></p>
                            <?php endif ?>

                        </div>
                        <div class="offset-col-sm-2">

                        </div>

                    </div>

                    <br/>

                    <!--Re-Password-->
                    <div class="row">
                        <label class="col-sm-2 control-label">Mật Khẩu: </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" placeholder="Nhập Lại Mật Khẩu" name="repassword">


                            <?php if(isset($error['repassword'])):?>
                                <p class="text-danger"><?php echo $error['repassword']?></p>
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

                    <br/>

                </form>
            </div>
        </div>  
    </div>


<?php require_once __DIR__. "/../../Layouts/Footer.php"; ?>

