
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
$p = new tmdt();
$layid=$_REQUEST['id'];
if(isset($_REQUEST['idsua']))
{
	$layid=$_REQUEST['idsua'];
}
?>
<?php
	  switch($_POST['nut'])
	  {
		  case 'Cập Nhập':
		  {
			  $idsua = $_REQUEST['txtid'];
			  $tendanhmuc=$_REQUEST['txtdanhmuc'];
			  if($idsua > 0)
				{
				if($p->themxoasua("UPDATE danhmuc SET tendanhmuc = '$tendanhmuc' WHERE id = $idsua LIMIT 1")==1)
					{
						header("location:dsdm.php");
					}
					else
					{
						echo'Sửa danh mục không thành công';
					}
					
				}
				else
				{
					echo' Vui lòng chọn thông tin cần sửa';
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
                    <form id="form1" name="form1" method="post" action="">
                    <table width="846" border="0">
                        <tr>
                            <th style="font-size: 50px; text-align:center" width="100%">SỬA DANH MỤC</th>
                            <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" />
                        </tr>
                        <tr>
							<td height="56" align="center">
                            <input style="width: 60%; height: 50px" type="text" id="txtdanhmuc" name="txtdanhmuc" 
                            value="<?php echo $p->laycot("select tendanhmuc from danhmuc where id='$layid' limit 1"); ?>" />
                            </td>
                        </tr>
                        <tr>
                        	<td align="center" height="70">
                        		<button style="background-color: #4CAF50; color: white;" type="submit" name="nut" id="nut" value="Cập Nhập">Cập Nhập</button>
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