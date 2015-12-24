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
}

</style>
<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
include "../../inc/fungsi_koperasi.php";


$tgl	= jin_date_sql($_GET['tgl']);
$nomor	= $_GET['nomor'];

$judul_H = "Laporan Kegiatan Sehari-hari <br> Tanggal ".$_GET['tgl']."<br>";

$where	= " WHERE tgl='$tgl'";
$cari = " ";
if(!empty($nomor)){
$where	.= " AND noanggota='$nomor'";
$cari = " AND noanggota='$nomor'";
}


$query = "SELECT id_simpanan as no_bukti,tgl as tgl, noanggota as no_anggota,jumlah as jml, 'Simpanan' as ket FROM simpanan $where
				UNION
				SELECT id_ambil as no_bukti,tgl as tgl, noanggota as no_anggota,jumlah as jml, 'Pengambilan' as ket FROM pengambilan $where
				UNION
				SELECT id_pinjam as no_bukti,tgl as tgl,noanggota as no_angota,jumlah as jml, 'Pinjaman' as ket FROM pinjaman_header $where
				UNION
				SELECT a.id_pinjam as no_bukti, tgl_bayar as tgl, noanggota as no_anggota, jumlah_bayar as jml, 'Bayar Pinjaman' as ket 
				FROM pinjaman_header as a
				JOIN pinjaman_detail as b
				ON a.id_pinjam=b.id_pinjam
				WHERE tgl_bayar='$tgl' $cari
				ORDER BY tgl DESC";

$data = mysql_query($query);

function myheader($judul_H){
echo  "<div class='header'>
		  <h2>".$judul_H."</h2>
		  </div>
		<table class='grid' >
		<tr>
			<th width='5%'>No</th>
			<th>Nomor Bukti</th>
			<th>Tanggal</th>
			<th>Nomor Anggota</th>
			<th>Nama Anggota</th>
			<th>Jumlah</th>
			<th>Kegiatan</th>
		</tr>";		
}
	//echo $query;
function myfooter(){	
	echo "</table>";
}
	$no=1;
	$page =1;
	while($rows=mysql_fetch_array($data)){
		$no_bukti	= $rows['no_bukti'];
		$tgl 		= jin_date_str($rows['tgl']);
		$nomor		= $rows['no_anggota'];
		$nama		= cariNama($rows['no_anggota']);
		$jml		= number_format($rows['jml']);
		$ket		= $rows['ket'];
		
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
			<td align='center'>$no_bukti</td>
			<td align='center'>$tgl</td>
			<td align='center'>$nomor</td>
			<td >$nama</td>
			<td align='right'>$jml</td>
			<td >$ket</td>
			</tr>";
	$no++;
	}

myfooter();	
		echo "</table>";
	echo "<div class='page' align='center'>Hal - ".$page."</div>";
?>