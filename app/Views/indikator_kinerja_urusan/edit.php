<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Edit Indikator Kinerja Urusan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Indikator Kinerja Urusan</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit Indikator Kinerja Urusan</h2>
            <p class="section-lead">
                Ini merupakan form untuk mengedit Indikator Kinerja Urusan.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- Form untuk mengedit Indikator Kinerja Urusan -->
                        <form action="<?= route_to('indikator-kinerja-urusan/update', $indikatorKinerjaUrusan['id']); ?>" method="post">
                            <?= csrf_field(); ?>

                            <!-- Input untuk nama Indikator Kinerja -->
                            <div class="card-body">
                                 <!-- Dropdown/select option untuk memilih Urusan -->
                                <div class="form-group">
                                            <label>Subkegiatan</label>
                                            <select name="id_subkegiatan" class="form-control">
                                                <option value="">-- Pilih Subkegiatan --</option>
                                                <?php foreach ($subkegiatans as $subkegiatan) : ?>
                                                    <option value="<?= $subkegiatan['id']; ?>" <?= ($subkegiatan['id'] == $indikatorKinerjaUrusan['id_subkegiatan']) ? 'selected' : ''; ?>><?= $subkegiatan['nama_subkegiatan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                    </div>
                                <div class="form-group">
                                    <label>Nama Indikator Kinerja</label>
                                    <input type="text" name="nama_indikator_kinerja" class="form-control" value="<?= $indikatorKinerjaUrusan['nama_indikator_kinerja']; ?>" required>
                                </div>
                            </div>
                            <!-- Tombol Submit dan Batal -->
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= route_to('indikator-kinerja-urusan/index'); ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
