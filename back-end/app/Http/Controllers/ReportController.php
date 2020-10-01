<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reports = Report
            ::search($request->search)
            ->searchUser($request->user)
            ->with(['user'])->get();
        return response()->json(['success' => true, 'data' => $reports], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new Report();
        $report->id_user = $request->id_user;
        $report->name = $request->name;
        $report->rute = $request->rute;
        if ($report->save()) {
            return response()->json(['success' => true, 'data' => $report], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);
        if (is_null($report)) {
            return response()->json(['success' => false, 'error' => 'No existe'], 404);
        }
        return response()->json(['success' => true, 'data' => $report], 200);
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
        $report = Report::find($id);
        $report->id_user = $request->id_user;
        $report->name = $request->name;
        $report->rute = $request->rute;
        if ($report->save()) {
            return response()->json(['success' => true, 'data' => $report], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::find($id);
        if ($report->delete()) {
            return response()->json(['success' => true, 'deleted' => $report], 200);
        }
        return response()->json(['success' => false, 'error' => 'No existe'], 404);
    }
}
