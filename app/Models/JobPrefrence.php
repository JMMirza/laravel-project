<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPrefrence extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'job_application_id',
        'user_id',
        'district_id',
        'taluka_id',
        'village_id',
        'union_council_id',
        'union_council',
        'school_id',
        'pref_order'
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function taluka()
    {
        return $this->belongsTo(Taluka::class, 'taluka_id', 'id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }


    public function union_council()
    {
        return $this->belongsTo(UnionCouncil::class, 'union_council_id', 'id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function job_application()
    {
        return $this->belongsTo(JobApplication::class, 'job_application_id', 'id');
    }
}
