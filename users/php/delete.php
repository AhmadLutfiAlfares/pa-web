<?php

/**
 * @var mysqli $db
 */

require "../../php/config.php";

$bookmarkId = $_GET['id'];

if (isset($bookmarkId)) {
    $query = mysqli_query(
        $db,
        "DELETE FROM bookmark
        WHERE id = $bookmarkId"
    );

    if ($query) {
        header("Location: ../bookmark.php");
    } else {
        echo "Delete gagal";
    }
}