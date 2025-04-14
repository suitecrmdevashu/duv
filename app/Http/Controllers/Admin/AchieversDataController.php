<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achiever;
use Illuminate\Http\Request;
use Session;

class AchieversDataController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'achievers');
            return $next($request);
        });
    }
    public function achievers_list(){
        $lnas = Achiever::all();
        // dd( $lnas);
        return view('admin.achievers.list', ['lnas' => $lnas]);
    }

    public function create_achievers()
    {
        return view('admin.achievers.create');
    }

    public function store_achievers(Request $request)
    {
        $customMessages = [
            'caption.required' => 'Please provide a title.',
            'file.required' => 'Please upload an image or PDF.',
            'file.mimes' => 'Supported formats are jpeg, png, jpg, gif, and pdf.',
            'file.max' => 'The file size cannot exceed 10MB.',
        ];
        
        $validatedData = $request->validate([
            'caption' => 'required|string|max:255', // Adjust the max length as needed
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:10240', // Maximum size in kilobytes (10MB)
        ], $customMessages);
    
        $imageName = time() . '.' . $validatedData['file']->getClientOriginalExtension();
        $fileType = $validatedData['file']->getClientOriginalExtension();

        if ($validatedData['file']->getClientOriginalExtension() === 'pdf') {
            $path = 'pdf/achievers/';
        } else {
            $path = 'images/achievers/';
        }

        $validatedData['file']->move(public_path($path), $imageName);

        $filePath = $path . $imageName;
    
        $mpd = new Achiever(); // Create a new instance of the Mandatory_public_disclosure model
        $mpd->file_path = $filePath;
        $mpd->caption = $validatedData['caption']; // Assign the caption field
        $mpd->save(); // Save the data

        if ($request->ajax()) {
            return response()->json(['result' => 'success']);
        } else {
            return redirect()->route('lna.list')
                ->with('success', 'achievers Added Successfully.');
        }
    }

    public function delete_achievers(Request $request)
    {
        try {
            $id = $request['id'];
            if (!empty($id)) {
                $lna = Achiever::findOrFail($id);
                
                $lna->delete();

                $response['result'] = 'success';
                $response['msg'] = 'Achievers Deleted';
            } else {
                $response['result'] = 'failure';
                $response['msg'] = 'Select Achievers';
            }
        } catch (Exception $e) {
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    }
}
