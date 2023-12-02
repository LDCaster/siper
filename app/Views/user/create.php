<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item"><a href="/user">Master User</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah user</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="/user/store" method="post">
                            <div class="card-header">
                                <h4>Form Tambah user</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                            
                           
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                           
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                           
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Role</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span></div>                            
                                            <select class="form-control <?= (session('errors.role_id')) ? 'is-invalid' : ''; ?>" id="role_id" name="role_id" aria-label="Default select example">
                                                <option>--- Pilih Roles ---</option>
                                                <?php foreach ($role as $r) : ?>
                                                    <option value="<?= $r['id']; ?>" <?= (old('role_id') == $r['id']) ? 'selected' : ''; ?>>
                                                        <?= $r['nama']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                           
                                            <?php if (session('errors') && array_key_exists('role_id', session('errors'))) : ?>
                                                <div class="invalid-feedback">
                                                    <?= session('errors')['role_id']; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                           
                            
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/user" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
