<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Master IKK</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Master IKK</h2>
            <p class="section-lead">
                Ini merupakan data Master IKK yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL MASTER IKK</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="/ikk/create" class="btn btn-primary">Tambah</a>
                                <a href="/ikk/cetak" class="btn btn-warning">Cetak</a>
                                <a href="/ikk/preview" class="btn btn-dark">Preview</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Urusan Pemerintahan</th>
                                            <th>IKK Keluaran</th>
                                            <th>IKK Outcome</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($ikks as $ikk) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $ikk['urusan_pemerintahan']; ?></td>
                                                <td><?= $ikk['ikk_keluaran']; ?></td>
                                                <td><?= $ikk['ikk_outcome']; ?></td>
                                                <td>
                                                    <a href="/ikk/edit/<?= $ikk['id']; ?>" class="btn btn-primary">Edit</a>
                                                    <a href="/ikk/delete/<?= $ikk['id']; ?>" class="btn btn-danger">Delete</a>
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

