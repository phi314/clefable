// JavaScript Document
$(document).ready(function(){
	$("#anggota1").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$("#anggota2").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$("#tgl1").datepicker({
			dateFormat:"dd-mm-yy"        
    });
	$("#tgl2").datepicker({
			dateFormat:"dd-mm-yy"        
    });
	$("#cetak").click(function(){
		var kode1 	= $('#anggota1').val();
		var kode2 	= $('#anggota2').val();
		var tgl1 	= $('#tgl1').val();
		var tgl2 	= $('#tgl2').val();
		var	pilih	= $(".pilih:checked").val();
		var jml_pilih = $(".pilih:checked");
		
		if(jml_pilih.length == 0){
           var error = true;
           alert("Maaf, Anda belum memilih");
		   //$("#txt_user").focus();
		   return (false);
         }
		window.open('modul/laporan/lap-pinjaman.php?kode1='+kode1+'&kode2='+kode2+'&pilih='+pilih+'&tgl1='+tgl1+'&tgl2='+tgl2);	
	});						   
});