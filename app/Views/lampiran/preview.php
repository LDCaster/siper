<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pratinjau Lampiran</h1>
        </div>
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lampiran</h4>
                        </div>
                        <div class="card-body">
                        <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <a href="/lampiran" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <iframe src="<?= base_url('uploads/lampiran/' . $lampiran_detail['file']); ?>" class="embed-responsive-item" width="100%" height="600px" frameborder="0"></iframe>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<?= $this->endSection(); ?>
