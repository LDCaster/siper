<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Edit Kinerja Bidang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Kinerja Bidang</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit Kinerja Bidang</h2>
            <p class="section-lead">
                Ini merupakan form untuk mengedit Kinerja Bidang.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- Form untuk mengedit Kinerja Bidang -->
                        <form action="<?= route_to('kinerjabidang/update', $kinerjabidang['id']); ?>" method="post">
                            <?= csrf_field(); ?>

                            <!-- Input untuk nama Indikator Kinerja -->
                            <div class="card-body">
                                 <!-- Dropdown/select option untuk memilih Urusan -->
                                <div class="form-group">
                                            <label>Pohon Kinerja</label>
                                            <select name="id_pohon" class="form-control">
                                                <option value="">-- Pilih Urusan --</option>
                                                <?php foreach ($pohonkinerjas as $pohonkinerja) : ?>
                                                    <option value="<?= $pohonkinerja['id']; ?>" <?= ($pohonkinerja['id'] == $kinerjabidang['id_pohon']) ? 'selected' : ''; ?>><?= $pohonkinerja['nama_bidang']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                    </div>
                                <div class="form-group">
                                    <label>Indikator</label>
                                    <input type="text" name="indikator" class="form-control" value="<?= $kinerjabidang['indikator']; ?>" required>
                                </div>
                            </div>
                            <!-- Tombol Submit dan Batal -->
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= route_to('kinerjabidang/index'); ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
