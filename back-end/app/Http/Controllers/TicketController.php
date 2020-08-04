<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function GetTickets(){
        $tickets = Ticket::get();
        return response()->json(['success' => true, 'data' => $tickets], 200);
    }

    public function GetTicket(Int $id){
        $tickets = Ticket::find($id);
        if ($tickets) {
            return response()->json(['success' => true, 'data' => $tickets], 200);
        } else {
            return response()->json(['success' => false, 'data' => $tickets], 404);
        }
    }

    public function PostTicket(Request $request){
        $ticket = new Ticket();
        $ticket->name = $request->name;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $fileName = hash('sha256', date('h-i-s, j-m-y, it is w Day')) . '.' . pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $destinationPath = base_path() . '/public/uploads/tickets/';
            $image->move($destinationPath, $fileName);
            $ticket->rute = $fileName;
        }
        $ticket->save();
        return response()->json(['success' => true, 'data' => $ticket], 201);
    }

    public function PatchTicket(Request $request, Int $id){
        $tickets = Ticket::find($id);
        if ($tickets) {
            $ticket->name = $request->name;
            $ticket->save();
            return response()->json(['success' => true, 'data' => $ticket], 200);
        } else {
            return response()->json(['success' => false, 'data' => $ticket], 404);
        }
    }

    public function DeleteTicket(Int $id){
        $tickets = Ticket::find($id);
        if ($tickets->delete()) {
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 404);
        }
    }
}
