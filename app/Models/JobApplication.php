<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'job_announcement_id',
        'user_id',
        'status'
    ];

    protected $dates = [

        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'date:d M, Y',
    ];

    public function job_announcement()
    {
        return $this->belongsTo(JobAnnouncement::class, 'job_announcement_id', 'id');
    }

    public function job_prefrences()
    {
        return $this->hasMany(JobPrefrence::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user_shortlisted_by()
    {
        return $this->belongsTo(User::class, 'shortlisted_by', 'id');
    }

    public function user_invitation_sent_by()
    {
        return $this->belongsTo(User::class, 'invitation_sent_by', 'id');
    }

    public function user_sms_sent_by()
    {
        return $this->belongsTo(User::class, 'sms_sent_by', 'id');
    }

    function sendSmsShortcode($message, $mobile_number, $debug = false)
    {

        $type = "xml";
        $id = "cd1094beacon";
        $pass = "system231";
        $lang = "English";
        $mask = "1";
        $result = substr($mobile_number, 0, 1);
        if ($result == '0') {
            $to = substr_replace($mobile_number, '92', 0, 1);
        } else {
            $to = $mobile_number;
        }
        // dd($to);
        $message = urlencode($message);
        $data = "id=" . $id . "&pass=" . $pass . "&msg=" . $message . "&to=" . $to . "&lang=" . $lang . "&mask=" . $mask . "&type=" . $type;

        $ch = curl_init('http://www.opencodes.pk/api/medver.php/sendsms/url');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $xml = simplexml_load_string($result);
        $api_response = $xml->code;
        curl_close($ch);
        return $api_response;
    }
}
