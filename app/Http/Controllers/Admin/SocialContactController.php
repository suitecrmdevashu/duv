<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialContact;
use Session;

class SocialContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'socialmedia');

            return $next($request);
        });
    }

    public function social_edit()
{
    $socialContact = SocialContact::firstOrNew(['id' => 1]); // Assuming there's a record with id 1
    return view('admin.socialmedia.create', compact('socialContact'));
}

public function social_update(Request $request)
{
    $request->validate([
        'facebook' => 'nullable|string',
        'twitter' => 'nullable|string',
        'youtube' => 'nullable|string',
        'phone' => 'nullable|string',
        'email' => 'nullable|email',
    ]);

    $socialContact = SocialContact::firstOrNew(['id' => 1]);

    $socialContact->facebook = $request->input('facebook');
    $socialContact->twitter = $request->input('twitter');
    $socialContact->youtube = $request->input('youtube');
    $socialContact->phone = $request->input('phone');
    $socialContact->email = $request->input('email');

    $socialContact->save();

    return redirect()->route('edit.social_contact')->with('success', 'Social contact information updated successfully.');
}
}
