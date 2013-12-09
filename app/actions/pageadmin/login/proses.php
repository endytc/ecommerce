<?php
$userResult=_select_unique_result("select * from admin where username='$_POST[username]' and password='".  ($_POST['password'])."'");

if(count($userResult)>0){
    $_SESSION['id_user']    =$userResult['id'];
    $_SESSION['status_user']    ='admin';
    $user=  get_user_login();
    $_SESSION['success']    ='Selamat datang '.$userResult['username']; 
}else{
    $_SESSION['failed']    ='Login gagal, user tidak ditemukan'; 
}
//show_array($userResult);exit;
    redirect('pageadmin');
?>
