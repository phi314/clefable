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
                    Bulan <?php echo getBulan(date("m", strtotime("+1 month"))); ?>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <label>Per</label>
                    6 Bulan
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="tampil_data1"></div>

