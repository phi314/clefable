<?php
session_start();
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
$table		="kas";
$tanggal		=jin_date_sql($_POST['tanggal']);
$aktiva			=$_POST['aktiva'];
$pasiva			=$_POST['pasiva'];
$jumlah		=$_POST['jumlah'];
$userid		= $_SESSION['namauser'];
$input = "INSERT INTO $table (id_user, tanggal, aktiva, pasiva, jumlah)
			VALUES('$userid', '$tanggal', '$aktiva', '$pasiva', '$jumlah')";
mysql_query($input);

mysql_query("UPDATE profile SET saldo=saldo+$jumlah ");
echo "<b>Data sukses disimpan</b>";
?>