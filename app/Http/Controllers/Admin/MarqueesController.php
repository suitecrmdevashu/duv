<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marque;
use Illuminate\Http\Request;
use Session;
use Validator;

class MarqueesController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'marquee');

            return $next($request);
        });
    }

    public function create_marquee(Request $request, $id)
{
    // Fetch existing content if editing
    $marquee = $id ? Marque::find($id) : null;

    return view('admin.marquee.create', compact('marquee'));
}
    
    public function store_marquee(Request $request, $id = null)
    {
        // Validation rules for your content fields
        $rules = [
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ];
    
        $validatedData = $request->validate($rules);
    
        if ($id) {
            // Update existing content
            $marquee = Marque::find($id);
            $marquee->update($validatedData);
        } else {
            // Create new content
            $marquee = Marque::create($validatedData);
        }
    
        return redirect()->route('marquee.create')->with('success', 'Content saved successfully');
    }

    public function update_marquee(Request $request, $id)
{
    // Validation rules for updating content fields
    $rules = [
        'name' => 'required|string|max:255',
        'status' => 'required|in:0,1',
    ];

    $validatedData = $request->validate($rules);

    // Find the marquee by ID
    $marquee = Marque::find($id);

    if (!$marquee) {
        return redirect()->route('marquee.create')->with('error', 'Marquee not found');
    }

    // Update the marquee with the validated data
    $marquee->update($validatedData);

    return redirect()->back()->with('success', 'Marquee updated successfully');
}

    
}
