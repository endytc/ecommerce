<?php
$is_success= _query("delete from order where noOrder=$_GET[id]");

if($is_success){
    $_SESSION['success']="Data order berhasil dihapus";
}else{
    $_SESSION['failed']="Data order gagal dihapus";
}
redirect('pageadmin/order/index');
?>
