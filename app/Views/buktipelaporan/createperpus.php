<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Bukti Pelaporan Perpustakaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Bukti Pelaporan</div>
                <div class="breadcrumb-item">Tambah Bukti Pelaporan </div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Bukti Pelaporan Perpustakaan</h2>
            <p class="section-lead">
                Silakan isi form berikut untuk menambahkan Bukti pelaporan.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Bukti Pelaporan Perpustakaan</h4>
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
                            <form action="<?= route_to('buktipelaporan/storeperpus'); ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>

                                <div class="form-group">
                                    <label>Data Anggaran</label>
                                    <select name="id_anggaran" class="form-control">
                                        <option value="">-- Pilih Data Anggaran --</option>
                                        <?php foreach ($anggarans as $anggaran) : ?>
                                            <option value="<?= $anggaran['id']; ?>"><?= $anggaran['sub_kegiatan']; ?>, Jumlah Anggaran <?php echo 'Rp.' . number_format($anggaran['jumlah']) ?>, Target: <?= $anggaran['target']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nama_file">Nama File</label>
                                    <input type="text" name="nama_file" class="form-control" required>
                                </div>
                               
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="number" name="tahun" class="form-control" min="1900" max="2099" step="1" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="file">Unggah File PDF</label>
                                    <input type="file" name="file" class="form-control-file" accept=".pdf" required>
                                </div>
                                <input type="text" name="status_data"  value="PERPUSTAKAAN" class="form-control"  hidden required>
                                <input type="text" name="status_verifikasi"  value="MENUNGGU" class="form-control"  hidden required>
                                <input type="text" name="status_persetujuan"  value="MENUNGGU" class="form-control"  hidden required>

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
