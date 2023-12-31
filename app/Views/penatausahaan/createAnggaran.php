<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Anggaran Perjanjian Kinerja</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <?php if (session()->has('success')) : ?>
                                <div class="alert alert-success">
                                    <?= session('success') ?>
                                </div>
                            <?php elseif (session()->has('error')) : ?>
                                <div class="alert alert-danger">
                                    <?= session('error') ?>
                                </div>
                            <?php endif; ?>
                            <!-- Form detail anggaran disini -->
                            <form action="<?= base_url('penatausahaan/storeAnggaran'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id_penatausahaan" value="<?= $penatausahaan['id']; ?>"> <!-- Menggunakan ID anggaran dari variabel $anggaran -->

                                <div class="form-group">
                                    <label>Data Anggaran</label>
                                    <select name="id_anggaran" class="form-control">
                                        <option value="">-- Pilih Data Anggaran --</option>
                                        <?php foreach ($anggarans as $anggaran) : ?>
                                            <option value="<?= $anggaran['id']; ?>"><?= $anggaran['nama_subkegiatan']; ?>, Jumlah Anggaran <?php echo 'Rp.' . number_format($anggaran['pagu_indikatif']) ?>, Target: <?= $anggaran['target']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('penatausahaan/showAnggaran/'. $penatausahaan['id']); ?>" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                            <!-- End form detail anggaran -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
