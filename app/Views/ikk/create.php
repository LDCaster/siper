<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah IKK</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item"><a href="/ikk">Master IKK</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah IKK</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="/ikk/store" method="post">
                            <div class="card-header">
                                <h4>Form Tambah Urusan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Urusan Pemerintahan</label>
                                    <input type="text" name="urusan_pemerintahan" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>IKK Keluaran</label>
                                    <input type="text" name="ikk_keluaran" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>IKK Outcome</label>
                                    <input type="text" name="ikk_outcome" class="form-control" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/ikk" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
