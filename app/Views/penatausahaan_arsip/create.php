<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Penatausahaan Bidang Penyelenggaraan Kearsipan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Penatausahaan</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah Penatausahaan Bidang Penyelenggaraan Kearsipan</h2>
            <p class="section-lead">
                Silakan isi formulir di bawah ini.
            </p>

            <!-- Form untuk menambahkan Penatausahaan -->
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Penatausahaan Bidang Penyelenggaraan Kearsipan</h4>
                        </div>
                        <div class="card-body">
                            <!-- Form untuk membuat Penatausahaan -->
                            <form action="<?= route_to('penatausahaan_arsip/store'); ?>" method="post">
                                <?= csrf_field(); ?>

                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail111">Status Data</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span></div>                            
                                            <select class="form-control" name="status" >
                                                <option value="Kearsipan" >Kearsipan</option>
                                                
                                            </select>
                                        </div>
                                    </div> -->
                                    <input type="text" name="status"  value="Kearsipan" class="form-control"  hidden required>                                


                                <!-- Dropdown/select option untuk memilih Anggaran -->
                                <div class="form-group">
                                    <label>Data Anggaran</label>
                                    <select name="id_anggaran" class="form-control">
                                        <option value="">-- Pilih Data Anggaran --</option>
                                        <?php foreach ($anggarans as $anggaran) : ?>
                                            <option value="<?= $anggaran['id']; ?>"><?= $anggaran['nama_subkegiatan']; ?>, Jumlah Anggaran <?php echo 'Rp.' . number_format($anggaran['jumlah']) ?>
                                            
                                            , Target: <?= $anggaran['target']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
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

                               
                                <div class="form-group">
                                    <label>Kinerja Utama</label>
                                    <select name="id_kinerja_utama" class="form-control">
                                        <option value="">-- pilih --</option>
                                        <?php foreach ($pohons as $kinerja) : ?>
                                            <option value="<?= $kinerja['id']; ?>"><?= $kinerja['nama_bidang']; ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Target (%)</label>
                                    <input type="text" name="target" class="form-control" required>
                                </div>
                                <!-- step="0.01" -->
                                <!-- Tombol Submit -->
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Tambah</button>
                                    <a href="<?= route_to('penatausahaan_arsip/index'); ?>" class="btn btn-secondary">Batal</a>
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
