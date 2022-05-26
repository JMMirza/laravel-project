<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\UnionCouncil;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Database\QueryException;

class SchoolController extends Controller
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
            $data = School::with(['union_council'])->get();
            //             if ($request->state_id && $request->state_id > 0) {
            //                 $data->where('state_id', 'like', $request->state_id);
            //                 // dd($data->toArray());
            //             }
            //             if ($request->city_id && $request->city_id > 0) {
            // 
            //                 $data->where('city_names', 'like', '%' . $request->city_id . '%');
            //             }
            //             if ($request->searchTerm && $request->searchTerm != null) {
            //                 $data->orWhere('job_title', 'like', '%' . $request->searchTerm . '%');
            //                 $data->orWhere('job_education', 'like', '%' . $request->searchTerm . '%');
            //                 $data->orWhere('job_max_age', 'like', '%' . $request->searchTerm . '%');
            //                 $data->orWhere('job_selection_criteria', 'like', '%' . $request->searchTerm . '%');
            //                 $data->orWhere('job_email', 'like', '%' . $request->searchTerm . '%');
            //                 $data->orWhere('job_valid_till', 'like', '%' . $request->searchTerm . '%');
            //             }
            // 
            //             $data = $data->get();
            // dd($data->toArray());
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('exam_center.schools.actions', ['row' => $row]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $union_councils = UnionCouncil::get();
        return view('exam_center.schools.schools', ['union_councils' => $union_councils]);
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
        $request->validate([
            'name' => 'required',
        ]);
        // dd($request);
        School::create($request->all());

        return redirect()->route('schools.index')
            ->with('success', 'School created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        $union_councils = UnionCouncil::get();
        return view('exam_center.schools.schools', ['union_councils' => $union_councils, 'school' => $school]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $school->update($request->all());

        return redirect()->route('schools.index')
            ->with('success', 'School updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        try {
            return $school->delete();
        } catch (QueryException $e) {
            print_r($e->errorInfo);
        }
    }
}
