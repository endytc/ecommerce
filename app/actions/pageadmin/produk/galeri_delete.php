<?php
$galeri=  _select_unique_result("select * from galeri_produk where idGaleri=$_GET[idGaleri]");
$is_success= _query("delete from galeri_produk where idGaleri=$_GET[idGaleri]");
if($is_success){
    if($galeri['format']=='video'  && file_exists($g['file'])){
        unlink($galeri['file']);
    }
    $_SESSION['success']="Data galeri berhasil dihapus";
}else{
    $_SESSION['failed']="Data galeri gagal dihapus";
}
redirect('pageadmin/produk/galeri?id='.$_GET['id']);
?>
