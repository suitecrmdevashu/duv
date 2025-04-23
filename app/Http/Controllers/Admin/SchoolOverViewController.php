<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Validator;
use App\Models\SchoolOverview;

class SchoolOverViewController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'schooloverview');
            return $next($request);
        });
    }

    public function schoolOverView(Request $request)
    {
        $data = SchoolOverview::find(1); 
        return view('admin.schoolOverview.create', compact('data'));
    }

    public function store_schoolOverView(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'about' => 'required|string',
            'academics' => 'required|string',
            'amenities' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'result' => 'error',
                'msg' => $validator->errors()
            ]);
        }

        // Always update or insert the row with ID = 1
        $missionVision = SchoolOverview::updateOrCreate(
            ['id' => 1],
            [
                'about' => $request->about,
                'academics' => $request->academics,
                'amenities' => $request->amenities
            ]
        );

        return response()->json([
            'result' => 'success',
            'msg' => 'School Overview Saved Successfully.',
            'data' => $missionVision
        ]);
    }
}
