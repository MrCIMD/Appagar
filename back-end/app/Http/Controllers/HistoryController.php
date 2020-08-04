<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function GetHistories(){
        $history = History::get();
        return response()->json(['success' => true, 'data' => $history], 200);
    }

    public function GetHistory(Int $id){
        $history = History::find($id);
        if ($history) {
            return response()->json(['success' => true, 'data' => $history], 200);
        } else {
            return response()->json(['success' => false, 'data' => $history], 404);
        }
    }

    public function PostHistory(Request $request){
        $history = new History();
        $history->id_user = $request->id_user;
        $history->id_service = $request->id_service;
        $history->id_action = $request->id_action;
        $history->amount = $request->amount;
        $history->id_ticket = $request->id_ticket;
        $history->save();
        return response()->json(['success' => true, 'data' => $history], 201);
    }

    public function PatchHistory(Request $request, Int $id){
        $history = History::find($id);
        if ($history) {
            $history->id_user = $request->id_user;
            $history->id_service = $request->id_service;
            $history->id_action = $request->id_action;
            $history->amount = $request->amount;
            $history->id_ticket = $request->id_ticket;
            $history->save();
            return response()->json(['success' => true, 'data' => $history], 201);
        } else {
            return response()->json(['success' => false, 'data' => $history], 404);
        }
        
        
    }

    public function DeleteHistory(Int $id){
        $history = History::find($id);
        if ($history->delete()) {
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 404);
        }
    }
}
