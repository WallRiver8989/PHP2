<?php
    require_once __DIR__. "../../Autoload/autoload.php";
    unset($_SESSION['cart']);
    unset($_SESSION['total']);
?>

    <?php require_once __DIR__. "../../User/Layouts/Header.php"; ?>
        <div class="col-md-12">
            <section >
                <h3 style="text-align:center"><a href="">Thông báo thanh toán</a></h3>
                <?php if(isset($_SESSION['success'])):?>
                    <div class="alert alert-success">
                        <strong style="color : #3c763d">Success</strong> <?php $_SESSION['success']; unset($_SESSION['success'])?>
                    </div>
                <?php endif ?>
                <a href="index.php" class="btn btn-success">Trở về trang chủ</a>
            </section>
        </div>
    <?php require_once __DIR__. "../../User/Layouts/Footer.php"; ?>