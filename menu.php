<?php
session_start();

include 'koneksi.php';
include 'function.php';

$table = 'menu';
$field = '*';
$exe = getMenu($table,$field); 

$table2 = 'kategori_menu';
$field2 = '*';
$exe2 = getKategoriMenu($table2,$field2); 
?>

<?php
include 'header.php';
?>

<div class="rh-menu-area pt-3 pb-3 mt-2 mb-2">
  <div class="container col-md-11">
    <div class="row">
      <div class="col-md-3">
        <div class="rh-filter-area">
          
        </div>
      </div>
      <div class="col-md-9">
        <div class="row">
          <?php
            foreach($exe as $menu):
          ?>
            <div class="col-md-4">
              <div class="rh-list-area">
                <div class="img-list">
                  <img src="assets/images/menu/<?= $menu['gambar'];?>" class="" alt="">
                </div>
                <div class="desc-list">
                  <h4 class="nama-menu"><?= $menu['nama_menu'];?></h4> 
                  <h6 class="rating"><i class="fas fa-star"></i> <?= $menu['rating'];?></h6>
                  <h6 class="harga">Rp. <?= $menu['harga'];?></h6>
                  <a href="" class="btn btn-detail">Pesan Sekarang</a>
                </div>
              </div>
            </div>
            <?php
              endforeach;
            ?>
        </div>
      </div>
  </div>
</div>
<?php
include 'footer.php';
?>

<style type="text/css">
.rh-menu-area{
  background: #F9F9F9;
}
.rh-filter-area{
  background: #FFF;
  padding: 5px 15px;
  margin: 0;
  border-radius: 8px;
  font-family: 'SSP';
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
  display: block;
  margin-bottom: 10px;
  padding: 10px;
  border-radius: 8px;
}
.rh-list-area .img-list{
  width: 100%;
}
.rh-list-area .img-list img{
  height: 200px;
  border-radius: 8px;
  width: 100%;
  object-fit: cover;
}
.rh-list-area .desc-list{
  width: 60%;
  margin-left: 15px;
  font-family: 'SSP';
}
.rh-list-area .desc-list .nama-menu{
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
</style>
