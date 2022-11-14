<div class="header">
    <div class="header-logo">Journable</div>
    <div class="header-list" id="headerId">
        <ul>
            
            <?php
            // jika session belum di start
            if (!isset($_SESSION)) {
                session_start();
            }

            // jika sudah login tampilin link keluar begitu juga sebaliknya
            if (isset($_SESSION['loginUser'])) {
                echo "<li><a href='browse.php'>Jelajahi</a></li>";
                echo "<li><a href='bookmark.php'>Bookmark</a></li>";
                echo "<li><a href='profil.php'>Profil</a></li>";
                echo "<li>Dark mode: <span class='change'>OFF</span></li>";
                echo "<li><a href='includes/logout.php'>Keluar</a></li>";
            } else {
                echo "<li><a href='/users/browse.php'>Jelajahi</a></li>";
                echo "<li>Dark mode: <span class='change'>OFF</span></li>";
                echo "<li><a href='../pilihLogin.php'>Masuk</a></li>";
            }
            ?>
        </ul>
    </div>
    <img class="ham-menu" src="../images/icons/hamburger-menu.png" onclick="toggleMenu()">
</div>  
<script src="../javascript/hamburgerMenu.js"></script>