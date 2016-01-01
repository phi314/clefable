<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sistem Informasi Koperasi Simpan Pinjam</title>
    <link rel="stylesheet" href="css/style_content.css" type="text/css"/>
    <link rel="stylesheet" href="css/style_table.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/themes/cupertino/easyui.css">
    <link rel="stylesheet" type="text/css" href="css/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="css/ui/themes/base/jquery.ui.all.css">

    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/jquery.easyui.min.js"></script>

    <script type="text/javascript" src="js/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="js/jquery.ui.core.js"></script>
    <script type="text/javascript" src="js/ui.datepicker-id.js"></script>
    <script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>
    <style type="text/css">
    </style>
</head>
<body>
<div class="header" style="height:70px;background:white;padding:2px;margin:0;">
    <div style="float:left; padding:0px; margin:0px;">
        <img src='images/logo_koperasi_85.png' style="padding:0; margin:0;" width="85" height="71">
    </div>
    <div class="judul" style="float:left; line-height:3px; margin-top:0px; padding:2px 5px;">

        <h1> SISTEM INFORMASI KOPERASI </h1>
        <p><b>Koperasi Simpan Pinjam Rajawali Citra Mandiri</b></p>
        <p>Desa Cikampek Utara, Kecamatan Kotabaru, Kabupaten Karawang</p>;


    </div>
    <div style="float:right; line-height:3px; text-align:center;">
        <br /><br />
        <h1>APLIKASI KOPERASI</h1>
        <p>.:: Anggota - Simpanan - Pinjaman - Hutang Pinjaman ::.</p>
    </div>
</div>

<div class="panel-header" fit="true" style="height:21px;padding-top:1px;padding-right:20px">
    <div style="float:left;">
        <a style="color:#000;" href="?module=home" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-home">Home</a>
        <a style="color:#000;" href="logout.php" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-logout">Logout</a>
    </div>
</div>
<!-- awal kiri -->
<div id="kiri" style="float:left;;">
    <div id="Profil" class="easyui-panel" title="Profil Pengguna" style="float:left;width:170px;height:90px;padding:5px;">
        <img style="float:left;padding:2px;" src="foto/<?php echo $_SESSION['foto'];?>" width="50" height="50" align="middle" />
        <p style="line-height:15px;">
            <b> <?php echo $_SESSION['namalengkap'];?> </b><br />
            <a href="?module=edit_profil">Edit Profil</a>
        </p>
    </div>
    <?php include 'menu_new.php';?>
</div>
<div id="tt" class="easyui-tabs" style="height:570px;">
    <div title="Pengguna : <?php echo $_SESSION['namalengkap'].' - '.$_SESSION['level'];?>" style="padding:5px">
        <?php include 'content.php'; ?>
    </div>
</div>

<div class="panel-header" fit="true" style="height:20px;text-align:center;">
    Copyright &copy; KOPERASI RAJAWALI CITRA MANDIRI Tahun 2015.
</div>
</body>
</html>