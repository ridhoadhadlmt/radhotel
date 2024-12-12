<?php
 session_start();
 include 'koneksi.php';
 include 'function.php';
 $table = 'destinasi';
 $field = '*';
 if(isset($_GET['nama_destinasi'])){
     $nama_destinasi = $_GET['nama_destinasi'];
     $params = "WHERE nama_destinasi = '$nama_destinasi'";
     $getDestinasi = getDestinasiDetail($table, $field, $params);
     $detail = mysqli_fetch_array($getDestinasi);
 }
 else{
    $nama_destinasi = null;
    $exe = getDestinasi($table, $field);
 }
 
?>

<?php
    include 'header.php';
?>
<div class="rad-wisata">   
 <div class="container col-md-11">
    <?php 
        
        if($nama_destinasi === null){ ?>

        <?php foreach($exe as $destinasi): ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="img-wisata">
                        <img src="assets/images/destinasi/<?= $destinasi['gambar']?>" alt="" class="w-100">     
                    </div>
                    <div class="img-text">
                        <h1><?= $destinasi['nama_destinasi']?></h1>
                    </div>      
                </div>
                <div class="col-md-4">
                </div> 
            </div>
            
        <?php endforeach; }
            else { ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="img-wisata">
                            <img src="assets/images/destinasi/<?= $detail['gambar']?>" alt="" class="w-100">     
                        </div>
                        <div class="img-text">
                            <h1><?= $detail['nama_destinasi']?></h1>
                        </div>      
                    </div>
                    <div class="col-md-4">
                    </div> 
                </div>
            <?php }
        ?>
    
    </div>
</div>

<?php
include 'footer.php';
?>

<style>
body{
    background: #FAFAFA;
}
.rad-wisata{
    margin-top: 10px;
    background: #FFF;
    padding-top: 1em;
    padding-bottom: 2em;
}
.rad-wisata .container .row .col-md-8 {
    border: none;
    position: relative;
}
.rad-wisata .container .row .col-md-8 img{
    max-width: 100%;
    position: relative;
}


</style>