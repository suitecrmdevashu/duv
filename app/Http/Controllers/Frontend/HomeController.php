<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Achiever;
use App\Models\AchieverHeading;
use App\Models\Festival;
use App\Models\Activitie;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Mandatory_public_disclosure;
use App\Models\TC;
use App\Models\Latestnew;
use App\Models\Year;
use App\Models\TcYear;
use App\Models\Sequence;
use App\Models\TcImage;
use App\Models\Event;
use App\Models\FeeStructure;
use App\Models\Information;
use App\Models\Principal;
use App\Models\Scoutimage;
use App\Models\Sport;
use App\Models\Syllabus;
use App\Models\Contact;
use Mail;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\VisionMission;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function aboutschool()
    {
        return view('frontend.about-school');
    }

    public function visionmission(){
        $missionVision = VisionMission::find(1); 
        return view('frontend.vissionmission',compact('missionVision'));
    }

    public function whyvis(){
        return view('frontend.whyvis');
    }

    public function chairmandesk(){
        return view('frontend.charimandesk');
    }

    public function principaldesk(){
        $principals = Principal::all();
        return view('frontend.principaldesk',compact('principals'));
    }

    public function teachingmethodolgy(){
        return view('frontend.teachingmethodolgy');
    }

    public function syllabus(){
        $syllabuss = Syllabus::all();
        return view('frontend.syllabus',['syllabuss'=>$syllabuss]);
    }

    public function curriculum(){
        return view('frontend.curriculum');
    }

    public function sport(){
        $sports = Sport::all();
        return view('frontend.sport',compact('sports'));
    }

    public function artcraft(){
        return view('frontend.art-craft');
    }

    public function musicdance(){
        return view('frontend.music-dance');
    }

    public function housesystem(){
        return view('frontend.housesystem');
    }

    public function club(){
        return view('frontend.club');
    }

    public function infrastructure(){
        return view('frontend.infrastructure');
    }

    public function facilities(){
        return view('frontend.facilities');
    }

    public function mpd(){
        $mpds = Mandatory_public_disclosure::all();
        return view('frontend.mpd',['mpds' => $mpds]);
    }

    public function contactus(){
        return view('frontend.contactus');
    }

    public function contactusemail(Request $request)
    {
    // var_dump($request->get('message'));
    // die;
    $data = array(
        'messages' => $request->message
        );
         
         $this->validate($request, [
            'first' => 'required',
            'last' => 'required',
            'emailto' => 'required|email',
            'message' => 'required',
            'phone' => 'required'
    ]);
    // dd($request->get('message'));
    // Save data to the contacts table
    Contact::create([
        'first' => $request->get('first'),
        'last' => $request->get('last'),
        'phone' => $request->get('phone'),
        'emailto' => $request->get('emailto'),
        'message' => $request->get('message'),
    ]);

return back()->with('success', 'Thanks for contacting, We will get back to you soon!');
    
        // try {
           
        // } catch (Exception $e) {
        //     \Log::error('Mail sending failed: ' . $e->getMessage());
        //     return redirect()->back()->with('error', 'Something went wrong while sending mail!');
        // } finally {
        //     Session::flash('message', 'Mail sent!');
        //     return redirect()->back();
        // }
    }
        


    public function career(){
        return view('frontend.career');
    }

    
    public function transfercertificate(){
       
        $tcYears = TcYear::has('sequences.tcImages')->get(); 
        // dd($tcYears);
        return view('frontend.tc', compact('tcYears'));
    }

    public function getImage(Request $request)
    {
        $tcYearId = $request->input('tcYearId');
        $sequenceNumber = $request->input('sequenceNumber');

        // Use get() instead of pluck() to retrieve all matching records
        $imagePath = TcImage::whereHas('sequence', function ($query) use ($tcYearId, $sequenceNumber) {
            $query->where('tcyear_id', $tcYearId)->where('sequence_number', $sequenceNumber);
        })->pluck('image_path')->all();

        // dd($tcYearId,$sequenceNumber,$imagePaths);
        // Check if any images were found
        if (!empty($imagePath)) {
            // Return an array of image paths
            return response()->json(['image_path' => $imagePath]);
        } else {
            return response()->json(['image_paths' => []]);
        }
    }


    public function activites(){
        $activities = Activitie::where('status', 1)->get();
        return view('frontend.activites',['activities'=>$activities]);
    }

    public function holidays(){
        $festivals = Festival::orderBy('date','asc')->get();
        $holidayYear = DB::table('holiday_year')->select('year')->first()->year;
        return view('frontend.holidays',['festivals' => $festivals, 'holidayYear' => $holidayYear]);
    }
    
    public function newsannouncements(){
        $lnas = Latestnew::all();
        return view('frontend.newsannouncements', ['lnas' => $lnas]);
    }

    public function admission(){
        $admissions = Information::all();
        $feestructures = FeeStructure::all();
        return view('frontend.admission',compact('admissions','feestructures'));
    }

    public function schooltour(){
        return view('frontend.schooltour');
    }

    public function gallery(){
        $result = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->select(
                'categories.id as category_id',
                'categories.name as category_name',
                'products.id as product_id',
                'products.title as product_title',
                'product_images.id as image_id',
                'product_images.path as image_path'
            )
            ->get();
    
        // Organize the data by years, subtopics, and images
        $years = [];
        foreach ($result as $item) {
            $years[$item->category_id]['category_id'] = $item->category_id;
            $years[$item->category_id]['category_name'] = $item->category_name;
            $years[$item->category_id]['products'][] = [
                'product_id' => $item->product_id,
                'product_title' => $item->product_title,
                'image_id' => $item->image_id,
                'image_path' => $item->image_path,
            ];
        }
    // dd($years,$result);
        return view('frontend.gallery', compact('years'));
    }
    

    public function achievers(){
        $headings = Achiever::all();
        return view('frontend.achievers',compact('headings'));
    }

    public function calendar(){
        $events = Event::all();
        return response()->json($events);
    }
    
    public function scoutguide (){
        $scouts = Scoutimage::all();
        return view('frontend.scout',['scouts' => $scouts]);
    }

}
