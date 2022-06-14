<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
table tr:hover{
	background-color:#FF6;
}
</style>
</head>

<body>
<?php
	require('header.php');
?>
<?php
include("class/cls_product.php");
$p=new tmdt();

switch($_POST['nut'])
{
	case 'Xóa':
	{
		  $idxoa=$_REQUEST['id'];
		  if($idxoa>0)
		  {
			  if($p->themxoasua("delete from danhmuc where id=$idxoa limit 1 ")==1)
			  {
				  header('location:dsdm.php');
			  }
			  else
			  {
				  echo'Xóa không thành công';
			  }
		  }
		  else
		  {
		  	echo 'Vui lòng chọn danh mục cần xóa';
		  }
		  break;
	}
	
	case 'Thêm Danh Mục':
	{
		header('location:themdm.php');
		break;
	}
	
}
?>
<div class="content-wrapper" style="min-height: 1203.6px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="main-content" style="padding-left: 200px;">
                       <?php
                       $p->loadds_danhmuc("select * from danhmuc order by id desc");
                        ?>
                      <div style="margin-top:20px;">
                        <a href="themdm.php" style=" text-align: center; font-weight: bold; font-size: 25px; color:white;    background-color: #4CAF50;padding: 10px 20px;
    color: white;
                        border: 2px black solid; ">THÊM DANH MỤC</a>
                       </div>   
                    </div>
            	 </div>
        	</div>
       </div>
     </section>
</div>
<?php
	require('footer.php');
	
?>

</body>
</html>