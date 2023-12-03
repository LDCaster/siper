<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Penatausahaan Perpustakaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Penatausahaan Perpustakaan</h2>
            <p class="section-lead">
                Ini merupakan data penatausahaan Perpustakaan yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL DATA PENATAUSAHAAN PERPUSTAKAAN</h4>
                        </div>
                        
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="/penatausahaan/create" class="btn btn-primary">Tambah</a>
                                <a href="<?= base_url('ddpenatausahaan'); ?>" class="btn btn-success">Data Dukung</a>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pihak 1</th>
                                            <th>Pihak 2</th>
                                            <th>Tanggal</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($penatausahaans as $penatausahaan) : ?>
                                        <?php if (isset($penatausahaan['status']) && $penatausahaan['status'] == 'Perpustakaan') : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $penatausahaan['nama_karyawan_1']; ?></td>
                                                <td><?= $penatausahaan['nama_karyawan_2']; ?></td>
                                                <?php
                                                    setlocale(LC_TIME, 'id_ID'); // Mengatur lokal ke Bahasa Indonesia

                                                    $tanggal_timestamp = strtotime($penatausahaan['tanggal']);
                                                    $tanggal_format = strftime('%e %B %Y', $tanggal_timestamp);
                                                    ?>

                                                    <td><?= $tanggal_format; ?></td>


                                                <td>
                                                <!-- Tombol "Tambah Detail Anggaran" -->
                                                <a href="<?= base_url('penatausahaan/createAnggaran/' . $penatausahaan['id']); ?>"
                                                    class="btn btn-sm btn-primary mb-2" title="Tambah Data Anggaran penatausahaan">
                                                    <i class="fa fa-plus"></i> Tambah Data Anggaran
                                                </a>

                                                <!-- Tombol "Tampil Detail Anggaran" -->
                                                <a href="<?= base_url('penatausahaan/showAnggaran/' . $penatausahaan['id']); ?>"
                                                    class="btn btn-sm btn-info mb-2" title="Tampil Data Anggaran penatausahaan">
                                                    <i class="fa fa-eye"></i> Tampil Data Anggaran
                                                </a>

                                                <a href="<?= base_url('penatausahaan/createKinerjabidang/' . $penatausahaan['id']); ?>"
                                                    class="btn btn-sm btn-primary mb-2" title="Tambah Data Kinerjabidang penatausahaan">
                                                    <i class="fa fa-plus"></i> Tambah Data Kinerja bidang
                                                </a>
                                                <!-- Tombol "Tampil Detail kinerja" -->
                                                <a href="<?= base_url('penatausahaan/showKinerjabidang/' . $penatausahaan['id']); ?>"
                                                    class="btn btn-sm btn-info mb-2" title="Tampil Data Kinerjabidang penatausahaan">
                                                    <i class="fa fa-eye"></i> Tampil Data Kinerja bidang
                                                </a>

                                                <!-- Tombol "Tampil Detail penatausahaan" -->
                                                <a href="<?= base_url('penatausahaan/showDetail/' . $penatausahaan['id']); ?>"
                                                    class="btn btn-sm btn-info mb-2" title="Tampil Detail penatausahaan">
                                                    <i class="fa fa-eye"></i> Tampil Detail
                                                </a>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Aksi">
                                                    <a href="<?= base_url('/penatausahaan/edit/' . $penatausahaan['id']); ?>" class="btn btn-primary mr-2" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url('/penatausahaan/delete/' . $penatausahaan['id']); ?>" class="btn btn-danger mr-2" title="Hapus"> <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group" role="group" aria-label="Aksi">
                                                    <a href="<?= base_url('penatausahaan/previewCetak/' . $penatausahaan['id']); ?>" class="btn btn-info mr-2" title="Preview Cetak">
                                                            <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="<?= base_url('penatausahaan/cetak/' . $penatausahaan['id']); ?>" class="btn btn-success" title="Cetak"> <i class="fa fa-print"></i>
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

