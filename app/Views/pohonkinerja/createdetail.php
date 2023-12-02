<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Kinerja Bidang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Kinerja Bidang</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah Kinerja Bidang</h2>
            <p class="section-lead">
                Silakan isi formulir di bawah ini.
            </p>

            

            <!-- Form untuk menambahkan Kinerja Bidang -->
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Kinerja Bidang</h4>
                        </div>
                        <div class="card-body">
                            <!-- Form untuk membuat Kinerja Bidang -->
                            <form action="<?= route_to('kinerjabidang/store'); ?>" method="post">
                                <?= csrf_field(); ?>

                                <!-- Dropdown/select option untuk memilih Urusan -->
                                <input type="text" name="id_pohon" value="<?= $pohon['id']; ?>"> <!-- Menggunakan ID anggaran dari variabel $anggaran -->

                                <div class="form-group">
                                    <label>Indikator</label>
                                    <input type="text" name="indikator" class="form-control">
                                </div>

                                <!-- Tombol Submit -->
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form untuk menambahkan Kinerja Bidang -->
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
