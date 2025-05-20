<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class UnitKerja extends Model
{
    use HasUlids;
    public    $incrementing = false;
    protected $keyType      = 'string';
    protected $table        = 'unit_kerjas';
    protected $fillable     = ['nama_unit'];
}