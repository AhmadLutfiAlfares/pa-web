<?php

/**
 * @var mysqli $db
 */

require '../php/config.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfir-password'];

    $query = mysqli_query(
        $db,
        "SELECT * FROM user WHERE username = '$username' AND email = '$email'"
    );
    if (mysqli_fetch_row($query)) {
        echo "
        <script>
            alert('Username atau Email telah digunakan!');
        </script>";
    } else {
        if ($password == $konfirmasi) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = mysqli_query(
                $db,
                "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')"
            );

            if ($insert_query) {
                echo "
                <script>
                alert('Registrasi berhasil!');
                document.location.href = '../loginUser.php';
                </script>";
            } else {
                echo "
                <script>
                alert('Registrasi gagal');
                </script>";
            }
        } else {
            echo "
            <script>
                alert('Password dan konfirmasi password anda berbeda');
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/registerUser.css" />
    <link rel="stylesheet" href="../stylesheet/style-header-footer.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet" />
    <title>Buat Akun</title>
</head>

<body>
    <?php
    include('includes/header.php');
    ?>
    <div class="container-form">
        <form action="" method="post">
            <label for="name">Username</label>
            <input type="text" name="username" placeholder="Username">

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="example@domain.org">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Password mengandung paling tidak 1 angka, 1 huruf kapital dan huruf kecil, dan minimal 8 karakter"
                required>

            <div id="message">
                <b>Password harus mengandung paling tidak:</b>
                <p id="letter" class="invalid">1 <b>huruf kecil</b></p>
                <p id="capital" class="invalid">1 <b>huruf kapital</b></p>
                <p id="number" class="invalid">1 <b>angka</b></p>
                <p id="length" class="invalid"><b>8 karakter</b></p>
            </div>

            <label for="konfir-password">Konfirmasi Password</label>
            <input type="password" name="konfir-password" placeholder="Konfirmasi Password">

            <input type="submit" name="submit" value="submit">
        </form>
        <p>Sudah punya akun? <a href="../loginUser.php">Login Sekarang</a></p>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="../javascript/darkmode.js"></script>
</body>

</html>