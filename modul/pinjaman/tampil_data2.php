<script type="text/javascript">
$(function() {
	$("#theTable.satu tr:even").addClass("stripe1");
	$("#theTable.satu tr:odd").addClass("stripe2");

	$("#theTable.satu tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
function deleteRow(ID) {
	var id	= ID;
   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "modul/pinjaman/hapus.php",
			data	: "id="+id,
			success	: function(data){
				$("#tampil_data1").load("modul/pinjaman/tampil_data1.php");
			}
		});
	}
}
function CetakRow(ID) {
	var id	= ID;
   var pilih = confirm('Data yang akan dicetak ulang  = '+id+ '?');
	if (pilih==true) {
		window.open('modul/laporan/cetak-pinjam.php?kode='+id);	
	}
}
</script>
<?php
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';
include '../../inc/fungsi_koperasi.php';
$tgl1	= !empty($_POST['tgl1']) ? $_POST['tgl1'] : '';
$tgl2	= !empty($_POST['tgl2']) ? $_POST['tgl2'] : '';
if(!empty($tgl1)) {
    $tgl1	= jin_date_sql($_POST['tgl1']);
    $tgl2	= jin_date_sql($_POST['tgl2']);
	$where	= " WHERE tgl BETWEEN '$tgl1' AND '$tgl2'";
}else{
	$where ="";
}
echo "<table id='theTable' class='satu' width='100%'>
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
			<th>Hapus</th>
			<th>Cetak</th>
		</tr>";
	$sql	= "SELECT a.*,b.namaanggota,b.jk
				FROM pinjaman as a
				JOIN nasabah as b
				ON a.noanggota=b.noanggota
				$where
				ORDER BY a.id_pinjam DESC";
	$query	= mysql_query($sql);
	$no=1;
	$gtotal = 0;
	while($rows=mysql_fetch_array($query)){
		$jml_bayar= jmlBayar($rows['id_pinjam']);
		$jml_cicilan = sisa($rows['id_pinjam']);
		$sisa = $jml_bayar - $jml_cicilan;
		echo "<tr>
				<td align='center'>$no</td>
				<td>".$rows['id_pinjam']."</td>
				<td align='center'>".jin_date_str($rows['tgl'])."</td>
				<td align='center'>".$rows['noanggota']."</td>
				<td>".$rows['namaanggota']."</td>
				<td align='center'>".$rows['jk']."</td>
				<td align='center'>".$rows['lama']."</td>
				<td align='right'>".number_format($rows['jumlah'])."</td>
				<td align='center'>".$rows['bunga']."</td>
				<td align='center'>".number_format($jml_bayar)."</td>
				<td align='center'>".number_format($jml_cicilan)."</td>
				<td align='center'>".number_format($sisa)."</td>
				<td align='center'>
				<a href='javascript:deleteRow(\"{$rows['id_pinjam']}\")'>Hapus</a>			
				</td>
				<td align='center'>
				<a href='javascript:CetakRow(\"{$rows['id_pinjam']}\")'>Cetak</a>			
				</td>
			</tr>";
	$no++;
	$gtotal = $gtotal+$rows['jumlah'];
	}
echo "
	<tr>
		<td colspan='7' align='center'>Total</td>
		<td align='right'><b>".number_format($gtotal)."</b></td>
    </tr>
	</table>";
?>
