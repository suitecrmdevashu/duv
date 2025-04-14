<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activitie;
use Illuminate\Http\Request;
use Session;
use Validator;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'activites');

            return $next($request);
        });
    }

    public function activites_list(Request $request){
        $user = \Auth()->user();
        if($request->ajax()){
           
            $circles = datatables()
                ->of(
                    Activitie::orderBy('id','desc')->get()
                )
                ->addColumn('status', function($data){

                    return $data->status == '1' ? 'Active' : 'Inactive';

                })
                ->addColumn('action', function($data) use ($user){
                    $button = '';
                    if ($user->can('create_activites')) {
                        $button = '<a href="/admin/activites/edit/'.$data->id.'" class="btn btn-sm btn-clean btn-icon" title="Edit"><i class="fas fa-edit text-info"></i></a>'; 
                        // $button .= '&nbsp;&nbsp;';
                    }
                    if ($user->can('create_activites')) {
                        $button .= '<a href="javascript:;" data-id="'.$data->id.'" class="btn btn-sm btn-clean btn-icon delete_activites" title="Delete"><i class="fas fa-trash text-danger"></i></a>';
                    }
                  
                    
                    return $button;           
                })
                ->addIndexColumn()
                ->rawColumns(['action','status'])
                ->make(true);

            return $circles;
        }
        return view('admin.activites.list');
    }

    public function create_activites(Request $request){
        return view('admin.activites.create');
    }

    public function store_activites(Request $request){
        try{
            $request_input = $request->except('_token');

            $rules = [
              'name' =>  'required|string|max:300',
              'activity' =>  'required|string|max:300',
              'date' =>  'required|string',
              'status' => 'required|in:0,1',
            ];

            $messages = [
                'name.required' => 'Please enter agency name',
                'name.max' => 'agency name should not be more than 150 characters',
                'activity.required' => 'Please enter activity name',
                'activit.max' => ' Activity should not be more than 300 characters',
                'date.required' => 'Please select date',
                'status.required' => 'Please select status',

                
            ];
            $validator = Validator::make($request_input, $rules, $messages);
            if($validator->fails()){
                $response['msg'] = $validator->errors()->toArray();
                $response['result'] = 'error';
            }
            else{
                    
                $request_input['status'] = isset($request_input['status']) ? $request_input['status'] : 0;
            

                $circle = Activitie::create([
                    'name'=>$request_input['name'],
                    'date'=>$request_input['date'],
                    'activity'=>$request_input['activity'],
                    'status'=>$request_input['status'],
                ]);
                $response['result'] = 'success';
                $response['msg'] = 'activity created';
            }
        }
        catch(\Exception $e){
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }
 
        return response()->json($response);
    }
    public function edit_activites(Request $request){

        $circle = Activitie::findOrFail($request->id);
        return view('admin.activites.edit' , compact('circle'));
    } 

    public function update_activites(Request $request){
        try{
            $request_input = $request->except('_token');
            $circle_id = $request_input['activites_id'];
            $db_circle = Activitie::find($circle_id);
    
            $rules = [
                'name' => 'required|string|max:300',
                'activity' => 'required|string|max:300',
                'date' => 'required|string',
                'status' => 'required|in:0,1',
            ];
    
            $messages = [
                'name.required' => 'Please enter agency name',
                'name.max' => 'Agency name should not be more than 300 characters',
                'activity.required' => 'Please enter activity name',
                'activity.max' => 'Activity should not be more than 300 characters',
                'date.required' => 'Please select a date',
                'status.required' => 'Please select a status',
            ];
    
            $validator = Validator::make($request_input, $rules, $messages);
    
            if ($validator->fails()) {
                $response['msg'] = $validator->errors()->toArray();
                $response['result'] = 'error';
            } else {
                $request_input['status'] = isset($request_input['status']) ? $request_input['status'] : 0;
    
                // Update the record
                $db_circle->update([
                    'name' => $request_input['name'],
                    'date' => $request_input['date'],
                    'activity' => $request_input['activity'],
                    'status' => $request_input['status'],
                ]);
    
                $response['result'] = 'success';
                $response['msg'] = 'Activity Updated';
            }
        } catch (\Exception $e) {
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }
    
        return response()->json($response);
    }
    
    public function delete_activites(Request $request)
    {
        try {
            $id = $request['id'];
            if (!empty($id)) {
                $circle = Activitie::findOrFail($id);
                
                $circle->delete();

                $response['result'] = 'success';
                $response['msg'] = 'Activity Deleted';
            } else {
                $response['result'] = 'failure';
                $response['msg'] = 'Select Activity';
            }
        } catch (Exception $e) {
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    }
}
