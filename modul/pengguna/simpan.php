<?php
include "../../inc/inc.koneksi.php";
$table		="users";
$userid		=$_POST[userid];
$nama	=$_POST[nama];
$pwd	=md5($_POST[pwd]);
$level	=$_POST[level];

$sql = mysql_query("SELECT *
				   FROM $table 
				   WHERE user_id= '$userid'");
$row	= mysql_num_rows($sql);
if ($row>0){
	if(!empty($pwd)){
	$input	= "UPDATE $table SET namalengkap='$nama',password='$pwd',level='$level'
					WHERE user_id= '$userid'";
	mysql_query($input);
	}else{
	$input	= "UPDATE $table SET namalengkap	='$nama',level='$level'
					WHERE user_id= '$userid'";
	mysql_query($input);
	}
	echo "<b>Data Sukses diubah</b>";
}else{
	$input = "INSERT INTO $table (user_id,namalengkap,password,level)
				VALUES('$userid','$nama','$pwd','$level')";
	mysql_query($input);
	echo "<b>Data sukses disimpan</b>";
}	
echo $input;
?>