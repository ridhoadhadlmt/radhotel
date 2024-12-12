<?php 
include '../koneksi.php';
include '../function.php';

if(isset($_GET['q'])){
  $q = $_GET['q'];
}
else{
  $q = null;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin - RADHOTEL</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/nice-select.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
</head>
<body>
<div class="d-flex main-wrapper" id="">
  <div class="sidebar-wrapper fixed-top">
    <div class="sidebar-logo">
      <a href="index.php" class="">RADHOTEL</a> 
    </div>
    <div class="sidebar-profile">
      <div class="profile-img">
        <img src="../assets/images/profile/person2.jpg" class="rounded-circle" width="50" height="50">
      </div>
      <div class="profile-info">
        <div class="name"><span>Ridho Adha</span></div>
        <div class="level"><span>Admin</span></div>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a href="index.php"><i class="ion ion-md-pie"></i> Dashboard</a>
        </li>
        <li class="nav-item" data-toggle="collapse" href="#kamar" role="button" aria-expanded="false" aria-controls="kamar">
          <a class="nav-link">Kamar 
            <span class="float-right"><i class="ion ion-ios-arrow-down"></i></span>
          </a>
          <li class="collapse nav-item-child" id="kamar">
            <a href="index.php?q=kamar" class="nav-link"><i class=""></i> List</a>
            <a href="index.php?q=tipe_kamar" class="nav-link"><i class=""></i> Tipe Kamar</a> 
          </li>
        </li>
        <li class="nav-item" data-toggle="collapse" href="#menu" role="button" aria-expanded="false" aria-controls="menu">
          <a class="nav-link">Menu 
          <span class="float-right"><i class="ion ion-ios-arrow-down"></i></span>
          </a>
          <li class="collapse nav-item-child" id="menu">
            <a href="index.php?q=menu" class="nav-link"><i class=""></i> List</a>
          </li>
        </li>
        <li class="nav-item" data-toggle="collapse" href="#destinasi" role="button" aria-expanded="false" aria-controls="destinasi">
          <a class="nav-link">Destinasi 
          <span class="float-right"><i class="ion ion-ios-arrow-down"></i></span>
          </a>
          <li class="collapse nav-item-child" id="destinasi">
            <a href="index.php?q=destinasi" class="nav-link"><i class=""></i> List</a>
          </li>
        </li>
      </ul>

    </div>
  </div>

  <div class="main-content">
    <div class="main-header">
      <nav class="navbar navbar-expand-md fixed-top">
        <button class="btn btn-toggle"><i class="ion ion-md-menu"></i></button>
        <form method="GET" action="" class="form-search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari" name="">
            <div class="input-group-append">
              <button class="btn btn-cari"><i class="ion ion-ios-search"></i></button>
            </div>
          </div>
        </form>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="" class="nav-link"><i class="ion ion-md-mail"></i></a></li>
          <li class="nav-item"><a href="" class="nav-link"><i class="ion ion-md-notifications"></i></a></li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link" data-toggle="dropdown"><i class="ion ion-md-person"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
             <a href="../logout.php" class="dropdown-item">Keluar</a> 
            </div>
          </li>
        </ul> 
      </nav>
    </div>
    <div class="main-body">
      <?php
        if($q == null){
          include 'dashboard.php';
        }
        else{
          if($q == 'kamar'){
            include 'tbl_kamar.php';
          }
          if($q == 'tipe_kamar'){
            include 'tbl_tipe.php';
          }
          if($q == 'destinasi'){
            include 'tbl_destinasi.php';
          }
          if($q == 'menu'){
            include 'tbl_menu.php';
          }
          if($q == 'kategori_menu'){
            include 'kategori_menu.php';
          }
        }

      ?>
    </div>
  </div>

</div>
<script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="../assets/js/sweetalert2.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.nice-select.min.js"></script>
<script type="text/javascript" src="../assets/js/admin.js"></script>
</body>  
</html>

