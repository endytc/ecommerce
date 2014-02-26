<div id="page">
    <h1>Chart</h1>
    <hr>
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
    <a href="<?php echo app_base_url('checkout')?>" class="uibutton confirm"> Checkout</a>
</div>