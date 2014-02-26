<?php
$where="1";
$kategoryName="";
if(isset($_GET['id_sub'])){
    $where.=" and produk.idSub_kriteria=$_GET[id_sub]";
    $kategory=_select_unique_result("select * from sub_kriteria where idSubKriteria='$_GET[id_sub]'");
    $kategoryName=$kategory['namaSubKriteria'];
}else if(isset($_GET['id'])){
    $where.=" and (produk.idKategori=$_GET[id] or produk.idKategori is null or produk.idKategori='0')";
    $kategory=_select_unique_result("select * from kategori where idKategori='$_GET[id]'");
    $kategoryName=$kategory['namaKategori'];
}
$productList=_select_arr("select distinct produk.* from produk
    left join kategori on produk.idKategori=kategori.idKategori
    left join sub_kriteria on (sub_kriteria.idKategori=produk.idSub_kriteria or sub_kriteria.idKategori=kategori.idKategori)
    where $where
    ");
$kategori=_select_unique_result("select * from kategori where idKategori='$_GET[id]'");
$SubKriteriaList=_select_arr("select * from sub_kriteria where idKategori='$_GET[id]'")
?>
<div id="sidebarFashion">
    <ul>
        <li>
            <h2>Categories</h2>
            <ul>
                <table class="myOtherTable">
                    <tr>
                        <th><?php echo $kategori['namaKategori'] ?></th>
                    </tr>
                    <tr>
                        <td>
                            <ul>
                                <li><a href="<?php echo "?id=$_GET[id]" ?>">All</a></li>
                                <?php foreach ($SubKriteriaList as $sub): ?>
                                    <li>
                                        <a href="<?php echo "?id=$_GET[id]&id_sub=$sub[idSubKriteria]" ?>"><?php echo $sub['namaSubKriteria'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                </table>

        </li>
    </ul>
</div>

<div id="page">
    <h1>Kategori <?php echo $kategoryName?></h1>
    <!-- start content -->
    <?php include "app/actions/_tampilkan_produk.php";?>
</div>