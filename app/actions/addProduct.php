<?php
$_SESSION['chart'][$_GET['id']]=$_GET['jumlah'];
redirect('chart');