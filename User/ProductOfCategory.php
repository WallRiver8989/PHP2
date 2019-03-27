<?php
  require_once __DIR__. "../../Autoload/autoload.php";

  $id = intval(getInput('id'));

  $sql = "SELECT * FROM products WHERE CategoryID = $id ";

  $product = $db->fetchsql($sql);
//  _debug($product);

  require_once __DIR__. "../../User/Layouts/Header.php";
 ?>

 <div class="tab-content">

   <div class="tab-pane fade in active" >
     <ul class="aa-product-catg">
       <!-- start single product item -->
       <?php foreach ($product as $item ): ?>
         <li>
           <figure>
             <a class="aa-product-img" href="#"><img src="<?php echo base_url() ?>/Public/Frontend/img/<?php echo $item['Image']; ?>" alt="<?php echo $item['Name'] ?> Img"></a>
             <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
               <figcaption>
               <h4 class="aa-product-title"><a href="#"><?php echo $item['Name'] ?></a></h4>
               <span class="aa-product-price"><?php echo $item['Price'] ?></span><span class="aa-product-price"><del>$65.50</del></span>
             </figcaption>
           </figure>
           <div class="aa-product-hvr-content">
             <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
             <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
             <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
           </div>
           <!-- product badge -->
           <span class="aa-badge aa-sale" href="#">SALE!</span>
         </li>
       <?php endforeach; ?>

     </ul>

   </div>
 </div>

 <?php //require_once __DIR__. "../../User/Layouts/Footer.php"; ?>
