<?php

namespace App\Http\Controllers;

use App\Models\CandidateDocument;
use App\Models\District;
use App\Models\JobAnnouncement;
use App\Models\JobApplication;
use App\Models\JobPrefrence;
use App\Models\School;
use App\Models\Taluka;
use App\Models\UnionCouncil;
use App\Models\Village;
use App\Notifications\JobApplication as NotificationsJobApplication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;

class JobPrefrenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = \Auth::user();
        $districts = District::get();
        $talukas = Taluka::get();
        $job = JobAnnouncement::get();
        $job_pref = JobPrefrence::where(['user_id' => $user->id])->get();
        if ($request->ajax()) {
            $data = JobPrefrence::where('user_id', $user->id)->with(['district', 'taluka', 'village', 'union_council', 'school'])->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('candidate.job_preferences.actions', ['row' => $row]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $user_education = CandidateDocument::where(['user_id' => $user->id, 'academic_achievement' => 'bachelors'])->get();
        if (count($user_education) == 0) {
            $user_education = CandidateDocument::where(['user_id' => $user->id, 'academic_achievement' => 'masters'])->get();
            if (count($user_education) == 0) {
                $user_education = CandidateDocument::where(['user_id' => $user->id, 'academic_achievement' => 'phd'])->get();
            }
        }
        // dd($user_education->toArray());
        if ($user->dob) {
            $age = Carbon::parse($user->dob)->diff(Carbon::now())->y;
        } else {
            $age = 0;
        }

        if (count($job_pref) == 3) {
            // dd(count($job_pref));
            return view('candidate.job_preferences.index', ['age' => $age, 'user_education' => $user_education, 'limit' => 3, 'job_id' => $job[0]->id, 'user' => $user, 'districts' => $districts, 'talukas' => $talukas]);
        } else {
            return view('candidate.job_preferences.index', ['age' => $age, 'user_education' => $user_education, 'limit' => -1, 'job_id' => $job[0]->id, 'user' => $user, 'districts' => $districts, 'talukas' => $talukas]);
        }
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
        // $prefrenceArr = $request->preference_array;
        $user = \Auth::user();
        $job_id = $request->job_application_id;
        $user_id = $request->user_id;
        $request->validate([
            'district_id' => 'required',
            'taluka_id' => 'required',
            'village_id' => 'required',
            'union_council_id' => 'required',
            'school_id' => 'required',
        ]);

        $input = [
            'job_announcement_id' => $job_id,
            'user_id' => $user_id,
            'status' => 'UNDER_REVIEW'
        ];
        $job_applications = JobApplication::where([
            'job_announcement_id' => $job_id,
            'user_id' => $user_id,
        ])->first();


        if (!$job_applications) {
            $job_app = JobApplication::create($input);
            $job_app_id = $job_app->id;
            $user->notify(new NotificationsJobApplication("A new user has visited on your application."));
        } else {
            $job_app_id = $job_applications->id;
        }

        $jobPrefrenceInput = $request->all();
        $job_pref = JobPrefrence::where(['job_application_id' => $job_app_id, 'user_id' => $user_id])->latest()->get();
        if (count($job_pref) > 0) {
            $order = (int)($job_pref[0]->pref_order);
            $jobPrefrenceInput['job_application_id'] = $job_app_id;
            $jobPrefrenceInput['user_id'] = $user_id;
            $jobPrefrenceInput['pref_order'] = $order + 1;
        } else {
            $jobPrefrenceInput['job_application_id'] = $job_app_id;
            $jobPrefrenceInput['user_id'] = $user_id;
            $jobPrefrenceInput['pref_order'] =  1;
            // dd($jobPrefrenceInput);
        }

        JobPrefrence::create($jobPrefrenceInput);


        return
            back()->with('success', 'Your details added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobPrefrence  $jobPrefrence
     * @return \Illuminate\Http\Response
     */
    public function show(JobPrefrence $jobPrefrence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobPrefrence  $jobPrefrence
     * @return \Illuminate\Http\Response
     */
    public function edit(JobPrefrence $job_preference)
    {
        $user = \Auth::user();
        $districts = District::get();
        $talukas = Taluka::where(['district_id' => $job_preference->district_id])->get();
        $villages = Village::where(['taluka_id' => $job_preference->taluka_id])->get();
        $union_councils = UnionCouncil::where(['village_id' => $job_preference->village_id])->get();
        $schools = School::where(['union_council_id' => $job_preference->union_council_id])->get();
        $user_education = CandidateDocument::where(['user_id' => $user->id, 'academic_achievement' => 'bachelors'])->get();
        if (count($user_education) == 0) {
            $user_education = CandidateDocument::where(['user_id' => $user->id, 'academic_achievement' => 'masters'])->get();
            if (count($user_education) == 0) {
                $user_education = CandidateDocument::where(['user_id' => $user->id, 'academic_achievement' => 'phd'])->get();
            }
        }
        // dd($user_education->toArray());
        if ($user->dob) {
            $age = Carbon::parse($user->dob)->diff(Carbon::now())->y;
        } else {
            $age = 0;
        }
        $job = JobAnnouncement::get();
        return view(
            'candidate.job_preferences.index',
            [
                'age' => $age,
                'user_education' => $user_education,
                'job_preference' => $job_preference,
                'job_id' => $job[0]->id,
                'schools' => $schools,
                'villages' => $villages,
                'union_councils' => $union_councils,
                'user' => $user,
                'districts' => $districts,
                'talukas' => $talukas
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobPrefrence  $jobPrefrence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobPrefrence $job_preference)
    {
        $request->validate([
            'district_id' => 'required',
            'taluka_id' => 'required',
            'village_id' => 'required',
            'union_council_id' => 'required',
            'school_id' => 'required',
        ]);
        // dd($job_preference->toArray());
        $jobPrefrenceInput = $request->all();
        $jobPrefrenceInput['job_application_id'] = $job_preference->job_application_id;
        $jobPrefrenceInput['user_id'] = $job_preference->user_id;
        $jobPrefrenceInput['pref_order'] = $job_preference->pref_order;
        $job_preference->update($jobPrefrenceInput);

        return
            redirect()->route('job-preferences.index')->with('success', 'Your details edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobPrefrence  $jobPrefrence
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPrefrence $jobPrefrence)
    {
        //
    }
}
