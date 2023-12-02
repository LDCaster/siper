<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form <?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#"><?= $title; ?></a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form <?= $title; ?></h2>
            <p class="section-lead">
                Silakan isi formulir di bawah ini.
            </p>

            <!-- Form untuk menambahkan Indikator Kinerja Urusan -->
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form <?= $title; ?></h4>
                        </div>
                        <div class="card-body">
                            <!-- Form untuk membuat Indikator Kinerja Urusan -->
                            <form action="<?= route_to('satuan/store'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <!-- Input untuk nama satuan -->
                                <div class="form-group">
                                    <label>Nama Satuan</label>
                                    <input type="text" class="form-control <?= (session('errors.nama_satuan')) ? 'is-invalid' : ''; ?>" id="nama_satuan" name="nama_satuan" placeholder="Tambahkan Nama Satuan" value="<?= old('nama_satuan'); ?>">
                                    <?php if (session('errors.nama_satuan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.nama_satuan'); ?>
                                        </div>
                                    <?php endif; ?>

                                </div>

                                <!-- Tombol Submit -->
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Tambah</button>
                                    <a href="<?= route_to('satuan/index'); ?>" class="btn btn-secondary">Batal</a>
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

<!-- script dc jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?= $this->endSection(); ?>