<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<?php
$uri = service('uri');
$roles = session('role_id');
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pelaporan LAKIP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Pelaporan LAKIP</h2>
            <p class="section-lead">
                Ini merupakan data Pelaporan LAKIP yang terdaftar di Dispusip.
            </p>

}

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL DATA PELAPORAN LAKIP</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="/pelaporantw" class="btn btn-primary">Data Triwulan</a>
                                <a href="<?= route_to('cetaklakip'); ?>" class="btn btn-warning">Cetak</a>
                                <a href="/preview" class="btn btn-dark">Preview</a>
                                <!-- <a href="/babvlakip" class="btn btn-info">Upload Bukti</a> -->
                                <?php if (in_array($roles, ['admin', 'kasubbag'])) : ?>
                                <a href="/buktipelaporan" class="btn btn-info">Upload Bukti</a>
                                <?php endif ?>
                                <?php if (in_array($roles, ['admin','sekretaris'])) : ?>
                                <a href="/buktipelaporansekre" class="btn btn-info">Upload Bukti</a>
                                <?php endif ?>
                                <a href="/pelaporanlaporan" class="btn btn-success">Laporan</a>
                                <a href="/backup" class="btn btn-danger">Backup</a>
                                <a href="<?= base_url('ddpelaporan'); ?>" class="btn btn-brown">Data Dukung</a>

                                <style> .btn-brown {
                                    background-color: #8B4513; /* Warna coklat */
                                    color: #fff;                               
                                }
                                </style>
       

                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Data Triwulan</th>
                                            <th>Data Anggaran</th>
                                            <th>Realisasi Rp. </th>
                                            <th>Target</th>
                                            <th>Tahun</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($pelaporans as $pelaporan) : ?>
                                       
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $pelaporan['tw']; ?></td>
                                                <td><?= $pelaporan['sub_kegiatan']; ?> ( <?php echo 'Rp.' . number_format($pelaporan['jumlah']) ?> / <?= $pelaporan['target']; ?> <?= $pelaporan['nama_satuan']; ?>)</td>
                                                <td><?php echo 'Rp.' . number_format($pelaporan['realisasi_nominal']) ?></td>
                                                <!-- <td><?= $pelaporan['realisasi_persen']; ?></td> -->
                                                <td><?= $pelaporan['target']; ?></td>
                                                <td><?= $pelaporan['tahun']; ?></td>
                                               <td>
                                                       
                                                   
                                                   <!-- <a href="pelaporann" class="btn btn-success btn-sm btn-backup" data-id="<?= $pelaporan['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin Membackup data ini?')">Backup</a> -->

                                                   <!-- Misalkan, tampilan berada di file views/bab1lakip/index.php -->
                                                    <a href="<?= base_url('/pelaporan/changeStatusBackup/' . $pelaporan['id']) ?>" class="btn btn-success" title="Backup" onclick="return confirm('Yakin ingin mengubah status menjadi BACKUP?')"><i class="fas fa-database"></i></a>

                                                    <a href="<?= base_url('pelaporan/destroy' . $pelaporan['id']) ?>" class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><i class="fas fa-trash"></i></a>

                                                   <!-- <a href="<?= base_url('pelaporan/destroy' . $pelaporan['id']); ?>" class="btn btn-danger mb-2" title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"> <i class="fa fa-trash"></i></a> -->
                                                   
                                                    </td>
                                            </tr>
                                        
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?= $this->endSection(); ?>

