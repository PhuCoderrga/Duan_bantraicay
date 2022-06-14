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
switch($_POST['nut'])
{
  case 'Cập Nhập':
  {
    $idsua = $_REQUEST['txtid'];
    $id_danhmuc=$_REQUEST['danhmuc'];
    $tensp=$_REQUEST['txtten'];
    $gia=$_REQUEST['txtgia'];
    $mota=$_REQUEST['mota'];
    $name=$_FILES['hinh']['name'];
      $tmp_name=$_FILES['hinh']['tmp_name'];
      $type=$_FILES['hinh']['type'];
      $size=$_FILES['hinh']['size'];
    if($idsua>0)
    {
      $name=time()."_".$name;
          if($p->myupfile($name,$tmp_name,'../../HOME/img/product')){
      if($p->themxoasua("UPDATE sanpham SET tensp = '$tensp', mota = '$mota',`gia` = '$gia',`hinh` = '$name',id_danhmuc = '$id_danhmuc' WHERE id = '$idsua' LIMIT 1")==1)
      {
        header('location:dssp.php');
      }
      else
      {
        echo 'Sửa không thành công';
      }
          }
    }
    else
    {
      echo 'vui lòng chọn thông tin cẩn sửa';
    } 
    break;
  }
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
                        	<th style="font-size: 50px; text-align:center" width="100%" colspan="2">SỬA SẢN PHẨM </th>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Tên sản phẩm</strong></td>
                          <td width="488"><label for="tensp"></label>
                          <input name="txtten" type="text" id="txtten" value="<?php echo $p->laycot("select tensp from sanpham where id='$layid' limit 1");?>"/>
                         <input name="txtid" type="text" id="txtid" value="<?php echo $layid; ?>" />
                         </td>
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
                          <input name="txtgia" type="text" id="txtgia" value="<?php echo $p->laycot("select gia from sanpham where id='$layid' limit 1");  ?>"/></td>
                        </tr>
                        <tr>
                          <td height="92"><strong>Mô tả</strong></td>
                          <td><label for="mota"></label>
                          <textarea name="mota" id="mota" cols="45" rows="5"><?php echo $p->laycot("select mota from sanpham where id='$layid' limit 1 ");?></textarea></td>
                        </tr>
                        <tr>
                          <td height="63"><strong>Ảnh sản phẩm</strong></td>
                          <td><label for="anh"></label>
                          <input type="file" name="hinh" id="hinh" /></td>
                        </tr>
                        <tr>
                          <td height="115" colspan="2" align="center">
							<button style="background-color: #4CAF50; color: white;" type="submit" name="nut" id="nut" value="Cập Nhập">Cập Nhập</button>
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