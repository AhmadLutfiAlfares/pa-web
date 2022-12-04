<?php

/**
 * @var mysqli $db
 */

session_start();
require 'php/config.php';

// jika penerbit sudah login
if (isset($_SESSION['loginPublisher'])) {
    header('Location: publisher/myJournal.php');
    exit;
}

if (isset($_POST['submit'])) {
    $email_username = $_POST['email-username'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $db,
        "SELECT * FROM publisher WHERE email='$email_username' OR username='$email_username'"
    );

    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            $result = mysqli_fetch_assoc($query);

            if (password_verify($password, $result['password'])) {
                // set session
                $_SESSION['loginPublisher'] = true;
                // simpan id publisher untuk dipakai di create.php
                $_SESSION['pub_id'] = $result['id'];
                echo "
                <script>
                alert('Login berhasil');
                document.location.href = 'publisher/index.php';
                </script>";
            }
        } else {
            echo "
        <script>
        alert('Username atau password salah');
        </script>";

        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/login.css">
    <link rel="stylesheet" href="stylesheet/style-header-footer.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet"/>
    <title>Login Penerbit</title>
</head>

<body>
<?php
include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Login Penerbit</h5>
                    <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input name="email-username" type="text" class="form-control" id="floatingInput"
                                   placeholder="name@example.com">
                            <label for="floatingInput">Email atau username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="password" type="password" class="form-control" id="floatingPassword"
                                   placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" name="submit"
                                    value="submit" type="submit">Sign
                                in
                            </button>
                        </div>
                        <hr class="my-4">
                        <p>Belum punya akun? <a href="publisher/register.php">Sign Up Sekarang</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="javascript/darkMode.js"></script>
</body>

</html>