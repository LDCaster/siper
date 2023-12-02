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
                        <!-- Form untuk mengedit Sub Kegiatan Urusan -->
                        <form action="<?= route_to('sub-kegiatan/update', $subkegiatan['id']); ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Urusan</label>
                                    <input type="text" class="form-control <?= (session('errors.urusan')) ? 'is-invalid' : ''; ?>" id="urusan" name="urusan" value="<?= $subkegiatan['urusan']; ?>">
                                    <?php if (session('errors.urusan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.urusan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Program</label>
                                    <input type="text" class="form-control <?= (session('errors.program')) ? 'is-invalid' : ''; ?>" id="program" name="program" value="<?= $subkegiatan['program']; ?>">
                                    <?php if (session('errors.program')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.program'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Kegiatan</label>
                                    <input type="text" class="form-control <?= (session('errors.kegiatan')) ? 'is-invalid' : ''; ?>" id="kegiatan" name="kegiatan" value="<?= $subkegiatan['kegiatan']; ?>">
                                    <?php if (session('errors.kegiatan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.kegiatan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Sub Kegiatan</label>
                                    <input type="text" class="form-control <?= (session('errors.nama_subkegiatan')) ? 'is-invalid' : ''; ?>" id="nama_subkegiatan" name="nama_subkegiatan" value="<?= $subkegiatan['nama_subkegiatan']; ?>">
                                    <?php if (session('errors.nama_subkegiatan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.nama_subkegiatan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Indikator Sub Kegiatan</label>
                                    <input type="text" class="form-control <?= (session('errors.indikator_subkegiatan')) ? 'is-invalid' : ''; ?>" id="indikator_subkegiatan" name="indikator_subkegiatan" value="<?= $subkegiatan['indikator_subkegiatan']; ?>">
                                    <?php if (session('errors.indikator_subkegiatan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.indikator_subkegiatan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Tombol Submit dan Batal -->
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('/sub-kegiatan'); ?>" class="btn btn-secondary">Batal</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- script dc jquery -->
<?= $this->endSection(); ?>