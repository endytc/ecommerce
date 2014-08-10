<?php
if($_POST){
    $is_success=  _insert('kategori', $_POST);
    if($is_success){
        $_SESSION['success']="Data kategori berhasil ditambahkan";
        $lastData=_select_unique_result("select * from kategori order by idKategori desc limit 0,1");
    }else{
        $_SESSION['failed']="Data kategori gagal ditambahkan";
    }

}
?>
<?php require_once 'app/actions/pageadmin/kategori/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Tambah Kategori</h1>
            <div class="entry">
                <form action="<?php echo app_base_url('pageadmin/kategori/add') ?>" method="POST">
                    <table class="myOtherTable formTable">
                        <tr>
                            <td class="title">Nama</td>
                            <td><input type="text" name="namaKategori" value=""/></td>
                        </tr>
                        <tr>
                            <td class="title">Deskripsi</td>
                            <td>
                                <textarea name="deskripsi"></textarea>
                            </td>
                        </tr>

                    </table>
                    <div class="buttonpane">
                        <span class="ButtonInput">
                            <span><input type="submit" class=""value="Simpan"/></span>
                        </span>
                        <a href="<?php echo app_base_url('kategori/index') ?>" class="Button"><span>Batal</span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
