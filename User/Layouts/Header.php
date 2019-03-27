<?php
  require_once __DIR__. "/../../Autoload/autoload.php";
  $category = $db->fetchAll("productcategories");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily Shop | Home</title>

    <!-- Font awesome -->
    <link href="<?php echo base_url() ?>/Public/Frontend/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>/Public/Frontend/css/bootstrap.css" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="<?php echo base_url() ?>/Public/Frontend/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/Public/Frontend/css/jquery.simpleLens.css">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/Public/Frontend/css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/Public/Frontend/css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="<?php echo base_url() ?>/Public/Frontend/css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="<?php echo base_url() ?>/Public/Frontend/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="<?php echo base_url() ?>/Public/Frontend/css/style.css" rel="stylesheet">

    <!-- Google Font
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
  <body>
   <!-- wpf loader Two -->

    <!-- / wpf loader Two -->
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left"></div>
              <!-- / header top left -->
              <div class="aa-header-top-right"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.php">
                  <span class="fa fa-shopping-cart"></span>
                  <p>Vera<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify">2</span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="../Public/Frontend/img/woman-small-2.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="../Public/Frontend/img/woman-small-1.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        $500
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Bạn đang tìm ...?">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.php">Trang Chủ</a></li>
              <li><a href="">Điện Thoại <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <?php foreach ($category as $item): ?>
                    <li><a href="san-pham-theo-danh-muc.php?id=<?php echo $item["ID"]?>"><?php echo $item["Name"]?></a></li>
                  <?php endforeach;?>
                </ul>
              </li>
              <li><a href="tat-ca-san-pham.php">Tất Cả Sản Phẩm</a></li>

              <li><a href="contact.html">Liên Hệ</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  </section>
  <!-- / menu -->
