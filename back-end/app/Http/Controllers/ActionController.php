<?php

namespace App\Http\Controllers;

use App\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $actions = Action::search($request->search)->get();
        return response()->json(['success' => true, 'data' => $actions], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $action = new Action();
        $action->name = $request->name;
        $action->description = $request->description;
        if ($action->save()) {
            return response()->json(['success' => true, 'data' => $action], 201);
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
        $action = Action::find($id);
        if (is_null($action)) {
            return response()->json(['success' => false, 'error' => 'No existe'], 404);
        }
        return response()->json(['success' => true, 'data' => $action], 200);
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
        $action = Action::find($id);
        $action->name = $request->name;
        $action->description = $request->description;
        if ($action->save()) {
            return response()->json(['success' => true, 'data' => $action], 200);
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
        $action = Action::find($id);
        if ($action->delete()) {
            return response()->json(['success' => true, 'deleted' => $action], 200);
        }
        return response()->json(['success' => false, 'error' => 'No existe'], 404);
    }
}
