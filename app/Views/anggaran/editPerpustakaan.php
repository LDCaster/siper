<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form <?= $title; ?> Perpustakaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#"><?= $title; ?></a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit <?= $title; ?> Perpustakaan</h2>
            <p class="section-lead">
                Ini merupakan form untuk mengedit <?= $title; ?>.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- Form untuk mengedit anggaran Urusan -->
                        <form action="<?php echo base_url('anggaran/update/perpustakaan/' . $anggaran['id']); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <!-- Input untuk pagu -->
                                <div class="form-group">
                                    <label>Pagu Indikatif</label>
                                    <input type="number" class="form-control <?= (session('errors.pagu_indikatif')) ? 'is-invalid' : ''; ?>" id="pagu_indikatif" name="pagu_indikatif" value="<?= $anggaran['pagu_indikatif']; ?>">
                                    <?php if (session('errors.pagu_indikatif')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.pagu_indikatif'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Target</label>
                                    <input type="number" class="form-control <?= (session('errors.target')) ? 'is-invalid' : ''; ?>" id="target" name="target" value="<?= $anggaran['target']; ?>">
                                    <?php if (session('errors.target')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.target'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Tombol Submit dan Batal -->
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="<?= base_url('anggaran/index/perpustakaan'); ?>" class="btn btn-danger">Batal</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>