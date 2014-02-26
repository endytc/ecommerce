<?php
    $page=  array_value($_GET, 'pages',1)*  getPerPage()-  getPerPage();
    $kategori=  _select_arr("select * from sub_kriteria s
        join kategori k on s.idKategori=k.idKategori
        limit $page,".  getPerPage());
    $pagging= pagination("select * from sub_kriteria", getPerPage());
?>
<?php require_once 'app/actions/pageadmin/sub_kriteria/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Data Sub Kriteria</h1>
            <div class="entry">
    <table class="myOtherTable">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Sub Kriteria</th>
            <th>Nama Sub Kriteria</th>
            <th>Kategori</th>
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
                <td><?php echo $data['idSubKriteria'] ?></td>
                <td><?php echo $data['namaKategori'] ?></td>
                <td><?php echo $data['namaSubKriteria'] ?></td>
                <td class="button">
                    <a href="<?php echo app_base_url("pageadmin/sub_kriteria/edit?id=$data[idSubKriteria]") ?>" class="edit">edit</a>
                    <a href="<?php echo app_base_url("pageadmin/sub_kriteria/delete?id=$data[idSubKriteria]") ?>" onclick="return confirm('<?php echo "Apakah anda yakin akan menghapus kategori $data[nama]?" ?>')"class="hapus">hapus</a>
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
