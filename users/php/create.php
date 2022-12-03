<?php

/**
 * @var mysqli $db
 */

session_start();
require "../../php/config.php";

function file_upload($title, $db, $id_artikel): void
{
    $target_dir = "uploads/";
    $file_type = strtolower(pathinfo($_FILES['file-artikel']['name'], PATHINFO_EXTENSION));
    $target_file = $target_dir . str_replace(" ", "_", $title) . "_" . 'file-artikel' . "." . $file_type;
    $tmp = $_FILES['file-artikel']['tmp_name'];

    // proses pindahkan file
    if (move_uploaded_file($tmp, '../' . $target_file)) {
        $query = mysqli_query(
            $db,
            "UPDATE artikel
                SET artikel_file = '$target_file'
                WHERE id = $id_artikel"
        );
    } else {
        echo "Upload file gagal";
    }
}

// jika klik submit
if (isset($_POST['submit'])) {
    $title = htmlspecialchars($_POST['title']);
    $userId = $_SESSION['id_user'];
    $current_datetime = date("Y-m-d H:i:s");

    // tambah artikel ke tabel artikel
    $query = mysqli_query(
        $db,
        "INSERT INTO
            artikel(title, date_upload, id_user)
        VALUES
            ('$title', '$current_datetime', $userId)"
    );

    $artikel_id = mysqli_insert_id($db); // dapatkan id artikel yang baru ditambahkan

    // jika ada file pdf jurnal yang diupload
    if (!empty($_FILES['file-artikel']['name'])) {
        file_upload($title, $db, $artikel_id);
    }

    header("Location:../halamanUser.php");
} else {
    echo "Tambah data user error";
}

