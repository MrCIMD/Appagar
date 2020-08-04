<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function GetServices(){
        $services = Service::get();
        return response()->json(['success' => true, 'data' => $services], 200);
    }

    public function GetService(Int $id){
        $service = Service::find($id);
        if ($service) {
            return response()->json(['success' => true, 'data' => $service], 200);
        } else {
            return response()->json(['success' => false, 'data' => $service], 404);
        }
    }

    public function PostService(Request $request){
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->period = $request->period;
        $service->time = $request->time;
        $service->save();
        return response()->json(['success' => true, 'data' => $service], 201);
    }

    public function PatchService(Request $request, Int $id){
        $service = Service::find($id);
        if ($service) {
            $service->name = $request->name;
            $service->description = $request->description;
            $service->period = $request->period;
            $service->time = $request->time;
            $service->save();
            return response()->json(['success' => true, 'data' => $service], 200);
        } else {
            return response()->json(['success' => false, 'data' => $service], 404);
        }
        
    }

    public function DeleteService(Int $id){
        $service = Service::find($id);
        if ($service->delete()) {
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 404);
        }
    }
}
