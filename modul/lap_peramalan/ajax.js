// JavaScript Document
$(document).ready(function(){
	$("#tgl1").datepicker({
			dateFormat:"dd-mm-yy"        
    });
	$("#tgl2").datepicker({
			dateFormat:"dd-mm-yy"        
    });
	$("#cetak").click(function(){
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
		window.open('modul/laporan/lap-kreditmacet.php?pilih='+pilih+'&tgl1='+tgl1+'&tgl2='+tgl2);	
	});						   
});