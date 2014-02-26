<?php
if($_POST){
    $is_success=  _insert('berita', $_POST);
    if($is_success){
        $_SESSION['success']="Data berita berhasil ditambahkan";
        $lastData=_select_unique_result("select * from berita order by idBerita desc limit 0,1");
    }else{
        $_SESSION['failed']="Data berita gagal ditambahkan";
    }
}
?>
<?php require_once 'app/actions/pageadmin/berita/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Tambah Berita</h1>
            <div class="entry">
                <form action="<?php echo app_base_url('pageadmin/berita/add') ?>" method="POST">
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
                                <textarea name="isi" cols="80" rows="40"></textarea>
                            </td>
                        </tr>
                <tr>
                    <td class="title">Gambar</td>
                    <td>&nbsp;=&nbsp;<input name="gambar" type="file" /></td>

                </tr>
                <tr>
                    <td class="title">Video</td>
                    <td>&nbsp;=&nbsp;<input name="video" type="file" /></td>

                </tr>
                    </table>
                    <div class="buttonpane">
                        <span class="ButtonInput">
                            <span><input type="submit" class=""value="Simpan"/></span>
                        </span>
                        <a href="<?php echo app_base_url('berita/index') ?>" class="Button"><span>Batal</span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
