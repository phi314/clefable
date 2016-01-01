// JavaScript Document
$(document).ready(function(){

    $.ajax({
        type	: "POST",
        url		: "modul/lap_peramalan/tampil_data1.php",
        data	: {
                    n: 3
        },
        success	: function(data){
            $("#tampil_data1").html(data);
        }
    });

	$("#tgl1").datepicker({
			dateFormat:"dd-mm-yy"        
    });
	$("#tgl2").datepicker({
			dateFormat:"dd-mm-yy"        
    });

	$("#cetak").click(function(){
		var bulan_from 	= $('#bulan_from').val();
		var tahun_from 	= $('#tahun_from').val();
		var bulan_to 	= $('#bulan_to').val();
		var tahun_to 	= $('#tahun_to').val();
		var n 	= $('#n').val();

        $.ajax({
            type	: "POST",
            url		: "modul/lap_peramalan/tampil_data1.php",
            data	: {
                bulan_from: bulan_from,
                tahun_from: tahun_from,
                bulan_to: bulan_to,
                tahun_to: tahun_to,
                n: n
            },
            success	: function(data){
                $("#tampil_data1").html(data);
            }
        });
	});

});