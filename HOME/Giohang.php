<?php include('header.php'); 
//unset($_SESSION['cart']);
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng của bạn</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <span>Giỏ hàng của bạn</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <?php $row=$p->load_one_sanpham($_GET['addtocart']); ?>
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <?php if(isset($_GET['addtocart'])){ ?>
                    <div class="col-lg-12 success_addtocart">Chúc mừng! Bạn đã thêm sản phẩm <b class="add_success"><?php echo $row['tensp']?></b> thành công!</div>
                <?php } ?>
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
                                if(count($_SESSION['cart'])>0){
                                foreach($_SESSION['cart'] as $product){ 
								$row=$p->load_one_sanpham($product['id']);
								?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img width="100px" src="img/product/<?php echo $row['hinh']?>" alt="">
                                        <h5><?php echo $row['tensp']?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?php echo number_format($product['price']);?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" id_product="<?php echo $product['id']?>" price="<?php echo $product['price']?>" value="<?php echo $product['quantity']?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php echo number_format($product['quantity']*$product['price']);?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close" id_product="<?php echo $product['id']?>"></span>
                                    </td>
                                </tr>
                               <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="Sanpham.php" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                        <a href="Giohang.php" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Cập nhật giỏ hàng</a>
                    </div>
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng tiền giỏ hàng</h5>
                        <ul>
                            <li>Tạm tính <span class="tongtien_sanpham"><?php echo number_format($giohang->tongtien_giohang())."đ";?></span></li>
                            <li>Tổng tiền <span class="tongtien_sanpham"><?php echo number_format($giohang->tongtien_giohang())."đ";?></span></li>
                        </ul>
                        <a href="Thanhtoan.php" class="primary-btn">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

<?php include('footer.php'); ?>
<script>
    $(document).ready(function() {
     $('.inc.qtybtn').click(function(event) {
            var quantity=$(this).prev().val();
            var price=$(this).prev().attr('price');
            var id_product=$(this).prev().attr('id_product');
             var this_button=$(this);
             var tongtiensanpham=$('.tongtien_sanpham');
            $.ajax({
              method: "POST",
              url: "class/cls_giohang.php",
              data: { id_product: id_product, price: price,quantity:quantity,btn_inc_dec:"1" }
            }).done(function( msg ) {
                var kq = JSON.parse(msg);
                this_button.parent().parent().parent().next().html(kq.thanhtien);
                 tongtiensanpham.html(kq.tongtien);
              });
        });
        $('.dec.qtybtn').click(function(event) {
           var quantity=$(this).next().val();
            var price=$(this).next().attr('price');
            var id_product=$(this).next().attr('id_product');
            var this_button=$(this);
            var tongtiensanpham=$('.tongtien_sanpham');
            $.ajax({
              method: "POST",
              url: "class/cls_giohang.php",
              data: { id_product: id_product, price: price,quantity:quantity,btn_inc_dec:"-1" }
            }).done(function( msg ) {
                var kq = JSON.parse(msg);
                this_button.parent().parent().parent().next().html(kq.thanhtien);
                tongtiensanpham.html(kq.tongtien);
              });
        });
        $('.icon_close').click(function(event) {
            var id_product=$(this).attr('id_product');
            var tongtiensanpham=$('.tongtien_sanpham');
            var this_xoa=$(this);
            var soluong_giohang=$('.soluong_giohang');
            $.ajax({
              method: "POST",
              url: "class/cls_giohang.php",
              data: { id_product: id_product,btn_xoa:"1" }
            }).done(function( msg ) {
                var kq = JSON.parse(msg);
                tongtiensanpham.html(kq.tongtien);
                this_xoa.parent().parent().slideUp(400);
                soluong_giohang.html(kq.soluong);
              });
        });   
    });
</script>