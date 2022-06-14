<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	require('header.php');
?>
<?php
include("class/cls_product.php");
$p=new tmdt();
$layid=0;
if(isset($_REQUEST['id']))
{
	$layid=$_REQUEST['id'];
}
?>
<div class="content-wrapper" style="min-height: 1203.6px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" style="padding-left: 200px;">
                <div class="col-sm-6">
                    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                      <table width="813" border="1" align="center">
                        <tr>
                        	<th style="font-size: 50px; text-align:center" width="100%" colspan="2">THÊM SẢN PHẨM MỚI</th>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Tên sản phẩm</strong></td>
                          <td width="488"><label for="tensp"></label>
                          <input type="text" name="tensp" id="tensp" /></td>
                        </tr>
                        <tr>
                          <td height="45"><strong>Danh mục sản phẩm</strong></td>
                          <td>&nbsp;
                          <?php
                          $layid_danhmuc=$p->laycot("select id_danhmuc from sanpham where id=$layid limit 1");
                          $p->loadcompo_danhmuc("select id,tendanhmuc from danhmuc order by id asc",$layid_danhmuc);
                          ?>
                            <label for="txtid"></label>
                            <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" />
                          </td>
                        </tr>
                        <tr>
                          <td height="52"><strong>Giá</strong></td>
                          <td><label for="giasp"></label>
                          <input type="text" name="giasp" id="giasp" /></td>
                        </tr>
                        <tr>
                          <td height="92"><strong>Mô tả</strong></td>
                          <td><label for="mota"></label>
                          <textarea name="mota" id="mota" cols="45" rows="5"></textarea></td>
                        </tr>
                        <tr>
                          <td height="63"><strong>Ảnh sản phẩm</strong></td>
                          <td><label for="anh"></label>
                          <input type="file" name="hinh" id="hinh" /></td>
                        </tr>
                        <tr>
                          <td height="115" colspan="2" align="center">
							<button style="background-color: #4CAF50; color: white;" type="submit" name="nut" id="nut" value="Thêm sản phẩm">Thêm sản phẩm</button>
                        </tr>
                        <tr>
                          <td height="30" colspan="2" align="center" style=" font-weight: bold;">
<?php
	switch($_POST['nut'])
	{
		case 'Thêm sản phẩm':
		{
			$id_danhmuc=$_REQUEST['danhmuc'];
			$tensp=$_REQUEST['tensp'];
			$gia=$_REQUEST['giasp'];
			$mota=$_REQUEST['mota'];
			$name=$_FILES['hinh']['name'];
			$tmp_name=$_FILES['hinh']['tmp_name'];
			$type=$_FILES['hinh']['type'];
			$size=$_FILES['hinh']['size'];
				if($tensp!=''||$gia!='')
				{
					if($id_danhmuc!=0)
					{
					if($name!='')
					{
					$name=time()."_".$name;
					if($p->myupfile($name,$tmp_name,'../../HOME/img/product'))
						{
							if($p->themxoasua("INSERT INTO sanpham (tensp, gia, mota, hinh, id_danhmuc) VALUES ('$tensp', '$gia', '$mota', '$name', '$id_danhmuc');")==1)
							{
								echo'Thêm sản phẩm thành công';
							}
							else
							{
								echo'Thêm sản phẩm không thành công';
							}
						}
						else
						{
							echo 'không upload được hình đại diện';
						}
						}
						else
						{
							echo 'Vui lòng chọn ảnh đại diện';
						}
						}
						else
						{ 
							echo'Chọn loại sản phẩm';
						}
				}
				else
				{
				echo'Chưa nhập đầy đủ thông tin sản phẩm';
				}
				
		break;
		}
	}
?> 
                          </td>
                        </tr>
                      </table>
 
                  </form>
              </div>
             </div>
         </div>
     </section>
</div>         
<?php
	require('quantri/footer.php');
	
?>
</body>
</html>