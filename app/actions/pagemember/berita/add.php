<?php
if ($_POST) {
    $_POST['idMember'] = $_SESSION['id_user'];
    $is_success = _insert('berita', $_POST);
    if ($is_success) {
        $_SESSION['success'] = "Data berita berhasil ditambahkan";
        $lastData = _select_unique_result("select * from berita order by idBerita desc limit 0,1");
    } else {
        $_SESSION['failed'] = "Data berita gagal ditambahkan";
    }
    redirect('pagemember/berita');
}
?>
<?php require_once 'app/actions/pagemember/berita/left_menu.php'; ?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Tambah Berita</h1>

            <div class="entry">
                <form action="<?php echo app_base_url('pagemember/berita/add') ?>" method="POST">
                    <table class="myOtherTable formTable">
                        <tr>
                            <td class="title">judul</td>
                            <td>
                                <textarea name="judul" cols="80" rows="1"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Tema</td>
                            <td>
                                <textarea name="tema" cols="80" rows="5"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Isi</td>
                            <td>
                                <textarea name="isi" cols="80" rows="40" class='tinymce'></textarea>
                            </td>
                        </tr>
                    </table>
                    <div class="buttonpane">
                        <span class="ButtonInput">
                            <span><input type="submit" class="" value="Simpan"/></span>
                        </span>
                        <a href="<?php echo app_base_url('berita/index') ?>" class="Button"><span>Batal</span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
