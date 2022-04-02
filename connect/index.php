<?php
// Koneksi
$host = "localhost";
$username = "root";
$password = "";
$database = "perhotelan";
$conn = mysqli_connect($host, $username, $password, $database);

// Sweatalert
function add()
{
    $add =
    "<script>
        Swal.fire({
            icon: 'error',
            title: 'Opps',
            text: 'Data Gagal Di Tambah',
            confirmButtonColor: '#DD3333',
            confirmButtonText: 'Batalkan'
        })
    </script>";
}

function edit()
{
    $add =
    "<script>
        Swal.fire({
            icon: 'error',
            title: 'Opps',
            text: 'Data Gagal Di Edit',
            confirmButtonColor: '#DD3333',
            confirmButtonText: 'Batalkan'
        })
    </script>";
}

// Function Query
function query($query)
{
    global $conn;
    $result = $conn->query($query);
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}

// Select Data Kamar
function select_kamar()
{
    $result = query("SELECT * FROM tbl_kamar");
    return $result;
}

// Select Edit Data Kamar
function select_edit_kamar($kode)
{
    $result = query("SELECT * FROM tbl_kamar WHERE kd_kamar = '$kode'");
    return $result;
}

// Insert Kamar Hotel
function add_kamar($add_kamar)
{
    global $conn;
    $kodeKamar = $conn->query("SELECT max(kd_kamar) as kode_kamar FROM tbl_kamar");
    $kodeKamar = $kodeKamar->fetch_assoc();
    $kodeKamar = $kodeKamar['kode_kamar'];
    $number = (int) substr($kodeKamar, 3, 3);
    $number++;
    $text = "KMR";
    $kode = $text . sprintf("%03s", $number);

    $nama = htmlspecialchars(ucwords($add_kamar['nama']));
    $harga = htmlspecialchars($add_kamar['harga']);
    $keterangan = htmlspecialchars($add_kamar['keterangan']);

    $photo = upload();

    $conn->query("INSERT INTO tbl_kamar VALUES('','$kode','$nama','$harga','$keterangan','0','$photo')");

    return mysqli_affected_rows($conn);
}

// Edit/Update Hotel Room
function edit_kamar($edit_kamar)
{
    global $conn;
    $kode = $edit_kamar['kode'];
    $nama = htmlspecialchars(ucwords($edit_kamar['nama']));
    $harga = htmlspecialchars($edit_kamar['harga']);
    $keterangan = htmlspecialchars($edit_kamar['keterangan']);
    $photoLama = htmlspecialchars($edit_kamar['photoLama']);

    if ($_FILES['photo']['error'] === 4) {
        $photo = $photoLama;
    } else {
        $photo = upload();
    }

    $conn->query("UPDATE tbl_kamar SET nama = '$nama', harga = '$harga', keterangan = '$keterangan', photo = '$photo' WHERE kd_kamar = '$kode'");

    return mysqli_affected_rows($conn);
}

// Delete Hotel Room
function delete_kamar($kode) {
    global $conn;
    $conn->query("DELETE FROM tbl_kamar WHERE kd_kamar = '$kode'");

    return mysqli_affected_rows($conn);
}

// Reservasi Kamar
function reservasi_kamar($kode) {
    global $conn;
    $data = $conn->query("SELECT * FROM tbl_kamar WHERE kd_kamar = '$kode'");
    $xx = [];
    while ($x = $data->fetch_assoc()) {
        $xx[] = $x;
    }

    return $xx;
}

// Add Reservasi Kamar
function add_reservasi_kamar($add_reservasi) {
    global $conn;
    $kodeTransaksiDetail = $conn->query("SELECT max(kd_transaksi) as kode_transaksi FROM transaksi");
    $kodeTransaksi = $kodeTransaksiDetail->fetch_assoc();
    $kodeTransaksi = $kodeTransaksi['kode_transaksi'];
    $number = (int) substr($kodeTransaksi, 4, 4);
    $number++;
    $text = "RSVS";
    $kodeReal = $text . sprintf("%03s", $number);


    $kodeKamar = htmlspecialchars($add_reservasi['kode']);
    $lamaMenginap = htmlspecialchars($add_reservasi['lamaMenginap']);
    $harga = ($add_reservasi['harga'] * $lamaMenginap);
    $tglMenginap = date('Y-m-d');

    $conn->query("UPDATE tbl_kamar SET aktif = '1' WHERE kd_kamar = '$kodeKamar'");
    $conn->query("INSERT INTO transaksi VALUES('','$kodeReal','$kodeKamar','$harga','$tglMenginap','$lamaMenginap','002','1')");

    return mysqli_affected_rows($conn);
}

function upload()
{
    global $add;
    $namaFile = $_FILES['photo']['name'];
    $size = $_FILES['photo']['size'];
    $tempat = $_FILES['photo']['tmp_name'];

    // Ekstensi File
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        add();
        return false;
    }

    // Size File
    if ($size > 6000000) {
        add();
        return false;
    }

    // Random File Name
    $fileNewName = rand();
    $fileNewName .= ".";
    $fileNewName .= $ekstensiGambar;

    // Tempat File Sementara
    move_uploaded_file($tempat, "../assets/profile/" . $fileNewName);
    
    return $fileNewName;
}
