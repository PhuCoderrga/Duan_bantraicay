<?php
    session_start();
    include("class/config.php");
    if(isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['ten']))
    {
        include("class/clslogin.php");
        $q = new login();
    }
    include('class/cls_product.php');
    $p = new tmdt();

    include('class/cls_giohang.php');
    $giohang = new giohang();
    
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
<form action="class/cls_giohang.php" method="post" id="form_cart">
<input type="hidden" id="id_product" name="id_product" value="">
<input type="hidden" id="quantity" name="quantity" value="">
<input type="hidden" id="price" name="price" value="">
<input type="hidden" id="url_addtocart" name="url_addtocart" value="Giohang.php">
</form>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo2.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span class="soluong_giohang"><?php echo count($_SESSION['cart']);?></span></a></li>
            </ul>
            <div class="header__cart__price"><span class="tongtien_sanpham"><?php echo number_format($giohang->tongtien_giohang())."đ";?></span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Vietnam</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Đăng Nhập</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="index.php">Trang Chủ</a></li>
                <li><a href="Sanpham.php">Sản Phẩm</a></li>
                <li><a href="#">Trang</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="Chitietsanpham.php">Chi Tiết Sản Phẩm</a></li>
                        <li><a href="Giohang.php">Giỏ Hàng</a></li>
                        <li><a href="Thanhtoan.php">Thanh Toán</a></li>
                        <li><a href="Chitietbaiviet.php">Chi Tiết Bài Viết</a></li>
                    </ul>
                </li>
                <li><a href="Tintuc.php">Tin Tức</a></li>
                <li><a href="Lienhe.php">Liên Hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Miễn phí giao hàng cho những đơn hàng trên 1 triệu</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
              		 <?php if(isset($_SESSION['ten']))
						{?>
						<div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> Xin Chào <?php echo $_SESSION['ten']?></li>
                                <li>Miễn phí giao hàng cho những đơn hàng trên 1 triệu</li>
                            </ul>
                        </div>
					<?php }
                          else
						  {?>
						<div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> Xin Chào Khách Hàng</li>
                                <li>Miễn phí giao hàng cho những đơn hàng trên 1 triệu</li>
                            </ul>
                        </div>
							<?php }?>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <?php if(isset($_SESSION['email']))
							{?>
							<div class="header__top__right__language">
                                <i class="fa fa-user"></i>
                                <div>
                                <?php echo $_SESSION['email']?>
                                </div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="Logout_user.php">Đăng Xuất</a></li>
                                </ul>
                            </div>
						  <?php }
                              else
								{?>
							<div class="header__top__right__language">
                                <i class="fa fa-user"></i>
                                <div>
                                tài khoản
                                </div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="Login.php">Đăng Nhập</a></li>
                                    <li><a href="signup.php">Đăng Ký</a></li>
                                </ul>
                            </div>
							<?php }?>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php"><img src="img/logo2.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="index.php">Trang Chủ</a></li>
                            <li class="active"><a href="Sanpham.php">Sản Phẩm</a></li>
                            <li><a href="Tintuc.php">Tin Tức</a></li>
                            <li><a href="Lienhe.php">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="Giohang.php"><i class="fa fa-shopping-bag"></i> <span class="soluong_giohang"><?php echo count($_SESSION['cart']);?></span></a></li>
                        </ul>
                        <div class="header__cart__price"><span class="tongtien_sanpham"><?php echo number_format($giohang->tongtien_giohang())."đ";?></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh Mục</span>
                        </div>
                        <ul>
                            <?php
                                    $p->load_danhmuc_sanpham_product("select * from danhmuc order by tendanhmuc asc");
                                ?>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#" method="get">
                                <input type="text" name="search" value="<?php echo $_GET['search']?>" placeholder="Nhập sản phẩm bạn muốn tìm">
                                <button type="submit" name="submit" class="site-btn" value="Tìm Kiếm">Tìm Kiếm</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 0908123456</h5>
                                <span>Hỗ Trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->