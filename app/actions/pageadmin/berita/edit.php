<?php
if ($_POST) {
    $is_success = _update('berita', $_POST, 'idBerita='. $_GET['id']);
    if ($is_success) {
        $_SESSION['success'] = "Data berita berhasil diperbarui";
    } else {
        $_SESSION['failed'] = "Data berita gagal diperbarui";
    }
    redirect('pageadmin/berita/index');
}
$berita = _select_unique_result("select * from berita where idBerita= $_GET[id]");
?>
<?php require_once 'app/actions/pageadmin/berita/left_menu.php'; ?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Edit Berita</h1>
            <div class="entry">
                <form action="<?php echo app_base_url('pageadmin/berita/edit?id=' . $_GET['id']) ?>" method="POST">
                    <table class="myOtherTable formTable">
                        <tr>
                            <td class="title">judul</td>
                            <td>
                            <input type="text" name="judul" cols="80" rows="1" value="<?php echo $berita['judul']?>"/></td>
                        </tr>
                        <tr>
                            <td class="title">Tema</td>
                            <td>
                                <input type="text" name="tema" cols="80" rows="5" value="<?php echo $berita['tema']?>">
                            </td>
                        </tr>
                       <tr>
                            <td class="title">Isi</td>
                            <td>
                                <input type="text" name="isi" cols="80" rows="40" value="<?php echo $berita['isi']?>">
                            </td>
                        </tr>
                <tr>
                    <td class="title">Gambar</td>
                    <td>&nbsp;=&nbsp;<input name="gambar" type="file" value="<?php echo $berita['gambar']?>"/></td>

                </tr>
                <tr>
                    <td class="title">Video</td>
                    <td>&nbsp;=&nbsp;<input name="video" type="file" value="<?php echo $berita['video']?>"/></td>

                </tr>
                    </table>
                    <div class="buttonpane">
                        <span class="ButtonInput">
                            <span><input type="submit" class=""value="simpan"/></span>
                        </span>
                        <a href="<?php echo app_base_url('berita/index') ?>" class="Button"><span>Batal</span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>