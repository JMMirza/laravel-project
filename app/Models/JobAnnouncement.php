<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobAnnouncement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'job_title',
        'job_description',
        'job_valid_till',
        'job_education',
        'job_max_age',
        'job_selection_criteria',
        'job_email',
        'job_postal_address',
        'city_names',
        'state_id'
    ];

    protected $dates = [

        'created_at',
        'updated_at',
        'job_valid_till'
    ];

    protected $casts = [
        'created_at' => 'date:d M, Y',
        'job_valid_till' => 'date:d M, Y',
        'updated_at' => 'date:d M, Y',
    ];

    protected $appends = [
        'job_add_image_url',
    ];

    public function getjobAddImageUrlAttribute()
    {
        $image = asset('uploads/placeholder.png');

        if (!empty($this->job_add_image) && file_exists('uploads/job_documents/' . $this->job_add_image)) {
            $image = asset('uploads/job_documents/' . $this->job_add_image);
        }

        return $image;
    }

    public function job_applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
