<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'school_code',
        'union_council_id'
    ];

    protected $dates = [

        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'date:d M, Y H:i',
    ];

    public function union_council()
    {
        return $this->belongsTo(UnionCouncil::class, 'union_council_id', 'id');
    }

    public function job_preferences()
    {
        return $this->hasMany(JobPrefrence::class);
    }
}
