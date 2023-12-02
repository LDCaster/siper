<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data <?= $title; ?> Sekretariat</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data <?= $title; ?> Sekretariat</h2>
            <p class="section-lead">
                Ini merupakan data <?= $title; ?> Sekretariat yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel <?= $title; ?> Sekretariat</h4>
                        </div>
                        <?php if (session('pesan')) : ?>
                        <div class="alert alert-success alert-dismissible mr-3 ml-3">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= session('pesan'); ?>
                        </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <!-- <a href="<?= base_url('anggaran/create/sekretariat'); ?>" class="btn btn-primary">Tambah</a> -->
                                    <a href="<?= base_url('/anggaran/cetakSekre'); ?>" class="btn btn-warning">Cetak</a>
                                <a href="<?= base_url('/anggaran/previewCetakSekre'); ?>" class="btn btn-dark">Preview</a>
                                <a href="<?= base_url('ddanggaransekre'); ?>" class="btn btn-success">Data Dukung</a>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>
                                            <center>Data Perencanaan</center>
                                            </th>
                                            <th>Pagu Indikatif</th>
                                            <th>Target</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($anggaran)) : ?>
                                        <?php $no = 1; ?>
                                        <?php foreach ($anggaran as $key => $row) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama_subkegiatan']; ?>, <?php echo 'Rp.' . number_format($row['perencanaan_pagu']) ?> / <?= $row['perencanaan_target']; ?> <?= $row['nama_satuan']; ?></td>
                                            <td><?php echo 'Rp.' . number_format($row['pagu_indikatif']) ?> </td>
                                            <td><?= $row['target'] ?> <?= $row['nama_satuan']; ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Aksi">
                                                    <a href="<?= base_url('anggaran/edit/sekretariat/' . $row['id']); ?>"
                                                        class="btn btn-primary mr-2 mb-2" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url('anggaran/delete/sekretariat/' . $row['id']); ?>"
                                                        class="btn btn-danger mb-2" title="Hapus"
                                                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else : ?>
                                        <tr>
                                            <td colspan="11" class="text-center">Tidak ada data Anggaran.</td>
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