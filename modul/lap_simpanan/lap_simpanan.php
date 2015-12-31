<script language="javascript" src="modul/lap_simpanan/ajax.js"></script>
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
<script type="text/javascript">
    $(function() {
        $("#theTable tr:even").addClass("stripe1");
        $("#theTable tr:odd").addClass("stripe2");

        $("#theTable tr").hover(
            function() {
                $(this).toggleClass("highlight");
            },
            function() {
                $(this).toggleClass("highlight");
            }
        );
    });
    function deleteRow(ID) {
        var id	= ID;
        var cari = $("#nomor").val();
        var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
        if (pilih==true) {
            $.ajax({
                type	: "POST",
                url		: "modul/simpanan/hapus.php",
                data	: "id="+id,
                success	: function(data){
                    $("#tampil_data1").load("modul/simpanan/tampil_data1.php?cari="+cari);
                }
            });
        }
    }
</script>
<div id='dalam_content' align='center'>
<h2>LAPORAN SALDO SIMPANAN ANGGOTA</h2>

<table width='50%'>
<tr>
	<td><input type='radio' name='pilih' class='pilih' value='semua' checked>Semua Data</td>
	<td></td>
</tr>
<tr>
	<td><input type='radio' name='pilih' class='pilih' value='pilih'>Pilih Nomor Anggota</td>
	<td><input type='text' name='anggota1' id='anggota1' size='10'> &nbsp; s/d &nbsp;
	<input type='text' name='anggota2' id='anggota2' size='10'>
	</td>
</tr>
</table>
<div id='menu-tombol'>
<button class='ui-state-default ui-corner-all' id='cetak'>
<span class='ui-icon ui-icon-print'></span>Cetak
</button>
</div>
</div>

<table id='theTable' width='100%'>
    <tr>
        <th width='5%'>No</th>
        <th>Tanggal</th>
        <th>Simpanan</th>
        <th>Jumlah</th>
        <th>Hapus</th>
    </tr>
    <?php
    $sql	= "SELECT a.*,b.jenis_simpanan
    FROM simpanan as a
    JOIN jenis_simpanan as b
    ON a.id_jenis=b.id_jenis
    ORDER BY a.id_simpanan DESC";
    $query	= mysql_query($sql);

    $no=1;
    $gtotal = 0;
    while($rows=mysql_fetch_array($query)){
    ?>
<tr>
        <td align='center'><?php echo $no; ?></td>
        <td align='center'><?php echo $rows['tgl'] ?></td>
        <td><?php echo $rows['jenis_simpanan'];  ?></td>
        <td align='right'><?php echo $rows['jumlah']; ?></td>
        <td align='center'>
            <a href='javascript:deleteRow("<?php echo $rows['id_simpanan'] ?>")'>Hapus</a>
        </td>
    </tr>
    <?php
    $no++;
    $gtotal = $gtotal+$rows['jumlah'];
    }
    ?>
    <tr>
        <td colspan='3' align='center'>Total</td>
        <td align='right'><b><?php echo number_format($gtotal); ?></b></td>
</table>";

