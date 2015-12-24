<?php
session_start();
include "../../inc/inc.koneksi.php";

$table	= "users";
$id		= $_SESSION['namauser'];

$sql = mysql_query("SELECT *
				   FROM $table 
				   WHERE user_id= '$id'");
$row	= mysql_num_rows($sql);
if ($row>0){
	$nama 	= $_POST['nama_anggota'];
	$lokasi_file = $_FILES['fupload']['tmp_name'];
  	$nama_file   = $_FILES['fupload']['name'];
  	$tipe_file   = $_FILES['fupload']['type'];
	$vdir_upload = "../../foto/";
  	$vfile_upload = $vdir_upload . $nama_file;
	
  	if (empty($lokasi_file)){
		$input	= "UPDATE $table SET namalengkap	='$nama'
						WHERE user_id='$id'";
		mysql_query($input);								
	}else{
		move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
		
		$input	= "UPDATE $table SET namalengkap	='$nama',foto='$nama_file'
						WHERE user_id= '$id'";
		mysql_query($input);								
	}
	//echo $lokasi_file.'<br>'.$nama_file.'<br>'.$input;
	//echo "<b>Data Sukses diubah</b>";
	header('location:../../media.php?module=edit_profil');
}	
?>