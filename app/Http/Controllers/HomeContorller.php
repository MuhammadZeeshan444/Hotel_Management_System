<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Roomtypeimage;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Banner;

class HomeContorller extends Controller
{
    //
    public function home()
    {
        $banners = Banner::where('publish_status', 'on')->get();
        $services = Service::all();
        $roomTypes = RoomType::all();
        $testimonials = Testimonial::all();
        return view('home', ['roomTypes'=>$roomTypes, 'services'=>$services, 'testimonials'=>$testimonials, 'banners' => $banners]);
    }

    //service detail
    public function service_detail(Request $request, $id)
    {
        $service = Service::find($id);
        return view('servicedetail', ['service'=>$service]);
    }
    //Add testimonaill
    public function add_testimonial()
    {
        return view('add-testimonial');
    }
    //Save testimonaill
    public function save_testimonial(Request $request)
    {
        $customerid = session('data')[0]->id;

        $testimonial = new Testimonial();
        $testimonial->customer_id=$customerid;
        $testimonial->testi_cont=$request->testi_cont;
        $testimonial->save();
         return redirect('customer/add-testimonial')->with('success', 'Data has been added');

    }
}
