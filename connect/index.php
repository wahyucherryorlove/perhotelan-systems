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

// Select Customers
function select_user()
{
    $result = query("SELECT * FROM tbl_user");
    return $result;
}
// Select Edit Data Customer
function select_edit_user($kode)
{
    $result = query("SELECT * FROM tbl_user WHERE id = '$kode'");
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

function add_user($add_user)
{
    global $conn;
    $nama = htmlspecialchars(ucwords($add_user['nama']));
    $username = htmlspecialchars($add_user['email']);
    $password = htmlspecialchars(stripslashes(mysqli_escape_string($conn, $add_user['password'])));
    $nik = htmlspecialchars($add_user['nik']);
    $telepon = htmlspecialchars($add_user['telepon']);
    $role = htmlspecialchars($add_user['role']);
    $daftar = date("d-m-Y");

    $password = password_hash($password, PASSWORD_DEFAULT);

    $conn->query("INSERT INTO tbl_user VALUES('','$nama','$username','$password','$nik','$telepon','$role','0','0','$daftar')");

    return mysqli_affected_rows($conn);
}

// Edit Customer
function edit_user($edit_user)
{
    global $conn;
    $kode = htmlspecialchars($edit_user['id']);
    $nama = htmlspecialchars(ucwords($edit_user['nama']));
    $username = htmlspecialchars($edit_user['email']);
    $nik = htmlspecialchars($edit_user['nik']);
    $telepon = htmlspecialchars($edit_user['telepon']);
    $role = htmlspecialchars($edit_user['role']);
    $aktif = htmlspecialchars($edit_user['aktif']);
    $status = htmlspecialchars($edit_user['status']);

    $conn->query("UPDATE tbl_user SET nama = '$nama', username = '$username', nik = '$nik', telepon = '$telepon', role = '$role', aktif = '$aktif', status = '$status' WHERE id = '$kode'");

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
    $aktif = htmlspecialchars($edit_kamar['aktif']);
    $photoLama = htmlspecialchars($edit_kamar['photoLama']);

    if ($_FILES['photo']['error'] === 4) {
        $photo = $photoLama;
    } else {
        $photo = upload();
    }

    $conn->query("UPDATE tbl_kamar SET nama = '$nama', harga = '$harga', keterangan = '$keterangan', aktif = '$aktif', photo = '$photo' WHERE kd_kamar = '$kode'");

    return mysqli_affected_rows($conn);
}

// Delete Customer
function delete_user($kode)
{
    global $conn;
    $conn->query("DELETE FROM tbl_user WHERE kd_user = '$kode'");
    return mysqli_affected_rows($conn);
}

// Delete Hotel Room
function delete_kamar($kode)
{
    global $conn;
    $conn->query("DELETE FROM tbl_kamar WHERE kd_kamar = '$kode'");

    return mysqli_affected_rows($conn);
}

// Reservasi Kamar
function reservasi_kamar($kode)
{
    global $conn;
    $data = $conn->query("SELECT * FROM tbl_kamar WHERE kd_kamar = '$kode'");
    $xx = [];
    while ($x = $data->fetch_assoc()) {
        $xx[] = $x;
    }

    return $xx;
}

// Add Reservasi Kamar
function add_reservasi_kamar($add_reservasi)
{
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
    $user = htmlspecialchars($add_reservasi['user']);

    $conn->query("UPDATE tbl_kamar SET aktif = '1' WHERE kd_kamar = '$kodeKamar'");
    $conn->query("UPDATE tbl_user SET status = '1' WHERE id = '$user'");
    $conn->query("INSERT INTO transaksi VALUES('','$kodeReal','$kodeKamar','$harga','$tglMenginap','$lamaMenginap','$user','1')");

    return mysqli_affected_rows($conn);
}

// Transaksi Pembayaran
function select_data_transaksi()
{
    global $conn;
    $result = query("SELECT * FROM transaksi WHERE status = '1'");
    return $result;
}
function select_data_transaksi_sebelum()
{
    global $conn;
    $result = query("SELECT * FROM transaksi WHERE status = '0'");
    return $result;
}

function select_transaksi_pembayaran($kode)
{
    global $conn;
    $result = query("SELECT * FROM transaksi WHERE kd_transaksi = '$kode'");

    return $result;
}

function edit_reservasi_kamar($edit_transaksi)
{
    global $conn;

    $kode = htmlspecialchars($edit_transaksi['kode']);
    $total = htmlspecialchars($edit_transaksi['total']);
    $bayar = htmlspecialchars($edit_transaksi['bayar']);
    $kembalian = htmlspecialchars($edit_transaksi['kembali']);

    if ($bayar < $total) {
        return false;
    } else {

        $conn->query("UPDATE transaksi SET status = '0' WHERE kd_transaksi = '$kode'");
        $conn->query("INSERT INTO pembayaran VALUES('','$kode','$total','$bayar','$kembalian')");
        return mysqli_affected_rows($conn);
    }
}

// Laporan
function select_laporan()
{
    global $conn;
    $result = query("SELECT * FROM pembayaran");

    return $result;
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
