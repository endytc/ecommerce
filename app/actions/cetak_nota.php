<?php
$output='
    <html>
    <head>
        <title>Laporan</title>
        <link rel="stylesheet" type="text/css" href="'. app_base_url('/assets/css/base-report.css').'" media="all" />
        <style>
    .data-list {
        margin: 0.3em 0 0.5em;
        overflow: visible;
        padding: 1px;
    }
    .data-list caption {
        font-weight: bold;
        margin-left: .1em;
        text-align: left;
    }
    .data-list table {
        border: 1px solid #e4e4e4;
        border-collapse: collapse;
        width: 100%;
    }
    .data-list tbody th {
        vertical-align: top;
        width: 1em;
        text-transform:uppercase;
        font-size:9px;
    }
    .data-list td {
        padding: .2em .5em .15em;
        vertical-align: top;
    }

    .data-list thead th {
        font: bold "Trebuchet MS",Tahoma,sans-serif;
        background: #eee;
        color: #555;
        padding: .4em;
        white-space: nowrap;
        text-transform:uppercase;
    }
    .data-list .title {
        color:#003399;

    }
    hr{
    display: block;
-webkit-margin-before: 0.5em;
-webkit-margin-after: 0.5em;
-webkit-margin-start: auto;
-webkit-margin-end: auto;
border-style: inset;
border-width: 1px;
    }
</style>
    </head>
    <body style="text-align: center">
    <h1>
    Nota Pembelian
    <br>w2onlineshop.com
    </h1>
    <p>W2 Online Shop
    <br>Office center: Yogyakarta, Gowok, Blok B no 87
    <br>telp. 0274-987888 hp. 085726523455
    </p>
    <table class="table data-list" width="100%" style="border: 0px;width:500px" border="0" align="center">
        <thead>
        <tr><td colspan="4"><hr></td></tr>
        <tr>
            <td>Nama Barang</td>
            <td>Harga</td>
            <td>Qty</td>
            <td>Sub Total</td>
        </tr>
        <tr><td colspan="4"><hr></td></tr>
        ';
$jumlah=0;
$jumlahItem=0;
foreach($chartList as $key=>$p){
    foreach($p as  $id=>$produk):
        $jumlahItem+=$produk['jumlah'];
        $total=($produk['harga']-$produk['harga']*$produk['discount']/100)*$produk['jumlah'];
        $jumlah+=$total;
        $output.='
                <tr>
                    <td width="50%" style="text-align:left;width:200px;padding-right:20px">'."$produk[namaProduk]
                    </td>
                    <td style='padding-right:10px'>$produk[harga]<br>Disc. $produk[discount]</td>
                    <td style='padding-right:10px'>$produk[jumlah]</td>
                    <td style='padding-right:10px'>".$produk['jumlah']*ceil($produk['harga']-($produk['discount']/100*$produk['harga']))."</td>
                </tr>
                <tr><td colspan='4'><hr></td></tr>
                ";
    endforeach;
}
$output.="</thead>
        <tfoot>
        <tr>
            <td colspan='3' style=''>Total</td>
            <td>$jumlah</td>
        </tr>
        <tr>
            <td colspan='3' style=''>Jumlah Item</td>
            <td>$jumlahItem</td>
        </tr>
        </tfoot>
    </table>
    </body>
    </html>";

require_once "app/lib/html2pdf/html2pdf.class.php";
$html2pdf = new HTML2PDF('P', 'A4', 'en');
$html2pdf->writeHTML($output);
$html2pdf->Output($filename='upload/nota_pembelian_'.date('dmY-Hsi').'.pdf',"f");
//$html2pdf->Output($filename='upload/nota_pembelian_'.date('dmY-Hsi').'.pdf');exit;
?>
