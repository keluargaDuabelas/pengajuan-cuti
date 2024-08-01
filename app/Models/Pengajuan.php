<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'jenis_cuti_id', 'start_date', 'end_date', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jenisCuti()
    {
        return $this->belongsTo(JenisCuti::class);
    }
    public function getFormattedStartDateAttribute()
    {
        return Carbon::parse($this->attributes['start_date'])->format('d-m-Y');
    }

    public function getFormattedEndDateAttribute()
    {
        return Carbon::parse($this->attributes['end_date'])->format('d-m-Y');
    }
}
