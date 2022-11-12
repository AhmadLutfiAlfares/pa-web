<?php

/**
 * @var mysqli $db
 */

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

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $publishedDate = $_POST['published-date'];
    $issn = $_POST['issn'];
    $current_datetime = date("Y-m-d H:i:s");

    $query = mysqli_query(
        $db,
        "UPDATE journal
        SET title='$title',
            published_date='$publishedDate',
            last_updated='$current_datetime',
            issn='$issn'
        WHERE id='$id'"
    );

    // jika upload cover lagi
    if (!empty($_FILES['cover']['name'])) {
        file_upload($title, $db, $id, 'cover');
    }

    // jika upload jurnal lagi
    if (!empty($_FILES['file-jurnal']['name'])) {
        file_upload($title, $db, $id, 'file-jurnal');
    }

    header("Location:../myJournal.php");
} else {
    echo "Update jurnal gagal";
}
