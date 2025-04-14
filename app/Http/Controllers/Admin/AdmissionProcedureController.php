<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Information;

class AdmissionProcedureController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'admission');

            return $next($request);
        });
    }

    public function admission_list()
    {
        $admissions = Information::all();
        return view('admin.admission.list',compact('admissions'));
    }

    public function create_admission(){
        
        return view('admin.admission.create');
    }

    public function store_admission(Request $request) {
        // Validate the incoming data
        $request->validate([
            'title' => 'required|string',
            'activity' => 'required|string',
        ]);
    
        // Get the validated data
        $title = $request->input('title');
        $content = $request->input('activity');
    
        // Create a new Information record
        $information = new Information();
        $information->title = $title;
        $information->content = $content;
        $information->save();
    
        return redirect()->route('admission.list')->with('success', 'Admission Procedure saved successfully');
    }

    public function edit_admission(Request $request){

        $admissions = Information::findOrFail($request->id);
        // dd($admissions);
        return view('admin.admission.edit' , compact('admissions'));
    }

    public function update_admission(Request $request, $id)
    {
        $admission = Information::findOrFail($id);
        // Update the admission procedure with the new data
        $admission->title = $request->input('title');
        $admission->content = $request->input('content');
        $admission->save();

        // Redirect to a success page or return a response as needed
        return redirect()->route('admission.list')->with('success', 'Admission Procedure updated successfully');
    }

    public function delete_admission(Request $request)
    {
        try {
            $id = $request['id'];
            if (!empty($id)) {
                $banner = Information::findOrFail($id);
                
                $banner->delete();

                $response['result'] = 'success';
                $response['msg'] = 'Data Deleted';
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
