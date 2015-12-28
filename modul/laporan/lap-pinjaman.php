<style type="text/css">
*{
font-family: Arial;
margin:0px;
padding:0px;
}
@page {
 margin-left:3cm 2cm 2cm 2cm;
}
table.grid{
width:20.4cm ;
font-size: 9pt;
border-collapse:collapse;
}
table.grid th{
padding-top:1mm;
padding-bottom:1mm;
}
table.grid th{
background: #F0F0F0;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
text-align:center;
padding-left:0.2cm;
border:1px solid #000;
}
table.grid tr td{
padding-top:0.5mm;
padding-bottom:0.5mm;
padding-left:2mm;
border-bottom:0.2mm solid #000;
border:1px solid #000;
}
h1{
font-size: 18pt;
}
h2{
font-size: 14pt;
}
.header{
display: block;
width:20.4cm ;
margin-bottom: 0.3cm;
text-align: center;
}
.attr{
font-size:9pt;
width: 100%;
padding-top:2pt;
padding-bottom:2pt;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
}
.pagebreak {
width:20cm ;
page-break-after: always;
margin-bottom:10px;
}
.akhir {
width:20cm ;
}
.page {
width:20cm ;
font-size:12px;
}

</style>
<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
include "../../inc/fungsi_koperasi.php";


$kode1	= $_GET['kode1'];
$kode2	= $_GET['kode2'];
$tgl1	= jin_date_sql($_GET['tgl1']);
$tgl2	= jin_date_sql($_GET['tgl2']);
$pilih	= $_GET['pilih'];

$judul_H = "Laporan Pinjaman Anggota <br>";

if($pilih=='nomor'){
	$where	= " WHERE a.noanggota BETWEEN '$kode1' AND '$kode2'";
	$judul_H .= "Berdasarkan Nomor Anggota $kode1 s/d $kode2 <br>";
}elseif($pilih=='tanggal'){
	$where	= " WHERE a.tgl BETWEEN '$tgl1' AND '$tgl2'";
	$judul_H .= "Berdasarkan Tanggal $_GET[tgl1] s/d $_GET[tgl2] <br>";
}else{
	$where	= "";
}


$query = "SELECT a.*,b.namaanggota,b.jk
		  FROM pinjaman as a
		  JOIN nasabah as b
		  ON a.noanggota=b.noanggota
		  $where
		  ORDER BY a.id_pinjam DESC";
//echo $query;

$data = mysql_query($query);

function myheader($judul_H){
echo  "<div class='header'>
		  <h2>".$judul_H."</h2>
		  </div>
		<table class='grid' >
		<tr>
			<th width='5%'>No</th>
			<th>Nomor</th>
			<th>Tanggal</th>
			<th>No.Anggota</th>
			<th>Nama</th>
			<th>L/P</th>
			<th>Lama</th>
			<th>Jumlah</th>
			<th>Bunga</th>
			<th>Jumlah <br>Bayar</th>
			<th>Jumlah <br>Cicilan</th>
			<th>Sisa</th>
		</tr>";		
}
	//echo $query;
function myfooter(){	
	echo "</table>";
}
	$no=1;
	$page =1;
	while($r_data=mysql_fetch_array($data)){
	$tgl = jin_date_str($r_data['tgl']);
	$jml_bayar= jmlBayar($r_data[id_pinjam]);
	$jml_cicilan = sisa($r_data[id_pinjam]);
	$sisa = $jml_bayar - $jml_cicilan;
	
	$t_jml = $t_jml+$r_data['jumlah'];
	$t_jmlbayar = $t_jmlbayar+$jml_bayar;
	$t_jmlcicilan = $t_jmlcicilan+$jml_cicilan;
	$t_jmlsisa = $t_jmlsisa+$sisa;
	//$stotal = $stotal+$saldo;
	if(($no%40) == 1){
   	if($no > 1){
        myfooter();
        echo "<div class=\"pagebreak\" align='right'>
		<div class='page' align='center'>Hal - $page</div>
		</div>";
		$page++;
  	}
   	myheader($judul_H);
	}
	echo "<tr>
			<td align='center'>$no</td>
			<td align='center'>$r_data[id_pinjam]</td>
			<td align='center'>$tgl</td>
			<td align='center'>$r_data[noanggota]</td>
			<td align='left'>$r_data[namaanggota]</td>
			<td align='center'>$r_data[jk]</td>
			<td align='center'>$r_data[lama]</td>
			<td align='right'>".number_format($r_data['jumlah'])."</td>
			<td align='center'>$r_data[bunga] %</td>
			<td align='right'>".number_format($jml_bayar)."</td>
			<td align='right'>".number_format($jml_cicilan)."</td>
			<td align='right'>".number_format($sisa)."</td>
			</tr>";
	$no++;
	}
	echo "<tr>
			<td colspan='7' align='center'>Total</td>
			<td align='right'><b>".number_format($t_jml)."</b></td>
			<td></td>
			<td align='right'><b>".number_format($t_jmlbayar)."</b></td>
			<td align='right'><b>".number_format($t_jmlcicilan)."</b></td>
			<td align='right'><b>".number_format($t_jmlsisa)."</b></td>
			</tr>";
			
myfooter();	
		echo "</table>";
	/*
	echo "<div class='akhir' align='right'>
			Total <b>".number_format($stotal)."</b>
		</div>";
	*/
	echo "<div class='page' align='center'>Hal - ".$page."</div>";
	/*
	header("Content-type: application/x-msdownload");
	header("Content-Disposition: attachment; filename=laporan.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	*/
	//echo $content;
//}
?>