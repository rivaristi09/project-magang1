<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h2>Tambah Surat Masuk</h2>

<form action="<?= site_url('surat_masuk/store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-group">
        <label>Tahun</label>
        <input type="number" name="tahun" class="form-control" required>
    </div>

    <div class="form-group">
        <label>No Surat</label>
        <input type="number" name="no_surat" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Tanggal Surat</label>
        <input type="date" name="tanggal_surat" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Surat Diterima</label>
        <input type="date" name="surat_diterima" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Dari</label>
        <input type="text" name="dari" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Perihal</label>
        <input type="text" name="perihal" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Kepada</label>
        <textarea name="kepada" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label>Courier</label>
        <input type="text" name="courier" class="form-control">
    </div>
    <div class="form-group">
        <label>Dibuat</label>
        <input type="text" name="dibuat" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Tanggal Buat</label>
        <input type="date" name="tanggal_buat" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
    </div>

    <div class="form-group">
        <label>Tanggal Update</label>
        <input type="date" name="tanggal_update" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
    </div>
    
    <div class="form-group">
        <label>Upload File (Opsional)</label>
        <input type="file" name="file" class="form-control">
    </div>

    <button type="submit" class="btn btn-success mt-2">Simpan</button>
</form>

<?= $this->endSection() ?>
