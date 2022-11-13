<?php

/**
 * @var mysqli $db
 */

require "../../php/config.php";

if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $konfirmasi = htmlspecialchars($_POST['konfir-password']);

    $query = mysqli_query($db, "SELECT * FROM user 
                                WHERE username = '$username' 
                                AND email = '$email'");
    if (mysqli_fetch_row($query)) {
        echo "
        <script>
            alert('Username atau Email telah digunakan!');
        </script>";
    } else {
        if ($password == $konfirmasi){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = mysqli_query(
                $db,
                "UPDATE user
                SET username = '$username',
                    email = '$email',
                    password = '$password'
                WHERE id - '$id'"
            );
        }
        header("Location:../profil.php");
    }
} else {
    echo "Update profil gagal";
}
