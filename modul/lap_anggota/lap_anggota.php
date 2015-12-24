<script language="javascript" src="modul/lap_anggota/ajax.js"></script>
<style type="text/css">
button {
	margin: 2px; 
	position: relative; 
	padding: 4px 8px 4px 4px; 
	cursor: pointer;   
	list-style: none;
}
button span.ui-icon {
	float: left; 
	margin: 0 4px;
}
</style>
<?php
echo "<div id='dalam_content' align='center'>
<h2>LAPORAN ANGGOTA</h2>

<table width='50%'>
<tr>
	<td><input type='radio' name='pilih' class='pilih' value='semua' checked>Semua Data</td>
	<td></td>
</tr>
<tr>
	<td><input type='radio' name='pilih' class='pilih' value='pilih'>Pilih Nomor Anggota</td>
	<td><input type='text' name='anggota1' id='anggota1' size='10'> &nbsp; s/d &nbsp;
	<input type='text' name='anggota2' id='anggota2' size='10'>
	</td>
</tr>
</table>
<div id='menu-tombol'>
<button class='ui-state-default ui-corner-all' id='cetak'>
<span class='ui-icon ui-icon-print'></span>Cetak
</button>
<br>
Catatan : Setelah keluar jendela baru untuk mencetak tekan tombol Ctrl+P.<b>
Format kertas Landscape
</div>
</div>";
?>