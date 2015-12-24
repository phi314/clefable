<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_koperasi.php";

$noanggota = $_POST['cari'];
$sisaangsuran = sisaAngsuran($noanggota);
$data['sisa']		= $sisaangsuran;
echo json_encode($data);
/*
if ($sisaangsuran>0){
	$data['no']		= $no;
	echo json_encode($data);
}else{
	$data['no']		= 'P0001';
	echo json_encode($data);
}
*/
?>