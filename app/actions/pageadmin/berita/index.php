<?php
    $page=  array_value($_GET, 'pages',1)*  getPerPage()-  getPerPage();
    $berita=  _select_arr("select * from berita");
    $pagging= pagination("select * from berita", getPerPage());
?>
<?php require_once 'app/actions/pageadmin/berita/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Data Berita</h1>
            <div class="entry">
    <table class="myOtherTable">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Berita</th>
            <th>Judul</th>
            <th>Tema</th>
            <th>Isi</th>
            <th>Gambar</th>
            <th>Video</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = $page + 1;
        foreach ($berita as $data) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['idBerita'] ?></td>
                <td><?php echo $data['judul'] ?></td>
                <td><?php echo $data['tema'] ?></td>
                <td><?php echo $data['isi'] ?></td>
                <td><?php echo $data['gambar'] ?></td>
                <td><?php echo $data['video'] ?></td>
                <td class="button">
                    <a href="<?php echo app_base_url("pageadmin/berita/edit?id=$data[idBerita]") ?>" class="edit">edit</a>
                    <a href="<?php echo app_base_url("pageadmin/berita/delete?id=$data[idBerita]") ?>" onclick="return confirm('<?php echo "Apakah anda yakin akan menghapus kategori $data[nama]?" ?>')"class="hapus">hapus</a>
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
