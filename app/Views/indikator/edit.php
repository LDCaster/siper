<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Indikator Sub Kegiatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Indikator Sub Kegiatan</div>
                <div class="breadcrumb-item">Edit Indikator Sub Kegiatan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit Indikator Sub Kegiatan</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?= route_to('indikator/update', $indikator['id']); ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Edit Indikator Sub Kegiatan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pilih Urusan</label>
                                    <select name="id_urusan" id="id_urusan" class="form-control">
                                        <?php foreach ($urusans as $urusan) : ?>
                                            
                                            <option value="<?= $urusan['id']; ?>" <?= ($urusan['id'] == $indikator['id_urusan']) ? 'selected' : ''; ?>><?= $urusan['nama_urusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Indikator Kinerja</label>
                                    <select name="id_indikator_kinerja_urusan" id="id_indikator_kinerja_urusan" class="form-control">
                                        <?php foreach ($indikator_kinerja_urusan as $indikator_kin) : ?>
                                            <option value="<?= $indikator_kin['id']; ?>" <?= ($indikator_kin['id'] == $indikator['id_indikator_kinerja_urusan']) ? 'selected' : ''; ?>><?= $indikator_kin['nama_indikator_kinerja']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih program</label>
                                    <select name="id_program" id="id_program" class="form-control">
                                        <?php foreach ($programs as $program) : ?>
                                            <option value="<?= $program['id']; ?>" <?= ($program['id'] == $indikator['id_program']) ? 'selected' : ''; ?>><?= $program['nama_program']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih kegiatan</label>
                                    <select name="id_kegiatan" id="id_kegiatan" class="form-control">
                                        <?php foreach ($kegiatans as $kegiatan) : ?>
                                            <option value="<?= $kegiatan['id']; ?>" <?= ($kegiatan['id'] == $indikator['id_kegiatan']) ? 'selected' : ''; ?>><?= $kegiatan['nama_kegiatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Subkegiatan</label>
                                    <select name="id_subkegiatan" id="id_subkegiatan" class="form-control">
                                        <?php foreach ($subkegiatans as $subkegiatan) : ?>
                                            <option value="<?= $subkegiatan['id']; ?>" <?= ($subkegiatan['id'] == $indikator['id_subkegiatan']) ? 'selected' : ''; ?>><?= $subkegiatan['nama_subkegiatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_indikator">Nama Indikator Sub Kegiatan</label>
                                    <input type="text" name="nama_indikator" id="nama_indikator" class="form-control" value="<?= $indikator['nama_indikator']; ?>" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= route_to('indikator/index'); ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
