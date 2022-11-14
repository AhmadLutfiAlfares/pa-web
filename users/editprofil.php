<?php

/**
 * @var mysqli $db
 */

session_start();
require "../php/config.php";

// jika belum login arahkan ke halaman login
if (!isset($_SESSION['loginUser'])) {
    header('Location: ../loginUser.php');
    exit;
}

$id = $_GET['id'];
$query = mysqli_query(
    $db,
    "SELECT * FROM user
    WHERE id= $id"
);
$result = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheet/style-header-footer.css" />
    <link rel="stylesheet" href="stylesheet/edit-profil.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet" />
    <title>Journable | Edit Profil</title>
</head>

<body>
    <?php
    include('includes/header.php');
    ?>

    <div class="edit-container">
        <h1>Edit Profil</h1>
        <p>Siapkan Username, Email, Password baru</p>
        <div class="form-container">
            <form action="php/update.php" method="post" enctype="multipart/form-data">
                <label for="name">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" value="<?= $result['username'] ?>">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="" value="<?= $result['email'] ?>">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" 
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
                <input type="password" id="konfir-password" name="konfir-password" placeholder="Konfirmasi Password">

                <input type="submit" name="submit" value="submit">
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="../javascript/darkMode.js"></script>
</body>

</html>