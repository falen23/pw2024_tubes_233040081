<?php

session_start();

require 'proses.php';

if(isset($_SESSION["is_login"])) {
    header("Location: user.php");
    exit();
}

if(isset($_POST["login"])) {

   $username = $_POST["username"];
   $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE
                username = '$username'");

    // cek username
if($result->num_rows > 0) {
   $data = $result->fetch_assoc();
    $_SESSION["username"] = $data["username"];
    $_SESSION["is_logim"] = true;

   header("Location: user.php");
}else {
    echo "akun tidak ditemukan";
}

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
<body>

<h1>Halaman Login</h1>

<?php if(isset($error)) : ?>
    <p style="color: red; font-style: italic;">Username / Password Salah</p>
    <?php endif; ?>

<form action="" method="post">

    <ul>
        <li>
            <label for="username">username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password">
    </li>
    <li>
        <button type="submit" name="login">Login</button>
    </li>
    </ul>


</form>
    
</body>
</html>