<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Program</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Program</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Program</h2>
            <p class="section-lead">
                Ini merupakan data Program yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL PROGRAM</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="<?= route_to('program/create'); ?>" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Program</th>
                                            <th>Nama Urusan</th>
                                            <th>Nama Indikator Kinerja</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($programs)) : ?>
                                            <?php $no = 1; ?>
                                            <?php foreach ($programs as $program) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $program['nama_program']; ?></td>
                                                    <td><?= $program['nama_urusan']; ?></td>
                                                    <td><?= $program['nama_indikator_kinerja']; ?></td>
                                                    <td>
                                                        <a href="<?= route_to('program/edit', $program['id']); ?>" class="btn btn-primary">Edit</a>
                                                        <a href="<?= route_to('program/delete', $program['id']); ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data Program.</td>
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
