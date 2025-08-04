<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratKeluarModel extends Model
{
    protected $table      = 'surat_keluar';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'tahun',
        'no_surat',
        'tanggal_surat',
        'tanggal_keluar',
        'kepada',
        'perihal',
        'pembuat_surat',
        'divisi',
        'courier',
        'tanggal_buat',
        'tanggal_update',
        'file'
    ];

    protected $useTimestamps = false; // set true jika kamu pakai created_at dan updated_at otomatis

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
