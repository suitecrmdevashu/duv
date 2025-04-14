<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Principal;
use Session;

class PrinciapalDeskController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'principal');

            return $next($request);
        });
    }

    public function principal_edit()
    {
        $principal = Principal::firstOrNew(['id' => 1]); // Assuming there's a record with id 1
        return view('admin.principal.create', compact('principal'));
    }

    public function principal_update(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'message' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $principaldesk = Principal::firstOrNew(['id' => 1]);

    $principaldesk->name = $request->input('name');
    $principaldesk->message = $request->input('message');

    if ($request->hasFile('image')) {
        $filename = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('Principal-images/'), $filename);
        $imagePath = 'Principal-images/' . $filename;
        $principaldesk->image = $imagePath;
    }

    $principaldesk->save();

    return redirect()->route('edit.principal-desk')->with('success', 'Principal information updated successfully.');
}

}
