<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use App\Models\Facilitie;
use App\Models\Menu;
use App\Models\SchoolOverview;
use App\Models\VisionMission;

class IndexController extends Controller
{
    public function index()
    {
        $facilities = Facilitie::select('id', 'name', 'photo', 'content')->get();
        $bannerImages = BannerImage::all();
        $missionVision = VisionMission::find(1);
        $schoolOverview = SchoolOverview::find(1);
        $menus = Menu::whereNull('parent_id')
        ->with(['submenus' => function ($query) {
            $query->where('is_active', 1);
        }])
        ->where('is_active', 1)
        ->orderBy('order', 'asc')
        ->get();

        return view('frontend.index', compact('facilities', 'bannerImages', 'missionVision', 'schoolOverview','menus'));
    }

    public function headerMenu()
    {
        $menus = Menu::whereNull('parent_id')
            ->with(['submenus' => function ($query) {
                $query->where('is_active', 1);
            }])
            ->where('is_active', 1)
            ->orderBy('order', 'asc')
            ->get();
        
        return view('frontend.layout.header', compact('menus'));
    }
}
