<?php

/**
 * @var mysqli $db
 */

session_start();
require "../php/config.php";


if (!isset($_SESSION['loginUser'])) {
    header("Location: ../loginUser.php");
    exit;
}

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
            document.location.href = 'jelajah.php';
            </script>";
    } else {
        echo "Tambahkan Bookmark gagal";
    }
}

?>
