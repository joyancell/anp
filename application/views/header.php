<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pemilihan Wisata Terbaik</title>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datepicker.min.css">
  <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/dataTables.bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.toastmessage.css"/>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
  <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/sweetalert.css">
  <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <script src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.11.3.min.js"></script>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            <li role="presentation"><a href="<?php echo base_url() ?>Wisata">Wisata</a></li>
            <li role="presentation"><a href="<?php echo base_url() ?>Kriteria">Kriteria</a></li>
            <li role="presentation"><a href="<?php echo base_url() ?>Nilai">Skala Dasar ANP</a></li>
            <li role="presentation"><a href="<?php echo base_url() ?>Nilai_awal">Nilai Awal</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Perbandingan <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li role="presentation"><a href="<?php echo base_url() ?>Analisa_kriteria">Kriteria</a></li>
                <li role="presentation"><a href="<?php echo base_url() ?>Analisa_alternatif">Alternatif</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li role="presentation"><a href="<?php echo base_url() ?>Hasil_akhir">Hasil Akhir</a></li>
                <li role="presentation"><a href="<?php echo base_url() ?>Ranking">Usulan</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle text-red text-bold" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('nama_lengkap') ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>Profil">Profil</a></li>
                <li role="separator" class="divider"></li>
                <li><a onclick="return confirm('yakin ingin keluar?')" href="<?php echo base_url() ?>Profil/logout">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>