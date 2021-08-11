<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class AdminSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $submissions = Submission::where('archived', 0)
            ->latest()
            ->get();
        return view('admin.submissions.index', compact('submissions'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $submission = Submission::findOrfail($id);
        return view('admin.submissions.show', compact('submission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function archive()
    {
        $submissions = Submission::where('archived', 1)
            ->latest()
            ->get();
        return view('admin.submissions.archive', compact('submissions'));
    }

    public function archiveSubmission($id)
    {
        $submission = Submission::findOrFail($id);
        $submission->archived = 1;
        $submission->update();
        return redirect()->back();
    }

    public function UnArchiveSubmission($id)
    {
        $submission = Submission::findOrFail($id);
        $submission->archived = 0;
        $submission->update();
        return redirect()->back();
    }

}
