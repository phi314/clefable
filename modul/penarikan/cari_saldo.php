<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_koperasi.php";

$noanggota = $_POST['cari'];
$saldo = saldo($noanggota);
$data['saldo']		= $saldo;
echo json_encode($data);
?>