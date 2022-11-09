<?php

/**
 * @var mysqli $db
 */

session_start();
require "../../php/config.php";
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $publishedDate = $_POST['published-date'];
    $issn = $_POST['issn'];
    $publisherId = $_SESSION['pub_id'];

    // tambah jurnal ke tabel jurnal
    $query = mysqli_query(
        $db,
        "INSERT INTO
            journal(title, published_date, issn, id_publisher)
        VALUES
            ('$title', $publishedDate, '$issn', $publisherId)"
    );

    $journalId = mysqli_insert_id($db); // dapatkan id jurnal yang baru ditambahkan
    if (!empty($_FILES['cover']['name'])) {
        $target_dir = "uploads/";
        $imageFileType = strtolower(pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION));
        $target_file = $target_dir . str_replace(" ", "_", $title) . "_cover." . $imageFileType;

        // proses pindahkan file
        $tmp = $_FILES['cover']['tmp_name'];
        if (move_uploaded_file($tmp, '../' . $target_file)) {
            $image_query = mysqli_query(
                $db,
                "INSERT INTO journal_cover (id_journal, filename) VALUES ($journalId, '$target_file');"
            );
            if ($image_query) {
                header("Location:../myJournal.php");
            } else {
                echo "Tambah jurnal gagal";
            }
        }
    }
} else {
    echo "Tambah data publisher error";
}

