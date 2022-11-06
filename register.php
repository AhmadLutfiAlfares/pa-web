<?php
require 'config.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfir-password'];

    $query = mysqli_query(
        $db,
        "SELECT * FROM akun WHERE username = '$username'"
    );
    if (mysqli_fetch_row($query)) {
        echo "
        <script>
            alert('Password dan konfirmasi password anda berbeda');
        </script>";
    } else {
        if ($password == $konfirmasi) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = mysqli_query(
                $db,
                "INSERT INTO akun (nama, email, username, password) VALUES ('$nama', '$email', '$username', '$password')"
            );
            if ($insert_query) {
                echo "
                <script>
                alert('Registrasi berhasil');
                document.location.href = 'index.php';
                </script>";
            } else {
                echo "
                <script>
                alert('Registrasi gAGAL');
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
    <link rel="stylesheet" href="stylesheet/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet" />
    <title>Journable | Jelajahi</title>
</head>

<body>
    <?php
    include('includes/header.php');
    ?>

    <form action="register.php">
        <label for="name">Nama</label>
        <input type="text" name="name" placeholder="NamaDepan NamaBelakang">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="example@domain.org">
        <label for="password">Password</label>
        <input type="text" name="password" placeholder="Password">
        <input type="submit" value="submit">
    </form>

    <p>Sudah punya akun? <a href="login.php">Login Sekarang</a></p>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="javascript/darkmode.js"></script>
</body>

</html>