<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Sweatalert -->
    <script src="../assets/js/sweetalert2@11.js"></script>
</head>

<body>

    <?php
    require "index.php";
    $aksi = $_GET['aksi'];
    if ($aksi === "add_kamar") {
        if (isset($_POST['tambah'])) {
            if (add_kamar($_POST) > 0) {
                echo
                "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Berhasil Di Tambah',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Mengerti',
                        timer: 2000, 
                    }).then(()=> {
                        document.location.href = '../admin/menu.php?pages=Data-Kamar-Hotel';
                    });
                </script>";
            }
        }
    } elseif ($aksi === "edit_kamar") {
        if (isset($_POST['edit'])) {
            if (edit_kamar($_POST) > 0) {
                echo
                "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Berhasil Di Edit',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Mengerti',
                        timer: 2000,
                    }).then(()=> {
                        document.location.href = '../admin/menu.php?pages=Data-Kamar-Hotel';
                    });
                </script>";
            } else {
                echo
                "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps',
                        text: 'Data Gagal Di Edit',
                        confirmButtonColor: '#DD3333',
                        confirmButtonText: 'Batalkan',
                        timer: 2000,
                    }).then(()=> {
                        document.location.href = '../admin/menu.php?pages=Data-Kamar-Hotel';
                    });
                </script>";
            }
        }
    } elseif ($aksi === "delete_kamar") {
        $kode = $_GET['kode'];
        if (delete_kamar($kode) > 0) {
            echo
            "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Berhasil Di Delete',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Mengerti',
                    timer: 2000,
                }).then(()=> {
                    document.location.href = '../admin/menu.php?pages=Data-Kamar-Hotel';
                });
            </script>";
        }
    } elseif ($aksi === "add_reservasi") {
        if (isset($_POST['reservasi'])) {
            if (add_reservasi_kamar($_POST) > 0) {
                echo
                "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Berhasil Di Reservasi',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Mengerti',
                        timer: 2000,
                    }).then(()=> {
                        document.location.href = '../admin/menu.php?pages=Kamar-Hotel';
                    });
                </script>";
            }
        }
    } elseif ($aksi === "edit_reservasi") {
        if (isset($_POST['edit'])) {
            if (edit_reservasi_kamar($_POST) > 0) {
                echo
                "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Transaksi Berhasil',
                        text: 'Terima Kasih Telah Membayar Management Hotel Kami...',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Mengerti',
                        timer: 2000,
                    }).then(()=> {
                        document.location.href = '../admin/menu.php?pages=Transaksi';
                    });
                </script>";
            } else {
                echo
                "<script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Transaksi Gagal',
                        text: 'Silahkan Periksa Kembali Uang Anda Apakah Tidak Kurang!',
                        confirmButtonColor: '#DD3333',
                        confirmButtonBorder: '#DD333',
                        confirmButtonText: 'Batalkan',
                        timer: 4000,
                    }).then(()=> {
                        document.location.href = '../admin/menu.php?pages=Transaksi';
                    });
                </script>";
            }
        }
    } elseif ($aksi === "add_user") {
        if (isset($_POST['tambah'])) {
            if (add_user($_POST) > 0) {
                echo
                "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Berhasil Di Tambah',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Mengerti',
                        timer: 2000,
                    }).then(()=> {
                        document.location.href = '../admin/menu.php?pages=Data-Users';
                    });
                </script>";
            }
        }
    } elseif ($aksi === "edit_user") {
        if (isset($_POST['edit'])) {
            if (edit_user($_POST) > 0) {
                echo
                "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Berhasil Di Edit',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Mengerti',
                        timer: 2000,
                    }).then(()=> {
                        document.location.href = '../admin/menu.php?pages=Data-Users';
                    });
                </script>";
            } else {
                echo
                "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps',
                        text: 'Data Gagal Di Edit',
                        confirmButtonColor: '#DD3333',
                        confirmButtonText: 'Batalkan',
                        timer: 2000,
                    }).then(()=> {
                        document.location.href = '../admin/menu.php?pages=Data-Users';
                    });
                </script>";
            }
        }
    } elseif ($aksi === "delete_user") {
        $kode = $_GET['kode'];
        if (delete_user($kode) > 0) {
            echo
            "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Berhasil Di Delete',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Mengerti',
                    timer: 2000,
                }).then(()=> {
                    document.location.href = '../admin/menu.php?pages=Data-Users';
                });
            </script>";
        }
    }



    ?>

</body>

</html>