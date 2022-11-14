<?php

/**
 * @var mysqli $db
 */

require "../php/config.php";
session_start();

// jika belum login arahkan ke halaman login
if (!isset($_SESSION['loginPublisher'])) {
    header('Location: ../loginPenerbit.php');
    exit;
}

$id = $_SESSION['pub_id'];
$query = mysqli_query(
    $db,
    "SELECT *
    FROM journal
    JOIN publisher ON journal.id_publisher = publisher.id
    WHERE publisher.id = $id"
);

$numOfJournal = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheet/style-header-footer.css"/>
    <link rel="stylesheet" href="stylesheet/index.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet"/>
    <title>Journable | Jelajahi</title>
</head>

<body>
<?php
include('includes/header.php');

date_default_timezone_set("Asia/Makassar");
$timeOfDay = date('a');
if ($timeOfDay == 'am') {
    echo '<p class="welcome">Good morning, welcome to our site</p>';
} else {
    echo '<p class="welcome">Good afternoon, welcome to our site</p>';
}
echo "<p class='pIndex'>Jurnal anda yang sudah di publish: $numOfJournal</p>";
?>

</body>

</html>