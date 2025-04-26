<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Sport;
use Illuminate\Support\Facades\File;

class SportImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'sports');

            return $next($request);
        });
    }

    public function sports_list()
    {
        $banners = Sport::all();
        // dd($banners);
        return view('admin.sport.list', ['banners' => $banners]);
    }

    public function create_sports()
    {
        return view('admin.sport.create');
    }

    public function store_sports(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ], [
            'image.required' => 'Please upload an image.',
            'image.image' => 'Each file must be an image.',
            'image.mimes' => 'Supported formats: jpeg, png, jpg, gif.',
            'image.max' => 'The image size cannot exceed 5MB.',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Generate unique name
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Move to public/frontend-images/sportsImages
            $destinationPath = public_path('frontend-images/sportsImages');

            // Make sure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true); // create folder if not exist
            }

            $image->move($destinationPath, $imageName);

            // Save relative path into database
            $imagePath = 'frontend-images/sportsImages/' . $imageName;

            // Save to DB
            $sport = new Sport();
            $sport->image_path = $imagePath;
            $sport->save();
        }

        return response()->json([
            'success' => true,
            'redirect' => route('sports.list')
        ]);
    }



    public function delete_sports(Request $request)
    {
        try {
            $id = $request['id'];
            if (!empty($id)) {
                $banner = Sport::findOrFail($id);
                if (File::exists(public_path($banner->image_path))) {
                    File::delete(public_path($banner->image_path));
                }
                $banner->delete();

                $response['result'] = 'success';
                $response['msg'] = 'Image Deleted';
            } else {
                $response['result'] = 'failure';
                $response['msg'] = 'Select Image';
            }
        } catch (Exception $e) {
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    }

    public function delete_multiple_sports(Request $request)
    {
        try {
            $ids = $request->ids;

            if (!empty($ids)) {
                $banners = Sport::whereIn('id', $ids)->get();

                foreach ($banners as $banner) {
                    if (File::exists(public_path($banner->image_path))) {
                        File::delete(public_path($banner->image_path));
                    }
                    $banner->delete();
                }

                $response['result'] = 'success';
                $response['msg'] = 'Selected Images Deleted Successfully';
            } else {
                $response['result'] = 'failure';
                $response['msg'] = 'No images selected.';
            }
        } catch (Exception $e) {
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    }
}
