<?php

namespace App\Http\Controllers;

use App\Models\Taluka;
use App\Models\UnionCouncil;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use DataTables;

class UnionCouncilController extends Controller
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
            $data = UnionCouncil::with(['taluka'])->get();
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
                    return view('exam_center.union_councils.actions', ['row' => $row]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $talukas = Taluka::get();
        return view('exam_center.union_councils.union_councils', ['talukas' => $talukas]);
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
        UnionCouncil::create($request->all());

        return redirect()->route('union-councils.index')
            ->with('success', 'Union Councils created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnionCouncil  $unionCouncil
     * @return \Illuminate\Http\Response
     */
    public function show(UnionCouncil $unionCouncil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnionCouncil  $unionCouncil
     * @return \Illuminate\Http\Response
     */
    public function edit(UnionCouncil $unionCouncil)
    {
        $talukas = Taluka::get();
        return view('exam_center.union_councils.union_councils', ['talukas' => $talukas, 'unionCouncil' => $unionCouncil]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnionCouncil  $unionCouncil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnionCouncil $unionCouncil)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $unionCouncil->update($request->all());

        return redirect()->route('union-councils.index')
            ->with('success', 'Union Council updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnionCouncil  $unionCouncil
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnionCouncil $unionCouncil)
    {
        try {
            return $unionCouncil->delete();
        } catch (QueryException $e) {
            print_r($e->errorInfo);
        }
    }
}
