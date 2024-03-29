<?php

namespace App\Models;

use App\Models\Pemeliharaan;
use App\Models\KategoriPemeliharaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangInventaris extends Model
{
    use HasFactory;

    public $table = 'barang_inventaris';
    public $incrementing = false;
    public $keyType = 'string';

    protected $fillable = [
        'id', 'id_kategori_pemeliharaan', 'nama'
    ];

    /**
     * Get the kategoriPemeliharaan that owns the BarangInventaris
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori_pemeliharaan(): BelongsTo
    {
        return $this->belongsTo(KategoriPemeliharaan::class, 'id_kategori_pemeliharaan');
    }

    /**
     * Get all of the gambar_pemeliharaan for the Pemeliharaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pemeliharaan(): HasMany
    {
        return $this->hasMany(Pemeliharaan::class, 'id_barang_inventaris');
    }

}
