<?php
    require_once __DIR__. "../../Autoload/autoload.php";
    $product = $db->fetchAll("products");
?>

  <?php require_once __DIR__. "../../User/Layouts/Header.php"; ?>

  <div class="clearfix"></div>

  <div style="margin: 5% 5%">
    
    <h2>Tất Cả Sản Phẩm: </h2>

    <hr/>

    <!-- Tab panes -->
    <?php foreach ($product as $item): ?>

        <ul class="aa-product-catg">
            <li>
                <figure>
                    <a class="aa-product-img" href="product_details.php?id=<?php echo $item["ID"]?>"><img style="width:250px; height:300px" src="../Public/uploads/product/<?php echo $item['Image']?>"></a>
                    <a class="aa-add-card-btn" href="addcart.php?id=<?php echo $item["ID"]?>"><span class="fa fa-shopping-cart"></span>Thêm Vào Giỏ</a>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="product_details.php?id=<?php echo $item["ID"]?>"><?php echo $item['Name'] ?></a></h4>
                        <span class="aa-product-price"><?php echo $item['Price']?></span>
                    </figcaption>
                </figure>
                <div class="aa-product-hvr-content">
                    <a href="product_details.php?id=<?php echo $item["ID"]?>" data-toggle="tooltip" data-placement="top" title="Xem Chi Tiết"><span style="padding: 0 5px 0 5px" class="fa fa-info"></span></a>
                </div>
            </li>
        </ul>

    <?php endforeach;?>
  
  </div>

  <?php require_once __DIR__. "../../User/Layouts/Footer.php"; ?>