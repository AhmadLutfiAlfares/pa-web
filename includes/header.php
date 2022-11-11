<div class="header">
    <div class="header-logo"><a href="index.php">Journable</a></div>
    <div class="header-list" id="headerId">
        <ul>
            <li><a href="browse.php">Jelajahi</a></li>
            <li>Kategori</li>
            <li><a href="journalExplorer.php">Pencarian</a></li>
            <li>Dark mode: <span class="change">OFF</span></li>
            <?php
            // jika session belum di start
            if (!isset($_SESSION)) {
                session_start();
            }

            // jika sudah login tampilin link keluar begitu juga sebaliknya
            if (isset($_SESSION['login'])) {
                echo "<li><a href='includes/logout.php'>Keluar</a></li>";
            } else {
                echo "<li><a href='pilihLogin.php'>Masuk</a></li>";
            }
            ?>
            <!-- <li class="ham-btn"><a href=""><i class="fa fa-bars"></i></a></li> -->
        </ul>
    </div>
    <img class="ham-menu" src="images/icons/hamburger-menu.png" onclick="toggleMenu()">
</div>
<script src="javascript/hamburgerMenu.js"></script>