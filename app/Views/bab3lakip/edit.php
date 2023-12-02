<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit BAB IV LAKIP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item"><a href="/bab3lakip">Master BAB IV LAKIP</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit BAB IV LAKIP</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="/bab3lakip/update/<?= $bab3lakip['id']; ?>" method="post">
                            <div class="card-header">
                                <h4>Edit Data BAB IV LAKIP</h4>
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <label>Penyebab Keberhasilan/Kegagalan atau Peningkatan/Penurunan</label>
                                        <input type="text" name="penyebab" class="form-control" value="<?= $bab3lakip['penyebab']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alternatif Solusi</label>
                                        <input type="text" name="alternatif" class="form-control" value="<?= $bab3lakip['alternatif']; ?>"required>
                                    </div>
                                    <div class="form-group">
                                        <label> Analisis Penggunaan Sumber Daya</label>
                                        <input type="text" name="analisis_sumberdaya" class="form-control" value="<?= $bab3lakip['analisis_sumberdaya']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Analisis Program Kegiatan</label>
                                        <input type="text" name="analisis_program_kegiatan" class="form-control" value="<?= $bab3lakip['analisis_program_kegiatan']; ?>" required>
                                    </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/bab3lakip" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
