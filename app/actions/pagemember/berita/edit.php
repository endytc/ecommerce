<?php
if ($_POST) {
    $is_success = _update('berita', $_POST, 'idBerita='. $_GET['id']);
    if ($is_success) {
        $_SESSION['success'] = "Data berita berhasil diperbarui";
    } else {
        $_SESSION['failed'] = "Data berita gagal diperbarui";
    }
    redirect('pagemember/berita/index');
}
$berita = _select_unique_result("select * from berita where idBerita= $_GET[id]");
?>
<?php require_once 'app/actions/pagemember/berita/left_menu.php'; ?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Edit Berita</h1>
            <div class="entry">
                <form action="<?php echo app_base_url('pagemember/berita/edit?id=' . $_GET['id']) ?>" method="POST">
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
                                <textarea type="text" name="isi" cols="80"
                                       class='tinymce' rows="40" ><?php echo $berita['isi']?></textarea>
                            </td>
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