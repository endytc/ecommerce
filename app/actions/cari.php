<?php
$productList=_select_arr("select distinct produk.* from produk
    left join kategori on produk.idKategori=kategori.idKategori
    left join sub_kriteria on (sub_kriteria.idKategori=produk.idSub_kriteria or sub_kriteria.idKategori=kategori.idKategori)
    where produk.namaProduk like '%$_GET[key]%'
    ");
?>
<div id="page">
    <h1>Hasil Pencarian <i><?php echo $_GET['key']?></i></h1>
    <!-- start content -->
    <?php include "app/actions/_tampilkan_produk.php";?>
</div>