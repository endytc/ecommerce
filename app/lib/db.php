
<?php
$dbProfile=  require 'app/lib/db.profile.php';
mysql_connect($dbProfile['host'], $dbProfile['user'], $dbProfile['password']);
mysql_select_db($dbProfile['dbname']);
?>
