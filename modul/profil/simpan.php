<?php
include "../../inc/inc.koneksi.php";
$table		="profile";

$sql = mysql_query("SELECT *
				   FROM $table 
				   WHERE id= '$_POST[id]'");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input	= "UPDATE $table SET koperasi	='$_POST[koperasi]',
								alamat		='$_POST[alamat]',
								kota		='$_POST[kota]',
								hp		='$_POST[hp]',
								fax		='$_POST[fax]',
								email		='$_POST[email]'
					WHERE id= '$_POST[id]'";
	mysql_query($input);								
	echo "<b>Data Sukses diubah</b>";
}	
?>