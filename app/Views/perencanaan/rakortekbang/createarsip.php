<!-- resources/views/perencanaan/rakortekbang/create.php -->

<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Rakortekbang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Perencanaan</a></div>
                <div class="breadcrumb-item"><a href="#">Rakortekbang</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Rakortekbang</h2>
            <p class="section-lead">
                Silakan isi formulir di bawah ini untuk membuat Rakortekbang.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Rakortekbang</h4>
                        </div>
                        <div class="card-body">
                            <!-- Menampilkan pesan kesalahan jika ada -->
                            <?php if (session()->has('errors')): ?>
                                <div class=                        "alert alert-danger">
                                    <ul>
                                        <?php foreach (session('errors') as $error): ?>
                                            <li><?= esc($error) ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <form action="<?= route_to('perencanaan/store'); ?>" method="post">
                                <?= csrf_field(); ?>

                                <div class="form-group">
                                    <label>Subkegiatan</label>
                                    <select class="form-control" id="subkegiatan" name="id_subkegiatan">
                                    <option value="">-- Pilih Subkegiatan --</option>
                                        <?php foreach ($subkegiatan as $row) : ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['nama_subkegiatan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Indikator Kinerja Urusan</label>
                                    <select class="form-control" id="indikator" name="id_indikator_kinerja_urusan">
                                    <option value="">-- Pilih Indikator Kinerja Urusan --</option>

                                        <select id="indikator" name="indikator">

                                                <!-- Opsi akan diisi secara dinamis menggunakan Ajax -->
                                        </select>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select class="form-control" id="id_satuan" name="id_satuan">
                                        <option value="">-- Pilih Satuan --</option>
                                        <?php foreach ($satuan as $satuanItem) : ?>
                                            <option value="<?= $satuanItem['id']; ?>"><?= $satuanItem['nama_satuan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Input Pagu Indikatif -->
                                <div class="form-group">
                                    <label for="pagu_indikatif">Pagu Indikatif</label>
                                    <input type="text" class="form-control" id="pagu_indikatif" name="pagu_indikatif" placeholder="Masukkan pagu indikatif">
                                </div>

                                <!-- Input Target -->
                                <div class="form-group">
                                    <label for="target">Target</label>
                                    <input type="text" class="form-control" id="target" name="target" placeholder="Masukkan target">
                                </div>

                                <!-- pilihan Status Perencanaan default value nya rakortekbang dan readonly -->
                                <!-- <div class="form-group"> -->
                                    <!-- <label>Status Perencanaan</label> -->
                                    <select class="form-control" id="status_perencanaan" hidden name="status_perencanaan" readonly>
                                        <option value="RAKORTEKBANG" selected>RAKORTEKBANG</option>
                                    </select>
                                <!-- </div> -->

                                <!-- pilihan Status Tujuan -->
                                <div class="form-group">
                                    <label>Status Tujuan</label>
                                    <select class="form-control" id="status_tujuan" name="status_tujuan" readonly>
                                        <!-- <option value="">-- Pilih Status Tujuan --</option> -->
                                        <option value="KEARSIPAN">KEARSIPAN</option>
                                        <!-- <option value="PERPUSTAKAAN">PERPUSTAKAAN</option>
                                        <option value="SEKRETARIAT">SEKRETARIAT</option> -->
                                    </select>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Submit</button>
                                    <a href="<?= route_to('perencanaan/index/rakor'); ?>" class="btn btn-secondary">Batal</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        // Mencegah klik pada elemen select
        $('#status_perencanaan').on('click', function(e) {
            e.preventDefault();
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Event saat nilai dropdown subkegiatan berubah
        $('#subkegiatan').change(function () {
            var id_subkegiatan = $(this).val();

            // Menggunakan Ajax untuk mengambil data indikator berdasarkan subkegiatan
            $.ajax({
                url: '<?= base_url('perencanaan/getIndikatorrakor') ?>',
                method: 'post',
                data: { id_subkegiatan: id_subkegiatan },
                dataType: 'json',
                success: function (data) {
                    // Mengosongkan dan menambahkan opsi baru ke dropdown indikator
                    $('#indikator').empty();
                    $.each(data, function (key, value) {
                        $('#indikator').append('<option value="' + value.id + '">' + value.nama_indikator_kinerja + '</option>');
                    });
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>
