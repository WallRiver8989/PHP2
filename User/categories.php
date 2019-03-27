<?php
    require_once __DIR__. "../../Autoload/autoload.php";

    $result = $db->fetchAll("productcategories");
    $sql = "SELECT * FROM products ORDER BY PromotionPrice DESC LIMIT 0,8 ";
    $result1 = $db->fetchsql($sql);
 ?>

<?php require_once __DIR__. "../../User/Layouts/Header.php";?>

<section id="aa-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner">
              <!-- start prduct navigation -->
               <ul class="nav nav-tabs aa-products-tab">
                 <br>
                 <h2 class="text-center">SẢN PHẨM KHUYẾN MÃI HÀNG ĐẦU</h2>
                </ul>
                <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->

                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->

                      <?php foreach ($result1 as $item): ?>
                        <li>
                          <figure>
                            <a class="aa-product-img" href="product_details.php?id=<?php echo $item['ID'];?>$cate=<?php echo $item['CategoryID'];?>"><img src="<?php echo base_url() ?>/Public/uploads/product/<?php echo $item['Image']; ?>" alt="<?php echo $item['Name']; ?>"></a>
                            <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#"><?php echo $item['Name'] ?></a></h4>
                              <span class="aa-product-price">$<?php $reduce  = $item['Price']/$item['PromotionPrice']; echo round($reduce,0) ; ?></span><span class="aa-product-price"><del>$<?php echo $item['Price'] ?></del></span>
                            </figcaption>
                          </figure>
                          <div class="aa-product-hvr-content">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                          </div>
                          <!-- product badge -->
                          <?php
                            if ($item['HotFlag'] == 1) {
                              // code...
                              $str = '<span class="aa-badge aa-sale" href="#">HOT SALE!</span>';
                              echo html_entity_decode($str,ENT_HTML5);
                            } else {
                              // code...
                              $str = '<span class="aa-badge aa-sale" href="#">SALE!</span>';
                              echo html_entity_decode($str,ENT_HTML5);
                            }

                           ?>

                        </li>
                      <?php endforeach; ?>


                      </ul>
                      <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / men product category -->


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
