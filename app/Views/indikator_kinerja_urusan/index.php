<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Master Indikator Kinerja Urusan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Master Indikator Kinerja Urusan</h2>
            <p class="section-lead">
                Ini merupakan data Master Indikator Kinerja Urusan yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL MASTER Indikator Kinerja Urusan</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="<?= route_to('indikator-kinerja-urusan/create'); ?>" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Indikator Kinerja</th>
                                            <th>Subkegiatan</th>
                                            <th>Indikator Subkegiatan</th>
                                            <th>Kegiatan</th>
                                            <th>Program</th>
                                            <th>Urusan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($indikatorKinerjaUrusan)) : ?>
                                            <?php $no = 1; ?>
                                            <?php foreach ($indikatorKinerjaUrusan as $key => $ikUrusan) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $ikUrusan['nama_indikator_kinerja']; ?></td>
                                                    <td><?= $ikUrusan['nama_subkegiatan']; ?></td>
                                                    <td><?= $ikUrusan['indikator_subkegiatan']; ?></td>
                                                    <td><?= $ikUrusan['kegiatan']; ?></td>
                                                    <td><?= $ikUrusan['program']; ?></td>
                                                    <td><?= $ikUrusan['urusan']; ?></td>
                                                    <td>
                                                        <a href="<?= route_to('indikator-kinerja-urusan/edit', $ikUrusan['id']); ?>" class="btn btn-primary">Edit</a>
                                                        <a href="<?= route_to('indikator-kinerja-urusan/delete', $ikUrusan['id']); ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data Indikator Kinerja Urusan.</td>
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
