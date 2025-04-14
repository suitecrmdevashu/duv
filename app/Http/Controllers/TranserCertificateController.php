<?php

namespace App\Http\Controllers;

use App\Models\TC;
use App\Models\TcYear;
use App\Models\Sequence;
use App\Models\TcImage;
use Illuminate\Http\Request;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TranserCertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'transercertificates');

            return $next($request);
        });
    }
    public function tc_list(){
        // $tcs = TC::all();
        $tcs = Sequence::has('tcYear')->with('tcImages')->get();
        // dd($tcs);
        return view('admin.tc.list', ['tcs' => $tcs]);
        // 
    }

    public function create_tc()
    {
        $years = TcYear::pluck('year', 'id'); // Assuming 'year' is the field to display in the dropdown, and 'id' is the value for each option.
        return view('admin.tc.create', compact('years'));
    }

    public function store_tc(Request $request)
    {
        $customMessages = [
            'select_year.required' => 'Please Select Year.',
            'caption.required' => 'Please provide a title.',
            'file.required' => 'Please upload an image or PDF.',
            'file.mimes' => 'Supported formats are jpeg, png, jpg, gif, and pdf.',
            'file.max' => 'The file size cannot exceed 10MB.',
        ];
        
        $validatedData = $request->validate([
            'select_year' => 'required',
            'caption' => 'required|string|max:255', // Adjust the max length as needed
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:10240', // Maximum size in kilobytes (10MB)
        ], $customMessages);
        
        $imageName = time() . '.' . $validatedData['file']->getClientOriginalExtension();
        $fileType = $validatedData['file']->getClientOriginalExtension();
        
        if ($validatedData['file']->getClientOriginalExtension() === 'pdf') {
            $path = 'pdf/transfercertificate/';
        } else {
            $path = 'images/transfercertificate/';
        }
        
        $validatedData['file']->move(public_path($path), $imageName);
        
        $filePath = $path . $imageName;
        
        // Create a new TCYear instance and save it if it doesn't exist, or retrieve it if it does
        // $tcYear = TCYear::firstOrNew(['year' => $validatedData['select_year']]);
        // $tcYear->save();
        
        // Extract and store the sequence number from the caption
        $sequenceNumber = intval(preg_replace('/[^0-9]/', '', $validatedData['caption']));
        
        // Create a new Sequence instance
        $sequence = new Sequence();
        $sequence->tcyear_id = $request->input('select_year'); // Assign the tcyear_id
        $sequence->sequence_number = $sequenceNumber; // Assign the extracted sequence number
        $sequence->save();
        
        // Create a new TCImage instance
        $tcImage = new TCImage();
        $tcImage->sequence_id = $sequence->id; // Assign the sequence_id
        $tcImage->image_path = $filePath; // Assign the image_path
        $tcImage->save();
        
        if ($request->ajax()) {
            return response()->json(['result' => 'success']);
        } else {
            return redirect()->route('tc.list')->with('success', 'TC added successfully.');
        }
        
}
    

   public function delete_tc(Request $request)
{
    try {
        $tc_id = $request->input('id');
        
        if (!empty($tc_id)) {
            // Find the TC record by ID
            $tc = Sequence::findOrFail($tc_id);

            // Delete the associated TC images
            $tc->tcImages()->delete();

            // Delete the TC record
            $tc->delete();

            $response['result'] = 'success';
            $response['msg'] = 'TC and associated TC Images Deleted';
        } else {
            $response['result'] = 'failure';
            $response['msg'] = 'Select TC';
        }
    } catch (ModelNotFoundException $e) {
        $response['result'] = 'failure';
        $response['msg'] = 'TC not found';
    } catch (\Exception $e) {
        $response['result'] = 'failure';
        $response['msg'] = 'An error occurred. Please try again later.';
    }

    return response()->json($response);
}
    
}
