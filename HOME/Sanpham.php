<?php
include('header.php');
if(!isset($_GET['page'])){
    $page=1;
} else {
    $page=$_GET['page'];
}
$per_page=12;
$order=$_GET['order'];
if($order==1){
    $sql_order="order by id desc ";
} else if($order==2){
    $sql_order="order by gia desc";
}
else if($order==3){
  $sql_order="order by gia asc";
} else {
    $sql_order="order by gia asc";
}
$min_price=$_GET['minamount'];
$max_price=$_GET['maxamount'];
$where_price="";
if($min_price>0&&$max_price>0){
    $where_price="and gia between ".$min_price." and ".$max_price." ";
}
$layid_danhmuc = $_REQUEST['id'];
                            if($layid_danhmuc > 0)
                            {
                                $sql="select * from sanpham where id_danhmuc='$layid_danhmuc'".$where_price;
                                $sql_thucthi="select * from sanpham where id_danhmuc='$layid_danhmuc' ".$where_price.$sql_order." limit ".($page-1)*$per_page.",".$per_page;   
                            }
                            elseif(isset($_GET['submit']))
                            {
                                switch($_GET['submit'])
                                {
                                    case 'Tìm Kiếm':
                                    {
                                        if ($_GET["search"] != '') 
                                        {
                                            $search = $_GET['search'];
                                            $sql="select * from sanpham where (tensp like '%$search%') OR (mota like '%$search%')".$where_price;
                                            $sql_thucthi="select * from sanpham where (tensp like '%$search%') OR (mota like '%$search%') ".$where_price.$sql_order." limit ".($page-1)*$per_page.",".$per_page;
                                        }   
                                    }
                                }       
                            }
                            else
                            {
                                $sql="select * from sanpham where 1=1 ".$where_price;
                                $sql_thucthi="select * from sanpham where 1=1 ".$where_price.$sql_order." limit ".($page-1)*$per_page.",".$per_page;
                            }
                            //var_dump($sql."@@@".$sql_thucthi);die;
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Chợ Trái Cây</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Trang Chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Toàn Bộ Danh Mục</h4>
                            <ul>
                            	<?php
									$p->load_danhmuc_sanpham_product("select * from danhmuc order by tendanhmuc asc");
								?>
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Tùy Chọn Giá</h4>
                            <div class="price-range-wrap">
                                <form action="#" method="get">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="15000" data-max="500000">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount" name="minamount" value="<?php echo $_GET['minamount']; ?>">
                                        <input type="text" id="maxamount" name="maxamount" value="<?php echo $_GET['maxamount']; ?>">
                                        <input type="submit" id="search_price" name="search_price" value="Tìm kiếm">
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sắp Xếp Theo</span>
                                    <select name="select_order" id="select_order">
                                    	<option value="0">Tất Cả</option>
                                    	<option value="1" <?php if($_GET['order']==1) echo "selected";?>>Hàng Mới</option>
                                        <option value="2" <?php if($_GET['order']==2) echo "selected";?>>Giá Cao</option>
                                        <option value="3" <?php if($_GET['order']==3) echo "selected";?>>Giá Thấp</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__found">
                                    <h6><span><?php echo $p->tongsanpham($sql);?></span> sản phẩm được tìm thấy</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    		<?php
                                $p->load_sanpham_product($sql_thucthi);
							?>
                    </div>
                    <div class="product__pagination">
                        <?php echo $p->paging($sql); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    <?php include('footer.php'); ?>