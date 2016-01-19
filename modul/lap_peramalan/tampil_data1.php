<?php
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';
// hitungan bulanan
$n = 6;




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
//dump($from);
//dump($to);

$from_month = new DateTime($from);
$to_month = new DateTime($to);

$date_diff = date_diff($from_month, $to_month);

$total_month = ($date_diff->y * 12) + $date_diff->m;

// kas from month to month
$q = mysql_query("SELECT sum(jumlah) as jumlah, MONTH(tanggal) as bulan FROM kas WHERE tanggal >= NOW() - interval 12 month GROUP BY MONTH(tanggal) ORDER BY tanggal ASC");

while($data = mysql_fetch_array($q))
{
    $bulan = $data['bulan'];
    $q_pinjaman = mysql_query("SELECT sum(jumlah) as jumlah FROM pinjaman WHERE MONTH(tgl)='$bulan' GROUP BY MONTH(tgl)");
    $data_pinjaman = mysql_fetch_array($q_pinjaman);

    $total = $data['jumlah'] - $data_pinjaman['jumlah'];

    $array = [
        'bulan'     => $bulan,
        'kas'       => $data['jumlah'],
        'pinjaman'  => $data_pinjaman['jumlah'] == null ? 0 : $data_pinjaman['jumlah'],
        'total'     => $total
    ];

//    dump($array);

    $array_bulan[] = $array;
}

$array_bulan_kas = [];
foreach($array_bulan as $row)
{
    $array_bulan_kas[] = $row['kas'];
}

$array_bulan_default = $array_bulan;
$array_bulan = $array_bulan_kas;

//dump($array_bulan_default);

?>



<br>

<br>

<?php
$peramalan_array = [0, 0, 0, 0, 0, 0];
if(mysql_num_rows($q) > $n){
?>
<table id="theTable" width="100%">
    <thead>
    <tr>
        <th>Bulan</th>
        <th>Modal</th>
        <th>Peramalan</th>
<!--        <th>Error</th>-->
<!--        <th>Error<sup>2</sup></th>-->
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

    for($t = 0; $t < $n; $t++):

        ?>
        <tr>
            <td><?php echo getBulan($array_bulan_default[$t]['bulan']); ?></td>
            <td><?php echo $array_bulan[$t]; ?></td>
            <td>-</td>
<!--            <td>-</td>-->
<!--            <td>-</td>-->
        </tr>

    <?php
    endfor;


    $no_bulan = 6;
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

        $peramalan_array[] = $yt;

        ?>
        <tr>
            <td><?php echo isset($array_bulan_default[$no_bulan]['bulan']) ? getBulan($array_bulan_default[$no_bulan++]['bulan']) : "Februari";  ?></td>
            <td><?php echo $pm; ?></td>
            <td><?php echo $yt; ?></td>
<!--            <td>--><?php //echo $pm == 0 ? 0 : $error; ?><!--</td>-->
<!--            <td>--><?php //echo $pm == 0 ? 0 : number_format($error_quadrat, 0, "", ""); ?><!--</td>-->
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
<!--        <td>Jumlah</td>-->
<!--        <td>-->
<!--            --><?php
//            echo number_format($error_quadrat_total, 0, "", "");
//            ?>
<!--        </td>-->
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
<!--        <td>RMSE</td>-->
<!--        <td>-->
<!--            --><?php
//            $RMSE = $error_quadrat_total / ($count_rmse-1);
//            $RMSE = round(sqrt($RMSE), 3);
//
//            echo $RMSE;
//            ?>
<!--        </td>-->
    </tr>
    </tfoot>
</table>

<?php
}
?>

<script>

    <?php
        $penggajian_array = [];
        $q_penggajian = mysql_query("SELECT sum(jumlah) as jumlah FROM penggajian WHERE tanggal >= NOW() - interval 12 month GROUP BY MONTH(tanggal) ORDER BY tanggal ASC");
        while($data_penggajian = mysql_fetch_object($q_penggajian))
        {
            $penggajian_array[] = $data_penggajian->jumlah;
        }
    ?>

    var labels = [
        <?php
            foreach($array_bulan_default as $key1 => $bulan)
            {
                echo '"'.getBulan($bulan['bulan']);
                echo $key1 == count($array_bulan_default) ? '"' : '",';
            }
        ?>
    ];


    var modals = [
        <?php
            foreach($array_bulan_default as $key2 => $modal)
            {
                echo $modal["kas"];
                echo $key2 == count($array_bulan_default) ? '' : ',';
            }
        ?>
    ];

    var peramalan = [
        <?php
            foreach($peramalan_array as $key3 => $peramalan)
            {
                echo $peramalan;
                echo $key3 == count($peramalan_array) ? '' : ',';
            }
        ?>
    ];

    var penggajian = [
        <?php
            foreach($penggajian_array as $key4 => $penggajian)
            {
                echo $penggajian;
                echo $key4 == count($penggajian_array) ? '' : ',';
            }
         ?>
    ]



    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData = {
        labels : labels,
        datasets : [
            {
                label: "Modal",
                fillColor : "rgba(220,20,60,0)",
                strokeColor : "rgba(220,20,60,1)",
                pointColor : "rgba(220,20,60,1)",
                pointStrokeColor : "#DC143C",
                pointHighlightFill : "#DC143C",
                pointHighlightStroke : "rgba(220,20,60,1)",
                data : modals
            },
            {
                label: "Peramalan",
                fillColor : "rgba(161,122,205,0)",
                strokeColor : "rgba(161,203,205,1)",
                pointColor : "rgba(0,255,0,1)",
                pointStrokeColor : "#00FF00",
                pointHighlightFill : "#00FF00",
                pointHighlightStroke : "rgba(230,187,205,1)",
                data : peramalan
            },
            {
                label: "Penggajian",
                fillColor : "rgba(61,222,205,0)",
                strokeColor : "rgba(31,203,205,1)",
                pointColor : "rgba(81,192,205,1)",
                pointStrokeColor : "#555",
                pointHighlightFill : "#888",
                pointHighlightStroke : "rgba(23,187,205,1)",
                data : penggajian
            }
        ]

    }

    window.onload = function(){
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true,
            tooltipFillColor: "rgba(0,0,0,0.8)",
            multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
        });
    }


</script>

<div style="width:100%; margin-top: 50px">
    <div>
        <canvas id="canvas" height="200" width="600"></canvas>
    </div>
</div>


