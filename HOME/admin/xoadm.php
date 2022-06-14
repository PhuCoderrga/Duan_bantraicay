<?php
include("../class/config.php");
include("class/cls_product.php");
$p=new tmdt();
$id_danhmuc=$_REQUEST['id'];
$p->themxoasua('delete from danhmuc where id="'.$id_danhmuc.'"');
header("Location: dsdm.php");
?>
</body>
</html>