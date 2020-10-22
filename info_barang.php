<?php
session_start();
require_once "db.php";
$pdo = new db();
$signed = false;

$signed = false;
if(isset($_SESSION['email']) == 1){
    $signed = true;
}

function error_php(){
  header("Location: index.php");
}
set_error_handler('error_php');

if (isset($_GET['id'])){
  $info_barang = $pdo -> get_barang($_GET['id']);
  $id_barang = $info_barang['id'];
  $nama = $info_barang['nama_barang'];
  $spesifikasisatu = $info_barang['spesifikasi_barang1'];
  $spesifikasidua = $info_barang['spesifikasi_barang2'];
  $gambar = $info_barang['gambar_barang1'];
  $gambardua = $info_barang['gambar_barang2'];
  $harga = $info_barang['harga'];
}
?>
<!doctype html>
<style>
    .nav-item{
        padding:10px;
    }
</style>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Opto Elektronik</title>
  </head>
  <body>
   <!-- Awal Navbar -->
   <nav class="navbar navbar-expand-lg navbar fixed-top navbar-dark bg-dark">
       <div class="container">
        <h4 a class="navbar-brand" href="#">Opto Elektronik</h4></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <?php
                    if($signed == false){
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="login_admin.php">Login</a>
                </li>
                <?php
                    }
                    else{
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <?php
                    }
                ?>
                </ul>
            </div>
        </div>
    </nav><br><br><br><br>
    <!-- Akhir Navbar -->

    <!-- Awal gambar barang -->
    <section class="page-section bg-light"><br>
        <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carousel-example-captions" data-slide-to="0" class=""></li>
            <li data-target="#carousel-example-captions" data-slide-to="1" class="active"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <center><img class="img-fluid" src="<?= $gambar ?>" width="400rem"; alt="Responsive image"></center>
            </div>
            <div class="carousel-item">
                <center><img class="img-fluid" src="<?= $gambardua ?>" width="400rem"; alt="Responsive image"></center>
            </div>
            </div>
            <br>
            <a class="carousel-control-prev" href="#carousel-example-captions" role="button" data-slide="prev">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-left-fill" fill="color-dark" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
            </svg>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-captions" role="button" data-slide="next">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-right-fill" fill="color-dark" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
            </svg>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!-- Akhir gambar barang -->

    <!-- Awal informasi barang -->
    <section class="page-section bg-dark text-white">
        <div class="container">
            <br><br>
            <h4><?= $nama ?></h4>
            <h5>Spesifikasi :</h5>
            <p class="text-justify"><?= $spesifikasisatu ?></p>
            <p class="text-justify"><?= $spesifikasidua ?></p>
            <h5>Harga : Rp. <?= $harga ?></h5>
            <br><br>
        </div>
    </section>
    <!-- Akhir informasi barang -->

    <!-- Awal Footer-->
    <footer class="bg-light py-5 text-center">
        <div class="container"><div class="small text-center text-muted">Copyright © 2020 - OPTO Computer</div></div>
    </footer>
    <!-- Akhir Footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>