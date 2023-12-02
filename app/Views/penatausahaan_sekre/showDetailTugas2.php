<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Tugas Utama Penatausahaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Penatausahaan</a></div>
                <div class="breadcrumb-item">Detail Tugas Utama Penatausahaan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail Tugas Utama Penatausahaan</h2>
            <p class="section-lead">
                Ini adalah detail Tugas Utama Penatausahaan.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL DATA PENATAUSAHAAN BIDANG PERPUSTAKAAN</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <!-- <a href="/penatausahaan/create" class="btn btn-primary">Tambah</a> -->
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kinerja Utama</th>
                                            <th>Indikator Kinerja</th>
                                            <th>Target</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($detailtugas2 as $penatausahaan) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $penatausahaan['kinerja_utama']; ?></td>
                                                <td><?= $penatausahaan['indikator']; ?></td>
                                                <td><?= $penatausahaan['target']; ?></td>

                                            <td>
                    <!-- 
                   <form action="<?= base_url('penatausahaan/destroydetailtugas2'); ?>" method="post">
                   <?= csrf_field(); ?>

                   <input type="hidden" name="id_anggota" value="<?= $penatausahaan['id_anggota']; ?>">
                   <input type="hidden" name="id_penatausahaan" value="<?= $penatausahaan['id_penatausahaan']; ?>">
                   </form> -->
                                                
                                                    <a href="<?= base_url('/penatausahaan_sekre/destroydetailtugas2/' . $penatausahaan['id']);  ?>" class="btn btn-danger mr-2" title="Hapus"> <i class="fa fa-trash"></i>
                                                    </a>
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

        </div>
    </section>
</div>

<?= $this->endSection(); ?>
