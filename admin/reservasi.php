<style>
    @import '../assets/fonts/poppins.css';

    #Kamar .table tr td {
        font-size: 16px;
    }

    #Kamar .table tr:nth-child(3) td:nth-child(1) {
        font-size: 14px;
    }

    #Kamar .table tr:nth-child(4) td:nth-child(2) {
        font-size: 14px;
    }
</style>

<section id="Kamar">
    <div class="container">
        <div class="card shadow">
            <div class="head card-header d-md-flex align-items-center justify-content-between">
                <h2 class="ff-poppins fs-4 mb-3 m-md-0 d-block">Reservasi Kamar Hotel</h2>
            </div>
            <div class="card-body">
                <form action="../connect/proses.php?aksi=add_reservasi" method="POST" class="data-1">
                    <div class="row justify-content-center">
                        <?php
                        $kode = $_GET['kode'];
                        foreach (reservasi_kamar($kode) as $hasil) :
                        ?>
                            <input type="hidden" name="kode" value="<?= $hasil['kd_kamar'] ?>">
                            <input type="hidden" name="harga" value="<?= $hasil['harga'] ?>">
                            <div class="d-md-flex d-block">
                                <div class="text-center">
                                    <img src="../assets/profile/<?= $hasil['photo'] ?>" alt="Room Image" class="img-thumbnail">
                                </div>
                                <div class="ms-md-5 ms-0 mt-4 mt-md-2">
                                    <table>
                                        <tr>
                                            <td class="fs-6 ff-poppins">Kode Kamar</td>
                                            <td class="px-2 py-2">:</td>
                                            <td class="fs-6 ff-poppins fw-bold text-danger"><?= $hasil['kd_kamar'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fs-6 ff-poppins">Nama Kamar</td>
                                            <td class="px-2 py-2">:</td>
                                            <td class="fs-6 ff-poppins"><?= $hasil['nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fs-6 ff-poppins">Jenis Kamar</td>
                                            <td class="px-2 py-2">:</td>
                                            <td class="fs-6 ff-poppins text-uppercase fw-bold text-warning"><?= $hasil['keterangan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fs-6 ff-poppins">Harga</td>
                                            <td class="px-2 py-2">:</td>
                                            <td class="fs-6 ff-poppins fw-bold text-success">Rp. <?= $hasil['harga'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fs-6 ff-poppins w-25">Keterangan</td>
                                            <td class="px-2 py-2">:</td>
                                            <td class="fs-6 ff-poppins">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium aspernatur asperiores provident reiciendis magni alias temporibus eveniet nemo at necessitatibus.</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <hr class="mt-3">
                    <div class="mb-2 align-items-center">
                        <label for="" class="form-label">Lama Menginap :</label>
                        <input type="number" class="form-control" name="lamaMenginap" placeholder="Lama Menginap" required max="30">
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Nama User</label>
                        <select class="form-select" name="user" required id="user">
                            <option value="">Pilih User</option>
                            <?php
                            $sqlUser = $conn->query("SELECT * FROM tbl_user WHERE status = '0'");
                            while ($hasilUser = $sqlUser->fetch_assoc()) :
                            ?>
                                <option value="<?= $hasilUser['id'] ?>"><?= $hasilUser['nama'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
            </div>
            <button class="btn btn-success w-100" name="reservasi">Room Reservation</button>
            </form>
        </div>
    </div>
    </div>
</section>