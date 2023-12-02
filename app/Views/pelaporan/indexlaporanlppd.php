<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1 >Laporan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>
<style>
    .buttons .btn {
        padding: 6px 40px; /* Sesuaikan angka sesuai kebutuhan untuk membuat tombol lebih besar */
        font-size: 12px; /* Sesuaikan ukuran font sesuai kebutuhan */
        margin-right: 50px;
    }
</style>
        <div class="section-body">
            <h2 class="section-title">Laporan</h2>
            <p class="section-lead">
                Ini merupakan Button Laporan
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center">
                            <h4>LAPORAN</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons d-flex justify-content-center" style="margin-top: -20px;">
                                <a href="/bab1lakip" class="btn btn-primary btn-lg">BAB I</a>
                                <a href="/bab2lakip" class="btn btn-dark btn-lg">BAB II</a>
                                <a href="/bab3lakip" class="btn btn-info btn-lg">BAB III</a>
                                <a href="/babvlakip" class="btn btn-success btn-lg">BAB IV</a>
                                <a href="/lampiran" class="btn btn-warning btn-lg">Lampiran</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>

