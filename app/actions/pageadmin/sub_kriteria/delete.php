<?php
$is_success= _query("delete from sub_kriteria where idSub_kriteria=$_GET[id]");

if($is_success){
    $_SESSION['success']="Data Sub Kriteria berhasil dihapus";
}else{
    $_SESSION['failed']="Data Sub Kriteria gagal dihapus";
}
redirect('pageadmin/sub_kriteria/index');
?>
