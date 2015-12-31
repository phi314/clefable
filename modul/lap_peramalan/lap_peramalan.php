<script language="javascript" src="modul/simpanan/ajax.js"></script>
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
#menu-tombol {
	padding-bottom:10px;
	padding:5px 5px 5px 5px;
	margin-bottom:20px;
}
#tombol-tambah{
	float:left;
	width:250px;
}
#tombol-cari{
	float:right;
	width:500px;
	text-align:right;
}
#tampil_data2,#tampil_data3{
	margin-top:30px;
}
/*
#info_anggota{
	position:absolute;
	padding:5px 5px 5px 5px;
	background-color:#FFF;
	width:450px;
	border:3px solid #5c9fe9;
	-moz-border-radius: 5px 5px 5px 5px; 
	-webkit-border-radius: 5px 5px 5px 5px; 
	border-radius: 5px 5px 5px 5px; 
	-moz-box-shadow:0px 0px 20px #aaa;
    -webkit-box-shadow:0px 0px 20px #aaa;
    box-shadow:0px 0px 20spx #aaa;
	z-index:200px;
	float:right;
	left:350px;
}
*/
</style>
<div id='dalam_content'>


    <?php
    // hitungan bulanan
    $n = 3;
    ?>



</div>

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
    <h2>PERAMALAN</h2>

    <table>
        <tr>
            <td>
                <select name="bulan_from">
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <input type="text" name="tahun_from" size="4" placeholder="tahun">
                &nbsp; s/d &nbsp;
                <select name="bulan_to">
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <input type="text" name="tahun_to" size="4" placeholder="tahun">
            </td>
        </tr>
        <tr>
            <td align="center">
                <label>Per</label>
                <input type="number" name="n" value="1"> Bulan
            </td>
        </tr>
    </table>
    <div id='menu-tombol'>
        <button class='ui-state-default ui-corner-all' id='cetak'>
            <span class='ui-icon ui-icon-print'></span> Hitung Peramalan
        </button>
    </div>
</div>

<?php

    function getMonth($date){
        return substr($date, 5, 2);
    }

    $from = "2012-04-23";
    $to = "2015-12-23";

    $from_month = new DateTime($from);
    $to_month = new DateTime($to);

    $date_diff = date_diff($from_month, $to_month);

    $total_month = ($date_diff->y * 12) + $date_diff->m;

    // simpanan from month to month
    $q = mysql_query("SELECT sum(jumlah), tgl FROM simpanan WHERE tgl>='$from' AND tgl<='$to' GROUP BY MONTH(tgl)");

    while($data = mysql_fetch_object($q))
    {
        dump($data);
    }


?>

<br>
--------------------------------------------
<br>


<table id="theTable" width="100%">
    <thead>
    <tr>
        <th>Bulan</th>
        <th>Modal</th>
        <th>Forecast Ave. <?php echo $n; ?></th>
        <th>Error</th>
        <th>Error<sup>2</sup></th>
    </tr>
    </thead>
    <tbody>
    <?php

    $array_bulan = [
        51735500,
        40952000,
        34511500,
        40952000,
        49133500,
        34856000,
        35519000,
        36852000,
        36199500
    ];


    $error_quadrat_total = 0;
    $count_rmse = count($array_bulan)-$n+1;

    $no = 1;

    for($t = 0; $t < $n; $t++):

        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $array_bulan[$t]; ?></td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>

    <?php
    endfor;

    for($i = 0; $i < $count_rmse; $i++)
    {
        $yt = 0;

        for($j = 0; $j < $n; $j++)
        {
            $yt = $yt + $array_bulan[$j+$i];

        }

        // peramalan modal
        $pm = !empty($array_bulan[$n+$i]) ? $array_bulan[$n+$i] : 0;

        $yt = round($yt/$n, 3);

        $error = $pm - $yt;
        $error = round($error, 3);

        $error_quadrat = !empty($array_bulan[$n+$i]) ? round($error*$error) : 0;

        $error_quadrat_total = $error_quadrat_total + $error_quadrat;

        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $pm; ?></td>
            <td><?php echo $yt; ?></td>
            <td><?php echo $pm == 0 ? 0 : $error; ?></td>
            <td><?php echo $pm == 0 ? 0 : number_format($error_quadrat, 0, "", ""); ?></td>
        </tr>
    <?php
    }


    ?>

    </tbody>
    <tfoot>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>Jumlah</td>
        <td>
            <?php
            echo number_format($error_quadrat_total, 0, "", "");
            ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>RMSE</td>
        <td>
            <?php
            $RMSE = $error_quadrat_total / ($count_rmse-1);
            $RMSE = round(sqrt($RMSE), 3);

            echo $RMSE;
            ?>
        </td>
    </tr>
    </tfoot>
</table>




