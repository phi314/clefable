<?php
include "../../inc/inc.koneksi.php";
include '../../inc/fungsi_tanggal.php';

$table		="angsuran";
$no			=$_POST[no];
$cicilan	=$_POST[i];
$angsuran	=$_POST[angsuran];
$bunga		=$_POST[t_bunga];

$tgl_now	=$_POST[tgl];
$exp		= explode("-",$tgl_now);
$tgl		= $exp[0];

/*
$ket	= $th."-".$bln."-".$tgl;
$tanggal	= jin_date_sql($tgl_now);
*/
$satubulan = 30*($cicilan-1);
$month = date('F');
$day = $tgl; //date('j');
$year = date('Y');
$time = '24:00:00';
			
$date = mktime(0,0,0, date('m'), $day+$satubulan, $year);
$date = date("Y-m", $date);//." ".$time;

$tanggal	= $date."-".$tgl;

$input = "INSERT INTO $table (id_pinjam,cicilan,angsuran,bunga,tgl_jatuh_tempo,ket)
			VALUES('$no','$cicilan','$angsuran','$bunga','$tanggal','$tanggal')";
mysql_query($input);
echo "<b>Data sukses disimpan</b>";
?>