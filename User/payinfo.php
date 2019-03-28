<?php
    require_once __DIR__. "/../Autoload/autoload.php";

    $orders = $db->fetchAll("orders");

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $data = [
            "CostomerName" => postInput('CostomerName'),
            "CostomerAddress" => postInput('CostomerAddress'),
            "CostomerPhone" => postInput("CostomerPhone"),
            "CostomerMail" => postInput("CostomerMail"),
            "Message" => postInput("Message"),

        ];

        $error = [];

        if(postInput('CostomerName') == ''){
            $error['CostomerName'] = "Mời bạn nhập tên .";
        }

        if(postInput('CostomerAddress') == ''){
            $error['CostomerAddress'] = "Mời bạn nhập địa chỉ.";
        }

        if(postInput('CostomerPhone') == ''){
            $error['CostomerPhone'] = "Mời bạn nhập số điện thoại.";
        }

        if(postInput('CostomerMail') == ''){
            $error['CostomerMail'] = "Mời bạn nhập email.";
        }

        if(empty($error)){
            

          $id_insert = $db->insert("orders",$data);
            if($id_insert)
            {
              $_SESSION['success'] = "Đơn hàng của bạn đã được thêm thành công";
              redirect("/User/tb.php");
              //header(Location: tb.php);
                
            }
            else {
              $_SESSION['error'] = "Đơn hàng của bạn thất bại";
            }
        }
        
    
    }
 
?>

<?php require_once __DIR__. "../../User/Layouts/Header.php"; ?>
    <!-- Page Content -->
    
    <h3 style="text-align:center">Thanh toán</h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-sm-5 control-label">Tên khách hàng</label>
                    <div class="col-sm-7">
                        <input type="text" style="width:300px" class="form-control" placeholder="Nhập tên bạn" name="CostomerName">
                            <?php if(isset($error['CostomerName'])):?>
                                <p class="text-danger"><?php echo $error['CostomerName']?></p>
                            <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Địa chỉ</label>
                    <div class="col-sm-7">
                        <input type="text" style="width:300px" class="form-control" placeholder="Nhập địa chỉ của bạn" name="CostomerAddress">
                            <?php if(isset($error['CostomerAddress'])):?>
                                <p class="text-danger"><?php echo $error['CostomerAddress']?></p>
                            <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Số điện thoại</label>
                    <div class="col-sm-7">
                        <input type="text" style="width:300px" class="form-control" placeholder="Nhập số điện thoại của bạn" name="CostomerPhone">
                            <?php if(isset($error['CostomerPhone'])):?>
                                <p class="text-danger"><?php echo $error['CostomerPhone']?></p>
                            <?php endif ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-5 control-label">Mail</label>
                    <div class="col-sm-7">
                        <input type="mail" style="width:300px" class="form-control" placeholder="Nhập email của bạn" name="CostomerMail">
                            <?php if(isset($error['CostomerMail'])):?>
                                <p class="text-danger"><?php echo $error['CostomerMail']?></p>
                            <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Message</label>
                    <div class="col-sm-7">
                        <input type="text" style="width:300px" class="form-control" placeholder="Nhập số điện thoại của bạn" name="Message">
                            <?php if(isset($error['Message'])):?>
                                <p class="text-danger"><?php echo $error['Message']?></p>
                            <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <button type="submit" class="btn btn-success"><strong>Xác Nhận</strong></button>
                    </div>
                </div>
            </form>

        </div>
    </div>

<?php require_once __DIR__. "../../User/Layouts/Footer.php"; ?>
