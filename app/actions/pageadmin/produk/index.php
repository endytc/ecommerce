<?php
    $page=  array_value($_GET, 'pages',1)*  getPerPage()-  getPerPage();
    $produk=  _select_arr("select * from produk p
        join supplier s on p.idSupplier=s.idSupplier
        join kategori k on p.idKategori=k.idKategori
        limit $page,".  getPerPage());
    $pagging= pagination("select * from produk", getPerPage());
?>
<?php require_once 'app/actions/pageadmin/produk/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Data Produk</h1>
            <div class="entry">
    <table class="myOtherTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Discount</th>
            <th>Warna</th>
            <th>Size</th>
            <th>Stok</th>
            <th>Supplier</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = $page + 1;
        foreach ($produk as $data) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['namaProduk'] ?></td>
                <td><?php echo $data['namaKategori'] ?></td>
                <td><?php echo $data['harga'] ?></td>
                <td><?php echo $data['discount'] ?></td>
                <td><?php echo $data['warna'] ?></td>
                <td><?php echo $data['size'] ?></td>
                <td><?php echo $data['stok'] ?></td>
                <td><?php echo $data['namaSupplier'] ?></td>
                <td class="button">
                    <a href="<?php echo app_base_url("pageadmin/produk/galeri?id=$data[idProduk]") ?>" class="edit">galeri</a>
                    <a href="<?php echo app_base_url("pageadmin/produk/edit?id=$data[idProduk]") ?>" class="edit">edit</a>
                    <a href="<?php echo app_base_url("pageadmin/produk/delete?id=$data[idProduk]") ?>" onclick="return confirm('<?php echo "Apakah anda yakin akan menghapus produk $data[nama]?" ?>')"class="hapus">hapus</a>
                </td>
            </tr>    
        </tbody>
        <?php
    }
    ?>
                </table>
                <?php echo $pagging ?>
            </div>
            <p class="meta"><a href="#" class="more">Read More</a> &nbsp;&nbsp;&nbsp; <a href="#" class="comments">Comments (33)</a></p>
        </div>
    </div>
</div>
