<section id="dataKamar">
    <div class="container">
        <div class="card">
            <div class="card-header d-sm-flex justify-content-between align-items-center">
                <h2 class="mb-3 m-md-0 fs-4 ff-poppins">Data Kamar</h2>
                <a href="menu.php?pages=Tambah-Data-Kamar" class="btn d-block btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="overflow-auto px-2 py-2 overflow-md-hidden">
                    <table class="table text-center table-data">
                        <thead>
                            <tr class="border-bottom border-secondary">
                                <th>#</th>
                                <th>Kode Kamar</th>
                                <th>Nama Kamar</th>
                                <th>Harga</th>
                                <th>Jenis Kamar</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (select_kamar() as $hasil) { ?>
                                <tr class="border-bottom border-secondary">
                                    <td><?= $no++; ?></td>
                                    <td><?= $hasil['kd_kamar'] ?></td>
                                    <td><?= $hasil['nama'] ?></td>
                                    <td><?= $hasil['harga'] ?></td>
                                    <td class="text-uppercase"><?= $hasil['keterangan'] ?></td>
                                    <td>
                                        <?php
                                        if ($hasil['aktif'] === "1") {
                                            echo "Reservasi";
                                        } else {
                                            echo "Kosong";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="menu.php?pages=Edit-Data-Kamar-Hotel&kode=<?= $hasil['kd_kamar']; ?>" class="btn btn-warning btn-sm">Edit</a> || <a data-href="../connect/proses.php?aksi=delete_kamar&kode=<?= $hasil['kd_kamar'] ?>" class="btn btn-danger btn-sm delete">Delete</a>
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