<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Kegiatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Kegiatan</div>
                <div class="breadcrumb-item">Edit Kegiatan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit Kegiatan</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?= route_to('kegiatan/update', $kegiatan['id']); ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Edit Kegiatan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pilih Urusan</label>
                                    <select name="id_urusan" id="id_urusan" class="form-control">
                                        <?php foreach ($urusans as $urusan) : ?>
                                            <option value="<?= $urusan['id']; ?>" <?= ($urusan['id'] == $kegiatan['id_urusan']) ? 'selected' : ''; ?>><?= $urusan['nama_urusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Indikator Kinerja</label>
                                    <select name="id_indikator_kinerja_urusan" id="id_indikator_kinerja_urusan" class="form-control">
                                        <?php foreach ($indikator_kinerja_urusan as $indikator) : ?>
                                            <option value="<?= $indikator['id']; ?>" <?= ($indikator['id'] == $kegiatan['id_indikator_kinerja_urusan']) ? 'selected' : ''; ?>><?= $indikator['nama_indikator_kinerja']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Program</label>
                                    <select name="id_program" id="id_program" class="form-control">
                                        <?php foreach ($programs as $program) : ?>
                                            <option value="<?= $program['id']; ?>" <?= ($program['id'] == $kegiatan['id_program']) ? 'selected' : ''; ?>><?= $program['nama_program']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_kegiatan">Nama Kegiatan</label>
                                    <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" value="<?= $kegiatan['nama_kegiatan']; ?>" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= route_to('kegiatan/index'); ?>" class="btn btn-secondary">Batal</a>
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

<script>
$(document).ready(function() {
    $('#id_urusan').change(function() {
        var urusanID = $(this).val();
        if (urusanID != '') {
            $.ajax({
                url: '/kegiatan/getIndikatorKinerja/' + urusanID,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    $('#id_indikator_kinerja_urusan').html('<option value="">Pilih Indikator Kinerja Urusan</option>');
                    $('#id_program').html('<option value="">Pilih Program</option>'); // Menghapus daftar program saat indikator kinerja berubah
                    $.each(data, function(key, value) {
                        $('#id_indikator_kinerja_urusan').append('<option value="' + value.id + '">' + value.nama_indikator_kinerja + '</option>');
                    });
                }
            });
        } else {
            $('#id_indikator_kinerja_urusan').html('<option value="">Pilih Indikator Kinerja Urusan</option>');
            $('#id_program').html('<option value="">Pilih Program</option>');
        }
    });

    // Menambahkan skrip untuk memuat daftar program saat indikator kinerja terpilih berubah
    $('#id_indikator_kinerja_urusan').change(function() {
        var indikatorKinerjaID = $(this).val();
        if (indikatorKinerjaID != '') {
            $.ajax({
                url: '/kegiatan/getProgram/' + indikatorKinerjaID,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    $('#id_program').html('<option value="">Pilih Program</option>');
                    $.each(data, function(key, value) {
                        $('#id_program').append('<option value="' + value.id + '">' + value.nama_program + '</option>');
                    });
                }
            });
        } else {
            $('#id_program').html('<option value="">Pilih Program</option>');
        }
    });
});
</script>

<?= $this->endSection(); ?>
