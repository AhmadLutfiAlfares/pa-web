<?php
require "php/config.php";
$id = $_GET['id'];
if (isset($id)) {
    $query = mysqli_query(
        $db,
        "SELECT journal.id,
                title,
                issn,
                published_date,
                journal_cover.id AS id_journal_cover,
                journal_cover.filename
        FROM journal
        LEFT JOIN journal_cover ON journal.id = journal_cover.id_journal
        WHERE journal.id=$id"
    );
    $result = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/style.css" />
    <link rel="stylesheet" href="stylesheet/edit-application.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet" />
    <title>Journable | Jelajahi</title>
</head>

<body>
    <?php
    include('includes/header.php');
    ?>

    <div class="edit-container">
        <h1>Edit Jurnal</h1>
        <p>Siapkan judul jurnal, penerbit, tanggal terbit, dan ISSN</p>
        <div class="form-container">
            <form action="php/update.php" method="post" enctype="multipart/form-data">
                <input type="number" id="id" name="id" style="display: none;" value='<?= $result['id'] ?>'>
                <!-- judul artikel -->
                <label for="title">Judul Artikel</label>
                <input type="text" id="title" name="title" class="input-area" value='<?= $result['title'] ?>'>
                <!-- tanggal terbit -->
                <label for="published-date">Tahun Terbit</label>
                <input type="number" id="published-date" name="published-date" class="input-area" value='<?= $result['published_date'] ?>'>
                <!-- issn -->
                <label for="issn">ISSN</label>
                <input type="text" id="issn" name="issn" class="input-area" value='<?= $result['issn'] ?>'>
                <!-- cover jurnal -->
                <label for="cover">Cover Jurnal</label>
                <?php
                if ($result['filename']) {
                ?>
                    <img src="<?= $result['filename'] ?>" alt="" height="100px" width="70px">
                    <a href="php/deleteFile.php?id=<?= $result['id_journal_cover']?>">Hapus cover</a>
                <?php
                }
                ?>
                <input type="file" id="cover" name="cover">
                
                <!-- submit -->
                <input type="submit" name="submit" value="Apply">
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="javascript/darkmode.js"></script>
</body>

</html>