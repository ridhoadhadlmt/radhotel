<?php
session_start();
include 'header.php';
include 'koneksi.php';
include 'function.php';
?>

<?php
if(isset($_GET['id_kamar'])){
    $id_kamar = $_GET['id_kamar'];
    $table = 'kamar';
    $field = '*';
    $kondisi = "WHERE id_kamar ='$id_kamar'";
    $exe = getDetailKamar($table,$field,$kondisi);
}
$sql = mysqli_query($koneksi,"SELECT * FROM kamar WHERE id_kamar = '$id_kamar'");
$sql_tipe = "SELECT * FROM kamar JOIN tipe_kamar ON kamar.id_kamar = tipe_kamar.id_tipe WHERE id_kamar = '$id_kamar'";
$exe_tipe = mysqli_query($koneksi,$sql_tipe);

?>



<div class="radhotel-detailkamar pt-3 pb-3 ">

 <div class="container col-md-11">
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb pl-0">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="kamar.php">Kamar</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Kamar</li>
  </ol>
</nav>
  <?php
  foreach($exe_tipe as $detail):
  ?>
  <div class="row">
   <div class="col-md-6" id="detail-img-kamar">
   <div class="img-kamar">
   <img src="assets/images/kamar/<?= $detail['img_kamar'];?>" class="d-block w-100" height="400" alt="...">
   </div>
   </div>
   <div class="col-md-6 p-3" id="detail-info-kamar">
    <div class="detail-kamar">
    <h3 class="nama-kamar"><?= $detail['nama_kamar'];?></h3>
    <h6><?= $detail['tipe_kamar'];?></h6>
    <p class="rating mb-0"><i class="fa fa-star" style="color: gold;"></i> 5</p>
    <p class="harga mb-0">
      <span id="angka">Rp. <?= $detail['harga_kamar'];?></span>
      <span>/ per malam</span>
      <span>/ per kamar</span>
    </p>
    <?php
      if(isset($_SESSION['username'])){?>
      <button class="btn btn-default">Pesan</button>

      
    <?php }
    else{?>
    <a href="login.php" class="btn btn-default">Anda Belum Login</a>

    <?php }  
    
    ?>
    </div>
   </div> 
  </div>
  <?php
  endforeach;
  ?> 
 </div>
</div>

<?php
include 'footer.php';
?>


<style>


.radhotel-detailkamar .container .breadcrumb{
  background: transparent;
}
.radhotel-detailkamar .container #detail-img-kamar .img-kamar img{
  border-radius: 5px;
}
.radhotel-detailkamar .container #detail-info-kamar{
  background-color: #FFF;
  border-radius: 5px;
}

.radhotel-detailkamar .container #detail-info-kamar .detail-kamar .rating{

}
.radhotel-detailkamar .container #detail-info-kamar .detail-kamar .harga #angka{
  font-size: 20px;
  color: #4486FF;
  font-weight: bold;
}
.radhotel-detailkamar .container #detail-info-kamar .detail-kamar .btn{
  background: #4486FF;
  color: #FFF;

}

.radhotel-detailkamar .container .fasilitas .fa{
  color: #4486FF;
}
</style>