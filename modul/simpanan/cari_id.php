<?php
include "../../inc/inc.koneksi.php";
$table	= 'simpanan';
$text	= "SELECT *
			FROM $table ORDER BY id_simpanan DESC LIMIT 1";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['id']		= $r[id_simpanan];	
	echo json_encode($data);
}
}else{
	$data['id']		= '';
	echo json_encode($data);
}
?>