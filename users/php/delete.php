<?php

/**
 * @var mysqli $db
 */

require "../../php/config.php";

// $bookmarkId = $_GET['id'];
$bookmarkId = mysqli_query(
                $db,
                "SELECT * FROM bookmark"
            );
$resultId = $_GET['id'];
if (isset($bookmarkId)) {
    $query = mysqli_query(
        $db,
        "DELETE FROM bookmark
        WHERE id_journal = $resultId"
    );

    if ($query) {
        // header("Location: bookmark.php");
        echo "Delete berhasil";
    } else {
        echo "Delete gagal";
    }
}