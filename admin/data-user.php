<section id="dataKamar">
    <div class="container">
        <div class="card">
            <div class="card-header d-sm-flex justify-content-between align-items-center">
                <h2 class="mb-3 m-md-0 fs-4 ff-poppins">Data Customers</h2>
                <a href="menu.php?pages=Tambah-Data-Users" class="btn d-block btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="overflow-auto px-2 py-2 overflow-md-hidden">
                    <table class="table text-center table-data">
                        <thead>
                            <tr class="border-bottom border-secondary">
                                <th>#</th>
                                <th>NIK</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (select_user() as $hasil) { ?>
                                <tr class="border-bottom border-secondary">
                                    <td><?= $no++; ?></td>
                                    <td><?= $hasil['nik'] ?></td>
                                    <td><?= $hasil['nama'] ?></td>
                                    <td><?= $hasil['username'] ?></td>
                                    <td><?= $hasil['telepon'] ?></td>
                                    <td class="text-capitalize"><?= $hasil['role'] ?></td>
                                    <td>
                                        <?php 
                                            if ($hasil['status'] === "1") {
                                                echo "Reservasi";
                                            } else {
                                                echo "Belum Reservasi";
                                            }
                                        ?>
                                    </td>
                                    <td> 
                                        <a href="menu.php?pages=Edit-Data-User&kode=<?= $hasil['id']; ?>" class="btn btn-warning btn-sm">Edit</a> || <a data-href="../connect/proses.php?aksi=delete_user&kode=<?= $hasil['id'] ?>" class="btn btn-danger btn-sm delete">Delete</a>
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