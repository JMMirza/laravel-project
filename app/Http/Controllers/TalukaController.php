<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Taluka;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Database\QueryException;

class TalukaController extends Controller
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
            $data = Taluka::with(['district'])->get();
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
                    return view('exam_center.talukas.actions', ['row' => $row]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $districts = District::get();
        return view('exam_center.talukas.talukas', ['districts' => $districts]);
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
        Taluka::create($request->all());

        return redirect()->route('talukas.index')
            ->with('success', 'Taluka created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taluka  $taluka
     * @return \Illuminate\Http\Response
     */
    public function show(Taluka $taluka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taluka  $taluka
     * @return \Illuminate\Http\Response
     */
    public function edit(Taluka $taluka)
    {
        $districts = District::get();
        return view('exam_center.talukas.talukas', ['districts' => $districts, 'taluka' => $taluka]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taluka  $taluka
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taluka $taluka)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $taluka->update($request->all());

        return redirect()->route('talukas.index')
            ->with('success', 'Taluka updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taluka  $taluka
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taluka $taluka)
    {
        try {
            return $taluka->delete();
        } catch (QueryException $e) {
            print_r($e->errorInfo);
        }
    }
}
