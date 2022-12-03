<?php

/**
 * @var mysqli $db
 */

require "../php/config.php";
session_start();

// jika belum login arahkan ke halaman login
if (!isset($_SESSION['loginPublisher'])) {
    header('Location: ../loginPenerbit.php');
    exit;
}

$id = $_SESSION['pub_id'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Dashboard | Journable</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link rel="stylesheet" href="/publisher/stylesheet/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet"/>
    <link href="/publisher/stylesheet/dashboard.css" rel="stylesheet">
</head>
<body>

<ul style="display: none">
    <?php
    $query = mysqli_query(
        $db,
        "SELECT published_date, COUNT(*) AS count
        FROM journal
        WHERE id_publisher = $id
        GROUP BY published_date
        ORDER BY published_date"
    );
    while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <li class="chart-value"><?= json_encode($row) ?></li>
        <?php
    }
    ?>
</ul>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Journable</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <form action="" method="get" class="w-100 rounded-0 border-0 search">
        <input name="search" type="text" class="form-control form-control-dark w-100 rounded-0 border-0 search"
               placeholder="Search" aria-label="Search">
        <input style="display: none" type="submit" name="submit" value="submit">
    </form>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="/publisher/includes/logout.php">Sign out</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#dashboard">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#jurnal-saya">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Jurnal Saya
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="apply.php">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Daftarkan Jurnal
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2" id="dashboard">Dashboard</h1>
                <!--                <div class="btn-toolbar mb-2 mb-md-0">-->
                <!--                    <div class="btn-group me-2">-->
                <!--                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>-->
                <!--                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>-->
                <!--                    </div>-->
                <!--                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">-->
                <!--                        <span data-feather="calendar" class="align-text-bottom"></span>-->
                <!--                        This week-->
                <!--                    </button>-->
                <!--                </div>-->
            </div>

            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

            <h2 id="jurnal-saya">Jurnal Saya</h2>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Bidang Riset</th>
                        <th scope="col">ISSN</th>
                        <th scope="col">Terakhir diubah</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
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
                    WHERE title LIKE '%$search%' AND publisher.id = $id"
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
                    WHERE publisher.id = $id"
                        );
                    }
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['published_date'] ?></td>
                            <td><?= $row['category'] ?></td>
                            <td><?= $row['issn'] ?></td>
                            <td><?= date('d M Y', strtotime($row['last_updated'])) ?></td>
                            <td>
                                <a href="editApplication.php?id=<?= $row['id'] ?>">
                                    <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                </a>
                                <a href="php/delete.php?id=<?= $row['id'] ?>">
                                    <button type="button" class="btn btn-secondary btn-sm">Hapus</button>
                                </a>
                            </td>
                        </tr>
                        <?php $i++;
                    } ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>
<<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
<script src="/publisher/javascript/dashboard.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</body>
</html>
