<?php
    require_once __DIR__. "../../Autoload/autoload.php";
    $sum =0;
   /* if(!isset($_SESSION['cart'])|| count($_SESSION['cart']==0)
    {
        echo "<script>alert('Không có sản phẩm trong giỏ hàng của bạn');location.href='index.php'</script>";
    }*/
    //unset($_SESSION['cart']);
    //  unset($_SESSION['total']);
?>

    <?php require_once __DIR__. "../../User/Layouts/Header.php"; ?> 
        <div class="col-md-12">
            <section class="box-main1">
            <h3 style="text-align:center">Giỏ hàng của bạn</h3>
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                            <th>Tổng Tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1 ; foreach($_SESSION['cart']as $id =>$value):?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td>
                                <img src ="<?php echo uploads()?>product/<?php echo $value['image'];?>" width="80px" height="80px">
                                
                            </td>	
                            <td>
                                <input type="number" name="quantity" style="width:80px" value="<?php  echo $value['quantity']?>" class="form-control" id="quantity" min="0">
                            </td>
                            
                            <td><?php echo formatPrice($value['price']) ?></td>
                            <td><?php echo formatPrice($value['price'] * $value['quantity']) ?></td>
                            <td>
                                <a class="btn btn-xs btn-danger " href="remove.php?id=<?php echo $id ?>"><i class="fa fa-times">&nbsp</i>Xóa</a>   
                            </td>
                        </tr>
                        <?php $sum += $value['price'] * $value['quantity']; $_SESSION['tongtien']=$sum;?>
                        <?php $stt++; endforeach ?>
                    </tbody>
                </table>
                <div class="col-md-5 pull-right">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h3>Thông tin đơn hàng</h3>
                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php echo formatPrice($_SESSION['tongtien']) ?></span>
                            Số tiền
                        </li>
                        <li class="list-group-item">
                            <span class="badge">10%</span>
                            Thuế VAT
                        </li>
                        <!--li class="list-group-item">
                            <span class="badge"><php echo sale($_SESSION['tongtien']) ?>%</span>
                            Giảm giá
                        </li-->
                        <li class="list-group-item">
                            <span class="badge"><?php $_SESSION['total'] = $_SESSION['tongtien'] * 110/100 ; echo formatPrice($_SESSION['total']) ?></span>
                            Tổng tiền thanh toán
                        </li>
                        <li class="list-group-item">
                            <a href="index.php" class="btn btn-success">Tiếp tục mua hàng</a>
                            <a href="payinfo.php" class="btn btn-success">Thanh toán</a>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    <?php require_once __DIR__. "../../User/Layouts/Footer.php"; ?>