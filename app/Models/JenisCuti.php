<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCuti extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }
}
