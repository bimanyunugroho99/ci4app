<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_kelas', 'slug', 'progdi', 'matkul', 'jadwal', 'gambar'];

    public function getJadwal($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
