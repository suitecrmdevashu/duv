<?php

namespace App\Http\Controllers\Admin;

use App\Models\BannerImage;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'banner');

            return $next($request);
        });
    }
    
    public function banner_list(){
        $banners = BannerImage::all();
        return view('admin.banner.list', ['banners' => $banners]);
    }

    public function create_banner()
    {
        return view('admin.banner.create');
    }

    public function store_banner(Request $request)
    {
        $customMessages = [
            'image.required' => 'Please upload an image.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Supported image formats are jpeg, png, jpg, and gif.',
            'image.max' => 'The image size cannot exceed 5MB.',
            'caption.required' => 'Please provide a caption for the banner.',
            'caption.string' => 'The caption must be a string.',
            'caption.max' => 'The caption cannot exceed 255 characters.',
        ];
    
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Maximum size in kilobytes (5MB)
            'caption' => 'required|string|max:255', // Adjust the max length as needed
        ], $customMessages);
    
        $imageName = time().'.'.$validatedData['image']->getClientOriginalExtension();
        $validatedData['image']->move(public_path('frontend-images/banner'), $imageName);
        $imagePath = 'frontend-images/banner/' . $imageName;
    
        $banner = new BannerImage(); // Create a new instance of the BannerImage model
        $banner->image_path = $imagePath;
        $banner->caption = $validatedData['caption']; // Assign the caption field
        $banner->save(); // Save the banner image
    
        if ($request->ajax()) {
            return response()->json(['result' => 'success']);
        } else {
            return redirect()->route('banner.list')
                ->with('success', 'Banner added successfully.');
        }
    }
    public function delete_banner(Request $request)
    {
        try {
            $id = $request['id'];
            if (!empty($id)) {
                $banner = BannerImage::findOrFail($id);
                
                $banner->delete();

                $response['result'] = 'success';
                $response['msg'] = 'banner Deleted';
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
