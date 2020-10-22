<?php
session_start();
require_once "db.php";
$pdo = new db();

// Jika admin belum login, maka akan langsung terpindah ke login.php
if(isset($_SESSION['email']) == 0){
  header('Location: login_admin.php');
}

if(isset($_POST['submit'])){ 
  $upload = 1; 
  $target = "assets/img/" . uniqid() . '.' . basename($_FILES["image_upload"]["name"]);
  $targetdua = "assets/img/" . uniqid() . '.' . basename($_FILES["image_upload_dua"]["name"]);
  
  $image_type = strtolower(pathinfo($target,PATHINFO_EXTENSION));
  $image_type_dua = strtolower(pathinfo($targetdua,PATHINFO_EXTENSION));

  if($image_type != "jpg" && $image_type != "png" && $image_type != "jpeg") {
    echo "Format gambar yang diperbolehkan adalah JPG, PNG dan JPEG!";
    $upload = 0;
  }
  else if($image_type_dua != "jpg" && $image_type_dua != "png" && $image_type_dua != "jpeg") {
    echo "Format gambar yang diperbolehkan adalah JPG, PNG dan JPEG!";
    $upload = 0;
  }

  if ($upload == 0) {
    echo "Gambar tidak terupload!";
  } 
  else{
    if (move_uploaded_file($_FILES["image_upload"]["tmp_name"], $target)) {
      if (move_uploaded_file($_FILES["image_upload_dua"]["tmp_name"], $targetdua)) {
          $pdo -> membuat_barang($_POST['nama_barang'], $_POST['spesifikasi_barang1'], $_POST['spesifikasi_barang2'],  $target, $targetdua);
          header("Location: index.php");
      }
      
      // Masukkan gambar ke dalam database dan redirect kembali ke admin
    } 
    else {
      echo "Terjadi kesalahan dalam mengupload";
    }
  } 
}
?>

<!DOCTYPE HTML>
<html>
<style>
  body{
        background-image : url("gambar/latar_input_cafe.jpg");
        background-size : cover;
        padding:25px;
      }
</style>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Input Barang</title>
    </head>
    <body>
        <center>
        <div class="card text-center" style="width: 35rem;">
        <div class="card-body">
        <div class="text-center"><br><br>
                <h4>Opto Elektronik</h4>
        </div><br><br>

        <form method="POST" enctype="multipart/form-data">
          <div class="form-row">
          <!-- nama barang -->
          <div class="form-group col-md-8 offset-2">
            <label>Nama Barang :</label>
            <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" required>
          </div>
          <!-- spesifikasi barang -->
          <div class="form-group col-md-8 offset-2">
            <label>Spesifikasi Barang 1 :</label>
            <input type="text" class="form-control" name="spesifikasi_barang1" placeholder="Spesifikasi Barang" required>
          </div>
        <!-- spesifikasi barang ( lanjutan jika kurang )-->
          <div class="form-group col-md-8 offset-2">
            <label>Spesifikasi Barang 2 (lanjutan) :</label>
            <input type="text" class="form-control" name="spesifikasi_barang2" placeholder="Spesifikasi Barang (lanjutan)">
          </div>
          <!-- upload photo cafe -->
          <div class="form-group col-md-8 offset-2">
            <label>Upload photo</label>
            <input type="file" class="form-control" name="image_upload" id="image_upload" required>
            <input type="file" class="form-control" name="image_upload_dua" id="image_upload_dua" required>
            <br>
          <!-- button "buat" -->
          <div class="form-group col-md-8 offset-2">
            <button class="btn btn-primary" name="submit" style="margin:25px;">Input Data</button>
          </div>
          </form>
        </div>
    </center>
    </body>
</html>