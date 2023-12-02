<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah BAB IV LAKIP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item"><a href="/babvlakip">BAB IV LAKIP</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah BAB IV LAKIP</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="/babvlakip/store" method="post">
                            <div class="card-header">
                                <h4>Form Tambah BAB IV LAKIP</h4>
                            </div>

                            <div class="card-body">
                            <div class="row">
                <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="year" name="tahun" class="form-control" required>
                                </div>
                                </div>
                                </div>
                            
                            <!-- <div class="card-body">
                                <div class="form-group"> -->
                                    <!-- <label>Status Laporan</label> -->
                                    <input type="text" name="status_laporan"  value="AKTIF" class="form-control"  hidden required>                                
                                <!-- </div>
                            </div> -->
                           
                            
                                <div class="form-group">
                                    <label>Kesimpulan</label> <br>
                                    <!-- <input type="text" name="kesimpulan" class="form-control" required> -->
                                    <textarea name="kesimpulan" class="ckeditor" cols="38" rows="5" required></textarea>
                                </div>
                            
                                <div class="form-group">
                                    <label>Langkah Perbaikan Kinerja Kedepan</label> <br>
                                    <!-- <input type="text" name="perbaikan" class="form-control" required> -->
                                    <textarea name="perbaikan" class="ckeditor" cols="38" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/babvlakip" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
