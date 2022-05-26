<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnionCouncil extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'abbreviation',
        'taluka_id',
        'village_id'
    ];

    protected $dates = [

        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'date:d M, Y H:i',
    ];

    public function taluka()
    {
        return $this->belongsTo(Taluka::class, 'taluka_id', 'id');
    }

    public function schools()
    {
        return $this->hasMany(School::class);
    }

    public function job_preferences()
    {
        return $this->hasMany(JobPrefrence::class);
    }
}
