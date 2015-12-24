<?php
$level = $_SESSION['level'];
if($level=='super admin'){
?>
<div class="easyui-accordion" style="float:left;width:170px;color:#FFF;">
<div title="Master" data-options="iconCls:'icon-tip'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
        <li data-options="iconCls:'icon-new'">
        <a href="?module=profil">Profil</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=users">Pengguna</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=jenis">Jenis Simpanan</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=anggota">Anggota</a>
        </li>
	</ul>      
</div>
<div title="Transaksi" data-options="iconCls:'icon-tip'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
        <li data-options="iconCls:'icon-new'">
        <a href="?module=simpanan">Simpanan</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=penarikan">Penarikan</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=pinjaman">Pinjaman</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=bayar">Bayar Pinjaman</a>
        </li>
	</ul>
</div>
<div title="Laporan" data-options="iconCls:'icon-print'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-anggota">Anggota</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-simpanan">Simpanan</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-pinjman">Pinjaman</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-kreditmacet">Hutang Anggota</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-kegiatan">Kegiatan Sehari-hari</a>
        </li>
	</ul>
</div>
</div>
<?php
}else{
?>
<div class="easyui-accordion" style="float:left;width:170px;color:#FFF;">
<div title="Transaksi" data-options="iconCls:'icon-tip'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
        <li data-options="iconCls:'icon-new'">
        <a href="?module=simpanan">Simpanan</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=penarikan">Penarikan</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=pinjaman">Pinjaman</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=bayar">Bayar Pinjaman</a>
        </li>
	</ul>
</div>
<div title="Laporan" data-options="iconCls:'icon-print'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-anggota">Anggota</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-simpanan">Simpanan</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-pinjman">Pinjaman</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-kreditmacet">Hutang Anggota</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-kegiatan">Kegiatan Sehari-hari</a>
        </li>
	</ul>
</div>
</div>
<?php } ?>
