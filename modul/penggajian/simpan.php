<?php
session_start();
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
$table		="penggajian";
$tanggal		=jin_date_sql($_POST['tanggal']);
$jumlah		=$_POST['jumlah'];
$userid		= $_SESSION['namauser'];
$input = "INSERT INTO $table (id_user, tanggal, jumlah)
			VALUES('$userid', '$tanggal', '$jumlah')";
mysql_query($input);

echo "<b>Data sukses disimpan</b>";
?>