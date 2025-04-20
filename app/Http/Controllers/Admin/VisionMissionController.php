<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionMission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Validator;

class VisionMissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'visionMission');
            return $next($request);
        });
    }

    public function visionMission(Request $request)
    {
        $data = VisionMission::find(1); 
        return view('admin.visionMission.create', compact('data'));
    }

    public function store_visionMission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mission' => 'required|string',
            'vision' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'result' => 'error',
                'msg' => $validator->errors()
            ]);
        }

        // Always update or insert the row with ID = 1
        $missionVision = VisionMission::updateOrCreate(
            ['id' => 1],
            [
                'mission' => $request->mission,
                'vision' => $request->vision
            ]
        );

        return response()->json([
            'result' => 'success',
            'msg' => 'Mission and Vision saved successfully.',
            'data' => $missionVision
        ]);
    }
}
