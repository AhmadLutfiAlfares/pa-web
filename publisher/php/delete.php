<?php

/**
 * @var mysqli $db
 */

require "../../php/config.php";
$journalId = $_GET['id'];
if (isset($journalId)) {
    $query = mysqli_query(
        $db,
        "DELETE FROM journal
        WHERE id = $journalId"
    );

    if ($query) {
        header("Location:../myJournal.php");
    } else {
        echo "Delete gagal";
    }
}
