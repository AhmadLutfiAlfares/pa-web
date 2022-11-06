<?php

/**
 * @var mysqli $db
 */

session_start();
require "config.php";
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $publishedDate = $_POST['published-date'];
    $issn = $_POST['issn'];
    $id = $_SESSION['pub_id'];
    var_dump($id);

    $query = mysqli_query(
        $db,
        "INSERT INTO journal(title, published_date, issn, id_publisher) VALUES ('$title', $publishedDate, '$issn', $id)"
    );

    if (!empty($_FILES['cover']['name'])) {
        $target_dir = "uploads/";
        $imageFileType = strtolower(pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION));
        $target_file = $target_dir . str_replace(" ", "_", $title) . "_cover." . $imageFileType;

        // ambil id
        $id_query = mysqli_query(
            $db,
            "SELECT * FROM journal WHERE issn='$issn'"
        );
        $result = mysqli_fetch_assoc($id_query);
        $id_journal = $result['id'];

        // proses pindahkan file
        $tmp = $_FILES['cover']['tmp_name'];
        if (move_uploaded_file($tmp, '../' . $target_file)) {
            $image_query = mysqli_query(
                $db,
                "INSERT INTO journal_cover (id_journal, filename) VALUES ($id_journal, '$target_file');"
            );
            if ($image_query) {
                header("Location:../browse.php");
            } else {
                echo "Tambah jurnal gagal";
            }
        }
    }
} else {
    echo "Tambah data publisher error";
}

