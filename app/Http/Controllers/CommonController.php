<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamCenter;
use App\Models\ExamCalendar;
use App\Models\ExamCalendarTimeslot;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\School;
use App\Models\Taluka;
use App\Models\TalukaProfile;
use App\Models\UnionCouncil;
use App\Models\Village;

class CommonController extends Controller
{
	public function listExamCalendar(Request $request)
	{
		$where = [];

		if ($request->exam_id) {
			$where['exam_id'] = $request->exam_id;
		}

		if ($request->exam_center_id) {
			$where['exam_center_id'] = $request->exam_center_id;
		}

		$data = ExamCalendar::where($where)->get();

		return response()->json($data);
	}

	public function listStates(Request $request)
	{
		$data = State::where('country_id', $request->id)->get();
		return response()->json($data);
	}

	public function listCities(Request $request)
	{
		$data = City::where('state_id', $request->id)->get();
		return response()->json($data);
	}

	public function listTalukas(Request $request)
	{
		$data = Taluka::where('district_id', $request->id)->get();
		return response()->json($data);
	}

	public function listTalukaProfiles(Request $request)
	{
		$data = TalukaProfile::where('district_profile_id', $request->id)->get();
		return response()->json($data);
	}

	public function listVillages(Request $request)
	{
		$data = Village::where('taluka_id', $request->id)->get();
		return response()->json($data);
	}

	public function listUnionCouncils(Request $request)
	{
		$data = UnionCouncil::where('village_id', $request->id)->get();
		return response()->json($data);
	}

	public function listSchools(Request $request)
	{
		$data = School::where('union_council_id', $request->id)->get();
		return response()->json($data);
	}

	public function listExamCenters(Request $request)
	{
		$data = ExamCenter::where('city_id', $request->id)->get();
		return response()->json($data);
	}

	public function listExamCalendarByExam(Request $request)
	{
		$data = ExamCalendar::where([
			//'exam_id' => $request->exam_id,
			'exam_center_id' => $request->exam_center_id,
		])->get();

		return response()->json($data);
	}

	public function listTimeSlots(Request $request)
	{
		$data = ExamCalendarTimeslot::where([
			'exam_calender_id' => $request->exam_calender_id
		])->get();
		return response()->json($data);
	}

	public function getRoleName()
	{
		// $userid = Auth::user()->name
		// $userrole = User::where(['id' => $userid])->with(['roles'])->first();
		// return $userrole;
	}
}
