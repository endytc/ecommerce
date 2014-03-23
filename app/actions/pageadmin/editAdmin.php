<?php
if($_POST){
    $is_success=_update('admin', $_POST, 'id='.$_GET['id']);
    if($is_success){
        $_SESSION['success']="Data admin berhasil diperbarui";
    }else{
        $_SESSION['failed']="Data admin gagal diperbarui";
    }
    redirect('pageadmin/ListAdmin');
}
$admin=  _select_unique_result("select * from admin where id=$_GET[id]");
?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Edit Admin</h1>
            <div class="entry">
    <form action="<?php echo app_base_url('pageadmin/editAdmin?id='.$_GET['id']) ?>" method="POST">
                    <table class="myOtherTable formTable">
                        <tr>
                            <td class="title">Username</td>
                            <td><input type="text" name="username" value="<?php echo $admin['username']?>"/></td>
                        </tr>
                        <tr>
                            <td class="title">password</td>
                            <td><input type="text" name="password" value="<?php echo $admin['password']?>"/></td>
                        </tr>
                    </table>
                    <div class="buttonpane">
                        <span class="ButtonInput">
                            <span><input type="submit" class=""value="Simpan"/></span>
                        </span>
                        <a href="<?php echo app_base_url('pageadmin/ListAdmin') ?>" class="Button"><span>Batal</span></a>
                    </div>
                </form>
                </div>
        </div>
    </div>
</div>