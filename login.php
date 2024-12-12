<?php
session_start();
include 'header.php';
include 'koneksi.php';
?>
<?php

if(isset($_POST['login'])){
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$login = mysqli_query($koneksi,$sql);
$row = mysqli_num_rows($login);

if($row > 0){
    $level = mysqli_fetch_assoc($login);
    if($level['level'] =='admin'){
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      $_SESSION['level'] = 'admin';
      header('location:admin/');
    }
    else if($level['level'] =='booking'){
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      $_SESSION['level'] = 'booking';

    header('location:index.php');
    }
}
else{
  $sql;
    // header('location:loginUser.php?pesan=gagal');
}

}
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/css/bootstrap.css">
<div class="loginUser">
 <form action="" method="POST">
  <div class="form-group">
   <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group">
   <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <button class="btn btn-default" name="login">Masuk</button>
 </form>
</div>

<style>

.loginUser{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 30%;
    background: #FFF;
    border-radius: 3px;
    box-shadow: 1px 0 10px #DDD;
}
.loginUser .btn{
    background : #0064D2;
    color: #FFF;
    width: 100%;
    padding: 10px;
}

.loginUser form{
    margin-bottom: 0;
    border-radius: 3px;
    padding: 30px 25px 30px 25px;
}
.loginUser .form-control{
    padding: 20px 10px;
    border-radius: 3px;
}
</style>