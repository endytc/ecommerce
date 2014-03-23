<?php
$is_success= _query("delete from berita where idBerita=$_GET[id]");

if($is_success){
    $_SESSION['success']="Data berita berhasil dihapus";
}else{
    $_SESSION['failed']="Data berita gagal dihapus";
}
redirect('pagemember/berita/index');
?>
