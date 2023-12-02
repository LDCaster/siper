<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit BAB IV LAKIP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item"><a href="/babvlakip">Master BAB IV LAKIP</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit BAB IV LAKIP</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="/babvlakip/update/<?= $babvlakip['id']; ?>" method="post">
                            <div class="card-header">
                                <h4>Edit Data BAB IV LAKIP</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="number" name="tahun" class="form-control" min=1900 max= 2900 value="<?= $babvlakip['tahun']; ?>" required>
                                </div>
                            
                            <!-- <div class="form-group">
                                    <label for="exampleInputEmail111">Status Data</label>
                                    <div class="input-group">
                                            <select class="form-control" name="status_laporan" >
                                                <option value="AKTIF">AKTIF</option>
                                                <option value="BACKUP">BACKUP</option>
                                                
                                            </select>
                                        </div>
                                    </div> -->
                            
                                <div class="form-group">
                                    <label>Status Laporan</label>
                                    <select class="form-control" id="status_laporan" name="status_laporan">
                                        <option value="">-- Pilih Status Laporan --</option>
                                        <option value="AKTIF" <?php if ($babvlakip['status_laporan'] === 'AKTIF') echo 'selected'; ?>>AKTIF</option>
                                        <option value="BACKUP" <?php if ($babvlakip['status_laporan'] === 'BACKUP') echo 'selected'; ?>>BACKUP</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kesimpulan</label>
                                    <input type="text" name="kesimpulan" class="form-control" value="<?= $babvlakip['kesimpulan']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Langkah Perbaikan Kinerja Kedepan</label>
                                    <input type="text" name="perbaikan" class="form-control" value="<?= $babvlakip['perbaikan']; ?>" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/babvlakip" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
