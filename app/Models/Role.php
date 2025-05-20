<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasUlids;
    public    $incrementing = false;
    protected $keyType      = 'string';
    protected $table        = 'roles';
    protected $fillable     = ['role_name'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_users')->using(RoleUser::class)->withTimestamps();
    }
}
