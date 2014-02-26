<?php
$is_success= _query("delete from pemasok where idPemasok=$_GET[id]");

if($is_success){
    $_SESSION['success']="Data pemasok berhasil dihapus";
}else{
    $_SESSION['failed']="Data pemasok gagal dihapus";
}
redirect('pageadmin/pemasok/index');
?>
