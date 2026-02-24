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

    /**
     * Scope a query to search by nomer_surat or perihal.
     */
    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            $q->where('nomer_surat', 'like', "%{$search}%")
              ->orWhere('perihal', 'like', "%{$search}%");
        });
    }

    /**
     * Scope a query to filter by date range.
     */
    public function scopeFilterByDate($query, $start_date, $end_date)
    {
        return $query->when($start_date && $end_date, function ($q) use ($start_date, $end_date) {
            $q->whereBetween('tanggal_surat', [$start_date, $end_date]);
        });
    }
}
