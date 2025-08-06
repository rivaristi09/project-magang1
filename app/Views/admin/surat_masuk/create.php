<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- Header -->
    <div class="page-header mb-4">
        <h2><i class="fas fa-plus-circle"></i> Form Tambah Surat Masuk</h2>
        <p class="text-light">Silakan isi data surat masuk dengan lengkap dan benar</p>
    </div>

    <!-- Form -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="<?= site_url('surat_masuk/store') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tahun</label>
                        <input type="number" name="tahun" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">No Surat</label>
                        <input type="text" name="no_surat" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Surat</label>
                        <input type="date" name="tanggal_surat" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Diterima</label>
                        <input type="date" name="surat_diterima" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Dari</label>
                        <input type="text" name="dari" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Courier</label>
                        <input type="text" name="courier" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Perihal</label>
                    <input type="text" name="perihal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kepada</label>
                    <textarea name="kepada" class="form-control" rows="2" required></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Dibuat Oleh</label>
                        <input type="text" name="dibuat" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upload File (Opsional)</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Buat</label>
                        <input type="date" name="tanggal_buat" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Update</label>
                        <input type="date" name="tanggal_update" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= site_url('surat_masuk') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
