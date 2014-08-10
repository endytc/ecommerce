<?php
$galeri= _select_arr("select * from galeri_produk where idProduk=$_GET[id]");
$is_success= _query("delete from produk where idProduk=$_GET[id]");

if($is_success){
    foreach($galeri as $g){
        if($g['format']=='video' && file_exists($g['file'])){
            unlink($g['file']);
        }
    }
    $_SESSION['success']="Data produk berhasil dihapus";
}else{
    $_SESSION['failed']="Data produk gagal dihapus";
}
redirect('pagemember/produk/index');
?>
