<section id="dataKamar">
    <div class="container">
        <div class="card">
            <div class="card-header d-sm-flex justify-content-between align-items-center">
                <h2 class="mb-3 m-md-0 fs-4 ff-poppins">Laporan Data Kamar</h2>
                <a href="#" class="btn d-block btn-primary">Cetak Data</a>
            </div>
            <div class="card-body">
                <div class="overflow-auto px-2 py-2 overflow-md-hidden">
                    <table class="table text-center table-data">
                        <thead>
                            <tr class="border-bottom border-secondary">
                                <th>#</th>
                                <th>Kode Kamar</th>
                                <th>Tanggal Nginap</th>
                                <th>Lama Nginap</th>
                                <th>Harga</th>
                                <th>Total Masukkan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach (select_laporan() as $hasil) {
                                $queryTransaksi = $conn->query("SELECT * FROM transaksi WHERE kd_transaksi = '$hasil[kd_transaksi]'");
                                $hasilTransaksi = $queryTransaksi->fetch_assoc();

                                $queryKamar = $conn->query("SELECT * FROM tbl_kamar WHERE kd_kamar = '$hasilTransaksi[kd_kamar]'");
                                $hasilKamar = $queryKamar->fetch_assoc();

                                // Total Pendapatan Hotel
                                $sum = $conn->query("SELECT SUM(total) as pendapatan FROM pembayaran");
                                $hasilSum = $sum->fetch_assoc();
                            ?>
                                <tr class="border-bottom border-secondary">
                                    <td><?= $no++; ?></td>
                                    <td><?= $hasilKamar['kd_kamar'] ?></td>
                                    <td><?= date("d-m-Y", strtotime($hasilTransaksi['tgl_reservasi'])); ?></td>
                                    <td><?= date("d-m-Y", strtotime($hasilTransaksi['tgl_reservasi'] . $hasilTransaksi['lama_reservasi'] . "Days")); ?></td>
                                    <td>Rp. <?= $hasilKamar['harga']; ?></td>
                                    <td>Rp. <?= $hasil['total']; ?></td>
                                    <td>
                                        <a href="#" class="btn-sm btn-primary text-decoration-none">Cetak</a> || <a href="#" class="btn-sm text-decoration-none btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="btn-primary user-select-none rounded-2 text-center pt-3 pb-3 mt-2" style="width: 8em;">
                    <h3 class="fs-2"><span class="bi bi-book"></span></h3>
                    <h3 class="fs-6">Pemasukkan</h3>
                    <span class="fs-6">Rp. <?= $hasilSum['pendapatan'] ?? "0"; ?></span>
                </div>
            </div>
        </div>
    </div>
</section>