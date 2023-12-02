<?= $this->extend('templates/main'); ?>
<script type=”text/javascript” src=”ckeditor/ckeditor.js”></script>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form BAB 1 LAKIP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Bab 1 LAKIP</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah Bab 1 LAKIP</h2>
            <p class="section-lead">
                Silakan isi formulir di bawah ini.
            </p>

            <!-- Form untuk menambahkan Penatausahaan -->
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Bab 1 LAKIP</h4>
                        </div>
                        <div class="card-body">
                        <?php if (session()->has('errors')): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php foreach (session('errors') as $error): ?>
                                            <li><?= esc($error) ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <form action="<?= route_to('bab1lakip/store'); ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>

                             
                                 <div class="row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Latar Belakang</label> <br>
                                            <!-- <input type="text" name="latar_belakang" class="form-control" required> -->
                                            <textarea name="latar_belakang" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Narasi Struktur</label> <br>
                                            <!-- <input type="text" name="misi" class="form-control" required> -->
                                            <textarea name="narasi_struktur" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Foto Struktur</label> <br>
                                            <input type="file" name="foto_struktur" class="form-control-file" accept=".jpg" required>
                                            <!-- <textarea name="tujuan_sasaran" class="ckeditor" cols="38" rows="5" required></textarea> -->
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Narasi Foto</label> <br>
                                            <!-- <input type="text" name="latar_belakang" class="form-control" required> -->
                                            <textarea name="narasi_foto" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Permasalahan Utama</label> <br>
                                            <!-- <input type="text" name="misi" class="form-control" required> -->
                                            <textarea name="permasalahan_utama" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Produk Layanan</label> <br>
                                            <!-- <input type="file" name="foto_struktur" class="form-control" required> -->
                                            <textarea name="produk_layanan" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                            <label>Sistematika</label> <br>
                                            <!-- <input type="file" name="foto_struktur" class="form-control" required> -->
                                            <textarea name="sistematika" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-lg-4"> 
                                <div class="form-group">
                                            <label>Tahun</label> <br>
                                            <input type="number" name="tahun" class="form-control" required>
                                            <!-- <textarea name="sistematika" class="ckeditor" cols="38" rows="5" required></textarea> -->
                                 </div>

                                 </div>
                                 <input type="text" name="status_laporan"  value="AKTIF" class="form-control"  hidden required>

                                </div>


                                <!-- Tombol Submit -->
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Tambah</button>
                                    <a href="<?= route_to('bab1lakip/index'); ?>" class="btn btn-secondary">Batal</a>
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
