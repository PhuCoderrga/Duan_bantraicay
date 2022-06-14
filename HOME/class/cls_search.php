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
}
?>