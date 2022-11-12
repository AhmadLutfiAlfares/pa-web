<?php

use LDAP\Result;

session_start();
require "../php/config.php";


if (!isset($_SESSION['login'])) {
    header("Location: ../loginUser.php");
    exit;
}

// if (isset($_SESSION['login'])) {
//     header("Location: users/halamanUser.php");
// }

$idUser = $_SESSION['id_user'];

if (isset($idUser)) {
    $query = mysqli_query($db, 
            "SELECT * FROM journal");
    $idJournal = $_GET['id'];
    if ($idJournal) {
        $query = mysqli_query(
            $db,
            "INSERT INTO bookmark (id_user, id_journal) 
            VALUES ('$idUser', '$idJournal')"
        );
        echo "
            <script>
            alert('Tambahkan bookmark berhasil!');
            document.location.href = 'browse.php';
            </script>";
        // header("Location: browse.php");
    } else {
        echo "Tambahkan Bookmark gagal";
    }
}

?>
