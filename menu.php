<?php 
session_start();
$level = $_SESSION['level'];
if($level=='super admin'){
?>
<ul class="sf-menu">
<li><a href="?module=home">Home</a></li>	
<li>
<a href="#">Master</a>
<ul>
<li><a href="?module=profil">Profil</a></li>
<li><a href="?module=users">Users</a></li>
<li><a href="?module=jenis">Jenis Simpanan</a></li>
<li><a href="?module=anggota">Anggota</a></li>
</ul>
</li>
<li>
<a href="#">Transaksi</a>
<ul>
<li><a href="?module=simpanan">Simpanan</a></li>
<li><a href="?module=penarikan">Penarikan</a></li>
<li><a href="?module=pinjaman">Pinjaman</a></li>
<li><a href="?module=bayar">Bayar Pinjaman</a></li>
</ul>
</li>
<li>
<a href="#">Laporan</a>
<ul>
<li><a href="?module=lap-anggota">Anggota</a></li>
<li><a href="?module=lap-simpanan">Simpanan</a></li>
<li><a href="?module=lap-pinjaman">Pinjaman</a></li>
<li><a href="?module=lap-kreditmacet">Kredit Macet</a></li>
<li><a href="?module=lap-kegiatan">Daily Activity</a></li>
</ul>
</li>
<li><a href="logout.php">Keluar</a></li>
</ul>
<?php }else{ ?>
<ul class="sf-menu">
<li><a href="?module=home">Home</a></li>	
<li>
<a href="#">Master</a>
</li>
<li>
<a href="#">Transaksi</a>
<ul>
<li><a href="?module=simpanan">Simpanan</a></li>
<li><a href="?module=penarikan">Penarikan</a></li>
<li><a href="?module=pinjaman">Pinjaman</a></li>
<li><a href="?module=bayar">Bayar Pinjaman</a></li>
</ul>
</li>
<li>
<a href="#">Laporan</a>
<ul>
<li><a href="?module=lap-anggota">Anggota</a></li>
<li><a href="?module=lap-simpanan">Simpanan</a></li>
<li><a href="?module=lap-pinjaman">Pinjaman</a></li>
<li><a href="?module=lap-kreditmacet">Kredit Macet</a></li>
<li><a href="?module=lap-kegiatan">Daily Activity</a></li>
</ul>
</li>
<li><a href="logout.php">Keluar</a></li>
</ul>
<? } ?>