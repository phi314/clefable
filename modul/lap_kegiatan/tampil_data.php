<script type="text/javascript">
$(function() {
	$("#theTable tr:even").addClass("stripe1");
	$("#theTable tr:odd").addClass("stripe2");
	$("#theTable tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
</script>
<?php
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';
include '../../inc/fungsi_koperasi.php';

$nomor	= $_POST['nomor'];
$tgl	= jin_date_sql($_POST['tgl']);

//$where	= " ";

$where	= " WHERE tgl='$tgl'";
$cari = " ";
if(!empty($nomor)){
$where	.= " AND noanggota='$nomor'";
$cari = " AND noanggota='$nomor'";
}
echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>Nomor Bukti</th>
			<th>Tanggal</th>
			<th>Nomor Anggota</th>
			<th>Nama Anggota</th>
			<th>Jumlah</th>
			<th>Kegiatan</th>
		</tr>";
	$sql	= "SELECT id_simpanan as no_bukti,tgl as tgl, noanggota as no_anggota,jumlah as jml, 'Simpanan' as ket FROM simpanan $where
				UNION
				SELECT id_ambil as no_bukti,tgl as tgl, noanggota as no_anggota,jumlah as jml, 'Pengambilan' as ket FROM pengambilan $where
				UNION
				SELECT id_pinjam as no_bukti,tgl as tgl,noanggota as no_angota,jumlah as jml, 'Pinjaman' as ket FROM pinjaman $where
				UNION
				SELECT a.id_pinjam as no_bukti, tgl_bayar as tgl, noanggota as no_anggota, jumlah_bayar as jml, 'Bayar Pinjaman' as ket 
				FROM pinjaman as a
				JOIN angsuran as b
				ON a.id_pinjam=b.id_pinjam
				WHERE tgl_bayar='$tgl' $cari
				
				ORDER BY tgl DESC";
	//echo $sql;
	$query	= mysql_query($sql);
	
	$no=1;
	while($rows=mysql_fetch_array($query)){
		$no_bukti	= $rows['no_bukti'];
		$tgl 		= jin_date_str($rows['tgl']);
		$nomor		= $rows['no_anggota'];
		$nama		= cariNama($rows['no_anggota']);
		$jml		= number_format($rows['jml']);
		$ket		= $rows['ket'];

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
echo "</table>";
?>