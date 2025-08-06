<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<style>
    /* Page Header Styling */
    .page-header {
        background: linear-gradient(135deg, #2c5f8a 0%, #1e3a52 100%);
        color: white;
        padding: 1rem;
        border-radius: 6px;
        margin-bottom: 1rem;
        box-shadow: 0 4px 20px rgba(44, 95, 138, 0.15);
    }

    .page-header h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .page-header .page-subtitle {
        margin-top: 0.5rem;
        opacity: 0.9;
        font-size: 0.85rem;
    }

    .action-bar {
        background: white;
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .btn-add {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        color: white;
        padding: 0.5rem 0.7rem;
        border-radius: 5px;
        font-weight: 300;
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

    .table-container {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .table-header {
        background: #f8f9fc;
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
    }

    .table-title {
        margin: 0;
        font-size: 1rem;
        font-weight: 300;
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

    .custom-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
        font-size: 0.85rem;
    }

    .custom-table thead th {
        background: linear-gradient(135deg, #2c5f8a 0%, #1e3a52 100%);
        color: white;
        padding: 0.75rem 0.5rem;
        font-weight: 300;
        text-align: left;
        border: none;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .custom-table tbody tr {
        border-bottom: 0.75px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .custom-table tbody tr:hover {
        background: #f8f9fc;
        transform: scale(1.001);
    }

    .custom-table tbody td {
        padding: 0.75rem 0.5rem;
        vertical-align: middle;
        border: none;
    }

    .row-number {
        background: #e9ecef;
        color: #495057;
        padding: 0.4rem;
        border-radius: 6px;
        font-weight: 600;
        text-align: center;
        min-width: 30px;
        display: inline-block;
    }

    .status-badge {
        padding: 0.3rem 0.6rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 300;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-sent {
        background: #d1ecf1;
        color: #0c5460;
    }

    .status-draft {
        background: #fff3cd;
        color: #856404;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .btn-edit {
        background: #ffc107;
        border: none;
        color: #212529;
        padding: 0.3rem 0.6rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
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
        padding: 0.3rem 0.6rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-delete:hover {
        background: #c82333;
        transform: translateY(-1px);
    }

    @media (max-width: 768px) {
        .action-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .custom-table {
            font-size: 0.8rem;
        }

        .custom-table thead th,
        .custom-table tbody td {
            padding: 0.5rem 0.4rem;
        }

        .action-buttons {
            flex-direction: column;
            gap: 0.3rem;
        }
    }
</style>

<div class="page-header">
    <h2><i class="fas fa-user"></i> Manajemen User</h2>
    <div class="page-subtitle">Kelola data user sistem</div>
</div>

<div class="action-bar">
    <a href="<?= base_url('user/create') ?>" class="btn-add">
        <i class="fas fa-user-plus"></i> Tambah User
    </a>
</div>

<div class="table-container">
    <div class="table-header">
        <div class="table-title">
            <i class="fas fa-users"></i> Daftar User
        </div>
        <div class="table-stats">
            Total: <?= count($users) ?> user
        </div>
    </div>

    <table class="custom-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $key => $user) : ?>
                <tr>
                    <td><span class="row-number"><?= $key + 1 ?></span></td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['nama']) ?></td>
                    <td>
                        <span class="status-badge <?= $user['level'] == 'admin' ? 'status-sent' : 'status-draft' ?>">
                            <?= esc(ucfirst($user['level'])) ?>
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="<?= base_url('user/edit/' . $user['id']) ?>" class="btn-edit">Edit</a>
                            <a href="<?= base_url('user/delete/' . $user['id']) ?>" class="btn-delete" onclick="return confirm('Hapus user ini?')">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
