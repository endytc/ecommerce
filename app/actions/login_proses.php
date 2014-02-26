<?php
if($_SESSION['login']=='admin'){
    $table='admin';
}else{
    $table='member';
}
$userResult=_select_unique_result("select * from $table where username='$_POST[username]' and password='".  ($_POST['password'])."'");

if(count($userResult)>0){
    if($table=='admin')
        $_SESSION['id_user']    =$userResult['id'];
    else
        $_SESSION['id_user']    =$userResult['idMember'];
    $_SESSION['status_user']    =$table;
    $user=  get_user_login();
    $_SESSION['success']    ='Selamat datang '.$userResult['username'];
//    echo "select * from $table where username='$_POST[username]' and password='".  ($_POST['password'])."'";exit;

    unset($_SESSION['login']);
}else{
    $_SESSION['failed']    ='Login gagal, user tidak ditemukan';
    redirect("page$table/index");
}
//show_array($userResult);exit;
    redirect("page$table/index");
?>
