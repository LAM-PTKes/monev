<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IsiMonev extends Model
{
    use HasUlids;
    public    $incrementing = false;
    protected $keyType      = 'string';
    protected $table        = 'isi_monevs';
    protected $fillable     = ['unit_id', 'aspek', 'indikator', 'kategori', 'satuan', 'bahan', 'metode', 'kriteria', 'hasil_tw_I', 'hasil_tw_II', 'hasil_tw_III', 'hasil_tw_IV', 'januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember', 'catatan', 'pic', 'form', 'tahun'];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(UnitKerja::class);
    }
}
