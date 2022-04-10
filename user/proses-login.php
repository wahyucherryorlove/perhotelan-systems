<?php
session_start();
require "../connect/index.php";

if (isset($_POST['login'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    $query = $conn->query("SELECT * FROM tbl_user WHERE username = '$username'");

    if (mysqli_num_rows($query) === 1) {
        $result = $query->fetch_array();

        if (password_verify($password, $result['password'])) {
            $_SESSION['nama_user'] = $result['nama'];
            $_SESSION['login'] = true;
            $_SESSION['status1'] = $result['role'];

            if ($_SESSION['status1'] === "administrator") {
                header("location: ../admin/menu.php?pages=Dashboard");
                exit;
            }
        }
    }
    $error = true;
}

if (isset($error)) {
    echo
    "<script>
        alert('Username atau Password Anda Salah');
        document.location.href = 'index.html';
    </script>";
}
