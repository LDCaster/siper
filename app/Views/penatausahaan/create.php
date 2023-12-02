<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Penatausahaan Perpustakaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Penatausahaan</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah Penatausahaan</h2>
            <p class="section-lead">
                Silakan isi formulir di bawah ini.
            </p>

            <!-- Form untuk menambahkan Penatausahaan -->
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Penatausahaan</h4>
                        </div>
                        <div class="card-body">
                            <!-- Form untuk membuat Penatausahaan -->
                            <form action="<?= route_to('penatausahaan/store'); ?>" method="post">
                                <?= csrf_field(); ?>

                                <input type="text" name="status"  value="Perpustakaan" class="form-control"  hidden required>  

                                    

                                <!-- Dropdown/select option untuk memilih Anggaran -->
                                
                                <!-- Dropdown/select option untuk memilih Karyawan -->
                                <div class="form-group">
                                    <label>Karyawan Pihak 1</label>
                                    <select name="karyawan_1" class="form-control">
                                        <option value="">-- Pilih karyawan --</option>
                                        <?php foreach ($karyawans as $karyawan) : ?>
                                            <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Karyawan Pihak 2</label>
                                    <select name="karyawan_2" class="form-control">
                                        <option value="">-- Pilih karyawan --</option>
                                        <?php foreach ($karyawans as $karyawan_1) : ?>
                                            <option value="<?= $karyawan_1['id']; ?>"><?= $karyawan_1['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" required>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="card-footer text-right">
                                    <button class="btn btn-success">Tambah</button>
                                    <a href="<?= route_to('penatausahaan/index'); ?>" class="btn btn-danger">Batal</a>
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
