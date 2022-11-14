<?php
session_start();
include '../php/config.php';

// jika belum login arahkan ke halaman login
if (!isset($_SESSION['loginPublisher'])) {
    header('Location: ../loginPenerbit.php');
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
    <link rel="stylesheet" href="stylesheet/apply.css" />
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

    <div class="apply-container">
        <h1>Daftarkan Jurnal</h1>
        <p>Siapkan judul jurnal, penerbit, tanggal terbit, dan ISSN</p>
        <div class="form-container">
            <form action="php/create.php" method="post" enctype="multipart/form-data">
                <!-- judul artikel -->
                <label for="title">Judul Jurnal</label>
                <input type="text" id="title" name="title" class="input-area">
                <!-- tanggal terbit -->
                <label for="published-date">Tahun Terbit</label>
                <input type="number" id="published-date" name="published-date" class="input-area">
                <!-- kategori -->
                <label for="kategori">Bidang Riset</label>
                <select id="kategori" name="kategori" class="input-dropdown">
                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                    <option value="Agrikultur">Agrikultur</option>
                    <option value="Kesehatan dan Farmasi">Kesehatan dan Farmasi</option>
                    <option value="Sosial Humaniora">Sosial Humaniora</option>
                    <option value="Lainnnya">Lainnya</option>
                </select>
                <!-- issn -->
                <label for="issn">ISSN</label>
                <input type="text" id="issn" name="issn" class="input-area">
                <!-- cover jurnal -->
                <label for="cover">Cover Jurnal</label>
                <input type="file" id="cover" name="cover"><br><br>
                <!-- file jurnal -->
                <label for="file-jurnal">Soft File Jurnal</label>
                <input type="file" name="file-jurnal"><br><br>
                <!-- submit -->
                <input type="submit" name="submit" value="Apply" class="btn-submit">
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="../javascript/darkMode.js"></script>
</body>

</html>