<?php
    $page=  array_value($_GET, 'pages',1)*  getPerPage()-  getPerPage();
    $kategori=  _select_arr("select * from kategori");
    $pagging= pagination("select * from kategori", getPerPage());
?>
<?php require_once 'app/actions/pageadmin/kategori/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Data Kategori</h1>
            <div class="entry">
    <table class="myOtherTable">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Kategori</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = $page + 1;
        foreach ($kategori as $data) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['idKategori'] ?></td>
                <td><?php echo $data['namaKategori'] ?></td>
                <td><?php echo $data['deskripsi'] ?></td>
                <td class="button">
                    <a href="<?php echo app_base_url("pageadmin/kategori/edit?id=$data[idKategori]") ?>" class="edit">edit</a>
                    <a href="<?php echo app_base_url("pageadmin/kategori/delete?id=$data[idKategori]") ?>" onclick="return confirm('<?php echo "Apakah anda yakin akan menghapus kategori $data[nama]?" ?>')"class="hapus">hapus</a>
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
