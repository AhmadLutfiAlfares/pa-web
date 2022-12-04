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
    $query_journal = mysqli_query(
        $db,
        "SELECT id_journal
        FROM artikel
        WHERE id = $id_artikel"
    );
    $row = mysqli_fetch_assoc($query_journal);
    $id_journal = $row['id_journal'];

    $query = mysqli_query(
        $db,
        "UPDATE artikel
        set status = 'approved'
        WHERE id = $id_artikel"
    );

    if ($query) {
        header("Location:../editApplication.php?id=$id_journal");
    } else {
        echo "Approve gagal";
    }
}