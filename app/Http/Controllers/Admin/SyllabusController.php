<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Syllabus;
use Illuminate\Http\Request;
use Session;

class SyllabusController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'syllabus');

            return $next($request);
        });
    }
    
    public function syllabus_list(){
        $syllabuss = Syllabus::all();
        return view('admin.syllabus.list',['syllabuss' => $syllabuss]);
    }

    public function create_syllabus()
    {
        return view('admin.syllabus.create');
    }

    public function store_syllabus(Request $request)
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
            $path = 'pdf/syllabus/';
        } else {
            $path = 'images/syllabus/';
        }

        $validatedData['file']->move(public_path($path), $imageName);

        $filePath = $path . $imageName;
    
        $syllabus = new Syllabus(); 
        $syllabus->file_path = $filePath;
        $syllabus->name = $validatedData['caption']; 
        $syllabus->save();

        if ($request->ajax()) {
            return response()->json(['result' => 'success']);
        } else {
            return redirect()->route('syllabus.list')
                ->with('success', 'Syllabus added successfully.');
        }
    }
    public function delete_syllabus(Request $request)
    {
        try {
            $id = $request['id'];
            if (!empty($id)) {
                $mpd = Syllabus::findOrFail($id);
                
                $mpd->delete();

                $response['result'] = 'success';
                $response['msg'] = 'Syllabus Deleted';
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
