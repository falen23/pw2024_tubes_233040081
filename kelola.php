<?php

// jika tombol tambah ditekan
require 'proses.php';
if(isset($_POST['aksi'])) {

  // var_dump($_POST);
  // var_dump($_FILES);
  // die;


 // jika data berhasil ditambahkan
 if(tambah($_POST) > 0) {
  echo "<script> 
        alert('Data Berhasil ditambahkan'); 
        document.location.href = 'index.php';
        </script>";
 }else{
  echo "<script> 
  alert('Data Gagal ditambahkan'); 
  document.location.href = 'index.php';
  </script>";
 }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>portofolio website</title>
</head>

<body>
    <header>
        <div class="main-container" style="position: fixed; width: 100%">
            <div class="nav mb-5">
                <div class="logo">
                    <a href="">Nama Website</a>
                </div>

    </div>
    <div class="kontainer">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-2 row">
        <label for="Judul Film" class="col-sm-2 col-form-label">Judul Film</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="Judul Film" required name="judul" placeholder="Ex 112233">
        </div>
      </div>
    </div>
    <div class="mb-2 row">
        <label for="latar film" class="col-sm-2 col-form-label">Latar film</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="latar film" required name="latar" placeholder="fiksi">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="isi film" class=" col-sm-2 col-form-label">Isi Film</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="isi film" required name="isi" rows="3"></textarea>
        </div>
      </div>
    <!-- <div class="mb-2 row">
        <label for="kesimpulan" class="col-sm-2 col-form-label">Kesimpulan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="kesimpulan"  name="kesimpulan" placeholder="opsional">
        </div>
      </div> -->
        <div class="mb-3 row">
        <label for="foto film" class="col-sm-2 col-form-label">Foto Film</label>
        <div class="col-sm-10">
        <input class="form-control" type="file" id="foto"  name="foto">
            </div>
      </div>

      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Ariel</a></li>
    <li><a class="dropdown-item" href="#">samuel</a></li>
    <li><a class="dropdown-item" href="#">alex</a></li>
  </ul>
</div>

      <div class="mb-3 row">
        <div class="col">
        <?php 
            if(isset($_GET['ubah'])){
      ?>
            <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Simpan Perubahan
            </button>
       <?php
             }else {
       ?>
               <button type="submit" name="aksi" value="add" class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Tambahkan
                </button>
       <?php
              }
       ?>
            <a href="index.php" type="button" class="btn btn-danger">
                Batal
            </a>
        </div>
      </div>
   
        </form>
     </div>         
         </header>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            </body>