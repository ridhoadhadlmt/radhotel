<?php
include 'header.php';
?>


<div class="radhotel-blog">
 <div class="container-fluid col-md-10">
  <div class="row">
   <div class="col-md-4">
   </div> 
  </div>
 </div>
</div>
<?php
include 'footer.php';
?>


<style>
.radhotel-hero{
    background-image: url("images/img_bg_5.jpg");
    position: relative;
    background-position: center;
    height: 650px;
    background-size: cover;
    background-repeat: no-repeat;
   
}
.radhotel-hero .overlay{
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0,0,0,0.5);
}
.radhotel-hero-text{
    position: absolute;
    text-align: center;
    left: 50%;
    top: 45%;
    font-family: 'Quicksand'; 
    transform: translate(-50%,-50%);
    color: #FFF;
}
.radhotel-blog{
    margin-top: 5em;
    font-family: 'Quicksand';
}
.radhotel-blog .form-group .form-field{
    position: relative;
   
}
.radhotel-blog .form-group .form-field .fa{
    position: absolute;
    top: 35%;
    right: 20px;
}
.radhotel-blog .form-group .form-field .form-control{
    padding-right: 50px;
    height: 50px;
    border-radius: 0;
    background: #F5F5F5;
    border: 2px solid #E8E8E8;
    border-color: #E8E8E8;
}
.radhotel-blog .container-fluid .col-md-7 .blog-img{
    background: url('images/blog-1.jpg');
    height: 400px;
    width: 100%;
}
</style>