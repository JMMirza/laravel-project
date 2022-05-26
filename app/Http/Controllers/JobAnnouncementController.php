<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\JobAnnouncement;
use App\Models\JobApplication;
use App\Models\State;
use Illuminate\Http\Request;
use File;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;

class JobAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            //dd($request->all());
            $data = JobAnnouncement::with(['job_applications', 'state', 'city']);
            if ($request->state_id && $request->state_id > 0) {
                $data->where('state_id', 'like', $request->state_id);
                // dd($data->toArray());
            }
            if ($request->city_id && $request->city_id > 0) {

                $data->where('city_names', 'like', '%' . $request->city_id . '%');
            }
            if ($request->searchTerm && $request->searchTerm != null) {
                $data->orWhere('job_title', 'like', '%' . $request->searchTerm . '%');
                $data->orWhere('job_education', 'like', '%' . $request->searchTerm . '%');
                $data->orWhere('job_max_age', 'like', '%' . $request->searchTerm . '%');
                $data->orWhere('job_selection_criteria', 'like', '%' . $request->searchTerm . '%');
                $data->orWhere('job_email', 'like', '%' . $request->searchTerm . '%');
                $data->orWhere('job_valid_till', 'like', '%' . $request->searchTerm . '%');
            }

            $data = $data->get();
            // dd($data->toArray());
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('exam_center.job_lists.actions', ['row' => $row]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $job_list = JobAnnouncement::first();
        $city_names = explode(' , ', $job_list->city_names);
        $country = Country::get();
        $states = State::get();
        $cities = City::where(['state_id' => $job_list->state_id])->get();
        // dd($city_names);
        return view('exam_center.job_lists.job_lists', ['city_names' => $city_names, 'cities' => $cities, 'job_list' => $job_list, 'states' => $states, 'country' => $country]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::get();
        return view('exam_center.job_lists.add_new_job', ['states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $originalDate = $request->job_valid_till;
        // $newDate = date("Y-m-d", strtotime($originalDate));
        if ($request->city_names) {
            $input = $request->all();
            $array_to_string = implode(" , ", $request->city_names);
            $input['city_names'] = $array_to_string;
        }
        dd($request->all());
        $request->validate([
            'job_title' => 'required',
            'job_description' => 'required',
            'job_valid_till' => 'required',
            'job_education' => 'required',
            'job_max_age' => 'required',
            'job_selection_criteria' => 'required',
            'job_email' => 'required',
            'job_postal_address' => 'required',
            'city_names' => 'required',
            'state_id' => 'required',
            'job_add_image' => ['required', 'mimes:pdf,png,jpg,jpeg', 'max:2048'],
        ]);
        try {
            // dd($input);
            if ($request->hasfile('job_add_image')) {

                $path = public_path() . '/uploads/job_documents/';
                if (!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $filename = $request->document->getClientOriginalName();
                $destination_path = public_path('uploads/job_documents');
                $new_filename = Str::random(32) . '.' . $request->document->getClientOriginalExtension();
                $request->document->move($destination_path, $new_filename);

                $input['job_add_image'] = $new_filename;
            }

            $input['status'] = 'active';

            $result = JobAnnouncement::create($input);
            if ($result->wasRecentlyCreated) {
                return redirect()->route('job-lists.index')
                    ->with('success', 'Job announcement created successfully.');
            } else {
                return back()->withErrors($validated->errors());
            }
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobAnnouncement  $jobAnnouncement
     * @return \Illuminate\Http\Response
     */
    public function show(JobAnnouncement $jobAnnouncement)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobAnnouncement  $jobAnnouncement
     * @return \Illuminate\Http\Response
     */
    public function edit(JobAnnouncement $job_list)
    {
        $states = State::get();
        $cities = City::where(['state_id' => $job_list->state_id])->get();
        // dd($job_list->toArray());
        return view('exam_center.job_lists.job_lists', ['cities' => $cities, 'states' => $states, 'job_list' => $job_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobAnnouncement  $jobAnnouncement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobAnnouncement $job_list)
    {
        // dd($request->all());
        if ($request->city_names) {
            $input = $job_list;
            $array_to_string = implode(" , ", $request->city_names);
            $input['city_names'] = $array_to_string;
        }
        $request->validate([
            'job_title' => 'required',
            'job_description' => 'required',
            'job_valid_till' => 'required',
            'job_education' => 'required',
            'job_max_age' => 'required',
            'job_selection_criteria' => 'required',
            'job_email' => 'required',
            'job_postal_address' => 'required',
            'city_names' => 'required',
            'state_id' => 'required',
            'job_add_image' => ['required', 'mimes:pdf,png,jpg,jpeg', 'max:1000'],
        ]);
        try {
            // dd($input);
            if ($request->hasfile('job_add_image')) {

                $path = public_path() . '/uploads/job_documents/';
                if (!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $filename = $request->job_add_image->getClientOriginalName();
                $destination_path = public_path('uploads/job_documents');
                $new_filename = Str::random(32) . '.' . $request->job_add_image->getClientOriginalExtension();
                $request->job_add_image->move($destination_path, $new_filename);

                $input['job_add_image'] = $new_filename;
            }
            // dd($input->toArray());
            $job_list->update($input->toArray());
            return redirect()->route('job-lists.index')
                ->with('success', 'Job updated successfully.');
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobAnnouncement  $jobAnnouncement
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobAnnouncement $job_list)
    {
        try {
            return $job_list->delete();
        } catch (QueryException $e) {
            print_r($e->errorInfo);
        }
    }

    public function viewAdd($document_name)
    {
        return response()->download(public_path() . '/uploads/job_documents/' . $document_name, $document_name, [], 'inline');
    }

    public function howToApply()
    {
        return response()->download(public_path() . '/uploads/job_documents/howtoapply.pdf');
    }
}
