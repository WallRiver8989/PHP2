<?php

require_once __DIR__. "../../Autoload/autoload.php";
    
	/*if(!isset($_SESSION['name_id']))
	{
		echo "<script>alert('Bạn cần phải đăng nhập mới có thể thực hiện được chức năng này');location.href='index.php'</script>;	
	}*/

	$id = intval(getInput('id'));

	$product = $db->fetchID("products",$id);

	if(! isset($_SESSION['cart'][$id]))
	{
		$_SESSION['cart'][$id]['name'] = $product['Name'];
		$_SESSION['cart'][$id]['image'] = $product['Image'];
		$_SESSION['cart'][$id]['price'] = $product['Price'];
		$_SESSION['cart'][$id]['quantity'] = 1;
		
	}
	
	else
	{
		$_SESSION['cart'][$id]['quantity'] += 1;
	}

	echo "<script>alert('Thêm sản phẩm thành công');location.href='cart.php'</script>";
?>