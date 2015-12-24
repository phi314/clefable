<script language="javascript" src="modul/anggota/ajax.js"></script>
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
#menu-tombol {
	padding-bottom:10px;
	padding:5px 5px 5px 5px;
}
#tombol-tambah{
	float:left;
	width:250px;
}
#tombol-cari{
	float:right;
	width:550px;
	text-align:right;
}
#tampil_data{
	margin-top:30px;
}
</style>
<?php
echo "<div id='dalam_content'>
<h2>DAFTAR ANGGOTA</h2>
<div id='menu-tombol'>
<div id='tombol-tambah'>
<button class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-add'\" id='tambah'>Tambah</button>
</div>
<div id='tombol-cari'>
<input type='text' id='txt_cari' size='30'>
<button class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-search'\" id='cari'>Cari</button>
</div>
</div>
<div id='tampil_data'></div>
</div>";
echo "<div id='form_input'>";
?>
<div id="panel" class="easyui-panel" title="Input Anggota" style="float:left;width:950px;height:auto;padding:5px;">
<?php
echo "
<table width='100%'>
<tr>
<td width='150'>Nomor Anggota</td>
<td width='2%'>:</td>
<td><input type='text' name='nomor' id='nomor' size='10' maxlength='10' class='input'></td>
</tr>
<tr>
<td>No.Identitas</td>
<td width='2%'>:</td>
<td><input type='text' name='identitas' id='identitas' size='20' maxlength='20' class='input'></td>
</tr>
<tr>
<td>Nama</td>
<td width='2%'>:</td>
<td><input type='text' name='anggota' id='anggota' size='50' maxlength='50' class='input'></td>
</tr>
<tr>
<td>Jenis Kelamin</td>
<td width='2%'>:</td>
<td><select name='jk' id='jk'>
<option value=''>-Pilih-</option>
<option value='L'>Laki-laki</option>
<option value='P'>Perempuan</option>
</select>
</td>
</tr>
<tr>
<td>Tempat Lahir</td>
<td width='2%'>:</td>
<td><input type='text' name='tempat' id='tempat' size='30' maxlength='30' class='input'></td>
</tr>
<tr>
<td>Tanggal Lahir</td>
<td width='2%'>:</td>
<td><input type='text' name='tgl' id='tgl' size='12' maxlength='12' class='input'></td>
</tr>
<tr>
<td>Alamat</td>
<td width='2%'>:</td>
<td><input type='text' name='alamat' id='alamat' size='50' maxlength='50' class='input'></td>
</tr>
<tr>
<td>HP</td>
<td width='2%'>:</td>
<td><input type='text' name='hp' id='hp' size='20' maxlength='20' class='input'></td>
</tr>
<tr>
	<td colspan='3' align='center'>
	<button class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-save'\" id='simpan'>Simpan</button>
	<button class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-logout'\" id='tutup'>Tutup</button>
	</td>
</tr>	
</table>";
?>
</div>
<?php
echo "</div>";
?>