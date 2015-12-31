<script language="javascript" src="modul/bayar/ajax.js"></script>
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
#menu-tombol1 {
	padding-bottom:10px;
	padding:5px 5px 5px 5px;
	margin-bottom:20px;
}
#tombol-tambah{
	float:left;
	width:250px;
}
#tombol-cari{
	float:right;
	width:500px;
	text-align:right;
}
#tampil_data2{
	margin-top:20px;
}
#tampil_data1,#tampil_data3{
	margin-top:10px;
}
/*
#info_anggota{
	position:absolute;
	padding:5px 5px 5px 5px;
	background-color:#FFF;
	width:450px;
	border:3px solid #5c9fe9;
	-moz-border-radius: 5px 5px 5px 5px; 
	-webkit-border-radius: 5px 5px 5px 5px; 
	border-radius: 5px 5px 5px 5px; 
	-moz-box-shadow:0px 0px 20px #aaa;
    -webkit-box-shadow:0px 0px 20px #aaa;
    box-shadow:0px 0px 20spx #aaa;
	z-index:200px;
	float:right;
	left:350px;
}
*/
</style>
<?php
echo "<div id='dalam_content'>
	<h2>PEMBAYARAN PINJAMAN ANGGOTA</h2>
<div class=\"easyui-tabs\" style=\"width:auto;height:auto\">
<div title=\"Bayar Pinjaman\" style=\"padding:10px\">
	<div id='form_isian'>
		<div class=\"easyui-tabs\" style=\"width:300px;height:auto;float:right;\">
		<div id='info_anggota' title=\"Info Anggota\" style=\"padding:5px\">
		</div>
		</div>
	<div id=\"p\" class=\"easyui-panel\" title=\"Anggota\" style=\"float:left;width:650px;padding:5px;margin-buttom:10px;\">
	<table width='100%'>
		<tr>
			<td width='20%'>No.Pinjaman</td>
			<td width='2%'>:</td>
			<td><input type='text' id='no' size='15' >
			<button class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-search'\" id='cari_no'>Cari</button>
			</td>
		</tr>

		<tr>
			<td width='15%'>Nomor Anggota</td>
			<td width='2%'>:</td>
			<td><input type='text' id='nomor' size='15' class='input' disabled></td>
		</tr>
		<tr>
			<td width='15%'>Tanggal</td>
			<td width='2%'>:</td>
			<td><input type='tgl' id='tgl' size='12' class='input' disabled></td>
		</tr>
		<tr>
			<td width='15%'>Lama Pinjaman</td>
			<td width='2%'>:</td>
			<td><select name='lama' id='lama' class='input' disabled>
			<option value=''>-Pilih-</option>
			<option value='6'>6 Bulan</option>
			<option value='12'>12 Bulan</option>
			<option value='24'>24 Bulan</option>
			</select>
			</td>
		</tr>
		<tr>
			<td width='15%'>Bunga</td>
			<td width='2%'>:</td>
			<td><input type='text' name='bunga' id='bunga' size='5' class='input' disabled> %</td>
		</tr>
		<tr>
			<td width='15%'>Jumlah Pinjaman</td>
			<td width='2%'>:</td>
			<td><input type='text' name='jml' id='jml' size='15' class='input' disabled></td>
		</tr>
	</table>
	</div>
	</div>
	<div id='menu-tombol1'>
		<div id='tombol-tambah'>
			<button class='ui-state-default ui-corner-all' id='tambah'>
			<span class='ui-icon ui-icon-circle-plus'></span>Tambah Pembayaran
			</button>
		</div>
		<div id='tombol-cari'>
			Tanggal <input type='text' id='tgl1' size='10'> s/d <input type='text' id='tgl2' size='10'>
			<button class='ui-state-default ui-corner-all' id='cari2'>
			<span class='ui-icon ui-icon-search'></span>Cari
			</button>
		</div>
	</div>
	<div id='tampil_data1'></div>
	<div id='info' align='center'></div>
	</div>
	
	</div>
	</div>";
?>