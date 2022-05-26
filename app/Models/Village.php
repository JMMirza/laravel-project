<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbreviation',
        'taluka_id'
    ];

    public function job_preferences()
    {
        return $this->hasMany(JobPrefrence::class);
    }
}
