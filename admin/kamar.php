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
                <h2 class="ff-poppins fs-4 mb-3 m-md-0 d-block">Kamar Hotel</h2>
                <a href="menu.php?pages=Data-Kamar-Hotel" class="btn btn-outline-primary d-block">Data Kamar</a>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <?php foreach (select_kamar() as $x) { ?>
                        <div class="col-lg-3">
                            <div class="card shadow mb-3">
                                <div class="card-body">
                                    <div class="head text-center">
                                        <img src="../assets/profile/<?= $x['photo'] ?>" alt="Background1" style="height: 200px; width: 100%;" class="img-thumbnail">
                                    </div>
                                    <div class="body mt-1">
                                        <table class="table border border-secondary">
                                            <tr>
                                                <td colspan="2"><?= $x['nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-secondary">Harga</td>
                                                <td>Rp. <?= $x['harga'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-secondary">Jenis Kamar</td>
                                                <td><?= $x['keterangan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-secondary">Keterangan</td>
                                                <td>
                                                    <?php
                                                    if ($x === "0") {
                                                        echo "Belum Reservasi";
                                                    } else {
                                                        echo "Reservasi";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-secondary">
                                                    <?php
                                                    if ($x['aktif'] === "0") {
                                                    ?>
                                                        <a href="menu.php?pages=Reservasi-Kamar-Hotel&kode=<?= $x['kd_kamar']; ?>" class="btn btn-sm btn-success">Reservasi</a>
                                                    <?php } else {
                                                        echo '<a class="btn btn-sm btn-danger disabled">Reservasi</a>';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $x['kd_kamar'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>