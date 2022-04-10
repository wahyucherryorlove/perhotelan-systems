<section id="dataKamar">
    <div class="container">
        <div class="card">
            <div class="card-header d-sm-flex justify-content-between align-items-center">
                <h2 class="mb-3 m-md-0 fs-4 ff-poppins">Data Transaksi Pembayaran</h2>
            </div>
            <form action="../connect/proses.php?aksi=edit_reservasi" method="post">
                <div class="card-body">
                    <div class="overflow-auto overflow-md-hidden">
                        <table class="table text-center table-borderless">
                            <thead>
                                <tr class="border-bottom border-secondary">
                                    <th>#</th>
                                    <th>Kode Transaksi</th>
                                    <th>Kode Kamar</th>
                                    <th>Total Harga</th>
                                    <th>Tanggal Menginap</th>
                                    <th>Lama Menginap</th>
                                    <th>Jenis Kamar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach (select_transaksi_pembayaran($_GET['kode']) as $hasil) {
                                    $result = $conn->query("SELECT * FROM tbl_kamar WHERE kd_kamar = '$hasil[kd_kamar]'");
                                    $hasilKamar = $result->fetch_assoc();
                                ?>
                                    <tr class="border-bottom border-secondary">
                                        <td><?= $no++; ?></td>
                                        <td><?= $hasil['kd_transaksi'] ?></td>
                                        <td class="fw-bold text-danger"><?= $hasilKamar['kd_kamar'] ?></td>
                                        <td class="fw-bold text-success">Rp. <?= $hasil['harga'] ?></td>
                                        <td><?= date("d-m-Y", strtotime($hasil['tgl_reservasi'])); ?></td>
                                        <td>
                                            <?= date("d-m-Y", strtotime($hasil['tgl_reservasi'] . $hasil['lama_reservasi'] . "Days")); ?>
                                        </td>
                                        <td class="text-uppercase fw-bold text-warning"><?= $hasilKamar['keterangan'] ?></td>
                                    </tr>
                                    <input type="hidden" value="<?= $hasil['kd_transaksi'] ?>" name="kode">
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Pembayaran :</label>
                        <input type="hidden" value="<?= $hasil['harga'] ?>" name="total" onkeyup="sum();" id="total">
                        <input type="number" class="form-control" placeholder="Rp. xxxxxxx" name="bayar" onkeyup="sum();" id="bayar" required>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Kembalian :</label>
                        <input type="number" class="form-control" name="kembali" id="kembali" readonly>
                    </div>
                    <hr>
                    <div class="mt-2">
                        <button class="btn btn-primary w-100" name="edit">Transaksi Pembayaran</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    function sum() {
        var result = parseInt(document.querySelector("#bayar").value) - parseInt(document.querySelector("#total").value);

        if (!isNaN(result)) {
            document.querySelector("#kembali").value = result;
        }
    }
</script>