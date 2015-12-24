<script language="javascript" src="modul/profil/ajax.js"></script>
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
//include "../../inc/inc.koneksi.php";
$query = mysql_query("SELECT * FROM profile LIMIT 1");
$r	= mysql_fetch_array($query);
echo "<div id='dalam_content'>
<h2>PROFIL</h2>
<table width='100%'>
<tr>
<td>ID</td>
<td width='2%'>:</td>
<td><input type='text' name='id' id='id' size='5' maxlength='5' class='input' disabled value='$r[id]'></td>
</tr>
<tr>
<td>Nama Koperasi</td>
<td width='2%'>:</td>
<td><input type='text' name='koperasi' id='koperasi' size='50' maxlength='50' class='input' value='$r[koperasi]'></td>
</tr>
<tr>
<td>Alamat</td>
<td width='2%'>:</td>
<td><input type='text' name='alamat' id='alamat' size='80' maxlength='80' class='input' value='$r[alamat]'></td>
</tr>
<tr>
<td>Kota</td>
<td width='2%'>:</td>
<td><input type='text' name='kota' id='kota' size='50' maxlength='50' class='input' value='$r[kota]'></td>
</tr>
<tr>
<td>Phone</td>
<td width='2%'>:</td>
<td><input type='text' name='hp' id='hp' size='30' maxlength='30' class='input' value='$r[hp]'></td>
</tr>
<tr>
<td>Fax</td>
<td width='2%'>:</td>
<td><input type='text' name='fax' id='fax' size='30' maxlength='30' class='input' value='$r[fax]'></td>
</tr>
<tr>
<td>Email</td>
<td width='2%'>:</td>
<td><input type='text' name='email' id='email' size='30' maxlength='30' class='input' value='$r[email]'></td>
</tr>
<tr>
<td colspan='3' align='center'>
<button class='ui-state-default ui-corner-all' id='simpan'>
<span class='ui-icon ui-icon-disk'></span>Simpan
</button>
</td>
</tr>
</table>
</div>";
echo "<div id='error'></div>";
?>