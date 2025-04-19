<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facilitie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Validator;
use Illuminate\Support\Facades\File;

class FacilityController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'facility');
            return $next($request);
        });
    }

    public function facilities_list(Request $request)
    {
        $user = \Auth()->user();

        if ($request->ajax()) {
            $facilities = datatables()
                ->of(
                    Facilitie::select('id', 'name', 'photo', 'content')->get()
                )
                ->addIndexColumn()
                ->addColumn('photo', function ($data) {
                    $imgUrl = asset($data->photo);
                    return '<img src="' . $imgUrl . '" alt="Image" height="60">';
                })
                ->addColumn('action', function ($data) use ($user) {
                    $button = '';

                    if ($user->can('edit_facilities')) {
                        $button = '<a href="/admin/facilities/edit/' . $data->id . '" class="btn btn-sm btn-clean btn-icon" title="Edit"><i class="fas fa-edit text-info"></i></a>';
                    }
                    if ($user->can('delete_facilities')) {
                        $button .= '<a href="javascript:;" data-id="' . $data->id . '" class="btn btn-sm btn-clean btn-icon delete_facilities" title="Delete"><i class="fas fa-trash text-danger"></i></a>';
                    }

                    return $button;
                })
                ->rawColumns(['photo', 'action'])
                ->make(true);

            return $facilities;
        }

        return view('admin.facilities.list');
    }


    public function create_facilities()
    {
        return view('admin.facilities.create');
    }

    public function store_facilities(Request $request)
    {
        try {

            $customMessages = [
                'photo.required' => 'Please upload an image.',
                'photo.image' => 'The uploaded file must be an image.',
                'photo.mimes' => 'Supported image formats are jpeg, png, jpg, and gif.',
                'photo.max' => 'The image size cannot exceed 5MB.',
                'name.required' => 'Please provide name',
                'content.required' => 'Please provide a caption.',
                'content.string' => 'The caption must be a string.',
                'content.max' => 'The caption cannot exceed 255 characters.',
            ];

            $validatedData = $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Maximum size in kilobytes (5MB)
                'content' => 'required|string|max:255', // Adjust the max length as needed
            ], $customMessages);

            $imageName = time() . '.' . $validatedData['photo']->getClientOriginalExtension();
            $validatedData['photo']->move(public_path('frontend-images/facility'), $imageName);
            $imagePath = 'frontend-images/facility/' . $imageName;

            $facilities = new Facilitie(); // Create a new instance of the fac$facilitiesImage model
            $facilities->name = $request['name'];
            $facilities->content = $validatedData['content'];
            $facilities->photo = $imagePath;
            $facilities->save();

            $response['result'] = 'success';
            $response['msg'] = 'Facility Created';
        } catch (Exception $e) {
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }

        return json_encode($response);
    }

    public function edit_facilities(Request $request)
    {
        $facilities = Facilitie::findOrFail($request->id);
        return view('admin.facilities.edit', compact('facilities'));
    }

    public function update_facilities(Request $request)
    {
        try {
            $customMessages = [
                'content.required' => 'Please provide a caption.',
                'content.string' => 'The caption must be a string.',
                'content.max' => 'The caption cannot exceed 255 characters.',
            ];
    
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'content' => 'required|string|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            ], $customMessages);
    
            $facility = Facilitie::findOrFail($request->facilities_id);
    
            $facility->name = $request->name;
            $facility->content = $request->content;
    
            // Check if a new image is uploaded
            if ($request->hasFile('photo')) {
                // Delete old image
                if ($facility->photo && File::exists(public_path($facility->photo))) {
                    File::delete(public_path($facility->photo));
                }
    
                // Store new image
                $imageName = time() . '.' . $request->photo->getClientOriginalExtension();
                $request->photo->move(public_path('frontend-images/facility'), $imageName);
                $facility->photo = 'frontend-images/facility/' . $imageName;
            } else {
                // Use the old image
                $facility->photo = $request->old_photo;
            }
    
            $facility->save();

            return response()->json([
                'result' => 'success',
                'msg' => 'Facility Updated Successfully'
            ]);
        } catch (\Exception $e) {
            app(\App\Exceptions\Handler::class)->report($e);
            return response()->json([
                'result' => 'failure',
                'msg' => $e->getMessage(),
            ]);
        }
    }


    public function delete_facilities(Request $request)
    {
        try {
            $id = $request['id'];
            if (!empty($id)) {
                $facilities = Facilitie::findOrFail($id);

                // Delete image from folder
                if ($facilities->photo && File::exists(public_path($facilities->photo))) {
                    File::delete(public_path($facilities->photo));
                }

                // Delete record from DB
                $facilities->delete();

                $response['result'] = 'success';
                $response['msg'] = 'Facility Deleted';
            } else {
                $response['result'] = 'failure';
                $response['msg'] = 'Select Facility';
            }
        } catch (Exception $e) {
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    }
}
