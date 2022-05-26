<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CandidateDocument;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreFileRequest;
use App\Models\Institution;
use Illuminate\Support\Str;
use DataTables;
use File;
use Illuminate\Database\QueryException;
use InvalidArgumentException;

class CandidateDocumentController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = \Auth::user();
        $documents = CandidateDocument::where(['status' => 'active', 'user_id' => $user->id])->orderBy('created_at', 'DESC')->with(['institute'])->get();
        $latest_document = CandidateDocument::where(['status' => 'active', 'user_id' => $user->id])->orderBy('created_at', 'DESC')->first();
        //dd($documents->toArray());
        $institutions = Institution::where(['status' => 'active'])->get();


        return view('candidate.documents_upload.index', ['user' => $user, 'latest_document' => $latest_document, 'documents' => $documents, 'institutions' => $institutions]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        $user = \Auth::user();
        $candidate_id =  $user->id;
        $user = User::where(['id' => $user->id]);
        $input = $request->all();
        if ($request->grade_type != null && $input['grade_type'] == 'cgpa') {
            $input['total_marks'] = $input['total_cgpa'];
            $input['obtain_marks'] = $input['obtain_cgpa'];
        }

        if ($request->academic_achievement == 'bachelors') {
            $dateYear = date('Y');
            $validated = $request->validate([
                'academic_achievement' => ['required', 'string', 'max:100'],
                'institute_name'  => ['required', 'string', 'max:100'],
                'roll_number'   => ['required', 'string', 'max:50'],
                'grade_type' => ['required', 'string'],
                'passing_year' => 'required|integer|lte:' . $dateYear,
                'year_of_admission' => 'required|integer',
                'program_name' => 'required|string',
                'major_subject' => 'required|string',
                'document' => ['required', 'mimes:pdf', 'max:2048'],
            ]);
        }
        if ($request->academic_achievement == 'masters') {
            $validated = $request->validate([
                'academic_achievement' => ['required', 'string', 'max:100'],
                'institute_name'  => ['required', 'string', 'max:100'],
                'roll_number'   => ['required', 'string', 'max:50'],
                'grade_type' => ['required', 'string'],
                'passing_year' => 'required|integer|gte:year_of_admission',
                'year_of_admission' => 'required|integer',
                'program_name' => 'required|string',
                'major_subject' => 'required|string',
                'document' => ['required', 'mimes:pdf', 'max:2048'],
            ]);
        }
        if ($request->academic_achievement == 'phd') {
            $validated = $request->validate([
                'academic_achievement' => ['required', 'string', 'max:100'],
                'institute_name'  => ['required', 'string', 'max:100'],
                'roll_number'   => ['required', 'string', 'max:50'],
                'grade_type' => ['required', 'string'],
                'passing_year' => 'required|integer|gte:year_of_admission',
                'year_of_admission' => 'required|integer',
                'major_subject' => 'required|string',
                'document' => ['required', 'mimes:pdf', 'max:2048'],
            ]);
        } else {
            $validated = $request->validate([
                'academic_achievement' => ['required', 'string', 'max:100'],
                'institute_name'  => ['required', 'string', 'max:100'],
                'roll_number'   => ['required', 'string', 'max:50'],
                'grade_type' => ['required', 'string'],
                'passing_year' => 'required|integer|gte:year_of_admission',
                'year_of_admission' => 'required|integer',
                'document' => ['required', 'mimes:pdf', 'max:2048'],
            ]);
        }
        try {
            // dd($input);
            $input['user_id'] = $candidate_id;
            if ($request->hasfile('document')) {

                $path = public_path() . '/uploads/candidates_documents/';
                if (!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $filename = $request->document->getClientOriginalName();
                $destination_path = public_path('uploads/candidates_documents');
                $new_filename = Str::random(32) . '.' . $request->document->getClientOriginalExtension();
                $request->document->move($destination_path, $new_filename);

                $input['document'] = $new_filename;
            }

            $input['status'] = 'active';

            $result = CandidateDocument::create($input);
            if ($result->wasRecentlyCreated) {
                return back()->with('success', 'Your details and file is submitted Successfully');
            } else {
                return back()->withErrors($validated->errors());
            }
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function viewDocument($document_name)
    {
        return response()->download(public_path() . '/uploads/candidates_documents/' . $document_name, $document_name, [], 'inline');
    }

    public function delete($id)
    {
        $isdelete = CandidateDocument::find($id);
        if ($isdelete) {
            $isdelete->delete();
            return redirect(route('documents-upload'))->with('success', 'Your record and file is deleted Successfully!');
        } else {
            return redirect(route('documents-upload'))->with('success', 'Your record and file is deleted Successfully!');
        }
    }
    public function edit($candidateDocument)
    {
        $candidate_document = CandidateDocument::find($candidateDocument);
        // dd($candidate_document->toArray());
        $user = \Auth::user();
        $documents = CandidateDocument::where(['status' => 'active', 'user_id' => $user->id])->with(['institute'])->get();
        // $districts = District::get();
        return view('candidate.documents_upload.index', ['user' => $user, 'documents' => $documents, 'candidateDocument' => $candidate_document]);
    }

    public function update(Request $request, $candidateDocument)
    {
        $user = \Auth::user();
        $candidate_id =  $user->id;
        $user = User::where(['id' => $user->id]);
        $input = $request->all();
        if ($request->grade_type != null && $input['grade_type'] == 'cgpa') {
            $input['total_marks'] = $input['total_cgpa'];
            $input['obtain_marks'] = $input['obtain_cgpa'];
        }

        $validated = $request->validate([
            'academic_achievement' => ['required', 'string', 'max:100'],
            'institute_name'  => ['required', 'string', 'max:100'],
            'roll_number'   => ['required', 'string', 'max:50'],
            'grade_type' => ['required', 'string'],
            'passing_year' => 'required|integer|gte:year_of_admission',
            'year_of_admission' => 'required|integer',
            'document' => ['required', 'mimes:pdf,png,jpg', 'max:2048'],
        ]);
        try {
            // dd($input);
            $input['user_id'] = $candidate_id;
            if ($request->hasfile('document')) {

                $path = public_path() . '/uploads/candidates_documents/';
                if (!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $filename = $request->document->getClientOriginalName();
                $destination_path = public_path('uploads/candidates_documents');
                $new_filename = Str::random(32) . '.' . $request->document->getClientOriginalExtension();
                $request->document->move($destination_path, $new_filename);

                $input['document'] = $new_filename;
            }

            $input['status'] = 'active';
            $candidate_document = CandidateDocument::find($candidateDocument);
            // dd($input);
            $candidate_document->update($input);

            return redirect()->route('documents-upload')
                ->with('success', 'Educational Document updated successfully.');
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
}
