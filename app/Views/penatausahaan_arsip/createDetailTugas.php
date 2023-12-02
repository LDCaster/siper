<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Tugas</h1>
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
                            <form action="<?= base_url('penatausahaan_arsip/storeDetailTugas'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id_penatausahaan" value="<?= $detail_penatausahaan_arsip['id_penatausahaan']; ?>"> <!-- Menggunakan ID anggaran dari variabel $detail_penatausahaan_arsip -->
                                <input type="hidden" name="id_anggota" value="<?= $detail_penatausahaan_arsip['id']; ?>"> <!-- Menggunakan ID anggaran dari variabel $detail_penatausahaan_arsip -->

                                <div class="form-group">
                                    <label>Pilih Pohon</label>
                                    <select class="form-control" id="id_pohon" name="id_pohon">
                                        <option value="">-- Pilih Pohon --</option>
                                        <?php foreach ($pohon as $pohonItem) : ?>
                                            <option value="<?= $pohonItem['id']; ?>"><?= $pohonItem['nama_bidang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pilih Kinerja</label>
                                    <select class="form-control" id="id_kinerja_bidang" name="id_kinerja_bidang">
                                        <option value="">-- Pilih kinerja --</option>
                                        <?php foreach ($kinerja as $kinerjaItem) : ?>
                                            <option value="<?= $kinerjaItem['id']; ?>"><?= $kinerjaItem['indikator']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Target</label>
                                    <input type="text" name="target" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('penatausahaan_arsip/index'); ?>" class="btn btn-secondary">Kembali</a>
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
