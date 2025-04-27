<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Menu;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'menu');

            return $next($request);
        });
    }

    // Show menu management page
    public function index()
    {
        // Get all parent menus with submenus
        $menus = Menu::with('submenus')->whereNull('parent_id')->orderBy('order')->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function toggleStatus(Request $request)
    {
        $menu = Menu::findOrFail($request->id); // 🔥 get id from request
        $menu->is_active = !$menu->is_active;
        $menu->save();
    
        return response()->json(['success' => true, 'status' => $menu->is_active]);
    }
    

}
