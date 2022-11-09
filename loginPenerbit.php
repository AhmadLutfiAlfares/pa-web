<?php

/**
 * @var mysqli $db
 */

session_start();
require 'php/config.php';

// jika penerbit sudah login
if (isset($_SESSION['login'])) {
    header('Location: publisher/myJournal.php');
    exit;
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $db,
        "SELECT * FROM publisher WHERE email='$email'"
    );

    $result = mysqli_fetch_assoc($query);

    if (password_verify($password, $result['password'])) {
        // set session
        $_SESSION['login'] = true;
        // simpan id publisher untuk dipakai di create.php
        $_SESSION['pub_id'] = $result['id'];
        echo "
            <script>
            alert('Login berhasil');
            document.location.href = 'publisher/index.php';
            </script>";
    } else {
        echo "
            <script>
            alert('Username atau password salah');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/style.css"/>
    <link rel="stylesheet" href="stylesheet/login.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet"/>
    <title>Login Penerbit</title>
</head>

<body>
<?php
include('includes/header.php');
?>
<div class="title">
    <h1>Login Penerbit</h1>
</div>
<div class="container-form">
    <form action="" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="submit">
    </form>
<p>Belum punya akun? <a href="publisher/register.php">Sign Up Sekarang</a></p>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="javascript/darkMode.js"></script>
</body>

</html>