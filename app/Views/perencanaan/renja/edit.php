<!-- resources/views/perencanaan/rakortekbang/update.php -->

<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Update Renja</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Perencanaan</a></div>
                <div class="breadcrumb-item"><a href="#">Renja</a></div>
                <div class="breadcrumb-item">Update</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Update Renja</h2>
            <p class="section-lead">
                Silakan isi formulir di bawah ini untuk memperbarui Renja.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Update Renja</h4>
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
                            <form action="<?= route_to('perencanaan/update', $perencanaan['id']); ?>" method="post">
                                <?= csrf_field(); ?>

                               

                                <!-- Input Pagu Indikatif -->
                                <div class="form-group">
                                    <label for="pagu_indikatif">Pagu Indikatif</label>
                                    <input type="text" class="form-control" id="pagu_indikatif" name="pagu_indikatif" placeholder="Masukkan pagu indikatif" value="<?= $perencanaan['pagu_indikatif']; ?>">
                                </div>

                                <!-- Input Target -->
                                <div class="form-group">
                                    <label for="target">Target</label>
                                    <input type="text" class="form-control" id="target" name="target" placeholder="Masukkan target" value="<?= $perencanaan['target']; ?>">
                                </div>


                                <!-- pilihan Status Tujuan -->
                                <div class="form-group">
                                    <label>Status Tujuan</label>
                                    <select class="form-control" id="status_tujuan" name="status_tujuan">
                                        <option value="">-- Pilih Status Tujuan --</option>
                                        <option value="KEARSIPAN" <?php if ($perencanaan['status_tujuan'] === 'KEARSIPAN') echo 'selected'; ?>>KEARSIPAN</option>
                                        <option value="PERPUSTAKAAN" <?php if ($perencanaan['status_tujuan'] === 'PERPUSTAKAAN') echo 'selected'; ?>>PERPUSTAKAAN</option>
                                        <option value="SEKRETARIAT" <?php if ($perencanaan['status_tujuan'] === 'SEKRETARIAT') echo 'selected'; ?>>SEKRETARIAT</option>
                                    </select>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="card-footer text-right">
                                    <button class="btn btn-success">Update</button>
                                    <a href="<?= route_to('perencanaan/index/renja'); ?>" class="btn btn-danger">Batal</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- JavaScript untuk Dropdown Berantai -->
<?= $this->endSection(); ?>

