<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\CandidateShift;

//DBファサード使用のために記述
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = DB::table('candidate_shifts');
        $candidates = $query->select('candidate_name','begin_time','end_time','rest_time','id')
        ->orderByRaw("CASE
        　　WHEN candidate_name LIKE '早%' THEN 1
        　　WHEN candidate_name LIKE '中%' THEN 2
        　　WHEN candidate_name LIKE '遅%' THEN 3
        　　WHEN candidate_name LIKE 'F%' THEN 4
        　　ELSE 9999
        　　END"
        )
        ->orderBy('candidate_name', 'desc')
        ->get();
        return view('admin.candidate_index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.candidate_create');
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
        $candidate = new CandidateShift;

        $candidate->candidate_name = $request->input('candidate_name');
        $candidate->begin_time = $request->input('begin_time');
        $candidate->end_time = $request->input('end_time');
        $candidate->rest_time = $request->input('rest_time');

        $candidate->save();
        return redirect('admin/candidate_index');
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
        $candidate = CandidateShift::find($id);
        //dd($candidate);
        return view('admin/candidate_edit', compact('candidate'));
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
        $candidate = CandidateShift::find($id);

        $candidate->candidate_name = $request->input('candidate_name');
        $candidate->begin_time = $request->input('begin_time');
        $candidate->end_time = $request->input('end_time');
        $candidate->rest_time = $request->input('rest_time');

        $candidate->save();
        return redirect('admin/candidate_index');
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
}
