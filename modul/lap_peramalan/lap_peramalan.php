<script language="javascript" src="js/Chart.min.js"></script>
<script language="javascript" src="modul/lap_peramalan/ajax.js"></script>
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
</script>
<div id='dalam_content' align='center'>
    <h2>PERAMALAN</h2>

    <form action="modul/lap_peramalan/cetak.php" method="post" target="_blank">
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
</div>

<div id="tampil_data1"></div>

