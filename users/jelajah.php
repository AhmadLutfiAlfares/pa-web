<?php

/**
 * @var mysqli $db
 */
// var_dump($_SESSION);
session_start();
// jika belum login arahkan ke halaman login
if (!isset($_SESSION['loginUser'])) {
    header('Location: ../loginUser.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheet/style-header-footer.css" />
    <link rel="stylesheet" href="stylesheet/browse.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <title>Journable | Jelajahi</title>
</head>

<body>
    <?php
    include('includes/header.php');
    ?>

    <div class="all-container">

        <h2>Jelajahi Jurnal</h2>

        <aside class="filter">
            <h3>Filter hasil pencarian</h3>
            <div class="searching">
                <form action="" method="get">
                    <input type="text" name="search" placeholder="Cari judul" class="search">
                    <input type="submit" name="submit" value="cari" class="cari">
                </form>
            </div>
        </aside>


        <main>
            <ul class="search-results">
                <?php
                require "../php/config.php";

                // pagination 
                // deklarasi batas
                $batas = 3;
                $halaman = @$_GET['halaman'];

                if(empty($halaman)) {
                    $posisi = 0;
                    $halaman = 1;
                } else {
                    $posisi = ($halaman-1) * $batas;
                }

                // jika memasukkan kata kunci pencarian
                if (isset($_GET['submit'])) {
                    $search = $_GET['search'];
                    $query = mysqli_query(
                        $db,
                        "SELECT journal.id,
                            title,
                            issn,
                            published_date,
                            category,
                            last_updated,
                            cover_filename,
                            journal_filename,
                            publisher.name
                    FROM journal
                    JOIN publisher ON journal.id_publisher = publisher.id
                    WHERE title LIKE '%$search%'"
                    );
                } else if (isset($_GET['kategori'])) { // jika ada parameter kategori dalam get, yaitu saat diakses dari halaman index
                    $category = str_replace('-', ' ', $_GET['kategori']);
                    $category = ucwords($category);
                    $query = mysqli_query(
                        $db,
                        "SELECT journal.id,
                            title,
                            issn,
                            published_date,
                            category,
                            last_updated,
                            cover_filename,
                            journal_filename,
                            publisher.name
                    FROM journal
                    JOIN publisher ON journal.id_publisher = publisher.id
                    WHERE category = '$category'"
                    );
                } else { // jika tidak mencari
                    $query = mysqli_query(
                        $db,
                        "SELECT journal.id,
                            title,
                            issn,
                            published_date,
                            category,
                            last_updated,
                            cover_filename,
                            journal_filename,
                            publisher.name
                    FROM journal
                    JOIN publisher ON journal.id_publisher = publisher.id 
                    LIMIT $posisi, $batas"
                    );
                }


                // untuk mengecek kalau datanya kosong
                $cek = mysqli_num_rows($query);
                if (empty($cek)) {
                    echo "Jurnal tidak ada";
                }

                // mengecek kalau data ada
                $i = $posisi + 1;
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php
                                $journal_filename = $row['journal_filename'];
                                $cover_filename = $row['cover_filename'];
                                // jika tidak ada filenya, ganti linknya ke #
                                if (!$journal_filename) {
                                    $journal_filename = '#';
                                }
                                // jika ada covernya maka tampilkan
                                if ($cover_filename) {
                                    $title = $row['title'];
                                    echo "<a href='../publisher/$journal_filename'>
                                    <img src='../publisher/$cover_filename' class='card-img-top' alt='Cover $title' height= '300px'>
                                    </a>";
                                    // jika tidak ada bikin kotak dengan icon download
                                } else {
                                    echo "<a href='$journal_filename'>
                                        <div style='height: 200px; width: 146px'>
                                            <i class='fa-solid fa-file-arrow-down'></i>
                                        </div>
                                    </a>";
                                }
                                ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['title'] ?></h5>
                                    <p class="card-text"><?= $row['name'] ?></p>
                                    <p class="card-text"><i>ISSN</i><?= $row['issn'] ?></p>
                                    <p class="card-text"><?= $row['category'] ?></p>
                                    <p class="card-text">Last update on <?= date('d M Y', strtotime($row['last_updated'])); ?></p>
                                    <a href="addBookmark.php?id=<?= $row['id'] ?>" class="btn btn-primary">Add Bookmark</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </ul>
        </main>

        <?php
        // untuk menghitung total data dan pagination
        $query2 = mysqli_query($db, "SELECT * FROM journal JOIN publisher ON journal.id_publisher = publisher.id");
        $jumlah_data = mysqli_num_rows($query2);
        $jumlah_halaman = ceil($jumlah_data/$batas);
        ?>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
                <?php
                for($i = 1; $i <= $jumlah_halaman;$i++) {
                    if($i != $halaman) {
                        // echo "<a href=\"jelajah.php?halaman=$i\"></a> |";
                        echo "<li class='page-item'><a class='page-link' href=\"jelajah.php?halaman=$i\">$i</a></li>";
                    } else {
                        echo "<b>$i</b>";
                    }
                }
                ?>
                
                <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li> -->
            </ul>
        </nav>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="../javascript/darkMode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>