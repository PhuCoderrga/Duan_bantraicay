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

include("class/cls_giohang.php");
$giohang=new giohang();
$row=$giohang->load_chitiet_donhang($_GET['id']);
$layid=0;
if(isset($_REQUEST['id']))
{
  $layid=$_REQUEST['id'];
}
switch($_POST['nut'])
{
  case 'Cập Nhập':
  {
    $id = $_GET['id'];
    $hoten = $_POST['hoten'];
    $sodienthoai = $_POST['sodienthoai'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $ghichu = $_POST['ghichu'];
    
    if($id>0)
    {
      if($giohang->themxoasua("UPDATE donhang SET hoten = '$hoten', sodienthoai = '$sodienthoai',`diachi` = '$diachi',`email` = '$email',ghichu = '$ghichu' WHERE id = '$id'")==1)
      {
        echo "<script>window.location.href='dsdonhang.php';</script>";
      }
      else
      {
        echo 'Sửa không thành công';
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
                <div class="col-sm-6 chitiet_donhang">
                    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                      <table width="813" border="1" align="center">
                        <tr>
                        	<th style="font-size: 50px; text-align:center" width="100%" colspan="2">SỬA ĐƠN HÀNG </th>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Họ tên</strong></td>
                          <td width="488">
                          <input name="hoten" type="text" id="hoten" value="<?php echo $row['hoten']?>"/>
                         </td>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Số điện thoại</strong></td>
                          <td width="488">
                          <input name="sodienthoai" type="text" id="sodienthoai" value="<?php echo $row['sodienthoai']?>"/>
                         </td>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Địa chỉ</strong></td>
                          <td width="488">
                          <input name="diachi" type="text" id="diachi" value="<?php echo $row['diachi']?>"/>
                         </td>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Email</strong></td>
                          <td width="488">
                          <input name="email" type="text" id="email" value="<?php echo $row['email']?>"/>
                         </td>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Tổng tiền</strong></td>
                          <td width="488">
                          <?php echo number_format($row['tongtien'])."đ";?>
                         </td>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Ghi chú</strong></td>
                          <td width="488">
                          <input name="ghichu" type="text" id="ghichu" value="<?php echo $row['ghichu']?>"/>
                         </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <?php echo $row['donhang']?>
                          </td>
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