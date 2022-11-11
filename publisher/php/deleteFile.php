<?php

/**
 * @var mysqli $db
 */

require "../../php/config.php";
$journalId = $_GET['id'];
if (isset($journalId)) {
    // dapatkan filename cover dulu
    $filename_query = mysqli_query(
        $db,
        "SELECT cover_filename
        FROM journal
        WHERE id=$journalId"
    );
    $cover_filename = mysqli_fetch_assoc($filename_query)['cover_filename'];

    // set nilai di database ke NULL
    $query = mysqli_query(
        $db,
        "UPDATE journal
        SET cover_filename = NULL
        WHERE id = $journalId"
    );

    if ($query) {
        unlink('../' . $cover_filename); // hapus file
        header("Location:../editApplication.php?id=$journalId");
    } else {
        echo "Delete gagal";
    }
}
