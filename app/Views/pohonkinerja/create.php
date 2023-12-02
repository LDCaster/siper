<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Pohon Kinerja</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item"><a href="/pohonkinerja">Master Pohon kinerja</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah Pohon Kinerja</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="/pohonkinerja/store" method="post">
                            <div class="card-header">
                                <h4>Form Tambah Pohon Kinerja</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Bidang</label>
                                    <input type="text" name="nama_bidang" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Sasaran</label>
                                    <input type="text" name="sasaran" class="form-control" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/pohonkinerja" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
