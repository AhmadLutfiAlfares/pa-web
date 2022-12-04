<?php

/**
 * @var mysqli $db
 */

require "../php/config.php";
session_start();

// jika belum login arahkan ke halaman login
if (!isset($_SESSION['loginPublisher'])) {
    header('Location: ../../loginPenerbit.php');
    exit;
}

$id = $_SESSION['pub_id'];
$id_artikel = $_GET['id'];

if (isset($id_artikel)) {
    $query = mysqli_query(
        $db,
        "UPDATE artikel
        set status = 'rejected'
        WHERE id = $id_artikel"
    );

    if ($query) {
        header("Location:../articleQueue.php");
    } else {
        echo "Approve gagal";
    }
}