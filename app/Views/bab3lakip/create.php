<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah BAB III LAKIP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item"><a href="/bab3lakip">BAB III LAKIP</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah BAB III LAKIP</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="/bab3lakip/store" method="post">
                            <div class="card-header">
                                <h4>Form Tambah BAB III LAKIP</h4>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Narasi Capaian</label> <br>
                                            <!-- <input type="text" name="visi" class="form-control" required> -->
                                            <textarea name="narasi_capaian" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Penyebab Keberhasilan/Kegagalan atau Peningkatan/Penurunan</label> <br>
                                            <!-- <input type="text" name="misi" class="form-control" required> -->
                                            <textarea name="penyebab" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Alternatif Solusi</label> <br>
                                            <!-- <input type="text" name="tujuan_sasaran" class="form-control" required> -->
                                            <textarea name="alternatif" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Analisis Penggunaan Sumber Daya</label> <br>
                                            <!-- <input type="text" name="visi" class="form-control" required> -->
                                            <textarea name="analisis_sumberdaya" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Analisis Program Kegiatan</label> <br>
                                            <!-- <input type="text" name="misi" class="form-control" required> -->
                                            <textarea name="analisis_program_kegiatan" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input type="text" name="tahun" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="status_laporan"  value="AKTIF" class="form-control"  hidden required>                                
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/bab3lakip" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
