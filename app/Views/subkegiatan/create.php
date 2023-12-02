<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form <?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#"><?= $title; ?></a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form <?= $title; ?></h2>
            <p class="section-lead">
                Silakan isi formulir di bawah ini.
            </p>

            <!-- Form untuk menambahkan Sub Kegiatan -->
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form <?= $title; ?></h4>
                        </div>
                        <div class="card-body">
                            <!-- Form untuk menambahkan Sub Kegiatan -->
                            <form action="<?= route_to('sub-kegiatan/store'); ?>" method="post">
                                <?= csrf_field(); ?>

                                <div class="form-group">
                                    <label>Urusan</label>
                                    <input type="text" class="form-control <?= (session('errors.urusan')) ? 'is-invalid' : ''; ?>" id="urusan" name="urusan" placeholder="Tambahkan Nama Urusan" value="<?= old('urusan'); ?>">
                                    <?php if (session('errors.urusan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.urusan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Program</label>
                                    <input type="text" class="form-control <?= (session('errors.program')) ? 'is-invalid' : ''; ?>" id="program" name="program" placeholder="Tambahkan Nama Program" value="<?= old('program'); ?>">
                                    <?php if (session('errors.program')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.program'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Kegiatan</label>
                                    <input type="text" class="form-control <?= (session('errors.kegiatan')) ? 'is-invalid' : ''; ?>" id="kegiatan" name="kegiatan" placeholder="Tambahkan Nama Kegiatan" value="<?= old('kegiatan'); ?>">
                                    <?php if (session('errors.kegiatan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.kegiatan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Sub Kegiatan</label>
                                    <input type="text" class="form-control <?= (session('errors.nama_subkegiatan')) ? 'is-invalid' : ''; ?>" id="nama_subkegiatan" name="nama_subkegiatan" placeholder="Tambahkan Nama Sub Kegiatan" value="<?= old('nama_subkegiatan'); ?>">
                                    <?php if (session('errors.nama_subkegiatan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.nama_subkegiatan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Indikator Sub Kegiatan</label>
                                    <input type="text" class="form-control <?= (session('errors.indikator_subkegiatan')) ? 'is-invalid' : ''; ?>" id="indikator_subkegiatan" name="indikator_subkegiatan" placeholder="Tambahkan Indikator Sub Kegiatan" value="<?= old('indikator_subkegiatan'); ?>">
                                    <?php if (session('errors.indikator_subkegiatan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.indikator_subkegiatan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Tambah</button>
                                    <a href="<?= base_url('/sub-kegiatan'); ?>" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form untuk menambahkan Sub Kegiatan -->
        </div>
    </section>
</div>


<?= $this->endSection(); ?>
