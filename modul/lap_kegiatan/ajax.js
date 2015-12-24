// JavaScript Document
$(document).ready(function(){
	$("#nomor").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});

	$("#tgl").datepicker({
			dateFormat:"dd-mm-yy"        
    });
	$("#lihat").click(function(){
		var tgl = $("#tgl").val();
		var nomor = $("#nomor").val();

		if(tgl.length==0){
			alert('Maaf, Tanggal tidak boleh kosong');
			$("$tgl").focus();
			return false();
		}
	
		$.ajax({
			type	: "POST",
			url		: "modul/lap_kegiatan/tampil_data.php",
			data	: "tgl="+tgl+"&nomor="+nomor,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
	});
	
	$("#cetak").click(function(){
		var tgl = $("#tgl").val();
		var nomor = $("#nomor").val();

		if(tgl.length==0){
			alert('Maaf, Tanggal tidak boleh kosong');
			$("$tgl").focus();
			return false();
		}
		
		window.open('modul/laporan/lap-kegiatan.php?tgl='+tgl+'&nomor='+nomor);	
	});
							   
});