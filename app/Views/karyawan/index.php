<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

    <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Karyawan</h1>
                    <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">DataTables</div>
                    </div>
                </div>

                <div class="section-body">
                    <h2 class="section-title">Data Karyawan </h2>
                    <p class="section-lead">
                        ini merupakan data karyawan yang terdaftar di Dispusip
                    </p>
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header ">
                            <h4>TABEL KARYAWAN</h4>
                        </div>
                        <div class="card-body">
                        <div class="buttons" style="margin-top: -20px;">
                                <a href="/karyawan/create" class="btn btn-primary">Tambah</a>
                        </div>
                            <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                    <th class="">No</th>
                                        <th>Jabatan</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($karyawan)) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($karyawan as $row) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['jabatan']; ?></td>
                                            <td><?= $row['nip']; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td>
                                                <a href="/karyawan/edit/<?= $row['id']; ?>" class="btn btn-primary">Edit</a>
                                                <a href="/karyawan/delete/<?= $row['id']; ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data Indikator Kinerja Urusan.</td>
                                            </tr>
                                        <?php endif; ?>
                                    
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <!-- Main Content -->
    

<?= $this->endSection(); ?>