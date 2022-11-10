<?php
/**
 * @var mysqli $db
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/style.css"/>
    <link rel="stylesheet" href="stylesheet/browse.css"/>
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
?>

<div class="all-container">

    <h2>Jelajahi Jurnal</h2>

    <main>
        <ul class="search-results">
            <?php
            require "../php/config.php";

            // jika memasukkan kata kunci pencarian
            if (isset($_GET['submit'])) {
                $search = $_GET['search'];
                $query = mysqli_query(
                    $db,
                    "SELECT journal.id,
                            title,
                            issn,
                            published_date,
                            publisher.name,
                            journal_cover.filename
                    FROM journal
                    JOIN publisher ON journal.id_publisher = publisher.id
                    LEFT JOIN journal_cover ON journal.id = journal_cover.id_journal
                    WHERE title LIKE '%$search%'"
                );
            } else { // jika tidak mencari
                $query = mysqli_query(
                    $db,
                    "SELECT journal.id,
                            title,
                            issn,
                            published_date,
                            publisher.name,
                            journal_cover.filename
                    FROM journal
                    JOIN publisher ON journal.id_publisher = publisher.id
                    LEFT JOIN journal_cover ON journal.id = journal_cover.id_journal"
                );
            }

            // untuk mengecek kalau datanya kosong
            $cek = mysqli_num_rows($query);
            if (empty($cek)) {
                echo "Belum ada jurnal favorit";
            }

            while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <li class="card">
                    <img src="<?= $row['filename'] ?>" alt="Cover <?= $row['title'] ?>" height="200px">
                    <div class="search-result-main">
                        <h3><?= $row['title'] ?></h3>
                        <p><?= $row['name'] ?></p>
                        <br>
                        <p><i>ISSN </i><?= $row['issn'] ?></p>
                    </div>
                    <aside class="search-result-aside">
                        <p>Published on <?= $row['published_date'] ?></p>
                        <br>
                        <a href="editApplication.php?id=<?= $row['id'] ?>" style="text-decoration: none; color: black;"><i
                                    class="fa-sharp fa-solid fa-pen-to-square" style="display: inline-block;"></i></a>
                        <a href="php/delete.php?id=<?= $row['id'] ?>" style="text-decoration: none; color: black;"><i
                                    class="fa-sharp fa-solid fa-trash" style="display: inline-block;"></i></a>
                    </aside>
                </li>
            <?php
            }
            ?>
        </ul>
    </main>

    <aside class="filter">
        <h3>Filter hasil pencarian</h3>
        <div class="searching">
            <form action="" method="get">
                <input type="text" name="search" placeholder="Cari judul" class="search">
                <input type="submit" name="submit" value="cari" class="cari">
            </form>
        </div>
    </aside>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="javascript/darkmode.js"></script>
</body>

</html>