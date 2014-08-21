<?php
$where="stok>0";
$page=array_value($_GET, 'pages',1)* getPerPage()-getPerPage();
$productList=_select_arr("select distinct produk.*,(select count(*) from pesanan where pesanan.idProduk=produk.idProduk) as cout_sell from produk
    left join kategori on produk.idKategori=kategori.idKategori
    left join sub_kategori on (sub_kategori.idKategori=produk.idSubKategori or sub_kategori.idKategori=kategori.idKategori)
    where $where
    order by  waktu desc
limit $page,
    ".  getPerPage()
    );
$pagination=  pagination("select distinct produk.*,(select count(*) from pesanan where pesanan.idProduk=produk.idProduk) as cout_sell from produk
    left join kategori on produk.idKategori=kategori.idKategori
    left join sub_kategori on (sub_kategori.idKategori=produk.idSubKategori or sub_kategori.idKategori=kategori.idKategori)
    where $where",getPerPage());

?>


<div id="page">
    <h1>New Arrival</h1>
    <!-- start content -->
    <?php include "app/actions/_tampilkan_produk.php";?>
    <?php echo $pagination?>
</div>