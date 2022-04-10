<section id="dataKamar">
    <div class="container">
        <div class="card">
            <div class="card-header d-sm-flex justify-content-between align-items-center">
                <h2 class="mb-3 m-md-0 fs-4 ff-poppins">Data Transaksi</h2>
            </div>
            <div class="card-body">
                <div class="overflow-auto px-2 py-2 overflow-md-hidden">
                    <table class="table text-center table-data">
                        <thead>
                            <tr class="border-bottom border-secondary">
                                <th>#</th>
                                <th>Kode Transaksi</th>
                                <th>Kode Kamar</th>
                                <th>Total Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach (select_data_transaksi() as $hasil) {
                                $result = $conn->query("SELECT * FROM tbl_kamar WHERE kd_kamar = '$hasil[kd_kamar]'");
                                $hasilKamar = $result->fetch_assoc();
                            ?>
                                <tr class="border-bottom border-secondary">
                                    <td><?= $no++; ?></td>
                                    <td><?= $hasil['kd_transaksi'] ?></td>
                                    <td><?= $hasilKamar['kd_kamar'] ?></td>
                                    <td>Rp. <?= $hasil['harga'] ?></td>
                                    <td>
                                        <a href="menu.php?pages=Transaksi-Kamar&kode=<?= $hasil['kd_transaksi']; ?>" class="btn btn-success btn-sm">Transaksi</a> || <a data-href="../connect/proses.php?aksi=delete_kamar&kode=<?= $hasil['kd_kamar'] ?>" class="btn btn-danger btn-sm delete">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="dataKamarSebelum" style="margin-top: 20px;">
    <div class="container">
        <div class="card">
            <div class="card-header d-sm-flex justify-content-between align-items-center">
                <h2 class="mb-3 m-md-0 fs-4 ff-poppins">Data Transaksi Sebelumnya</h2>
            </div>
            <div class="card-body">
                <div class="overflow-auto px-2 py-2 overflow-md-hidden">
                    <table class="table text-center table-data">
                        <thead>
                            <tr class="border-bottom border-secondary">
                                <th>#</th>
                                <th>Kode Kamar</th>
                                <th>Nama User</th>
                                <th>Tanggal Nginap</th>
                                <th>Lama Nginap</th>
                                <th>Total Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach (select_data_transaksi_sebelum() as $hasil) {
                                $result = $conn->query("SELECT * FROM tbl_kamar WHERE kd_kamar = '$hasil[kd_kamar]'");
                                $hasilKamar = $result->fetch_assoc();
                                $query = $conn->query("SELECT * FROM tbl_user WHERE id = '$hasil[kd_user]'");
                                $hasilUser = $query->fetch_assoc();
                            ?>
                                <tr class="border-bottom border-secondary">
                                    <td><?= $no++; ?></td>
                                    <td><?= $hasilKamar['kd_kamar'] ?></td>
                                    <td><?= $hasilUser['nama'] ?></td>
                                    <td><?= date("d-m-Y", strtotime($hasil['tgl_reservasi'])); ?></td>
                                    <td><?= date("d-m-Y", strtotime($hasil['tgl_reservasi'] . $hasil['lama_reservasi'] . "Days")); ?></td>
                                    <td>Rp. <?= $hasil['harga'] ?></td>
                                    <td>
                                        <a data-href="../connect/proses.php?aksi=delete_kamar&kode=<?= $hasil['kd_kamar'] ?>" class="btn btn-danger btn-sm delete">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>