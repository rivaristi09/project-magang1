<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TMA Surat</title>

    <!-- Font Awesome & Google Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('css/template.css') ?>" rel="stylesheet">
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-envelope mr-2"></i> TMA Surat
        </div>

        <div class="nav-item">
            <a class="nav-link <?= current_url() == base_url('dashboard') ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </div>

        <div class="nav-item">
            <a class="nav-link <?= strpos(current_url(), 'surat_masuk') !== false ? 'active' : '' ?>" href="<?= base_url('surat_masuk') ?>">
                <i class="fas fa-inbox"></i> Surat Masuk
            </a>
        </div>

        <div class="nav-item">
            <a class="nav-link <?= strpos(current_url(), 'surat_keluar') !== false ? 'active' : '' ?>" href="<?= base_url('surat_keluar') ?>">
                <i class="fas fa-paper-plane"></i> Surat Keluar
            </a>
        </div>

        <div class="nav-item">
            <a class="nav-link <?= strpos(current_url(), 'user') !== false ? 'active' : '' ?>" href="<?= base_url('user') ?>">
                <i class="fas fa-user"></i> Manage User
            </a>
        </div>

        <div class="nav-item logout">
            <a class="nav-link" href="<?= base_url('login') ?>">
                <i class="fas fa-power-off"></i> Logout
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="topbar d-flex justify-content-between align-items-center px-4 py-3" style="background: transparent; box-shadow: none; padding-bottom: 0;">
            <div>
        <?php if (current_url() == base_url('dashboard')) : ?>
            <h4><i class="fas fa-home mr-2"></i>Dashboard</h4>
        <?php endif; ?>
            </div>
        </div>

        <!-- Dynamic Content -->
        <?= $this->renderSection('content') ?>
    </div>

</body>

</html>
