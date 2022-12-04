<?php

/**
 * @var mysqli $db
 */

session_start();
require "../../php/config.php";

function file_upload($title, $db, $journal_id, $kind): void
{
    $table = "cover_filename";
    if ($kind !== "cover") {
        $kind = "file-jurnal";
        $table = "journal_filename";
    }
    $target_dir = "uploads/" . $kind . "/";
    $file_type = strtolower(pathinfo($_FILES[$kind]['name'], PATHINFO_EXTENSION));
    $target_file = $target_dir . str_replace(" ", "_", $title) . "_" . $kind . "." . $file_type;
    $tmp = $_FILES[$kind]['tmp_name'];

    // proses pindahkan file
    if (move_uploaded_file($tmp, '../' . $target_file)) {
        $query = mysqli_query(
            $db,
            "UPDATE journal
                SET $table = '$target_file'
                WHERE id = $journal_id"
        );
    } else {
        echo "Upload file gagal";
    }
}

// jika klik submit
if (isset($_POST['submit'])) {
    $title = htmlspecialchars($_POST['title']);
    $publishedDate = htmlspecialchars($_POST['published-date']);
    $category = $_POST['kategori'];
    $issn = htmlspecialchars($_POST['issn']);
    $publisherId = $_SESSION['pub_id'];
    $kind = "cover";
    $current_datetime = date("Y-m-d H:i:s");

    // tambah jurnal ke tabel jurnal
    $query = mysqli_query(
        $db,
        "INSERT INTO
            journal(title, published_date, category, last_updated, issn, id_publisher)
        VALUES
            ('$title', $publishedDate, '$category', '$current_datetime', '$issn', $publisherId)"
    );

    $journal_id = mysqli_insert_id($db); // dapatkan id jurnal yang baru ditambahkan
    // jika ada file gambar yang diupload
    if (!empty($_FILES[$kind]['name'])) {
        file_upload($title, $db, $journal_id, $kind);
    }

    // jika ada file pdf jurnal yang diupload
    if (!empty($_FILES['file-jurnal']['name'])) {
        file_upload($title, $db, $journal_id, "file-jurnal");
    }

    header("Location:/publisher/index.php");
} else {
    echo "Tambah data publisher error";
}

