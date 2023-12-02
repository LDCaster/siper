<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Indikator Kinerja Urusan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Indikator Kinerja Urusan</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah Indikator Kinerja Urusan</h2>
            <p class="section-lead">
                Silakan isi formulir di bawah ini.
            </p>

            <!-- Form untuk menambahkan Indikator Kinerja Urusan -->
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Indikator Kinerja Urusan</h4>
                        </div>
                        <div class="card-body">
                            <!-- Form untuk membuat Indikator Kinerja Urusan -->
                            <form action="<?= route_to('indikator-kinerja-urusan/store'); ?>" method="post">
                                <?= csrf_field(); ?>

                                <!-- Dropdown/select option untuk memilih Urusan -->
                                <div class="form-group">
                                    <label>Subkegiatan</label>
                                    <select name="id_subkegiatan" class="form-control">
                                        <option value="">-- Pilih Subkegiatan --</option>
                                        <?php foreach ($subkegiatans as $subkegiatan) : ?>
                                            <option value="<?= $subkegiatan['id']; ?>"><?= $subkegiatan['nama_subkegiatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Input untuk nama Indikator Kinerja -->
                                <div class="form-group">
                                    <label>Nama Indikator Kinerja</label>
                                    <input type="text" name="nama_indikator_kinerja" class="form-control">
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
            <!-- End Form untuk menambahkan Indikator Kinerja Urusan -->
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
