<?php
_update('pesanan',array('status'=>$_GET['status']),"idPesanan=$_GET[id_pesanan]");
$_SESSION['success']="Pesanan berhasil di ".ucfirst($_GET['status']);
redirect('pagemember/order');
?>