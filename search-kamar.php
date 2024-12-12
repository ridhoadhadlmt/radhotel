<?php

session_start();

include 'header.php';
include 'koneksi.php';
include 'function.php';

$cari = $_GET['tipe_kamar'];

$hasil_cari = mysqli_query($koneksi,"SELECT * FROM kamar JOIN tipe_kamar ON kamar.id_tipe = tipe_kamar.id_tipe WHERE tipe_kamar = '$cari'");
$sql_tipe = mysqli_query($koneksi,"SELECT * FROM kamar JOIN tipe_kamar ON kamar.id_tipe = tipe_kamar.id_tipe");
$semua_kamar = mysqli_query($koneksi,"SELECT * FROM kamar JOIN tipe_kamar ON kamar.id_tipe = tipe_kamar.id_tipe");

?>

<div class="radhotel-search pt-3 pb-3 mt-2">
  <div class="container col-md-11">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
          <form action="" method="GET" class="pt-3 pb-3">
       <h4 class="text-left">Cari</h4>
         <div class="form-group">
          <div class="form-field">
          <select class="select form-control"  name="tipe_kamar">
            <option value="">Tipe Kamar</option>
            <?php
            foreach($sql_tipe as $tipe){?>
            <option value="<?= $tipe['tipe_kamar']?>"><?= $tipe['tipe_kamar'];?></option>
            <?php }
            ?>
          </select>
          </div>
          </div>
        <div class="row" style="">
         <div class="col-md-6">
          <div class="form-group">
            <div class="form-field" id="check-in">
              <i class="ion ion-md-calendar"></i>
              <input type="text" class="form-control" id="date" placeholder="Check-in">
            </div>
         </div> 
        </div>
         <div class="col-md-6">
          <div class="form-group">
            <div class="form-field" id="check-out">
              <i class="ion ion-md-calendar"></i>
              <input type="text" class="form-control" id="date" placeholder="Check-out">
            </div>  
          </div>
         </div>
        </div>
        <div class="row">
         <div class="col-md-6">
          <div class="form-group">
            <div class="form-field" id="tamu">
              <select name="tamu" id="tamu" class="js-example-basic-single form-control">
                <option value="1">1 Tamu</option>
                <option value="2">2 Tamu</option>
                <option value="3">3 Tamu</option>
                <option value="4">4 Tamu</option>
                <option value="5">5 Tamu</option>
              </select>
            </div>
          </div>
         </div>
         <div class="col-md-6">
          <div class="form-group">
            <div class="form-field" id="kamar">
              <select name="kamar" id="kamar" class="js-example-basic-single form-control">
                <option value="1">1 Kamar</option>
                <option value="2">2 Kamar</option>
                <option value="3">3 Kamar</option>
                <option value="4">4 Kamar</option>
                <option value="5">5 Kamar</option>
              </select>
            </div>
          </div>
         </div>
        </div>
        <div class="filter-bintang">
          <p class="mb-1">Bintang</p>
          <p class=""><input type="checkbox" name=""> 
            <span class="pl-2">
              <i class="ion ion-md-star"></i>
            </span>
          </p>
          <p class=""><input type="checkbox" name="">
            <span class="pl-2">
            <i class="ion ion-md-star"></i>
            <i class="ion ion-md-star"></i>
          </span>
          </p>
          <p class=""><input type="checkbox" name=""> 
            <span class="pl-2">
              <i class="ion ion-md-star"></i>
              <i class="ion ion-md-star"></i>
              <i class="ion ion-md-star"></i>
            </span>
          </p>
          <p class=""><input type="checkbox" name=""> 
            <span class="pl-2">
              <i class="ion ion-md-star"></i>
              <i class="ion ion-md-star"></i><i class="ion ion-md-star"></i>
              <i class="ion ion-md-star"></i>
            <span>
          </p>
          <p class=""><input type="checkbox" name=""> 
            <span class="pl-2">
              <i class="ion ion-md-star"></i>
              <i class="ion ion-md-star"></i>
              <i class="ion ion-md-star"></i>
              <i class="ion ion-md-star"></i>
              <i class="ion ion-md-star"></i>
            </span>
          </p>
        </div>
        <button class="btn btn-primary" style="width: 100%;height: 45px;">Cari Hotel</button>
        
       </form>
          </div>
        </div>
       
      </div>

      <div class="col-md-8">

        <?php
          if(!$cari){ ?>
          <?php foreach($semua_kamar as $hasil) : ?>
            <div class="card mb-2">
            <div class="card-body p-3">
                
                <div class="row">
                  <div class="col-md-4">
                  <div class="img-kamar">
                    <img src="assets/images/kamar/<?= $hasil['gambar_kamar'];?>" class="card-img" alt="">
                  </div>
                  </div>
                  <div class="col-md-8">
                  <h3><?= $hasil['nama_kamar'];?></h3>
                  <h6><?= $hasil['tipe_kamar'];?></h6>
                  <span style="font-size: 12px;"><i class="ion ion-md-star" style="color: gold;"></i> <?= $hasil['rating_kamar'];?> </span>
                  <span style="font-size: 12px;padding-left: 10px;"><i class="ion ion-md-checkbox" style="background: green;color: #FFF;padding: 2px;border-radius: 4px"></i> Tersedia</span>
                  <p class="harga mb-0">
                    <span id="angka">Rp. <?= $hasil['harga_kamar'];?></span>
                    <span>/ per malam</span>
                  </p>
                  <div class="fasilitas">
                    <h6>Fasilitas</h6>
                    <p>
                      <i class="ion ion-wifi" style="background-color: #f3f3f3;padding: 8px;height: auto;border-radius: 4px"></i> Gratis Wifi 
                    <span style="padding-left: 30px;"><i class="ion ion-ios-tv" style="background-color: #f3f3f3;padding: 8px;height: auto;border-radius: 4px"></i> TV</span>
                    <span style="padding-left: 30px;"><i class="ion ion-ios-parking" style="background-color: #f3f3f3;padding: 8px;height: auto;border-radius: 4px"></i> Area Parkir</span>
                    <span style="padding-left: 30px;"><i class="ion ion-ios-mosque" style="background-color: #f3f3f3;padding: 8px;height: auto;border-radius: 4px"></i> Musholla</span>  
                    </p>
                  </div>
                  </div>
                </div>
            </div> 
        </div>
        <?php
        endforeach;
          } else {foreach($hasil_cari as $hasil): ?>
            <div class="card mb-2">
            <div class="card-body p-3">
                
                <div class="row">
                  <div class="col-md-4">
                  <div class="img-kamar">
                    <img src="assets/images/kamar/<?= $hasil['gambar_kamar'];?>" class="card-img" alt="">
                  </div>
                  </div>
                  <div class="col-md-8">
                  <h3><?= $hasil['nama_kamar'];?></h3>
                  <h6><?= $hasil['tipe_kamar'];?></h6>
                  <span style="font-size: 12px;"><i class="ion ion-md-star" style="color: gold;"></i> <?= $hasil['rating_kamar'];?> </span>
                  <span style="font-size: 12px;padding-left: 10px;"><i class="ion ion-md-checkbox" style="background: green;color: #FFF;padding: 2px;border-radius: 4px"></i> Tersedia</span>
                  <p class="harga mb-0">
                    <span id="angka">Rp. <?= $hasil['harga_kamar'];?></span>
                    <span>/ per malam</span>
                  </p>
                  <div class="fasilitas">
                    <h6>Fasilitas</h6>
                    <p>
                      <i class="ion ion-wifi" style="background-color: #f3f3f3;padding: 8px;height: auto;border-radius: 4px"></i> Gratis Wifi 
                    <span style="padding-left: 30px;"><i class="ion ion-ios-tv" style="background-color: #f3f3f3;padding: 8px;height: auto;border-radius: 4px"></i> TV</span>
                    <span style="padding-left: 30px;"><i class="ion ion-ios-parking" style="background-color: #f3f3f3;padding: 8px;height: auto;border-radius: 4px"></i> Area Parkir</span>
                    <span style="padding-left: 30px;"><i class="ion ion-ios-mosque" style="background-color: #f3f3f3;padding: 8px;height: auto;border-radius: 4px"></i> Musholla</span>  
                    </p>
                  </div>
                  </div>
                </div>
            </div> 
        </div>
          <?php 

          endforeach;
          ?>
          <?php }
        ?>
      
        
              
      </div>
    </div>
  </div>
