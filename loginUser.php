<?php

/**
 * @var mysqli $db
 */

session_start();
require 'php/config.php';

// jika user sudah login

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $db,
        "SELECT * FROM user WHERE email = '$user' OR username = '$user'"
    );

    $result = mysqli_fetch_assoc($query);
    $username = $result['username'];

    if (password_verify($password, $result['password'])) {
        // set session
        $_SESSION['loginUser'] = true;
        // simpan id user untuk dipakai di bookmark.php
        $_SESSION['id_user'] = $result['id'];
        echo "
            <script>
            alert('Login berhasil! Selamat datang $username');
            document.location.href = 'users/halamanUser.php';
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
    <link rel="stylesheet" href="stylesheet/style-header-footer.css" />
    <link rel="stylesheet" href="stylesheet/login.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet"/>
    <title>Journable | Login User</title>
</head>

<body>
<?php
include('includes/header.php');
?>
<div class="title">
    <h1>Login User</h1>
</div>

<div class="container-form">
    <form action="" method="post">
        <input type="text" name="user" placeholder="Email Atau Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="submit">
    </form>
<p>Belum punya akun? <a href="users/register.php">Sign Up Sekarang</a></p>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="javascript/darkmode.js"></script>
</body>

</html>