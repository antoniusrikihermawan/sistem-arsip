<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';
    protected $primaryKey = 'id_surat_keluar';

    protected $fillable = [
        'id_user',
        'nomer_surat',
        'tanggal_surat',
        'tanggal_kirim',
        'perihal',
        'ditujukan',
        'file_surat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
