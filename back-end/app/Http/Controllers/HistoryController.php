<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Histories = History
            ::searchUser($request->user)
            ->searchService($request->service)
            ->searchAction($request->action)
            ->searchTicket($request->ticket)
            ->with(['user', 'service', 'action', 'ticket'])->get();
        return response()->json(['success' => true, 'data' => $Histories], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $history = new History();
        $history->id_user = $request->id_user;
        $history->id_service = $request->id_service;
        $history->id_action = $request->id_action;
        $history->amount = $request->amount;
        $history->id_ticket = $request->id_ticket;
        if ($history->save()) {
            return response()->json(['success' => true, 'data' => $history], 201);
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
        $history = History::find($id);
        if (is_null($history)) {
            return response()->json(['success' => false, 'error' => 'No existe'], 404);
        }
        return response()->json(['success' => true, 'data' => $history], 200);
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
        $history = History::find($id);
        $history->id_user = $request->id_user;
        $history->id_service = $request->id_service;
        $history->id_action = $request->id_action;
        $history->amount = $request->amount;
        $history->id_ticket = $request->id_ticket;
        if ($history->save()) {
            return response()->json(['success' => true, 'data' => $history], 200);
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
        $history = History::find($id);
        if ($history->delete()) {
            return response()->json(['success' => true, 'deleted' => $history], 200);
        }
        return response()->json(['success' => false, 'error' => 'No existe'], 404);
    }
}
