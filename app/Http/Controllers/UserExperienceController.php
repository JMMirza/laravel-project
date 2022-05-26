<?php

namespace App\Http\Controllers;

use App\Models\UserExperience;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreFileRequest;
use Illuminate\Support\Str;
use DataTables;
use Illuminate\Database\QueryException;
use File;

class UserExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = \Auth::user();
        // dd($user->toArray());
        $userExperiences = UserExperience::where('user_id', '=', $user->id)->get();
        // dd($user->toArray());
        return view('candidate.user_experiences.user_experiences', ['userExperiences' => $userExperiences]);
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
        if ($request->date_to) {
            $request->validate([
                'user_id' => 'required',
                'organization_name' => 'required',
                'designation' => 'required',
                'date_from' => 'required',
                'date_to' => 'date|after_or_equal:date_from',
                'experience_letter' => ['mimes:pdf,png,jpg', 'max:1000'],
            ]);
        } else {
            $request->validate([
                'user_id' => 'required',
                'organization_name' => 'required',
                'designation' => 'required',
                'date_from' => 'required',
                'experience_letter' => ['mimes:pdf,png,jpg', 'max:1000'],
            ]);
        }
        $input = $request->all();

        if ($request->present) {
            $input['date_to'] = null;
        }
        if ($request->hasfile('experience_letter')) {
            // dd($request->all());
            $path = public_path() . '/uploads/candidates_documents';
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $filename = $request->experience_letter->getClientOriginalName();
            $destination_path = public_path('uploads/candidates_documents');
            $new_filename = Str::random(32) . '.' . $request->experience_letter->getClientOriginalExtension();
            $request->experience_letter->move($destination_path, $new_filename);

            $input['experience_letter'] = $new_filename;
        }
        UserExperience::create($input);

        return redirect()->route('user-experiences.index')
            ->with('success', 'User Experience created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserExperience  $userExperience
     * @return \Illuminate\Http\Response
     */
    public function show($document_name)
    {
        return response()->download(public_path() . '/uploads/candidates_documents/' . $document_name, $document_name, [], 'inline');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserExperience  $userExperience
     * @return \Illuminate\Http\Response
     */
    public function edit(UserExperience $userExperience)
    {
        $user = \Auth::user();
        $userExperiences = UserExperience::where('user_id', '=', $user->id)->get();
        return view('candidate.user_experiences.user_experiences', ['userExperiences' => $userExperiences, 'userExperience' => $userExperience]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserExperience  $userExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserExperience $userExperience)
    {
        $request->validate([
            'user_id' => 'required',
            'organization_name' => 'required',
            'designation' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
        ]);
        // dd($request->all());
        $input = $request->all();
        if ($request->present) {
            $input['date_to'] = null;
        } else {
            $input['present'] = 0;
        }
        if ($request->hasfile('experience_letter')) {
            // dd($request->all());
            $path = public_path() . '/uploads/candidates_documents';
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $filename = $request->experience_letter->getClientOriginalName();
            $destination_path = public_path('uploads/candidates_documents');
            $new_filename = Str::random(32) . '.' . $request->experience_letter->getClientOriginalExtension();
            $request->experience_letter->move($destination_path, $new_filename);

            $input['experience_letter'] = $new_filename;
        }
        // dd($input);
        $userExperience->update($input);

        return redirect()->route('user-experiences.index')
            ->with('success', 'User Experience updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserExperience  $userExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserExperience $userExperience)
    {
        // dd($userExperience);
        try {
            $userExperience->delete();
            return redirect()->route('user-experiences.index')
                ->with('success', 'User Experience deleted successfully.');;
        } catch (QueryException $e) {
            print_r($e->errorInfo);
        }
    }
}
