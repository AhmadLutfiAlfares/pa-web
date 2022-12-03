<?php
session_start();
include '../php/config.php';

// jika belum login arahkan ke halaman login
// if (!isset($_SESSION['loginUser'])) {
//     header('Location: ../loginUser.php');
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheet/style-header-footer.css" />
    <link rel="stylesheet" href="stylesheet/artikel.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <title>Journable | Upload Artikel</title>
</head>

<body>
    <?php
    include('includes/header.php');
    ?>

    <div class="apply-container">
        <h1>Daftarkan Artikel</h1>
        <p>Siapkan judul artikelmu</p>
        <div class="form-container">
            <form action="php/create.php" method="post" enctype="multipart/form-data">
                <!-- judul artikel -->
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Artikel</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <!-- <label for="title">Judul Artikel</label>
                <input type="text" id="title" name="title" class="input-area"> -->
                
                <!-- file jurnal -->
                <div class="mb-3">
                    <label for="file-jurnal" class="form-label">Soft File Artikel</label>
                    <input type="file" class="form-control" name="file-artikel">
                </div>
                <!-- <label for="file-jurnal">Soft File Artikel</label>
                <input type="file" name="file-jurnal"><br><br> -->

                <!-- submit -->
                <input type="submit" name="submit" value="Apply" class="btn-submit">
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="../javascript/darkMode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>