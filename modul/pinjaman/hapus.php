<?php
include "../../inc/inc.koneksi.php";
$tableH	= 'pinjaman';
$tableD	= 'angsuran';
$id		= $_POST['id'];
$sql = mysql_query("SELECT * FROM $tableH WHERE id_pinjam= '$id'");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM $tableD WHERE id_pinjam= '$id'";
	mysql_query($input);
	$input = "DELETE FROM $tableH WHERE id_pinjam= '$id'";
	mysql_query($input);
}
?>