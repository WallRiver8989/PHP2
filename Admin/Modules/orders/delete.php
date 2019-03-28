<?php
    require_once __DIR__. "/../../Autoload/autoload.php";

    $id = intval(getInput('id'));
    
    $DelOrder = $db->fetchID("orders",$id);
    if(empty($DelOrder)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";

        redirectAdmin("orders");
    }

    $num = $db->delete("orders",$id); 

    if($num >0){
        $_SESSION['success'] = "Xóa Thành Công";
        redirectAdmin("orders");
    }
    else{
        $_SESSION['error'] = "Xóa Thất Bại"; 
        redirectAdmin("orders");
    }
?>