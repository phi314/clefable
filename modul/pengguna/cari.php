<?php
include "../../inc/inc.koneksi.php";
$table	= 'users';
$id	= $_POST['id'];
$text	= "SELECT *
			FROM $table WHERE user_id= '$id'";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	
	$data['namalengkap']	= $r[namalengkap];
	$data['level']			= $r[level];
	
	echo json_encode($data);
}
}else{
	$data['namalengkap']	= '';
	$data['level']	= '';

	echo json_encode($data);
	
}
?>