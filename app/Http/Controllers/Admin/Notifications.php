<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class Notifications extends Controller
{
    public function index(){
        $data = Contact::orderBy('id', 'desc')->get();
       return view('admin.notification',compact('data')); 
    }
}
