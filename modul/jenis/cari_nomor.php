<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";

$text	= "SELECT max(id_jenis) as noakhir
			FROM jenis_simpan";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
	$r=mysql_fetch_array($sql);
	$noakhir	= (int) $r[noakhir];
	$noakhir++;
	$no = sprintf("%02s",$noakhir);
	
	$data['no']		= $no;
	echo json_encode($data);
}else{
	$data['no']		= '01';
	echo json_encode($data);
	
}

?>