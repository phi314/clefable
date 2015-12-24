// JavaScript Document
$(document).ready(function(){
	$(function(){
		$('button').hover(
			function() { $(this).addClass('ui-state-hover'); }, 
			function() { $(this).removeClass('ui-state-hover'); }
		);
	});
	$('#simpan').click(function(){
		simpan();
	});
	function simpan(){
		var id		= $("#id").val();
		var koperasi= $("#koperasi").val();
		var alamat		= $("#alamat").val();
		var kota		= $("#kota").val();
		var hp		= $("#hp").val();
		var fax		= $("#fax").val();
		var email		= $("#email").val();
		
		if(id.length==0){
			alert('Maaf, ID tidak boleh kosong');
			$("#id").focus();
			return false();
		}
		if(koperasi.length==0){
			alert('Maaf, Koperasi tidak boleh kosong');
			$("#koperasi").focus();
			return false();
		}
		$.ajax({
			type	: "POST",
			url		: "modul/profil/simpan.php",
			data	: "id="+id+
					"&koperasi="+koperasi+
					"&alamat="+alamat+
					"&kota="+kota+
					"&hp="+hp+
					"&fax="+fax+
					"&email="+email,
			success	: function(data){
				alert('Data Sukses Disimpan');
				//$("#error").html(data);
			}
		});
	}
});