<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Master <?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Master <?= $title; ?></h2>
            <p class="section-lead">
                Ini merupakan data Master <?= $title; ?> yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Master <?= $title; ?></h4>
                        </div>
                        <?php if (session('pesan')) : ?>
                                <div class="alert alert-success alert-dismissible mr-3 ml-3">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?= session('pesan'); ?>
                                </div>
                            <?php endif; ?>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="<?= route_to('sub-kegiatan/create'); ?>" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Subkegiatan</th>
                                            <th>Indikator Subkegiatan</th>
                                            <th>Kegiatan</th>
                                            <th>Program</th>
                                            <th>Urusan</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($subkegiatan)) : ?>
                                            <?php $no = 1; ?>
                                            <?php foreach ($subkegiatan as $key => $row) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row['nama_subkegiatan']; ?></td>
                                                    <td><?= $row['indikator_subkegiatan']; ?></td>
                                                    <td><?= $row['kegiatan']; ?></td>
                                                    <td><?= $row['program']; ?></td>
                                                    <td><?= $row['urusan']; ?></td>

                                                    <td>
                                                        <a href="<?= route_to('sub-kegiatan/edit', $row['id']); ?>" class="btn btn-primary">Edit</a>
                                                        <!-- <a href="<?= route_to('sub-kegiatan/delete', $row['id']); ?>" class="btn btn-sm btn-danger">Delete</a> -->
                                                        <a href="<?= base_url('sub-kegiatan/delete/' . $row['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data Sub Kegiatan.</td>
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