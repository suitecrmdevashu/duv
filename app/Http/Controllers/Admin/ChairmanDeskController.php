<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChairmanDesk;
use Session;

class ChairmanDeskController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'chairmandesk');

            return $next($request);
        });
    }

    public function chairman_edit()
    {
        $chairmandesk = ChairmanDesk::firstOrNew(['id' => 1]); 
        return view('admin.chairmandesk.create', compact('chairmandesk'));
    }

    public function chairman_update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'message' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $chairmandesk = ChairmanDesk::firstOrNew(['id' => 1]);

        $chairmandesk->name = $request->input('name');
        $chairmandesk->message = $request->input('message');

        if ($request->hasFile('image')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('chairman-desk-images/'), $filename);
            $imagePath = 'chairman-desk-images/' . $filename;
            $chairmandesk->image = $imagePath;
        }

        $chairmandesk->save();

        return redirect()->route('edit.chairman-desk')->with('success', 'Chairman information updated successfully.');
    }
}
