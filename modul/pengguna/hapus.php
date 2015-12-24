<?php
include "../../inc/inc.koneksi.php";
$table	= 'users';
$id		= $_POST['id'];
$sql 	= mysql_query("SELECT * FROM $table WHERE user_id= '$id'");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM $table WHERE user_id= '$id'";
	mysql_query($input);
}
?>