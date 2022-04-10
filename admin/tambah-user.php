<section id="tambahKamar">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="ff-poppins fs-4">Tambah User</h2>
            </div>

            <div class="card-body">
                <form action="../connect/proses.php?aksi=add_user" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Nama User :</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama User">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Email :</label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Password :</label>
                                <input type="text" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Nomor Induk Kedudukan (NIK) :</label>
                                <input type="number" name="nik" class="form-control" placeholder="Nomor Induk Kedudukan">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Nomor Telepon :</label>
                                <input type="number" class="form-control" name="telepon" placeholder="Nomor Telepon">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Role User :</label>
                                <select name="role" id="" class="form-select" required="required">
                                    <option value="">Pilih Role User</option>
                                    <option value="administrator">Administrator</option>
                                    <option value="petugas">Petugas</option>
                                    <option value="client">Customer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button name="tambah" class="btn btn-success">Tambah Data</button>
                        <a href="menu.php?pages=Data-Users" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>