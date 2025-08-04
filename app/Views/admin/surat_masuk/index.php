<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<style>
    /* Page Header Styling */
    .page-header {
        background: linear-gradient(135deg, #2c5f8a 0%, #1e3a52 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(44, 95, 138, 0.15);
    }

    .page-header h2 {
        margin: 0;
        font-size: 2rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .page-header .page-subtitle {
        margin-top: 0.5rem;
        opacity: 0.9;
        font-size: 1rem;
    }

    /* Action Bar */
    .action-bar {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .btn-add {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(40, 167, 69, 0.3);
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 20px rgba(40, 167, 69, 0.4);
        color: white;
        text-decoration: none;
    }

    /* Table Container */
    .table-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .table-header {
        background: #f8f9fc;
        padding: 1.5rem;
        border-bottom: 1px solid #e9ecef;
    }

    .table-title {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 600;
        color: #2c5f8a;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .table-stats {
        margin-top: 0.5rem;
        color: #6c757d;
        font-size: 0.9rem;
    }

    /* Enhanced Table Styling */
    .table-striped thead th {
        background: linear-gradient(135deg, #2c5f8a 0%, #1e3a52 100%);
        color: white;
        padding: 1rem 0.75rem;
        font-weight: 600;
        text-align: left;
        border: none;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-striped tbody tr {
        border-bottom: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .table-striped tbody tr:hover {
        background: #f8f9fc !important;
        transform: scale(1.001);
    }

    .table-striped tbody td {
        padding: 1rem 0.75rem;
        vertical-align: middle;
        border: none;
    }

    /* Row Number Styling */
    .row-number {
        background: #e9ecef;
        color: #495057;
        padding: 0.5rem;
        border-radius: 6px;
        font-weight: 600;
        text-align: center;
        min-width: 40px;
        display: inline-block;
    }

    /* File Link Styling */
    .file-link {
        background: #007bff;
        color: white;
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.8rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        transition: all 0.3s ease;
    }

    .file-link:hover {
        background: #0056b3;
        color: white;
        text-decoration: none;
        transform: translateY(-1px);
    }

    .no-file {
        color: #6c757d;
        font-style: italic;
        font-size: 0.85rem;
    }

    /* Action Buttons */
    .btn-edit {
        background: #ffc107;
        border: none;
        color: #212529;
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-right: 0.5rem;
    }

    .btn-edit:hover {
        background: #e0a800;
        color: #212529;
        text-decoration: none;
        transform: translateY(-1px);
    }

    .btn-delete {
        background: #dc3545;
        border: none;
        color: white;
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-delete:hover {
        background: #c82333;
        transform: translateY(-1px);
    }

    /* Alert Styling */
    .alert-success {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        border: 1px solid #c3e6cb;
        color: #155724;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(21, 87, 36, 0.1);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header {
            padding: 1.5rem;
        }
        
        .page-header h2 {
            font-size: 1.5rem;
        }
        
        .action-bar {
            flex-direction: column;
            align-items: stretch;
        }
        
        .table-responsive {
            border-radius: 0;
        }
    }
</style>

<!-- Page Header -->
<div class="page-header">
    <h2>
        <i class="fas fa-inbox"></i>
        Daftar Surat Masuk
    </h2>
    <div class="page-subtitle">Kelola dan pantau semua surat masuk dalam sistem</div>
</div>

<!-- Success Alert -->
<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle mr-2"></i>
    <strong>Berhasil!</strong> <?= session()->getFlashdata('success') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>

<!-- Action Bar -->
<div class="action-bar">
    <div>
        <a href="<?= site_url('surat_masuk/create') ?>" class="btn-add">
            <i class="fas fa-plus"></i>
            Tambah Surat Masuk
        </a>
    </div>
</div>

<!-- Table Container -->
<div class="table-container">
    <div class="table-header">
        <h3 class="table-title">
            <i class="fas fa-list"></i>
            Data Surat Masuk
        </h3>
        <div class="table-stats">
            Total: <strong><?= count($surat) ?></strong> surat masuk terdaftar
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped custom-table">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 80px;">Tahun</th>
                    <th style="width: 140px;">No Surat</th>
                    <th style="width: 120px;">Tgl Surat</th>
                    <th style="width: 120px;">Tgl Terima</th>
                    <th style="width: 150px;">Pengirim</th>
                    <th>Perihal</th>
                    <th style="width: 130px;">Kepada</th>
                    <th style="width: 100px;">Courier</th>
                    <th style="width: 100px;">Dibuat</th>
                    <th style="width: 120px;">Tgl Buat</th>
                    <th style="width: 120px;">Tgl Update</th>
                    <th style="width: 80px;">File</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($surat)): ?>
                <tr>
                    <td colspan="14" style="text-align: center; padding: 3rem; color: #6c757d;">
                        <i class="fas fa-inbox" style="font-size: 3rem; opacity: 0.3; margin-bottom: 1rem; display: block;"></i>
                        <strong>Belum ada data surat masuk</strong><br>
                        <small>Klik tombol "Tambah Surat Masuk" untuk menambah data pertama</small>
                    </td>
                </tr>
                <?php else: ?>
                    <?php foreach ($surat as $key => $row): ?>
                    <tr>
                        <td>
                            <span class="row-number"><?= $key + 1 ?></span>
                        </td>
                        <td>
                            <strong style="color: #2c5f8a;"><?= esc($row['tahun']) ?></strong>
                        </td>
                        <td>
                            <strong style="color: #2c5f8a;"><?= esc($row['no_surat']) ?></strong>
                        </td>
                        <td><?= date('d/m/Y', strtotime($row['tanggal_surat'])) ?></td>
                        <td>
                            <span style="background: #d4edda; color: #155724; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;">
                                <?= date('d/m/Y', strtotime($row['surat_diterima'])) ?>
                            </span>
                        </td>
                        <td>
                            <strong><?= esc($row['dari']) ?></strong>
                        </td>
                        <td>
                            <div style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="<?= esc($row['perihal']) ?>">
                                <?= esc($row['perihal']) ?>
                            </div>
                        </td>
                        <td><?= esc($row['kepada']) ?></td>
                        <td>
                            <span style="background: #6f42c1; color: white; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;">
                                <?= esc($row['courier']) ?>
                            </span>
                        </td>
                        <td><?= esc($row['dibuat']) ?></td>
                        <td>
                            <small class="text-muted"><?= date('d/m/Y H:i', strtotime($row['tanggal_buat'])) ?></small>
                        </td>
                        <td>
                            <small class="text-muted"><?= date('d/m/Y H:i', strtotime($row['tanggal_update'])) ?></small>
                        </td>
                        <td>
                            <?php if (isset($row['file']) && $row['file']): ?>
                                <a href="<?= base_url('uploads/surat_masuk/' . $row['file']) ?>" target="_blank" class="file-link">
                                    <i class="fas fa-file-pdf"></i>
                                    Lihat
                                </a>
                            <?php else: ?>
                                <span class="no-file">Tidak Ada</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= site_url('surat_masuk/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm btn-edit" title="Edit Surat">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="<?= site_url('surat_masuk/delete/' . $row['id']) ?>" method="post" style="display:inline;" onsubmit="return confirmDelete('<?= esc($row['no_surat']) ?>')">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger btn-sm btn-delete" title="Hapus Surat">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
// Enhanced Delete Confirmation
function confirmDelete(suratNumber) {
    return