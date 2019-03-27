<?php
    require_once __DIR__. "/../../Autoload/autoload.php";

    $id = intval(getInput('id'));

    $Editproduct = $db->fetchID("products",$id);
    if(empty($Editproduct)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";

        redirectAdmin("product");
    }

    $category = $db->fetchAll("productcategories");

    if($_SERVER["REQUEST_METHOD"]=="POST"){

      $data = [
          "Name" => postInput('Name'),
          "Price" => postInput('Price'),
          "CategoryID" => postInput("CategoryID"),
          "Description" => postInput("Description"),

      ];

      $error = [];

      if(postInput('Name') == ''){
          $error['Name'] = "Mời bạn nhập tên sản phẩm.";
      }

      if(postInput('Price') == ''){
          $error['Price'] = "Mời bạn nhập giá.";
      }

      if(postInput('CategoryID') == ''){
          $error['CategoryID'] = "Mời bạn chọn loại sản phẩm.";
      }

      if(empty($error)){
        if(isset($_FILES['Image']))
        {
            $file_name = $_FILES['Image']['name'];
            $file_tmp = $_FILES['Image']['tmp_name'];
            $file_type = $_FILES['Image']['type'];
            $file_erro = $_FILES['Image']['error'];

            if($file_erro == 0)
            {
              $part = ROOT ."product/";
              $data['Image'] = $file_name;
            }
          }
          $update = $db->update("products",$data,array("id"=>$id));
          if($update > 0)
          {
            move_uploaded_file($file_tmp,$part.$file_name);
            $_SESSION['success'] = "Cập nhật thành công";
            redirectAdmin("product");
          }
          else
          {
            $_SESSION['error'] = "Cập nhật thất bại";
            redirectAdmin("product");
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
            <a href="<?php echo base_url()?>/admin/modules/product/index.php">Các sản phẩm</a>
        </li>
        <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
    </ol>
    <!-- Page Content -->
    <h3>Thêm Mới Sản Phẩm</h3>

    <!--Notification-->
    <div class="clearfix"></div>
    <?php require_once __DIR__. "/../../../partials/notification.php"; ?>


    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-sm-5 control-label">Tên sản phẩm</label>
                    <div class="col-sm-7">
                        <input type="text" style="" class="form-control" placeholder="Nhập tên sản phẩm mới" name="Name" value="<?php echo $Editproduct['Name'] ?>">
                            <?php if(isset($error['name'])):?>
                                <p class="text-danger"><?php echo $error['name']?></p>
                            <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Giá sản phẩm</label>
                    <div class="col-sm-7">
                        <input type="number" style="" class="form-control" placeholder="Nhập giá sản phẩm" name="Price" value="<?php echo $Editproduct['Price'] ?>">
                            <?php if(isset($error['Price'])):?>
                                <p class="text-danger"><?php echo $error['Price']?></p>
                            <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Mô tả</label>
                    <div class="col-sm-7">
                        <textarea name="Description" cols="96" rows="10"><?php echo $Editproduct['Description'] ?> </textarea>
                            <?php if(isset($error['Description'])):?>
                                <p class="text-danger"><?php echo $error['Description']?></p>
                            <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Loại sản phẩm</label>
                    <div class="col-sm-7">
                        <select name="CategoryID">
                          <option value="" selected>--Chọn loại--</option>
                          <?php foreach ($category as $item): ?>
                              <option value="<?php echo $item["ID"] ?>" <?php echo $Editproduct['CategoryID'] == $item['ID']? "selected = 'selected'" : ''?>><?php echo $item["Name"] ?></option>
                           <?php endforeach; ?>
                        </select>
                            <?php if(isset($error['CategoryID'])):?>
                                <p class="text-danger"><?php echo $error['CategoryID']?></p>
                            <?php endif ?>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Hình ảnh</label>
                    <div class="col-sm-7">
                         <input type="file" name="Image" accept=".PNG,.GIF,.JPG">
                            <?php if(isset($error['Image'])):?>
                                <p class="text-danger"><?php echo $error['Image']?></p>
                            <?php endif ?>
                            <img src="<?php echo uploads() ?>product/<?php echo $Editproduct['Image'] ?>" width="50" height="50">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <button type="submit" class="btn btn-success"><strong>Lưu</strong></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php require_once __DIR__. "/../../Layouts/Footer.php"; ?>
