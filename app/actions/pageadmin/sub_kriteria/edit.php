<?php
if($_POST){
    $is_success=_update('sub_kriteria', $_POST, 'idSub_kriteria='.$_GET['id']);
    if($is_success){
        $_SESSION['success']="Data sub_kriteria berhasil diperbarui";
    }else{
        $_SESSION['failed']="Data sub_kriteria gagal diperbarui";
    }
    redirect('pageadmin/sub_kriteria/index');
}
$sub_kriteria=  _select_unique_result("select * from sub_kriteria where idSub_kriteria=$_GET[id]");
$kategoriList=  _select_arr("select * from kategori");
?>
<?php require_once 'app/actions/pageadmin/sub_kriteria/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Edit Sub Kriteria</h1>
            <div class="entry">
    <form action="<?php echo app_base_url('pageadmin/sub_kriteria/edit?id='.$_GET['id']) ?>" method="POST">
                    <table class="myOtherTable formTable">
                        <tr>
                            <td class="title">ID SubKriteria</td>
                            <td><input type="text" name="idSub_kriteria" value="<?php echo $sub_kriteria['idSub_kriteria']?>"/></td>
                        </tr>
                        <tr>
                            <td class="title">Nama SubKriteria</td>
                            <td><input type="text" name="namaSubKriteria" value="<?php echo $sub_kriteria['namaSubKriteria']?>"/></td>
                        </tr>
                        <tr>
                            <td class="title">Kategori</td>
                            <td>
                                <select name="idKategori">
                                    <option value="">- Pilih Kategori -</option>
                                    <?php
                                    foreach ($kategoriList as $key => $kategori) {
                                        echo "<option value='$kategori[idKategori]' ".($kategori['idKategori']==$sub_kriteria['idKategori']?'selected':'').">$kategori[namaKategori]</value>";
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
                        <a href="<?php echo app_base_url('sub_kriteria/index') ?>" class="Button"><span>Batal</span></a>
                    </div>
                </form>
                </div>
        </div>
    </div>
</div>