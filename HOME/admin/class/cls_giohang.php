<?php
class giohang
{
	private function connect()
	{
		$con = $con = mysql_connect(SERVERNAME, USERNAME, PASSWORD);	
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
	public function loadds_donhang($sql)
	{
		$link=$this -> connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if($i > 0)
		{
		echo'
			<form action="" method="post">
			<table width="1200" border="1px solid">
			<tr>
				<th align="center" style="font-size: 50px;" colspan="8" width="100%">QUẢN LÝ ĐƠN HÀNG</th>
			</tr>
			<tr>
				<td width="75" height="63" align="center"><strong>STT</strong></td>
				<td width="348" align="center"><strong>Họ tên</strong></td>
				<td width="100" align="center"><strong>Số điện thoại</strong></td>
				<td width="100" align="center"><strong>Địa chỉ</strong></td>
				<td width="348" align="center"><strong>Email</strong></td>
				<td width="348" align="center"><strong>Tổng đơn hàng</strong></td>
				<td width="348" align="center"><strong>Ghi chú</strong></td>
				<td width="60" align="center"><strong>Chức Năng</strong></td>
			</tr>';
			  	$dem=1;
				while($row=mysql_fetch_array($ketqua))
				{
					$id = $row['id'];
					$hoten = $row['hoten'];
					$sodienthoai = $row['sodienthoai'];
					$diachi = $row['diachi'];
					$email = $row['email'];
					$tongtien = $row['tongtien'];
					$ghichu = $row['ghichu'];
					echo'
					<tr>
						<td align="center" height="50"><a href="sua_donhang.php?id='.$id.'">'.$dem.'</a></td>
						<td style="font-size: 18px; padding-left: 10px;"><a href="sua_donhang.php?id='.$id.'">'.$hoten.'</a></td>
						<td align="center" height="50"><a href="sua_donhang.php?id='.$id.'">'.$sodienthoai.'</a></td>
						<td align="center" height="50"><a href="sua_donhang.php?id='.$id.'">'.$diachi.'</a></td>						
						<td align="center" height="50"><a href="sua_donhang.php?id='.$id.'">'.$email.'</a></td>
						<td align="center" height="50"><a href="sua_donhang.php?id='.$id.'">'.number_format($tongtien).'đ</a></td>
						<td align="center" height="50"><a href="sua_donhang.php?id='.$id.'">'.$ghichu.'</a></td>
						<td align="center"><a href="xoa_donhang.php?id='.$id.'">Xóa</a> <a href="sua_donhang.php?id='.$id.'">Sửa</a><td>
					</tr>';
				  $dem++;
				}
			echo'
			</table>
			</form>';	
			}
		else
		{
			echo 'Không có dữ liệu';
		}
	}	
	public function load_chitiet_donhang($id)
	{
		$link=$this -> connect();
		$sql="select * from donhang where id='".$id."'";
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$row=mysql_fetch_array($ketqua);
		return $row;
	}
	public function themxoasua($sql)
	{
		$link=$this -> connect();
		if(mysql_query($sql,$link))
		{
			return 1;
		}
		else
		{
			return 0;
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
				elseif($id == 2)
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
	public function load_sanpham($sql)
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
			}
		}else{
			echo 'Không có dữ liệu';
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
	public function loadds_danhmuc($sql)
	{
		$link=$this -> connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if($i > 0)
		{
		echo'
			<form action="" method="post">
			<table width="846" border="1px solid">
			<tr>
				<th align="center" style="font-size: 50px;" colspan="8" width="100%">QUẢN LÝ DANH MỤC</th>
			</tr>
			<tr>
				<td width="75" height="63" align="center"><strong>STT</strong></td>
				<td width="470" align="center"><strong>Tên danh mục</strong></td>
				<td width="60" align="center" colspan="4"><strong>Chức Năng</strong></td>
			</tr>';
			  	$dem=1;
				while($row=mysql_fetch_array($ketqua))
				{
					$id = $row['id'];
					$tendanhmuc = $row['tendanhmuc'];
					echo'
					<tr>
						<td align="center" height="50" colspan=""2><a href="?id='.$id.'">'.$dem.'</a></td>
						<td style="font-size: 18px; padding-left: 10px;"><a href="?id='.$id.'" colspan="2">'.$tendanhmuc.'</a></td>
						<td align="center"><button style="background-color: #f44336; color: white;" type="submit" name="nut" id="nut" value="Xóa">Xóa</button><td>
						<td align="center"><button style="background-color: #008CBA; color: white;" type="submit" name="nut" id="nut" value="Sửa">Sửa</button><td>
					</tr>';
				  $dem++;
				}
			echo'
			<tr>
				<td align="center" colspan="8" style="font-size: 25px" height="75"><button style="background-color: #4CAF50; color: white;" type="submit" name="nut" id="nut" value="Thêm Danh Mục">Thêm Danh Mục</button><td>
			</tr>
			</table>
			</form>';	
			}
		else
		{
			echo 'Không có dữ liệu';
		}
		
	}
	
	
	
	public function myupfile($name,$tmp_name,$folder)
	{
		if($name!='' && $tmp_name!='' && $folder!='')
		{
			$newname=$folder."/".$name;
			if(move_uploaded_file($tmp_name,$newname))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}
	
	public function loadcompo_danhmuc($sql,$idchon)
	{
		$link=$this -> connect();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if($i > 0)
		{
			echo'<select name="danhmuc" id="danhmuc">';
			echo '<option>Chọn loại sản phẩm</option>';
			while($row=mysql_fetch_array($ketqua))
			{
				$id = $row['id'];
				$tendanhmuc = $row['tendanhmuc'];
				if($id==$idchon)
				{
					echo'<option value="'.$id.'" selected="selected">'.$tendanhmuc.'</option>';
				}
				else
				{
					echo'<option value="'.$id.'">'.$tendanhmuc.'</option>';
				}
				
			}	
			echo'</select>';
		}
		else
		{
			echo ' khong co du lieu';
		}
	}
}
?>