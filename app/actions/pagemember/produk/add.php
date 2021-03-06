<?php
if($_POST){
    $_POST['idMember']=$_SESSION['id_user'];
    $is_success=  _insert('produk', $_POST);
    if($is_success){
        $_SESSION['success']="Data produk berhasil ditambahkan";
        $id=_select_max_id('produk',"idProduk");
        redirect('pagemember/produk/galeri?id='.$id);
    }else{
        $_SESSION['failed']="Data produk gagal ditambahkan";
        redirect('pagemember/produk/add');
    }

}
$user=get_user_login();
$kategoriList=  _select_arr("select * from kategori");
$pemasokList=  _select_arr("select * from pemasok where idMember=$user[id]");
$sub_kategoriList= _select_arr("select * from sub_kategori");
?>
<?php require_once 'app/actions/pagemember/produk/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Tambah Produk</h1>
            <div class="entry">
                <form action="<?php echo app_base_url('pagemember/produk/add') ?>" method="POST">
                    <table class="myOtherTable formTable">
                        <tr>
                            <td class="title">Nama</td>
                            <td><input type="text" name="namaProduk" value=""/></td>
                        </tr>
                        <tr>
                            <td class="title">Harga</td>
                            <td><input type="text" name="harga" value=""/></td>
                        </tr>
                        <tr>
                            <td class="title">Discount</td>
                            <td><input type="text" name="discount" value=""/></td>
                        </tr>
                        <tr>
                            <td class="title">Warna</td>
                            <td><input type="text" name="warna" value=""/></td>
                        </tr>
                        <tr>
                            <td class="title">Size</td>
                            <td><input type="text" name="size" value=""/></td>
                        </tr>
                        <tr>
                            <td class="title">Stok</td>
                            <td><input type="text" name="stok" value=""/></td>
                        </tr>
                        <tr>
                            <td class="title">Deskripsi</td>
                            <td>
                                <textarea name="deskripsi"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Kategori</td>
                            <td>
                                <select name="idKategori" onchange="pilihKategori()">
                                    <option value="">- Pilih Kategori -</option>
                                    <?php
                                    foreach ($kategoriList as $key => $kategori) {
                                        echo "<option value='$kategori[idKategori]'>$kategori[namaKategori]</value>";
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
                                        echo "<option value='$sub_kategori[idSubKategori]'>$sub_kategori[idSubKategori]</value>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr id="luas_tanah">
                            <td class="title">Luas Tanah</td>
                            <td><input type="text" name="luas_tanah" value=""/> m2</td>
                        </tr>
                        <tr>
                            <td class="title">Pemasok</td>
                            <td>
                                <select name="idPemasok">
                                    <option value="">- Pilih Pemasok -</option>
                                    <?php
                                    foreach ($pemasokList as $key => $pemasok) {
                                        echo "<option value='$pemasok[idPemasok]'>$pemasok[namaPemasok]</value>";
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