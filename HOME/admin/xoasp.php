<?php
include("../class/config.php");
include("class/cls_product.php");
$p=new tmdt();
$id_product=$_REQUEST['id'];
$p->themxoasua('delete from sanpham where id="'.$id_product.'"');
header("Location: dssp.php");
?>
</body>
</html>