<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function GetReports(){
        $reports = Report::get();
        return response()->json(['success' => true, 'data' => $reports], 200);
    }

    public function GetReport(Int $id){
        $reports = Report::find($id);
        if ($reports) {
            return response()->json(['success' => true, 'data' => $reports], 200);
        } else {
            return response()->json(['success' => false, 'data' => $reports], 404);
        }
    }

    public function PostReport(Request $request){
        $reports = new Report();
        $reports->id_user = $request->id_user;
        $reports->name = $request->name;
        // PROCESO DE GENERACIÓN DE REPORTE
        $reports->rute = $request->rute;
        $reports->save();
        return response()->json(['success' => true, 'data' => $reports], 201);
    }

    public function PatchReport(Request $request, Int $id){
        $reports = Report::find($id);
        if ($reports) {
            $reports->id_user = $request->id_user;
            $reports->name = $request->name;
            $reports->rute = $request->rute;
            $reports->save();
            return response()->json(['success' => true, 'data' => $reports], 200);
        } else {
            return response()->json(['success' => false, 'data' => $reports], 404);
        }
    }

    public function DeleteReport(Int $id){
        $reports = Report::find($id);
        if ($reports->delete()) {
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 404);
        }
    }
}
