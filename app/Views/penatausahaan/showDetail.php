<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Penatausahaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Penatausahaan</a></div>
                <div class="breadcrumb-item">Detail Penatausahaan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail Penatausahaan</h2>
            <p class="section-lead">
                Ini adalah detail Penatausahaan.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL DATA PENATAUSAHAAN BIDANG PENYELENGGARAAN KEARSIPAN</h4>
                        </div>
<div class="col-md-4 mx-2"> 
    <a href="<?= base_url('penatausahaan/createDetail/' . $id_penatausahaan); ?>" class="btn btn-sm btn-primary mb-2" title="Tambah Detail penatausahaan"><i class="fa fa-plus"></i> Tambah Detail
                        </a>
                        <a href="<?= base_url('penatausahaan'); ?>" class="btn btn-sm btn-primary mb-2">Kembali</a>
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
                                            <th>Karyawan</th>
                                            <th>Tugas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($detail as $penatausahaan) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $penatausahaan['karyawan']; ?></td>

                                                <td>
                                                <!-- Tombol "Tambah Detail Anggaran" -->
                                                <a href="<?= base_url('penatausahaan/createDetailTugas2/' . $penatausahaan['id']); ?>"
                                                    class="btn btn-sm btn-primary mb-2" title="Tambah Tugas penatausahaan">
                                                    <i class="fa fa-plus"></i> Tambah Tugas utama
                                                </a>

                                                <!-- Tombol "Tampil Detail penatausahaan" -->
                                                <a href="<?= base_url('penatausahaan/showDetailTugas2/' . $penatausahaan['id']); ?>"
                                                    class="btn btn-sm btn-info mb-2" title="Tampil Tugas penatausahaan">
                                                    <i class="fa fa-eye"></i> Tampil Tugas utama
                                                </a>

                                                <a href="<?= base_url('penatausahaan/createDetailTugas/' . $penatausahaan['id']); ?>"
                                                    class="btn btn-sm btn-primary mb-2" title="Tambah Tugas penatausahaan">
                                                    <i class="fa fa-plus"></i> Tambah Tugas 
                                                </a>

                                                <!-- Tombol "Tampil Detail penatausahaan" -->
                                                <a href="<?= base_url('penatausahaan/showDetailTugas/' . $penatausahaan['id']); ?>"
                                                    class="btn btn-sm btn-info mb-2" title="Tampil Tugas penatausahaan">
                                                    <i class="fa fa-eye"></i> Tampil Tugas
                                                </a>
                                            </td>
                                            <td>
                                                
                                                    <a href="<?= base_url('/penatausahaan/delete/' . $penatausahaan['id']); ?>" class="btn btn-danger mr-2" title="Hapus"> <i class="fa fa-trash"></i>
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
