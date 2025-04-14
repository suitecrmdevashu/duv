<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Session;
use App\Models\Mandatory_public_disclosure;

class MPDController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'mpd');

            return $next($request);
        });
    }
    
    public function mpd_list(){
        $mpds = Mandatory_public_disclosure::all();
        return view('admin.mpd.list', ['mpds' => $mpds]);
    }

    public function create_mpd()
    {
        return view('admin.mpd.create');
    }

    public function store_mpd(Request $request)
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
            $path = 'pdf/mpd/';
        } else {
            $path = 'images/mpd/';
        }

        $validatedData['file']->move(public_path($path), $imageName);

        $filePath = $path . $imageName;
    
        $mpd = new Mandatory_public_disclosure(); // Create a new instance of the Mandatory_public_disclosure model
        $mpd->file_path = $filePath;
        $mpd->name = $validatedData['caption']; // Assign the caption field
        $mpd->save(); // Save the data

        if ($request->ajax()) {
            return response()->json(['result' => 'success']);
        } else {
            return redirect()->route('mpd.list')
                ->with('success', 'Banner added successfully.');
        }
    }

    public function delete_mpd(Request $request)
    {
        try {
            $id = $request['id'];
            if (!empty($id)) {
                $mpd = Mandatory_public_disclosure::findOrFail($id);
                
                $mpd->delete();

                $response['result'] = 'success';
                $response['msg'] = 'banner Deleted';
            } else {
                $response['result'] = 'failure';
                $response['msg'] = 'Select banner';
            }
        } catch (Exception $e) {
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    }
}
