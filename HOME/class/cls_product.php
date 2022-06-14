<?php
class tmdt
{
	private function connect()
	{
		$con = mysql_connect(SERVERNAME, USERNAME, PASSWORD);		
		if (!$con)
		{
   			echo "Connection failed";
			exit();
		}
		else
		{
			mysql_select_db(DATABASE);
			mysql_query("SET NAMES UTF8");	
			return $con;
		}
	}
	
   	public function load_danhmuc_sanpham_cohinh($sql)
	{
		$link=$this -> connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if($i > 0)
		{
			$i=1;
			while($row=mysql_fetch_array($ketqua))
			{
				$id = $row['id'];
				$tendanhmuc = $row['tendanhmuc'];
				echo '<div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/'.$id.'.jpg">
                            <h5><a href="SanPham.php?id='.$id.'">'.$tendanhmuc.'</a></h5>
                        </div>
                    </div>';
                    $i++;
			}	
		}
		else
		{
			echo 'không có dữ liệu';
		}
		
	}
	public function load_danhmuc_sanpham($sql)
	{
		$link=$this -> connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$id = $row['id'];
				$tendanhmuc = $row['tendanhmuc'];
				if($id == 1)
				{
					echo '<li data-filter=".NhapKhau">'.$tendanhmuc.'</li>';
				}
				elseif($id == 7)
				{
					echo '<li data-filter=".NoiDia">'.$tendanhmuc.'</li>';
				}
				elseif($id == 3)
				{
					echo '<li data-filter=".Xay">'.$tendanhmuc.'</li>';
				}
				elseif($id == 4)
				{
					echo '<li data-filter=".NuocEp">'.$tendanhmuc.'</li>';;
				}
				elseif($id == 5)
				{
					echo '<li data-filter=".Ruou">'.$tendanhmuc.'</li>';;
				}				
				elseif($id == 6)
				{
					echo '<li data-filter=".CuQua">'.$tendanhmuc.'</li>';
				}
				else
				{
					echo 'không tồn tại danh mục';	
				}
			}	
		}
		else
		{
			echo 'không có dữ liệu';
		}
		
	}
	public function load_danhmuc_sanpham_product($sql)
	{
		$link=$this -> connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$id = $row['id'];
				$tendanhmuc = $row['tendanhmuc'];
				echo
				'
					<li><a href="SanPham.php?id='.$id.'">'.$tendanhmuc.'</a></li>	
				';
			}
		}
		else
		{
			
		}
	}
	public function load_one_sanpham($id)
	{
		$link=$this -> connect();
		$sql="select * from sanpham where id='".$id."'";
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$row=mysql_fetch_array($ketqua);
		return $row;
	}
	public function paging($sql)
	{
		$link=$this -> connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$num_rows = mysql_num_rows($ketqua);
		$page=$num_rows/12;
		if($num_rows%12>0){
			$page+=1;
		}
		$cur_page=$_GET['page'];
		for($i=1;$i<=$page;$i++){
			if($cur_page==$i)
				$selected_page="selected_page";
			else $selected_page="";
			echo '<a class="'.$selected_page.'" href="?page='.$i.'">'.$i.'</a>';
		}
	}
	public function tongsanpham($sql)
	{
		$link=$this -> connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$num_rows = mysql_num_rows($ketqua);
		return $num_rows;
	}
	public function load_sanpham_home($sql)
	{
		$link=$this -> connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$id = $row['id'];
				$tensp = $row['tensp'];
				$gia = $row['gia'];
				$hinh = $row['hinh'];
				$id_danhmuc = $row['id_danhmuc'];
				if($id_danhmuc == 1)
				{
					echo '
					<div class="col-lg-3 col-md-4 col-sm-6 mix NhapKhau">
						<div class="featured__item">
								<div class="featured__item__pic set-bg" data-setbg="img/product/'.$hinh.'">
									<ul class="featured__item__pic__hover">
										<li><a href="Chitietsanpham.php?id='.$id.'"><i class="fa fa-retweet"></i></a></li>
										<li><a class="addtocart" id_product="'.$id.'" price="'.$gia.'" quantity="1"><i class="fa fa-shopping-cart"></i></a></li>
									</ul>
								</div>
								<div class="featured__item__text">
									<h6><a href="#">'.$tensp.'</a></h6>
									
									<h5>'.number_format($gia).'đ</h5>
								</div>
						</div>
					</div>';
				}
				elseif($id_danhmuc == 7)
				{
					echo '
					<div class="col-lg-3 col-md-4 col-sm-6 mix NoiDia">
						<div class="featured__item">
								<div class="featured__item__pic set-bg" data-setbg="img/product/'.$hinh.'">
									<ul class="featured__item__pic__hover">
										<li><a href="Chitietsanpham.php?id='.$id.'"><i class="fa fa-retweet"></i></a></li>
										<li><a class="addtocart" id_product="'.$id.'" price="'.$gia.'" quantity="1"><i class="fa fa-shopping-cart"></i></a></li>
									</ul>
								</div>
								<div class="featured__item__text">
									<h6><a href="#">'.$tensp.'</a></h6>
									<h5>'.number_format($gia).'đ</h5>
								</div>
						</div>
					</div>';
				}
				elseif($id_danhmuc == 3 )
				{
					echo '
					<div class="col-lg-3 col-md-4 col-sm-6 mix Xay">
						<div class="featured__item">
								<div class="featured__item__pic set-bg" data-setbg="img/product/'.$hinh.'">
									<ul class="featured__item__pic__hover">
										<li><a href="Chitietsanpham.php?id='.$id.'"><i class="fa fa-retweet"></i></a></li>
										<li><a class="addtocart" id_product="'.$id.'" price="'.$gia.'" quantity="1"><i class="fa fa-shopping-cart"></i></a></li>
									</ul>
								</div>
								<div class="featured__item__text">
									<h6><a href="#">'.$tensp.'</a></h6>
									<h5>'.number_format($gia).'đ</h5>
								</div>
						</div>
					</div>';
				}
				elseif($id_danhmuc == 4)
				{
					echo '
					<div class="col-lg-3 col-md-4 col-sm-6 mix NuocEp">
						<div class="featured__item">
								<div class="featured__item__pic set-bg" data-setbg="img/product/'.$hinh.'">
									<ul class="featured__item__pic__hover">
										<li><a href="Chitietsanpham.php?id='.$id.'"><i class="fa fa-retweet"></i></a></li>
										<li><a class="addtocart" id_product="'.$id.'" price="'.$gia.'" quantity="1"><i class="fa fa-shopping-cart"></i></a></li>
									</ul>
								</div>
								<div class="featured__item__text">
									<h6><a href="#">'.$tensp.'</a></h6>
									<h5>'.number_format($gia).'đ</h5>
								</div>
						</div>
					</div>';
				}
				elseif($id_danhmuc == 5)
				{
					echo '
					<div class="col-lg-3 col-md-4 col-sm-6 mix Ruou">
						<div class="featured__item">
								<div class="featured__item__pic set-bg" data-setbg="img/product/'.$hinh.'">
									<ul class="featured__item__pic__hover">
										<li><a href="Chitietsanpham.php?id='.$id.'"><i class="fa fa-retweet"></i></a></li>
										<li><a class="addtocart" id_product="'.$id.'" price="'.$gia.'" quantity="1"><i class="fa fa-shopping-cart"></i></a></li>
									</ul>
								</div>
								<div class="featured__item__text">
									<h6><a href="#">'.$tensp.'</a></h6>
									<h5>'.number_format($gia).'đ</h5>
								</div>
						</div>
					</div>';
				}
				elseif($id_danhmuc == 6)
				{
					echo '
					<div class="col-lg-3 col-md-4 col-sm-6 mix CuQua">
						<div class="featured__item">
								<div class="featured__item__pic set-bg" data-setbg="img/product/'.$hinh.'">
									<ul class="featured__item__pic__hover">
										<li><a href="Chitietsanpham.php?id='.$id.'"><i class="fa fa-retweet"></i></a></li>
										<li><a class="addtocart" id_product="'.$id.'" price="'.$gia.'" quantity="1"><i class="fa fa-shopping-cart"></i></a></li>
									</ul>
								</div>
								<div class="featured__item__text">
									<h6><a href="#">'.$tensp.'</a></h6>
									<h5>'.number_format($gia).'đ</h5>
								</div>
						</div>
					</div>';
				}
			}	
		}
		else
		{
			echo 'không có dữ liệu';
		}
	}
	
	public function load_sanpham_product($sql)
	{
		$link=$this -> connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$id = $row['id'];
				$tensp = $row['tensp'];
				$gia = $row['gia'];
				$hinh = $row['hinh'];
				$id_danhmuc = $row['id_danhmuc'];
					echo'
					<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/'.$hinh.'">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="Chitietsanpham.php?id='.$id.'"><i class="fa fa-retweet"></i></a></li>
                                        <li><a class="addtocart" id_product="'.$id.'" price="'.$gia.'" quantity="1"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="Chitietsanpham.php?id='.$id.'">'.$tensp.'</a></h6>
                                    <h5>'.number_format($gia).'đ</h5>
                                </div>
                            </div>
                    </div>';
			}	
		}
		else
		{
			echo 'không có dữ liệu';
		}
		
	}
	
	public function search_sanpham($sql)
	{
		$link=$this -> connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$id = $row['id'];
				$tensp = $row['tensp'];
				$gia = $row['gia'];
				$hinh = $row['hinh'];
					echo'
					<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/'.$hinh.'">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="Chitietsanpham.php?id='.$id.'"><i class="fa fa-retweet"></i></a></li>
                                        <li><a class="addtocart" id_product="'.$id.'" price="'.$gia.'" quantity="1"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">'.$tensp.'</a></h6>
                                    <h5>'.number_format($gia).'</h5>
                                </div>
                            </div>
                    </div>';
			}	
		}
		else
		{
			echo 'không có dữ liệu';
		}
		
	}
	public function laycot($sql)
	{
		$link=$this->connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i=mysql_num_rows($ketqua);
		$giaitri='';
		if($i>0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$id=$row[0];
				$giaitri=$id;	
			}	
			
		}
		return $giaitri;
	}	
	/*------------------------------------------------------------------------------------------------------------------------------------*/
	public function load_sanpham_chitiet($sql)
	{
		$link=$this -> connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$id = $row['id'];
				$tensp = $row['tensp'];
				$gia = $row['gia'];
				$hinh = $row['hinh'];
				$mota = $row['mota'];
				$id_danhmuc = $row['id_danhmuc'];
					echo'
					<div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="img/product/'.$hinh.'" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>'.$tensp.'</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 đánh giá)</span>
                        </div>
                        <div class="product__details__price">'.number_format($gia).'</div>
                        <p>'.$mota.'</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" id="quantity_chitiet" name="quantity" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn addtocart_chitiet" id_product="'.$id.'" price="'.$gia.'">Thêm giỏ hàng</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Số lượng còn:</b> <span>Còn hàng</span></li>
							<li><b>Vận chuyển</b> <span>1 đến 3 ngày <samp>(tùy khu vực)</samp></span></li>
                            <li><b>Trọng lượng</b> <span>0.5 kg</span></li>
                            <li><b>Chia sẻ qua</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>';
			}	
		}
		else
		{
			echo 'không có dữ liệu';
		}
		
	}
}

?>