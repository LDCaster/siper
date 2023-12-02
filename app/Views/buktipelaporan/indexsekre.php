<!-- resources/views/perencanaan/rakortekbang/index.php -->

<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Bukti Pelaporan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Pelaporan</a></div>
                <div class="breadcrumb-item"><a href="#">Bukti Pelaporan</a></div>
                <div class="breadcrumb-item">Data</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Bukti Pelaporan</h2>
            <p class="section-lead">
                Daftar Bukti Pelaporan
            </p>
<style>
   .status-persetujuan {
        padding: 5px;
        font-weight: bold; /* Membuat teks menjadi tebal (bold) */
        color: white; /* Memberikan warna font putih */
        /* Gaya umum untuk kelas status-persetujuan */
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
                            <h4>Bukti Pelaporan</h4>
                        </div>
                        <div class="card-body">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="buttons" style="margin-top: -20px;">
                        <a href="/buktipelaporan/create" class="btn btn-primary">Tambah Bukti Pelaporan</a>
                         </div>
                            <div class="table-responsive">
                            <table class="table table-bordered" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Data Anggaran</th>
                                            <th>Nama File</th>
                                            <th>Tahun</th>
                                            <th>Status persetujuan</th>
                                            <th>Persetujuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                        <?php foreach ($buktipelaporan as $dd) : ?>
                                            <tr>
                                            <td><?= $no++ ?></td>
                                                <td><?= $dd['sub_kegiatan']; ?>, <?php echo 'Rp.' . number_format($dd['jumlah']) ?> / <?= $dd['target']; ?> <?= $dd['nama_satuan']; ?></td>
                                                <td><?= $dd['nama_file']; ?></td>
                                                <td><?= $dd['tahun']; ?></td>
                                                <td>
                                                    <?php
                                                    $statusClass = '';
                                                    switch ($dd['status_persetujuan']) {
                                                        case 'MENUNGGU':
                                                            $statusClass = 'orange';
                                                            break;
                                                        case 'DISETUJUI':
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
                                                    <span class="status-persetujuan <?= $statusClass; ?>">
                                                        <?= $dd['status_persetujuan']; ?>
                                                    </span>
                                                </td>

                                                <td>
                                                <a href="buktipelaporan" class="btn btn-success btn-sm btn-setuju" data-id="<?= $dd['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menyetujui data ini?')">Disetujui</a>
                                                <a href="buktipelaporan" class="btn btn-danger btn-sm btn-batal" data-id="<?= $dd['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menolak data ini?')">Ditolak</a>


                                                </td>
                                                <td>
                                                    <a href="/buktipelaporan/previewsekre/<?= $dd['id']; ?>" class="btn btn-info btn-sm" >Pratinjau</a>
                                                    <a href="/buktipelaporan/download/<?= $dd['id']; ?>" class="btn btn-success btn-sm">Unduh</a>
                                                    <a href="/buktipelaporan/destroysekre/<?= $dd['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php if (empty($buktipelaporan)) : ?>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var buttons = document.querySelectorAll('.btn-setuju');

        buttons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                var id = this.getAttribute('data-id');

                // Kirim permintaan AJAX ke server untuk mengubah data status_persetujuan
                fetch('/buktipelaporan/setuju/' + id, {
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    // Manipulasi DOM atau tindakan lain setelah permintaan berhasil
                    console.log('Data berhasil disetuju');
                    
                    // Arahkan halaman ke URL yang disediakan dalam respons JSON
                    window.location.href = data.redirect;
                })
                .catch(error => {
                    console.error('Gagal mengirim permintaan: ' + error);
                });
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        var buttons = document.querySelectorAll('.btn-batal');

        buttons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                var id = this.getAttribute('data-id');

                // Kirim permintaan AJAX ke server untuk mengubah data status_persetujuan
                fetch('/buktipelaporan/batal/' + id, {
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    // Manipulasi DOM atau tindakan lain setelah permintaan berhasil
                    console.log('Data berhasil ditolak');
                    
                    // Arahkan halaman ke URL yang disediakan dalam respons JSON
                    window.location.href = data.redirect;
                })
                .catch(error => {
                    console.error('Gagal mengirim permintaan: ' + error);
                });
            });
        });
    });
</script>



<?= $this->endSection(); ?>


