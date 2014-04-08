<?php
    $page=  array_value($_GET, 'pages',1)*  getPerPage()-  getPerPage();
    $produk=  _select_arr("select * from produk p
        left join pemasok s on p.idPemasok=s.idPemasok
        left join kategori k on p.idKategori=k.idKategori
        left join sub_kriteria w on p.idSubKriteria=w.idSubkriteria
        where p.idMember=$_SESSION[id_user]
        limit $page,".  getPerPage());
    $pagging= pagination("select * from produk", getPerPage());
?>
<?php require_once 'app/actions/pagemember/produk/left_menu.php';?>
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
            <th>Sub Kriteria</th>
            <th>Harga</th>
            <th>Discount</th>
            <th>Warna</th>
            <th>Size</th>
            <th>Stok</th>
            <th>Pemasok</th>
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
                <td><?php echo $data['namaSubKriteria']?></td>
                <td><?php echo $data['harga'] ?></td>
                <td><?php echo $data['discount'] ?></td>
                <td><?php echo $data['warna'] ?></td>
                <td><?php echo $data['size'] ?></td>
                <td><?php echo $data['stok'] ?></td>
                <td><?php echo $data['namaPemasok'] ?></td>
                <td class="button">
                    <a href="<?php echo app_base_url("pagemember/produk/galeri?id=$data[idProduk]") ?>" class="edit">galeri</a>
                    <a href="<?php echo app_base_url("pagemember/produk/edit?id=$data[idProduk]") ?>" class="edit">edit</a>
                    <a href="<?php echo app_base_url("pagemember/produk/delete?id=$data[idProduk]") ?>" onclick="return confirm('<?php echo "Apakah anda yakin akan menghapus produk $data[namaProduk]?" ?>')"class="hapus">hapus</a>
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
