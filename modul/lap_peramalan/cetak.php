<script language="javascript" src="../../js/Chart.min.js"></script>
<h2>PERAMALAN</h2>

<form action="cetak.php" method="post">
<table>
    <tr>
        <td>
            <select name="bulan_from" id="bulan_from">
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
            <input type="text" name="tahun_from" size="4" placeholder="tahun" id="tahun_from">
            &nbsp; s/d &nbsp;
            <select name="bulan_to" id="bulan_to">
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
            <input type="text" name="tahun_to" size="4" placeholder="tahun" id="tahun_to">
        </td>
    </tr>
    <tr>
        <td align="center">
            <label>Per</label>
            <input type="number" name="n" value="1" id="n"> Bulan
        </td>
    </tr>
</table>
<div id='menu-tombol'>
    <button class='ui-state-default ui-corner-all' id='cetak'>
        <span class='ui-icon ui-icon-print'></span> Hitung Peramalan
    </button>
</div>
</form>
<?php
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';
// hitungan bulanan
$n = isset($_POST['n']) ? $_POST['n'] : 3;

function getBulan ($x) {
    if ($x == 1 ) {
        $bulan = "Januari"; }
    if ($x == 2 ) {
        $bulan = "Februari"; }
    if ($x == 3 ) {
        $bulan = "Maret"; }
    if ($x == 4 ) {
        $bulan = "April"; }
    if ($x == 5 ) {
        $bulan = "Mei"; }
    if ($x == 6 ) {
        $bulan = "Juni"; }
    if ($x == 7 ) {
        $bulan = "Juli"; }
    if ($x == 8 ) {
        $bulan = "Agustus"; }
    if ($x == 9 ) {
        $bulan = "September"; }
    if ($x == 10) {
        $bulan = "Oktober"; }
    if ($x == 11) {
        $bulan = "November"; }
    if ($x == 12) {
        $bulan = "Desember"; }
    return $bulan;
}


$array_bulan = [];

$bulan_from = !empty($_POST['bulan_from']) ? $_POST['bulan_from'] : '03';
$tahun_from = !empty($_POST['tahun_from']) ? $_POST['tahun_from'] : 2015;
$bulan_to = !empty($_POST['bulan_to']) ? $_POST['bulan_to'] : '12';
$tahun_to = !empty($_POST['tahun_to']) ? $_POST['tahun_to'] : 2015;

$from = $tahun_from."-".$bulan_from."-01";
$to = $tahun_to."-".$bulan_to."-31";

////$from = "2015-01-01";
////$to = "2015-12-31";
//
echo "Dari : ".$from;
echo "<br>";
echo "Sampai : ".$to;
echo "<br>";

$from_month = new DateTime($from);
$to_month = new DateTime($to);

$date_diff = date_diff($from_month, $to_month);

$total_month = ($date_diff->y * 12) + $date_diff->m;

// simpanan from month to month
$q = mysql_query("SELECT sum(jumlah) as jumlah, MONTH(tanggal) as bulan FROM kas WHERE tanggal>='$from' AND tanggal<='$to' GROUP BY MONTH(tanggal)");


if(mysql_num_rows($q) < $n*2)
{
    echo "Bulan yang memiliki nilai modal kurang dari ". $n;
}

while($data = mysql_fetch_array($q))
{
    $bulan = $data['bulan'];
    $q_pinjaman = mysql_query("SELECT sum(jumlah) as jumlah FROM pinjaman WHERE MONTH(tgl)='$bulan' GROUP BY MONTH(tgl)");
    $data_pinjaman = mysql_fetch_array($q_pinjaman);

    $q_kas = mysql_query("SELECT sum(jumlah) as jumlah FROM kas WHERE MONTH(tanggal)='$bulan' GROUP BY MONTH(tanggal)");
    $data_kas = mysql_fetch_array($q_kas);

    $total = $data['jumlah'] - $data_pinjaman['jumlah'] + $data_kas['jumlah'];

    $array = [
        'bulan'      => $bulan,
        'simpanan'  => $data['jumlah'],
        'pinjaman'  => $data_pinjaman['jumlah'],
        'kas'       => $data_kas['jumlah'],
        'total'     => $total
    ];

    $array_bulan[] = $array;
}

$array_bulan_kas = [];
foreach($array_bulan as $row)
{
    $array_bulan_kas[] = $row['kas'];
}

$array_bulan_default = $array_bulan;
$array_bulan = $array_bulan_kas;

?>

<br>
<script>

    var labels = [
        <?php
            foreach($array_bulan_default as $key1 => $bulan)
            {
                if($key1 < count($array_bulan_default) - $n+1)
                {
                    echo '"'.getBulan($bulan['bulan']);
                    echo $key1 == count($array_bulan_default) ? '"' : '",';
                }
            }
        ?>
    ];


    var modals = [
        <?php
            foreach($array_bulan_default as $key2 => $modal)
            {
                if($key2 > $n-1)
                {
                    echo $modal["kas"];
                    echo $key2 == count($array_bulan_default) ? '' : ',';
                }
            }
        ?>
    ];

    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData = {
        labels : labels,
        datasets : [
            {
                label: "Modal",
                fillColor : "rgba(151,187,205,0.2)",
                strokeColor : "rgba(151,187,205,1)",
                pointColor : "rgba(151,187,205,1)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "#fff",
                pointHighlightStroke : "rgba(151,187,205,1)",
                data : modals
            }
        ]

    }

    window.onload = function(){
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true
        });
    }


</script>

<div style="width:100%">
    <div>
        <canvas id="canvas" height="200" width="600"></canvas>
    </div>
</div>
<br>

<?php
{
?>
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

    /*
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
    */


    $error_quadrat_total = 0;
    $count_rmse = count($array_bulan)-$n+1;

    $no = 1;

//    for($t = 0; $t < $n; $t++):
//
//        ?>
<!--        <tr>-->
<!--            <td>--><?php //echo getBulan($array_bulan_default[$t]['bulan']); ?><!--</td>-->
<!--            <td>--><?php //echo $array_bulan[$t]; ?><!--</td>-->
<!--            <td>-</td>-->
<!--            <td>-</td>-->
<!--            <td>-</td>-->
<!--        </tr>-->
<!---->
<!--    --><?php
//    endfor;


    $no_bulan = 0;
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
            <td><?php echo getBulan($array_bulan_default[$no_bulan++]['bulan']);  ?></td>
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

<?php
}
?>


