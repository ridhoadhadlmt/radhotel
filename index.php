<?php

session_start();
include 'header.php';
include 'koneksi.php';
include 'function.php';

$table_kamar = 'kamar';
$field_kamar = '*';
$exe_kamar = getKamar($table_kamar,$field_kamar); 

$table_destinasi = 'destinasi';
$field_destinasi = '*';
$exe_destinasi = getDestinasi($table_destinasi,$field_destinasi); 

$table_menu = 'menu';
$field_menu = '*';
$exe_menu = getMenu($table_menu,$field_menu); 







?>

<div class="rh-carousel-area">
  <div class="slick-home">
    <div class="slick-item">
      <div class="slick-img">
        <img src="assets/images/carousel/carousel-1.jpg">
      </div>

    </div>
    <div class="slick-item">
      <div class="slick-img">
        <img src="assets/images/carousel/carousel-2.jpg">
      </div>
      
    </div>
    <div class="slick-item">
      <div class="slick-img">
        <img src="assets/images/carousel/carousel-3.jpg">
      </div>
      
    </div>
    <div class="slick-item">
      <div class="slick-img">
        <img src="assets/images/carousel/carousel-4.jpg">
      </div>
      
    </div>
  </div>
</div>

<div class="rh-reservation-area">
  <div class="container col-md-11">
    <form action="search-kamar.php?" class="form-area mb-0" method="GET">
      <div class="row">
        <div class="col-md-2">
          <div class="tipe-area">
            <div class="form-group">
              <select class="select form-control" id="tipe_kamar" name="nama">
                <option value="">Tipe Kamar</option>
                <?php
                  $sql_tipe = "SELECT * FROM kamar JOIN tipe_kamar ON kamar.id_kamar = tipe_kamar.id_tipe";
                  $exe_tipe = mysqli_query($koneksi,$sql_tipe);
                  
                  foreach($exe_tipe as $tipe){?>
                  <option value="<?= $tipe['nama']?>"><?= $tipe['nama'];?></option>
                <?php }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="checkin-area">
            <div class="form-group">
              <div class="icon"><i class="ion ion-md-calendar"></i></div>
              <input type="text" id="date" autocomplete="off" name="checkin" class="form-control"  placeholder="Check-in">
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="checkout-area">
            <div class="form-group">
              <div class="icon"><i class="ion ion-md-calendar"></i></div>
                <input type="text" id="date" autocomplete="off" name="checkout" class="form-control"  placeholder="Check-out">
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <select name="tamu" id="tamu" class="select form-control">
              <option value="1">1 Tamu</option>
              <option value="2">2 Tamu</option>
              <option value="3">3 Tamu</option>
              <option value="4">4 Tamu</option>
              <option value="5">5 Tamu</option>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <select name="kamar" id="kamar" class="select form-control">
              <option value="1">1 Kamar</option>
              <option value="2">2 Kamar</option>
              <option value="3">3 Kamar</option>
              <option value="4">4 Kamar</option>
              <option value="5">5 Kamar</option>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <div class="search-area">
              <button class="btn btn-search">Check</button>
            </div>
          </div>
        </div>
      </div>    
    </form>
  </div>
</div>

<div class="rh-destination-area">
  <div class="container col-md-11">
    <div class="row">
      <div class="col-md-4">
        <div class="rh-destination-text">
          <h1>Destinasi</h1>
          <h6>Destinasi terbaik di kota Medan</h6>
          <p>Banyak tempat destinasi yang bisa kamu kunjungi di kota Medan dan sekitarnya</p>
          <a href="" class="btn btn-md btn-detail">Lihat Semua</a>
        </div>
      </div>
      <div class="col-md-8">
        <div class="rh-destination-list">
          <div class="slick-destination">
            <?php
              foreach($exe_destinasi as $destinasi):
            ?>
            <a href="destinasi.php?nama_destinasi=<?= $destinasi['nama_destinasi'] ?>">

              <div class="slick-item">
                <div class="slick-img">
                  <img src="assets/images/destinasi/<?= $destinasi['gambar'];?>">
                </div>
                <div class="slick-text">
                  <p class="text-black"><?= $destinasi['nama_destinasi'];?></p>
                </div>
              </div>
            </a>
            <?php
              endforeach;
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="rh-menu-area">
  <div class="container col-md-11">
    <div class="row">
      <div class="col-md-8">
        <div class="rh-menu-list">
          <div class="slick-menu">
            <?php
              foreach($exe_menu as $menu):
            ?>
            <div class="slick-item">
              <div class="slick-img">
                <img src="assets/images/menu/<?= $menu['gambar'];?>">
              </div>
              <div class="slick-text">
                <p class=""><?= $menu['nama_menu'];?></p>
              </div>
            </div>
            <?php
              endforeach;
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="rh-menu-text">
          <h1>Makanan dan Minuman</h1>
          <h6>Makanan lezat dan minuman segar</h6>
          <p>Kami menyediakan menu terbaik makanan dan minuman dari luar negeri maupun tradisional</p>
          <a href="" class="btn btn-md btn-detail">Lihat Semua</a>
        </div>
      </div>
    </div>
  </div>
</div>






<?php
include 'footer.php';
?>
