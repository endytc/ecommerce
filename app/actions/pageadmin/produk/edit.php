<?php
if($_POST){
    $is_success=_update('produk', $_POST, 'id='.$_GET['id']);
    if($is_success){
        $_SESSION['success']="Data produk berhasil diperbarui";
    }else{
        $_SESSION['failed']="Data produk gagal diperbarui";
    }
    redirect('pageadmin/produk/index');
}
$produk=  _select_unique_result("select * from produk where id=$_GET[id]");
?>
<h2 class="title">Edit Kategori</h2>
<form action="<?php echo app_base_url('produk/edit?id='.$_GET['id'])?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>"/>
    <table class="data-form">
        <tr>
            <td class="title">Nama</td>
            <td><input type="text" name="nama" value="<?php echo $produk['nama']?>"/></td>
        </tr>
    </table>
    <div class="buttonpane">
    <span class="ButtonInput">
        <span><input type="submit" value="Simpan"/></span>
    </span>
        <a href="<?php echo app_base_url('produk/index')?>" class="Button"><span>Batal</span></a>
    </div>
</form>
<?php split_content()?>
<?php include_once 'app/actions/produk/index.php';?>