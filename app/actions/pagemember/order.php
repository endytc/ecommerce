<?php
$member=get_user_login();
$where="1";
if(isset($_GET['status']) && $_GET['status']!=''){
    $where.=" and status='$_GET[status]'";
}
$orderList=_select_arr("select * from pesanan
    join produk on produk.idProduk=pesanan.idProduk
    left join pelanggan on pesanan.idPembeli=pelanggan.idPelanggan
        where $where and pesanan.idMember='$member[idMember]'");

?>
<div id="sidebarFashion">
    <ul>
        <li>
            <table class="myOtherTable">
                <tr>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>
                        <li><a href="<? echo app_base_url('pagemember/order')?>">All</a> </li>
                        <li><a href="<? echo app_base_url('pagemember/order?status=pending')?>">Pending</a> </li>
                        <li><a href="<? echo app_base_url('pagemember/order?status=approve')?>">Approved</a> </li>
                        <li><a href="<? echo app_base_url('pagemember/order?status=ignore')?>">Ignored</a> </li>
                    </td>
                </tr>
            </table>
        </li>
    </ul>
</div>
<div id="page">
    <h1>History Order</h1>
    <hr>
    <table class="myOtherTable">
        <thead>
        <tr>
            <th style="width: 10%">No</th>
            <th>Pemesan</th>
            <th>Status</th>
            <th>Produk</th>
            <th>Ukuran</th>
            <th>Harga</th>
            <th>Diskon</th>
            <th>Warna</th>
            <th>Jumlah<br>Beli</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i=1;
        $jumlah=0;
        foreach($orderList as  $id=>$produk):
            ?>
            <tr>
                <td><?php echo $i++?></td>
                <td><?php echo $produk['namaPelanggan']?></td>
                <td><?php echo $produk['status'].' '?></td>
                <td><?php echo $produk['namaProduk'].' '?></td>
                <td><?php echo $produk['size']?></td>
                <td><?php echo $produk['harga']?></td>
                <td><?php echo $produk['discount']?></td>
                <td><?php echo $produk['warna']?></td>
                <td><?php echo $produk['jumlah']?></td>
                <td><?php echo $produk['harga']-$produk['harga']*$produk['discount']/100?></td>
                <td>
                    <?php if($produk['status']=='pending'):?>
                    <a href="<? echo app_base_url('pagemember/statusOrder?status=approve&id_pesanan='.$produk['idPesanan'])?>">Vefivikasi</a>
                    <a href="<? echo app_base_url('pagemember/statusOrder?status=ignore&id_pesanan='.$produk['idPesanan'])?>">Abaikan</a>
                    <?php endif;?>
                    &nbsp;
                </td>
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