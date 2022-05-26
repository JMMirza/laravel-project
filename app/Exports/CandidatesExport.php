<?php

namespace App\Exports;

use App\Models\JobApplication;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CandidatesExport implements FromCollection, WithMapping, WithHeadings
{
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function collection()
    {
        return $this->data;
        //  JobApplication::where('status', '=', 'SHORTLISTED')->with(['job_announcement', 'user', 'job_prefrences'])->get();
    }
    public function map($data): array
    {
        // dd($data->toArray());
        return [
            $data->id,
            $data->job_announcement->job_title,
            $data->user->name,
            'Yes',
            $data->shortlisted_at,
            $data->user_shortlisted_by->name,
            // $data->invitation_sent,
            // $data->user_invitation_sent_by->name,
            // $data->invitation_sent_at,
            'Yes',
            $data->user_sms_sent_by->name,
            $data->sms_sent_at,
            $data->status,
            $data->created_at,
            $data->updated_at,
        ];
    }
    public function headings(): array
    {
        return [
            'Job Application ID',
            'Job Title',
            'Candidate Name',
            'Is Shortlisted',
            'Shortlisted At',
            'Shortlisted By',
            // 'Invitation_sent',
            // 'Invitation_sent_by',
            // 'Invitation_sent_at',
            'SMS Sent',
            'SMS Sent By',
            'SMS Sent At',
            'Job Application Status',
            'Created_At',
            'Updated_At',
        ];
    }
}
