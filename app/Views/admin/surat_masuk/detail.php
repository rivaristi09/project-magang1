<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h2>Detail Surat Keluar</h2>

<table class="table table-striped">
    <tr><th>Tahun</th><td><?= esc($surat['tahun']) ?></td></tr>
    <tr><th>No Surat</th><td><?= esc($surat['no_surat']) ?></td></tr>
    <tr><th>Tanggal Surat</th><td><?= esc($surat['tanggal_surat']) ?></td></tr>
    <tr><th>Surat Diterima</th><td><?= esc($surat['surat_diterima']) ?></td></tr>
    <tr><th>Dari</th><td><?= esc($surat['dari']) ?></td></tr>
    <tr><th>Perihal</th><td><?= esc($surat['perihal']) ?></td></tr>
    <tr><th>Kepada</th><td><?= esc($surat['kepada']) ?></td></tr>
    <tr><th>Courier</th><td><?= esc($surat['courier']) ?></td></tr>
    <tr><th>Dibuat</th><td><?= esc($surat['dibuat']) ?></td></tr>
    <tr><th>Tanggal_buat</th><td><?= esc($surat['tanggal_buat']) ?></td></tr>
    <tr><th>Tanggal_update</th><td><?= esc($surat['tanggal_update']) ?></td></tr>
    <tr><th>File</th>
        <td>
            <?php if ($surat['file']) : ?>
                <a href="<?= base_url('uploads/surat_masuk/' . $surat['file']) ?>" target="_blank">Lihat File</a>
            <?php else : ?>
                Tidak ada file
            <?php endif ?>
        </td>
    </tr>
</table>

<a href="<?= site_url('surat-masuk') ?>" class="btn btn-secondary">Kembali</a>

<?= $this->endSection() ?>
