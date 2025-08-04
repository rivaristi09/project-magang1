<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Arsip Surat</title>

    <!-- Fonts and Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    
    <style>
        /* Reset dan Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
            color: #5a5c69;
        }

        /* Sidebar Styling */
        .sidebar {
            background: linear-gradient(180deg, #2C5F8A 0%, #1e3a52 100%);
            width: 280px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 1.5rem 1rem;
            background: rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
        }

        .sidebar-brand-text {
            font-size: 1.5rem;
            font-weight: 700;
            margin-left: 0.5rem;
        }

        .sidebar-brand-icon {
            font-size: 2rem;
        }

        .sidebar .nav-item {
            margin-bottom: 0.5rem;
        }

        .sidebar .nav-link {
            padding: 1rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            margin: 0 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .sidebar .nav-link i {
            margin-right: 0.75rem;
            width: 16px;
            text-align: center;
        }

        .sidebar-heading {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 1rem 1.5rem 0.5rem;
        }

        .sidebar-divider {
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            margin: 1rem 0;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
        }

        /* Topbar */
        .topbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-left {
            display: flex;
            align-items: center;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #5a5c69;
            margin-right: 1rem;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .notification-icon {
            position: relative;
            color: #5a5c69;
            font-size: 1.2rem;
        }

        .notification-badge {
            background: #e74a3b;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: -8px;
            right: -8px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #5a5c69;
            font-weight: 600;
        }

        .user-avatar {
            width: 2.5rem;
            height: 2.5rem;
            background: #5a5c69;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        /* Content Area */
        .content-area {
            padding: 2rem;
        }

        .page-title {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            font-weight: 600;
            color: #5a5c69;
        }

        .page-title i {
            margin-right: 1rem;
            color: #2c5f8a;
        }

        /* Welcome Message */
        .welcome-message {
            background: rgba(76, 175, 238, 0.1);
            border: 1px solid rgba(76, 175, 238, 0.3);
            border-radius: 8px;
            padding: 1rem 1.5rem;
            margin-bottom: 2rem;
            color: #2c5f8a;
            font-weight: 500;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .close-btn {
            background: none;
            border: none;
            color: #2c5f8a;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0.7;
        }

        .close-btn:hover {
            opacity: 1;
        }

        /* Filter Section */
        .filter-section {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            margin-bottom: 2rem;
        }

        .filter-controls {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .year-select {
            padding: 0.75rem 1rem;
            border: 2px solid #e3e6f0;
            border-radius: 8px;
            font-size: 1rem;
            min-width: 120px;
            background: white;
        }

        .btn-filter {
            background: #2c5f8a;
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-filter:hover {
            background: #1e3a52;
            transform: translateY(-1px);
        }

        /* Chart Container */
        .chart-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .chart-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #5a5c69;
        }

        .chart-legend {
            display: flex;
            gap: 2rem;
            font-size: 0.9rem;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .legend-color {
            width: 16px;
            height: 16px;
            border-radius: 3px;
        }

        .legend-surat-masuk {
            background: #2c5f8a;
        }

        .legend-surat-keluar {
            background: #f39c12;
        }

        /* Chart Canvas */
        .chart-wrapper {
            position: relative;
            height: 400px;
            width: 100%;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .filter-controls {
                flex-direction: column;
                align-items: stretch;
            }
            
            .chart-legend {
                flex-direction: column;
                gap: 1rem;
            }
            
            .content-area {
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a class="sidebar-brand" href="#">
            <div class="sidebar-brand-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="sidebar-brand-text">TMA Surat</div>
        </a>

        <hr class="sidebar-divider">

        <div class="nav-item">
            <a class="nav-link active" href="<?= base_url('dashboard') ?>">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </div>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">Manajemen Surat</div>

        <div class="nav-item">
            <a class="nav-link" href="<?= base_url('surat_masuk') ?>">
                <i class="fas fa-inbox"></i>
                <span>Surat Masuk</span>
            </a>
        </div>
        
        <div class="nav-item">
            <a class="nav-link" href="<?= base_url('surat_keluar') ?>">
                <i class="fas fa-paper-plane"></i>
                <span>Surat Keluar</span>
            </a>
        </div>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">Pengguna</div>

        <div class="nav-item">
            <a class="nav-link" href="<?= base_url('user/manage') ?>">
                <i class="fas fa-users-cog"></i>
                <span>Manage User</span>
            </a>
        </div>

        <hr class="sidebar-divider">

        <div class="nav-item">
            <a class="nav-link" href="<?= base_url('logout') ?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <div class="topbar-left">
                <button class="menu-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="topbar-right">
                <div class="notification-icon">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">10</span>
                </div>
                <div class="user-info">
                    <span>ADMIN</span>
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">
            <!-- Page Title -->
            <h1 class="page-title">
                <i class="fas fa-home"></i>
                Dashboard
            </h1>

            <!-- Welcome Message -->
            <div class="welcome-message">
                <span>Selamat datang RAN!! Anda adalah Admin</span>
                <button class="close-btn" onclick="this.parentElement.style.display='none'">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Filter Section -->
            <div class="filter-section">
                <div class="filter-controls">
                    <select class="year-select">
                        <option value="2025" selected>2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                    </select>
                    <button class="btn-filter">Tampilkan</button>
                </div>
            </div>

            <!-- Chart Container -->
            <div class="chart-container">
                <div class="chart-header">
                    <h2 class="chart-title">Tahun - 2025</h2>
                    <div class="chart-legend">
                        <div class="legend-item">
                            <div class="legend-color legend-surat-masuk"></div>
                            <span>Surat Masuk</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color legend-surat-keluar"></div>
                            <span>Surat Keluar</span>
                        </div>
                    </div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>
        // Toggle Sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }

        // Chart Data
        const chartData = {
            labels: ['JAN', 'FEB', 'MAR', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AUG'],
            datasets: [{
                label: 'Surat Masuk',
                data: [4, 20, 14, 14, 7, 14, 4, 14],
                backgroundColor: '#2c5f8a',
                borderColor: '#2c5f8a',
                borderWidth: 1
            }, {
                label: 'Surat Keluar',
                data: [16, 10, 2, 10, 17, 14, 9, 20],
                backgroundColor: '#f39c12',
                borderColor: '#f39c12',
                borderWidth: 1
            }]
        };

        // Chart Configuration
        const config = {
            type: 'bar',
            data: chartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 25,
                        ticks: {
                            stepSize: 5
                        },
                        grid: {
                            color: '#e3e6f0'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                elements: {
                    bar: {
                        borderRadius: 4
                    }
                }
            }
        };

        // Initialize Chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, config);

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.querySelector('.menu-toggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !menuToggle.contains(event.target) &&
                sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });
    </script>
</body>
</html>