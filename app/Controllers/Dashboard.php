<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $level = session()->get('level');

        if ($level === 'admin') {
            $tahun = $this->request->getGet('tahun') ?? date('Y');

            $suratMasukModel = new SuratMasukModel();
            $suratKeluarModel = new SuratKeluarModel();

            $dataMasuk = [];
            $dataKeluar = [];

            for ($i = 1; $i <= 12; $i++) {
                $dataMasuk[] = $suratMasukModel
                    ->where('YEAR(tanggal_surat)', $tahun)
                    ->where('MONTH(tanggal_surat)', $i)
                    ->countAllResults();

                $dataKeluar[] = $suratKeluarModel
                    ->where('YEAR(tanggal_surat)', $tahun)
                    ->where('MONTH(tanggal_surat)', $i)
                    ->countAllResults();
            }

            $data = [
                'tahun' => $tahun,
                'masuk' => $dataMasuk,
                'keluar' => $dataKeluar
            ];

            return view('admin/dashboard', $data);

        } elseif ($level === 'user') {
            return view('pengguna/dashboard'); // Pastikan file ini ada
        } else {
            return redirect()->to('/unauthorized');
        }
    }
}
