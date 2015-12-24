<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login System</title>
<link rel="stylesheet" type="text/css" href="css/themes/cupertino/easyui.css">
<link rel="stylesheet" type="text/css" href="css/themes/icon.css">
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".text").val('');
		$("#username").focus();
	});
	function validasi(){
	var username = $("#username").val();
	var password = $("#password").val();
	  if (username.length == 0){
		alert("Anda belum mengisikan Username.");
		$("#username").focus();
		return false();
	  }		 
	  if (password.length == 0){
		alert("Anda belum mengisikan Password.");
		$("#password").focus();
		return false();
	  }
	  return true();
	}
</script>
<style type="text/css">
body {
	background:url(images/page_bg.jpg);
}
#body {
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	width:450px;
	margin:0px auto;
	margin-top:50px;
}
button {
	padding:5px;
}
h2 {
	line-height:10px;
}
</style>
</head>
<body>
<div id="body">
<center><h2>SISTEM INFORMASI KOPERASI</h2>
<h2>SIMPAN PINJAM</h2>
</center>
<div id="tt" class="easyui-tabs" style="width:450px;">
	<div title="Login" style="padding:20px">
    <form name="login" action="cek_login.php" method="POST" onSubmit="return validasi(this)" style="padding:5px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td>
    <div align="center">
    <table cellpadding="0" cellspacing="0">
    <tr>
    <td height="25">Username</td>
    <td>&nbsp;:&nbsp;<input type="text" name="username"  class="text" id="username" /></td>
    </tr>
    <tr>
    <td height="26">Password</td>
    <td>&nbsp;:&nbsp;<input type="password" class="text" name="password" id="password" /></td>
    </tr>
    <tr>
    <td colspan="2">
    <div align="right">
    <button type="submit" name="submit" class="easyui-linkbutton" data-options="iconCls:'icon-ok'">Login
    </button>
    </div>
    </td>
    </tr>
    </table>
    </div>
    </td>
    </tr>
    </table>
	</form>
    </div>
</div>
</div>
</body>
</html>