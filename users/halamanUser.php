<!-- teknologi informasi <a href="https://www.freepik.com/free-photo/cloud-file-sharing-banner-background_16016458.htm#query=information%20technology%20banner&position=16&from_view=search">Image by rawpixel.com</a> on Freepik -->
<!-- kesehatan dan farmasi <a href="https://www.freepik.com/free-vector/medical-healthcare-wallpaper-background_3972316.htm#query=health%20and%20pharmacy%20banner&position=22&from_view=search">Image by starline</a> on Freepik -->
<!-- agrikultur <a href="https://www.freepik.com/free-photo/agriculture-iot-with-rice-field-background_17121987.htm#query=agriculture%20banner&position=16&from_view=search">Image by rawpixel.com</a> on Freepik -->
<!-- sosial humaniora <a href="https://www.freepik.com/free-vector/people-poster-global-communication_3908770.htm#query=social%20humanities%20banner&position=1&from_view=search">Image by macrovector</a> on Freepik -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../stylesheet/style-header-footer.css" />
    <link rel="stylesheet" href="stylesheet/halamanUser.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <title>Journable | Your one stop journal indexer</title>
</head>

<body>
    <?php
    include('includes/header.php');
    ?>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/teknologi.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color: white;">Teknologi Informasi</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/kesehatan.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color: black;">Kesehatan dan Farmasi</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/agrikultur1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color: white;">Agrikultur</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/sosial-humaniora.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color: black;">Sosial Humaniora</h5>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

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
                    <a href="/users/browse.php?kategori=teknologi-informasi">
                        <div class="contents-item">
                            <img src="/images/teknologi-informasi.png" alt="" />
                            <p>Teknologi Informasi</p>
                        </div>
                    </a>
                    <a href="/users/browse.php?kategori=kesehatan-dan-farmasi">
                        <div class="contents-item ">
                            <img src="/images/kesehatan-dan-farmasi.png" alt="" />
                            <p>Kesehatan dan Farmasi</p>
                        </div>
                    </a>
                    <a href="/users/browse.php?kategori=agrikultur">
                        <div class="contents-item hidden">
                            <img src="/images/agrikultur.png" alt="" />
                            <p>Agrikultur</p>
                        </div>
                    </a>
                    <a href="/users/browse.php?kategori=sosial-humaniora">
                        <div class="contents-item hidden">
                            <img src="/images/sosial-humaniora.png" alt="" />
                            <p>Sosial Humaniora</p>
                        </div>
                    </a>
                </div>
            </div>

            <form class="contact-form" name="contact" action="#" onsubmit="validateForm()">
                <h3 class="section-title">Hubungi Kami</h3>
                <p>Email (Wajib diisi)</p>
                <input type="text" name="email" class="form-control" />
                <p>Pesan (Wajib diisi)</p>
                <textarea name="message" id="" cols="53" rows="8" class="form-control"></textarea>
                <p>* Bidang wajib diisi</p>
                <input type="submit" name='submit' class="contact-submit" />
            </form>
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
        <script src="../javascript/darkMode.js"></script>
        <script src="../javascript/index.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>