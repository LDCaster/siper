<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>BAB IV LAKIP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data BAB IV LAKIP</h2>
            <p class="section-lead">
                Ini merupakan data BAB IV LAKIP yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL BAB IV LAKIP</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="/babvlakip/create" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kesimpulan</th>
                                            <th>Langkah Perbaikan Kinerja Kedepan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($babvlakips as $babvlakip) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $babvlakip['kesimpulan']; ?></td>
                                                <td><?= $babvlakip['perbaikan']; ?></td>
                                                <td>
                                                    <a href="/babvlakip/edit/<?= $babvlakip['id']; ?>" class="btn btn-primary">Edit</a>
                                                    <a href="/babvlakip/delete/<?= $babvlakip['id']; ?>" class="btn btn-danger">Delete</a>
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

