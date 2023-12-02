<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1 >Triwulan</h1>
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
            <h2 class="section-title">Triwulan</h2>
            <p class="section-lead">
                Ini merupakan Button Triwulan.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center">
                            <h4>TRIWULAN</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons d-flex justify-content-center" style="margin-top: -20px;">
                                <a href="/tw1" class="btn btn-primary btn-lg">Triwulan I</a>
                                <a href="/tw2" class="btn btn-dark btn-lg">Triwulan II</a>
                                <a href="/tw3" class="btn btn-info btn-lg">Triwulan III</a>
                                <a href="/tw4" class="btn btn-success btn-lg">Triwulan IV</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>

