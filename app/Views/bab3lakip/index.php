<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>BAB III LAKIP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data BAB III LAKIP</h2>
            <p class="section-lead">
                Ini merupakan data BAB III LAKIP yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL BAB III LAKIP</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="/bab3lakip/create" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Capaian</th>
                                            <th>Penyebab Keberhasilan/Kegagalan atau Peningkatan/Penurunan</th>
                                            <th>Alternatif Solusi</th>
                                            <th>Analisis Penggunaan Sumber Daya</th>
                                            <th>Analisis Program Kegiatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($bab3lakips as $bab3lakip) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $bab3lakip['narasi_capaian']; ?></td>
                                                <td><?= $bab3lakip['penyebab']; ?></td>
                                                <td><?= $bab3lakip['alternatif']; ?></td>
                                                <td><?= $bab3lakip['analisis_sumberdaya']; ?></td>
                                                <td><?= $bab3lakip['analisis_program_kegiatan']; ?></td>
                                                <td><?= $bab3lakip['tahun']; ?></td>

                                                <td>
                                                    <!-- <a href="/bab3lakip/edit/<?= $bab3lakip['id']; ?>" class="btn btn-primary">Edit</a> -->
                                                    <a href="/bab3lakip/delete/<?= $bab3lakip['id']; ?>" class="btn btn-danger">Delete</a>
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

