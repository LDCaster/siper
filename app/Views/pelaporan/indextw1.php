<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pelaporan Triwulan I</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Pelaporan Triwulan I</h2>
            <p class="section-lead">
                Ini merupakan data Pelaporan Triwulan I yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL DATA PELAPORAN TRIWULAN I</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="/tw1/createtw1" class="btn btn-primary">Tambah Data</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Data Anggaran</th>
                                            <th>Realisasi Rp. </th>
                                            <th>Realisasi %</th>
                                            <th>Target</th>
                                            <th>Tahun</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($pelaporans as $pelaporan) : ?>
                                       
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $pelaporan['sub_kegiatan']; ?> ( <?php echo 'Rp.' . number_format($pelaporan['jumlah']) ?> / <?= $pelaporan['target']; ?> <?= $pelaporan['nama_satuan']; ?>)</td>
                                                <td><?php echo 'Rp.' . number_format($pelaporan['realisasi_nominal']) ?></td>
                                                <td><?= $pelaporan['realisasi_persen']; ?></td>
                                                <td><?= $pelaporan['target']; ?></td>
                                                <td><?= $pelaporan['tahun']; ?></td>
                                                <td>
                                                    <!-- <a href="<?= route_to('pelaporan/edit', $pelaporan['id']); ?>" class="btn btn-primary">Edit</a> -->
                                                    
                                                    <a href="<?= route_to('tw1/destroytw1', $pelaporan['id']); ?>" class="btn btn-danger">Delete</a>
                                                </td>
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

