<?php
$where="1";

$productList=_select_arr("select distinct produk.*,(select count(*) from pesanan where pesanan.idProduk=produk.idProduk) as cout_sell from produk
    left join kategori on produk.idKategori=kategori.idKategori
    left join sub_kriteria on (sub_kriteria.idKategori=produk.idSub_kriteria or sub_kriteria.idKategori=kategori.idKategori)
    where $where
    order by  waktu desc
limit 20
    ");
?>


<div id="page">
    <h1>New Arrival</h1>
    <!-- start content -->
    <?php include "app/actions/_tampilkan_produk.php";?>
</div>