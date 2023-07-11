<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasAkhir extends Model
{
    protected $table                = 'tugas_akhir';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['judul','nama','nim','tahun','file'];
}
