<div class="header">
    <div class="header-logo">Journable</div>
    <div class="header-list">
        <ul>
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
            <li>Dark mode: <span class="change">OFF</span></li>
            <li><a href="journalExplorer.php">Pencarian</a></li>
            <li><a href="bookmark.php">Bookmark</a></li>
            <li><a href="browse.php">Jelajahi</a></li>
        </ul>
    </div>
</div>