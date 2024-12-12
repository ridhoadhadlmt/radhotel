<?php
session_start();

include 'koneksi.php';
include 'function.php';

$table = 'kamar';
$field = '*';
$exe = getKamar($table,$field); 

$sql_tipe = mysqli_query($koneksi,"SELECT * FROM kamar JOIN tipe_kamar ON kamar.id_kamar = tipe_kamar.id_tipe");
?>


<?php
include 'header.php';
?>

<div class="rh-room-area pt-3 pb-3 mt-2 mb-2">
  <div class="container col-md-11">
    <div class="row">
      <div class="col-md-6">
        <?php
          foreach($exe as $kamar):
        ?>
        <div class="rh-list-area">
          <div class="img-list">
            <img src="assets/images/kamar/<?= $kamar['gambar_kamar'];?>" class="" alt="">
          </div>
          <div class="desc-list">
              <h3 class="nama-kamar"><?= $kamar['nama_kamar'];?></h3>
              <span class="rating"><i class="ion ion-md-star"></i> <?= $kamar['rating_kamar'];?> </span>
              <h6 class="harga">
               <span></span>
               <span id="angka">Rp. <?= $kamar['harga_kamar'];?></span>
               <span>/ per malam</span>
              </h6>
            <a href="" class="btn btn-detail">Pesan Sekarang</a>
          </div>
        </div>
        <?php
          endforeach;
        ?>
        <div class="pagination-area">
          <ul class="pagination">
            
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="filter-area">

          <form action="" method="GET" class="rh-filter-area">
              <div class="tipe-area mb-5">
                <select class="select form-control" id="nama" name="nama">
                  <option value="">Tipe Kamar</option>
                <?php
                foreach($sql_tipe as $tipe){?>
                  <option value="<?= $tipe['nama']?>"><?= $tipe['nama'];?></option>
                <?php }
                ?>
                </select>
              </div>
              <div class="check-area">
                <div class="row">
                  <div class="col-md-6">
                    <div class="check-in">
                      <div class="form-group">
                        <div class="icon"><i class="ion ion-md-calendar"></i></div>
                        <input type="text" class="form-control" id="date" placeholder="Check-in">
                     </div>
                    </div> 
                  </div>
                  <div class="col-md-6">
                    <div class="check-out">
                      <div class="form-group">
                        <div class="icon"><i class="ion ion-md-calendar"></i></div>
                        <input type="text" class="form-control" id="date" placeholder="Check-out">  
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
               <div class="col-md-6">
                <div class="guest-area">
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
               </div>
               <div class="col-md-6">
                <div class="room-area">
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
               </div>
              </div>
              <div class="search-area">
                <button class="btn btn-search w-100">Cari Hotel</button>
                
              </div>
          </form>
        </div>
      </div>
    </div>  
  </div>
</div>
<?php
include 'footer.php';
?>

<style type="text/css">
@media (max-width: 500px){
  .rh-list-area{
    width: 100%;
  }
}
.rh-filter-area{
  background: #FFF;
  padding: 20px 15px;
  margin: 0;
  border-radius: 8px;
  font-family: 'SSP';
}

.rh-filter-area .nice-select .current{
  line-height: 35px;

}

.rh-filter-area .check-area .check-in input,
.rh-filter-area .check-area .check-out input{
  height: 45px;
}
.rh-filter-area .check-area .check-in .icon,
.rh-filter-area .check-area .check-out .icon{
  position: absolute;
  top: 25%;
  right: 30px;
}
.rh-filter-area .search-area .btn-search{
  background: linear-gradient(150deg, #5691c8,#1667C9);
  color: #FFF;
  height: 45px;
  border-radius: 8px;
  border-color: #5691c8;
}

.rh-list-area{
  background-color: #FFF;
  margin-bottom: 20px;
  border-radius: 8px;
  position: relative;
}
.rh-list-area .img-list{
  position: relative;
}
.rh-list-area .img-list img{
  height: 400px;
  border-radius: 8px;
  width: 100%;
  object-fit: cover;
}
.rh-list-area .desc-list{
  position: absolute;
  bottom: 0;
  padding: 20px;
  width: 80%;
  background: #FFF;
  border-top-right-radius: 8px;
  font-family: 'SSP';
}
.rh-list-area .desc-list .nama-kamar{
  font-family: 'SSPBold';
}
.rh-list-area .desc-list .rating i{
  color: #FFD700;
}
.rh-list-area .desc-list .status i{
}
.rh-list-area .desc-list .harga #angka{
  font-family: 'SSPSemiBold';
}
.rh-list-area .desc-list .btn{
  border: 1px solid #1667C9;
  padding: 8px 25px;
  border-radius: 8px;
}
.rh-list-area .desc-list .btn:hover{
  background: linear-gradient(150deg, #5691c8,#1667C9);
  border-color: #5691c8;
  transition: .5s;
  color: #FFF;
}
.filter-area{
  box-shadow: 2px 0 10px #e8e9ed;
}
.filter-area .select{
  margin-bottom: 2rem;
}
</style>
