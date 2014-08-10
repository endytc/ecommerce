<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('ecommerce');

include_once ('pagnation.php');

$page =1;
if(isset($_GET['page'])&&!empty($_GET['page']))
    $page=(int)$_GET['page'];

$dataPerPage = 5;
if(isset($_GET['perPage'])&&!empty($_GET['perPage']))
    $page=(int)$_GET['perPage'];

$table='galeri_produk';

$dataTable =  getTableData($table, $page, $dataPerPage);

showPagination($table, $dataPerPage);
?>

