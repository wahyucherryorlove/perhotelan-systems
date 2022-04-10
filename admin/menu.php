<?php
session_start();
if( !isset($_SESSION['login'])) {
    header("location: ../user/index.html");
    exit;
}

include "../connect/index.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $hotelName = "Clementine Hotel"; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="../assets/bootstrap-icons-1.7.1/bootstrap-icons.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Jquery JS -->
    <script src="../assets/datatables/jquery-3.5.1.js"></script>
    <script src="../assets/datatables/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../assets/datatables/dataTables.bootstrap5.min.css">

    <!-- Sweatalert JS -->
    <script src="../assets/js/sweetalert2@11.js"></script>

</head>

<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light shadow pt-4 pb-4 fixed-top">
        <div class="container">
            <a class="navbar-brand"><?= $hotelName; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar-content">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="menu.php?pages=Dashboard" class="nav-link"><i class="bi bi-house-door-fill pe-1"></i> Home</a></li>
                    <li class="nav-item"><a href="menu.php?pages=Kamar-Hotel" class="nav-link"><i class="bi bi-lamp-fill pe-1"></i> Kamar Hotel</a></li>
                    <li class="nav-item"><a href="menu.php?pages=Data-Users" class="nav-link"><i class="bi bi-people-fill pe-1"></i> Management User</a>
                    <li class="nav-item"><a href="menu.php?pages=Transaksi" class="nav-link"><i class="bi bi-bookmark-fill pe-1"></i> Transaksi</a></li>
                    <li class="nav-item"><a href="menu.php?pages=Laporan" class="nav-link"><i class="bi bi-book-fill pe-1"></i> Laporan</a></li>
                    <li class="nav-item"><a href="../user/logout.php" class="nav-link"><i class="bi bi-door-open-fill pe-1"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </header>

    <?php
    $no = 1;
    if (isset($_GET['pages'])) {
        $pages = $_GET['pages'];
    }

    switch ($pages) {
        case 'Dashboard':
            include "dashboard.php";
            break;
        case 'Kamar-Hotel':
            include "kamar.php";
            break;
        case 'Data-Kamar-Hotel':
            include "data-kamar.php";
            break;
        case 'Edit-Data-Kamar-Hotel':
            include "edit-kamar.php";
            break;
        case 'Tambah-Data-Kamar':
            include "tambah-kamar.php";
            break;
        case 'Data-Users':
            include "data-user.php";
            break;
        case 'Edit-Data-User':
            include "edit-user.php";
            break;
        case 'Tambah-Data-Users':
            include "tambah-user.php";
            break;
        case 'Reservasi-Kamar-Hotel':
            include "reservasi.php";
            break;
        case 'Transaksi':
            include "data-transaksi.php";
            break;
        case 'Transaksi-Kamar':
            include "transaksi.php";
            break;
        case 'Proses-Data':
            include "../connect/proses.php";
            break;
        case 'Laporan':
            include "laporan.php";
            break;
        default:
            include "../404/404.html";
            break;
    }
    ?>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/datatables/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(() => {
            // Button Delete
            $(".delete").on("click", function() {
                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "Yakin ingin menghapus data ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = $(this).attr("data-href");
                        window.location.href = url;
                    }
                })
            });
            // Button Reservasi
            $(".reservasi").on("click", function() {
                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "Yakin ingin mereservasi ruangan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, reservation it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var urll = $(this).attr("data-href");
                        window.location.href = urll;
                    }
                })
            });

            // Data Tables
            $(".table-data").DataTable();
        });
    </script>
</body>

</html>