<?php
if($_POST){
    $is_success=_update('produk', $_POST, 'idProduk='.$_GET['id']);
    if($is_success){
        $_SESSION['success']="Data produk berhasil diperbarui";
    }else{
        $_SESSION['failed']="Data produk gagal diperbarui";
    }
    redirect('pageadmin/produk/index');
}
$produk=  _select_unique_result("select * from produk where idProduk=$_GET[id]");
$kategoriList=  _select_arr("select * from kategori");
$supplierList=  _select_arr("select * from supplier");
?>
<?php require_once 'app/actions/pageadmin/produk/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Edit Produk</h1>
            <div class="entry">
    <form action="<?php echo app_base_url('pageadmin/produk/edit?id='.$_GET['id']) ?>" method="POST">
                    <table class="myOtherTable formTable">
                        <tr>
                            <td class="title">Nama</td>
                            <td><input type="text" name="namaProduk" value="<?php echo $produk['namaProduk']?>"/></td>
                        </tr>
                        <tr>
                            <td class="title">Harga</td>
                            <td><input type="text" name="harga" value="<?php echo $produk['harga']?>"/></td>
                        </tr>
                        <tr>
                            <td class="title">Discount</td>
                            <td><input type="text" name="discount" value="<?php echo $produk['discount']?>"/></td>
                        </tr>
                        <tr>
                            <td class="title">Warna</td>
                            <td><input type="text" name="warna" value="<?php echo $produk['warna']?>"/></td>
                        </tr>
                        <tr>
                            <td class="title">Size</td>
                            <td><input type="text" name="size" value="<?php echo $produk['size']?>"/></td>
                        </tr>
                        <tr>
                            <td class="title">Stok</td>
                            <td><input type="text" name="stok" value="<?php echo $produk['stok']?>"/></td>
                        </tr>
                        <tr>
                            <td class="title">Deskripsi</td>
                            <td>
                                <textarea name="deskripsi"><?php echo $produk['deskripsi']?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Kategori</td>
                            <td>
                                <select name="idKategori">
                                    <option value="">- Pilih Kategori -</option>
                                    <?php
                                    foreach ($kategoriList as $key => $kategori) {
                                        echo "<option value='$kategori[idKategori]' ".($kategori['idKategori']==$produk['idKategori']?'selected':'').">$kategori[namaKategori]</value>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Supplier</td>
                            <td>
                                <select name="idSupplier">
                                    <option value="">- Pilih Supplier -</option>
                                    <?php
                                    foreach ($supplierList as $key => $supplier) {
                                        echo "<option value='$supplier[idSupplier]' ".($supplier['idSupplier']==$produk['idSupplier']?'selected':'').">$supplier[namaSupplier]</value>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div class="buttonpane">
                        <span class="ButtonInput">
                            <span><input type="submit" class=""value="Simpan"/></span>
                        </span>
                        <a href="<?php echo app_base_url('produk/index') ?>" class="Button"><span>Batal</span></a>
                    </div>
                </form>
                </div>
        </div>
    </div>
</div>