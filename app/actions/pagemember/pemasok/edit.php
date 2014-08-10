<?php
if($_POST){
    $is_success=_update('pemasok', $_POST, 'idPemasok='.$_GET['id']);
    if($is_success){
        $_SESSION['success']="Data pemasok berhasil diperbarui";
    }else{
        $_SESSION['failed']="Data pemasok gagal diperbarui";
    }
    redirect('pagemember/pemasok/index');
}
$supplier=  _select_unique_result("select * from pemasok where idPemasok=$_GET[id]");
?>
<?php require_once 'app/actions/pagemember/pemasok/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Edit Supplier</h1>
            <div class="entry">
    <form action="<?php echo app_base_url('pagemember/pemasok/edit?id='.$_GET['id']) ?>" method="POST" id="editForm">
                    <table class="myOtherTable formTable">
                        <tr>
                            <td class="title">Nama</td>
                            <td><input type="text" name="namaPemasok" value="<?php echo $supplier['namaPemasok']?>"  class="required"/></td>
                        </tr>
                        <tr>
                            <td class="title">Alamat</td>
                            <td><input type="text" name="alamat" value="<?php echo $supplier['alamat']?>"  class="required"/></td>
                        </tr>
                        <tr>
                            <td class="title">Telepon</td>
                            <td><input type="text" name="telepon" value="<?php echo $supplier['telepon']?>" class="required"/></td>
                        </tr>
                        <tr>
                            <td class="title">Email</td>
                            <td><input type="text" name="email" value="<?php echo $supplier['email']?>" class="required email"/></td>
                        </tr>
                        <tr>
                            <td class="title">Fax</td>
                            <td><input type="text" name="fax" value="<?php echo $supplier['fax']?>"/></td>
                        </tr>
                    </table>
                    <div class="buttonpane">
                        <span class="ButtonInput">
                            <span><input type="submit" class=""value="Simpan"/></span>
                        </span>
                        <a href="<?php echo app_base_url('pemasok/index') ?>" class="Button"><span>Batal</span></a>
                    </div>
                </form>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#editForm').validate();  
});
</script>