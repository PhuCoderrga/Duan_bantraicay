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
						<td style="font-size: 18px; padding-left: 10px;"><a href="suadm.php?id='.$id.'" colspan="2">'.$tendanhmuc.'</a></td>
						<td align="center"><a href="xoadm.php?id='.$id.'">Xóa</a><td>
						<td align="center"><a href="suadm.php?id='.$id.'">Sửa</a><td>
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
	
	public function loadds_sanpham($sql)
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
				<th align="center" style="font-size: 50px;" colspan="8" width="100%">QUẢN LÝ SẢN PHẨM</th>
			</tr>
			<tr>
				<td width="75" height="63" align="center"><strong>STT</strong></td>
				<td width="348" align="center"><strong>Tên Sản Phẩm</strong></td>
				<td width="100" align="center"><strong>Giá</strong></td>
				<td width="100" align="center"><strong>Hình</strong></td>
				<td width="348" align="center"><strong>mota</strong></td>
				<td width="60" align="center" colspan="4"><strong>Chức Năng</strong></td>
			</tr>';
			  	$dem=1;
				while($row=mysql_fetch_array($ketqua))
				{
					$id = $row['id'];
					$tensp = $row['tensp'];
					$gia = $row['gia'];
					$mota = $row['mota'];
					$hinh = $row['hinh'];
					echo'
					<tr>
						<td align="center" height="50"><a href="?id='.$id.'">'.$dem.'</a></td>
						<td style="font-size: 18px; padding-left: 10px;"><a href="suasp.php?id='.$id.'" colspan="2">'.$tensp.'</a></td>
						<td align="center" height="50"><a href="?id='.$id.'">'.$gia.'</a></td>
						<td align="center" height="50"><a href="?id='.$id.'">'.$hinh.'</a></td>						
						<td align="center" height="50"><a href="?id='.$id.'">'.$mota.'</a></td>
						<input type="hidden" name="id_product" value="'.$id.'">
						<td align="center"><a href="xoasp.php?id='.$id.'">Xóa</a><td>
						<td align="center"><a href="suasp.php?id='.$id.'">Sửa</a></button><td>
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
}
?>