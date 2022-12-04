<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand ms-4" href="./halamanUser.php">Journable</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto me-4">
            <?php
            if (!isset($_SESSION)) {
                session_start();
            }

            if (isset($_SESSION['loginUser'])) {
                echo "<li class='nav-item ms-4'><a class='nav-link' href='/users/jelajah.php'>Jelajahi</a></li>";
                echo "<li class='nav-item ms-4'><a class='nav-link' href='bookmark.php'>Bookmark</a></li>";
                echo "<li class='nav-item ms-4'><a class='nav-link' href='artikel.php'>Upload Artikel</a></li>";
                echo "<li class='nav-item ms-4'><a class='nav-link' href='includes/logout.php'>Keluar</a></li>";
            } else {
                echo "<li class='nav-item ms-4'><a class='nav-link' href='/users/jelajah.php'>Jelajahi</a></li>";
                echo "<li class='nav-item ms-4'><a class='nav-link' href='../pilihLogin.php'>Masuk</a></li>";
            }
            ?>
        </ul>
    </div>
</nav>