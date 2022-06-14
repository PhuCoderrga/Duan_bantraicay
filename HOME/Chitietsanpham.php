<?php include('header.php'); ?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Chi Tiết Sản Phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
               	<?php
				$layid_sanpham = $_REQUEST['id']; 
				$p->load_sanpham_chitiet("select * from sanpham where id='$layid_sanpham'");
				?>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Mô tả</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Thông tin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Đánh giá <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Thông tin sản phẩm</h6>
                                    <p>Dừa có tên khoa học: Cocos nucifera. Dừa hay cọ dừa, là một loài cây trong họ Cau. Nó cũng là thành viên duy nhất trong chi Cocos là một loại cây lớn, thân đơn trục có thể cao tới 30 m, với các lá đơn xẻ, cuống và gân chính dài 4–6 m các thùy với gân cấp 2 có thể dài 60–90 cm, lá thường biến thành bẹ dạng lưới ôm lấy thân.

Thân dừa: Cây dừa cao khỏe, có màu nâu sậm, hình trụ. Lá: Lá dài, xanh và có nhiều tàu. Hoa: Trắng và nhỏ. Quả: Phát triển từ hoa, bên ngoài màu xanh dày, bên trong có cơm và nước. Khi già quả chuyển sang màu vàng nâu. Buồng dừa: Chứa các quả dừa, mỗi buồng thường có 15- 20 quả.
</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Thông tin sản phẩm</h6>
                                    <p>Dừa có tên khoa học: Cocos nucifera. Dừa hay cọ dừa, là một loài cây trong họ Cau. Nó cũng là thành viên duy nhất trong chi Cocos là một loại cây lớn, thân đơn trục có thể cao tới 30 m, với các lá đơn xẻ, cuống và gân chính dài 4–6 m các thùy với gân cấp 2 có thể dài 60–90 cm, lá thường biến thành bẹ dạng lưới ôm lấy thân.

Thân dừa: Cây dừa cao khỏe, có màu nâu sậm, hình trụ. Lá: Lá dài, xanh và có nhiều tàu. Hoa: Trắng và nhỏ. Quả: Phát triển từ hoa, bên ngoài màu xanh dày, bên trong có cơm và nước. Khi già quả chuyển sang màu vàng nâu. Buồng dừa: Chứa các quả dừa, mỗi buồng thường có 15- 20 quả.

                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Thông tin sản phẩm</h6>
                                    <p>Dừa có tên khoa học: Cocos nucifera. Dừa hay cọ dừa, là một loài cây trong họ Cau. Nó cũng là thành viên duy nhất trong chi Cocos là một loại cây lớn, thân đơn trục có thể cao tới 30 m, với các lá đơn xẻ, cuống và gân chính dài 4–6 m các thùy với gân cấp 2 có thể dài 60–90 cm, lá thường biến thành bẹ dạng lưới ôm lấy thân.

Thân dừa: Cây dừa cao khỏe, có màu nâu sậm, hình trụ. Lá: Lá dài, xanh và có nhiều tàu. Hoa: Trắng và nhỏ. Quả: Phát triển từ hoa, bên ngoài màu xanh dày, bên trong có cơm và nước. Khi già quả chuyển sang màu vàng nâu. Buồng dừa: Chứa các quả dừa, mỗi buồng thường có 15- 20 quả.
</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Các sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Thịt</a></h6>
                            <h5>150.000đ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Chuối</a></h6>
                            <h5>50.000đ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Ôỉ</a></h6>
                            <h5>30.000đ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Dưa hấu</a></h6>
                            <h5>30.000đ</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
<?php include('footer.php'); ?>