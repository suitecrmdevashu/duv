<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Subtopic;
use App\Models\Year;
// use App\Models\Gallery;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'gallery');

            return $next($request);
        });
    }

    public function gallery_list(){
       $subtopics = Subtopic::has('year')->get();
        return view('admin.gallery.list', ['subtopics' => $subtopics]);
    }

    public function create_gallery()
    {
        $years = Year::with('subtopics.images')->get();
        return view('admin.gallery.create', compact('years'));
    }

    public function store_gallery(Request $request)
    {
        $customMessages = [
            'select_year.required' => 'Please Select Year',
        ];
        
        $validatedData = $request->validate([
            'year' => 'required', // Validate the select_year field
            'subheading' => 'nullable|string', // Assuming subheading is optional
        ], $customMessages);
        
        // Create a new subtopic
        $subtopic = new Subtopic([
            'subtopic_name' => $request->input('subheading'),
        ]);
        
        $subtopic->year()->associate($request->input('year')); 
        $subtopic->save();
        

        if ($request->ajax()) {
            return response()->json(['result' => 'success']);
        } else {
            return redirect()->route('banner.list')
                ->with('success', 'Subheading save successfully.');
        }
    }

    public function edit_gallery(Request $request, $id){
        $subtopic = Subtopic::findOrFail($id);
        $years = Year::all();   
        $images = $subtopic->images;
        return view('admin.gallery.edit', compact('subtopic', 'years','images'));
    }

    public function update_gallery(Request $request, $id)
    {
        try {
            $subtopic = Subtopic::findOrFail($id);
            $subtopic->year_id = $request->input('year');
            $subtopic->subtopic_name = $request->input('subheading');
            $subtopic->save();
    
            // Clear existing images
            $subtopic->images()->delete();
    
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    // Generate a unique filename using timestamp and random characters
                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('frontend-images/gallery/'), $filename);
    
                    $imageModel = new Image([
                        'image_path' => 'frontend-images/gallery/' . $filename,
                    ]);
    
                    $subtopic->images()->save($imageModel);
                }
            }
    
            return redirect(route('gallery.list'));
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while updating the gallery'], 500);
        }
    }
         

    public function uploadImages(Request $request, $id)
    {
        try {
            $subtopic = Subtopic::findOrFail($id);
            $subtopic_id = $request->input('year_id');
         
            // Validate and store the uploaded images
           
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $filename = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('frontend-images/gallery/', $filename);
    
                    $imageModel = new Image([
                        'image_path' => $filename,
                    ]);
    
                    $subtopic->images()->save($imageModel);
                }
            }
    
            return response()->json(['message' => 'Images uploaded successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while uploading images'], 500);
        }
    }

    // public function delete_gallery(Request $request, $id)
    // {
    //     // print_r($request->all());
    //     // die('hello');
    //     try {
    //         // Extract the image ID from the URL parameters
    //         $imageId = $id;

    //         // Delete the selected image (adjust this code to match your data structure)
    //         // Assuming you have an Image model and an images table
    //         Image::where('id', $imageId)->delete();

    //         // You can also delete the actual image file from storage if needed

    //         return response()->json(['result' => 'success']);
    //     } catch (Exception $e) {
    //         app(\App\Exceptions\Handler::class)->report($e);
    //         $response['result'] = 'failure';
    //         $response['msg'] = $e->getMessage();
    //     }

    //     return response()->json($response);
    // }


    public function delete_gallery(Request $request, $id)
{
    try {
        // Extract the image ID from the URL parameters
        $imageId = $id;

        // Find the image record in the database
        $image = Image::find($imageId);

        // Check if the image record exists
        if ($image) {
            // Delete the image record from the database
            $image->delete();

            // Get the path of the image file
            $filePath = public_path($image->image_path);

            // Check if the file exists before attempting to delete it
            if (file_exists($filePath)) {
                // Delete the actual image file from the storage folder
                unlink($filePath);
            }

            return response()->json(['result' => 'success']);
        } else {
            // Handle the case where the image record is not found
            return response()->json(['result' => 'failure', 'msg' => 'Image not found']);
        }
    } catch (Exception $e) {
        app(\App\Exceptions\Handler::class)->report($e);
        $response['result'] = 'failure';
        $response['msg'] = $e->getMessage();
    }

    return response()->json($response);
}
}    