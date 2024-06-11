<?php
session_start();

if(isset($_POST['login'])) {
    session_unset();
    session_destroy();
    header('location: login.php');
}

require 'proses.php';
$deskripsi_film = 
query("SELECT 
 deskripsi_film.id AS desk_id, 
 deskripsi_film.judul_film AS desk_jufi,
deskripsi_film.latar_film AS desk_lafi,
deskripsi_film.isi_film AS isfi, 
sutradara_film.nama_sutradara AS sutradara_nasu,
deskripsi_film.image_film AS img
 FROM deskripsi_film
 JOIN sutradara_film ON deskripsi_film.id_sutradara = sutradara_film.id
 LIMIT 0, 3
 ")[0];

// tombol cari
if( isset($_POST["cari"]) ) {
    $deskripsi_film= cari($_POST["keyword"]);
    
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dufi</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="main-container" style="position: fixed; width: 100%">
            <div class="nav" style="display: flex; justify-content: space-around; background-color:#F0F8FF;">
                <div class="logo">
                    <a href="">Dufi</a>
                </div>

                <nav>
                    <ul>
                        <li><a href="#hero">Home</a></li>
                        <li><a href="#portofolio">Film</a></li>
                        <form action="" method="POST">
                            <button type="submit" name="login">Logout</button>
                        </form>
                       
                       
                    </ul>
                </nav>

                <div class="burger">
                    <div class="line-1"></div>
                    <div class="line-2"></div>
                    <div class="line-3"></div>
                </div>
            </div>
        </div>
        </header>
        <section id="hero" style="padding-top: 50px;">
            <div class="hero-left" style="padding: 90px;">
            <!-- <h3> Selamat Datang <?=  $_SESSION["username"] ?> </h3> -->
                <h3 class="pre-title">Welcome To</he>
                <h1 class="hero-name">DU<span>FI</span></h1>
                <p>Tempat dimana kamu bisa mencari film-film
                seru yang mengedukasi</p>
                <!-- <a href="kelola.php" type="button" class="btn btn-info">Tambah</a> -->
                </div>
            </div>
            <div class="hero-right" style="padding: 90px;">
                <form action="" method="POST">
                    <input type="text" name="keyword" size="30" autofocus placeholder="masukan pencarian" autocomplete="off" id="keyword">
                     <button type="submit" name="cari" id="tombol-cari">Cari</button>

                </form>
            
            </div>
        </section>
        <!-- bs -->
        <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/looper.jpg" style="height: 900px;"  alt="#">
              </div>
              <div class="carousel-item">
                <img src="img/fastx.jpg" style="height: 900px;" alt="#">
              </div>
              <div class="carousel-item">
                <img src="img/1917.jpg" style="height: 900px;" alt="#">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <div class="ukuran-next" style="display: flex;" style="position: relative;">
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
          </div> -->
    <div id="wadah">
          <section id="portofolio">
            <div class="portofolio main-container">
                <h3 class="pre-title">Genre Aksi</h3>
                <h1 class="section-title">Nama-Film</h1>
    
                <div class="grid-3">
                <?php $i = 1;
                foreach($deskripsi_film as $dsf) : ?>
                    <div class="portofoio">
                        <div>

                        
                            <div class="portofolio-cover">
                                <img src="img/<?= $dsf['image_film']; ?>" alt="-" style="width: 400px;">
                            </div>
        
                            <div class="portofolio-info">
                                <div class="portofolio-title">
                                    <h4><?= $dsf['judul_film'];?></h4>
                                    
                                    <h6><?= $dsf['latar_film'];?></h6>
                                </div>
                                <p><?= $dsf['isi_film']; ?></p>
        
                                
                              
                            </div>
                           
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    
                    
                    
                </div>
            </div>    
        </section>
     </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    body sementara
</body> -->
<?php
$deskripsi_film2 = 
query("SELECT 
 deskripsi_film.id AS desk_id, 
 deskripsi_film.judul_film AS desk_jufi,
deskripsi_film.latar_film AS desk_lafi,
deskripsi_film.isi_film AS isfi, 
sutradara_film.nama_sutradara AS sutradara_nasu,
deskripsi_film.image_film AS img
 FROM deskripsi_film
 JOIN sutradara_film ON deskripsi_film.id_sutradara = sutradara_film.id
 LIMIT 3, 3
 ");
 ?>
    <div id="wadah">
     <section id="portofolio" >
        <div class="portofolio main-container" style="margin-bottom: 30px;">
            <h3 class="pre-title">Anime</h3>
            <h1 class="section-title">Nama-Film</h1>

            <div class="grid-3">
            <?php $i = 1;
                foreach($deskripsi_film2 as $dsf) : ?>
                    <div class="portofoio">
                        <div>

                        
                            <div class="portofolio-cover">
                                <img src="img/<?= $dsf['img']; ?>" alt="-" style="width: 400px;">
                            </div>
        
                            <div class="portofolio-info">
                                <div class="portofolio-title">
                                    <h4><?= $dsf['desk_jufi'];?></h4>
                                    
                                    <h6><?= $dsf['desk_lafi'];?></h6>
                                </div>
                                <p><?= $dsf['isfi']; ?></p>
        
                               
                              
                            </div>
                           
                        </div>
                    </div>
                    <?php endforeach; ?>

            </div>
        </div>
     </section>
    </div>

<?php
$deskripsi_film3 = 
query("SELECT 
 deskripsi_film.id AS desk_id, 
 deskripsi_film.judul_film AS desk_jufi,
deskripsi_film.latar_film AS desk_lafi,
deskripsi_film.isi_film AS isfi, 
sutradara_film.nama_sutradara AS sutradara_nasu,
deskripsi_film.image_film AS img
 FROM deskripsi_film
 JOIN sutradara_film ON deskripsi_film.id_sutradara = sutradara_film.id
 LIMIT 6, 9
 ");
 ?>
         <div id="wadah">
        <section id="portofolio" >
        <div class="portofolio main-container" style="padding-top: 30px;">
            <h3 class="pre-title">Genre Fantasi</h3>
            <h1 class="section-title">Nama-Film</h1>

            <div class="grid-3">
                
            <?php $i = 1;
                foreach($deskripsi_film3 as $dsf) : ?>
                    <div class="portofoio">
                        <div>

                        
                            <div class="portofolio-cover"> 
                                <img src="img/<?= $dsf['img']; ?>" alt="-" style="width: 400px;">
                            </div>
        
                            <div class="portofolio-info">
                                <div class="portofolio-title">
                                    <h4><?= $dsf['desk_jufi'];?></h4>
                                    
                                    <h6><?= $dsf['desk_lafi'];?></h6>
                                </div>
                                <p><?= $dsf['isfi']; ?></p>
        
                                
                              
                            </div>
                           
                        </div>
                    </div>
                    <?php endforeach; ?>    

                    </div>
                </div>
            </div>
        </div>   
    </section>
<div>

    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>     