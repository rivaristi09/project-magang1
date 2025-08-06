<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="d-flex justify-content-between align-items-center px-4 py-3 bg-white shadow-sm mb-3 rounded">
    <h4 class="mb-0"><i class="fas fa-home mr-2"></i> Dashboard</h4>

    <div class="d-flex align-items-center gap-3">
        <div class="position-relative mr-3">
            <i class="fas fa-bell fa-lg text-secondary"></i>
            <span class="badge badge-danger position-absolute" style="top: -6px; right: -10px; font-size: 10px;">10</span>
        </div>
        <span class="mr-2 font-weight-bold text-dark"><?= esc(session()->get('user')) ?></span>
        <i class="fas fa-user-circle fa-lg text-secondary"></i>
    </div>
</div>

<!-- Alert welcome -->
<div class="px-4">
    <div class="alert alert-primary d-flex justify-content-between align-items-center">
        <span>Selamat datang <?= esc(session()->get('user')) ?>! Anda adalah <?= esc(session()->get('level')) ?></span>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
</div>

<!-- Dropdown filter tahun -->
<div class="row mb-4 px-4">
    <div class="col-md-4">
        <form method="get" action="">
            <div class="input-group">
                <select name="tahun" class="form-control">
                    <?php 
                    $tahunDipilih = $_GET['tahun'] ?? date('Y');
                    for ($y = 2025; $y >= 2023; $y--): ?>
                        <option value="<?= $y ?>" <?= $tahunDipilih == $y ? 'selected' : '' ?>><?= $y ?></option>
                    <?php endfor; ?>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Tampilkan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Grafik Surat -->
<div class="card mx-4">
    <div class="card-body">
        <h5 class="mb-4">Tahun - <?= esc($tahunDipilih) ?></h5>
        <canvas id="suratChart"></canvas>
    </div>
</div>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('suratChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['JAN', 'FEB', 'MAR', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGT', 'SEP', 'OKT', 'NOV', 'DES'],
            datasets: [
                {
                    label: 'Surat Masuk',
                    backgroundColor: '#1e3a52',
                    data: [5, 20, 15, 15, 8, 14, 4, 14, 10, 12, 9, 6]
                },
                {
                    label: 'Surat Keluar',
                    backgroundColor: '#f39c12',
                    data: [17, 11, 1, 9, 18, 14, 10, 20, 16, 10, 13, 19]
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 5
                    }
                }
            }
        }
    });
</script>

<?= $this->endSection() ?>
