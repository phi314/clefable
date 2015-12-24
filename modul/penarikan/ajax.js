// JavaScript Document
$(document).ready(function(){
	$(function(){
		$('button').hover(
			function() { $(this).addClass('ui-state-hover'); }, 
			function() { $(this).removeClass('ui-state-hover'); }
		);
	});
	$("#nomor").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	
	//$('#tabs').tabs();
	
	$("#tgl").datepicker({
			dateFormat:"dd-mm-yy"        
    });
	$("#tgl1").datepicker({
			dateFormat:"dd-mm-yy"        
    });
	$("#tgl2").datepicker({
			dateFormat:"dd-mm-yy"        
    });
	
	$("#jml").keypress(function (data)  { 
		if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
	          return false;
		}	
	});
	$("#simpan").click(function(){
		simpan();
	})
	function simpan(){
		var no		= $("#nomor").val();
		var tgl		= $("#tgl").val();
		var jenis	= $("#jenis").val();
		var jml		= $("#jml").val();
		var saldo	= $("#saldo").val();

		if(no.length==0){
			alert('Maaf, Nomor Anggota tidak boleh kosong');
			$("#nomor").focus();
			return false();
		}
		if(tgl.length==0){
			alert('Maaf, Tanggal tidak boleh kosong');
			$("#tgl").focus();
			return false();
		}
		if(jenis.length==0){
			alert('Maaf, Jenis Simpanan tidak boleh kosong');
			$("#jenis").focus();
			return false();
		}
		if(jml.length==0){
			alert('Maaf, Jumlah tidak boleh kosong');
			$("#jml").focus();
			return false();
		}
		if(saldo<jml){
			alert('Maaf, Saldo tidak mencukupi');
			$("#jml").focus();
			return false();
		}
		$.ajax({
			type	: "POST",
			url		: "modul/penarikan/simpan.php",
			data	: "no="+no+
					"&tgl="+tgl+
					"&jenis="+jenis+
					"&jml="+jml,
			success	: function(data){
				//$("#tampil_data1").html(data);
				$("#tampil_data1").load('modul/penarikan/tampil_data1.php?cari='+no);
				cariID();
				cariSaldo(no);
				cariAnggota(no);
			}
		});
	}
	
	function cariID(){
	$.ajax({
			type	: "POST",
			url		: "modul/penarikan/cari_id.php",
			dataType : "json",				  
			success	: function(data){
				$("#id").val(data.id);
				//alert('ID '+data.id);
			}
		});
	}
	$("#baru").click(function(){
		var cari ='';
		$(".input").val('');
		$("#id").val('AUTO');
		$("#nomor").focus();
		cariAnggota(cari);
		cariSimpananAnggota(cari);
	})
	$("#nomor").keyup(function(){
		var cari = $("#nomor").val();
		cariSaldo(cari);
		cariAnggota(cari);
		cariSimpananAnggota(cari);
	})
	function cariAnggota(e){
		var cari = e;
		$.ajax({
			type	: "POST",
			url		: "modul/penarikan/cari_anggota.php",
			data	: "cari="+cari,
			success	: function(data){
				$("#info_anggota").html(data);
			}
		});
	}
	function cariSimpananAnggota(e){
		var cari = e;
		$.ajax({
			type	: "GET",
			url		: "modul/penarikan/tampil_data1.php",
			data	: "cari="+cari,
			success	: function(data){
				$("#tampil_data1").html(data);
			}
		});
	}
	function cariSaldo(e){
		var cari = e;
		if(cari.length>3){
		$.ajax({
			type	: "POST",
			url		: "modul/penarikan/cari_saldo.php",
			data	: "cari="+cari,
			dataType: "json",
			success	: function(data){
				$("#saldo").val(data.saldo);
				//alert('Saldo '+data.saldo);
			}
		});
		}
	}
	$("#jenis").change(function(){
		var cari = $("#jenis").val();
		cariJenis(cari);
	})
	
	function cariJenis(e){
		var cari = e;
		$.ajax({
			type	: "POST",
			url		: "modul/penarikan/cari_jenis.php",
			data	: "cari="+cari,
			dataType: "json",
			success	: function(data){
				$("#jml").val(data.jml);
			}
		});
	}
	
	$("#cari2").click(function(){
		var tgl1 = $("#tgl1").val();
		var tgl2 = $("#tgl2").val();
		
		if(tgl1.length==0){
			alert('Maaf, Tanggal tidak boleh kosong');
			$("#tgl1").focus();
			return false();
		}
		if(tgl2.length==0){
			alert('Maaf, Tanggal tidak boleh kosong');
			$("#tgl2").focus();
			return false();
		}
		
		cariData2(tgl1,tgl2);
	});
	
	function cariData2(e1,e2){
		var tgl1 = e1;
		var tgl2 = e2;
		
		$.ajax({
			type	: "POST",
			url		: "modul/penarikan/tampil_data2.php",
			data	: "tgl1="+tgl1+"&tgl2="+tgl2,
			success	: function(data){
				$("#tampil_data2").html(data);
			}
		});
	}
	$("#cari3").click(function(){
		var cari = $("#txt_cari").val();
		cariData3(cari);
	});
	
	function cariData3(e){
		var cari = e;
		$.ajax({
			type	: "POST",
			url		: "modul/penarikan/tampil_data3.php",
			data	: "cari="+cari,
			success	: function(data){
				$("#tampil_data3").html(data);
			}
		});
	}
	
	$("#cetak").click(function(){
		var kode 	= $('#nomor').val();
		if(kode.length==0){
			alert('Maaf, Nomor Anggota tidak boleh kosong');
			$("#nomor").focus();
			return false();
		}
		window.open('modul/laporan/cetak-storan.php?kode='+kode);	
	});
});