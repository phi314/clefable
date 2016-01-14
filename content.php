<?php
include "inc/inc.koneksi.php";
include "inc/fungsi_koperasi.php";
$mod = $_GET['module'];
if ($mod=='home'){
	$nama = namakoperasi(1);
	echo "<h2>Selamat Datang</h2>";
	echo "Hai, <b>$_SESSION[namauser] </b> [ $_SESSION[level] ] Selamat datang  di Sistem Informasi Koperasi <b>$nama</b>";	
	echo "<br><br>";
	if($_SESSION['level']=='super admin'){
echo "<table class='list'><thead>
		<td class='center' colspan=5><center>Control Panel</center></td></thead>
		<tr>
		  <td width=120 align=center><a href=media.php?module=jenis><img src=images/jenis.png border=none><br /><b>Jenis Simpanan</b></a></td>
		  <td width=120 align=center><a href=media.php?module=anggota><img src=images/anggota.png border=none><br /><b>Anggota</b></a></td>
		  <td width=120 align=center><a href=media.php?module=users><img src=images/users.png border=none><br /><b>Pengguna / Users</b></a></td>
		  <td width=120 align=center><a href=media.php?module=profil><img src=images/profil.png border=none><br /><b>Profil Koperasi</b></a></td>
    </tr>
		<tr>
		  <td width=120 align=center><a href=media.php?module=simpanan><img src=images/simpanan.png border=none><br /><b>Simpanan</b></a></td>
		  <td width=120 align=center><a href=media.php?module=penarikan><img src=images/penarikan.png border=none><br /><b>Tarik Tunai</b></a></td>
		  <td width=120 align=center><a href=media.php?module=pinjaman><img src=images/pinjaman.png border=none><br /><b>Pinjaman</b></a></td>
		  <td width=120 align=center><a href=media.php?module=bayar><img src=images/kredit.png border=none><br /><b>Bayar Pinjaman</b></a></td>
    </tr>
    </table>";	
	}
}
elseif ($mod=='edit_profil'){
    include "modul/edit_profil/profil.php";
}
elseif ($mod=='profil'){
    include "modul/profil/profil.php";
}
elseif ($mod=='jenis'){
    include "modul/jenis/jenis.php";
}
elseif ($mod=='anggota'){
    include "modul/anggota/anggota.php";
}
elseif ($mod=='users'){
    include "modul/pengguna/pengguna.php";
}
//buatlah form user berdasarkan form anggota
elseif ($mod=='simpanan'){
    include "modul/simpanan/simpanan.php";
}
elseif ($mod=='penarikan'){
    include "modul/penarikan/penarikan.php";
}
//buatlah form pengambilan berdasarkan form simpanan
elseif ($mod=='pinjaman'){
    include "modul/pinjaman/pinjaman.php";
}
elseif ($mod=='bayar'){
    include "modul/bayar/bayar.php";
}
elseif ($mod=='lap-anggota'){
    include "modul/lap_anggota/lap_anggota.php";
}
elseif ($mod=='lap-simpanan'){
    include "modul/lap_simpanan/lap_simpanan.php";
}
elseif ($mod=='lap-pinjaman'){
    include "modul/lap_pinjaman/lap_pinjaman.php";
}
elseif ($mod=='lap-kreditmacet'){
    include "modul/lap_kreditmacet/lap_kreditmacet.php";
}
elseif ($mod=='lap-kegiatan'){
    include "modul/lap_kegiatan/lap_kegiatan.php";
}
elseif ($mod=='kas'){
    include "modul/kas/kas.php";
}
elseif ($mod=='penggajian'){
    include "modul/penggajian/penggajian.php";
}
elseif ($mod=='lap-peramalan'){
    include "modul/lap_peramalan/lap_peramalan.php";
}
else{
  echo "<b>MODUL BELUM ADA ATAU BELUM LENGKAP SILAHKAN BUAT SENDIRI</b>";
}
?>