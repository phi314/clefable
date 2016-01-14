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
function deleteRow(ID) {
	var id	= ID;
	var cari = $("#nomor").val();
   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "modul/penggajian/hapus.php",
			data	: "id="+id,
			success	: function(data){
				$("#tampil_data1").load("modul/kas/tampil_data1.php");
			}
		});
	}
}
</script>
<?php
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';
echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Hapus</th>
		</tr>";
	$sql	= "SELECT *
				FROM penggajian
				ORDER BY tanggal DESC";
	$query	= mysql_query($sql);
	$no=1;
	$gtotal = 0;
	while($rows=mysql_fetch_array($query)){
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>".$rows['tanggal']."</td>
				<td align='right'>".number_format($rows['jumlah'])."</td>
				<td align='center'>
				<a href='javascript:deleteRow(\"{$rows['id']}\")'>Hapus</a>
				</td>
			</tr>";
	$no++;
	$gtotal = $gtotal+$rows['jumlah'];
	}
echo "
	<tr>
		<td colspan='2' align='center'>Total</td>
		<td align='right'><b>".number_format($gtotal)."</b></td>
	</table>";
?>
