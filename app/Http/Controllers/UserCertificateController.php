<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCertificate;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Str;
use File;

class UserCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $documents = UserCertificate::where(['user_id' => $user->id])->with(['user'])->get();
        //dd($documents->toArray());
        return view('candidate.user_certificates.user_certificates', ['user' => $user, 'documents' => $documents]);
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

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'institute_name'  => ['required', 'string', 'max:100'],
            'duration'   => ['required', 'string', 'max:50'],
            'start_date' => ['required', 'date'],
            'end_date' => 'required|date|after_or_equal:start_date',
            'document' => ['required', 'mimes:pdf,png,jpg', 'max:1000'],
        ]);
        $user = \Auth::user();
        $candidate_id =  $user->id;
        $user = User::where(['id' => $user->id]);

        try {

            $input = $request->all();
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
            $result = UserCertificate::create($input);
            if ($result->wasRecentlyCreated) {
                return back()->with('success', 'Your details and file is submitted Successfully');
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
     * @param  \App\Models\UserCertificate  $userCertificate
     * @return \Illuminate\Http\Response
     */
    public function show(UserCertificate $userCertificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCertificate  $userCertificate
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCertificate $userCertificate)
    {
        $user = \Auth::user();
        $documents = UserCertificate::where(['user_id' => $user->id])->with(['user'])->get();
        //dd($documents->toArray());
        return view('candidate.user_certificates.user_certificates', ['user' => $user, 'documents' => $documents, 'userCertificate' => $userCertificate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCertificate  $userCertificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCertificate $userCertificate)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'institute_name'  => ['required', 'string', 'max:100'],
            'duration'   => ['required', 'string', 'max:50'],
            'start_date' => ['required', 'date'],
            'end_date' => 'required|date|after_or_equal:start_date',
            'document' => ['required', 'mimes:pdf,png,jpg', 'max:1000'],
        ]);
        $user = \Auth::user();
        $candidate_id =  $user->id;
        $user = User::where(['id' => $user->id]);

        try {

            $input = $request->all();
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
            $userCertificate->update($input);
            return redirect()->route('user-certificates.index')
                ->with('success', 'Certificate updated successfully.');
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCertificate  $userCertificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCertificate $userCertificate)
    {
        try {
            $userCertificate->delete();
            return redirect(route('user-certificates.index'))->with('success', 'Your record and file is deleted Successfully!');
        } catch (QueryException $e) {
            print_r($e->errorInfo);
        }
    }

    public function viewDocument($document_name)
    {
        return response()->download(public_path() . '/uploads/candidates_documents/' . $document_name, $document_name, [], 'inline');
    }
}
