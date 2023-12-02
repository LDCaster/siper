<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Indikator Sub Kegiatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Indikator Sub Kegiatan</div>
                <div class="breadcrumb-item">Tambah Indikator Sub Kegiatan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah Indikator Sub Kegiatan</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?= route_to('indikator/store'); ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Tambah Indikator Sub Kegiatan</h4>
                            </div>
                            <div class="card-body">
                                <!-- Dropdown/select option untuk memilih Urusan -->
                                <div class="form-group">
                                    <label>Urusan</label>
                                    <select class="form-control <?= (session('errors.id_urusan')) ? 'is-invalid' : ''; ?>" id="id_urusan" name="id_urusan">
                                        <option value="">-- Pilih Urusan --</option>
                                        <?php foreach ($urusans as $urusan) : ?>
                                            <option value="<?= $urusan['id']; ?>"><?= $urusan['nama_urusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (session('errors.id_urusan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.id_urusan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Dropdown/select option untuk memilih Indikator Kinerja Urusan -->
                                <div class="form-group">
                                    <label>Indikator Kinerja Urusan</label>
                                    <select class="form-control <?= (session('errors.id_indikator_kinerja_urusan')) ? 'is-invalid' : ''; ?>" id="id_indikator_kinerja_urusan" name="id_indikator_kinerja_urusan">
                                        <option value="">-- Pilih Indikator Kinerja Urusan --</option>
                                    </select>
                                    <?php if (session('errors.id_indikator_kinerja_urusan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.id_indikator_kinerja_urusan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Dropdown/select option untuk memilih Program -->
                                <div class="form-group">
                                    <label>Program</label>
                                    <select class="form-control <?= (session('errors.id_program')) ? 'is-invalid' : ''; ?>" id="id_program" name="id_program">
                                        <option value="">-- Pilih Program --</option>
                                    </select>
                                    <?php if (session('errors.id_program')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.id_program'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Dropdown/select option untuk memilih Kegiatan -->
                                <div class="form-group">
                                    <label>Kegiatan</label>
                                    <select class="form-control <?= (session('errors.id_kegiatan')) ? 'is-invalid' : ''; ?>" id="id_kegiatan" name="id_kegiatan">
                                        <option value="">-- Pilih Kegiatan --</option>
                                    </select>
                                    <?php if (session('errors.id_kegiatan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.id_kegiatan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Dropdown/select option untuk memilih Subkegiatan -->
                                <div class="form-group">
                                    <label>Sub Kegiatan</label>
                                    <select class="form-control <?= (session('errors.id_kegiatan')) ? 'is-invalid' : ''; ?>" id="id_subkegiatan" name="id_subkegiatan">
                                        <option value="">-- Pilih Sub Kegiatan --</option>
                                    </select>
                                    <?php if (session('errors.id_subkegiatan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.id_subkegiatan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Input untuk Nama Sub Kegiatan -->
                                <div class="form-group">
                                    <label>Nama Indikator Sub Kegiatan</label>
                                    <input type="text" class="form-control <?= (session('errors.nama_indikator')) ? 'is-invalid' : ''; ?>" id="nama_indikator" name="nama_indikator" placeholder="Tambahkan Nama Indikator Sub Kegiatan" value="<?= old('nama_indikator'); ?>">
                                    <?php if (session('errors.nama_indikator')) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.nama_indikator'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>public function store()
{
    $db = \Config\Database::connect(); // Menggunakan database connection
    $validation = \Config\Services::validation();

    // Validasi input
    $validation->setRules([
        'id_indikator_kinerja_urusan' => 'required',
        'id_subkegiatan' => 'required',
        'id_satuan' => 'required',
        'pagu_indikatif' => 'required|numeric',
        'target' => 'required|numeric',
        'status_perencanaan' => 'required',
        'status_tujuan' => 'required',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Mulai transaksi
    $db->transBegin();

    try {
        // Proses penyimpanan data perencanaan ke tabel "perencanaan"
        $dataPerencanaan = [
            'id_indikator_kinerja_urusan' => $this->request->getPost('id_indikator_kinerja_urusan'),
            'id_subkegiatan' => $this->request->getPost('id_subkegiatan'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'pagu_indikatif' => $this->request->getPost('pagu_indikatif'),
            'target' => $this->request->getPost('target'),
            'status_perencanaan' => $this->request->getPost('status_perencanaan'),
            'status_tujuan' => $this->request->getPost('status_tujuan'),
        ];

        $this->perencanaanModel->insert($dataPerencanaan);

        // Get the inserted ID from perencanaan table
        $idPerencanaan = $db->insertID();

        // Proses penyimpanan data ke tabel "rakortekbang" dengan tambahan ID perencanaan
        $dataRakortekbang = $dataPerencanaan;
        $dataRakortekbang['id_perencanaan'] = $idPerencanaan;

        $this->perencanaanrakorModel->insert($dataRakortekbang);

        // Commit transaksi jika semua berhasil
        $db->transCommit();

        // Redirect sesuai dengan status perencanaan
        $redirectPath = ($this->request->getPost('status_perencanaan') === 'RAKORTEKBANG')
            ? '/perencanaan/index/rakor'
            : '/perencanaan/index/renja';

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
        return redirect()->to($redirectPath)->with('success', 'Data perencanaan berhasil disimpan.');
    } catch (\Exception $e) {
        $db->transRollback(); // Rollback jika terjadi kesalahan
        session()->setFlashdata('pesan', 'Data gagal ditambahkan!');
        return redirect()->back()->withInput();
    }
}


                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= route_to('indikator/index'); ?>" class="btn btn-secondary">Batal</a>
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

<!-- JavaScript untuk Dropdown Berantai -->
<script>
    $(document).ready(function() {
        $('#id_urusan').change(function() {
            var urusanID = $(this).val();
            if (urusanID != '') {
                $.ajax({
                    url: '/indikator/getIndikatorKinerjaByUrusan/' + urusanID,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $('#id_indikator_kinerja_urusan').html('<option value="">-- Pilih Indikator Kinerja Urusan --</option>');
                        $.each(data, function(key, value) {
                            $('#id_indikator_kinerja_urusan').append('<option value="' + value.id + '">' + value.nama_indikator_kinerja + '</option>');
                        });
                    }
                });
            } else {
                $('#id_indikator_kinerja_urusan').html('<option value="">-- Pilih Indikator Kinerja Urusan --</option>');
                $('#id_program').html('<option value="">-- Pilih Program --</option>');
            }
        });

        $('#id_indikator_kinerja_urusan').change(function() {
            var indikatorKinerjaID = $(this).val();
            if (indikatorKinerjaID != '') {
                $.ajax({
                    url: '/indikator/getProgramByIndikator/' + indikatorKinerjaID,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $('#id_program').html('<option value="">-- Pilih Program --</option>');
                        $.each(data, function(key, value) {
                            $('#id_program').append('<option value="' + value.id + '">' + value.nama_program + '</option>');
                        });
                    }
                });
            } else {
                $('#id_program').html('<option value="">-- Pilih Program --</option>');
            }
        });
    });

    // dropdown kegiatan
    $(document).ready(function() {
        $('#id_program').change(function() {
            var programID = $(this).val();
            if (programID != '') {
                $.ajax({
                    url: '/indikator/getKegiatanByProgram/' + programID,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $('#id_kegiatan').html('<option value="">-- Pilih Kegiatan --</option>');
                        $.each(data, function(key, value) {
                            $('#id_kegiatan').append('<option value="' + value.id + '">' + value.nama_kegiatan + '</option>');
                        });
                    }
                });
            } else {
                $('#id_kegiatan').html('<option value="">-- Pilih Kegiatan --</option>');
            }
        });
    });

    // dropdown subkegiatan
    $(document).ready(function() {
        $('#id_kegiatan').change(function() {
            var kegiatanID = $(this).val();
            if (kegiatanID != '') {
                $.ajax({
                    url: '/indikator/getSubkegiatanByKegiatan/' + kegiatanID ,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $('#id_subkegiatan').html('<option value="">-- Pilih Subkegiatan --</option>');
                        $.each(data, function(key, value) {
                            $('#id_subkegiatan').append('<option value="' + value.id + '">' + value.nama_subkegiatan + '</option>');
                        });
                    }
                });
            } else {
                $('#id_subkegiatan').html('<option value="">-- Pilih subkegiatan --</option>');
            }
        });
    });

</script>


<?= $this->endSection(); ?>
