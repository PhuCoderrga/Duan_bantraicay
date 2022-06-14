<?php include('header.php'); 
if(isset($_POST['btn_dathang'])){
    $hoten=$_POST['hoten'];
    $diachi=$_POST['diachi'];
    $sodienthoai=$_POST['sodienthoai'];
    $email=$_POST['email'];
    $ghichu=$_POST['ghichu'];
    $donhang=$_POST['donhang'];
    $tongtien=$_POST['tongtien'];
    if($giohang->dathang($hoten,$sodienthoai,$diachi,$email,$ghichu,$donhang,$tongtien)==1){
        unset($_SESSION['cart']);
        echo "<script>window.location.href='Dathangthanhcong.php';</script>";
    }
}
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thanh toán</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <span>Thanh toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>CHI TIẾT ĐƠN HÀNG</h4>
                <form method="post" action="">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <p>Họ tên<span>*</span></p>
                                <input type="text" name="hoten" id="hoten">
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" name="diachi" id="diachi">
                            </div>
                            <div class="checkout__input">
                                <p>Số điện thoại<span>*</span></p>
                                <input type="text" name="sodienthoai" id="sodienthoai">
                            </div>
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="text" name="email" id="email">
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú thêm</p>
                                <input type="text" name="ghichu" id="ghichu">
                            </div>
                            <div class="checkout__input hidden">
                                <p>Tổng tiền</p>
                                <input type="text" name="tongtien" id="tongtien" value="<?php echo $giohang->tongtien_giohang();?>">
                            </div>
                            <div class="checkout__input hidden">
                                <p>Đơn hàng</p>
                                <textarea name="donhang" id="donhang">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td>Tên sản phẩm</td>
                                                <td>Giá</td>
                                                <td>Số lượng</td>
                                                <td>Thành tiền</td>
                                            </tr>
                                        </thead>
                                    <?php 
                                    if(count($_SESSION['cart'])>0){
                                    foreach($_SESSION['cart'] as $product){ 
                                $row=$p->load_one_sanpham($product['id']);
                                ?>
                                <tr>
                                    <td><?php echo $row['tensp']?></td>
                                    <td><?php echo number_format($product['price'])."đ"; ?></td>
                                    <td><?php echo $product['quantity'] ?></td>
                                    <td><?php echo number_format($product['price']*$product['quantity'])."đ"; ?></td>
                                </tr>
                                <?php } } ?>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">Tổng tiền</td>
                                        <td><?php echo number_format($giohang->tongtien_giohang())."đ";?></td>
                                    </tr>
                                </tfoot>
                                </table>
                                </textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Chi tiết đơn hàng</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Thành tiền</span></div>
                                <ul>
                                    <?php 
                                    if(count($_SESSION['cart'])>0){
                                    foreach($_SESSION['cart'] as $product){ 
                                $row=$p->load_one_sanpham($product['id']);
                                ?>
                                    <li><?php echo $row['tensp']." x ".$product['quantity']?> <span><?php echo number_format($product['price']*$product['quantity'])."đ" ?></span></li>
                                <?php } } ?>
                                </ul>
                                <div class="checkout__order__subtotal">Tạm tính <span><?php echo number_format($giohang->tongtien_giohang())."đ";?></span></div>
                                <div class="checkout__order__total">Tổng tiền <span><?php echo number_format($giohang->tongtien_giohang())."đ";?></span></div>
                                <button type="submit" class="site-btn" name="btn_dathang">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
<?php include('footer.php'); ?>