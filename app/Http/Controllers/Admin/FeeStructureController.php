<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeeStructure;
use Illuminate\Http\Request;
use Session;

class FeeStructureController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'fee-structure');

            return $next($request);
        });
    }

    public function feestructure_list(){
        $syllabuss = FeeStructure::all();
        return view('admin.feestructure.list',['syllabuss' => $syllabuss]);
    }

    public function create_feestructure()
    {
        return view('admin.feestructure.create');
    }

    public function store_feestructure(Request $request)
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
            $path = '/pdf/fee-structure/';
        } else {
            $path = '/pdf/fee-structure/';
        }

        $validatedData['file']->move(public_path($path), $imageName);

        $filePath = $path . $imageName;
    
        $syllabus = new FeeStructure(); 
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

    public function delete_feestructure(Request $request)
    {
        // dd($request->all());
        try {
            $id = $request['id'];
            if (!empty($id)) {
                $mpd = FeeStructure::findOrFail($id);
                
                $mpd->delete();

                $response['result'] = 'success';
                $response['msg'] = 'Fee Structure Deleted';
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
