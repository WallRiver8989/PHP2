<?php
    require_once __DIR__. "/../../Autoload/autoload.php";

    $id = intval(getInput('id'));
    
    $DelAdmin = $db->fetchID("admin",$id);
    if(empty($DelAdmin)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";

        redirectAdmin("category");
    }

    $num = $db->delete("admin",$id); 

    if($num >0){
        $_SESSION['success'] = "Xóa Thành Công";
        redirectAdmin("admin");
    }
    else{
        $_SESSION['error'] = "Xóa Thất Bại"; 
        redirectAdmin("admin");
    }
?>


