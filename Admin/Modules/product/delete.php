<?php
    require_once __DIR__. "/../../Autoload/autoload.php";

    $id = intval(getInput('id'));

    $Editproduct = $db->fetchID("products",$id);
    if(empty($Editproduct)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";

        redirectAdmin("product");
    }

    $num = $db->delete("products",$id);

    if($num >0){
        $_SESSION['success'] = "Xóa Thành Công";
        redirectAdmin("product");
    }
    else{
        $_SESSION['error'] = "Xóa Thất Bại";
        redirectAdmin("product");
    }
?>
