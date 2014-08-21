<?php
if($_POST){
    $is_success=_update('produk', $_POST, 'idProduk='.$_GET['id']);
    if($is_success){
        $_SESSION['success']="Data produk berhasil diperbarui";
    }else{
        $_SESSION['failed']="Data produk gagal diperbarui";
    }
    redirect('pagemember/produk/index');
}
$user=get_user_login();
$produk=  _select_unique_result("select * from produk where idProduk=$_GET[id]");
$kategoriList=  _select_arr("select * from kategori");
$pemasokList=  _select_arr("select * from pemasok where idMember=$user[id]");
$sub_kategoriList= _select_arr("select * from sub_kategori");
?>
<?php require_once 'app/actions/pagemember/produk/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Edit Produk</h1>
            <div class="entry">
    <form action="<?php echo app_base_url('pagemember/produk/edit?id='.$_GET['id']) ?>" method="POST">
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
                            <td class="title">Sub Kriteria</td>
                            <td>
                                <select name="idSubKategori">
                                    <option value="">- Pilih Sub Kriteria -</option>
                                    <?php
                                    foreach ($sub_kategoriList as $key => $sub_kategori) {
                                        echo "<option value='$sub_kategori[idSubKategori]' ".($sub_kategori['idSubKategori']==$produk['idSubKategori']?'selected':'').">$sub_kategori[idSubKategori]</value>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr id="luas_tanah">
                            <td class="title">Luas Tanah</td>
                            <td><input type="text" name="luas_tanah" value="<?php echo $produk['luas_tanah']?>"/> m2</td>
                        </tr>
                        <tr>
                            <td class="title">Pemasok</td>
                            <td>
                                <select name="idPemasok">
                                    <option value="">- Pilih Pemasok -</option>
                                    <?php
                                    foreach ($pemasokList as $key => $pemasok) {
                                        echo "<option value='$pemasok[idPemasok]' ".($pemasok['idPemasok']==$produk['idPemasok']?'selected':'').">$pemasok[namaPemasok]</value>";
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
<script type="text/javascript">
    function pilihKategori(){
        if($('select[name=idKategori]').val()=='4'){
            $('#luas_tanah').show();
        }else{
            $('#luas_tanah').hide();
            $('#luas_tanah').attr('value','');
        }
    }
    pilihKategori();
</script>