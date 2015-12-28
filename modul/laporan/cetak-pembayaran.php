<?php
session_start();
?>
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
table.gridket{
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
table.gridket tr td{
padding-top:0.5mm;
padding-bottom:0.5mm;
padding-left:2mm;
border-bottom:0.2mm solid #000;
}
h1{
font-size: 18pt;
}
h2{
font-size: 14pt;
}
h3{
font-size: 10pt;
}
.profil{
display: block;
width:20.4cm ;
font-size:10px;
margin:0px;
padding:0px;
}
.profil .koperasi{
font-size:14px;
font-weight:bold;
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
font-size:14px;
}
.page {
width:20cm ;
font-size:13px;
}

</style>
<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
include "../../inc/fungsi_koperasi.php";

$kode	= $_GET['kode'];

$where	= " WHERE id_pinjam ='$kode'";
$q	= mysql_query("SELECT a.*,b.* 
	  FROM pinjaman as a
	  JOIN nasabah as b
	  ON a.noanggota=b.noanggota
	  WHERE id_pinjam='$kode'");
$d 	= mysql_fetch_array($q);
$noanggota		= $d['noanggota'];
$nama 			= $d['namaanggota'];
$tgl_pinjam 	= jin_date_str($d['tgl']);
$lama		 	= $d['lama'];
$bunga		 	= $d['bunga'];
$jumlah		 	= number_format($d['jumlah']);

$profil = "<span class='koperasi'>".namakoperasi(1)."</span><br>";
$profil .= alamatkoperasi(1);

$ket = "<table class='gridket' >
		<tr>
			<td>Tanggal</td>
			<td>: $tgl_pinjam</td>
			<td>Lama Pinjaman</td>
			<td>: $lama Bulan</td>
		</tr>
		<tr>
			<td>Bunga</td>
			<td>: $bunga %</td>
			<td>Jumlah Pinjaman</td>
			<td>: $jumlah</td>
		</tr>
		</table>";
$judul_H = "BUKTI PEMBAYARAN PINJAMAN ANGGOTA<br>";
$judul_H .= "NO.PINJAMAN $kode<br>";
$judul_H .= "$noanggota - $nama<br>";



$query = "SELECT * FROM angsuran
		$where
		order by cicilan";


$data = mysql_query($query);

function myheader($profil,$judul_H,$ket){
echo  "<div class='profil'>".$profil."
		</div>
		<br>
		<div class='header'>
		  <h2>".$judul_H."</h2>
		</div>
		".$ket."
		<table class='grid' >
		<tr>
			<th width='5%'>No</th>
			<th >Cicilan Ke</th>
			<th >Jatuh Tempo</th>
			<th >Angsuran</th>
			<th >Bunga</th>
			<th >Total</th>
			<th >Tanggal Bayar</th>
			<th >Jumlah Bayar</th>
		</tr>";		
}
	//echo $query;
function myfooter(){	
	echo "</table>";
}
	$no=1;
	$page =1;
	while($r_data=mysql_fetch_array($data)){
	$tgl = jin_date_str($r_data['tgl_jatuh_tempo']);		
	$tglbayar = jin_date_str($r_data['tgl_bayar']);		
	
	$angsuran = $r_data['angsuran'];
	$bunga = $r_data['bunga'];
	$total = $angsuran+$bunga;
	$jmlbayar = $r_data['jumlah_bayar'];
	//$total = $r_data[hargabeli]*$r_data[jmlbeli];
	$gtotal = $gtotal+$total;
	$sisa	= $sisa+$jmlbayar;
	$tsisa = $gtotal-$sisa;
	if(($no%40) == 1){
   	if($no > 1){
        myfooter();
        echo "<div class=\"pagebreak\" align='right'>
		<div class='page' align='center'>Hal - $page</div>
		</div>";
		$page++;
  	}
   	myheader($profil,$judul_H,$ket);
	}
	echo "<tr>
			<td align='center'>$no</td>
			<td align='center'>$r_data[cicilan]</td>
			<td align='center'>$tgl</td>
			<td align='right'>".number_format($angsuran)."</td>
			<td align='right'>".number_format($bunga)."</td>
			<td align='center'>".number_format($total)."</td>
			<td align='center'>$tglbayar</td>
			<td align='center'>".number_format($jmlbayar)."</td>
			</tr>";
	$no++;
	}
	echo "<tr>
			<td colspan='5' align='center'>Total</td>	
			<td align='right'><b>".number_format($gtotal)."</b></td>
			<td></td>
			<td align='right'><b>".number_format($sisa)."</b></td>
		</tr>
		<tr>
			<td colspan='5' align='center'>Sisa Tagihan</td>	
			<td colspan='3' align='center'><b>".number_format($tsisa)."</b></td>
		</tr>
		";
myfooter();	
	/*
		echo "<tr>
			<td colspan='5' align='center'>Total Tagihan</td>
			<td><b>".number_format($gtotal)."</b></td>
			</tr>";
		echo "<tr>
			<td colspan='5' align='center'>Total Bayar</td>
			<td><b>".number_format($sisa)."</b></td>
			</tr>";			
		echo "<tr>
			<td colspan='5' align='center'>Sisa Tagihan</td>
			<td><b>".number_format($tsisa)."</b></td>
			</tr>";			
		echo "</table>";
	*/
	echo "<br>";
	echo "<div class='akhir' align='right'>";
			$kota = kotakoperasi(1);
		echo $kota.", ".date('d F Y');
		echo "<br>Staf Koperasi";
		echo "<br><br><br>";
		echo $_SESSION['namalengkap'];
	echo  "</div>";
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