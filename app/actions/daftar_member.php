<?php
if($_POST){
    $is_success=  _insert('member', $_POST['member']);
    if($is_success){
        $_SESSION['success']="Selemat bergabung menjadi member kami, silakan login untuk menambahkan produk anda";
        $id=_select_max_id('member',"idMember");
        redirect('');
    }else{
        $_SESSION['failed']="Proses pendaftaran gagal dilakukan";
        redirect('daftar_member');
    }
}
?>
<div id="page">
    <h1>Daftar Member</h1>
    <hr>
    <form action="<?php echo app_base_url('daftar_member')?>" method="post" id="daftar-member">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="member[nama]" class="required" id="member-form"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="member[username]" class="required"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="member[password]" class="required" id="password"></td>
            </tr>
            <tr>
                <td>Konfirmasi Password</td>
                <td><input type="password"  name="konfirmasi" class="required"></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="member[telepon]" class="required"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="member[email]" class="email required"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right"><input type="submit" value="Daftar"></td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
       $('#daftar-member').validate({
           rules: {
               konfirmasi: {
                   equalTo: "#password"
               }
           }
       });
    });
</script>