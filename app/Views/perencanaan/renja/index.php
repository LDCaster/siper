<!-- resources/views/perencanaan/rakortekbang/index.php -->

<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data RENJA</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Perencanaan</a></div>
                <div class="breadcrumb-item"><a href="#">RENJA</a></div>
                <div class="breadcrumb-item">Data</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data RENJA</h2>
            <p class="section-lead">
                Daftar data RENJA.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data RENJA</h4>
                        </div>
                        <div class="card-body">
                        <div class="buttons" style="margin-top: -20px;">
                            <a href="<?= route_to('perencanaan/create/renja'); ?>" class="btn btn-primary">Tambah</a>
                            <a href="<?= route_to('cetakRenja'); ?>" class="btn btn-warning">Cetak</a>
                            <a href="<?= route_to('tampilanCetakRenja'); ?>" class="btn btn-dark">Preview</a>
                            <a href="<?= route_to('ddperencanaanrenja/indexrenja'); ?>" class="btn btn-success">Data Dukung</a>

                         </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Urusan</th>
                                            <th>Program</th>
                                            <th>Kegiatan</th>
                                            <th>Sub Kegiatan</th>
                                            <th>Indikator</th>
                                            <th>Pagu Indikatif</th>
                                            <th>Target</th>
                                            <th>Satuan</th>
                                            <th>Status Tujuan</th>
                                            <th>Status Perencanaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($perencanaan)) : ?>
                                            <?php $no = 1; ?>
                                            <?php foreach ($perencanaan as $item) : ?>
                                                
                                                    <tr>
                                                    <td><?= $no++; ?></td>
                                                        <td><?= $item['urusan']; ?></td>
                                                        <td><?= $item['program']; ?></td>
                                                        <td><?= $item['kegiatan']; ?></td>
                                                        <td><?= $item['nama_subkegiatan']; ?></td>
                                                        <td><?= $item['indikator_subkegiatan']; ?></td>
                                                        <td><?php echo 'Rp.' . number_format($item['pagu_indikatif']) ?></td>
                                                        <td><?= $item['target']; ?></td>
                                                        <td><?= $item['nama_satuan']; ?></td>
                                                        <td><?= $item['status_tujuan']; ?></td>
                                                        <td><?= $item['status_perencanaan']; ?></td>
                                                        <td>
                                                        <a href="/perencanaan/edit/<?= $item['id']; ?>" class="btn btn-primary"><i class="fas fa-pen"></i></a>

                                                        <form action="<?= route_to('perencanaan/deleteRakor', $item['id']); ?>" method="post" class="d-inline">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                        </td>
                                                    </tr>
                                               
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="10" class="table-no-data">Tidak ada data RENJA.</td>
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

<style>
  .table-no-data {
    text-align: center;
  }
</style>

<?= $this->endSection(); ?>
