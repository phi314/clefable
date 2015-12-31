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
<h2>PERAMALAN</h2>
<div class="easyui-tabs" style="width:auto;height:auto">
<div title="Info Kas" style="padding:10px">
	<div class="easyui-tabs" style="width:400px;height:auto;float:right;">
	<div id='info_anggota' title="Info Kas" style="padding:5px">
	</div>
	</div>	
	<div id="p" class="easyui-panel" title="Bulanan" style="float:left;width:650px;padding:5px;margin-buttom:10px;">

        <?php
            // hitungan bulanan
            $n = 3;
        ?>
        <table class="table">
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

        <?php dump(peramalan(3)); ?>

	</div>
<div id='tampil_data1'></div>
</div>

<div title="Pertanggal" style="padding:10px">
	<div id='menu-tombol'>
	<div id='tombol-cari'>
	Tanggal <input type='text' id='tgl1' size='12'> s/d <input type='text' id='tgl2' size='12'>
	<button class='ui-state-default ui-corner-all' id='cari2'>
	<span class='ui-icon ui-icon-search'></span>Cari
	</button>
	</div>
	</div>
	<div id='tampil_data2'></div>
</div>
<div title="Daftar Simpanan" style="padding:10px">
	<div id='menu-tombol'>
	<div id='tombol-cari'>
	<input type='text' id='txt_cari' size='30'>
	<button class='ui-state-default ui-corner-all' id='cari3'>
	<span class='ui-icon ui-icon-search'></span>Cari
	</button>
	</div>
	</div>
	<div id='tampil_data3'></div>
</div>

</div>
</div>