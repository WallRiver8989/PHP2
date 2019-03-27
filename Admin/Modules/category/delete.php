<?php
    require_once __DIR__. "/../../Autoload/autoload.php";

    $id = intval(getInput('id'));
    
    $DelCategory = $db->fetchID("productcategories",$id);
    if(empty($DelCategory)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";

        redirectAdmin("category");
    }

    $num = $db->delete("productcategories",$id); 

    if($num >0){
        $_SESSION['success'] = "Xóa Thành Công";
        redirectAdmin("category");
    }
    else{
        $_SESSION['error'] = "Xóa Thất Bại"; 
        redirectAdmin("category");
    }
?>


