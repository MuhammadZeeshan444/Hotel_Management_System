<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Db;

class AdminController extends Controller
{
    //Login
    function login()
    {
        return view('admin.login');
    }
    //validate
    function validation_login(Request $request)
    {
        $request->validate([

            'username' => 'required',
            'password' => 'required',
        ]);
            $admin = Admin::where(['username'=>$request->username, 'password'=>sha1($request->password)])->count();
        if($admin>0)
        {
            $adminData = Admin::where(['username'=>$request->username, 'password'=>sha1($request->password)])->get();
            session(['adminData'=>$adminData]);
            if($request->has('rememberme'))
            {
                Cookie::queue('adminuser', $request->username, 1440);
                Cookie::queue('adminpwd', $request->password, 1440);
            }
            return redirect('admin');
        }
        else
        {
            return redirect('admin/login')->with('msg', 'Username or password are invailed!');
        }
    }
    //Logout
    function logout()
    {
        session()->forget(['adminData']);
        return redirect('admin/login');

    }
    //admin dashboard
    public function dashboard()
    {
        $bookings = Booking::selectRaw('count(id) as total_bookings, checkin_date')->groupBy('checkin_date')->get();

        $labels = [];
        $data = [];
        foreach ($bookings as $booking) {
            $labels[] = $booking['checkin_date'];
            $data [] = $booking['total_bookings'];
        }
        //for Pie Chart
        $rtbooking = DB::table('room_types as rt')
        ->join('rooms as r', 'r.room_type_id', '=', 'rt.id')
        ->join('bookings as b', 'b.room_id', '=', 'r.id')
        ->select('rt.*', 'r.*', 'b.*', DB::raw('count(b.id) as total_bookings'))
        ->groupBy('r.room_type_id')
        ->get();

        // dd($rtbooking);
        $plabels = [];
        $pdata = [];
        foreach ($rtbooking as $rbooking) {
            $plabels[] = $rbooking->detail;
            $pdata [] = $rbooking->total_bookings;
        //End Pie Chart
        }
        return view('dashboard', ['labels'=>$labels,'data'=>$data, 'plabels'=>$plabels,'pdata'=>$pdata]);
    }
    public function testimonials()
    {
        //
        $data = Testimonial::all();
        return view('admin-testimonial', ['data'=>$data]);
    }
    public function destroy_testimonail($id)
    {
        //
        Testimonial::where('id', $id)->delete();
        return redirect('admin/testimonials')->with('success', 'Data has been deleted successfully');
    }
}
