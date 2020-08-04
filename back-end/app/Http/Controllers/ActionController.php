<?php

namespace App\Http\Controllers;

use App\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function GetActions(){
        $actions = Action::get();
        return response()->json(['success' => true, 'data' => $actions], 200);
    }

    public function GetAction(Int $id){
        $action = Action::find($id);
        if ($action) {
            return response()->json(['success' => true, 'data' => $action], 200);
        } else {
            return response()->json(['success' => false, 'data' => $action], 404);
        }
    }

    public function PostAction(Request $request){
        $action = new Action();
        $action->name = $request->name;
        $action->description = $request->description;
        $action->save();
        return response()->json(['success' => true, 'data' => $action], 201);
    }

    public function PatchAction(Request $request, Int $id){
        $action = Action::find($id);
        if ($action) {
            $action->name = $request->name;
            $action->description = $request->description;
            $action->save();
            return response()->json(['success' => true, 'data' => $action], 200);
        } else {
            return response()->json(['success' => false, 'data' => $action], 404);
        }
    }

    public function DeleteAction(Int $id){
        $action = Action::find($id);
        if ($action->delete()) {
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 404);
        }
    }
}
