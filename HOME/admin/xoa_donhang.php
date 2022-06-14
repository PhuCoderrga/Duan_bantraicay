<?php
include("../class/config.php");
include("class/cls_giohang.php");
$giohang=new giohang();
$id=$_REQUEST['id'];
$giohang->themxoasua('delete from donhang where id="'.$id.'"');
header("Location: dsdonhang.php");
?>
</body>
</html>