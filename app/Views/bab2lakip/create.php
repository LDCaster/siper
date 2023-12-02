<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah BAB II LAKIP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item"><a href="/bab2lakip">BAB II LAKIP</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah BAB II LAKIP</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="/bab2lakip/store" method="post">
                            <div class="card-header">
                                <h4>Form Tambah BAB II LAKIP</h4>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Visi</label> <br>
                                            <!-- <input type="text" name="visi" class="form-control" required> -->
                                            <textarea name="visi" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Misi</label> <br>
                                            <!-- <input type="text" name="misi" class="form-control" required> -->
                                            <textarea name="misi" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Tujuan dan Sasaran</label> <br>
                                            <!-- <input type="text" name="tujuan_sasaran" class="form-control" required> -->
                                            <textarea name="tujuan_sasaran" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Indikator Kinerja Utama</label> <br>
                                            <!-- <input type="text" name="indikator_kinerja_utama" class="form-control" required> -->
                                            <textarea name="indikator_kinerja_utama" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                        </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Perjanjian Kinerja</label> <br>
                                            <!-- <input type="text" name="perjanjian_kinerja" class="form-control" required> -->
                                            <textarea name="perjanjian_kinerja" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Program Kegiatan</label> <br>
                                            <!-- <input type="text" name="program_kegiatan" class="form-control" required> -->
                                            <textarea name="program_kegiatan" class="ckeditor" cols="38" rows="5" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="number" name="tahun" min="1900" max="2900" class="form-control" required>
                                </div>
                               
                                <input type="text" name="status_laporan"  value="AKTIF" class="form-control"  hidden required>
      
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/bab2lakip" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
