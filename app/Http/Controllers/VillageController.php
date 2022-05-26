<?php

namespace App\Http\Controllers;

use App\Imports\VillagesImport;
use App\Models\District;
use App\Models\School;
use App\Models\Taluka;
use App\Models\UnionCouncil;
use App\Models\Village;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
        $rows = Excel::toArray(new VillagesImport, $request->file('file'));

        $data = $rows[0];

        foreach ($data as $key => $value) {

            if ($key == 0) {
                $key++;
                continue;
            }

            $district = District::where('name', $value[3])->first();

            if (!$district) {
                $newDistrict = District::create(['name' => $value[3]]);
                $dis_id = $newDistrict->id;
            } else {
                $dis_id = $district->id;
            }

            $taluka = Taluka::where(['name' => $value[5], 'district_id' => $dis_id])->first();
            if (!$taluka) {
                $newTaluka = Taluka::create(['name' => $value[5], 'district_id' => $dis_id]);
                $tal_id = $newTaluka->id;
            } else {
                $tal_id = $taluka->id;
            }

            $village = Village::where(['name' => $value[4], 'taluka_id' => $tal_id])->first();
            if (!$village) {
                $newVillage = Village::create(['name' => $value[4], 'taluka_id' => $tal_id]);
                $vil_id = $newVillage->id;
            } else {
                $vil_id = $village->id;
            }

            $union_council = UnionCouncil::where(['name' => $value[6], 'village_id' => $vil_id])->first();
            if (!$union_council) {
                // dd($vil_id);
                $newUC = UnionCouncil::create(['name' => $value[6], 'village_id' => $vil_id]);
                $uc_id = $newUC->id;
            } else {
                $uc_id = $union_council->id;
            }

            $school = School::where(['name' => $value[2], 'union_council_id' => $uc_id])->first();
            if (!$school) {
                $newSchool = School::create(['school_code' => $value[1], 'name' => $value[2], 'union_council_id' => $uc_id]);
                $school_id = $newSchool->id;
            } else {
                $school_id = $school->id;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function show(Village $village)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function edit(Village $village)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Village $village)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function destroy(Village $village)
    {
        //
    }
}
