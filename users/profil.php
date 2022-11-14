<?php

/**
 * @var mysqli $db
 */

session_start();
$idUser = $_SESSION['id_user'];

if (!isset($_SESSION['loginUser'])) {
    header("Location: ../loginUser.php");
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheet/style-header-footer.css" />
    <link rel="stylesheet" href="stylesheet/profil.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet" />
    <title>Journable | Profil</title>
</head>

<body>
    <?php
    include('../includes/header.php');
    ?>

    <div class="all-container">

        <h2>Profil</h2>

        <main>
            <ul class="search-results">
                <?php
                require "../php/config.php";

                $query = mysqli_query($db, "SELECT * FROM user WHERE id = '$idUser'");

                // mengecek kalau data ada
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <li class="card">
                        <div class="search-result-main">
                            <p>Username : <?= $row['username'] ?></p>
                            <p>Email : <?= $row['email'] ?></p>
                        </div>
                        <aside class="search-result-aside">
                            <a href="editprofil.php?id=<?= $row['id'] ?>"  class="icon-class" style="text-decoration: none; color: black;"><i class="fa-sharp fa-solid fa-pen-to-square" style="display: inline-block;"></i>Edit</a>

                        </aside>
                    </li>
                <?php
                }
                ?>

            </ul>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="../javascript/darkmode.js"></script>
</body>

</html>