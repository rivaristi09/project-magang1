<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h2>Edit Surat Masuk</h2>

<form action="<?= site_url('surat_masuk/update/' . $surat['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-group">
        <label>Tahun</label>
        <input type="number" name="tahun" class="form-control" value="<?= esc($surat['tahun']) ?>" required>
    </div>

    <div class="form-group">
        <label>No Surat</label>
        <input type="number" name="no_surat" class="form-control" value="<?= esc($surat['no_surat']) ?>" required>
    </div>

    <div class="form-group">
        <label>Tanggal Surat</label>
        <input type="date" name="tanggal_surat" class="form-control" value="<?= esc($surat['tanggal_surat']) ?>" required>
    </div>

    <div class="form-group">
        <label>Surat Diterima</label>
        <input type="date" name="surat_diterima" class="form-control" value="<?= esc($surat['surat_diterima']) ?>" required>
    </div>

    <div class="form-group">
        <label>Dari</label>
        <input type="text" name="dari" class="form-control" value="<?= esc($surat['dari']) ?>" required>
    </div>

    <div class="form-group">
        <label>Perihal</label>
        <textarea name="perihal" class="form-control" required><?= esc($surat['perihal']) ?></textarea>
    </div>

    <div class="form-group">
        <label>Kepada</label>
        <input type="text" name="kepada" class="form-control" value="<?= esc($surat['kepada']) ?>" required>
    </div>

    <div class="form-group">
        <label>Courier</label>
        <input type="text" name="courier" class="form-control" value="<?= esc($surat['courier']) ?>">
    </div>

    <div class="form-group">
        <label>Dibuat</label>
        <input type="text" name="dibuat" class="form-control" value="<?= esc($surat['dibuat']) ?>" required>
    </div>

    <div class="form-group">
        <label>Tanggal Buat</label>
        <input type="date" name="tanggal_buat" class="form-control" value="<?= esc($surat['tanggal_buat']) ?>" readonly>
    </div>

    <div class="form-group">
        <label>Tanggal Update</label>
        <input type="date" name="tanggal_update" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
    </div>

    <div class="form-group">
        <label>File Baru (Opsional)</label>
        <input type="file" name="file" class="form-control">
        <?php if ($surat['file']): ?>
            <small>File sebelumnya: <a href="<?= base_url('uploads/surat_masuk/' . $surat['file']) ?>" target="_blank">Lihat File</a></small>
        <?php endif ?>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>

<?= $this->endSection() ?>
