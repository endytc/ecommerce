<?php
$member=get_user_login();
$where="1";
if($_GET['idProduk']!=null && $_GET['idProduk']!=''){
    $produk=_select_unique_result("select * from produk where idProduk='$_GET[idProduk]'");
    $isProduk=true;
    $where.=" and produk.idProduk='$_GET[idProduk]'";
}else{
    $isProduk=false;
}

$orderList=_select_arr("select * from pesanan
    join produk on produk.idProduk=pesanan.idProduk
    left join pelanggan on pesanan.idPelanggan=pelanggan.idPelanggan
        where $where and pesanan.idMember='$member[idMember]' and tanggalPesanan>='$_GET[start]' and
        tanggalPesanan<='$_GET[end]'");

?>
<html>
<head>
    <title>Laporan</title>
    <link rel="stylesheet" type="text/css" href="<?= app_base_url('/assets/css/base-report.css') ?>" media="all" />
</head>
<body style="text-align: center">
<h1>Laporan Transaksi Per Periode</h1>
<?php echo $isProduk?$produk['namaProduk']."<br>":""?>
<br>
<h2><?php echo datefmysql($_GET['start'])." s.d ".datefmysql($_GET['end'])?></h2>
<table class="table data-list" width="100%" style="border: 1px" border="1">
    <thead>
    <tr>
        <th style="width: 10%">No</th>
        <th>Tanggal</th>
        <th>Pemesan</th>
        <th>Status</th>
        <th>Produk</th>
        <th>Ukuran</th>
        <th>Harga</th>
        <th>Diskon</th>
        <th>Warna</th>
        <th>Jumlah<br>Beli</th>
        <th>Total</th>
    </tr>
    <?php
    $i=1;
    $jumlah=0;
    foreach($orderList as  $id=>$produk):
        $total=($produk['harga']-$produk['harga']*$produk['discount']/100)*$produk['jumlah'];
        $jumlah+=$total;
        ?>
        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $produk['tanggalPesanan']?></td>
            <td><?php echo $produk['namaPelanggan']?></td>
            <td><?php echo $produk['status'].' '?></td>
            <td><?php echo $produk['namaProduk'].' '?></td>
            <td><?php echo $produk['size']?></td>
            <td><?php echo $produk['harga']?></td>
            <td><?php echo $produk['discount']?></td>
            <td><?php echo $produk['warna']?></td>
            <td><?php echo $produk['jumlah']?></td>
            <td><?php echo $total?></td>
        </tr>
    <?php endforeach;?>
    </thead>
    <tfoot>
    <tr>
        <td colspan="10">Total</td>
        <td><?php echo $jumlah?></td>
    </tr>
    </tfoot>
</table>
</body>
</html>
<?php exit;?>