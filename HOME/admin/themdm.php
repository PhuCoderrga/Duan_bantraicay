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
                    <form id="form1" name="form1" method="post" action="">
                    <table width="846" border="0">
                        <tr>
                            <th style="font-size: 50px; text-align:center" width="100%">THÊM DANH MỤC MỚI</th>
                        </tr>
                        <tr>
							<td height="56" align="center"><input style="width: 60%; height: 50px" type="text" name="tendanhmuc" placeholder="Nhập tên danh mục mới"/></td>
                        </tr>
                        <tr>
                        	<td align="center" height="70">
                        		<button style="background-color: #4CAF50; color: white;" type="submit" name="nut" id="nut" value="Thêm danh mục">Thêm Danh Mục</button>
                            </td>
                        </tr>
                        <tr>
                        	<td align="center">
							<?php
								  switch($_POST['nut'])
								  {
									  case 'Thêm danh mục':
									  {
										  $tendanhmuc=$_REQUEST['tendanhmuc'];
										  if($tendanhmuc!='')
		  									{
											if($p->themxoasua("INSERT INTO  danhmuc (tendanhmuc) VALUES('$tendanhmuc')")==1)
												{
													echo'Thêm danh mục sản phẩm thành công';
												}
												else
												{
													echo'Thêm danh mục không thành công';
												}
												
											}
											else
											{
												echo' Vui lòng nhập tên danh mục sản phẩm cần thêm';
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