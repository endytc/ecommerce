<?php
$where="1";
if(isset($_GET['key']) && $_GET['key']!=""){
	$where.=" and produk.namaProduk like '%$_GET[key]%'";
}
if(isset($_GET['key']) &&$_GET['harga_minimum']!=""){
	$where.=" and produk.harga>='$_GET[harga_minimum]'";
}
if(isset($_GET['key']) && $_GET['harga_maksimum']!=""){
	$where.=" and produk.harga<='$_GET[harga_maksimum]'";
}
if(isset($_GET['key']) && $_GET['luas_tanah_min']!=""){
	$where.=" and produk.luas_tanah>='$_GET[luas_tanah_min]'";
}
if(isset($_GET['key']) && $_GET['luas_tanah_max']!=""){
	$where.=" and produk.luas_tanah<='$_GET[luas_tanah_max]'";
}
if($where!='1'){
$productList=_select_arr("select distinct produk.* from produk
    left join kategori on produk.idKategori=kategori.idKategori
    left join sub_kategori on (sub_kategori.idKategori=produk.idSubKategori or sub_kategori.idKategori=kategori.idKategori)
    where $where
    ");
}else{
	$productList=array();
}
?>
<div id="page" <?php echo isset($_GET['type']) && $_GET['type']=='advance'?'style="padding-top: 126px;"':''?>>
	<?php if($where!='1'):?>
	    <h1>Hasil Pencarian <i><?php echo $_GET['key']?></i></h1>
	    <!-- start content -->
	    <?php include "app/actions/_tampilkan_produk.php";?>
	<?php else:?>
		<i class="fb5" style="display:block;">Isi form pencarian terlebih dahulu</i>
	<?php endif;?>
</div>
<?php  ?>