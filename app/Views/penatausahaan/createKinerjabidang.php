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
                            <form action="<?= base_url('penatausahaan/storeKinerjabidang'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id_penatausahaan" value="<?= $penatausahaan['id']; ?>"> <!-- Menggunakan ID anggaran dari variabel $anggaran -->

                                <div class="form-group">
                                    <label>Data Kinerja Bidang</label>
                                    <select name="id_kinerja_bidang" class="form-control">
                                        <option value="">-- Pilih Data Kinerja Bidang --</option>
                                        <?php foreach ($kinerjas as $anggaran) : ?>
                                            <option value="<?= $anggaran['id']; ?>"><?= $anggaran['nama_bidang']; ?>, <?= $anggaran['sasaran']; ?>, <?= $anggaran['indikator']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Input Target -->
                                <div class="form-group">
                                    <label for="target">Target</label>
                                    <input type="text" class="form-control" id="target" name="target" placeholder="Masukkan target">
                                </div>

                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select class="form-control" id="id_satuan" name="id_satuan">
                                        <option value="">-- Pilih Satuan --</option>
                                        <?php foreach ($satuans as $satuanItem) : ?>
                                            <option value="<?= $satuanItem['id']; ?>"><?= $satuanItem['nama_satuan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('penatausahaan/showKinerjabidang/'. $penatausahaan['id']); ?>" class="btn btn-secondary">Kembali</a>
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
