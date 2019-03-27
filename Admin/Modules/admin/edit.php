<?php
    require_once __DIR__. "/../../Autoload/autoload.php";

    $id = intval(getInput('id'));
    
    $EditAdmin = $db->fetchID("admin",$id);

    if(empty($EditAdmin)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";

        redirectAdmin("admin");
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $data = [
            "name" => postInput('name'),
            "phone" => postInput('phone'),
            "address" => postInput('address'),
            "email" => postInput('email'),
            "password" => MD5(postInput('password')),
        ];

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

        /*if(postInput('email') == ''){
            $error['email'] = "Mời bạn nhập đầy đủ email.";
        }*/

        /*if(postInput('password') == ''){
            $error['password'] = "Mời bạn nhập mật khẩu.";
        }

        if(postInput('repassword') == ''){
            $error['repassword'] = "Mời bạn nhập lại mật khẩu.";
        }*/

        if($data['password'] != MD5(postInput("repassword"))){
            $error['repassword'] = "Mật khẩu nhập lại không chính xác.";
        }

        if(empty($error)){
            if($EditAdmin['email'] != $data['email']){
                $isset = $db->fetchOne("admin"," email = '".$data['email']."' ");
                if(count($isset)>0){
                    $_SESSION['error'] = "Email Đã Tồn Tại!";
                }  
                else{
                    $id_update = $db->update("admin",$data,array("id"=>$id));
                    if($id_update > 0){
                        $_SESSION['success'] = "Cập Nhật Thành Công";
                        redirectAdmin("admin");
                    }
                    else{
                        $_SESSION['error'] = "Dữ Liệu Không Thay Đổi"; 
                        redirectAdmin("admin");
                    }
                }
            }
            else{
                $id_update = $db->update("admin",$data,array("id"=>$id));
                if($id_update > 0){
                    $_SESSION['success'] = "Cập Nhật Thành Công";
                    redirectAdmin("admin");
                }
                else{
                    $_SESSION['error'] = "Dữ Liệu Không Thay Đổi"; 
                    redirectAdmin("admin");
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
        <li class="breadcrumb-item active">Cập Nhật Admin</li>
    </ol>
    <!-- Page Content -->
    <h3 class="text-center">Cập Nhật Admin</h3>
    <hr/>

    <!--Notification-->
    <div class="clearfix"></div>
    <?php require_once __DIR__. "/../../../partials/notification.php"; ?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="" action="" method="POST">

                    <!--Name-->
                    <div class="row">
                        <label class="col-sm-2 control-label">Tên Admin: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Nhập tên admin" name="name" value="<?php echo $EditAdmin['name']?>">


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
                            <input type="text" class="form-control" placeholder="Nhập email" name="email" value="<?php echo $EditAdmin['email']?>">


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
                            <input type="tel" class="form-control" placeholder="Nhập số điện thoại" name="phone" value="<?php echo $EditAdmin['phone']?>">


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
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" value="<?php echo $EditAdmin['address']?>">


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
                            <input type="password" class="form-control" placeholder="******" name="password">


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
                            <input type="password" class="form-control" placeholder="******" name="repassword" placeholder="******">


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

