<!-- resources/views/perencanaan/rakortekbang/index.php -->

<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Lampiran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Pelaporan</a></div>
                <div class="breadcrumb-item"><a href="#">Lampiran</a></div>
                <div class="breadcrumb-item">Data</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Lampiran</h2>
            <p class="section-lead">
                Daftar Lampiran
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lampiran</h4>
                        </div>
                        <div class="card-body">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="buttons" style="margin-top: -20px;">
                        <a href="/lampiran/create" class="btn btn-primary">Tambah Lampiran</a>
                         </div>
                            <div class="table-responsive">
                            <table class="table table-bordered" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama File</th>
                                            <th>Tahun</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($lampiran as $lam) : ?>
                                            <tr>
                                                <td><?= $lam['id']; ?></td>
                                                <td><?= $lam['nama_file']; ?></td>
                                                <td><?= $lam['tahun']; ?></td>
                                                <td>
                                                    <a href="/lampiran/preview/<?= $lam['id']; ?>" class="btn btn-info btn-sm" >Pratinjau</a>
                                                    <a href="/lampiran/download/<?= $lam['id']; ?>" class="btn btn-success btn-sm">Unduh</a>
                                                    <a href="/lampiran/destroy/<?= $lam['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php if (empty($lam)) : ?>
                                            <tr>
                                                <td colspan="4" class="table-no-data">Tidak ada Lampiran.</td>
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

<style>
  .table-no-data {
    text-align: center;
  }
</style>

<?= $this->endSection(); ?>
