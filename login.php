<?php

session_start();

require 'proses.php';

if(isset($_POST['login'])) {
    $login = login($_POST);
}

    // cek password
//     $row = mysqli_fetch_assoc($result);
//    if( password_verify($password, $row["password"]) ) {
    // set session 
    // $_SESSION["login"] = true;
    
//         header("Location: user.php");
//         exit;
//    }


    // $error = true;




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<div class="main-container" style="position: fixed; width: 100%">
            <div class="nav" style="display: flex; justify-content: center; background-color:#F0F8FF;">
                <div class="logo">
                    <h1>Halaman Login</h1>
                </div>

<body>

<?php if(isset($error)) : ?>
    <p style="color: red; font-style: italic;">Username / Password Salah</p>
    <?php endif; ?>
 
<form action="" method="post">

    <ul>
    <div class="mb-3">
  <label for="username" class="form-label">Username ;</label>
  <input type="text" class="form-control" name="username" id="username" placeholder="name">
</div>

<div class="mb-3">
  <label for="password" class="form-label">Email address</label>
  <input type="password" class="form-control" name ="password"id="password" >
</div>
    <li>
        <button type="submit" name="login">Login</button>
    </li>
    <!-- <li>
    <a href="registrasi.php"><button type="submit" name="registrasi">Registrasi</button></a>
    </li> -->
    </ul>


</form>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</body>
</html>

