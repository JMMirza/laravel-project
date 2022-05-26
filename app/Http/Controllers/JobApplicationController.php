<?php

namespace App\Http\Controllers;

use App\Models\CandidateDocument;
use App\Models\District;
use App\Models\JobApplication;
use App\Models\JobPrefrence;
use App\Models\School;
use App\Models\UserCertificate;
use App\Models\UserExperience;
use Dompdf\Options;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Database\QueryException;
use PDF;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = \Auth::user();
        $data = JobApplication::with('job_announcement')->where(['user_id' => $user->id])->latest('created_at')->first();
        if ($data && $data->status != 'UNDER_REVIEW') {
            return view('candidate.application_history.index', ['job' => $data]);
        } else {
            return view('candidate.application_history.index');
        }
        // dd($data->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user =  \Auth::user();
        // $user_id = $user->id;
        $job_id = $request->job_id;
        // $input = [
        //     'job_announcement_id' => $job_id,
        //     'user_id' => $user_id,
        //     'status' => 'SUBMITTED'
        // ];
        // $job_applications = JobApplication::where([
        //     'job_announcement_id' => $job_id,
        //     'user_id' => $user_id,
        // ])->get();
        // dd($job_applications);
        //         if (count($job_applications) == 0) {
        // 
        //             $job_app = JobApplication::create($input);
        $districts = District::get();
        $schools = School::get();
        return view('candidate.dashboard.job_prefrence_modal', ['job_id' => $job_id, 'districts' => $districts, 'schools' => $schools]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function show(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobApplication $jobApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobApplication $jobApplication)
    {
        try {
            return $jobApplication->delete();
        } catch (QueryException $e) {
            print_r($e->errorInfo);
        }
    }
    public function printJobApp($job_application_id)
    {
        // dd($job_application_id);
        $user_id = \Auth::user()->id;
        $candidate_experience = UserExperience::where('user_id', $user_id)->get();
        $candidate_education = CandidateDocument::where('user_id', $user_id)->get();
        $candidate_certificate = UserCertificate::where('user_id', $user_id)->get();
        $candidate_prefrences = JobPrefrence::where(['user_id' => $user_id, 'job_application_id' => $job_application_id])->with('district', 'taluka', 'union_council', 'village', 'school')->get();
        $data = JobApplication::where(['id' => $job_application_id])->first();
        $pdf = PDF::loadView('candidate.user_info', ['candidate_prefrences' => $candidate_prefrences, 'education' => $candidate_education, 'experience' => $candidate_experience, 'certificate' => $candidate_certificate, 'data' => $data]);
        // dd($candidate_prefrences->toArray());
        return $pdf->stream('document.pdf');
        // return view('candidate.user_info', ['candidate_prefrences' => $candidate_prefrences, 'education' => $candidate_education, 'experience' => $candidate_experience, 'certificate' => $candidate_certificate, 'data' => $data]);
    }

    public function testSlip($job_application_id)
    {

        $data = JobApplication::where(['id' => $job_application_id])->with([
            'user',
            'job_announcement',
        ])->first();
        //         dd($data->toArray());
        // \QrCode::size(500)
        //     ->format('png')
        //     ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));
        // \QrCode::generate($data->reg_number.'123', 'uploads/qrcodes/qrcode.svg');
        //         dd($data->toArray());
        //        $options = new Options();
        //        $options->set('chroot', realpath(''));
        //        $dompdf = new Dompdf($options);

        //        dd($data->toArray());
        $pdf = PDF::loadView('candidate.exam_registration.roll_number_slip', ['data' => $data]);
        // return view('candidate.exam_registration.roll_number_slip', ['data' => $data]);

        return $pdf->stream('document.pdf');
        // return view('candidate.exam_registration.roll_number_slip', ['data' => $data]);
    }
}
