<?php
    $page=  array_value($_GET, 'pages',1)*  getPerPage()-  getPerPage();
    $produk=  _select_arr("select * from order o
        join produk p on o.idProduk=p.idProduk
        join pelanggan k on o.idPelanggan=k.idPelanggan
        limit $page,".  getPerPage());
    $pagging= pagination("select * from order", getPerPage());
?>
<?php require_once 'app/actions/pageadmin/order/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Data Orderan</h1>
            <div class="entry">
    <table class="myOtherTable">
    <thead>
        <tr>
            <th>No</th>
            <th>No Order</th>
            <th>Pelanggan</th>
            <th>Produk </th>
            <th>Jumlah Order</th>
            <th>Tanggal Order</th>
            <th>Tanggal Bayar </th>
            <th>Tanggal Kirim</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $i = $page + 1;
        foreach ($order as $data) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['noOrder'] ?></td>
                <td><?php echo $data['namaPelanggan'] ?></td>
                <td><?php echo $data['namaProduk'] ?></td>
                <td><?php echo $data['jumlahOrder'] ?></td>
                <td><?php echo $data['tanggalOrder'] ?></td>
                <td><?php echo $data['tanggalBayar'] ?></td>
                <td><?php echo $data['tanggalKirim'] ?></td>
                <td class="button">
                    <a href="<?php echo app_base_url("pageadmin/order/edit?id=$data[noOrder]") ?>" class="edit">edit</a>
                    <a href="<?php echo app_base_url("pageadmin/order/delete?id=$data[noOrder]") ?>" onclick="return confirm('<?php echo "Apakah anda yakin akan menghapus kategori $data[nama]?" ?>')"class="hapus">hapus</a>
                </td>
            </tr>
        </tbody>
        <?php
    }
    ?>
                </table>
                <?php echo $pagging ?>
            </div>
        </div>
    </div>
</div>
