<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Edit <?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#"><?= $title; ?></a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit <?= $title; ?></h2>
            <p class="section-lead">
                Ini merupakan form untuk mengedit <?= $title; ?>.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- Form untuk mengedit Satuan Urusan -->
                        <form action="<?= route_to('satuan/update', $satuan['id']); ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Satuan</label>
                                    <input type="text" class="form-control <?= (session('errors.nama_satuan')) ? 'is-invalid' : ''; ?>" id="nama_satuan" name="nama_satuan" value="<?= $satuan['nama_satuan']; ?>">
                                    <?php if (session('errors.nama_satuan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.nama_satuan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- Tombol Submit dan Batal -->
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= route_to('satuan/index'); ?>" class="btn btn-secondary">Batal</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>