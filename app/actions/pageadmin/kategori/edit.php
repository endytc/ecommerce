<?php
if($_POST){
    $is_success=_update('kategori', $_POST, 'idKategori='.$_GET['id']);
    if($is_success){
        $_SESSION['success']="Data kategori berhasil diperbarui";
    }else{
        $_SESSION['failed']="Data kategori gagal diperbarui";
    }
    redirect('pageadmin/kategori/index');
}
$kategori=  _select_unique_result("select * from kategori where idKategori=$_GET[id]");
?>
<?php require_once 'app/actions/pageadmin/kategori/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Edit Kategori</h1>
            <div class="entry">
    <form action="<?php echo app_base_url('pageadmin/kategori/edit?id='.$_GET['id']) ?>" method="POST">
                    <table class="myOtherTable formTable">
                        <tr>
                            <td class="title">Nama</td>
                            <td><input type="text" name="namaKategori" value="<?php echo $kategori['namaKategori']?>"/></td>
                        </tr>
                        <tr>
                            <td class="title">Deskripsi</td>
                            <td><input type="text" name="deskripsi" value="<?php echo $kategori['deskripsi']?>"/></td>
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