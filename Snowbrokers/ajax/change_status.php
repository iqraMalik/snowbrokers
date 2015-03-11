<?php
include('database.php');

$id=$_REQUEST['id'];
$table=$_REQUEST['tableName'];
$status=$_REQUEST['status'];

mysql_query("UPDATE ".$table." SET `status`='".$status."' WHERE `id` = '".$id."'");

$sql="select status from ".$table." where `id` = '".$id."'";

$res=mysql_query($sql);
$check=mysql_num_rows($res);
$arr = mysql_fetch_array($res);

echo $arr['status'];

?>
