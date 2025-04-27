<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear the table first
        Menu::truncate();

        // Top-level menus
        $home = Menu::create(['title' => 'Home', 'route' => 'home', 'order' => 1]);

        $aboutUs = Menu::create(['title' => 'About Us', 'route' => null, 'order' => 2]);
        $academics = Menu::create(['title' => 'Academics', 'route' => null, 'order' => 3]);
        $coCurricular = Menu::create(['title' => 'Co-curricular Activities', 'route' => null, 'order' => 4]);
        $campus = Menu::create(['title' => 'Campus', 'route' => null, 'order' => 5]);
        $mpd = Menu::create(['title' => 'Mandatory Public Disclosure', 'route' => 'mpd', 'order' => 6]);
        $contactUs = Menu::create(['title' => 'Contact Us', 'route' => null, 'order' => 7]);
        $tc = Menu::create(['title' => 'TC', 'route' => 'transfercertificate', 'order' => 8]);
        $sessionInfo = Menu::create(['title' => 'Session Info', 'route' => null, 'order' => 9]);
        $news = Menu::create(['title' => 'Latest News & Announcements', 'route' => 'newsannouncements', 'order' => 10]);

        // Sub-menus
        // About Us Submenus
        Menu::create(['title' => 'School Overview', 'route' => 'aboutschool', 'parent_id' => $aboutUs->id, 'order' => 1]);
        Menu::create(['title' => 'Vision & Mission', 'route' => 'visionmission', 'parent_id' => $aboutUs->id, 'order' => 2]);
        Menu::create(['title' => 'Why DUV', 'route' => 'why-vis', 'parent_id' => $aboutUs->id, 'order' => 3]);
        Menu::create(['title' => 'Chairman’s Desk', 'route' => 'chairmandesk', 'parent_id' => $aboutUs->id, 'order' => 4]);
        Menu::create(['title' => 'Principal’s Desk', 'route' => 'principaldesk', 'parent_id' => $aboutUs->id, 'order' => 5]);

        // Academics Submenus
        Menu::create(['title' => 'Teaching Methodology', 'route' => 'teachingmethodolgy', 'parent_id' => $academics->id, 'order' => 1]);
        Menu::create(['title' => 'Syllabus', 'route' => 'syllabus', 'parent_id' => $academics->id, 'order' => 2]);
        Menu::create(['title' => 'Curriculum', 'route' => 'curriculum', 'parent_id' => $academics->id, 'order' => 3]);

        // Co-curricular Activities Submenus
        Menu::create(['title' => 'Sports', 'route' => 'sport', 'parent_id' => $coCurricular->id, 'order' => 1]);
        Menu::create(['title' => 'House System', 'route' => 'house-system', 'parent_id' => $coCurricular->id, 'order' => 2]);
        Menu::create(['title' => 'SUPW/Club Activities', 'route' => 'club', 'parent_id' => $coCurricular->id, 'order' => 3]);
        Menu::create(['title' => 'Scout & Guide', 'route' => 'scoutguide', 'parent_id' => $coCurricular->id, 'order' => 4]);

        // Campus Submenus
        Menu::create(['title' => 'Infrastructure', 'route' => 'infrastructure', 'parent_id' => $campus->id, 'order' => 1]);
        Menu::create(['title' => 'Facilities', 'route' => 'facilities', 'parent_id' => $campus->id, 'order' => 2]);

        // Contact Us Submenus
        Menu::create(['title' => 'Get in touch', 'route' => 'contactus', 'parent_id' => $contactUs->id, 'order' => 1]);
        Menu::create(['title' => 'Career @ DUV', 'route' => 'career', 'parent_id' => $contactUs->id, 'order' => 2]);

        // Session Info Submenus
        Menu::create(['title' => 'Activities', 'route' => 'activites', 'parent_id' => $sessionInfo->id, 'order' => 1]);
        Menu::create(['title' => 'Holidays', 'route' => 'holidays', 'parent_id' => $sessionInfo->id, 'order' => 2]);
    }
}
