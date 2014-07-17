<?php
    $page=  array_value($_GET, 'pages',1)*  getPerPage()-  getPerPage();
    $pemasok=  _select_arr("select * from pemasok limit $page,
    ".  getPerPage());
    $pagging= pagination("select * from pemasok", getPerPage());
?>
<?php require_once 'app/actions/pageadmin/pemasok/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Data Pemasok</h1>
            <div class="entry">
    <table class="myOtherTable">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Pemasok</th>
            <th>Nama Pemasok</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Fax</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = $page + 1;
        foreach ($pemasok as $data) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['idPemasok'] ?></td>
                <td><?php echo $data['namaPemasok'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td><?php echo $data['telepon'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['fax'] ?></td>
                <td class="button">
                    <a href="<?php echo app_base_url("pageadmin/pemasok/edit?id=$data[idPemasok]") ?>" class="edit">edit</a>
                    <a href="<?php echo app_base_url("pageadmin/pemasok/delete?id=$data[idPemasok]") ?>" onclick="return confirm('<?php echo "Apakah anda yakin akan menghapus kategori $data[nama]?" ?>')"class="hapus">hapus</a>
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
