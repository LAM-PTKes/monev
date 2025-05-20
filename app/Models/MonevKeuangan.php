<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class MonevKeuangan extends Model
{
    use HasUlids;
    public    $incrementing = false;
    protected $keyType      = 'string';
    protected $table        = 'monev_keuangans';
    protected $fillable     = ['kategori_form', 'nama_file', 'tahun'];
}
