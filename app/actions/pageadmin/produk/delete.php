<?php

$is_success= _query("delete from produk where id=$_GET[id]");
if($is_success){
    $_SESSION['success']="Data produk berhasil dihapus";
}else{
    $_SESSION['failed']="Data produk gagal dihapus";
}
redirect('pageadmin/produk/index');
?>
