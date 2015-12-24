<script language="javascript" src="modul/lap_kreditmacet/ajax.js"></script>
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
<h2>LAPORAN HUTANG ANGGOTA</h2>

<table width='50%'>
<tr>
	<td><input type='radio' name='pilih' class='pilih' value='semua' checked>Semua Data</td>
	<td></td>
</tr>
<tr>
	<td><input type='radio' name='pilih' class='pilih' value='tanggal'>Tanggal</td>
	<td><input type='text' name='tgl1' id='tgl1' size='10'> &nbsp; s/d &nbsp;
	<input type='text' name='tgl2' id='tgl2' size='10'>
	</td>
</tr>
</table>
<div id='menu-tombol'>
<button class='ui-state-default ui-corner-all' id='cetak'>
<span class='ui-icon ui-icon-print'></span>Cetak
</button>
</div>
</div>";
?>