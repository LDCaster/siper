<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Indikator</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Indikator</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Indikator</h2>
            <p class="section-lead">
                Ini merupakan data Indikator yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL INDIKATOR</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="<?= route_to('indikator/create'); ?>" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Indikator Sub Kegiatan</th>
                                            <th>Nama Urusan</th>
                                            <th>Nama Indikator Kinerja</th>
                                            <th>Nama Program</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Nama Sub Kegiatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($indikators)) : ?>
                                            <?php $no = 1; ?>
                                            <?php foreach ($indikators as $indikator) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $indikator['nama_indikator']; ?></td>
                                                    <td><?= $indikator['nama_urusan']; ?></td>
                                                    <td><?= $indikator['nama_indikator_kinerja']; ?></td>
                                                    <td><?= $indikator['nama_program']; ?></td>
                                                    <td><?= $indikator['nama_kegiatan']; ?></td>
                                                    <td><?= $indikator['nama_subkegiatan']; ?></td>
                                                    <td>
                                                        <a href="<?= route_to('indikator/edit', $indikator['id']); ?>" class="btn btn-primary">Edit</a>
                                                        <a href="<?= route_to('indikator/delete', $indikator['id']); ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data Indikator Sub Kegiatan.</td>
                                            </tr>
                                        <?php endif; ?>
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
