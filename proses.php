<?php
    $conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040081');

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            echo "Tambah Data <a href='index.php'>[Home]</a>";
        } else if ($_POST['aksi'] == "edit"){
            echo "Edit Data <a href='index.php'>[Home]</a>";
        }
    }

    if(isset($_GET['hapus'])) {
        echo "Hapus Data <a href='index.php'>[Home]</a>";
    }

    
        
    
    
    function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }   
    return $rows;
 }
    
    function tambah($data) {
        global $conn;
        // $nama = htmlspecialchars($data['judul']);
        $judul_film = htmlspecialchars($data['judul']);
        $latar = htmlspecialchars($data['latar']);
        $deskripsi_film = htmlspecialchars($data['isi']);
        
        // upload
        $gambar = upload(); 
            if (!$gambar) {
                return false;
        }
        
      
        $query = "INSERT INTO deskripsi_film 
                    VALUES (null, '$judul_film', '$latar', '$deskripsi_film', 1, '$gambar')
                    ";
      
        mysqli_query($conn, $query) or die(mysqli_error($conn));
    
        
        return mysqli_affected_rows($conn);
    }



    function upload() {
        
      $namafile = $_FILES['foto']['name'];
      $ukuranfile = $_FILES['foto']['size'];
      $error = $_FILES['foto']['error'];
      $tmpname = $_FILES['foto']['tmp_name'];
      
      
    //   cek gambar yg diupload
    if ($error === 4) {
        echo "<script> 
                alert('pilih gambar terlebih dahulu');
            </script>";
            return false;
    }

    // cek hanya gambar yg boleh diupload   
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower (end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script> 
                alert('file yang anda upload bukan gambar');
            </script>";
            return false;
    }

    // cek ukuran gambar
    if($ukuranfile > 1000000) {
        echo "<script> 
                alert('ukuran gambar terlalu besar');
            </script>";
            return false;
    }



    //  gambar diupload
    // generate file baru
    $namafilebaru = uniqid();
    $namafilebaru .='.';
    $namafilebaru .= $ekstensigambar;
    



    move_uploaded_file($tmpname, 'img/' . $namafilebaru);

    return $namafilebaru;
    }





function hapus($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM deskripsi_film WHERE id = $id ");

    return mysqli_affected_rows($conn);
}




function ubah($data) {

    global $conn;
        $id = $data["id"];
        $judul_film = htmlspecialchars($data['judul']);
        $latar = htmlspecialchars($data['latar']);
        $deskripsi_film = htmlspecialchars($data['isi']);
        $gambarlama = htmlspecialchars($data['gambarlama']);
        
        // cek user pilih gambar baru


        $gambar = htmlspecialchars($data['foto']);
        if($_FILES['foto']['error'] === 4) {
          $gambar = $gambarlama;  
        } else {
            $gambar = upload();
        }

        $query = "UPDATE deskripsi_film SET
                   judul_film = '$judul_film',
                   latar_film = '$latar',
                   isi_film = '$deskripsi_film',
                   image_film = '$gambar'
                   WHERE id = $id
                    ";
      
        mysqli_query($conn, $query) or die(mysqli_error($conn));
    
        
        return mysqli_affected_rows($conn);
}



    function cari($keyword) {
        $query = "SELECT * FROM deskripsi_film
        WHERE
            judul_film LIKE '%$keyword%' OR
            latar_film LIKE  '%$keyword%'  
            ";
        return query($query);    
    }

// function login($data) {
//     global $conn;

//     $username = strtolower (stripslashes($data["username"]));
//     $password = htmlspecialchars($data["password"]);
//     // $password2 = mysqli_real_escape_string($conn, $data["password2"]);

//     // cek username sudah ada atau belum
//    $result = mysqli_query($conn, "SELECT  username FROM user WHERE
//                     username = '$username'");

//     if (mysqli_num_rows($result) === 1) {

//         $row = mysqli_fetch_assoc($result);
//         if(password_verify($password, $row["password"])) {

//             $role = query("SELECT * role FROM user WHERE username = '$username")[0]["role"];
//             var_dump($role);
//             $_SESSION["login"] = true;
//             $_SESSION["username"] = $username;
            
//          if ($role === "admin") {
//             header ("location: index.php");
//             exit;
//          } else {
//             header ("location: user.php");
//             exit;
//          }
//         }
//     }
//    return [
//     'error' => true,
//     'pesan' => 'username / password salah'
//    ];

// }

function login($data)
{
    global $conn;

  $username = $data["username"];
  $password = $data["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

      // Set session
      $_SESSION["login"] = true;
      $_SESSION["username"] = $username;

      // Remember me

      $role = query("SELECT * FROM user WHERE username = '$username'")[0]["role"];
      $_SESSION["role"] = $role;

      if ($role === "admin") {
        header("location: index.php");
      } else {
        header("location: user.php");
      }
    }
  }
}

function registrasi($data)
{

  global $conn;


  //tambah user baru ke DB
  $username = ucwords($data["username"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudah terpakai')</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (id, username, password) VALUES (null, '$username', '$password')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}






?>