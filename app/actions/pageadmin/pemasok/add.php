<?php
if($_POST){
    $is_success=  _insert('pemasok', $_POST);
    if($is_success){
        $_SESSION['success']="Data pemasok berhasil ditambahkan";
    }else{
        $_SESSION['failed']="Data pemasok gagal ditambahkan";
    }

}
?>
<?php require_once 'app/actions/pageadmin/pemasok/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Tambah Pemasok</h1>
            <div class="entry">
                <form action="<?php echo app_base_url('pageadmin/pemasok/add') ?>" method="POST" id="addForm">
                    <table class="myOtherTable formTable">
                        <tr>
                            <td class="title">Nama</td>
                            <td><input type="text" name="namaPemasok" value="" class="required" /></td>
                        </tr>
                        <tr>
                            <td class="title">Alamat</td>
                            <td><input type="text" name="alamat" value="" class="required"/></td>
                        </tr>
                        <tr>
                            <td class="title">Telepon</td>
                            <td><input type="text" name="telepon" value=""class="required"/></td>
                        </tr>
                        <tr>
                            <td class="title">email</td>
                            <td><input type="text" name="email" value="" class="required email"/></td>
                        </tr>
                        <tr>
                            <td class="title">fax</td>
                            <td><input type="text" name="fax" value=""/></td>
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
    $('#addForm').validate();  
});
</script>