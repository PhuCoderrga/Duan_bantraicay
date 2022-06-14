<?php
session_start();
if(isset($_POST['btn_inc_dec'])){
	$id_product=$_POST['id_product'];
	$quantity=$_POST['quantity'];
	$price=$_POST['price'];
	for($i=0;$i<count($_SESSION['cart']);$i++){
			if($_SESSION['cart'][$i]['id']==$id_product){
				if($_POST['btn_inc_dec']==1){
					$_SESSION['cart'][$i]['quantity']=$_SESSION['cart'][$i]['quantity']+1;
					$quantity+=1;
				}
				else if($_POST['btn_inc_dec']==-1){
					$_SESSION['cart'][$i]['quantity']=$_SESSION['cart'][$i]['quantity']-1;
					$quantity-=1;
				}
			}
		}
	$tongtien=0;
			for($i=0;$i<count($_SESSION['cart']);$i++){
				$tongtien+=$_SESSION['cart'][$i]['price']*$_SESSION['cart'][$i]['quantity'];
			}
			$ketqua['tongtien']=number_format($tongtien)."đ";
			$ketqua['thanhtien']=number_format($quantity*$price);
	echo json_encode($ketqua); return;
}
else if(isset($_POST['btn_xoa'])){
	if($_SESSION['cart']==null) return;
	unset($_SESSION['temp_cart']);
	$id_product=$_POST['id_product'];
	$thutu=0;
	for($i=0;$i<count($_SESSION['cart']);$i++){
			if($_SESSION['cart'][$i]['id']!=$id_product){
				$_SESSION['temp_cart'][]=$_SESSION['cart'][$i];
			}
		}
		unset($_SESSION['cart']);
		$_SESSION['cart']=$_SESSION['temp_cart'];
	$tongtien=0;
			for($i=0;$i<count($_SESSION['cart']);$i++){
				$tongtien+=$_SESSION['cart'][$i]['price']*$_SESSION['cart'][$i]['quantity'];
			}
			$ketqua['tongtien']=number_format($tongtien)."đ";
			$ketqua['soluong']=count($_SESSION['cart']);
	echo json_encode($ketqua); return;
} else if(isset($_POST['id_product'])){
	$id_product=$_POST['id_product'];
	$quantity=$_POST['quantity'];
		$price=$_POST['price'];
	$url_hientai=$_POST['url_addtocart'];
	if(isset($_SESSION['cart'])){
		for($i=0;$i<count($_SESSION['cart']);$i++){
			if($_SESSION['cart'][$i]['id']==$id_product){
				$_SESSION['cart'][$i]['quantity']=$_SESSION['cart'][$i]['quantity']+$quantity;
				header('Location: http://localhost/HOME/Giohang.php?addtocart='.$id_product);
				return;
			}
		}
		$arr_product['id']=$_POST['id_product'];
		$arr_product['price']=$_POST['price'];
				$arr_product['quantity']=$_POST['quantity'];
				$_SESSION['cart'][]=$arr_product;
				
	} else {
		$arr_product['id']=$_POST['id_product'];
		$arr_product['quantity']=$_POST['quantity'];
		$arr_product['price']=$_POST['price'];
		$_SESSION['cart'][]=$arr_product;
	}
	header('Location: http://localhost/HOME/Giohang.php?addtocart='.$id_product);
	}
	class giohang{
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
		public function tongtien_giohang(){
			$tongtien=0;
			for($i=0;$i<count($_SESSION['cart']);$i++){
				$tongtien+=($_SESSION['cart'][$i]['price']*$_SESSION['cart'][$i]['quantity']);
			}
			return $tongtien;
		}
		public function dathang($hoten,$sodienthoai,$diachi,$email,$ghichu,$donhang,$tongtien){
			$link=$this -> connect();
			$sql="INSERT INTO donhang (hoten, sodienthoai, diachi, email, ghichu,donhang,tongtien) VALUES ('$hoten', '$sodienthoai', '$diachi', '$email', '$ghichu','$donhang','$tongtien');";
			if(mysql_query($sql,$link))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		}

?>