<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<link href="<?= base_url('css/index-surat_masuk.css') ?>" rel="stylesheet">

<!-- Page Header -->
<div class="page-header">
    <h2><i class="fas fa-inbox"></i> Daftar Surat Masuk</h2>
    <div class="page-subtitle">Kelola dan pantau semua surat masuk dalam sistem</div>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        <strong>Berhasil!</strong> <?= session()->getFlashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php endif; ?>

<!-- Action Bar -->
<div class="action-bar">
    <a href="<?= site_url('surat_masuk/create') ?>" class="btn-add">
        <i class="fas fa-plus"></i> Tambah Surat Masuk
    </a>

    <div class="search-filters">
        <input type="text" class="search-input" placeholder="Cari nomor surat, pengirim, atau perihal..." id="searchInput">
        <select class="search-input" id="yearFilter">
            <option value="">Semua Tahun</option>
            <option value="2025">2025</option>
            <option value="2024">2024</option>
        </select>
    </div>
</div>

<!-- Table -->
<div class="table-container">
    <div class="table-header">
        <h3 class="table-title"><i class="fas fa-list"></i> Data Surat Masuk</h3>
        <div class="table-stats">
            Total: <strong><?= count($surat) ?></strong> surat masuk
        </div>
    </div>
    <div style="overflow-x: auto;">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>No Surat</th>
                    <th>Tgl Surat</th>
                    <th>Tgl Terima</th>
                    <th>Pengirim</th>
                    <th>Perihal</th>
                    <th>Kepada</th>
                    <th>Courier</th>
                    <th>Dibuat</th>
                    <th>Tgl Buat</th>
                    <th>Tgl Update</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($surat)): ?>
                    <tr>
                        <td colspan="14" style="text-align:center; padding: 3rem; color:#6c757d;">
                            <i class="fas fa-inbox" style="font-size: 3rem; opacity: 0.3;"></i><br>
                            <strong>Belum ada data surat masuk</strong><br>
                            <small>Klik tombol "Tambah Surat Masuk" untuk menambah data</small>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($surat as $key => $row): ?>
                        <tr class="table-row" data-year="<?= esc($row['tahun']) ?>" data-search="<?= strtolower(esc($row['no_surat'] . ' ' . $row['dari'] . ' ' . $row['perihal'])) ?>">
                            <td><span class="row-number"><?= $key + 1 ?></span></td>
                            <td><strong><?= esc($row['tahun']) ?></strong></td>
                            <td><strong><?= esc($row['no_surat']) ?></strong></td>
                            <td><?= date('d/m/Y', strtotime($row['tanggal_surat'])) ?></td>
                            <td>
                                <span style="background: #d4edda; color: #155724; padding: 0.3rem 0.6rem; border-radius: 15px;">
                                    <?= date('d/m/Y', strtotime($row['surat_diterima'])) ?>
                                </span>
                            </td>
                            <td><strong><?= esc($row['dari']) ?></strong></td>
                            <td>
                                <div style="max-width: 200px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;" title="<?= esc($row['perihal']) ?>">
                                    <?= esc($row['perihal']) ?>
                                </div>
                            </td>
                            <td><?= esc($row['kepada']) ?></td>
                            <td>
                                <span style="background: #6f42c1; color: white; padding: 0.3rem 0.6rem; border-radius: 15px;">
                                    <?= esc($row['courier']) ?>
                                </span>
                            </td>
                            <td><?= esc($row['dibuat']) ?></td>
                            <td><small class="text-muted"><?= date('d/m/Y H:i', strtotime($row['tanggal_buat'])) ?></small></td>
                            <td><small class="text-muted"><?= date('d/m/Y H:i', strtotime($row['tanggal_update'])) ?></small></td>
                            <td>
                                <?php if (!empty($row['file'])): ?>
                                    <a href="<?= base_url('uploads/surat_masuk/' . $row['file']) ?>" target="_blank" class="file-link">
                                        <i class="fas fa-file-pdf"></i> Lihat
                                    </a>
                                <?php else: ?>
                                    <span class="no-file">Tidak Ada</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div style="display:flex; gap:0.5rem;">
                                    <a href="<?= site_url('surat_masuk/edit/' . $row['id']) ?>" class="btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?= site_url('surat_masuk/delete/' . $row['id']) ?>" method="post" onsubmit="return confirmDelete('<?= esc($row['no_surat']) ?>')">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn-delete" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const yearFilter = document.getElementById('yearFilter');
    const tableRows = document.querySelectorAll('.table-row');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedYear = yearFilter.value;

        tableRows.forEach(row => {
            const searchData = row.getAttribute('data-search');
            const yearData = row.getAttribute('data-year');
            const matchSearch = searchData.includes(searchTerm);
            const matchYear = !selectedYear || yearData === selectedYear;
            row.style.display = (matchSearch && matchYear) ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterTable);
    yearFilter.addEventListener('change', filterTable);
});

function confirmDelete(noSurat) {
    return confirm('Yakin ingin menghapus surat dengan nomor: ' + noSurat + '?');
}
</script>

<?= $this->endSection() ?>
