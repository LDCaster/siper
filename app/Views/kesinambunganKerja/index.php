<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<?php
$uri = service('uri');
$roles = session('role_id');
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kesinambungan Kinerja</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Kesinambungan Kinerja</h2>
            <p class="section-lead">
                Ini merupakan data Kesinambungan Kinerja yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL DATA KESINAMBUNGAN KINERJA</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Data Triwulan</th>
                                            <th>Data Anggaran</th>
                                            <th>Realisasi Rp. </th>
                                            <th>Realisasi %</th>
                                            <th>Target</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($pelaporans as $pelaporan) : ?>
                                       
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $pelaporan['tw']; ?></td>
                                                <td><?= $pelaporan['sub_kegiatan']; ?> ( <?php echo 'Rp.' . number_format($pelaporan['jumlah']) ?> / <?= $pelaporan['target']; ?> <?= $pelaporan['nama_satuan']; ?>)</td>
                                                <td><?php echo 'Rp.' . number_format($pelaporan['realisasi_nominal']) ?></td>
                                                <td><?= $pelaporan['realisasi_persen']; ?></td>
                                                <td><?= $pelaporan['target']; ?></td>
                                                <td><?= $pelaporan['tahun']; ?></td>
                                              
                                            </tr>
                                        
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?= $this->endSection(); ?>

