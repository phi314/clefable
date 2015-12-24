<script language="javascript" src="modul/lap_kegiatan/ajax.js"></script>
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
<h2>LAPORAN KEGIATAN SEHARI-HARI</h2>

<table width='50%'>
<tr>
	<td width='100'>Tanggal</td>
	<td>
	<input type='text' name='tgl' id='tgl' size='15'>
	</td>
</tr>
<tr>
	<td>Nomor Anggota</td>
	<td><input type='text' name='nomor' id='nomor' size='15'>
	</td>
</tr>
</table>
<div id='menu-tombol'>
<button class='ui-state-default ui-corner-all' id='lihat'>
<span class='ui-icon ui-icon-search'></span>Lihat
</button>
<button class='ui-state-default ui-corner-all' id='cetak'>
<span class='ui-icon ui-icon-print'></span>Cetak
</button>
</div>
<div id='tampil_data'></div>
</div>";
?>