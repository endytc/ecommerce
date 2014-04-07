<?php
    $page=  array_value($_GET, 'pages',1)*  getPerPage()-  getPerPage();
    $berita=  _select_arr("select * from berita where idMember=$_SESSION[id_user]");
    $pagging= pagination("select * from berita", getPerPage());
?>
<?php require_once 'app/actions/pagemember/berita/left_menu.php';?>
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
                <td class="button">
                    <a href="<?php echo app_base_url("pagemember/berita/edit?id=$data[idBerita]") ?>" class="edit">edit</a>
                    <a href="<?php echo app_base_url("pagemember/berita/delete?id=$data[idBerita]") ?>" onclick="return confirm('<?php echo "Apakah anda yakin akan menghapus kategori?" ?>')"class="hapus">hapus</a>
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
