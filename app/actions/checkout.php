<?php
if($_POST){
    $is_success=  _insert('pelanggan', $_POST);
    $idPelanggan=_select_max_id('pelanggan','idPelanggan');
    $chartList=array();
    foreach($_SESSION['chart'] as $id=>$chart){
        $produk=_select_unique_result("select produk.*,if(kategori.namaKategori is not null,namaKategori,namaSubKriteria) as kategori from produk
                left join kategori on produk.idKategori=kategori.idKategori
                left join sub_kriteria on (sub_kriteria.idKategori=produk.idSub_kriteria or sub_kriteria.idKategori=kategori.idKategori)
                where idProduk='$id'");
        $produk['jumlah']=$chart;
        $chartList[$produk['idMember']][]=$produk;
    }

    foreach($chartList as $idMember=>$chartByMember){
        foreach($chartByMember as $chart){
            mysql_query("insert into pesanan (`tanggalPesanan`, `jumlah`, `tanggalBayar`, `tanggalKirim`,
                `idProduk`, `idMember`,idPelanggan) values
                (now(),$chart[jumlah],NULL,NULL,$chart[idProduk],$idMember,$$idPelanggan)") or die (mysql_error());
            mysql_query("update produk set stok=stok-$chart[jumlah] where idProduk='$chart[idProduk]'") or die(mysql_error());
        }
    }
    unset($_SESSION['chart']);
    if($is_success){
        $_SESSION['success']="Pembelian berhasil dilakukan, penjual akan segera menghubungi anda";
        $id=_select_max_id('produk',"idProduk");
        redirect('index');
    }else{
        $_SESSION['failed']="Pembelian gagal dilakukan";
    }

}
?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Data Pembeli</h1>
            <div class="entry">
                <form action="<?php echo app_base_url('checkout') ?>" method="POST">
                    <table class="myOtherTable formTable">
                        <tr>
                            <td class="title">Nama</td>
                            <td><input type="text" name="namaPelanggan" value=""/></td>
                        </tr>
                        <tr>
                            <td class="title">Alamat</td>
                            <td><input type="text" name="alamat" value=""/></td>
                        </tr>
                        <tr>
                            <td class="title">Email</td>
                            <td><input type="text" name="email" value=""/></td>
                        </tr>
                        <tr>
                            <td class="title">Telepon</td>
                            <td><input type="text" name="telepon" value=""/></td>
                        </tr>
                    </table>
                    <div class="buttonpane">
                        <span class="ButtonInput">
                            <span><input type="submit" class=""value="Beli"/></span>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="myOtherTable">
        <thead>
        <tr>
            <th style="width: 10%">No</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Discount</th>
            <th>Warna</th>
            <th>Ukuran</th>
            <th>Jumlah<br>Beli</th>
            <th>Total</th>
        </tr>
        <?php
        $i=1;
        $jumlah=0;

        foreach($_SESSION['chart'] as  $id=>$cart):
            $produk=_select_unique_result("select produk.*,if(kategori.namaKategori is not null,namaKategori,namaSubKriteria) as kategori from produk
                left join kategori on produk.idKategori=kategori.idKategori
                left join sub_kriteria on (sub_kriteria.idKategori=produk.idSub_kriteria or sub_kriteria.idKategori=kategori.idKategori)
                where idProduk='$id'");
            $jumlah+=$cart*ceil($produk['harga']-($produk['discount']/100*$produk['harga']));
            ?>
            <tr>
                <td><?php echo $i++?></td>
                <td><?php echo $produk['namaProduk']?></td>
                <td><?php echo $produk['harga']?></td>
                <td><?php echo $produk['discount']?></td>
                <td><?php echo $produk['warna']?></td>
                <td><?php echo $produk['size']?></td>
                <td><?php echo $cart?></td>
                <td><?php echo $cart*ceil($produk['harga']-($produk['discount']/100*$produk['harga']))?></td>
            </tr>
        <?php endforeach;?>
        </thead>
        <tfoot>
        <tr>
            <td colspan="7">Total</td>
            <td><?php echo $jumlah?></td>
        </tr>
        </tfoot>
    </table>
</div>
