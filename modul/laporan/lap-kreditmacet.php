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



$tgl1	= jin_date_sql($_GET['tgl1']);
$tgl2	= jin_date_sql($_GET['tgl2']);
$pilih	= $_GET['pilih'];

$judul_H = "Laporan Hutang Anggota <br>";

if($pilih=='tanggal'){
	$where	= " WHERE a.tgl_jatuh_tempo BETWEEN '$tgl1' AND '$tgl2' AND a.jumlah_bayar=0";
	$judul_H .= "Berdasarkan Tanggal Jatuh Tempo $_GET[tgl1] s/d $_GET[tgl2] <br>";
}else{
	$where	= " WHERE a.jumlah_bayar=0";
}


$query = "select a.id_pinjam,a.cicilan,a.angsuran,a.bunga,(a.angsuran+a.bunga) as total,a.tgl_jatuh_tempo,a.tgl_bayar,a.jumlah_bayar,
			b.noanggota,b.lama,b.jumlah,
			c.namaanggota,c.jk 
			from pinjaman_detail as a
			join pinjaman_header as b
			JOIN anggota as c
			ON a.id_pinjam=b.id_pinjam AND b.noanggota=c.noanggota
		  $where
		  ORDER BY a.id_pinjam,b.noanggota,a.cicilan";
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
			<th>Jatuh Tempo</th>
			<th>No.Anggota</th>
			<th>Nama</th>
			<th>L/P</th>
			<th>Cicilan Ke</th>
			<th>Jumlah</th>
		</tr>";		
}
	//echo $query;
function myfooter(){	
	echo "</table>";
}
	$no=1;
	$page =1;
	$t_jml = 0;
	while($r_data=mysql_fetch_array($data)){
	$tgl = jin_date_str($r_data['tgl_jatuh_tempo']);
	
	$jumlah = $r_data['total'];
	$t_jml = $t_jml+$jumlah;
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
			<td align='center'>$r_data[cicilan]</td>
			<td align='right'>".number_format($jumlah)."</td>
			</tr>";
	$no++;
	}
	echo "<tr>
			<td colspan='7' align='center'>Total</td>
			<td align='right'><b>".number_format($t_jml)."</b></td>
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
