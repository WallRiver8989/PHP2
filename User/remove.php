<?php
    require_once __DIR__. "../../Autoload/autoload.php";
    $id=intval(getInput('id'));
    unset($_SESSION['cart'][$id]);

    $_SESSION['success']="Xóa sản phảm thành công";
    header("Location: cart.php");
?>