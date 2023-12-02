<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Pohon Kinerja</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item"><a href="/pohonkinerja">Master Pohon Kinerja</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit Pohon Kinerja</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="/pohonkinerja/update/<?= $pohonkinerja['id']; ?>" method="post">
                            <div class="card-header">
                                <h4>Edit Data Pohon Kinerja</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Bidang</label>
                                    <input type="text" name="nama_bidang" class="form-control" value="<?= $pohonkinerja['nama_bidang']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Sasaran</label>
                                    <input type="text" name="sasaran" class="form-control" value="<?= $pohonkinerja['sasaran']; ?>" required>
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
