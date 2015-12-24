<script language="javascript" src="modul/edit_profil/ajax.js"></script>
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
$aksi="modul/edit_profil/simpan.php";
$id = $_SESSION['namauser'];
$query = mysql_query("SELECT * FROM users WHERE user_id='$id'");
$r	= mysql_fetch_array($query);
echo "<div id='dalam_content'>
<div id=\"p\" class=\"easyui-panel\" title=\"Edit Profil\" style=\"float:left;width:auto;padding:5px;margin-buttom:10px;\">
	<form name='form' method='post' action='$aksi' enctype='multipart/form-data'>
	<table width='100%'>
	<td width='15%'>Nama Anggota</td>
	<td width='2%'>:</td>
	<td><input type='text' name='nama_anggota' id='nama_anggota' size='50' maxlength='50' class='input' value='$r[namalengkap]'></td>
	</tr>
	<tr>
	<td>Foto</td>
	<td width='2%'>:</td>
	<td><input type=file name='fupload' size='20' /></td>
	</tr>
	<td colspan='3' align='center'>
	<button type='submit' class='ui-state-default ui-corner-all' id='simpan'>
	<span class='ui-icon ui-icon-disk'></span>Simpan
	</button>
	</td>
	</tr>
	</table>
	</form>
</div>
</div>";
?>