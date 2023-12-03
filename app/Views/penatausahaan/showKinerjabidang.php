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
<a href="<?= base_url('penatausahaan/createKinerjabidang/' . $id_penatausahaan); ?>"
                                                    class="btn btn-sm btn-primary mb-2" title="Tambah Data Kinerjabidang penatausahaan">
                                                    <i class="fa fa-plus"></i> Tambah Data Kinerja bidang
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
                                            <th>Bidang</th>
                                            <th>Sasaran</th>
                                            <th>indikator</th>
                                            <th>target</th>
                                            <th>satuan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($detail as $penatausahaan) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $penatausahaan['nama_bidang']; ?> </td>
                                                <td><?= $penatausahaan['sasaran']; ?> </td>
                                                <td><?= $penatausahaan['indikator']; ?> </td>
                                                <td><?= $penatausahaan['target']; ?> </td>
                                                <td><?= $penatausahaan['nama_satuan']; ?> </td>

                                            <td>
                                                
                                                    <a href="<?= base_url('/penatausahaan/destroyKinerjabidang/' . $penatausahaan['id']); ?>" class="btn btn-danger mr-2" title="Hapus"> <i class="fa fa-trash"></i>
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
