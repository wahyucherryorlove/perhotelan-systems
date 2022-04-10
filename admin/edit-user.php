<section id="tambahKamar">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="ff-poppins fs-4">Edit Users</h2>
            </div>

            <div class="card-body">
                <form action="../connect/proses.php?aksi=edit_user" method="post">
                    <?php
                    foreach (select_edit_user($_GET['kode']) as $hasil) :
                    ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="" class="form-label">Nama User :</label>
                                    <input type="hidden" name="id" value="<?= $hasil['id'] ?>">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama User" value="<?= $hasil['nama'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Email :</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $hasil['username'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Nomor Induk Kedudukan (NIK) :</label>
                                    <input type="number" name="nik" class="form-control" placeholder="Nomor Induk Kedudukan" value="<?= $hasil['nik'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Status Pemesanan :</label>
                                    <select name="status" id="" class="form-select">
                                        <option value="<?= $hasil['status'] ?>">
                                            <?php
                                            if ($hasil['status'] === "1") {
                                                echo "Sudah Reservasi";
                                            } else {
                                                echo "Belum Reservasi";
                                            }
                                            ?>
                                        </option>
                                        <option value="1">Sudah Reservasi</option>
                                        <option value="0">Belum Reservasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="" class="form-label">Nomor Telepon :</label>
                                    <input type="number" class="form-control" name="telepon" placeholder="Nomor Telepon" value="<?= $hasil['telepon'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Role User :</label>
                                    <select name="role" id="" class="form-select">
                                        <option value="<?= $hasil['role'] ?>"><?= $hasil['role'] ?></option>
                                        <option value="administrator">Administrator</option>
                                        <option value="petugas">Petugas</option>
                                        <option value="client">Customer</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Aktif User :</label>
                                    <select name="aktif" id="" class="form-select">
                                        <option value="<?= $hasil['aktif'] ?>"><?= $hasil['aktif'] ?></option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <button name="edit" class="btn btn-success">Edit Data</button>
                                    <a href="menu.php?pages=Data-Users" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
        </div>
    </div>
</section>