<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Kegiatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Kegiatan</div>
                <div class="breadcrumb-item">Tambah Kegiatan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Kegiatan</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="/kegiatan/store" method="post">
                            <div class="card-header">
                                <h4>Form Tambah Kegiatan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Urusan</label>
                                    <select name="id_urusan" id="urusan" class="form-control" required>
                                        <option value="">Pilih Urusan</option>
                                        <?php foreach ($urusans as $urusan) : ?>
                                            <option value="<?= $urusan['id']; ?>"><?= $urusan['nama_urusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Indikator Kinerja Urusan</label>
                                    <select name="id_indikator_kinerja_urusan" id="indikator_kinerja" class="form-control" required>
                                        <option value="">Pilih Indikator Kinerja Urusan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Program</label>
                                    <select name="id_program" id="program" class="form-control" required>
                                        <option value="">Pilih Program</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" name="nama_kegiatan" class="form-control" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- script dc jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Script untuk meng-handle dropdown berantai dengan jQuery AJAX -->
<script>
$(document).ready(function() {
    $('#urusan').change(function() {
        var urusanID = $(this).val();
        console.log(urusanID);
        if (urusanID != '') {
            $.ajax({
                url: '/kegiatan/getIndikatorKinerja/' + urusanID,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    $('#indikator_kinerja').html('<option value="">Pilih Indikator Kinerja Urusan</option>');
                    $.each(data, function(key, value) {
                        $('#indikator_kinerja').append('<option value="' + value.id + '">' + value.nama_indikator_kinerja + '</option>');
                    });
                }
            });
        } else {
            $('#indikator_kinerja').html('<option value="">Pilih Indikator Kinerja Urusan</option>');
            $('#program').html('<option value="">Pilih Program</option>');
        }
    });

    $('#indikator_kinerja').change(function() {
        var indikatorKinerjaID = $(this).val();
        if (indikatorKinerjaID != '') {
            $.ajax({
                url: '/kegiatan/getProgram/' + indikatorKinerjaID,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    $('#program').html('<option value="">Pilih Program</option>');
                    $.each(data, function(key, value) {
                        $('#program').append('<option value="' + value.id + '">' + value.nama_program + '</option>');
                    });
                }
            });
        } else {
            $('#program').html('<option value="">Pilih Program</option>');
        }
    });
});
</script>

<?= $this->endSection(); ?>
