<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuratKeluarModel;

class SuratKeluar extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new SuratKeluarModel();
    }

    public function index()
{
    $data['surat'] = $this->model->findAll();
    // dd($data); // <-- aktifkan sementara untuk debug
    $level = session()->get('level');

    if ($level === 'admin') {
        return view('admin/surat_keluar/index', $data);
    } else {
        return view('pengguna/surat_keluar/index', $data);
    }
}


    public function detail($id)
    {
        $surat = $this->model->find($id);
        if (!$surat) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data tidak ditemukan");
        }

        $data['surat'] = $surat;
        $level = session()->get('level');

        if ($level === 'admin') {
            return view('admin/surat_keluar/detail', $data);
        } else {
            return view('pengguna/surat_keluar/detail', $data);
        }
    }

    public function create()
    {
        if (session()->get('level') !== 'admin') {
            return redirect()->back()->with('error', 'Tidak diizinkan.');
        }

        return view('admin/surat_keluar/create');
    }

    public function store()
    {
        if (session()->get('level') !== 'admin') {
            return redirect()->back()->with('error', 'Tidak diizinkan.');
        }

        $file = $this->request->getFile('file');
        $filename = null;

        if ($file && $file->isValid()) {
            $filename = $file->getRandomName();
            $file->move('uploads/surat_keluar', $filename);
        }

        $data = [
            'tahun'          => $this->request->getPost('tahun'),
            'no_surat'       => $this->request->getPost('no_surat'),
            'tanggal_surat'  => $this->request->getPost('tanggal_surat'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'kepada'         => $this->request->getPost('kepada'),
            'perihal'        => $this->request->getPost('perihal'),
            'pembuat_surat'  => $this->request->getPost('pembuat_surat'),
            'divisi'         => $this->request->getPost('divisi'),
            'courier'        => $this->request->getPost('courier'),
            'tanggal_buat'   => date('Y-m-d'),
            'tanggal_update' => date('Y-m-d'),
            'file'           => $filename
        ];

        $this->model->insert($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/surat_keluar')->with('success', 'Surat berhasil disimpan.');
    }

    public function edit($id)
    {
        if (session()->get('level') !== 'admin') {
            return redirect()->back()->with('error', 'Tidak diizinkan.');
        }

        $surat = $this->model->find($id);
        if (!$surat) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('admin/surat_keluar/edit', ['surat' => $surat]);
    }

    public function update($id)
    {
        if (session()->get('level') !== 'admin') {
            return redirect()->back()->with('error', 'Tidak diizinkan.');
        }

        $file = $this->request->getFile('file');
        $filename = $this->model->find($id)['file'];

        if ($file && $file->isValid()) {
            $newFilename = $file->getRandomName();
            $file->move('uploads/surat_keluar', $newFilename);
            $filename = $newFilename;
        }

        $data = [
            'tahun'          => $this->request->getPost('tahun'),
            'no_surat'       => $this->request->getPost('no_surat'),
            'tanggal_surat'  => $this->request->getPost('tanggal_surat'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'kepada'         => $this->request->getPost('kepada'),
            'perihal'        => $this->request->getPost('perihal'),
            'pembuat_surat'  => $this->request->getPost('pembuat_surat'),
            'divisi'         => $this->request->getPost('divisi'),
            'courier'        => $this->request->getPost('courier'),
            'tanggal_update' => date('Y-m-d'),
            'file'           => $filename
        ];

        $this->model->update($id, $data);
        return redirect()->to('/surat_keluar')->with('success', 'Surat berhasil diperbarui.');
    }

    public function delete($id)
    {
        if (session()->get('level') !== 'admin') {
            return redirect()->back()->with('error', 'Tidak diizinkan.');
        }

        $this->model->delete($id);
        return redirect()->to('/surat_keluar')->with('success', 'Surat berhasil dihapus.');
    }
}
