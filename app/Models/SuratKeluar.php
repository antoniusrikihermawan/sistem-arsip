<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';
    protected $primaryKey = 'id_surat_keluar';

    protected $casts = [
        'tanggal_surat' => 'date',
        'tanggal_kirim' => 'date',
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'id_surat_keluar';
    }

    protected $fillable = [
        'id_user',
        'nomer_surat',
        'tanggal_surat',
        'tanggal_kirim',
        'perihal',
        'ditujukan',
        'file_surat',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Scope a query to search by nomer_surat or perihal.
     */
    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        return $query->when($search, function (Builder $q) use ($search) {
            $q->where('nomer_surat', 'like', "%{$search}%")
              ->orWhere('perihal', 'like', "%{$search}%");
        });
    }

    /**
     * Scope a query to filter by date range.
     */
    public function scopeFilterByDate(Builder $query, ?string $startDate, ?string $endDate): Builder
    {
        return $query->when($startDate && $endDate, function (Builder $q) use ($startDate, $endDate) {
            $q->whereBetween('tanggal_surat', [$startDate, $endDate]);
        });
    }
}
