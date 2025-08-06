<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuratMasukModel;

class SuratMasuk extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new SuratMasukModel();
    }

    public function index()
    {
        $data['surat'] = $this->model->findAll();
        $level = session()->get('level');

        if ($level === 'admin') {
            return view('admin/surat_masuk/index', $data);
        } else {
            return view('pengguna/surat_masuk/index', $data);
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
            return view('admin/surat_masuk/detail', $data);
        } else {
            return view('pengguna/surat_masuk/detail', $data);
        }
    }

    public function create()
    {
        if (session()->get('level') !== 'admin') {
            return redirect()->back()->with('error', 'Tidak diizinkan.');
        }

        return view('admin/surat_masuk/create');
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
            $file->move('uploads/surat_masuk', $filename);
        }

        $data = [
            'tahun'           => $this->request->getPost('tahun'),
            'no_surat'        => $this->request->getPost('no_surat'),
            'tanggal_surat'   => $this->request->getPost('tanggal_surat'),
            'surat_diterima'  => $this->request->getPost('surat_diterima'),
            'dari'            => $this->request->getPost('dari'),
            'perihal'         => $this->request->getPost('perihal'),
            'kepada'          => $this->request->getPost('kepada'),
            'courier'         => $this->request->getPost('courier'),
            'tanggal_buat'    => date('Y-m-d'),
            'tanggal_update'  => date('Y-m-d'),
            'file'            => $filename
        ];

        $this->model->insert($data);
        return redirect()->to('/surat_masuk')->with('success', 'Surat masuk berhasil disimpan.');
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

        return view('admin/surat_masuk/edit', ['surat' => $surat]);
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
            $file->move('uploads/surat_masuk', $newFilename);
            $filename = $newFilename;
        }

        $data = [
            'tahun'           => $this->request->getPost('tahun'),
            'no_surat'        => $this->request->getPost('no_surat'),
            'tanggal_surat'   => $this->request->getPost('tanggal_surat'),
            'surat_diterima'  => $this->request->getPost('surat_diterima'),
            'dari'            => $this->request->getPost('dari'),
            'perihal'         => $this->request->getPost('perihal'),
            'kepada'          => $this->request->getPost('kepada'),
            'courier'         => $this->request->getPost('courier'),
            'dibuat'          => session()->get('nama_pengguna'),
            'tanggal_buat'    => date('Y-m-d'),
            'tanggal_update'  => date('Y-m-d'),
            'file'            => $filename
        ];

        $this->model->update($id, $data);
        return redirect()->to('/surat_masuk')->with('success', 'Surat masuk berhasil diperbarui.');
    }

    public function delete($id)
    {
        if (session()->get('level') !== 'admin') {
            return redirect()->back()->with('error', 'Tidak diizinkan.');
        }

        $this->model->delete($id);
        return redirect()->to('/surat_masuk')->with('success', 'Surat masuk berhasil dihapus.');
    }
}
