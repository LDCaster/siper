<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Master Kinerja Bidang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Master Kinerja Bidang</h2>
            <p class="section-lead">
                Ini merupakan data Master Kinerja Bidang yang terdaftar di Dispusip.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>TABEL MASTER KINERJA BIDANG</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons" style="margin-top: -20px;">
                                <a href="<?= route_to('kinerjabidang/create'); ?>" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Bidang</th>
                                            <th>indikator</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($kinerjabidang)) : ?>
                                            <?php $no = 1; ?>
                                            <?php foreach ($kinerjabidang as $key => $kb) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $kb['nama_bidang']; ?></td>
                                                    <td><?= $kb['indikator']; ?></td>
                                                    <td>
                                                        <a href="<?= route_to('kinerjabidang/edit', $kb['id']); ?>" class="btn btn-primary">Edit</a>
                                                        <a href="<?= route_to('kinerjabidang/delete', $kb['id']); ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data Kinerja Bidang.</td>
                                            </tr>
                                        <?php endif; ?>
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