</div>
<?php
include 'footer.php';
?>
    

<style>

.radhotel-search .container .row .col-md-4 .form-group{

}

.radhotel-search .container #check-in i,
.radhotel-search .container #check-out i{
  position: absolute;
  left: 35px;
  top: 18px;
}
.radhotel-search .container #check-in .form-control,
.radhotel-search .container #check-out .form-control{
  height: 50px;
  padding-left: 50px;
  border-radius: 5px;
}
.radhotel-search .container #tamu .form-control,
.radhotel-search .container #kamar .form-control{
  height: 50px;
}
.radhotel-search .container .col-md-4 .card{
  border: none;
  box-shadow: 2px 0 10px #e8e9ed;
}
.radhotel-search .container .col-md-8 .card{
  border: none;
  box-shadow: 2px 0 10px #e8e9ed;
}
.radhotel-search .container .col-md-8 .card h3{
  margin-bottom: 0;
  letter-spacing: -1px;
  font-family: 'NotoSansBold';
}
.radhotel-search .container .col-md-8 .card .harga{
  /* margin-bottom: 0; */
}
.radhotel-search .container .col-md-8 .card .harga #angka{
  color: #4486FF;
  font-size: 24px;
}
.radhotel-search .container .col-md-8 .card .fasilitas .ion{
  color: #4486FF;
}
</style>