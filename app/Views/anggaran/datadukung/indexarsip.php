<!-- resources/views/perencanaan/rakortekbang/index.php -->

<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Dukung Penganggaran Kearsipan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">penganggaran Kearsipan</a></div>
                <div class="breadcrumb-item"><a href="#">Data Dukung Penganggaran Kearsipan</a></div>
                <div class="breadcrumb-item">Data</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Dukung Penganggaran Kearsipan</h2>
            <p class="section-lead">
                Daftar data Dukung Penganggaran Kearsipan
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Dukung Penganggaran Kearsipan</h4>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success">
                                    <?= session()->getFlashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="/ddanggaran/createarsip" class="btn btn-primary">Tambah Data Dukung</a>
                                <a href="<?= base_url('/anggaran/index/kearsipan'); ?>" class="btn btn-dark">Kembali</a>
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
                                        <?php $no = 1; ?>
                                        <?php foreach ($dd_anggaran as $dd) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $dd['nama_file']; ?></td>
                                                <td><?= $dd['tahun']; ?></td>
                                                <td>
                                                    <a href="/ddanggaran/previewarsip/<?= $dd['id']; ?>" class="btn btn-info btn-sm">Pratinjau</a>
                                                    <a href="/ddanggaran/download/<?= $dd['id']; ?>" class="btn btn-success btn-sm">Unduh</a>
                                                    <a href="/ddanggaran/deletearsip/<?= $dd['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php if (empty($dd_anggaran)) : ?>
                                            <tr>
                                                <td colspan="4" class="table-no-data">Tidak ada data dukung Penganggaran Kearsipan.</td>
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