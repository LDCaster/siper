<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Penatausahaan Bidang Perpustakaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Penatausahaan</div>
                <div class="breadcrumb-item">Edit Penatausahaan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit Penatausahaan Bidang Perpustakaan</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?= route_to('penatausahaan/update', $penatausahaan['id']); ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Edit Penatausahaan Bidang Perpustakaan</h4>
                            </div>
                            <div class="card-body">
                            <!-- Form untuk membuat Penatausahaan -->
                            
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Status Data</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span></div>                            
                                            <select class="form-control" name="status" >
                                            <option <?php if ($penatausahaan['status'] == 'Perpustakaan') {
                                                        echo "selected";
                                                    } ?> value="Perpustakaan">Perpustakaan</option>                                                
                                            </select>
                                        </div>
                                    </div>

                                <!-- Dropdown/select option untuk memilih Anggaran -->
                                

                                <div class="form-group">
                                    <label>Data Anggaran</label>
                                    <select name="id_anggaran" class="form-control">
                                        <?php foreach ($anggarans as $anggaran) : ?>
                                            <option value="<?= $anggaran['id']; ?>" <?= ($anggaran['id'] == $penatausahaan['id_anggaran']) ? 'selected' : ''; ?>><?= $anggaran['id']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Karyawan Pihak 1</label>
                                    <select name="karyawan_1" class="form-control">
                                        <?php foreach ($karyawans as $karyawan) : ?>
                                            <option value="<?= $karyawan['id']; ?>" <?= ($karyawan['id'] == $penatausahaan['karyawan_1']) ? 'selected' : ''; ?>><?= $karyawan['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Karyawan Pihak 2</label>
                                    <select name="karyawan_2" class="form-control">
                                        <?php foreach ($karyawans as $karyawan_2) : ?>
                                            <option value="<?= $karyawan_2['id']; ?>" <?= ($karyawan_2['id'] == $penatausahaan['karyawan_2']) ? 'selected' : ''; ?>><?= $karyawan_2['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" value="<?= $penatausahaan['tanggal']; ?>" required>
                                </div>

                                
                                <div class="form-group">
                                    <label>Kinerja Utama</label>
                                    <input type="text" name="kinerja_utama" class="form-control" value="<?= $penatausahaan['kinerja_utama']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Indikator Kinerja</label>
                                    <input type="text" name="indikator_kinerja" class="form-control" value="<?= $penatausahaan['indikator_kinerja']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Target (%)</label>
                                    <input type="text"  name="target" class="form-control" value="<?= $penatausahaan['target']; ?>" required>
                                </div>
                                <!-- step="0.01" -->

                                
                               
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= route_to('penatausahaan/index'); ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
