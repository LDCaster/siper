<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Master Pohon Kinerja</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Master Pohon Kinerja</h2>
            <p class="section-lead">
                Ini merupakan data Master pohonkinerja yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL MASTER POHON KINERJA</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="/pohonkinerja/create" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Bidang</th>
                                            <th>Sasaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($pohonkinerjas as $pohonkinerja) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $pohonkinerja['nama_bidang']; ?></td>
                                                <td><?= $pohonkinerja['sasaran']; ?></td>
                                                <td>
                                                
                                                    <!-- <a href="/pohonkinerja/detail/<?= $pohonkinerja['id']; ?>" class="btn btn-success">Detail</a> -->
                                                    <a href="/pohonkinerja/edit/<?= $pohonkinerja['id']; ?>" class="btn btn-primary">Edit</a>
                                                    <a href="/pohonkinerja/delete/<?= $pohonkinerja['id']; ?>" class="btn btn-danger">Delete</a>
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

