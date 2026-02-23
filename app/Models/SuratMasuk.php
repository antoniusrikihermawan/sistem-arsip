<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';
    protected $primaryKey = 'id_surat';

    protected $fillable = [
        'id_user',
        'nomer_surat',
        'tanggal_surat',
        'tanggal_terima',
        'pengirim',
        'perihal',
        'ditujukan',
        'file_surat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
