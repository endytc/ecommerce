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
//<link rel="stylesheet" type="text/css" href="'.app_base_url('/assets/css/base-report.css').'" media="all" />;
$output='<html>
<head>
    <title>Laporan</title>

</head>
<body style="text-align: center">
<h1>Laporan Transaksi Per Periode</h1>
'.($isProduk?$produk['namaProduk']."<br>":"").'
<br>
<h2>'.datefmysql($_GET['start'])." s.d ".datefmysql($_GET['end']).'</h2>
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
    </thead>
    <tbody>';

    $i=1;
    $jumlah=0;
    foreach($orderList as  $id=>$produk):
        $total=($produk['harga']-$produk['harga']*$produk['discount']/100)*$produk['jumlah'];
        $jumlah+=$total;
        $output.='
        <tr>
            <td>'.$i++.'</td>
            <td>'.$produk['tanggalPesanan'].'</td>
            <td>'.$produk['namaPelanggan'].'</td>
            <td>'.$produk['status'].' '.'</td>
            <td>'.$produk['namaProduk'].' '.'</td>
            <td>'.$produk['size'].'</td>
            <td>'.$produk['harga'].'</td>
            <td>'.$produk['discount'].'</td>
            <td>'.$produk['warna'].'</td>
            <td>'.$produk['jumlah'].'</td>
            <td>'.$total.'</td>
        </tr>';
    endforeach;
    $output.='
    <tr>
        <td colspan="10">Total</td>
        <td>'.$jumlah.'</td>
    </tr>
    </tbody>
</table>
</body>
</html>';
//$output='<html><body>haha</body></html>';
//echo $output;exit;
require_once "app/lib/html2pdf/html2pdf.class.php";
$html2pdf = new HTML2PDF('P', 'A4', 'en');
$html2pdf->writeHTML($output);
$html2pdf->Output($filename='upload/Laporan Transaksi Per Periode'.($isProduk?'_'.$produk['namaProduk']:'').' '.($_GET['start'])." s.d ".($_GET['end']).'.pdf',"f");
redirect($filename);