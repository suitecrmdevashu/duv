<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Festival;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;

class FestContoller extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'festivals');

            return $next($request);
        });
    }

    public function festivals_list(Request $request){
        if ($request->ajax()) {
            $user = \Auth::user();
            $festivals = Festival::orderBy('id', 'desc')->get();
            $years = Year::all();
    
            // Process the festivals data
            $datatable = datatables()
                ->of($festivals)
                ->addColumn('status', function($data) {
                    return $data->status == '1' ? 'Active' : 'Inactive';
                })
                ->addColumn('year', function($data) use ($years) {
                    // Assuming there's a year_id field in festivals table
                    $year = $years->firstWhere('id', $data->year_id);
                    return $year ? $year->name : 'N/A';
                })
                ->addColumn('action', function($data) use ($user) {
                    $button = '';
                    if ($user->can('edit_festivals')) {
                        $button = '<a href="/admin/festivals/edit/' . $data->id . '" class="btn btn-sm btn-clean btn-icon" title="Edit"><i class="fas fa-edit text-info"></i></a>';
                    }
                    if ($user->can('delete_festivals')) {
                        $button .= '<a href="javascript:;" data-id="' . $data->id . '" class="btn btn-sm btn-clean btn-icon delete_festivals" title="Delete"><i class="fas fa-trash text-danger"></i></a>';
                    }
                    return $button;
                })
                ->addIndexColumn()
                ->rawColumns(['action', 'status'])
                ->make(true);
    
            return $datatable;
        }
    
        $years = Year::all();
        return view('admin.festival.list', compact('years'));
    }
    

    public function create_festivals(Request $request){
        return view('admin.festival.create');
    }
    public function store_festivals(Request $request){
        try{
            $request_input = $request->except('_token');
          
            $rules = [
                'name' => 'required|string|max:300|unique:festival,name,except,id',
                'date' => 'required',
                 'status' => 'required|in:0,1',
            ];

            $messages = [
                'name.required' => 'Please enter festival name',
                'name.max' => 'festival name should not be more than 300 characters',
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
            

                $festival = Festival::create([
                    'name'=>$request_input['name'],
                    'date'=>$request_input['date'],
                    'status'=>$request_input['status'],
                ]);
                $response['result'] = 'success';
                $response['msg'] = 'Festival created';
            }
        }
        catch(\Exception $e){
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }
 
        return response()->json($response);
    }
    public function edit_festivals(Request $request)
    {
        $festival = Festival::findOrFail($request->id);
        return view('admin.festival.edit' , compact('festival'));
    } 

    public function update_festivals(Request $request)
    {
        try {
            $request_input = $request->except('_token');
            $db_festival_name = Festival::find($request_input['festival_id']);
            
            if ($db_festival_name->name != $request_input['name']) {
                $rules = [
                    'name' => 'required|string|max:300|unique:festival,name,' . $request_input['festival_id'],
                    'date' => 'required',
                    'status' => 'required|in:0,1',
                ];
    
                $messages = [
                    'name.required' => 'Please enter festival name',
                    'name.max' => 'Festival name should not be more than 300 characters',
                    'date.required' => 'Please select date',
                    'status.required' => 'Please select status',
                ];
    
                $validator = Validator::make($request_input, $rules, $messages);
    
                if ($validator->fails()) {
                    $response['msg'] = $validator->errors()->toArray();
                    $response['result'] = 'error';
                } else {
                    $db_festival_name->update([
                        'name' => $request_input['name'],
                        'date' => $request_input['date'],
                        'status' => $request_input['status'],
                    ]);
    
                    $response['result'] = 'success';
                    $response['msg'] = 'Festival Updated';
                }
            } else {
                $db_festival_name->update([
                    'date' => $request_input['date'],
                    'status' => $request_input['status'],
                ]);
    
                $response['result'] = 'success';
                $response['msg'] = 'Festival Updated';
            }
        } catch (\Exception $e) {
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }
    
        return response()->json($response);
    }    
    public function delete_festivals(Request $request)
    {
        try {
            $id = $request['id'];
            if (!empty($id)) {
                $festival = Festival::findOrFail($id);
                
                $festival->delete();

                $response['result'] = 'success';
                $response['msg'] = 'festival Deleted';
            } else {
                $response['result'] = 'failure';
                $response['msg'] = 'Select festival';
            }
        } catch (Exception $e) {
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    }

    public function create_year(Request $request){
        $year = $request->input('year'); 

        $data = DB::table('holiday_year')
        ->where('id', '1')
        ->update(['year' => $year]);

        return redirect()->route('festivals_list')->with('success','Year Update Successfully');
    }
}
