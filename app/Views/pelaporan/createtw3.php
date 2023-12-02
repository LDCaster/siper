<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Triwulan III </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Triwulan III</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah Triwulan III</h2>
            <p class="section-lead">
                Silakan isi formulir di bawah ini.
            </p>

            <!-- Form untuk menambahkan Triwulan 1 -->
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Triwulan III</h4>
                        </div>
                        <div class="card-body">
                            <!-- Form untuk membuat pelaporan -->
                            <form action="<?= route_to('tw3/storetw3'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail111">Status Data</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span></div>                             -->
                                            <select class="form-control" name="status" hidden >
                                                <option value="LAKIP">LAKIP</option>
                                            </select>
                                        <!-- </div>
                                    </div> -->

                                <!-- Dropdown/select option untuk memilih Anggaran -->
                                <div class="form-group">
                                    <label>Data Anggaran</label>
                                    <select name="id_anggaran" class="form-control">
                                        <option value="">-- Pilih Data Anggaran --</option>
                                        <?php foreach ($anggarans as $anggaran) : ?>
                                            <option value="<?= $anggaran['id']; ?>"><?= $anggaran['sub_kegiatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Data Bukti</label>
                                    <select name="id_bukti" class="form-control">
                                        <option value="">-- Pilih Data Bukti --</option>
                                        <?php foreach ($bukti as $bk) : ?>
                                            <option value="<?= $bk['id']; ?>"><?= $bk['nama_file']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Input untuk nama Indikator Kinerja -->
                                <div class="form-group">
                                    <label>Realisasi (Rp.)</label>
                                    <input type="number" name="realisasi_nominal" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Realisasi (%)</label>
                                    <input type="number" name="realisasi_persen" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="number" name="tahun" min ="1900" max="2900" class="form-control">
                                </div>

                                <input type="hidden" name="tw" value="TW-3">
                                <input type="hidden" name="status_backup" value="AKTIF">

                                
                               
                                <!-- Tombol Submit -->
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Tambah</button>
                                    <!-- <a href="<?= route_to('penatausahaan/index'); ?>" class="btn btn-secondary">Batal</a> -->
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
