<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratMasukModel extends Model
{
    protected $table            = 'surat_masuk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = [
        'tahun',
        'no_surat',
        'tanggal_surat',
        'surat_diterima',
        'dari',
        'perihal',
        'kepada',
        'courier',
        'dibuat',
        'tanggal_buat',
        'tanggal_update',
        'file',
    ];

    // Tidak pakai created_at/updated_at default CodeIgniter
    protected $useTimestamps = false;
}
