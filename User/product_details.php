
<?php
    require_once __DIR__. "../../Autoload/autoload.php";
    
    $id = intval(getInput('id'));
    $sql = "SELECT * FROM products WHERE ID = $id ";
    $product = $db->fetchsql($sql);
    //_debug($cate);
?>

  <?php require_once __DIR__. "../../User/Layouts/Header.php"; ?>

<?php foreach ($product as $item): ?>


  <!-- catg header banner section -->

  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="aa-product-view-slider">
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a class="a-product-img" href=""><img src="<?php echo base_url() ?>/Public/Frontend/img/<?php echo $item['Image']; ?>" alt="<?php echo $item['Name']; ?>"></a></div>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3><?php echo $item["Name"] ?></h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price"><p><?php echo $item["Price"] ?>$ </p></span>

                    </div>
                    <p><?php echo $item["Description"] ?></p>
                    <h4>Size</h4>
                    <div class="aa-prod-view-size">
                      <a href="#">S</a>
                      <a href="#">M</a>
                      <a href="#">L</a>
                      <a href="#">XL</a>
                    </div>
                    <h4>Color</h4>
                    <div class="aa-color-tag">
                      <a href="#" class="aa-color-green"></a>
                      <a href="#" class="aa-color-yellow"></a>
                      <a href="#" class="aa-color-pink"></a>
                      <a href="#" class="aa-color-black"></a>
                      <a href="#" class="aa-color-white"></a>
                    </div>
                    <div class="aa-prod-quantity">
                      <form action="">
                        <h4>Số lượng </h4>
                        <select id="" name="">
                          <option selected="1" value="0">1</option>
                          <option value="1">2</option>
                          <option value="2">3</option>
                          <option value="3">4</option>
                          <option value="4">5</option>
                          <option value="5">6</option>
                        </select>
                      </form>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="#">Add To Cart</a>
                      <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                      <a class="aa-add-to-cart-btn" href="#">Compare</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">


              <!-- Tab panes -->

            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->

                <?php require_once __DIR__. "/RelateProduct.php"; ?>


              </ul>


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->



<?php endforeach; ?>

  <?php require_once __DIR__. "../../User/Layouts/Footer.php"; ?>
