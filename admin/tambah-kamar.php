<section id="tambahKamar">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="ff-poppins fs-4">Tambah Kamar Hotel</h2>
            </div>

            <div class="card-body">
                <form action="../connect/proses.php?aksi=add_kamar" method="post" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="" class="form-label">Nama Kamar</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Kamar">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Harga Sewa</label>
                        <input type="number" class="form-control" name="harga" placeholder="Harga Kamar">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Jenis Kamar Kamar</label>
                        <select name="keterangan" id="" class="form-select">
                            <option value="">Pilih Jenis Kamar</option>
                            <option value="vip">VIP</option>
                            <option value="tamu">Tamu</option>
                            <option value="biasa">Biasa</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Gambar Kamar</label>
                        <input type="file" class="form-control" name="photo">
                    </div>
                    <div class="mt-3">
                        <button name="tambah" class="btn btn-success">Tambah Data</button>
                        <a href="menu.php?pages=Data-Kamar-Hotel" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>