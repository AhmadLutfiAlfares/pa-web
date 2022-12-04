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
    <title>Submission Artikel | Journable</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link rel="stylesheet" href="/publisher/stylesheet/index.css">
    <link rel="stylesheet" href="/stylesheet/style-header-footer.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet"/>
    <link href="/publisher/stylesheet/dashboard.css" rel="stylesheet">
</head>
<body>

<?php
include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <h1 class="h2">Antrian Artikel</h1>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul Artikel</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Judul Jurnal</th>
                    <th scope="col">Tanggal upload</th>
                    <th scope="col">Tindakan</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = mysqli_query(
                    $db,
                    "SELECT
                            artikel.id,
                            artikel.title,
                            user.username AS author,
                            journal.title AS journal_title,
                            artikel_file,
                            date_upload,
                            status
                        FROM artikel
                        JOIN user ON artikel.id_user = user.id
                        JOIN journal ON artikel.id_journal = journal.id
                        JOIN publisher ON journal.id_publisher = publisher.id
                        WHERE publisher.id = $id AND status = 'pending';"
                );
                $i = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['author'] ?></td>
                        <td><?= $row['journal_title'] ?></td>
                        <td><?= date('d M Y', strtotime($row['date_upload'])) ?></td>
                        <td>
                            <a href="<?= '/users/' . $row['artikel_file'] ?>">
                                <button type="button" class="btn btn-primary btn-sm">
                                    <i class="bi bi-file-arrow-down-fill"></i>Download
                                </button>
                            </a>
                            <a href="php/approve.php?id=<?= $row['id'] ?>">
                                <button type="button" class="btn btn-primary btn-sm">Approve</button>
                            </a>
                            <a href="rejectArticle.php?id=<?= $row['id'] ?>">
                                <button type="button" class="btn btn-secondary btn-sm">Reject</button>
                            </a>
                        </td>
                    </tr>
                    <?php $i++;
                } ?>
                </tbody>
            </table>
        </div>
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
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
<script src="/publisher/javascript/dashboard.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</body>
</html>
