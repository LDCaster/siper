<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Dukung</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Data Dukung</div>
                <div class="breadcrumb-item">Tambah Data Dukung</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Data Dukung</h2>
            <p class="section-lead">
                Silakan isi form berikut untuk menambahkan data Dukung.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Data Dukung</h4>
                        </div>
                        <div class="card-body">
                            <!-- Menampilkan pesan kesalahan jika ada -->
                            <?php if (session()->has('errors')): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php foreach (session('errors') as $error): ?>
                                            <li><?= esc($error) ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <form action="<?= route_to('ddperencanaan/store'); ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="nama_file">Nama File</label>
                                    <input type="text" name="nama_file" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="file">Unggah File PDF</label>
                                    <input type="file" name="file" class="form-control-file" accept=".pdf" required>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="number" name="tahun" class="form-control" min="1900" max="2099" step="1" required>
                                </div>
                                <select class="form-control" id="status_file" name="status_file" >
                                        <option value="RAKORTEKBANG" selected>RAKORTEKBANG</option>
                                        <option value="RENJA" selected>RENJA</option>
                                        <option value="LAINNYA" selected>LAINNYA</option>
                                    </select>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
