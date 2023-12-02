<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Pohon</a></div>
                <div class="breadcrumb-item">Detail Pohon</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail Pohon</h2>
            <p class="section-lead">
                Ini adalah detail Pohon.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL DATA POHON</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                                   
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Bidang </th>
                                            <th>Sasaran</th>
                                            <th>Indikator</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($detail as $pohonkinerja) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $pohonkinerja['nama_bidang']; ?></td>
                                                <td><?= $pohonkinerja['sasaran']; ?></td>
                                                <td><?= $pohonkinerja['indikator']; ?></td>
                                                <td>
                                               
                                                </a>
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

        </div>
    </section>
</div>

<?= $this->endSection(); ?>
