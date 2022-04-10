<section id="editKamar">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="ff-poppins fs-4">Edit Kamar Hotel</h2>
            </div>

            <div class="card-body">
                <form action="../connect/proses.php?aksi=edit_kamar" method="post" enctype="multipart/form-data">
                    <?php
                    $kode = $_GET['kode'];
                    foreach (select_edit_kamar($kode) as $hasil) {
                    ?>
                        <div class="mb-2">
                            <label for="" class="form-label">Kode Kamar</label>
                            <input type="text" class="form-control" name="kode" placeholder="Kode Kamar" value="<?= $hasil['kd_kamar']; ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Nama Kamar</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Kamar" value="<?= $hasil['nama']; ?>">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Harga Sewa</label>
                            <input type="number" class="form-control" name="harga" placeholder="Harga Kamar" value="<?= $hasil['harga']; ?>">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Jenis Kamar Kamar</label>
                            <select name="keterangan" id="" class="form-select text-uppercase">
                                <option value="<?= $hasil['keterangan']; ?>"><?= $hasil['keterangan'] ?></option>
                                <option value="vip">VIP</option>
                                <option value="tamu">Tamu</option>
                                <option value="biasa">Biasa</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Status Kamar</label>
                            <select name="aktif" id="" class="form-select">
                                <option value="<?= $hasil['aktif']; ?>">
                                    <?php
                                    if ($hasil['aktif'] === "0") {
                                        echo "Tidak Di Reservasi";
                                    } else {
                                        echo "Di Reservasi";
                                    }
                                    ?>
                                </option>
                                <option value="0">Tidak Di Reservasi</option>
                                <option value="1">Di Reservasi</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Gambar Kamar</label>
                            <input type="hidden" name="photoLama" id="" value="<?= $hasil['photo'] ?>">
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <div class="mt-3">
                            <button name="edit" class="btn btn-success">Edit Data</button>
                            <a href="menu.php?pages=Data-Kamar-Hotel" class="btn btn-danger">Kembali</a>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</section>