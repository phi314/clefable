<?php
function namakoperasi($id){
	$sql	= "SELECT * 
				FROM profile
				WHERE id='$id'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['koperasi'];
	}else{
		$hasil		= '';
	}
	return $hasil;
}
function alamatkoperasi($id){
	$sql	= "SELECT * 
				FROM profile
				WHERE id='$id'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['alamat']." ".$data['kota']."<br>".
					 "Phone : ".$data['hp']."<br>".
					 "Fax : ".$data['fax']."<br>".
					 "Email : ".$data['email']."<br>";
	}else{
		$hasil		= '';
	}
	return $hasil;
}
function kotakoperasi($id){
	$sql	= "SELECT * 
				FROM profile
				WHERE id='$id'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['kota'];
	}else{
		$hasil		= '';
	}
	return $hasil;
}
function jmlBayar($no) {
	$sql	= "SELECT sum(angsuran+bunga) as total 
				FROM angsuran
				WHERE id_pinjam='$no'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['total'];
	}else{
		$hasil		= 0;
	}
	return $hasil;
}
function sisa($no) {
	$sql	= "SELECT sum(jumlah_bayar) as total 
				FROM angsuran
				WHERE id_pinjam='$no'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['total'];
	}else{
		$hasil		= 0;
	}
	return $hasil;
}
function cariAnggota($noanggota) {
	$sql	= "SELECT *
				FROM anggota
				WHERE noanggota='$nonggota'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['namaanggota'];
	}else{
		$hasil		= '';
	}
	return $hasil;	
}
function cariJenis($nojenis) {
	$sql	= "SELECT *
				FROM jenis_simpan
				WHERE id_jenis='$nojenis'";
	$query 	= mysql_query($sql);				
	$data	= mysql_fetch_array($query);
	$row	= mysql_num_rows($query);
	if ($row>0){
		$hasil		= $data['jenis_simpanan'];
	}else{
		$hasil		= $sql;
	}
	return $hasil;	
}
function simpanan($anggota){
	$sql	= mysql_query("SELECT sum(jumlah) as total FROM simpanan WHERE noanggota='$anggota'");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['total'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
function pengambilan($anggota){
	$sql	= mysql_query("SELECT sum(jumlah) as total FROM pengambilan WHERE noanggota='$anggota'");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['total'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
function saldo($anggota) {
	$simpanan = simpanan($anggota);
	$pengambilan = pengambilan($anggota);
	$saldo = $simpanan-$pengambilan;
	return $saldo;
}
function sisaAngsuran($anggota){
	$sql	= mysql_query("select b.noanggota,sum(a.angsuran+a.bunga) as total
			from angsuran as a
			join pinjaman as b
			ON a.id_pinjam=b.id_pinjam
			WHERE jumlah_bayar=0 AND noanggota='$anggota'
			GROUP BY b.noanggota");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['total'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}

function cariNama($nomor){
	$s = mysql_query("SELECT * FROM anggota WHERE noanggota='$nomor'");
	$r = mysql_num_rows($s);
	if($r>0){
		$d = mysql_fetch_array($s);
		$hasil = $d['namaanggota'];
	}else{
		$hasil = '';
	}
	return $hasil;
}

?>