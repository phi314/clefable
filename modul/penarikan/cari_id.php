<?php
include "../../inc/inc.koneksi.php";
$table	= 'pengambilan';
$text	= "SELECT *
			FROM $table ORDER BY id_ambil DESC LIMIT 1";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['id']		= $r[id_ambil];	
	echo json_encode($data);
}
}else{
	$data['id']		= '';
	echo json_encode($data);
}
?>