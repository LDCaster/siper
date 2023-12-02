<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Program</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Program</div>
                <div class="breadcrumb-item">Edit Program</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit Program</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?= route_to('program/update', $program['id']); ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Edit Program</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pilih Urusan</label>
                                    <select name="id_urusan" id="id_urusan" class="form-control">
                                        <?php foreach ($urusans as $urusan) : ?>
                                            <option value="<?= $urusan['id']; ?>" <?= ($urusan['id'] == $program['id_urusan']) ? 'selected' : ''; ?>><?= $urusan['nama_urusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Indikator Kinerja</label>
                                    <select name="id_indikator_kinerja_urusan" id="id_indikator_kinerja_urusan" class="form-control">
                                        <?php foreach ($indikator_kinerja_urusan as $indikator) : ?>
                                            <option value="<?= $indikator['id']; ?>" <?= ($indikator['id'] == $program['id_indikator_kinerja_urusan']) ? 'selected' : ''; ?>><?= $indikator['nama_indikator_kinerja']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_program">Nama Program</label>
                                    <input type="text" name="nama_program" id="nama_program" class="form-control" value="<?= $program['nama_program']; ?>" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= route_to('program/index'); ?>" class="btn btn-secondary">Batal</a>
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

            $('#id_indikator_kinerja_urusan').empty();
            $('#id_indikator_kinerja_urusan').append('<option value="" disabled selected>Pilih Indikator Kinerja</option>');

            $.ajax({
                url: '/program/getIndikatorKinerja/' + urusanID,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(key, value) {
                        $('#id_indikator_kinerja_urusan').append('<option value="' + value.id + '">' + value.nama_indikator_kinerja + '</option>');
                    });
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>
