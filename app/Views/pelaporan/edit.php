<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Pelaporan LAKIP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">LAKIP</div>
                <div class="breadcrumb-item">Edit LAKIP</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit Pelaporan LAKIP</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?= route_to('pelaporan/update', $pelaporan['id']); ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Edit Pelaporan LAKIP</h4>
                            </div>
                            <div class="card-body">
                            <!-- Form untuk membuat pelaporan -->
                            
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Status Data</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span></div>                            
                                            <select class="form-control" name="status" >
                                            <option <?php if ($pelaporan['status'] == 'LAKIP') {
                                                        echo "selected";
                                                    } ?> value="LAKIP">LAKIP</option>                                                
                                            </select>
                                        </div>
                                    </div>

                                <!-- Dropdown/select option untuk memilih Anggaran -->
                                

                                <div class="form-group">
                                    <label>Data Anggaran</label>
                                    <select name="id_anggaran" class="form-control">
                                        <?php foreach ($anggarans as $anggaran) : ?>
                                            <option value="<?= $anggaran['id']; ?>" <?= ($anggaran['id'] == $pelaporan['id_anggaran']) ? 'selected' : ''; ?>><?= $anggaran['id']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="realisasi_nominal">Realisasi (Rp.)</label>
                                    <input type="text" name="realisasi_nominal" class="form-control" value="<?= $pelaporan['realisasi_nominal']; ?>" required>
                                </div>
                               
                                <div class="form-group">
                                    <label for="realisasi_persen">Realisasi (%)</label>
                                    <input type="text" name="realisasi_persen" class="form-control" value="<?= $pelaporan['realisasi_persen']; ?>" required>
                                </div>
                               
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= route_to('pelaporan/index'); ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
