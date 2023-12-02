<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>BAB II LAKIP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data BAB II LAKIP</h2>
            <p class="section-lead">
                Ini merupakan data BAB II LAKIP yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL BAB II LAKIP</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="/bab2lakip/create" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Visi</th>
                                            <th>Misi</th>
                                            <th>Tujuan dan Sasaran</th>
                                            <th>Indikator Kinerja Utama</th>
                                            <th>Perjanjian Kinerja</th>
                                            <th>Program Kegiatan</th>
                                            <th>Tahun</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($bab2lakips as $bab2lakip) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $bab2lakip['visi']; ?></td>
                                                <td><?= $bab2lakip['misi']; ?></td>
                                                <td><?= $bab2lakip['tujuan_sasaran']; ?></td>
                                                <td><?= $bab2lakip['indikator_kinerja_utama']; ?></td>
                                                <td><?= $bab2lakip['perjanjian_kinerja']; ?></td>
                                                <td><?= $bab2lakip['program_kegiatan']; ?></td>
                                                <td><?= $bab2lakip['tahun']; ?></td>
                                                <td>
                                                    <!-- <a href="/bab2lakip/edit/<?= $bab2lakip['id']; ?>" class="btn btn-primary">Edit</a> -->
                                                    <a href="/bab2lakip/delete/<?= $bab2lakip['id']; ?>" class="btn btn-danger">Delete</a>
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

