<?php

namespace App\Http\Controllers;

use App\Models\Latestnew;
use Illuminate\Http\Request;
use Session;
class LatestNewsAnnouncementsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'lna');

            return $next($request);
        });
    }
    
    public function lna_list(){
        $lnas = Latestnew::all();
        return view('admin.lna.list', ['lnas' => $lnas]);
    }

    public function create_lna()
    {
        return view('admin.lna.create');
    }

    public function store_lna(Request $request)
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
            $path = 'pdf/latestnews&anncoument/';
        } else {
            $path = 'images/latestnews&anncoument/';
        }

        $validatedData['file']->move(public_path($path), $imageName);

        $filePath = $path . $imageName;
    
        $mpd = new Latestnew(); // Create a new instance of the Mandatory_public_disclosure model
        $mpd->file_path = $filePath;
        $mpd->caption = $validatedData['caption']; // Assign the caption field
        $mpd->save(); // Save the data

        if ($request->ajax()) {
            return response()->json(['result' => 'success']);
        } else {
            return redirect()->route('lna.list')
                ->with('success', 'Latest News added successfully.');
        }
    }

    public function delete_lna(Request $request)
    {
        try {
            $id = $request['id'];
            if (!empty($id)) {
                $lna = Latestnew::findOrFail($id);
                
                $lna->delete();

                $response['result'] = 'success';
                $response['msg'] = 'Latest News & Announcements Deleted';
            } else {
                $response['result'] = 'failure';
                $response['msg'] = 'Select Latest News & Announcements';
            }
        } catch (Exception $e) {
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    }
}
