<!-- teknologi informasi <a href="https://www.freepik.com/free-photo/cloud-file-sharing-banner-background_16016458.htm#query=information%20technology%20banner&position=16&from_view=search">Image by rawpixel.com</a> on Freepik -->
<!-- kesehatan dan farmasi <a href="https://www.freepik.com/free-vector/medical-healthcare-wallpaper-background_3972316.htm#query=health%20and%20pharmacy%20banner&position=22&from_view=search">Image by starline</a> on Freepik -->
<!-- agrikultur <a href="https://www.freepik.com/free-photo/agriculture-iot-with-rice-field-background_17121987.htm#query=agriculture%20banner&position=16&from_view=search">Image by rawpixel.com</a> on Freepik -->
<!-- sosial humaniora <a href="https://www.freepik.com/free-vector/people-poster-global-communication_3908770.htm#query=social%20humanities%20banner&position=1&from_view=search">Image by macrovector</a> on Freepik -->

<?php
  session_start();
  if (!isset($_SESSION['login'])) {
      header("Location: login.php");
      exit;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="stylesheet/style.css" />
  <link rel="stylesheet" href="stylesheet/index.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet" />
  <title>Journable | Your one stop journal indexer</title>
</head>

<body>
  <?php
  include('includes/header.php');
  ?>
  
  <div class="main">
    <div class="header-content">
      <h1>Publikasikan Artikel Anda</h1>
      <h2>Temukan Jurnal yang Tepat <span id="sekarang">Sekarang</span></h2>
    </div>
    <div class="main-content">
      <div class="section-title">
        <h3>Kategori</h3>
        <p id="show-more">Lebih banyak</p>
      </div>
      <div class="contents">
        <div class="contents-item">
          <img src="images/teknologi-informasi.png" alt="" />
          <p>Teknologi Informasi</p>
        </div>
        <div class="contents-item ">
          <img src="images/kesehatan-dan-farmasi.png" alt="" />
          <p>Kesehatan dan Farmasi</p>
        </div>
        <div class="contents-item hidden">
          <img src="images/agrikultur.png" alt="" />
          <p>Agrikultur</p>
        </div>
        <div class="contents-item hidden">
          <img src="images/sosial-humaniora.png" alt="" />
          <p>Sosial Humaniora</p>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="footer-list">
      <ul>
        <li>Tentang</li>
        <li>Beriklan dengan Kami</li>
      </ul>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="javascript/darkMode.js"></script>
  <script src="javascript/index.js"></script>
</body>

</html>