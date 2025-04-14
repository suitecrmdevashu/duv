<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Activitie;
use App\Models\Brand;
use App\Models\Circle;
use App\Models\Contact;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Vendor;
use App\Models\Location;
use App\Models\InventorySerialNumberMapping;

use Silber\Bouncer\Database\Role;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'dashboard');
            return $next($request);
        });
    }

    public function dashboard(Request $request)
    {
       
        $data = Contact::orderBy('id', 'desc')->get();
        return view('admin.dashboard',compact('data'));
    }

    public function delete_emails(Request $request)
    {
        try {
            $id = $request['id'];
            if (!empty($id)) {
                $festival = Contact::findOrFail($id);
                
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
}
