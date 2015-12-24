<script language="javascript" src="modul/pengguna/ajax.js"></script>
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
echo "<div id='dalam_content'>
<h2>DAFTAR PENGGUNA</h2>
<div id='menu-tombol'>
<button class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-add'\" id='tambah'>Tambah
</button>
</div>
<div id='tampil_data'></div>
</div>";
echo "<div id='form_input' title='Tambah/Edit Data'>
<table width='100%'>
<tr>
<td>USER ID</td>
<td width='2%'>:</td>
<td><input type='text' name='userid' id='userid' size='25' maxlength='25' class='input'></td>
</tr>
<tr>
<td>Nama Lengkap</td>
<td width='2%'>:</td>
<td><input type='text' name='namalengkap' id='namalengkap' size='35' maxlength='35' class='input'></td>
</tr>
<tr>
<td>Password *</td>
<td width='2%'>:</td>
<td><input type='password' name='pwd' id='pwd' size='25' maxlength='25' class='input'></td>
</tr>
<tr>
<td>Level *</td>
<td width='2%'>:</td>
<td>
<select name='level' id='level' class='input'>
<option value='super admin'>super admin</option>
<option value='admin'>admin</option>
</select>
</td>
</tr>
</table>
*) Kosongkan jika tidak ingin diubah
</div>";
?>