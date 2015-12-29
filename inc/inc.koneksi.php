<?php
$server = "localhost"; 
$username = "root";  
$password = ""; 
$database = "clefable_koperasi";

$konek = mysql_connect($server, $username, $password) or die ("Gagal konek ke server MySQL" .mysql_error());
$bukadb = mysql_select_db($database) or die ("Gagal membuka database $database" .mysql_error());

function dump($string)
{
    echo "<pre>";
    var_dump($string);
    echo "</pre>";
}

function peramalan($n = 3, $from = "", $to = "")
{
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
    $array_peramalan['tabel_peramalan'] = [];

    for($t = 0; $t < $n; $t++):
        $array = [
            $no,
            $array_bulan[$t],
            '-',
            '-',
            '-'
        ];
        array_push($array_peramalan, $array);

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
        $error = !empty($array_bulan[$n+$i]) ? round($error, 3) : 0;

        $error_quadrat = !empty($array_bulan[$n+$i]) ? round($error*$error) : 0;
        $error_quadrat = $pm == 0 ? 0 : number_format($error_quadrat, 0, "", "");

        $error_quadrat_total = $error_quadrat_total + $error_quadrat;

        $array = [
            $no,
            $pm,
            $yt,
            $error,
            $error_quadrat
        ];
        array_push($array_peramalan, $array);

    }

    $RMSE = $error_quadrat_total / ($count_rmse-1);
    $RMSE = round(sqrt($RMSE), 3);

    $array_peramalan['error_quadrat_total'] = $error_quadrat_total;
    $array_peramalan['RMSE'] = $RMSE;

    return $array_peramalan;


}
?>
