<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit BAB 1 LAKIP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Bab 1 LAKIP</div>
                <div class="breadcrumb-item">Edit Bab 1 LAKIP</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit BAB 1 LAKIP</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?= route_to('bab1lakip/update', $bab1lakip['id']); ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Edit BAB 1 LAKIP</h4>
                            </div>
                            <div class="card-body">
                            <!-- Form untuk membuat Bab 1 lakip -->
                            <div class="form-group">
                                    <label>Status Laporan</label>
                                    <select class="form-control" id="status_laporan" name="status_laporan">
                                        <option value="">-- Pilih Status Laporan --</option>
                                        <option value="AKTIF" <?php if ($bab1lakip['status_laporan'] === 'AKTIF') echo 'selected'; ?>>AKTIF</option>
                                        <option value="BACKUP" <?php if ($bab1lakip['status_laporan'] === 'BACKUP') echo 'selected'; ?>>BACKUP</option>
                                    </select>
                                </div>
                           
                                <div class="form-group">
                                    <label>Sumber Daya Manusia</label>
                                    <select name="id_karyawan" class="form-control">
                                        <?php foreach ($karyawans as $karyawan) : ?>
                                            <option value="<?= $karyawan['id']; ?>" <?= ($karyawan['id'] == $bab1lakip['id_karyawan']) ? 'selected' : ''; ?>><?= $karyawan['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                               
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= route_to('bab1lakip/index'); ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
