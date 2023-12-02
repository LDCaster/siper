<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>BAB 1 LAKIP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data BAB 1 LAKIP</h2>
            <p class="section-lead">
                Ini merupakan data BAB 1 LAKIP yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL DATA BAB 1 LAKIP</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="/bab1lakip/create" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Latar Belakang</th>
                                            <th>Narasi Struktur</th>
                                            <th>Narasi Foto</th>
                                            <th>Permasalahan Utama</th>
                                            <th>Produk Layanan</th>
                                            <th>Sistematika</th>
                                            <th>Tahun</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($bab1lakips as $bab1lakip) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $bab1lakip['latar_belakang']; ?></td>
                                                <td><?= $bab1lakip['narasi_struktur']; ?></td>
                                                <td><?= $bab1lakip['narasi_foto']; ?></td>
                                                <td><?= $bab1lakip['permasalahan_utama']; ?></td>
                                                <td><?= $bab1lakip['produk_layanan']; ?></td>
                                                <td><?= $bab1lakip['sistematika']; ?></td>
                                                <td><?= $bab1lakip['tahun']; ?></td>
                                                
                                                
                                                <td>
                                                    <!-- <a href="/bab1lakip/edit/<?= $bab1lakip['id']; ?>" class="btn btn-primary">Edit</a> -->
                                                    <a href="/bab1lakip/delete/<?= $bab1lakip['id']; ?>" class="btn btn-danger">Delete</a>
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

