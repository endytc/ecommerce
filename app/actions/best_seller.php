<?php
$where="1";
$page=array_value($_GET, 'pages',1)* getPerPage()-getPerPage();
$productList=_select_arr("select distinct produk.*,(select count(*) from pesanan where pesanan.idProduk=produk.idProduk) as cout_sell from produk
    left join kategori on produk.idKategori=kategori.idKategori
    left join sub_kriteria on (sub_kriteria.idKategori=produk.idSubKriteria or sub_kriteria.idKategori=kategori.idKategori)
    where $where
    order by cout_sell desc, waktu desc
limit $page,
    ".  getPerPage());
$pagination=  pagination("select distinct produk.*,(select count(*) from pesanan where pesanan.idProduk=produk.idProduk) as cout_sell from produk
    left join kategori on produk.idKategori=kategori.idKategori
    left join sub_kriteria on (sub_kriteria.idKategori=produk.idSubKriteria or sub_kriteria.idKategori=kategori.idKategori)
    ", getPerPage())
?>



<div id="page">
    <h1>Best Seller</h1>
    <!-- start content -->
    <?php include "app/actions/_tampilkan_produk.php";?>
    <?php echo $pagination?>
</div>


