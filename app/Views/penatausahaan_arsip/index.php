<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Penatausahaan Bidang Penyelenggaraan Kearsipan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        

        <div class="section-body">
            <h2 class="section-title">Data Penatausahaan Bidang Penyelenggaraan Kearsipan</h2>
            <p class="section-lead">
                Ini merupakan data penatausahaan Bidang Penyelenggaraan Kearsipan yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL DATA PENATAUSAHAAN BIDANG PENYELENGGARAAN KEARSIPAN</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="/penatausahaan_arsip/create" class="btn btn-primary">Tambah</a>
                                <a href="<?= base_url('ddpenatausahaanarsip'); ?>" class="btn btn-success">Data Dukung</a>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Sub Kegiatan</th>
                                            <th>Pihak 1</th>
                                            <th>Pihak 2</th>
                                            <th>Tanggal</th>
                                            <th>Kinerja Utama</th>
                                            <th>Target (%)</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($penatausahaan_arsips as $penatausahaan_arsip) : ?>
                                        <?php if (isset($penatausahaan_arsip['status']) && $penatausahaan_arsip['status'] == 'Kearsipan') : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $penatausahaan_arsip['nama_subkegiatan']; ?></td>
                                                <td><?= $penatausahaan_arsip['nama_karyawan_1']; ?></td>
                                                <td><?= $penatausahaan_arsip['nama_karyawan_2']; ?></td>
                                                <td><?= $penatausahaan_arsip['tanggal']; ?></td>
                                                <td><?= $penatausahaan_arsip['nama_bidang']; ?></td>
                                                <td><?= $penatausahaan_arsip['target']; ?></td>

                                                <td>
                                                <!-- Tombol "Tambah Detail Anggaran" -->
                                                <a href="<?= base_url('penatausahaan_arsip/createDetail/' . $penatausahaan_arsip['id']); ?>" class="btn btn-sm btn-primary mb-2" title="Tambah Detail penatausahaan">
                                                    <i class="fa fa-plus"></i> Tambah Detail </a>

                                                <!-- Tombol "Tampil Detail penatausahaan_arsip" -->
                                                <a href="<?= base_url('penatausahaan_arsip/showDetail/' . $penatausahaan_arsip['id']); ?>" class="btn btn-sm btn-info mb-2" title="Tampil Detail penatausahaan"> <i class="far fa-eye"></i> </a>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Aksi">
                                                    <a href="<?= base_url('/penatausahaan_arsip/edit/' . $penatausahaan_arsip['id']); ?>" class="btn btn-primary mr-2" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url('/penatausahaan_arsip/delete/' . $penatausahaan_arsip['id']); ?>" class="btn btn-danger mr-2" title="Hapus"> <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group" role="group" aria-label="Aksi">
                                                    <a href="<?= base_url('penatausahaan_arsip/previewCetak/' . $penatausahaan_arsip['id']); ?>" class="btn btn-info mr-2" title="Preview Cetak">
                                                           <i class="far fa-file-pdf"></i>
                                                    </a>
                                                    <a href="<?= base_url('penatausahaan_arsip/cetak/' . $penatausahaan_arsip['id']); ?>" class="btn btn-success" title="Cetak"> <i class="fa fa-print"> </i>
                                                    </a>
                                                </div>
                                            </td>  
                                                
                                            </tr>
                                        <?php endif; ?>
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

