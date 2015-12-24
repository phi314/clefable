// JavaScript Document
$(document).ready(function(){
	
	$("#nomor").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
		carianggota();
	});
	
	function carianggota(){
		var id = $("#nomor").val();
		$.ajax({
			type	: "POST",
			url		: "modul/anggota/cari.php",
			data	: "id="+id,
			dataType : "json",
			success	: function(data){
				$("#identitas").val(data.id);
				$("#anggota").val(data.nama);
				$("#jk").val(data.jk);
				$("#tempat").val(data.tempat);
				$("#tgl").val(data.tgl);
				$("#alamat").val(data.alamat);
				$("#hp").val(data.hp);
			}
		});
	}
	
	$("#hp").keypress(function (data)  { 
		if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
	          alert('harus angka');
			  return false;
		}
	});
	$("#tgl").datepicker({
			dateFormat:"dd-mm-yy",
			changeYear : true,
			changeMonth:true,
    });
	
	tampil_data();
	function tampil_data(){
		$("#tampil_data").load('modul/anggota/tampil_data.php');
		$('#form_input').hide();
		$('#tampil_data').show();
		$('#menu-tombol').show();
	}
	$('#tambah').click(function(){										
		$(".input").val('');		
		$("#nomor").attr("disabled",false);
		//$('#form_input').dialog('open');
		$('#form_input').show();
		$('#tampil_data').hide();
		$('#menu-tombol').hide();
		$("#nomor").focus();
		return false;
	});
	
	$("#simpan").click(function(){
		simpan();
	});	
	
	function simpan(){
		var no		= $("#nomor").val();
		var id		= $("#identitas").val();
		var nama	= $("#anggota").val();
		var jk		= $("#jk").val();
		var tempat	= $("#tempat").val();
		var tgl		= $("#tgl").val();
		var alamat	= $("#alamat").val();
		var hp		= $("#hp").val();

		if(no.length==0){
			alert('Maaf, Nomor Anggota tidak boleh kosong');
			$("#nomor").focus();
			return false();
		}
		if(id.length==0){
			alert('Maaf, Nomor Identitas tidak boleh kosong');
			$("#identitas").focus();
			return false();
		}
		if(nama.length==0){
			alert('Maaf, Nama Anggota tidak boleh kosong');
			$("#anggota").focus();
			return false();
		}
		$.ajax({
			type	: "POST",
			url		: "modul/anggota/simpan.php",
			data	: "no="+no+
					"&id="+id+
					"&nama="+nama+
					"&jk="+jk+
					"&tempat="+tempat+
					"&tgl="+tgl+
					"&alamat="+alamat+
					"&hp="+hp,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data,
					timeout:2000,
					showType:'show'
				});
			}
		});
	}
	$("#cari").click(function(){
		var cari = $("#txt_cari").val();
		cariData(cari);
	});
	
	function cariData(e){
		var cari = e;
		$.ajax({
			type	: "GET",
			url		: "modul/anggota/tampil_data.php",
			data	: "cari="+cari,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
	}
	
	$("#tutup").click(function(){
		$('#form_input').hide();
		$('#tampil_data').show();
		$('#menu-tombol').show();
	});
});