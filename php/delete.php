<?php
require "config.php";
if (isset($_GET['id'])) {
    $query = mysqli_query(
        $db,
        "DELETE journal, publisher
        FROM journal
        INNER JOIN publisher  
        WHERE journal.id_publisher=publisher.id
              and
              journal.id = $_GET[id]"
    );

    if ($query) {
        header("Location:../browse.php");
    } else {
        echo "Delete gagal";
    }
}
