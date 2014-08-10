<?php
$user=get_user_login();
if($_POST){
    if($_POST['member']['password']==null || $_POST['member']['password']=='') unset($_POST['member']['password']);
    $is_success=  _update('member', $_POST['member'],"idMember='$user[idMember]'");
    if($is_success){
        $_SESSION['success']="Selemat bergabung menjadi member kami, silakan login untuk menambahkan produk anda";
        $id=_select_max_id('member',"idMember");
    }else{
        $_SESSION['failed']="Proses pendaftaran gagal dilakukan";
    }
    redirect('pagemember/edit_profile');
}

$member=_select_unique_result("select * from member where idMember='$user[idMember]'");

?>
<div id="page">
    <h1>My Profile</h1>
    <hr>
    <form action="<?php echo app_base_url('pagemember/edit_profile')?>" method="post" id="daftar-member">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="member[nama]" class="required" id="member-form" value="<?php echo $member['nama']?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="member[username]" class="required" value="<?php echo $member['username']?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="member[password]" class="" id="password"><br><i>*) Kosongkan jika tidak ingin diganti</i></td>
            </tr>
            <tr>
                <td>Konfirmasi Password</td>
                <td><input type="password"  name="konfirmasi" class=""></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="member[telepon]" class="required"  value="<?php echo $member['telepon']?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="member[email]" class="email required"  value="<?php echo $member['email']?>"></td>
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