<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Tugas Penatausahaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Penatausahaan</a></div>
                <div class="breadcrumb-item">Detail Tugas Penatausahaan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail Tugas Penatausahaan</h2>
            <p class="section-lead">
                Ini adalah detail Tugas Penatausahaan.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL DATA PENATAUSAHAAN BIDANG PENYELENGGARAAN KEARSIPAN</h4>
                        </div>

                        <div class="col-md-4 mx-2">
                        <a href="<?= base_url('penatausahaan/createDetailTugas/' . $id_anggota); ?>"
                                                    class="btn btn-sm btn-primary mb-2" title="Tambah Tugas penatausahaan">
                                                    <i class="fa fa-plus"></i> Tambah Tugas 
                                                </a>
<a href="<?= base_url('penatausahaan/showDetail/'. $detail_penatausahaan['id_penatausahaan']); ?>" class="btn btn-sm btn-primary mb-2">Kembali</a>

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
                                            <th>Pohon Kinerja</th>
                                            <th>Sasaran, Indikator Kinerja</th>
                                            <th>Target</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($detailtugas as $penatausahaan) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $penatausahaan['nama_bidang']; ?></td>
                                                <td><?= $penatausahaan['sasaran']; ?> , <?= $penatausahaan['indikator']; ?></td>
                                                <td><?= $penatausahaan['target']; ?></td>

                                            <td>
                                                    <a href="<?= base_url('/penatausahaan/destroyDetailTugas/' . $penatausahaan['id']); ?>" class="btn btn-danger mr-2" title="Hapus"> <i class="fa fa-trash"></i>
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
