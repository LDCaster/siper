<!-- resources/views/perencanaan/rakortekbang/index.php -->

<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Bukti Pelaporan Perpustakaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Pelaporan</a></div>
                <div class="breadcrumb-item"><a href="#">Bukti Pelaporan Perpustakaan</a></div>
                <div class="breadcrumb-item">Data</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Bukti Pelaporan Perpustakaan</h2>
            <p class="section-lead">
                Daftar Bukti Pelaporan Perpustakaan
            </p>

            <style>
   .status-verifikasi {
        padding: 5px;
        font-weight: bold; /* Membuat teks menjadi tebal (bold) */
        color: white; /* Memberikan warna font putih */
        /* Gaya umum untuk kelas status-verifikasi */
        display: inline-block; /* Untuk membuat kotak mengelilingi teks */
        border-radius: 10px;
        
    }

    .orange {
        background-color: SkyBlue;
        /* Gaya tambahan untuk status MENUNGGU */
    }

    .green {
        background-color: green;
        /* Gaya tambahan untuk status ACC */
    }

    .red {
        background-color: red;
        /* Gaya tambahan untuk status DITOLAK */
    }
</style>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bukti Pelaporan Perpustakaan</h4>
                        </div>
                        <div class="card-body">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="buttons" style="margin-top: -20px;">
                        <a href="/buktipelaporan/createperpus" class="btn btn-primary">Tambah Data</a>
                         </div>
                            <div class="table-responsive">
                            <table class="table table-bordered" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Data Anggaran</th>
                                            <th>Nama File</th>
                                            <th>Tahun</th>
                                            <th>Status Verifikasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                        <?php foreach ($bp_perpus as $dd) : ?>
                                            <?php if (isset($dd['status_data']) && $dd['status_data'] == 'PERPUSTAKAAN') : ?>

                                            <tr>
                                            <td><?= $no++ ?></td>
                                               
                                                <td><?= $dd['sub_kegiatan']; ?>, <?php echo 'Rp.' . number_format($dd['jumlah']) ?> / <?= $dd['target']; ?> <?= $dd['nama_satuan']; ?></td>
                                                <td><?= $dd['nama_file']; ?></td>
                                                <td><?= $dd['tahun']; ?></td>
                                                <td>
                                                    <?php
                                                    $statusClass = '';
                                                    switch ($dd['status_verifikasi']) {
                                                        case 'MENUNGGU':
                                                            $statusClass = 'orange';
                                                            break;
                                                        case 'DITERIMA':
                                                            $statusClass = 'green';
                                                            break;
                                                        case 'DITOLAK':
                                                            $statusClass = 'red';
                                                            break;
                                                        default:
                                                            // Default class atau logika jika tidak sesuai kondisi di atas.
                                                            break;
                                                    }
                                                    ?>
                                                    <span class="status-verifikasi <?= $statusClass; ?>">
                                                        <?= $dd['status_verifikasi']; ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="/buktipelaporan/previewperpus/<?= $dd['id']; ?>" class="btn btn-info btn-sm" >Pratinjau</a>
                                                    <a href="/buktipelaporan/download/<?= $dd['id']; ?>" class="btn btn-success btn-sm">Unduh</a>
                                                    <a href="/buktipelaporan/destroyperpus/<?= $dd['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (empty($bp_perpus)) : ?>
                                            <tr>
                                                <td colspan="4" class="table-no-data">Tidak ada Bukti pelaporan.</td>
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
