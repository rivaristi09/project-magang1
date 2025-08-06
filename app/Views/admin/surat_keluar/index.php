<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<link href="<?= base_url('css/index-surat_keluar.css') ?>" rel="stylesheet">

<!-- Loading Overlay -->
<div class="loading-overlay" id="loadingOverlay">
    <div class="spinner"></div>
</div>

<!-- Page Header -->
<div class="page-header">
    <h2>
        <i class="fas fa-paper-plane"></i>
        Daftar Surat Keluar
    </h2>
    <div class="page-subtitle">Kelola dan pantau semua surat keluar dalam sistem</div>
</div>

<!-- Success Alert -->
<?php if (session()->getFlashdata('success')): ?>
<div class="custom-alert alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle alert-icon"></i>
    <div>
        <strong>Berhasil!</strong> <?= session()->getFlashdata('success') ?>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>

<!-- Action Bar -->
<div class="action-bar">
    <div>
        <a href="<?= site_url('surat_keluar/create') ?>" class="btn-add">
            <i class="fas fa-plus"></i>
            Tambah Surat Keluar
        </a>
    </div>
    
    <div class="search-filters">
        <input type="text" class="search-input" placeholder="Cari berdasarkan nomor surat, tujuan, atau perihal..." id="searchInput">
        <select class="search-input" style="min-width: 120px;" id="yearFilter">
            <option value="">Semua Tahun</option>
            <option value="2025">2025</option>
            <option value="2024">2024</option>
            <option value="2023">2023</option>
        </select>
    </div>
</div>

<!-- Table Container -->
<div class="table-container">
    <div class="table-header">
        <h3 class="table-title">
            <i class="fas fa-list"></i>
            Data Surat Keluar
        </h3>
        <div class="table-stats">
            Total: <strong><?= count($surat) ?></strong> surat | 
            Tahun ini: <strong><?= count(array_filter($surat, function($s) { return $s['tahun'] == date('Y'); })) ?></strong> surat
        </div>
    </div>
    
    <div style="overflow-x: auto;">
        <table class="custom-table">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 140px;">No Surat</th>
                    <th style="width: 80px;">Tahun</th>
                    <th style="width: 120px;">Tgl Surat</th>
                    <th style="width: 120px;">Tgl Keluar</th>
                    <th style="width: 150px;">Tujuan</th>
                    <th>Perihal</th>
                    <th style="width: 120px;">Pembuat</th>
                    <th style="width: 100px;">Divisi</th>
                    <th style="width: 100px;">Courier</th>
                    <th style="width: 80px;">File</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php if (empty($surat)): ?>
                <tr>
                    <td colspan="12" style="text-align: center; padding: 3rem; color: #6c757d;">
                        <i class="fas fa-paper-plane" style="font-size: 3rem; opacity: 0.3; margin-bottom: 1rem; display: block;"></i>
                        <strong>Belum ada data surat keluar</strong><br>
                        <small>Klik tombol "Tambah Surat Keluar" untuk menambah data pertama</small>
                    </td>
                </tr>
                <?php else: ?>
                    <?php foreach ($surat as $key => $row): ?>
                    <tr class="table-row" data-year="<?= esc($row['tahun']) ?>" data-search="<?= strtolower(esc($row['no_surat'] . ' ' . $row['kepada'] . ' ' . $row['perihal'])) ?>">
                        <td>
                            <span class="row-number"><?= $key + 1 ?></span>
                        </td>
                        <td>
                            <strong style="color: #2c5f8a;"><?= esc($row['no_surat']) ?></strong>
                        </td>
                        <td>
                            <strong><?= esc($row['tahun']) ?></strong>
                        </td>
                        <td><?= date('d/m/Y', strtotime($row['tanggal_surat'])) ?></td>
                        <td>
                            <span class="status-badge status-sent">
                                <?= date('d/m/Y', strtotime($row['tanggal_keluar'])) ?>
                            </span>
                        </td>
                        <td>
                            <strong><?= esc($row['kepada']) ?></strong>
                        </td>
                        <td>
                            <div style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;" title="<?= esc($row['perihal']) ?>">
                                <?= esc($row['perihal']) ?>
                            </div>
                        </td>
                        <td><?= esc($row['pembuat_surat']) ?></td>
                        <td>
                            <span style="background: #17a2b8; color: white; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;">
                                <?= esc($row['divisi']) ?>
                            </span>
                        </td>
                        <td>
                            <span style="background: #6f42c1; color: white; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;">
                                <?= esc($row['courier']) ?>
                            </span>
                        </td>
                        <td>
                            <?php if (isset($row['file']) && $row['file']): ?>
                                <a href="<?= base_url('uploads/surat_keluar/' . $row['file']) ?>" target="_blank" class="file-link">
                                    <i class="fas fa-file-pdf"></i>
                                    Lihat
                                </a>
                            <?php else: ?>
                                <span class="no-file">Tidak Ada</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="<?= site_url('surat_keluar/edit/' . $row['id']) ?>" class="btn-edit" title="Edit Surat">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?= site_url('surat_keluar/delete/' . $row['id']) ?>" method="post" style="display:inline;" onsubmit="return confirmDelete(event, '<?= esc($row['no_surat']) ?>')">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn-delete" title="Hapus Surat">
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
// Search and Filter Functionality
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
            
            const matchesSearch = searchData.includes(searchTerm);
            const matchesYear = !selectedYear || yearData === selectedYear;
            
            if (matchesSearch && matchesYear) {
                row.style.display = '';
                row.style.animation = 'fadeIn 0.3s ease';
            } else {
                row.style.display = 'none';
            }
        });
        
        updateTableStats();
    }
    
    function updateTableStats() {
        const visibleRows = document.querySelectorAll('.table-row[style=""], .table-row:not([style])');
        const statsElement = document.querySelector('.table-stats');
        if (statsElement) {
            statsElement.innerHTML = `
                Menampilkan: <strong>${visibleRows.length}</strong> dari <strong><?= count($surat) ?></strong> surat
            `;
        }
    }
    
    searchInput.addEventListener('input', filterTable);
    yearFilter.addEventListener('change', filterTable);
});

// Enhanced Delete Confirmation
function confirmDelete(event, suratNumber) {
    event.preventDefault();
    
    if (confirm(`Apakah Anda yakin ingin menghapus surat keluar "${suratNumber}"?\n\nTindakan ini tidak dapat dibatalkan.`)) {
        // Show loading
        document.getElementById('loadingOverlay').style.display = 'flex';
        event.target.submit();
    }
    
    return false;
}

// Auto-hide alerts
setTimeout(function() {
    const alerts = document.querySelectorAll('.custom-alert');
    alerts.forEach(alert => {
        if (alert) {
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-20px)';
            setTimeout(() => alert.remove(), 300);
        }
    });
}, 5000);

// Add fade-in animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);

// Print function
function printTable() {
    window.print();
}

// Export function placeholder
function exportData() {
    alert('Fitur export akan segera hadir!');
}
</script>

<?= $this->endSection() ?>