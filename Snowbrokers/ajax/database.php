<?php
$connect_string = 'localhost';
$connect_username = 'lab4';
$connect_password = 'x8DtAqrx3STdchyJ';
//$connect_db = 'canadiandrapery';
$connect_db = 'snowbrokers';

$link = mysql_connect($connect_string, $connect_username, $connect_password) or die(mysql_error());
mysql_select_db($connect_db, $link) or die(mysql_error());
?>
