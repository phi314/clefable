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
h3{
font-size: 10pt;
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
font-size:13px;
}

</style>
<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
include "../../inc/fungsi_koperasi.php";

$kode	= $_GET['kode'];
$where	= " WHERE noanggota ='$kode'";
$q = mysql_query("SELECT * FROM simpanan $where");
$row = mysql_num_rows($q);
if($row>0){

$q	= mysql_query("SELECT * FROM anggota WHERE noanggota='$kode'");
$d 	= mysql_fetch_array($q);
$nama 	= $d['namaanggota'];


$judul_H = "CETAK REKENING ANGGOTA<br>";
$judul_H .= "NOMOR. $kode<br>";
$judul_H .= "$nama<br>";


$query = "SELECT id_simpanan as id,tgl,noanggota,id_jenis,jumlah,user_id,'simpan' as ket,tglinsert FROM simpanan
		$where
		UNION
		SELECT id_ambil as id, tgl,noanggota,id_jenis,jumlah,user_id,'tarik tunai' as ket,tglinsert FROM pengambilan
		$where
		order by tglinsert";


$data = mysql_query($query);

function myheader($judul_H){
echo  "<div class='header'>
		  <h2>".$judul_H."</h2>
		</div>
		<table class='grid' >
		<tr>
			<th width='5%'>No</th>
			<th >Tanggal</th>
			<th >Jenis</th>
			<th >Debet</th>
			<th >Kredit</th>
			<th >Saldo</th>
		</tr>";		
}
	//echo $query;
function myfooter(){	
	echo "</table>";
}
	$no=1;
	$page =1;
	$saldo=0;
	while($r_data=mysql_fetch_array($data)){
	$tgl = jin_date_str($r_data['tgl']);		
	$jenis = cariJenis($r_data['id_jenis']);
	$ket = $r_data['ket'];
	if($ket=='simpan'){
		$debet = $r_data['jumlah'];
		$kredit= 0;
	}else{
		$debet=0;
		$kredit = $r_data['jumlah'];
	}
	$saldo = ($saldo+$debet)-$kredit;
	//$total = $r_data[hargabeli]*$r_data[jmlbeli];
	//$gtotal = $gtotal+$total;
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
			<td align='center'>$tgl</td>
			<td align='left'>$jenis [$r_data[ket]]</td>
			<td align='right'>".number_format($debet)."</td>
			<td align='right'>".number_format($kredit)."</td>
			<td align='right'>".number_format($saldo)."</td>
			</tr>";
	$no++;
	}

myfooter();	
		echo "</table>";
	/*
	echo "<div class='akhir' align='right'>
			Total : <b>".number_format($gtotal)."</b>
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
}else{
	echo "Tidak Ada Data";
}
?>