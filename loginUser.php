<?php

/**
 * @var mysqli $db
 */

session_start();
require 'php/config.php';

// jika user sudah login

if (isset($_POST['submit'])) {
    if (isset($_POST['email-username'])) {
        $user = $_POST['email-username'];
        $password = $_POST['password'];

        $query = mysqli_query(
            $db,
            "SELECT * FROM user WHERE email = '$user' OR username = '$user'"
        );

        if ($query) {
            if (mysqli_num_rows($query) > 0) {
                $result = mysqli_fetch_assoc($query);
                $username = $result['username'];
                if (password_verify($password, $result['password'])) {
                    // set session
                    $_SESSION['loginUser'] = true;
                    // simpan id user untuk dipakai di bookmark.php
                    $_SESSION['id_user'] = $result['id'];
                    // memanggil username
                    echo "
                    <script>
                    alert('Login berhasil! Selamat datang $username');
                    document.location.href = 'users/halamanUser.php';
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


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/style-header-footer.css" />
    <link rel="stylesheet" href="stylesheet/login.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&family=Work+Sans&display=swap" rel="stylesheet"/>
    <title>Journable | Login User</title>
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
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Login User</h5>
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
                        <p>Belum punya akun? <a href="users/register.php">Sign Up Sekarang</a></p>
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
<<<<<<< HEAD
<script src="javascript/darkmode.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
=======
<script src="/javascript/darkMode.js"></script>
>>>>>>> e2d5b1bfaf0e464be9cc6df4cd0237dc4e7b0217
</body>

</html>