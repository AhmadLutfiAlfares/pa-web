<?php

/**
 * @var mysqli $db
 */

require "../../php/config.php";
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $publishedDate = $_POST['published-date'];
    $issn = $_POST['issn'];

    $query = mysqli_query(
        $db,
        "UPDATE journal
        SET title='$title',
            published_date='$publishedDate',
            issn='$issn'
        WHERE id='$id'"
    );

    if (!empty($_FILES['cover']['name'])) {
        $target_dir = "uploads/";
        $imageFileType = strtolower(pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION));
        $target_file = $target_dir . str_replace(" ", "_", $title) . "_cover." . $imageFileType;

        // proses pindahkan file
        $tmp = $_FILES['cover']['tmp_name'];
        if (move_uploaded_file($tmp, '../' . $target_file)) {
            $image_query = mysqli_query(
                $db,
                "UPDATE journal_cover SET filename='$target_file' WHERE id_journal=$id;"
            );
            if ($image_query) {
                header("Location:../myJournal.php");
            } else {
                echo "Update gambar gagal";
            }
        }
    }

    if ($query) {
        header("Location:../myJournal.php");
    } else {
        echo "Update jurnal gagal";
    }
}
